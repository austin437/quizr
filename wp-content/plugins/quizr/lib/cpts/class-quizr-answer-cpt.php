<?php

class Quizr_Answer_Cpt {


    public function register_custom_post_type_quizr_answer()
    {
        register_post_type('quizr_answer',
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