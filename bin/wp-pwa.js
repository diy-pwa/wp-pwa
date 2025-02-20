#! /usr/bin/env node

import PhpLoader from '../lib/index.js';
import path from "node:path";
import info from "../package.json" with { type: "json" };

const sProg = path.basename(process.argv[1]);
const sCommand = process.argv[2];
console.log(`${sProg} ${sCommand||"none"} version ${info.version}`);
const oLoader = new PhpLoader();
let app = null;
switch(sCommand){
    case "build":
        await oLoader.build(process.argv[3]);
        break;
    case "create":
        await oLoader.create();
        break;
    case "dev":
    case "start":
        app = await oLoader.dev();
        break;
    case "preview":
        app = await oLoader.preview(process.argv[3]);
        break;
    default:
        console.log(`wp-pwa (build|preview|dev|start) ?output_folder`);
}
if(app){
    const server = app.listen(8000, ()=>{
        console.log(`\`${sProg} ${sCommand}\` is listening on port ${server.address().port}`);
    })
}else{
    process.exit();
}
