import { NodePHP } from '@php-wasm/node';
import fs from 'fs';
import { AsyncDatabase } from "promised-sqlite3";

class PHPLoader {
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
    async load(sPath) {
        if (!this.php){
            const requestHandler = {
                documentRoot: `${__dirname}/wordpress`,
                absoluteUrl: "https://example.com"
            };
            this.php = await NodePHP.load('8.0', {
                requestHandler: requestHandler
            });
            await this.php.useHostFilesystem();
            
        }
        const data = {
            url: `https://example.com/${sPath == ""?"":sPath + "/"}`,
            headers: {},
            method: 'GET',
            files: {},
            body: '',
        };
        let resp = await this.php.request(data);
        const contents =  resp.text.replace(/(http|https):\/\/(localhost|127.0.0.1|playground\.wordpress\.net\/scope):\d+\.?\d*\/*/g, "/");
        if(!fs.existsSync(`dist/${sPath}`)){
            await fs.promises.mkdir(`dist/${sPath}`, {recursive:true});
        }
        await fs.promises.writeFile(`dist/${sPath}/index.html`, contents);
    
    }
}

console.log("hello cli");
process.exit();
const php = new PHPLoader();
await php.copyFolders('wordpress/wp-content', 'dist/wp-content');
console.log("wrote dist/wp-content");
await php.copyFolders('wordpress/wp-includes', 'dist/wp-includes');
console.log("wrote dist/wp-includes");
let db = await AsyncDatabase.open('./wordpress/wp-content/database/.ht.sqlite');
const rows = await db.all(`SELECT post_name AS path
FROM wp_posts WHERE post_type in ('PAGE','POST') and post_status = 'publish'`);
await php.load("");
console.log("wrote dist/index.html");
for(let row of rows){
    await php.load(row.path);
    console.log(`wrote dist/${row.path}/index.html`);
}
await db.close();
process.exit();
