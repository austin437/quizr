class Quizr_Public_Shortcode_Question_Set {
    constructor(element) {
        this.element = element;
        this.articles = this.element.querySelectorAll("article");
        this.init();
    }    

    init(){       
       this.hideAll(); 
       if (this.articles.length > 0) this.show( this.articles[0] );        
    }

    show( article ){         
        article.classList.add('show');
    }

    hideAll(){
        for( let article of this.articles ){
            this.hide( article );
        }
    }

    hide( article ){
        article.classList.remove("show");
    }

    nextSlide(){

    }

    previousSlide(){

    }

}
