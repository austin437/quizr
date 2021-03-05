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

    remove_element_from_dom(ev){
        ev.preventDefault();
        if (confirm("Are you sure you would like to delete this item?")) {
            const selected_row = helpers.find_parent_by_tag_name(ev.target, "tr");
            selected_row.remove();
            alert('You will need to click the Update button to save this deletion');
        }        
    }
    
    add_event_listeners(){

        const update_els = this.element.querySelectorAll(".quizr-answer-edit");
        for( let item of update_els ){
            item.addEventListener("click", this.enable_element_edit);
        }

        const delete_els = this.element.querySelectorAll(".quizr-answer-delete");
        for (let item of delete_els) {
            item.addEventListener("click", this.remove_element_from_dom);
        }
    }
}