const gulp = require("gulp");
const bs = require("browser-sync").create();
const del = require("del");
const $ = require("gulp-load-plugins")({
    lazy: true
});

let hashOptions = {
    hashLength: 12,
    template: '<%= name %>-<%= hash %>.min<%= ext %>'
};

function scriptsJquery() {
    return gulp.src('src/js/jquery.js')
        .pipe($.plumber())
        .pipe($.minify({noSource: true}))
        .pipe($.concat('jquery.js'))
        .pipe($.plumber.stop())
        .pipe($.hash(hashOptions))
        .pipe(gulp.dest('dist/js'))
}

let scripts_vendors = [
    'vendors/bootstrap/js/popper.js',
    'vendors/bootstrap/dist/js/bootstrap.js',
    'vendors/fancybox/dist/jquery.fancybox.js',
    'vendors/slick/slick/slick.js',
    'vendors/select2/select2.min.js',
    'vendors/matchHeight/jquery.matchHeight.js',
];

function scriptsVendors() {
    return gulp.src(scripts_vendors)
        .pipe($.plumber())
        .pipe($.minify({noSource: true}))
        .pipe($.concat('vendors.js'))
        .pipe($.plumber.stop())
        .pipe($.hash(hashOptions))
        .pipe(gulp.dest('dist/js'))
}

function scriptsMain() {
    return gulp.src('src/js/main.js')
        .pipe($.plumber())
        .pipe($.minify({noSource: true}))
        .pipe($.concat('main.js'))
        .pipe($.plumber.stop())
        .pipe($.hash(hashOptions))
        .pipe(gulp.dest('dist/js'))
}

function scriptsWidget() {
    return gulp.src('src/js/widget.js')
        .pipe($.plumber())
        .pipe($.minify({noSource: true}))
        .pipe($.concat('widget.js'))
        .pipe($.plumber.stop())
        .pipe($.hash(hashOptions))
        .pipe(gulp.dest('dist/js'))
}

function scriptsCareer() {
    return gulp.src('src/js/career.js')
        .pipe($.plumber())
        .pipe($.minify({noSource: true}))
        .pipe($.concat('career.js'))
        .pipe($.plumber.stop())
        .pipe($.hash(hashOptions))
        .pipe(gulp.dest('dist/js'))
}

let sass_vendors = [
    'vendors/bootstrap/dist/css/bootstrap.css',
    'vendors/fancybox/dist/jquery.fancybox.css',
    'vendors/font-awesome/css/font-awesome.css',
    'vendors/slick/slick/slick.css',
    'vendors/select2/select2.min.css',
];

function sassVendors() {
    return gulp.src(sass_vendors)
        .pipe($.wait(500))
        .pipe($.plumber())
        .pipe($.sass().on('error', $.sass.logError))
        .pipe($.concat('vendors.css'))
        .pipe($.cssnano({zindex: false}))
        .pipe($.plumber.stop())
        .pipe($.hash(hashOptions))
        .pipe(gulp.dest('dist/css'))
}

function sassMain() {
    return gulp.src('src/sass/main.scss')
        .pipe($.wait(500))
        .pipe($.plumber())
        .pipe($.sass().on('error', $.sass.logError))
        .pipe($.concat('main.css'))
        .pipe($.cssnano({zindex: false}))
        .pipe($.plumber.stop())
        .pipe($.hash(hashOptions))
        .pipe(gulp.dest('dist/css'))
}

function fontAwesome() {
    return gulp.src('./vendors/font-awesome/fonts/**.*')
        .pipe(gulp.dest('./dist/fonts'));
}

function img() {
    return gulp.src('src/img/**/*')
        .pipe(gulp.dest('dist/img'))
}

function fonts() {
    return gulp.src('src/fonts/**/*')
        .pipe(gulp.dest('dist/fonts'))
}

function clean() {
    return del(["dist"], {
        force: true
    });
}

function cleanCssMain() {
    return del(["dist/css/main-*.min.css"], {
        force: true
    });
}

function cleanJsMain() {
    return del(["dist/js/main-*.min.js"], {
        force: true
    });
}

function cleanJsWidget() {
    return del(["dist/js/widget-*.min.js"], {
        force: true
    });
}

function cleanJsCareer() {
    return del(["dist/js/career-*.min.js"], {
        force: true
    });
}

function browserSync(done) {
    bs.init({
        open: 'external',
        notify: false,
        host: 'sollers.test',
        proxy: 'sollers.test',
        port: 8080
    });
    done();
}

function reload(done) {
    bs.reload();
    done();
}

function watchFiles() {
    gulp.watch('src/sass/**/*.scss', { interval: 500 }, gulp.series(cleanCssMain, sassMain, reload));
    gulp.watch('src/js/main.js', { interval: 500 }, gulp.series(cleanJsMain, scriptsMain, reload));
    gulp.watch('src/js/widget.js', { interval: 500 }, gulp.series(cleanJsWidget, scriptsWidget, reload));
    gulp.watch('src/img/**/*', { interval: 500 }, gulp.series(img, reload));
    gulp.watch('src/js/career.js', { interval: 500 }, gulp.series(cleanJsCareer, scriptsCareer, reload));
}

const watch = gulp.parallel(watchFiles, browserSync);
const build = gulp.series(clean, sassVendors, sassMain, scriptsJquery, scriptsVendors, scriptsMain, scriptsWidget, scriptsCareer, fontAwesome, fonts, img);


exports.scriptsJquery = scriptsJquery;
exports.scriptsVendors = scriptsVendors;
exports.scriptsMain = scriptsMain;
exports.scriptsWidget = scriptsWidget;
exports.scriptsCareer = scriptsCareer;
exports.sassVendors = sassVendors;
exports.sassMain = sassMain;
exports.fontAwesome = fontAwesome;
exports.img = img;
exports.fonts = fonts;
exports.clean = clean;
exports.cleanCssMain = cleanCssMain;
exports.cleanJsMain = cleanJsMain;
exports.browserSync = browserSync;
exports.reload = reload;

exports.watch = watch;
exports.build = build;
