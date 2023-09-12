import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/svg.css'],
            refresh: true,
        }),
    ],
    server: {
        https: true,
        // If you have custom certificates, you can specify them as well:
        // https: {
        //     key: fs.readFileSync('/path/to/your/private.pem'),
        //     cert: fs.readFileSync('/path/to/your/fullchain.pem'),
        // }
    }
});