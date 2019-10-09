var gulp         = require ('gulp'),
	sass         = require ('gulp-sass'),
	browserSync  = require ('browser-sync'),
	concat       = require ('gulp-concat'),
	uglify       = require ('gulp-uglifyjs'),
	cssnano      = require ('gulp-cssnano'),
	rename       = require ('gulp-rename'),
	autoprefixer = require ('gulp-autoprefixer'),
	del          = require ('del'),
	imagemin     = require ('gulp-imagemin'),
	//pngquant     = require ('imagemin-pngquant'),
	cache        = require ('gulp-cache');

gulp.task('sass', function() {
	return gulp.src('sass/app.scss') //*.+(scss|sass)
	.pipe(sass().on('error', sass.logError))
	.pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], {cascade: true}))
	.pipe(rename('style.css'))
	.pipe(gulp.dest('css/'))
	.pipe(browserSync.reload({stream: true}))
});

gulp.task('scripts', function() {
	return gulp.src(['app/libs/slick.min.js', 'least.min.js', 'jquery.lazyload.js']) // если нужно > 1 - библиотеки перечисляются через ','
	.pipe(concat('libs.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('app/js'));
});

gulp.task('css-libs', ['sass'], function() {
	return gulp.src('app/css/libs.css')
	.pipe(cssnano())
	.pipe(rename({suffix: '.min'}))
	.pipe(gulp.dest('app/css'));
});

gulp.task('img', function () {
	return gulp.src('app/img/**/*')
	.pipe(cache(imagemin({
		interlaced: true,
		progressive: true,
		svgoPlugins: [{removeViewBox: false}],
		use: [pngquant()]
	})))
	.pipe(gulp.dest('dist/img')); 
});

gulp.task('build', ['clean', 'img', 'sass', 'scripts'], function() {
	var buildCss      =	gulp.src(['app/css/style.css', 'app/css/libs.min.css'])
				    		.pipe(gulp.dest('dist/css'));
	var buildFonts    = gulp.src('app/fonts/**/*')
				    		.pipe(gulp.dest('dist/fonts'));
	var buildJs       = gulp.src('app/js/**/*')
				    		.pipe(gulp.dest('dist/js'));                  	
	var buildHtml     = gulp.src('app/*.html')
				    		.pipe(gulp.dest('dist/'));
	var buildFavIco   = gulp.src('app/favicons/**/*')
							.pipe(gulp.dest('dist/favicons'));
	var buildDocs     = gulp.src('app/docs/**/*')
							.pipe(gulp.dest('dist/docs'))
});

gulp.task('browser-sync', function() {
	browserSync({
		server: {
			baseDir: 'app'
		},
			notify: false
	});
});

gulp.task('clean', function() {
	return del.sync('dist');
});

gulp.task('clean-cache', function() {
	return cache.clearAll();
});

gulp.task('watch', ['browser-sync', 'css-libs', 'scripts'], function (){ //bs и sass выполняются до watch
	gulp.watch('sass/*.scss', ['sass']);
	gulp.watch('app/*.html', browserSync.reload);
	gulp.watch('app/**/*.js', browserSync.reload);
});

//установить bower -g; создать файл в корне проекта .bowerrc и в нем прописать { "directory" : "app/libs/"}
//bower i jquery <+другие библиотки>
//npm i gulp-concat gulp-uglifyjs --save-dev
//для css-библиотек: создать в sass libs.sass, туда импортировать библиотеки
//nanocss и rename для сжатия и переименования
//del для чистки проекта
