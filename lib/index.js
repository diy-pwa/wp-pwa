import { NodePHP } from '@php-wasm/node';
import fs from 'fs';
import { AsyncDatabase } from "promised-sqlite3";
import { ZipLoader } from 'diy-pwa/node';
import express from 'express';
import compression from 'compression';
import compressible from 'compressible';
import fileUpload from 'express-fileupload';
import { login } from '@wp-playground/blueprints';


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
    async dev() {
        await this.setup();
        const php = await this.getPhpInstance();
        await login(php, {
            username: 'admin',
            password: 'password',
        });
        const app = express();
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
            const oZipLoader = new ZipLoader();
            await oZipLoader.load("https://wp-now-corsproxy.rhildred.workers.dev/corsproxy/wordpress.org/latest.zip", ".wordpress");
            await oZipLoader.unzip();
            await fs.promises.rename(".wordpress/wp-content", ".wordpress/wp-content.bak");
        }
        if (!fs.existsSync(".wordpress/wp-config.php")) {
            await fs.promises.copyFile(".wordpress/wp-config-sample.php", ".wordpress/wp-config.php");
        }
        if (!fs.existsSync("wp-content")) {
            await fs.promises.cp(".wordpress/wp-content.bak", "wp-content", { recursive: true });
        }
        if(!fs.existsSync("wp-content/mu-plugins/0-allow-wp-org.php")){
            await fs.promises.mkdir("wp-content/mu-plugins");            
            await fs.promises.writeFile("wp-content/mu-plugins/0-allow-wp-org.php", 
`<?php
// Needed because gethostbyname( 'wordpress.org' ) returns
    // a private network IP address for some reason.
    add_filter( 'allowed_redirect_hosts', function( $deprecated = '' ) {
        return array(
            'wordpress.org',
            'api.wordpress.org',
            'downloads.wordpress.org',
        );
    } );`
            );
        }
        if (!fs.existsSync("wp-content/plugins/sqlite-database-integration")) {
            const oZipLoader = new ZipLoader();
            await oZipLoader.load('https://wp-now-corsproxy.rhildred.workers.dev/corsproxy/github.com/WordPress/sqlite-database-integration/archive/refs/heads/main.zip', "wp-content/plugins/sqlite-database-integration");
            await oZipLoader.unzip();
            await fs.promises.copyFile("wp-content/plugins/sqlite-database-integration/db.copy", "wp-content/db.php");

        }
        if (!fs.existsSync("wp-content/database")) {
            await fs.promises.mkdir("wp-content/database");
            await this.installationStep2();
        }
        let db = await AsyncDatabase.open('./wp-content/database/.ht.sqlite');
        await db.exec("UPDATE wp_options SET option_value = '/%postname%/' WHERE option_name = 'permalink_structure'");
        await db.close();
        if (!fs.existsSync("wp-content/db.php")) {
            await fs.promises.copyFile("wp-content/plugins/sqlite-database-integration/db.copy", "wp-content/db.php");
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
            const requestHandler = {
                documentRoot: `${process.cwd()}/.wordpress`,
                absoluteUrl: "http://localhost:8000"
            };
            this.php = await NodePHP.load('8.0', {
                requestHandler: requestHandler
            });
            await this.php.useHostFilesystem();
            await this.php.mount(`${process.cwd()}/wp-content`, `${process.cwd()}/.wordpress/wp-content`);
        }
        return this.php;
    }
    async getContents(data, sPath) {
        const php = await this.getPhpInstance();
        return new Promise((resolve) => {
            php.request(data).then((resp) => {
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
    async installationStep2() {
        const php = await this.getPhpInstance();
        await php.request({
            url: '/wp-admin/install.php?step=2',
            method: 'POST',
            formData: {
                language: 'en',
                prefix: 'wp_',
                weblog_title: 'wp-pwa ... Serverless Wordpress',
                user_name: 'admin',
                admin_password: 'password',
                admin_password2: 'password',
                Submit: 'Install WordPress',
                pw_weak: '1',
                admin_email: 'admin@localhost.com',
            },
        });
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
