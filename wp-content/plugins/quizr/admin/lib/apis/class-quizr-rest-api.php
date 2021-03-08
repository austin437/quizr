<?php

class Quizr_Rest_Api {

    public function rest_api_init()
    {
        register_rest_route( 'quizr/v1', '/answer', array(
            'methods' => 'GET',
            'callback' => array( new Quizr_Rest_Controller(), 'get_quizr_answers' ),
            'args' => array(
                'question_id' => array(
                    'required' => true,
                    'validate_callback' => function($param, $request, $key) {
                        return is_numeric( $param );
                    }
                )
            )
        ) );
    }
}
