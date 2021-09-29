const gulp = require('gulp');//gulp本体

// Sass
const sass = require('gulp-dart-sass');// Dart Sass はSass公式が推奨 @use構文などが使える
const plumber = require("gulp-plumber"); // エラーが発生しても強制終了させない
const notify = require("gulp-notify"); // エラー発生時のアラート出力
const browserSync = require("browser-sync"); // ブラウザリロード
const autoprefixer = require('gulp-autoprefixer');
const postcss = require("gulp-postcss"); // css-mqpackerを使うために必要
const mqpacker = require('css-mqpacker'); // メディアクエリをまとめる

// image-min
const imagemin = require("gulp-imagemin");
const imageminMozjpeg = require("imagemin-mozjpeg");
const imageminPngquant = require("imagemin-pngquant");
const imageminSvgo = require("imagemin-svgo");

// 入出力するフォルダを指定

const srcPath = {
  'scss': './src/scss/**/*.scss',
  'html': '../wp/wp-content/themes/blog/*.php',
  // 'html': '../wp/wp-content/themes/blog/*.html', // 静的環境の場合
  'img': './src/images/**/*'
};

const distPath = {
  // 'css': '../wp/wp-content/themes/blog/common/css/',
  // 'img':  '../wp/wp-content/themes/blog/common/images/'
  'css': '../wp/wp-content/themes/blog/assets/css/',
  'img':  '../wp/wp-content/themes/blog/assets/images/',
  // 'html':  '../wp/wp-content/themes/blog/'
};

/**
 * sass
 *
 */
const cssSass = () => {
  return gulp.src(srcPath.scss, {
    sourcemaps: true
  })
    .pipe(
      //エラーが出ても処理を止めない
      plumber({
        errorHandler: notify.onError('Error:<%= error.message %>')
      }))
    .pipe(sass({ outputStyle: 'expanded' })) //指定できるキー expanded compressed
    .pipe(autoprefixer(TARGET_BROWSERS))
    .pipe(postcss([mqpacker()]))
    .pipe(gulp.dest(distPath.css, { sourcemaps: './maps' })) // mapコンパイル先
    .pipe(browserSync.stream()) // ページ全体リロードを防ぐ
    //   message: 'Sass compiled!',
    //   onLast: true
    // }))
}

//ベンダープレフィックスを付与する条件
const TARGET_BROWSERS = [
  'last 2 versions',
  'ie >= 11'
];


/**
 * 画像圧縮
 */
const imgImagemin = () => {
return gulp.src(srcPath.img)
  .pipe(
    imagemin(
      [
        imageminMozjpeg({
          quality: 80
        }),
        imageminPngquant(),
        imageminSvgo(),
      ], {
        verbose: true
      }
    )
  )
  .pipe(gulp.dest(distPath.img))
}

/**
 * html
 */
const html = () => {
  return gulp.src(srcPath.html)
    // .pipe(gulp.dest('../wp/wp-content/themes/blog/test/'))
}

/**
 * ローカルサーバー立ち上げ
 */
const browserSyncFunc = (done) => {
  browserSync.init(browserSyncOption);
  done();
}

const browserSyncOption = {
  proxy: 'http://kai555_wp.webcrow.local/', // 動的ローカルURLなど
  files: '../wp/wp-content/themes/blog/*.php', // 監視するファイル
  reloadOnRestart: true,
  // server: '../wp/wp-content/themes/blog/' // 静的(index.html)の場合はこれだけ
}

/**
 * リロード
 */
const browserSyncReload = (done) => {
  browserSync.reload();
  done();
}

/**
 *
 * ファイル監視 ファイルの変更を検知したら、browserSyncReloadでreloadメソッドを呼び出す
 * series 順番に実行
 * watch('監視するファイル',処理)
 */
const watchFiles = () => {
  gulp.watch(srcPath.scss, gulp.series(cssSass))
  gulp.watch(srcPath.html, gulp.series(html, browserSyncReload))
  gulp.watch(srcPath.img, gulp.series(imgImagemin, browserSyncReload))
}

/**
 * seriesは「順番」に実行
 * parallelは並列で実行
 */
exports.default = gulp.series(
  gulp.parallel(html, cssSass, imgImagemin),
  gulp.parallel(watchFiles, browserSyncFunc)
);
