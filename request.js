import { NodePHP } from '@php-wasm/node';
import fs from 'fs';

class PHPLoader {
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
const paths = ["", "sample-page", "hello-world"];
for(let path of paths){
    const resp = await php.load(path);
    if(!fs.existsSync(`dist/${path}`)){
        await fs.promises.mkdir(`dist/${path}`, {recursive:true});
    }
    await fs.promises.writeFile(`dist/${path}/index.html`, resp);
}

process.exit(0);