// const elixir = require('laravel-elixir');

// require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// elixir(mix => {
//     mix.sass('app.scss')
//        .webpack('app.js');
// });

// ELI BELOW

var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');

function handleError(error) {
    console.log(error.toString())
    this.emit('end')
}


gulp.task('browserSync', function() {
    browserSync.init({
        server: {
            baseDir: '.',
            proxy: 'ezlateva.int:8080'
        }
    })
})

gulp.task('sass', function() {
    return gulp.src('/eli/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded'
        }))
        .on('error', handleError)
        .pipe(autoprefixer({
            browsers: ['last 5 versions'],
        }))
        .pipe(sourcemaps.write('/.maps'))
        .pipe(gulp.dest('/eli/css'))
        .pipe(browserSync.reload({
            stream: true
        }))
})


gulp.task('watch', ['browserSync', 'sass'], function() {
    gulp.watch('/eli/scss/**/*.scss', ['sass']);
    gulp.watch('/*.*', browserSync.reload);
    gulp.watch('/eli/vendors/**/*.js', browserSync.reload);
})