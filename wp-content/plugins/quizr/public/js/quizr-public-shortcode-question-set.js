class Quizr_Public_Shortcode_Question_Set {

    constructor(element, quizr_shortcode_summary ) {
        this.element = element;
        this.quizr_shortcode_summary = quizr_shortcode_summary;
        this.init();
    }

    init() {
        this.start_quiz_link = this.element.querySelector(".quizr-shortcode-question-set__intro__start-quiz");
        this.intro = this.element.querySelector(".quizr-shortcode-question-set__intro");
        this.questions = this.element.querySelector(".quizr-shortcode-question-set__questions");
        this.articles = this.element.querySelectorAll(".quizr-shortcode-question-set__questions article");
        this.next_arrow = this.element.querySelector(".quizr-shortcode-question-set__arrows__next");
        this.prev_arrow = this.element.querySelector(".quizr-shortcode-question-set__arrows__prev");
        this.pips = this.element.querySelectorAll(".quizr-shortcode-question-set__pips__pip");
        this.summary = this.element.querySelector(".quizr-shortcode-question-set__questions__summary__display").lastElementChild;
        this.index = 0;
        this.minItems = 0;
        this.maxItems = this.articles.length;
        this.updateHtml();
        this.addEventListeners();
    }

    startQuiz(){
        this.intro.classList.remove('show');
        this.questions.classList.add("show");
        
    }

    updateHtml() {
        this.hideAllArticles();
        this.showArticle();
        this.showArrows();
        this.updatePips();
        if (parseInt(this.index) === parseInt(this.maxItems - 1) ) this.showSummaryForm();
    }

    showArticle() {
        this.articles[this.index].classList.add("show");
    }

    hideAllArticles() {
        for (let i = 0; i < this.articles.length; i++) {
            this.articles[i].classList.remove("show");
        }
    }

    updatePips() {
        for (let i = 0; i < this.pips.length; i++) {
            this.pips[i].classList.remove("active");
        }
        this.pips[this.index].classList.add("active");
    }

    showArrows() {
        this.showNextArrow(parseInt(this.index) !== this.maxItems - 1);
        this.showPreviousArrow(parseInt(this.index) !== 0);
    }

    showNextArrow(show) {
        this.next_arrow.classList.remove("show");
        if (show) this.next_arrow.classList.add("show");
    }

    showPreviousArrow(show) {
        this.prev_arrow.classList.remove("show");
        if (show) this.prev_arrow.classList.add("show");
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

    showSummaryForm(){
        console.log('showing summary form');
        this.quizr_shortcode_summary.showSummaryForm();
    }

    addEventListeners() {
        this.start_quiz_link.addEventListener("click", (ev) => {
            ev.preventDefault();
            this.startQuiz();
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
            this.pips[i].firstChild.addEventListener("click", (ev) => {
                ev.preventDefault();
                this.handlePipClick(i);
            });
        }
    }
}
