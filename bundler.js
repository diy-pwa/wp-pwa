import { NodePHP }  from '@php-wasm/node';
const php = await NodePHP.load('8.0');
await php.useHostFilesystem();
const name = "test";
let results = await php.run({
    code: `<?php
        $_SERVER["PATH_INFO"] = "/${name}/";
        include("index.php");
    `
});
console.log(results.text);
process.exit();