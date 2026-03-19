import { PHP, PHPRequestHandler } from '@php-wasm/universal';
import { loadNodeRuntime, useHostFilesystem } from '@php-wasm/node';
import { parentPort } from 'node:worker_threads';
import { getRelative } from './index.js';

parentPort.on('message', async ({ id, payload }) => {
  const result = await getContents(payload);
   
  // Send back the SAME id so the main thread can identify it
  parentPort.postMessage({ id, result });
});

let php = null;

async function getPhpInstance(){
    if(!php){
        php = new PHP(await loadNodeRuntime('8.3', {
            emscriptenOptions: {
                processId: process.pid // Use a numeric ID if possible
            }
        }));
        const requestHandler = new PHPRequestHandler({
            php,
            documentRoot: `${process.cwd()}`,
            absoluteUrl: "http://localhost:8000",
            isSaved: false
        });

        php.requestHandler = requestHandler;
        await useHostFilesystem(php);

    }
    return(php);
}

async function getContents(data) {
    try {
        console.log(`request for ${data.url}`)
        const php = await getPhpInstance();
        const resp = await php.request(data);
        if (resp.httpStatusCode == 302) {
            const sLocation = resp.headers.location[0];
            let sNewLocation = sLocation.replace(/https?:\/\/.*?\//, "/");
            resp.headers.location = sNewLocation;
        }
        if (resp.headers["content-type"] && resp.headers["content-type"][0].match(/(css|javascript|json|html)/)) {
            const contents = getRelative(resp.text);
            return ({ resp: resp, contents: contents });
        }
        return ({ resp: resp, contents: resp.bytes });
    } catch (e) {
        console.log(e);
        console.trace();

    }
}


