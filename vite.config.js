import { defineConfig, loadEnv } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import vueDevTools from 'vite-plugin-vue-devtools'

const env = loadEnv("all", process.cwd());

export default defineConfig({
    resolve: {
        alias: {
            "@layouts": "/resources/views/layouts",
            "@components": "/resources/views/components",
            "@services": "/resources/js/services",
            "@style": "/resources/sass/components",
            "@src": "/public/src",
        },
    },
    css: {
        preprocessorOptions: {
            sass: {
                additionalData: `
                    @use '/resources/sass/abstracts/variables' as *;\n
                    @use '/resources/sass/abstracts/mixins' as *;\n
                `,
            },
        },
    },
    plugins: [
        laravel({
            input: [
                "resources/js/app.js",
                "resources/sass/app.sass",
            ],
            refresh: true,
        }),
        vue(),
        vueDevTools(),
    ],
    server: {
        host: true,
        port: env.VITE_ASSET_PORT,
        strictPort: true,
        hmr: {
            host: env.VITE_ASSET_HOST,
            port: env.VITE_ASSET_PORT,
        },
    },
});
