import { defineConfig } from "vite"
import vue from "@vitejs/plugin-vue"
import path from 'path'

export default defineConfig({
  server: {
    host: '0.0.0.0',
    port: 5173,
    strictPort: true,
    proxy: {
      '/api': {
        target: 'http://localhost',
        changeOrigin: true,    
        secure: false      
      },
      '/sanctum': {
        target: 'http://localhost',
        changeOrigin: true,
        secure: false
      },
    },   
  },
  plugins: [   
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
      '@': path.resolve('./src')
    },
  },
})