class Quizr_Admin_Answers {

    constructor( element ) {
        this.element = element;
        this.add_event_listeners();
    }

    enable_element_edit(ev){
        ev.preventDefault();
        const selected_row = helpers.find_parent_by_tag_name( ev.target, 'tr' );
        const my_description = selected_row.querySelectorAll("input");
        for( let item of my_description){
            item.removeAttribute('readonly');
        }
    }
    
    add_event_listeners(){
        const update_els = this.element.getElementsByClassName("quizr_answer_edit");
        for( let item of update_els ){
            item.addEventListener("click", this.enable_element_edit);
        }
    }
}