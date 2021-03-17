window.addEventListener("load", function () {
    const quizr_qs = document.querySelectorAll(".quizr-qs");

    for (let el of quizr_qs) {
        const summary_el = el.querySelector(".quizr-qs-summary").lastElementChild;
        new Quizr_Public_Shortcode_Question_Set(el, new Quizr_Public_Shortcode_Question_Set_Summary(summary_el, el.dataset.questionSetId ));
    }
});
