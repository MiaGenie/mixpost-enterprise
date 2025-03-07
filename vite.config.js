import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import DefineOptions from 'unplugin-vue-define-options/vite'
import fs from 'fs';
import { resolve } from 'path';
import { homedir } from 'os';

export default defineConfig(({command, mode}) => {
    // Load current .env-file
    const env = loadEnv(mode, process.cwd(), '')

    // Set the host based on APP_URL
    let host = env.APP_URL !== undefined ? new URL(env.APP_URL).host : null;
    let homeDir = homedir()
    let serverConfig = {}

    let ziggyPath = resolve('../../../vendor/tightenco/ziggy/dist/vue.m');

    if (host && homeDir) {
        const certificatesPath = env.CERTIFICATES_PATH !== undefined ? env.CERTIFICATES_PATH : `.config/valet/Certificates/${host}`;

        serverConfig = {
            https: {
                key: fs.readFileSync(
                    resolve(homeDir, `${certificatesPath}.key`),
                ),
                cert: fs.readFileSync(
                    resolve(homeDir, `${certificatesPath}.crt`),
                ),
            },
            hmr: {
                host
            },
            host
        }
    } else {
        serverConfig = {
            port: 5175,
        }
    }

    return {
        publicDir: 'vendor/mixpost-enterprise',
        plugins: [
            laravel({
                input: 'resources/js/app.js',
                publicDirectory: 'resources/dist',
                buildDirectory: 'vendor/mixpost-enterprise',
                refresh: true
            }),
            vue({
                template: {
                    transformAssetUrls: {
                        base: null,
                        includeAbsolute: false,
                    },
                },
            }),
            DefineOptions()
        ],
        resolve: {
            alias: {
                'ziggy': ziggyPath,
                '@mRs': '/../mixpost-pro-team/resources',
                '@mJs': '/../mixpost-pro-team/resources/js',
                '@mCss': '/vendor/inovector/mixpost-pro-team/resources/css',
                '@css': '/resources/css',
                '@img': 'resources/img'
            },
        },
        server: serverConfig
    }
});
