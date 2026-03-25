import { PHP, PHPRequestHandler } from '@php-wasm/universal';
import { loadNodeRuntime, useHostFilesystem } from '@php-wasm/node';
import { parentPort } from 'node:worker_threads';
import { getRelative } from './index.js';
import os from "node:os";
import path from "node:path";
import  crypto  from "node:crypto";

parentPort.on('message', async ({ id, payload }) => {
    const result = await getContents(payload);

    // Send back the SAME id so the main thread can identify it
    parentPort.postMessage({ id, result });
});

let php = null;

async function getPhpInstance() {
    if (!php) {
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
    return (php);
}

async function getContents(data) {
    try {
        console.log(`request for ${data.url}`)
        const php = await getPhpInstance();
        if (data.files["async-upload"]) {
            const uploadedFile = data.files["async-upload"];
            // {
            //   key: "async-upload",
            //   name: "Yin_yang.png",
            //   size: 27700,
            //   type: "image/png",
            //   arrayBuffer: new Uint8Array([137, 80, ])
            // }
            const ext = path.extname(uploadedFile.name);
            const vfsPath = `temp-${crypto.randomBytes(6).readUIntLE(0, 6)}${ext}`;
            ;

            // 1. Write the actual data to the Wasm VFS
            await php.writeFile(vfsPath, uploadedFile.arrayBuffer);

            // 2. Mock the $_FILES superglobal
            // This script runs BEFORE your target script
            await php.run({
                code: `<?php
            $_FILES['async-upload'] = [
                'name'     => '${uploadedFile.name}',
                'type'     => '${uploadedFile.type}',
                'tmp_name' => '${vfsPath}',
                'error'    => 0,
                'size'     => ${uploadedFile.size},
            ];
        ?>`

            });
        }
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


