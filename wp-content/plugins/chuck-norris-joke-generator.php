<?php
/**
 * @package Chuck_Norris_Joke_Generator
 * @version 1.0.0
 * 
 * Plugin Name: Chuck Norris Joke Generator
 * Plugin URI:        https://chuck-norris-joke-generator.com
 * Description:       Used by at most 12 people, the Chuck Norris Joke Generator is the possibly the best way to get Chuck Norris jokes into your WordPress site!!!
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.1
 * Author:            Robert Austin
 * Author URI:        http://robert.austin
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */


function chuck_norris_joke_generator()
{
    $response = wp_remote_request( 'https://api.chucknorris.io/jokes/random',
        array(
            'method'     => 'GET'
        )
    );
 
    $body = json_decode( wp_remote_retrieve_body($response) );

    if( ! is_object( $body ) ) exit;

    ?>

    <div class="notice notice-warning is-dismissible">
        <div class="chuck_norris_joke_container">
            <img src="<?php echo $body->icon_url; ?>" width="60" height="60"/>
            <p><?php _e( $body->value, 'sample-text-domain' ); ?></p>
        </div>
    </div>

    <?php

}


add_action( 'admin_notices', 'chuck_norris_joke_generator' );


function chuck_norris_css() {
	echo "
	<style type='text/css'>
        .chuck_norris_joke_container {
            display: flex;
        }

        .chuck_norris_joke_container img {
            margin: 5px;
        }
	</style>
	";
}

add_action( 'admin_head', 'chuck_norris_css' );