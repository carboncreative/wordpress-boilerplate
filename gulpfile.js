var gulp = require('gulp');
var args   = require('yargs').argv;
var gulpif = require('gulp-if');
var sass = require('gulp-ruby-sass');
var nodesass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var spawn = require('child_process').spawn;
var minifycss = require('gulp-minify-css');
var livereload = require('gulp-livereload');
var clc = require('cli-color');
var fs = require('fs');
var notify = require('gulp-notify');
var lr = require('tiny-lr');
var git = require('git-rev');
var server = lr();
var themeRoot = './web/wp-content/themes/themename';
var loadPaths = [themeRoot + '/bower_components/bootstrap-sass-official/assets/stylesheets'];

var fastSass = args.fast === true;
var sourcemaps = args.sm === true;

if (sourcemaps) {
    console.log(clc.white.bgRed('The sourcemaps mode will NOT autoprefix. This should not be used in production'));
}
if (fastSass) {
    console.log(clc.white.bgRed("Fast mode uses libsass which has a few bugs. Don't use it on production"));
}

function handleError(err) {
    console.log(err.toString());
    this.emit('end');
}

gulp.task('gitVersion', function () {
    git.short(function (str) {
        fs.writeFile(__dirname + '/web/version.php', "<?php define('SITE_VERSION', '" + str + "');");
    });
});

gulp.task('styles', function () {
    if (sourcemaps) {
        gulp.src(themeRoot + '/sass/**/*.scss')
            .pipe(gulpif(!fastSass, sass({
                sourcemap: true,
                precision: 10,
                loadPath: loadPaths,
                style: 'compact'
            }).on('error', handleError)))
            .pipe(gulpif(fastSass, nodesass({
                errLogToConsole: true,
                sourceComments: 'map',
                includePaths: loadPaths
            })))
            .pipe(gulp.dest(themeRoot + '/css'))
            .pipe(livereload(server))
            .pipe(notify({ message: 'SASS/Sourcemap compiled' }));
    } else {
        gulp.src(themeRoot + '/sass/**/*.scss')
            .pipe(gulpif(!fastSass, sass({
                precision: 10,
                loadPath: loadPaths
            }).on('error', handleError)))
            .pipe(gulpif(fastSass, nodesass({
                errLogToConsole: true,
                includePaths: loadPaths
            })))
            .pipe(prefix("last 2 versions", "> 1%", "ie 8", "ie 7"))
            .pipe(minifycss())
            .pipe(gulp.dest(themeRoot + '/css'))
            .pipe(livereload(server))
            .pipe(notify({ message: 'SASS/Sourcemap compiled' }));
    }
});

gulp.task('watch', ['styles'], function() {
    server.listen(35729, function (err) {
        if (err) {
            throw err;
        }
    });

    gulp.watch(themeRoot + '/sass/**/*.scss', ['styles']);

    gulp.watch(themeRoot + '/js/**/*.js', function(file){
        gulp.src(file.path)
            .pipe(livereload(server));
    });

    gulp.watch(themeRoot + '/img/**/*', function(file){
        gulp.src(file.path)
            .pipe(livereload(server));
    });

    gulp.watch(themeRoot + '/**/*.php', function(file){
        gulp.src(file.path)
            .pipe(livereload(server));
    });
});

gulp.task('build', ['styles', 'gitVersion']);
