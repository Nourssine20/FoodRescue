import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';
import path from 'path';
function getFiles(dir, extension = '.js') {
    let files = [];
    fs.readdirSync(dir).forEach(file => {
        const fullPath = path.join(dir, file);
        if (fs.statSync(fullPath).isDirectory()) {
            files = [...files, ...getFiles(fullPath, extension)];
        } else if (fullPath.endsWith(extension)) {
            files.push(fullPath);
        }
    });
    return files;
}

export default defineConfig({
    plugins: [
        laravel({
            input: [...getFiles('resources/assets/css'), ...getFiles('resources/assets/js')
                ,...getFiles('resources/assets/vendor/fonts')
                ,...getFiles('resources/assets/vendor/js')
                ,...getFiles('resources/assets/vendor/libs')
                ,...getFiles('resources/assets/vendor/scss')
            
            
            ],
            refresh: true,
        }),
    ],
});