import { defineConfig } from 'vite';
import { svelte } from '@sveltejs/vite-plugin-svelte';
import tailwindcss from '@tailwindcss/vite'

import path from 'path';

export default defineConfig({
  plugins: [svelte(), tailwindcss()],
  base: '/build',
  build: {
    outDir: path.resolve(__dirname, '../public/build'),
    emptyOutDir: true
  }
});
