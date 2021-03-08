<?php

class Quizr_Settings_Api {

    public function register_options_page() {
        add_options_page('Quizr Settings', 'Quizr', 'manage_options', 'quizr-settings', array( $this, 'render_options_page' ) );
    }

    public function render_options_page() {       
        require_once plugin_dir_path( dirname( __DIR__ ) ) . 'admin/partials/quizr-admin-settings-page.php';
    }

    public function register_settings() {
        register_setting( 'quizr_options_group', 'quizr_max_answers_per_question', array( 'type' => 'string', 'sanitize_callback' => 'sanitize_text_field'  ) );
        register_setting( 'quizr_options_group', 'quizr_show_cpt_question_in_menu', array( 'type' => 'string', 'sanitize_callback' => 'sanitize_text_field'  ) );        
    }

    public function add_plugin_page_settings_link( $links ){
        $links[] = '<a href="' .
		    admin_url( 'options-general.php?page=quizr-settings' ) .
		    '">' . __('Settings') . '</a>';
	    
        return $links;
    }


}