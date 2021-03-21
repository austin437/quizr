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
            return new \WP_REST_Response(array( 'data' => $result), 200);
        }        
    }


    public function post_check_answers( $request )
    {
        $answer_data = $request->get_param('quizr_question');

        $quizr_question_set_cpt = new Quizr_Question_Set_Cpt();

        try {
            $result = $quizr_question_set_cpt->check_answers( $answer_data );
            error_log( is_wp_error( $result ) . PHP_EOL, 3,  LOG_PATH );
            error_log( print_r( $result, true ) . PHP_EOL, 3,  LOG_PATH );
        }

        catch( \Exception $e ){
            error_log( $e->getMessage() . PHP_EOL, 0 );
            return new \WP_REST_Response([], 400);
        }

        return new \WP_REST_Response($result, 200);
    }
}
