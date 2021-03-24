const { watch, parallel } = require("gulp");
const browserSync = require("browser-sync").create();

const showSite = (cb) => {
    browserSync.init({
        proxy: "https://www.quizzer.dev.cc",
    });
    cb();
};

const reload = (cb) => {
    browserSync.reload();
    cb();
};

const watchFiles = (cb) => {
    watch("wp-content/plugins/quizr/**/*.css", reload);
    watch("wp-content/plugins/quizr/**/*.js", reload);
    watch("wp-content/plugins/quizr/**/*.php", reload);
    watch("wp-content/plugins/quizr/**/*.html", reload);
    cb();
};

exports.default = parallel(watchFiles, showSite);