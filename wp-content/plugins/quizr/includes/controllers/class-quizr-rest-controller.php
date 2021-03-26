<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Quizr_Rest_Controller {


    public function post_check_answers( $request )
    {
        
        $question_set_id = $request->get_param('question_set_id');
        $answer_data = $request->get_param('quizr_question');

        $quizr_question_set_cpt = new Quizr_Question_Set_Cpt();

        try {
            $result = $quizr_question_set_cpt->check_answers( $question_set_id, $answer_data );
        }

        catch( \Exception $e ){
            error_log( $e->getMessage() . PHP_EOL, 3, QUIZR_LOG_PATH );
            return new \WP_REST_Response([], 400);
        }

        return new \WP_REST_Response($result, 200);
    }
}
