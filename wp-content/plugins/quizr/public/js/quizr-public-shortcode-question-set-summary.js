class Quizr_Public_Shortcode_Question_Set_Summary {

    constructor(element) {
        this.element = element;
    }

    showSummaryForm( answer_data ){

        
        const postTemplate = wp.template("quizr-shortcodes-summary");

        const data = {
            answers: answer_data
        };

        console.log(data);

        this.element.innerHTML = postTemplate(data);
    }

   
}
