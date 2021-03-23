class Quizr_Public_Shortcode_Question_Set_Summary {
    constructor(element, data, callback) {
        this.element = element;
        console.log(this.element);
        this.data = data;
        this.callback = callback;        
    }

    showSummaryForm() {
       
        const postTemplate = wp.template("quizr-shortcodes-summary");
        this.element.innerHTML = postTemplate(this.data);
        this.element.classList.add("quizr-qs--show");
      //  this.addEventListeners();
    }

    hideSummaryForm() {
        this.element.classList.remove("quizr-qs--show");
    }

    async postAnswers() {
        const self = this;

        console.log(self.formData);

        try {

            let r = await fetch(`/wp-json/quizr/v1/answers_check/${this.question_set_id}`, {
                method: "POST",
                body: self.formData,
                headers: {
                    contentType: false,
                    processData: false,
                },
            });

            return r.json();
        } catch (err) {
            console.log(err);
        }

        
    }

    submitData() {
        this.showSpinner(true);

        this.postAnswers().then((response) => {
            console.log(response);

            this.showSpinner(false);
        });
    }

    showSpinner(show) {
        if (show) {
            this.spinner.classList.add("lds-spinner--show");
        } else {
            this.spinner.classList.remove("lds-spinner--show");
        }
    }

    addEventListeners() {
        const self = this;
        const submit = this.element.querySelector(".quizr-summary-submit__a");
        submit.addEventListener("click", (ev) => {
            ev.preventDefault();
            self.submitData();
        });
        this.spinner = this.element.querySelector(".lds-spinner-container");
    }
}
