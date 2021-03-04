<?php

class Quizr_Question_Set_Cpt {

    const CPT_NAME = 'quizr_question_set';

    public function add_meta_boxes()
    {
        add_meta_box(
            'quizr-questions',
            __( 'Questions', 'quizr' ),
            array( $this, 'render_questions_metabox' ),
            static::CPT_NAME,
            'advanced',
            'default'
        );
    }

    public function render_questions_metabox( $post ) {
        
        $post_id = $post->ID;

        $questions = get_posts( 
            array( 
                'post_type' => 'quizr_question',
                'meta_key' => 'quizr_question_set_id',
                'meta_value' => (int) $post->ID,
            ) 
        );

        require_once plugin_dir_path( dirname( __DIR__ ) ) . 'admin/partials/quizr-admin-cpt-question-set-question-meta-box.php';       
    }


    public function register_custom_post_type_quizr_question_set()
    {
        register_post_type( static::CPT_NAME,
            array(
                'labels'      => array(
                    'name'          => __('Quizr Question Sets', 'textdomain'),
                    'singular_name' => __('Quizr Question Set', 'textdomain'),
                ),
                'public'      => true,
                'has_archive' => true,
                'supports' => array('title','thumbnail'),
            )
        );
    }
}