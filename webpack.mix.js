// webpack.mix.js

let mix = require('laravel-mix');
let fs = require('fs');
mix.browserSync('localhost/fashion/public');

// ADMIN

fs.readdirSync('./resources/admin/js/').map((filename)=>{
    mix.js(`resources/admin/js/${filename}`, 'public/admin/js/app.js');
})

fs.readdirSync('./resources/admin/scss/').map((filename)=>{
    mix.sass(`resources/admin/scss/${filename}`, 'public/admin/css/app.css');
})    

// ADMIN






// -- js
fs.readdirSync('resources/js/').map((filename)=>{
    mix.js(`resources/js/${filename}`, 'public/dist/js/app.js');
})

// -- scss
fs.readdirSync('./resources/scss/').map((filename)=>{
    mix.sass(`resources/scss/${filename}`, 'public/dist/css/app.css');
})
