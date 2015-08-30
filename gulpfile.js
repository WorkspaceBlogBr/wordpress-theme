var gulp = require('gulp'),
  $ = require('gulp-load-plugins')(),
  config = require('./config'),
  del = require("del");

gulp.task('default', ['build']);
gulp.task('build', ['clear', 'build:php', 'build:css', 'copy:assets']);
gulp.task('build:php', buildPhpTask);
gulp.task('build:css', buildCssTask);
gulp.task('copy:assets', copyAssetsTask);
gulp.task('clear', clearTask);

function buildPhpTask () {
  return gulp.src(config.files.php)
  .pipe($.debug({title: 'build PHP'}))
  .pipe($.plumber())
  .pipe(gulp.dest(config.paths.dist));
}

function buildCssTask () {
  var info = '/*\n';
  for(var i in config.info){
    info += i + ': ' + config.info[i] + '\n';
  }

  info += '*/\n\n';

  return gulp.src(config.files.css.from)
  .pipe($.debug({title: 'build CSS'}))
  .pipe($.plumber())
  .pipe($.less())
  .pipe($.concat(config.files.css.to))
  .pipe($.header(info))
  .pipe(gulp.dest(config.paths.dist));
}

function copyAssetsTask () {
  return gulp.src(config.files.assets)
  .pipe($.debug({title: 'copy assets'}))
  .pipe($.plumber())
  .pipe(gulp.dest(config.paths.dist));
}

function clearTask (){
  del.sync(config.files.dest);
}
