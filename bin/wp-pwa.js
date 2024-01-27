#! /usr/bin/env node

import PhpLoader from '../lib/index.js';

const oLoader = new PhpLoader();
switch(process.argv[2]){
    case "build":
        await oLoader.build(process.argv[3]);
        process.exit();
    case "preview":
        await oLoader.preview(process.argv[3]);
        break;
    case "start":
    case "dev":
        await oLoader.dev();
        break;
    default:
        console.log("wp-pwa (build|preview|dev|start) ?output_folder");
}
