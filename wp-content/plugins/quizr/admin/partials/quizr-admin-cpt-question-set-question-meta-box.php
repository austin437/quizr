<?php

/**
 * 
 * 
 */

wp_nonce_field( 'quizr_question_set_id_nonce', 'quizr_question_set_id_nonce_' . $post->ID );

?>
<div style="display:flex; justify-content: space-between;">
    <div id="target">Loading...</div>
</div>