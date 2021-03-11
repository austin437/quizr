class Quizr_Public_Shortcode_Question_Set {
    constructor(element) {
        this.element = element;        
        this.init();       

    }

    init() {
        console.log('init');
        this.articles = this.element.querySelectorAll("article");
        this.next_arrow = this.element.querySelector(".quizr-shortcode-question-set__arrows__next");
        this.prev_arrow = this.element.querySelector(".quizr-shortcode-question-set__arrows__prev");
        this.pips = this.element.querySelectorAll(".quizr-shortcode-question-set__pips__pip");
        this.index = 0;
        this.minItems = 0;
        this.maxItems = this.pips.length;
        this.hideAllArticles();
        if (this.articles.length > 0) this.showArticle(this.index);
        this.addEventListeners();
    }

    nextSlide() {}

    previousSlide() {}



    showArticle( index ) {
        this.articles[index].classList.add("show");
    }

    hideArticle( index ) {
        this.articles[index].classList.remove("show");
    }

    hideAllArticles() {
        for (let i=0; i<this.articles.length; i++) {
            this.hideArticle(i);
        }
    }

    showArrows(){
        this.showNextArrow( parseInt(this.index) !== this.maxItems-1);
        this.showPreviousArrow( parseInt(this.index) !== 0);
    }

    showNextArrow( show ){
        this.next_arrow.classList.remove('show');
        if( show ) this.next_arrow.classList.add('show');
    }

    showPreviousArrow( show ){
        this.prev_arrow.classList.remove("show");
        if (show) this.prev_arrow.classList.add("show");
    }

    handleNextClick(){
        if( parseInt(this.index) < parseInt(this.maxItems-1) ) this.index++;     
        this.hideAllArticles();
        this.showArticle( this.index );
        this.showArrows();
    }

    handlePrevClick(){
        if (parseInt(this.index) > 0 ) this.index--;
        this.hideAllArticles();
        this.showArticle(this.index);
        this.showArrows();
    }

    addEventListeners(){        
        this.next_arrow.addEventListener( 'click', (ev) => {ev.preventDefault(); this.handleNextClick() } );
        this.prev_arrow.addEventListener( 'click', (ev) => {ev.preventDefault(); this.handlePrevClick() } );
    }
}
