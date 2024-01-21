import { NodePHP } from '@php-wasm/node';
import fs from 'fs';

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
                documentRoot: new URL('./wordpress', import.meta.url).pathname,
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
        return resp.text.replace(/(http|https):\/\/(localhost|127.0.0.1|playground\.wordpress\.net\/scope):\d+\.?\d*\/*/g, "/");
    }
}

const php = new PHPLoader();
await php.copyFolders('wordpress/wp-content', 'dist/wp-content');
await php.copyFolders('wordpress/wp-includes', 'dist/wp-includes');
const paths = ["", "sample-page", "hello-world"];
for(let path of paths){
    const resp = await php.load(path);
    if(!fs.existsSync(`dist/${path}`)){
        await fs.promises.mkdir(`dist/${path}`, {recursive:true});
    }
    await fs.promises.writeFile(`dist/${path}/index.html`, resp);
}

process.exit(0);