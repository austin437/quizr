window.addEventListener("load", function () {
    
    const quizr_admin_answers_containers = document.querySelectorAll(".quizr-admin-answer-container");
    
    for( let el of quizr_admin_answers_containers){
        new Quizr_Admin_Answers( el );
    } 

});

