var gulp = require('gulp');
var replace = require('gulp-replace');
var minify = require('gulp-minify');
var cleanCSS = require('gulp-clean-css');

// 自定函數
var timestamp = new Date().getTime();


// 做全部
gulp.task('all', ['url', 'css']);

// 取代網址
gulp.task('url', function(){

	// 將 controller.js 的 localhost 取代為 https
	gulp.src(['assets/controller.js'])
		.pipe(replace('http://localhost/selene_ci', 'https://selene.tw'))
		.pipe(replace('//localhost/selene_ci', 'https://selene.tw'))
		.pipe(replace('\'selene_ci/a/\'', '\'a/\''))
		.pipe(gulp.dest('build/assets'));

	// 將 script.js 的 localhost 取代為 https
	// 壓縮 script.js 的程式碼
	gulp.src(['assets/script.js'])
		.pipe(replace('http://localhost/selene_ci', 'https://selene.tw'))
		.pipe(replace('//localhost/selene_ci', 'https://selene.tw'))
		.pipe(minify({
			ext:{
				src:'-debug.js',
				min:'.js'
			},
			exclude: ['tasks'],
			ignoreFiles: ['.combo.js', '-min.js']
		}))
		.pipe(gulp.dest('build/assets'));
});

// 壓縮 CSS
gulp.task('css', function() {
	gulp.src('assets/style.css')
	.pipe(cleanCSS({compatibility: 'ie8'}))
	.pipe(gulp.dest('build/assets'));
});

// css 加入時間戳 強制更新快取
gulp.task('rev', function () {
	gulp.src(['application/views/templates/header.php'])
		.pipe(replace('assets/style.css', 'assets/style.css?v=' + timestamp))
		.pipe(gulp.dest('build/application/views/templates'));
});


gulp.task('default', function () {
    console.log('沒有選擇要執行的工作');
});
