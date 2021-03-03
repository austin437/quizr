<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://robert.austin.com
 * @since      1.0.0
 *
 * @package    Quizr
 * @subpackage Quizr/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Quizr
 * @subpackage Quizr/admin
 * @author     Robert Austin <austin437@hotmail.com>
 */
class Quizr_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

        add_action( 'init', 'wpdocs_load_textdomain' );
  
/**
 * Load plugin textdomain.
 */
function wpdocs_load_textdomain() {
  load_plugin_textdomain( 'wpdocs_textdomain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

    public function add_tag_to_script( $tag, $handle, $src ) {

        if( $handle !== 'quizr_quizr_admin' ) return $tag; 
        
        return '<script type="module" src="' . esc_url( $src ) . '" ></script>';
    }

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Quizr_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Quizr_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/quizr-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Quizr_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Quizr_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
        wp_localize_script( 'wp-api', 'wpApiSettings', array(
            'root' => esc_url_raw( rest_url() ),
            'nonce' => wp_create_nonce( 'wp_rest' )
        ) );

        wp_enqueue_script( $this->plugin_name . '_quizr_admin_helpers', plugin_dir_url( __FILE__ ) . 'js/quizr-admin-helpers.js', array( ), $this->version, false );
        wp_enqueue_script( $this->plugin_name . '_quizr_admin_answers', plugin_dir_url( __FILE__ ) . 'js/quizr-admin-answers.js', array( ), $this->version, false );
        wp_enqueue_script( $this->plugin_name . '_quizr_admin', plugin_dir_url( __FILE__ ) . 'js/quizr-admin.js', array( 'wp-api' ), $this->version, false );
    }

}
