class Quizr_Public_Shortcode_Question_Set_Submit {
    constructor(form) {
        this.form = form;
        this.question_set_id = this.form.dataset.id;
        this.data = {};
        this.formData = {};
        this.init();
    }

    init() {
        this.formData = new FormData(this.form);
    }

    async postAnswers() {
        const self = this;

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
}
