<?php

/**
 * @param object $post
 * @param array $question_sets
 * @param int $meta_value
 */

wp_nonce_field( 'quizr_question_set_question_nonce', 'quizr_question_set_question_nonce_' . $post->ID );

?>
<select id="quizr_question_set_id" name="quizr_question_set_id" class="widefat">
    <option value="" ></option>
    <?php foreach( $question_sets as $qs ) { ?>
        <option 
            value="<?php echo esc_html($qs->ID); ?>" 
            <?php echo (int) $qs->ID === (int) $meta_value ? 'selected="selected"' : ''; ?> 
        ><?php echo esc_html($qs->post_title); ?></option>
    <?php } ?>
</select>  