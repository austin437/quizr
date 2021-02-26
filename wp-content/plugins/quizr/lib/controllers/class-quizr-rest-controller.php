<?php

class Quizr_Rest_Controller {

    public function get_quizr_answers( $request )
    {
        var_dump( $request->get_params() );
        return 'here are some answers';
    }
}
