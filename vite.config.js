import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        tailwindcss(),
    ],
    build: {
        outDir: 'resources/dist',
        emptyOutDir: true,
        cssCodeSplit: false,
        rollupOptions: {
            input: 'resources/js/index.js',
            output: {
                entryFileNames: 'filament-nocturne-theme.js',
                assetFileNames: 'filament-nocturne-theme.css',
            },
        },
    },
})
