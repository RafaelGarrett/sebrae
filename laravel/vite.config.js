import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js', 'resources/js/viacep.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        //host: '0.0.0.0',
        //port: 5173,
        //strictPort: true,
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
