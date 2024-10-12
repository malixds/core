import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/searchPosts.js',
                'resources/js/searchExecutors.js',
                'resources/js/Composable/Chat.js',
                'resources/css/app.css',
                ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    alias: {
        'vue': 'vue/dist/vue.esm-bundler.js',
    },
});
