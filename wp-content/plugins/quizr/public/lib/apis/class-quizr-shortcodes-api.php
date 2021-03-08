<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Quizr_Shortcodes_Api {


    public function display_quiz(  )
    {
        add_shortcode( 'foobar', function( $atts ){
            return 'My Foobar shortcode';
        } );        
    }
}