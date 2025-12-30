import { defineConfig } from "vite";

export default defineConfig({
    server: {
        host: "0.0.0.0",
        port: 5173,
        hmr: {
            host: "localhost",
        },
    },
    build: {
        outDir: "public/build",
        manifest: true,
        rollupOptions: {
            input: "resources/js/app.js",
        },
    },
    publicDir: "resources/images",
});
