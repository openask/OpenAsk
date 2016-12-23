var gulp = require('gulp'),
    header = require('gulp-header'),
    less = require('gulp-less-sourcemap'),
    // rename = require('gulp-rename'),
    fs = require('fs'),
    path = require('path')

var banner = "/*! (c) 2016 OpenAsk | MIT License */\n";

gulp.task('default', ['compile'])

gulp.task('compile', function () {
    gulp.src('app.less')
        // .pipe(less({compress: true, relativeUrls: true}))
        .pipe(less({
			compress: true
			,sourceMap: {
				sourceMapRootpath: ''
			}
		}))
        // .pipe(less())
        // .pipe(header(banner))
        .pipe(gulp.dest('.'))
})

gulp.task('watch', function () {
    gulp.watch('*.less', ['compile'])
})
