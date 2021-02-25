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

        $this->table_name  = $wpdb->prefix . 'aet0ea9e1_user_activity';
        $this->primary_key = 'id';
        $this->version     = '1.0';

    }


    /**
     * Create the table
     *
     * @access  public
     * @since   1.0
    */
    public function create_table() {

        global $wpdb;

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

        $sql = "CREATE TABLE IF NOT EXISTS $this->table_name (
            id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
            user_id INT NOT NULL,
            course_id INT NULL,
            activity_date DATETIME NOT NULL,
            meta_key VARCHAR(255) NOT NULL,
            meta_value VARCHAR(255) NOT NULL,
            PRIMARY KEY  (id)
            ) CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
            
        dbDelta($sql);
    } 

}