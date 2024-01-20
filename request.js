import { NodePHP }  from '@php-wasm/node';
const requestHandler = {
    documentRoot: new URL('./', import.meta.url).pathname,
    absoluteUrl: "https://example.com"
};
const php = await NodePHP.load('8.0', {
	requestHandler: requestHandler});
await php.useHostFilesystem();
//const results = await php.run({scriptPath: "index.php"});
const data = {
    url: `https://example.com/`,
    headers: {},
    method: 'GET',
    files: {},
    body: '',
};
const resp = await php.request(data);

console.log(resp.text);

process.exit();
