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
                    <th >Description</th>
                    <th width="10%">Correct</th>
                    <th width="15%">Action</th>                                
                </tr>
            </thead>
            <tbody>
                <?php foreach( $answers as $index => $value ) { ?>
                <tr>
                    <td>
                        <input name="quizr_question_answer[<?php echo $index; ?>][id]" type="hidden" value="<?php echo $value->id; ?>" />
                        <input name="quizr_question_answer[<?php echo $index; ?>][description]" class="widefat" value="<?php echo $value->description; ?>" type="text" readonly/>
                    </td>
                    <td>
                        <input 
                            type="checkbox" 
                            name="quizr_question_answer[<?php echo $index; ?>][is_correct]"
                            value="" 
                            readonly
                            <?php checked( (int) $value->is_correct === 1 ); ?> 
                        />
                    </td>
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
                    <td><input type="checkbox" name="quizr_question_answer[<?php echo $index + 1; ?>][is_correct]" value=""  /></td>
                    <td class="column-columnname"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
