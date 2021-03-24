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

    public function insert( $values )
    {
        global $wpdb;

        $wpdb->insert( 
            $this->table_name, 
            $values
        );
    }

    public function delete( $where, $where_format )
    {
        global $wpdb;

        $wpdb->delete( 
            $this->table_name, 
            $where,
            $where_format
        );
    }



}