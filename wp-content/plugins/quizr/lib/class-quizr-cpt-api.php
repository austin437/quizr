<?php

class Quizr_Cpt_Api {


    public function register_custom_post_type_quizr_question_set()
    {
        register_post_type('quizr_question_set',
            array(
                'labels'      => array(
                    'name'          => __('Quizr Question Sets', 'textdomain'),
                    'singular_name' => __('Quizr Question Set', 'textdomain'),
                ),
                    'public'      => true,
                    'has_archive' => true,
            )
        );
    }

    public function register_custom_post_type_quizr_question()
    {
        register_post_type('quizr_question',
            array(
                'labels'      => array(
                    'name'          => __('Questions', 'textdomain'),
                    'singular_name' => __('Question', 'textdomain'),
                ),
                    'public'      => false,
                    'has_archive' => true,
            )
        );
    }

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