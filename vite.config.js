import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
<<<<<<< HEAD
=======
import { sync as globSync } from 'glob';

>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9

export default defineConfig({
    plugins: [
        laravel({
            input: [
<<<<<<< HEAD
                'resources/sass/app.scss',
                'resources/js/app.js',
=======
                ...globSync('resources/sass/**/*.scss'),
                ...globSync('resources/js/**/*.js'),
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
            ],
            refresh: true,
        }),
    ],
<<<<<<< HEAD
=======
    build: {
        manifest: true,
        outDir: 'public/build',
    }
>>>>>>> 77b54b46424960bdd2cf7ccfb3a2614090b111f9
});
