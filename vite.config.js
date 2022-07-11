import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/colors.css',
            'resources/css/light.css',
            'resources/css/dark.css',
            'resources/css/app.css',
            'resources/css/todo.css',
            'resources/css/category.css',
            'resources/js/app.js',
        ]),
    ],
});
