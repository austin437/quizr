class Quizr_Admin_Answers {

    constructor( element, html, render) {
        this.element = element;
        this.html = html;
        this.render = render;   
    }

    init(){            
        this.question_id = this.element.dataset.postId;
        this.answers = [];
        this.get_data();
    }

    render_template(){
        const postTemplate = wp.template("quizr-question-answers-meta");

        const data = {
            answers: this.answers
        };

        this.element.innerHTML = postTemplate( data );

        this.add_event_listeners();
        
    }

    get_data(){
        
        const self = this;

        async function get_answers() {
   
            const url = wpApiSettings.root + `quizr/v1/answer?question_id=${self.question_id}`;

            try {
                let r = await fetch(url, {
                    method: "GET",
                    headers: {
                        contentType: false,
                        processData: false,
                        "X-WP-Nonce": wpApiSettings.nonce,
                    },
                });
                return r.json();
            } catch (e) {
                console.log("Error:", e);
            }
        }

        get_answers()
            .then((response) => {
                console.log( response );
                this.answers = response;
                this.render_template();
            })
            .finally(() => {
             
            });

    }
    

    add_event_listeners(){

        const self = this;
        
        const els = this.element.getElementsByClassName("quizr-update");

        for (let i = 0; i < els.length; i++) {
            els[i].addEventListener("click", function (ev) {
                self.answers.push({ id: "4", answer: "London", is_correct: "0" });
                self.render_template();
            });
        }
    }
}