const gulp = require('gulp'),
	header = require('gulp-header'),
	less = require('gulp-less-sourcemap');

const banner = "/*! (c) 2016 OpenAsk | MIT License */\n";

function build(cb) {
  gulp.src('app.less')
    .pipe(less({compress: true, relativeUrls: true}))
    .pipe(header(banner))
    .pipe(gulp.dest('.'))
  cb();
}

function watch(cb) {
  gulp.watch('*.less', gulp.series('build'))
	cb();
}

exports.watch = watch;
exports.build = build;
exports.default = build;
