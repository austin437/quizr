class Quizr_Public_Shortcode_Question_Set_Summary {

    constructor(element) {
        this.element = element;
        this.init();
    }

    init() {
       console.log(this.element);
    }


    showSummaryForm( formData ){

        console.log(formData );
        const postTemplate = wp.template("quizr-shortcodes-summary");
        
        const data = {
            answers: [],
            description: []
        };

        this.element.innerHTML = postTemplate(data);
    }

   
}
