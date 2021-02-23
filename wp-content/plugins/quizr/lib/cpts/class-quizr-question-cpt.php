<?php

class Quizr_Question_Cpt {

    const CPT_NAME = 'quizr_question';

    public function add_meta_boxes()
    {
        add_meta_box(
            'quizr-question-set',
            __( 'Question Set', 'textdomain' ),
            array( $this, 'render_metabox' ),
            static::CPT_NAME,
            'side',
            'default'
        );
    }

    public function render_metabox( $post ) {

        $question_sets = get_posts( array( 'post_type' => 'quizr_question_set' ) );

        wp_nonce_field( 'quizr_question_set_nonce_action', 'k4EaQtHP' );

        ?>
            <select id="quizr_question_meta" name="quizr_question_meta" class="widefat">
                <option value="" ></option>
                <?php foreach( $question_sets as $qs ) { ?>
                    <option value="<?php echo esc_html($qs->ID); ?>"><?php echo esc_html($qs->post_title); ?></option>
                <?php } ?>
            </select>  
        <?php
    }

     function save_custom_meta_data($id) {

        global $post; 

        if( ! is_object( $post ) ) return; 

        if ( $post->post_type !== static::CPT_NAME ) return;

        $post_data = sanitize_post( $_POST );       

        var_dump( $post_data ); die();
        
        /* --- security verification --- */
        // if(!wp_verify_nonce($post_data['aet0ea9e1_custom_attachment_nonce'], plugin_basename(__FILE__))) {
        //   return $id;
        // } // end if

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