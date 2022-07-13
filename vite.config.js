import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/colors.css',
            'resources/css/light.css',
            'resources/css/light_cyan.css',
            'resources/css/light_green.css',
            'resources/css/light_grey.css',
            'resources/css/light_orange.css',
            'resources/css/light_pink.css',
            'resources/css/light_yellow.css',
            'resources/css/dark.css',
            'resources/css/dark_cyan.css',
            'resources/css/dark_green.css',
            'resources/css/dark_grey.css',
            'resources/css/dark_orange.css',
            'resources/css/dark_pink.css',
            'resources/css/dark_yellow.css',
            'resources/css/app.css',
            'resources/css/todo.css',
            'resources/css/category.css',
            'resources/js/app.js',
        ]),
    ],
});
