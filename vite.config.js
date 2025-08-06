import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import tailwindcss from '@tailwindcss/vite';
import path from 'path';
import fs from 'fs';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/darkMode.js',
                'resources/js/app.js',
                'resources/css/app.css'
            ],
            refresh: true,
            buildDirectory: "build",
        }),
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
            'vue': 'vue/dist/vue.esm-bundler.js',
        },
    },
    server: {
        https: {
            key: fs.readFileSync('C:/OSPanel/data/ssl/projects/workflow-taki.loc/cert.key'),
            cert: fs.readFileSync('C:/OSPanel/data/ssl/projects/workflow-taki.loc/cert.crt'),
        },
        host: 'workflow-taki.loc',
        port: 5173,             
        cors: true,
    },
    build: {
        manifest: 'manifest.json',
        outDir: "public/build",
        assetsDir: "assets",
        rollupOptions: {
            output: {
                entryFileNames: 'js/[name].js',
                chunkFileNames: 'js/[name].js',
                assetFileNames: 'assets/[name].[ext]',
            },
        },
        sourcemap: false,
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,
                drop_debugger: true,
            },
        },
    },
});
