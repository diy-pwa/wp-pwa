import { NodePHP } from '@php-wasm/node';
import fs from 'fs';
import { AsyncDatabase } from "promised-sqlite3";
import { ZipLoader } from 'diy-pwa/node';
import express from 'express';


class PHPLoader {
    async build(){
        await this.setup();
        await this.copyFolders('wp-content', 'dist/wp-content');
        console.log("wrote dist/wp-content");
        await this.copyFolders('.wordpress/wp-includes', 'dist/wp-includes');
        console.log("wrote dist/wp-includes");
        let db = await AsyncDatabase.open('./wp-content/database/.ht.sqlite');
        await db.exec("UPDATE wp_options SET option_value = '/%postname%/' WHERE option_name = 'permalink_structure'");
        const rows = await db.all(`SELECT post_name AS path
        FROM wp_posts WHERE post_type in ('PAGE','POST') and post_status = 'publish'`);
        await this.load("");
        console.log("wrote dist/index.html");
        for(let row of rows){
            await this.load(row.path);
            console.log(`wrote dist/${row.path}/index.html`);
        }
        await db.close();
        
    }
    async preview(){
        await this.build();
        const app = express();
        app.use(express.static("dist"));
        const server = app.listen(8001, ()=>{
            console.log(`listening on ${server.address().port}`);
        });        
    }
    async dev(){
        await this.setup();
    }
    async setup(){
        if(!fs.existsSync(".wordpress")){
            const oZipLoader = new ZipLoader();
            await oZipLoader.load("https://wp-now-corsproxy.rhildred.workers.dev/corsproxy/wordpress.org/latest.zip", ".wordpress");
            await oZipLoader.unzip();
            await fs.promises.rename(".wordpress/wp-content", ".wordpress/wp-content.bak");
        }
        if(!fs.existsSync(".wordpress/wp-config.php")){
            await fs.promises.copyFile(".wordpress/wp-config-sample.php", ".wordpress/wp-config.php");
        }
        if(!fs.existsSync("wp-content")){
            await fs.promises.cp(".wordpress/wp-content.bak", "wp-content", { recursive: true });
            const oZipLoader = new ZipLoader();
            await oZipLoader.load('https://wp-now-corsproxy.rhildred.workers.dev/corsproxy/github.com/WordPress/sqlite-database-integration/archive/refs/heads/main.zip', "wp-content/plugins/sqlite-database-integration");
            await oZipLoader.unzip();
            await fs.promises.copyFile("wp-content/plugins/sqlite-database-integration/db.copy", "wp-content/db.php");
            await fs.promises.mkdir("wp-content/database");
            await this.installationStep2();
        }
        if(!fs.existsSync("wp-content/db.php")){
            await fs.promises.copyFile("wp-content/plugins/sqlite-database-integration/db.copy", "wp-content/db.php");
        }        
    }
    async copyFolders(src, dest){
        await fs.promises.mkdir(dest, {recursive:true});
        const aDir = await fs.promises.readdir(src, { withFileTypes: true });
        for(let sPath of aDir){
            if(sPath.isDirectory()){
                await this.copyFolders(`${src}/${sPath.name}`, `${dest}/${sPath.name}`);
            }else if(!sPath.name.match(/(php|sqlite|htaccess)$/)){
                await fs.promises.copyFile(`${src}/${sPath.name}`, `${dest}/${sPath.name}`);
            }
        }
    }
    async getPhpInstance(){
        if (!this.php){
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
    async load(sPath) {
        const data = {
            url: `/${sPath == ""?"":sPath + "/"}`,
            headers: {},
            method: 'GET',
            files: {},
            body: '',
        };
        const php = await this.getPhpInstance(); 
        let resp = await php.request(data);
        console.log(resp);
        const contents =  resp.text.replace(/(http|https):\/\/(localhost|127.0.0.1|playground\.wordpress\.net\/scope):\d+\.?\d*\/*/g, "/");
        if(!fs.existsSync(`dist/${sPath}`)){
            await fs.promises.mkdir(`dist/${sPath}`, {recursive:true});
        }
        await fs.promises.writeFile(`dist/${sPath}/index.html`, contents);
    
    }
    async installationStep2() {
        const php = await this.getPhpInstance();
        await php.request({
            url: '/wp-admin/install.php?step=2',
            method: 'POST',
            formData: {
                language: 'en',
                prefix: 'wp_',
                weblog_title: 'My WordPress Website',
                user_name: 'admin',
                admin_password: 'password',
                admin_password2: 'password',
                Submit: 'Install WordPress',
                pw_weak: '1',
                admin_email: 'admin@localhost.com',
            },
        });
    }
}

const oLoader = new PHPLoader();
oLoader.preview();
