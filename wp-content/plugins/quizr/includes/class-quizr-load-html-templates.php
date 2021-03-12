<?php

class Quizr_Load_Html_Templates {

    public function load()
    {        
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/html/quizr-shortcodes-summary.html';
        echo 'find me here';
    }    
}