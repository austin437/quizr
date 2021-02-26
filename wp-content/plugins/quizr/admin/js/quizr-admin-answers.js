class Quizr_Admin_Answers {

    constructor( element, html, render) {
        /**
         * TODO - get post_id from params
         *      - Add quizr_script_vars.nonce
         */
        this.element = element;
        this.html = html;
        this.render = render;      
    }

    init(){     
        console.log(this.element);
        this.answers = [];
        this.get_data();
        this.render_template();
    }

    render_template(){
        const template = this.html`
            <div>
               <div>
                   <table class="widefat">
                       <thead>
                           <tr>
                               <td width="90%">Answer</td>
                               <td>Correct</td>                              
                           </tr>
                       </thead>
                       <tbody>
                           ${this.answers.map(
                               (item) => html`
                                   <tr>
                                       <td></td>
                                       <td></td>
                                       <td></td>                                     
                                   </tr>
                               `
                           )}
                       </tbody>
                   </table>
               </div>
           </div>
        `;

        this.render( template, this.element);
    }

    get_data(){
        
        const self = this;

        async function get_answers() {
   
            const url = `/wp-json/quizr/v1/answer?question_id=18`;

            try {
                let r = await fetch(url, {
                    method: "GET",
                    headers: {
                        contentType: false,
                        processData: false,
                        "X-WP-Nonce": quizr_script_vars.nonce,
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