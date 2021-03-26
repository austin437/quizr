<?php

/**
 * @param array $questions
 * @param int $post_id
 */

?>
<div class="quizr-question-set-question-container" data-post-id="<?php echo esc_html( $post_id ); ?>">
    <a class="button" href="<?php echo admin_url('post-new.php?post_type=quizr_question') . "&question_set_id=$post_id"; ?>">Add New</a>
    <hr />
    <table class="widefat">
        <thead>
            <tr>
                <th class="row-title"> 
                    <?php echo __( 'Title', 'quizr' ); ?>
                </th>
                <th class="manage-column column-columnname" width="10%"><?php echo __( 'Action', 'quizr' ); ?></th>                      
            </tr>
        </thead>
        <tbody>
            <?php foreach( $questions as $index => $value ) { ?>            
            <tr>
                <td>
                    <?php echo esc_html( $value->post_title ); ?>
                </td>
                <td class="column-columnname">
                    <div>
                        <span><a href="<?php echo get_edit_post_link( $value->ID ); ?>" class="button button-secondary">Edit</a></span>
                    </div>
                </td>
            </tr>                         
            <?php } ?>
        </tbody>
    </table>
</div>
