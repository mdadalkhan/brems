/**
 * @author <mdadalkhan@gmail.com> 
 * Date: 04/12/2025
 */


import { defineConfig } from 'vite'
import { svelte } from '@sveltejs/vite-plugin-svelte'
import path from 'path'

export default defineConfig({
  plugins: [svelte()],
    build: {
         outDir: path.resolve(__dirname, '../public'), 
    emptyOutDir: true,
  }
})
