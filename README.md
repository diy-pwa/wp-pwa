# wp-pwa

## wordpress composer for microfrontends

Lot's more details to follow.

TODOs write files to /tmp and add to superglobal

```javascript

    const vfsPath = `/tmp/${uploadedFile.name}`;

    // 1. Write the actual data to the Wasm VFS
    await php.writeFile(vfsPath, uploadedFile.data);

    // 2. Mock the $_FILES superglobal
    // This script runs BEFORE your target script
    await php.run({
        code: `<?php
            $_FILES['myFile'] = [
                'name'     => '${uploadedFile.name}',
                'type'     => '${uploadedFile.mimetype}',
                'tmp_name' => '${vfsPath}',
                'error'    => 0,
                'size'     => ${uploadedFile.size},
            ];
        ?>`
```

Change to use php.run so that I can set scripPath:

```javascript
const result = await php.run({
    scriptFile: '/app/index.php',
    env: {
        // Core SSL Emulation
        HTTPS: 'on',                // Tells PHP the connection is secure
        SERVER_PORT: '443',         // Standard SSL port
        HTTP_X_FORWARDED_PROTO: 'https', // Common proxy header WP checks
        
        // WordPress URL Configuration
        HTTP_HOST: 'localhost',
        WP_HOME: 'https://localhost',   // Overrides DB site URL
        WP_SITEURL: 'https://localhost' // Overrides DB home URL
    }
});
```