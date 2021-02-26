<?php

class Quizr_Question_Cpt {

    const CPT_NAME = 'quizr_question';

    public function add_meta_boxes()
    {
        add_meta_box(
            'quizr-question-set',
            __( 'Question Set', 'textdomain' ),
            array( $this, 'render_question_set_metabox' ),
            static::CPT_NAME,
            'side',
            'default'
        );

        add_meta_box(
            'quizr-answers',
            __( 'Answers', 'textdomain' ),
            array( $this, 'render_answers_metabox' ),
            static::CPT_NAME,
            'advanced',
            'default'
        );
    }

    public function render_question_set_metabox( $post ) 
    {

        $question_sets = get_posts( array( 'post_type' => 'quizr_question_set' ) );

        wp_nonce_field( 'quizr_question_set_id_nonce', 'quizr_question_set_id_nonce_' . $post->ID );

        $meta_value = get_post_meta( $post->ID, 'quizr_question_set_id', true );

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
        <?php
    }

    public function render_answers_metabox( $post )
    {
        //add post id field here
        ?>
            <div id="quizr-admin-answer-container"></div>
        <?php
    }

    function save_custom_meta_data($id) 
    {

        global $post; 

        if( ! is_object( $post ) ) return; 

        if ( $post->post_type !== static::CPT_NAME ) return;

        $post_data = sanitize_post( $_POST );      

        check_admin_referer( 'quizr_question_set_id_nonce', 'quizr_question_set_id_nonce_' . $id );

        if( array_key_exists('quizr_question_set_id', $post_data) ) update_post_meta($id, 'quizr_question_set_id', $post_data['quizr_question_set_id']);        

    }


    public function register_custom_post_type_quizr_question()
    {
        register_post_type( static::CPT_NAME,
            array(
                'labels'      => array(
                    'name'          => __('Questions', 'textdomain'),
                    'singular_name' => __('Question', 'textdomain'),
                ),
                    'public'      => true,
                    'has_archive' => true,
            )
        );
    }
}