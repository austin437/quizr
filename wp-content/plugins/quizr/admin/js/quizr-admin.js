window.addEventListener("load", function () {

    
    const quizr_admin_answers_el = document.getElementById("quizr-admin-answer-container");
    
    if( quizr_admin_answers_el != null) {
        const quizrAdminAnswers = new Quizr_Admin_Answers( quizr_admin_answers_el );
    } 

});

