class Quizr_Public_Shortcode_Question_Set_Summary {

    constructor(element) {
        this.element = element;
        this.data = {};
        this.formData = {};
    }

    showSummaryForm( quizr_forms ){

        this.formData = new FormData();

        const data = [];

        for( let i=0; i<quizr_forms.length; i++ ){

            const question_id = quizr_forms[i].dataset['id'];
            const tempForm = new FormData( quizr_forms[i] );              
            data[i] = { id: question_id, answer: {} };

            for (let [key, value] of tempForm.entries()) {
               
                const newKey = `quizr_question[${question_id}]`;

                if( key === 'question' ){
                    this.formData.set(`${newKey}[question]`, value);
                    data[i].question = value;
                }

                if( key === 'answer' ){
                    const answer_array = value.split( '|' );            
                    this.formData.set(`${newKey}[answer][id]`, answer_array[0]);
                    this.formData.set(`${newKey}[answer][description]`, answer_array[1]);

                    
                    data[i].answer.id = answer_array[0];
                    data[i].answer.description = answer_array[1];
                     
                }
            }
        }

        const postTemplate = wp.template("quizr-shortcodes-summary");

        this.data = data;

        this.element.innerHTML = postTemplate(this.data);
        this.element.classList.add("quizr-qs--show");
        this.addEventListeners();
    }

    hideSummaryForm(){
        this.element.classList.remove("quizr-qs--show");
    }

    async postAnswers(){
        const self = this;

        let r = await fetch(`/wp-json/quizr/v1/answers_check`, {
            method: "POST",
            body: self.formData,
            headers: {
                contentType: false,
                processData: false
            },
        });
        return r.json();
    }

    submitData(){
       
        /**
         * show spinner...
         */
        this.postAnswers()
            .then(response => console.log(response ) );

    }

    addEventListeners(){
        const self = this;
        const submit = this.element.querySelector(".quizr-summary-submit__a");
        submit.addEventListener('click', (ev) => {ev.preventDefault(); self.submitData();})
    }

   
}
