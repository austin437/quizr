class Quizr_Public_Shortcode_Question_Set_Summary {
    constructor(element, data, callback) {
        this.element = element;
        this.data = data;
        this.callback = callback;        
    }

    showSummaryForm() {       
        const postTemplate = wp.template("quizr-shortcodes-summary");
        this.element.innerHTML = postTemplate(this.data);
        this.element.classList.add("quizr-qs--show");
        this.addEventListeners();
    }

    hideSummaryForm() {
        this.element.innerHTML = '';
        this.element.classList.remove("quizr-qs--show");
    }

    addEventListeners() {
        const self = this;
        const submit = this.element.querySelector(".quizr-qs-results__submit-a");
        submit.addEventListener("click", (ev) => {
            ev.preventDefault();
            self.callback(self);
        });
    }
}
