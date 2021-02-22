<?php

class Quizr_Question_Cpt {


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
}