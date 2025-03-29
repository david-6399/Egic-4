import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import commonjs from "vite-plugin-commonjs"; 

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/adminLte.js",
                "resources/css/adminLte.css",
            ],
        }),
        commonjs({
            // Updated plugin usage
            filter(id) {
                // Apply to AdminLTE files only
                if (id.includes("admin-lte")) {
                    return true;
                }
                return false;
            },
        }),
    ],
});



// import { defineConfig } from 'vite';
// import laravel from 'laravel-vite-plugin';


// export default defineConfig({
//     plugins: [
//         laravel({
//             input: [
//                 'resources/css/adminLte.css',
//                 'resources/js/adminLte.js'
//             ],
//             refresh: true,
//         }),
//     ],
//     resolve: {
//         alias: {
//             '@adminlte': path.resolve(__dirname, 'resources/rec/admin-lte'),
//         }
//     }
// });