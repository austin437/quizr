<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Quizr_Shortcodes_Api {

    public function render_html( $atts, $content = null ){

        $a = shortcode_atts( array(
            'id' => -1
        ), $atts );

        $qs_id = $a['id'];

        $question_set = get_post( (int) $qs_id);

        $questions = get_posts( array(
            'post_type' => 'quizr_question',
            'numberposts' => -1,
            'meta_key' => 'quizr_question_set_id',
            'meta_value' => (int) $qs_id
        ) );

        $quizr_answers_table = new Quizr_Answers_Table();          

        ob_start();

        require_once plugin_dir_path( dirname( __DIR__ ) ) . 'public/partials/quizr-public-shortcodes.php';

        return ob_get_clean(); 
    }

    public function display_quiz(  )
    {
        add_shortcode( 'quizr_question_set', array( $this, 'render_html' ) );        
    }
}