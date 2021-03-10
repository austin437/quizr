window.addEventListener("load", function () {

    const quizr_public_shortcode_question_set = document.querySelectorAll(".quizr-shortcode-question-set");

    for (let el of quizr_public_shortcode_question_set) {
        new Quizr_Public_Shortcode_Question_Set(el);
    } 
});
