<?php

/**
 * @param array $answers
 */

?>
<div id="quizr-admin-answer-container" data-post-id="<?php echo esc_html( $post->ID ); ?>">
    <form>
        <table class="widefat">
            <thead>
                <tr>
                    <th class="row-title">Description</th>
                    <th class="manage-column column-columnname">Correct</th>
                    <th class="manage-column column-columnname" width="10%">Action</th>                                
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
                        <div >
                            <span><a class="quizr_answer_edit"  href="#">Edit</a> |</span>
                            <span><a class="quizr_answer_delete" data-index="<?php echo $index; ?>" href="#">Delete</a></span>
                        </div>
                    </td>
                </tr>                         
                <?php } ?>
                <tr>        
                    <td >
                        <input name="quizr_question_answer[<?php echo $index + 1; ?>][id]" type="hidden" value="-1" />
                        <input name="quizr_question_answer[<?php echo $index + 1; ?>][description]" class="widefat" value="" type="text"/>
                    </td>
                    <th class="check-column" ><input type="checkbox" name="quizr_question_answer[<?php echo $index + 1; ?>][is_correct]" value=""  /></th>
                    <td class="column-columnname"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
