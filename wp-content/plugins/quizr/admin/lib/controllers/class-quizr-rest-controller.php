<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Quizr_Rest_Controller {

    public function get_quizr_answers( $request )
    {
        $question_id = $request->get_param( 'question_id' );

        $quizr_answers_table = new Quizr_Answers_Table();

        $result = $quizr_answers_table->index( $question_id );

        if( is_wp_error($result) )
        {
            return new WP_Error( 'quizr_answers', 'Invalid answers', array( 'status' => 400 ) );
        }
        else
        {
            return new \WP_REST_Response($result, 200);
        }

        
  
    }
}
