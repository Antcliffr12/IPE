var fs = require('fs');
var path = require('path');
var argv = require('yargs').argv;
var concat = require('gulp-concat');
var cleanCss = require('gulp-clean-css');

var gulp = require('gulp');
var plugins = require('gulp-load-plugins')(); // Load all gulp plugins
                                              // automatically and attach
                                              // them to the `plugins` object

var runSequence = require('run-sequence');    // Temporary solution until gulp 4
                                              // https://github.com/gulpjs/gulp/issues/355

var pkg = require('./package.json');
var dirs = {
    assets: './assets',
    bundledAssets: './assets/bundles'
};


var paths = {
  dest: 'node_modules/@fortawesome/fontawesome-free',
  bootstrap: 'node_modules/bootstrap'
}

// ---------------------------------------------------------------------
// | Helper tasks                                                      |
// ---------------------------------------------------------------------

// Purge compiled files
gulp.task('clean', function (done) {
    require('del')([
        dirs.bundledAssets
    ], done);
});


gulp.task('bootstrap-css', function() {
  return gulp.src([
    paths.bootstrap + '/dist/css/bootstrap.css',

  ])
  .pipe(plugins.concat('bootstrap.css'))
  .pipe(gulp.dest(dirs.bundledAssets));

});

gulp.task('css-main', function() {
  return gulp.src([
    dirs.assets + '/styles/*.css',
    dirs.assets + '/styles/*.less',
    paths.dest + '/css/all.css',
    // Component Styles
    dirs.assets + '/template-parts/*/*.less'
  ])
  .pipe(plugins.concat('styles.less'))
  .pipe(plugins.less())
  .pipe(gulp.dest(dirs.bundledAssets));
});

gulp.task('css', ['css-main']);

gulp.task('build', function (done) {
  runSequence(
    'bootstrap-css',

    done);
});

gulp.task('bootstrap-js', function() {
  return gulp.src([
    paths.bootstrap + '/dist/js/bootstrap.min.js'
])
.pipe(concat('bootstrap.js'))
.pipe(gulp.dest(dirs.bundledAssets));
});

gulp.task('js-main', function() {
  return gulp.src([
      //Components
      dirs.assets + '/template-parts/*/*.js',
      dirs.assets + '/scripts/*.js',
  ])
  .pipe(plugins.concat('scripts.js'))
  .pipe(gulp.dest(dirs.bundledAssets));

});

gulp.task('js', ['js-main']);

gulp.task('build', function (done) {
  runSequence(
    'bootstrap-css',
    'bootstrap-js',
    'css',
    'js',
    done);
});

gulp.task('watch', function() {
  gulp.watch(['css'])
});
gulp.task('default', ['build']);
gulp.task('default-watch', ['build', 'watch']);
