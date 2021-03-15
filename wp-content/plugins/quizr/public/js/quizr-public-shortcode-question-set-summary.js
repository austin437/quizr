class Quizr_Public_Shortcode_Question_Set_Summary {

    constructor(element) {
        this.element = element;
        this.data = {};
    }

    showSummaryForm( answer_data ){
        
        const postTemplate = wp.template("quizr-shortcodes-summary");

        this.data = {
            answers: answer_data,
        };

        this.element.innerHTML = postTemplate(this.data);
        this.element.classList.add("quizr-qs--show");
        this.addEventListeners();
    }

    hideSummaryForm(){
        this.element.classList.remove("quizr-qs--show");
    }

    submitData(){
        console.log(this.data);

        /**
         * 
         */

    }

    addEventListeners(){
        const self = this;
        const submit = this.element.querySelector(".quizr-summary-submit__a");
        submit.addEventListener('click', (ev) => {ev.preventDefault(); self.submitData();})
    }

   
}
