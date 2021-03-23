class Quizr_Public_Shortcode_Question_Set {
    constructor(element) {
        this.element = element;
        //  this.quizr_shortcode_summary = quizr_shortcode_summary;
        this.init();
    }

    init() {
        this.start_quiz_link = this.element.querySelector(".quizr-qs-intro__start-quiz");
        this.submit_quiz_link = this.element.querySelector(".quizr-qs-summary__submit-quiz");
        this.intro = this.element.querySelector(".quizr-qs-intro");
        this.questions = this.element.querySelector(".quizr-qs-questions");
        this.cards = this.questions.children;
        this.arrows_container = this.element.querySelector(".quizr-qs-arrows");
        this.next_arrow = this.element.querySelector(".quizr-qs-arrows__next");
        this.prev_arrow = this.element.querySelector(".quizr-qs-arrows__prev");
        this.pip_container = this.element.querySelector(".quizr-qs__pips");
        this.pips = this.element.querySelectorAll(".quizr-qs__pip-a");
        this.summary = this.element.querySelector(".quizr-qs-summary");
        this.spinner = this.element.querySelector(".lds-spinner-container");
        this.index = 0;
        this.minItems = 0;
        this.maxItems = this.cards.length;
        this.updateHtml();
        this.addEventListeners();
    }

    startQuiz() {
        this.intro.classList.remove("quizr-qs--show");
        this.questions.classList.add("quizr-qs--show");
        this.arrows_container.classList.add("quizr-qs--show");
        this.pip_container.classList.add("quizr-qs__flex--show");
    }

    updateHtml() {
        this.hideAllArticles();
        this.showArrows();
        this.updatePips();
        //  this.hideSummaryForm();
        this.showArticle();

        // if (parseInt(this.index) !== parseInt(this.maxItems - 1)) {
        //     this.showArticle();
        // } else {
        //     this.showSummaryForm();
        // }
    }

    showArticle() {
        this.cards[this.index].classList.add("quizr-qs--show");
    }

    hideAllArticles() {
        for (let i = 0; i < this.cards.length; i++) {
            this.cards[i].classList.remove("quizr-qs--show");
        }
    }

    updatePips() {
        for (let i = 0; i < this.pips.length; i++) {
            this.pips[i].classList.remove("quizr-qs__pip-a--active");
        }
        this.pips[this.index].classList.add("quizr-qs__pip-a--active");
    }

    showArrows() {
        this.showNextArrow(parseInt(this.index) !== this.maxItems - 1);
        this.showPreviousArrow(parseInt(this.index) !== 0);
    }

    showNextArrow(show) {
        this.next_arrow.classList.remove("quizr-qs__flex--show");
        if (show) this.next_arrow.classList.add("quizr-qs__flex--show");
    }

    showPreviousArrow(show) {
        this.prev_arrow.classList.remove("quizr-qs__flex--show");
        if (show) this.prev_arrow.classList.add("quizr-qs__flex--show");
    }

    handleNextClick() {
        if (parseInt(this.index) < parseInt(this.maxItems - 1)) this.index++;
        this.updateHtml();
    }

    handlePrevClick() {
        if (parseInt(this.index) > 0) this.index--;
        this.updateHtml();
    }

    handlePipClick(i) {
        this.index = i;
        this.updateHtml();
    }

    submitQuiz() {
        const self = this;

        self.showSpinner(true);

        const myForm = self.element.querySelector(".quizr-form");
        const submitForm = new Quizr_Public_Shortcode_Question_Set_Submit(myForm);

        submitForm.postAnswers().then((response) => {
            self.showSummary(response);
        });
    }

    showSummary( data ) {
        this.showSpinner(false);
    }

    showSpinner(show) {
        if (show) {
            this.spinner.classList.add("lds-spinner--show");
        } else {
            this.spinner.classList.remove("lds-spinner--show");
        }
    }

    addEventListeners() {
        this.start_quiz_link.addEventListener("click", (ev) => {
            ev.preventDefault();
            this.startQuiz();
        });
        this.submit_quiz_link.addEventListener("click", (ev) => {
            ev.preventDefault();
            this.submitQuiz();
        });
        this.next_arrow.addEventListener("click", (ev) => {
            ev.preventDefault();
            this.handleNextClick();
        });
        this.prev_arrow.addEventListener("click", (ev) => {
            ev.preventDefault();
            this.handlePrevClick();
        });
        for (let i = 0; i < this.pips.length; i++) {
            this.pips[i].addEventListener("click", (ev) => {
                ev.preventDefault();
                this.handlePipClick(i);
            });
        }
    }
}
