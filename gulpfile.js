var elixir = require('laravel-elixir');
var gulp = require('gulp');
var jade = require('gulp-jade');

elixir.config.production = true;

var outputDir = 'public/assets/',
    jsDir = outputDir + 'js/',
    cssDir = outputDir + 'css/';

elixir(function(mix) {
  mix.task('jade', 'public/html/jade/**/*.jade');

  mix
    .browserSync({
      open: false,
      files: [cssDir + '**/*.css', 'public/html/**/*.html'],
      proxy: 'http://makasih.dev',
    })
    .sass('app.scss', cssDir)
    .scripts(['plugins.js', 'app.js'], jsDir + 'app.js');
});

gulp.task('jade', function() {
  return gulp.src(['public/html/jade/**/*.jade', '!public/html/jade/**/layout.jade', '!public/html/jade/**/_includes/*.jade'], {
      base: 'public/html/jade/pages'
    })
      .pipe(jade({
        pretty: true
      }))
      .pipe(gulp.dest('public/html/'))
});