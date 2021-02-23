<?php

class Quizr_Answer_Cpt {

    const CPT_NAME = 'quizr_answer';

    public function register_custom_post_type_quizr_answer()
    {
        register_post_type( static::CPT_NAME,
            array(
                'labels'      => array(
                    'name'          => __('Answers', 'textdomain'),
                    'singular_name' => __('Answer', 'textdomain'),
                ),
                    'public'      => false,
                    'has_archive' => true,
            )
        );
    }
}