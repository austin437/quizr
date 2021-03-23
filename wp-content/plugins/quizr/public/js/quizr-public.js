window.addEventListener("load", function () {
    const quizr_qs = document.querySelectorAll(".quizr-qs");

    for (let el of quizr_qs) {
        new Quizr_Public_Shortcode_Question_Set(el);
    }
});
