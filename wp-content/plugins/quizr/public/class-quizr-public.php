<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://robert.austin.com
 * @since      1.0.0
 *
 * @package    Quizr
 * @subpackage Quizr/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Quizr
 * @subpackage Quizr/public
 * @author     Robert Austin <austin437@hotmail.com>
 */
class Quizr_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {		

        wp_enqueue_style( $this->plugin_name . '-public-spinner', plugin_dir_url( __FILE__ ) . 'css/quizr-public-spinner.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '-public-shortcode-question-set', plugin_dir_url( __FILE__ ) . 'css/quizr-public-shortcode-question-set.css', array(), $this->version, 'all' );
        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/quizr-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

        
        wp_enqueue_script( $this->plugin_name . '_quizr_public_shortcode_question_set', 
            plugin_dir_url( __FILE__ ) . 'js/quizr-public-shortcode-question-set.js', 
            array( 'jquery' ), $this->version, false 
        );
        wp_enqueue_script( $this->plugin_name . '_quizr_public_shortcode_question_set_submit', 
            plugin_dir_url( __FILE__ ) . 'js/quizr-public-shortcode-question-set-submit.js', 
            array( 'jquery', 'wp-util' ), $this->version, false 
        );

        wp_enqueue_script( $this->plugin_name . '_quizr_public_shortcode_question_set_summary', 
            plugin_dir_url( __FILE__ ) . 'js/quizr-public-shortcode-question-set-summary.js', 
            array( 'jquery', 'wp-util' ), $this->version, false 
        );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/quizr-public.js', array( 'jquery' ), $this->version, false );
        
	}
    
    /**
     * Register shortcodes to display quiz
     *
     * @since    1.0.1
     */
    public function register_shortcodes(){
        $shortcodesApi = new Quizr_Shortcodes_Api();
        $shortcodesApi->display_quiz();
    }

}
