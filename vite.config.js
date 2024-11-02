import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { sync as globSync } from 'glob';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                ...globSync('resources/sass/**/*.scss'),
                ...globSync('resources/js/**/*.js'),
            ],
            refresh: true,
        }),
    ],
    build: {
        manifest: true,
        outDir: 'public/build',
    }
});
