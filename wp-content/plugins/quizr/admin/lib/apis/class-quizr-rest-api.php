<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Quizr_Rest_Api {

    public function rest_api_init()
    {
        register_rest_route( 'quizr/v1', '/answers_check', array(
            'methods' => 'POST',
            'callback' => array( new Quizr_Rest_Controller(), 'post_check_answers' ),
            'permission_callback' => function () {
                return true;
            },
            'args' => array(
                'quizr_question' => array(
                    'required' => true,
                    'validate_callback' => function($param, $request, $key) {
                        return is_array( $param );
                    }
                )
            )
        ) );
    }
}
