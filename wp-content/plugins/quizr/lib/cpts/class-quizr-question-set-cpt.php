<?php

class Quizr_Question_Set_Cpt {


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
}