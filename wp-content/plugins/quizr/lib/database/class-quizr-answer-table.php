<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Quizr_Answers_Table
{
    /**
     * Get things started
     *
     * @access  public
     * @since   1.0
    */
    public function __construct() {
        global $wpdb;
        $this->table_name  = $wpdb->prefix . 'quizr_answers';
        $this->primary_key = 'id';
    }

    public function insert()
    {
        // global $wpdb;

        // $table_name = $wpdb->prefix . 'liveshoutbox';

        // $wpdb->insert( 
        //     $table_name, 
        //     array( 
        //         'time' => current_time( 'mysql' ), 
        //         'name' => $welcome_name, 
        //         'text' => $welcome_text, 
        //     ) 
        // );

    }



}