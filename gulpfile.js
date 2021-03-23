var gulp = require("gulp");
var browserSync = require("browser-sync").create();




gulp.task("browser-sync", function () {
    browserSync.init({
        proxy: "https://www.quizzer.dev.cc"
    });
});
