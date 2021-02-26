<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Quizr_Answers_Table
{
    private $table_name;
    private $primary_key;
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

    public function index( $question_id )
    {
        global $wpdb;

        $sql = $wpdb->prepare( 
                "SELECT * FROM  " . $this->table_name . "  WHERE quizr_question_id=%d " ,  
                array( $question_id ) 
        );
            
        return $wpdb->get_results( 
            $sql
        );
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