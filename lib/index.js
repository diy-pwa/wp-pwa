import { NodePHP } from '@php-wasm/node';
import fs from 'fs';
import path from 'path';
import { AsyncDatabase } from "promised-sqlite3";
import { Zip } from 'diy-pwa';
import express from 'express';
import compression from 'compression';
import compressible from 'compressible';
import fileUpload from 'express-fileupload';
import { glob } from 'glob';

const CORSPROXY = "https://wp-now-corsproxy.rhildred.workers.dev/corsproxy";

export default class {
    async build(sPath) {
        await fs.promises.rm("dist", { recursive: true, force: true });
        await this.setup();
        await this.copyFolders('wp-content', 'dist/wp-content');
        console.log("wrote dist/wp-content");
        await this.copyFolders('.wordpress/wp-includes', 'dist/wp-includes');
        console.log("wrote dist/wp-includes");
        await this.load("", sPath);
        console.log("wrote dist/index.html");
        let db = await AsyncDatabase.open('./wp-content/database/.ht.sqlite');
        const rows = await db.all(`SELECT post_name AS path
        FROM wp_posts WHERE post_type in ('PAGE','POST') and post_status = 'publish'`);
        for (let row of rows) {
            await this.load(row.path, sPath);
            console.log(`wrote dist/${row.path}/index.html`);
        }
        await db.close();

    }
    async create() {
        this.dest = process.cwd();
        const aHtmlFiles = glob.sync(path.resolve(this.dest, "*.html"));
        let isPackageJSONChanged = false;
        let oContents = { devDependencies: {}, scripts: {} };
        if (fs.existsSync(`${this.dest}/package.json`)) {
            oContents = JSON.parse(fs.readFileSync(`${this.dest}/package.json`).toString());
            if (oContents.dependencies) {
                for (const sDependency of Object.keys(oContents.dependencies)) {
                    if (sDependency == "parcel-bundler") {
                        delete oContents.dependencies[sDependency];
                        isPackageJSONChanged = true;
                    }
                }
            }
        }
        if (oContents.scripts.dev &&
            !oContents.scripts.dev.match(/parcel/) &&
            !oContents.scripts.start) {
            oContents.scripts.start = oContents.scripts.dev;
            isPackageJSONChanged = true;
        } else if (!oContents.scripts.start &&
            oContents.scripts.test &&
            !oContents.scripts.test.match(/Error/)) {
            oContents.scripts.start = oContents.scripts.test;
            isPackageJSONChanged = true;

        } else if ((!oContents.scripts.start) ||
            oContents.scripts.dev.match(/parcel/) ||
            oContents.scripts.start.match(/parcel/)) {
            oContents.scripts.start = oContents.scripts.dev = "wp-pwa dev";
            if (!aHtmlFiles.length) {
                oContents.scripts.preview = "wp-pwa preview";
                oContents.scripts.build = "wp-pwa build";
            }
            if (!oContents.devDependencies) {
                oContents.devDependencies = {};
            }
            oContents.devDependencies["wp-pwa"] = "latest";
            isPackageJSONChanged = true;
        }
        if (isPackageJSONChanged) {
            fs.writeFileSync(`${this.dest}/package.json`, JSON.stringify(oContents, null, 2));
        }
        if (!fs.existsSync(`${this.dest}/.gitignore`)) {
            fs.writeFileSync(`${this.dest}/.gitignore`,
                `.env
node_modules
dist
package-lock.json
.wordpress
`);
        }
    }
    async preview(sPath) {
        await this.build(sPath);
        const app = express();
        if (sPath) {
            app.get("/", (req, res) => {
                res.redirect(`/${sPath}`);
            });
            app.use(`/${sPath}`, express.static("dist"));
        } else {
            app.use(express.static("dist"));
        }
        return app;
    }
    requestHandler = {
        documentRoot: `${process.cwd()}/.wordpress`,
        absoluteUrl: "http://localhost:8000",
        isSaved: false
    };
    async dev() {
        const app = express();
        await this.setup();
        app.use(fileUpload());
        app.use(compression({
            filter: (_, res) => {
                const types = res.getHeader('content-type');
                const type = Array.isArray(types) ? types[0] : types;
                const isCompressible = compressible(type);
                return type && isCompressible;
            }
        }));
        app.use(`/wp-content`, express.static("wp-content"));
        app.use(`/wp-includes`, express.static(".wordpress/wp-includes"));
        app.use('/', async (req, res) => {
            try {
                const requestHeaders = {};
                if (req.rawHeaders && req.rawHeaders.length) {
                    for (let i = 0; i < req.rawHeaders.length; i += 2) {
                        requestHeaders[req.rawHeaders[i].toLowerCase()] =
                            req.rawHeaders[i + 1];
                    }
                }
                const body = requestHeaders['content-type']?.startsWith(
                    'multipart/form-data'
                )
                    ? this.requestBodyToMultipartFormData(
                        req.body,
                        requestHeaders['content-type'].split('; boundary=')[1]
                    )
                    : await this.requestBodyToString(req);

                const data = {
                    url: req.url,
                    headers: requestHeaders,
                    method: req.method,
                    files: Object.fromEntries(
                        Object.entries((req).files || {}).map(
                            ([key, file]) => [
                                key,
                                {
                                    key,
                                    name: file.name,
                                    size: file.size,
                                    type: file.mimetype,
                                    arrayBuffer: () => file.data.buffer,
                                },
                            ]
                        )
                    ),
                    body: body,
                };
                this.getContents(data).then((resp) => {
                    res.statusCode = resp.resp.httpStatusCode;
                    Object.keys(resp.resp.headers).forEach((key) => {
                        let value = resp.resp.headers[key];
                        if (key != "x-frame-options") {
                            if (key == "location") {
                                const relative = this.getRelative(Array.isArray(value) ? value[0] : value);
                                res.setHeader(key, relative);
                            } else {
                                res.setHeader(key, value);
                            }
                        }
                    });
                    res.end(resp.contents);

                });
            } catch (e) {
                console.log(e);
                console.trace();
            }
        });
        return app;
    }
    async setup() {
        if (!fs.existsSync(".wordpress")) {
            const oZip = new Zip({
                url: `${CORSPROXY}/wordpress.org/latest.zip`,
                dest: ".wordpress",
                filter: "don't want to filter anything", fs
            });
            await oZip.unzip();
            await fs.promises.rename(".wordpress/wp-content", ".wordpress/wp-content.bak");
        }
        if (!fs.existsSync(".wordpress/wp-config.php")) {
            let sConfig = (await fs.promises.readFile(`.wordpress/wp-config-sample.php`)).toString();
            sConfig = `<?php
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );     
define('USE_FETCH_FOR_REQUESTS',true);
define( 'CONCATENATE_SCRIPTS', false );
define( 'WP_MEMORY_LIMIT', '256M' );?>` + sConfig;
            await fs.promises.writeFile(`.wordpress/wp-config.php`, sConfig);

        }
        if (!fs.existsSync("wp-content")) {
            await fs.promises.cp(".wordpress/wp-content.bak", "wp-content", { recursive: true });
        }
        if (!fs.existsSync("wp-content/mu-plugins/0-network-tweaks.php")) {
            await fs.promises.mkdir("wp-content/mu-plugins", { recursive: true });
            await fs.promises.writeFile("wp-content/mu-plugins/0-network-tweaks.php",
                `<?php
// Needed because gethostbyname( 'wordpress.org' ) returns
    // a private network IP address for some reason.
    add_filter( 'allowed_redirect_hosts', function( $deprecated = '' ) {
        return array(
            'wordpress.org',
            'api.wordpress.org',
            'downloads.wordpress.org',
        );
    } );
// Needed to speed up admin home page
    add_action('admin_init', function(){
        remove_action('welcome_panel', 'wp_welcome_panel');
		
		remove_meta_box('dashboard_primary',       'dashboard', 'side');
		remove_meta_box('dashboard_secondary',     'dashboard', 'side');
		remove_meta_box('dashboard_quick_press',   'dashboard', 'side');
		remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
        remove_meta_box('dashboard_site_health', 'dashboard', 'normal'); // Remove site health wizard
		
		remove_meta_box('dashboard_php_nag',           'dashboard', 'normal');
		remove_meta_box('dashboard_browser_nag',       'dashboard', 'normal');
		remove_meta_box('health_check_status',         'dashboard', 'normal');
		remove_meta_box('dashboard_activity',          'dashboard', 'normal');
		remove_meta_box('network_dashboard_right_now', 'dashboard', 'normal');
		remove_meta_box('dashboard_recent_comments',   'dashboard', 'normal');
		remove_meta_box('dashboard_incoming_links',    'dashboard', 'normal');
		remove_meta_box('dashboard_plugins',           'dashboard', 'normal');

    });
// don't need comments on a pamphlet site and can't support on gh-pages    
    add_filter( 'comments_open', function(){
        return false;
    });
    update_option("permalink_structure","/%postname%/");`
            );
        }
        if (!fs.existsSync("wp-content/mu-plugins/0-playground.php")) {
            await fs.promises.writeFile("wp-content/mu-plugins/0-playground.php",
                `<?php
// Needed because gethostbyname( 'wordpress.org' ) returns
// a private network IP address for some reason.
add_filter( 'allowed_redirect_hosts', function( $deprecated = '' ) {
    return array(
        'wordpress.org',
        'api.wordpress.org',
        'downloads.wordpress.org',
    );
} );

// Support pretty permalinks
add_filter( 'got_url_rewrite', '__return_true' );

// Create the fonts directory if missing
if(!file_exists(WP_CONTENT_DIR . '/fonts')) {
    mkdir(WP_CONTENT_DIR . '/fonts');
}

$log_file = WP_CONTENT_DIR . '/debug.log';
define('ERROR_LOG_FILE', $log_file);
ini_set('error_log', $log_file);?>`);
        }
        if (!fs.existsSync("wp-content/mu-plugins/sqlite-database-integration") &&
            !fs.existsSync("wp-content/plugins/sqlite-database-integration")) {
            const oZip = new Zip({
                url: `${CORSPROXY}/github.com/WordPress/sqlite-database-integration/archive/refs/heads/main.zip`,
                dest: "wp-content/mu-plugins/sqlite-database-integration",
                filter: "don't want to filter anything", fs
            });
            await oZip.unzip();
            await fs.promises.writeFile("wp-content/mu-plugins/0-sqlite.php", `<?php require_once __DIR__ . "/sqlite-database-integration/load.php";`)
        }
        if (!fs.existsSync("wp-content/db.php")) {
            if (fs.existsSync("wp-content/plugins/sqlite-database-integration")) {
                await fs.promises.copyFile("wp-content/plugins/sqlite-database-integration/db.copy", "wp-content/db.php");
            } else {
                const sDB = (await fs.promises.readFile("wp-content/mu-plugins/sqlite-database-integration/db.copy")).toString();
                await fs.promises.writeFile("wp-content/db.php", sDB.replace('/plugins/sqlite-database-integration', '/mu-plugins/sqlite-database-integration'));
            }
        }
        if (!fs.existsSync("wp-content/database")) {
            await fs.promises.mkdir("wp-content/database");
        }
    }
    async copyFolders(src, dest) {
        await fs.promises.mkdir(dest, { recursive: true });
        const aDir = await fs.promises.readdir(src, { withFileTypes: true });
        for (let sPath of aDir) {
            if (sPath.isDirectory()) {
                await this.copyFolders(`${src}/${sPath.name}`, `${dest}/${sPath.name}`);
            } else if (!sPath.name.match(/(php|sqlite|htaccess)$/)) {
                await fs.promises.copyFile(`${src}/${sPath.name}`, `${dest}/${sPath.name}`);
            }
        }
    }
    async getPhpInstance() {
        if (!this.php) {
            this.php = await NodePHP.load('8.0', {
                requestHandler: this.requestHandler
            });
            await this.php.useHostFilesystem();
            await this.php.mount(`${process.cwd()}/wp-content`, `${process.cwd()}/.wordpress/wp-content`);
        }
        return this.php;
    }
    async doRequest(request) {
        const php = await this.getPhpInstance();
        const isAbsolute =
            request.url.startsWith('http://') ||
            request.url.startsWith('https://');
        const requestedUrl = new URL(
            // Remove the hash part of the URL as it's not meant for the server.
            request.url.split('#')[0],
            isAbsolute ? undefined : this.requestHandler.absoluteUrl
        );
        const fsPath = `${this.requestHandler.documentRoot}${requestedUrl.pathname.replace(/\/+$/, '')}`;
        if (this.seemsLikeAPHPRequestHandlerPath(fsPath) || php.fileExists(fsPath)) {
            return (php.request(request));
        } else {
            // we need to do a run here
            const scriptPath = `${this.requestHandler.documentRoot}/index.php`;
            return (php.run({
                relativeUri: requestedUrl.pathname,
                protocol: (requestedUrl.protocol || '').replace(':', ''),
                method: request.method || 'GET',
                $_SERVER: {
                    REMOTE_ADDR: '127.0.0.1',
                    DOCUMENT_ROOT: this.requestHandler.documentRoot,
                    HTTPS: request.url.startsWith('https://')
                        ? 'on'
                        : '',
                },
                body: request.body,
                scriptPath,
                headers: request.headers,
            }));
        }
    }
    seemsLikeAPHPRequestHandlerPath(path) {
        const lastSegment = path.split('/').pop();
        return path.endsWith('.php') || path.includes('.php/') || !lastSegment.includes('.');
    }


