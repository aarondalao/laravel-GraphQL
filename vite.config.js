import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/GraphQL.css',
            'resources/js/GraphQL.js',
        ]),
    ],
});
