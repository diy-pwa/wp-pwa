import { NodePHP }  from '@php-wasm/node';
const php = await NodePHP.load('8.0');
await php.useHostFilesystem();
await php.writeFile("starter.php", `
<?php
$path = "test";
if ($path != "/"){
    $_SERVER["PATH_INFO"] = "/" . $path ."/";
    mkdir('dist/' . $path, 0777, true);
    $myfile = fopen("dist/". $path . "/index.html", "w") or die("Unable to open file!");
}else{
    $myfile = fopen("dist/index.html", "w") or die("Unable to open file!");
}
print_r(scandir("./"));
print_r(file_get_contents("index.php"));
ob_start();
// Include the template file
include("index.php");

// End buffering and return its contents
$output = ob_get_clean();
$output = preg_replace("/(http|https):\/\/(localhost|127.0.0.1|playground\.wordpress\.net\/scope):\d+\.?\d*\/*/", "/", $output);
fwrite($myfile, $output);
fclose($myfile);		       
`);
const results = await php.run({
    scriptPath: "starter.php",
});

console.log(results.text);

process.exit();
