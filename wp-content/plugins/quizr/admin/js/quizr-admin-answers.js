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
        this.render_template();
    }

    render_template(){
        const postTemplate = wp.template("quizr-question-answers-meta");

        const myData = {
            title: "This is awesome!",
            description: "This is description",
        };

        this.element.innerHTML = postTemplate(myData);
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
            })
            .finally(() => {
             
            });

    }
}