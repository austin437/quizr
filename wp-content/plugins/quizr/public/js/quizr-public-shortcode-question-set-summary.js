class Quizr_Public_Shortcode_Question_Set_Summary {

    constructor(element) {
        this.element = element;
        this.data = {};
        this.formData = {};
    }

    showSummaryForm( formName ){
        
        const quizr_form = document.querySelector(`[name='${formName}']`);
        this.formData = new FormData(quizr_form);

        let data = [];

        for (let entry of this.formData.entries()) {
            // let tempData = {};

            // const answer_data = entry[1].split("|");

            // tempData.question_id = entry[0].split("|")[1];
            // tempData.answer_id = answer_data[0];
            // tempData.answer_description = answer_data[1];
            // tempData.question_title = answer_data[2];

            // data.push(tempData);
        }



        const postTemplate = wp.template("quizr-shortcodes-summary");

        // this.data = {
        //     answers: data,
        // };

        this.data = {
            answers: []
        }

        this.element.innerHTML = postTemplate(this.data);
        this.element.classList.add("quizr-qs--show");
        this.addEventListeners();
    }

    hideSummaryForm(){
        this.element.classList.remove("quizr-qs--show");
    }

    async postAnswers(){
        const self = this;

        for (let entry of this.formData.entries()) {
            console.log(entry);
        }

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
        //console.log( JSON.stringify(this.data));

        this.postAnswers()
            .then(response => console.log(response ) );

    }

    addEventListeners(){
        const self = this;
        const submit = this.element.querySelector(".quizr-summary-submit__a");
        submit.addEventListener('click', (ev) => {ev.preventDefault(); self.submitData();})
    }

   
}