    async getContents(data, sPath) {
        return new Promise((resolve) => {
            this.doRequest(data).then((resp) => {
                if (resp.httpStatusCode == 302) {
                    const sLocation = resp.headers.location[0];
                    const sNewLocation = sLocation.replace(/.*.wordpress/, "");
                    console.log(`redirecting from ${data.url} to ${sLocation} changed to ${sNewLocation}`);
                    resp.headers.location = sNewLocation;
                }
                if (resp.headers["content-type"] && resp.headers["content-type"][0].match(/(css|javascript|json|html)/)) {
                    const contents = this.getRelative(resp.text, sPath);
                    resolve({ resp: resp, contents: contents });
                }
                resolve({ resp: resp, contents: resp.bytes });
            })
        });
    }
    getRelative(canonical, sPath) {
        // need to also deal with http:\\/\\/127.0.0.1:8000\\/ escaped??? in json
        const rc = canonical.replace(/(http|https):[\/\\]+(localhost|127.0.0.1|playground\.wordpress\.net\/scope):\d+\.?\d*[\/\\]*/g, sPath ? `/${sPath}/` : "/");
        return rc.replace(/http:/g, "https:");
    }
    async load(sPath, sOutPath) {
        const data = {
            url: `/${sPath == "" ? "" : sPath + "/"}`,
            headers: {},
            method: 'GET',
            files: {},
            body: '',
        };
        const resp = await this.getContents(data, sOutPath);
        if (!fs.existsSync(`dist/${sPath}`)) {
            await fs.promises.mkdir(`dist/${sPath}`, { recursive: true });
        }
        await fs.promises.writeFile(`dist/${sPath}/index.html`, resp.contents);

    }
    requestBodyToMultipartFormData(json, boundary) {
        let multipartData = '';
        const eol = '\r\n';

        for (const key in json) {
            multipartData += `--${boundary}${eol}`;
            multipartData += `Content-Disposition: form-data; name="${key}"${eol}${eol}`;
            multipartData += `${json[key]}${eol}`;
        }

        multipartData += `--${boundary}--${eol}`;
        return multipartData;
    }

    async requestBodyToString(req) {
        return new Promise((resolve) => {
            let body = '';
            req.on('data', (chunk) => {
                body += chunk.toString(); // convert Buffer to string
            });
            req.on('end', () => {
                resolve(body);
            });
        });
    }

}
