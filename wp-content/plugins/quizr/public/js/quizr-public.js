window.addEventListener("load", function () {
    const quizr_public_shortcode_question_set = document.querySelectorAll(".quizr-shortcode-question-set");

    for (let el of quizr_public_shortcode_question_set) {
        const summary_el = el.querySelector(".quizr-shortcode-question-set__questions__summary__display").lastElementChild;
        new Quizr_Public_Shortcode_Question_Set(el, new Quizr_Public_Shortcode_Question_Set_Summary(summary_el));
    }
});
