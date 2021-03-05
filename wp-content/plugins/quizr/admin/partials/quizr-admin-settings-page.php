<div class="wrap">
    <h1>Quizr Settings</h1>
    <hr>
    <form method="post" action="options.php">
        <?php settings_fields( 'quizr_options_group' ); ?>
        <?php do_settings_sections( 'quizr_options_group' ); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Max Answers Per Question</th>
                <td>
                    <input 
                        class="quizr-text-input" 
                        type="text" 
                        id="quizr_max_answers_per_question" 
                        name="quizr_max_answers_per_question" 
                        value="<?php echo esc_attr( get_option('quizr_max_answers_per_question', QUIZR_MAX_ANSWERS_PER_QUESTION_DEFAULT) ); ?>" 
                    />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Show Questions Menu Item</th>
           
                <td>
                    <input 
                        type="checkbox" 
                        id="checkbox_example" 
                        name="quizr_show_cpt_question_in_menu" 
                        value="1"
                        <?php checked( 1, get_option('quizr_show_cpt_question_in_menu', QUIZR_SHOW_QUESTIONS_IN_MENU_DEFAULT), true ); ?>
                    />
                </td>
            </tr>
         
        </table>
        <?php  submit_button(); ?>
    </form>
</div>