// vite.config.js
import { defineConfig } from 'vite';
import { nodePolyfills } from 'vite-plugin-node-polyfills';

export default defineConfig({
    plugins: [
        nodePolyfills(),
    ],
    build: {
        target: 'esnext',
        lib: {
            // Could also be a dictionary or array of multiple entry points
            entry: `${__dirname}/lib/index.js`,
            name: 'wp-pwa',
            // the proper extensions will be added
            fileName: 'wp-pwa',
            formats: ["es"]
        },
    },
})