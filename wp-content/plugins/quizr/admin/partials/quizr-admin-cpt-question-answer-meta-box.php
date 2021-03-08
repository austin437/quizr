<?php

/**
 * @param array $answers
 * @param array $quizr_max_answers_per_question
 * @param int $post_id
 */

?>
<div class="quizr-admin-answer-container" data-post-id="<?php echo esc_html( $post_id ); ?>">
    <form>
        <table class="widefat">
            <thead>
                <tr>
                    <th class="row-title"> <?php echo __( 'Description', 'quizr' ); ?></th>
                    <th class="manage-column column-columnname"><?php echo __( 'Correct', 'quizr' ); ?></th>
                    <th class="manage-column column-columnname" width="10%"><?php echo __( 'Action', 'quizr' ); ?></th>                                
                </tr>
            </thead>
            <tbody>
                <?php foreach( $answers as $index => $value ) { ?>
                <tr>
                    <td>
                        <input name="quizr_question_answer[<?php echo $index; ?>][id]" type="hidden" value="<?php echo $value->id; ?>" />
                        <input name="quizr_question_answer[<?php echo $index; ?>][description]" class="widefat" value="<?php echo $value->description; ?>" type="text" readonly/>
                    </td>
                    <th class="check-column">
                        <input 
                            type="checkbox" 
                            name="quizr_question_answer[<?php echo $index; ?>][is_correct]"
                            value="" 
                            readonly
                            <?php checked( (int) $value->is_correct === 1 ); ?> 
                        />
                    </th>
                    <td class="column-columnname">
                        <div class="quizr-button-group-flex">
                            <a class="button button-secondary quizr-answer-edit" href="#" class="button button-secondary">Edit</a>
                            <a class="quizr-answer-delete quizr-button-group-flex--quizr-button-delete" data-index="<?php echo $index; ?>" href="#">Delete</a>
                        </div>
                    </td>
                </tr>                         
                <?php } ?>

                <?php for( $i=count($answers); $i<$quizr_max_answers_per_question; $i++) { ?>
                <tr>        
                    <td >
                        <input name="quizr_question_answer[<?php echo $i; ?>][id]" type="hidden" value="-1" />
                        <input name="quizr_question_answer[<?php echo $i; ?>][description]" class="widefat" value="" type="text"/>
                    </td>
                    <th class="check-column" ><input type="checkbox" name="quizr_question_answer[<?php echo $i; ?>][is_correct]" value=""  /></th>
                    <td class="column-columnname"></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </form>
</div>
