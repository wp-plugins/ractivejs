<?php
/**
 * Plugin Name: RactiveJS
 * Plugin URI: http://www.fuzzguard.com.au/plugins/ractive-js
 * Description: Adds RactiveJS FrameWork library to WordPress
 * Version: 1.0.0
 * Author: Benjamin Guy
 * Author URI: http://www.fuzzguard.com.au
 * Text Domain: ractive-js
 * License: GPL2

    Copyright 2014  Benjamin Guy  (email: beng@fuzzguard.com.au)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/


/**
* Don't display if wordpress admin class is not found
* Protects code if wordpress breaks
* @since 0.1
*/
if ( ! function_exists( 'is_admin' ) ) {
    header( 'Status: 403 Forbidden' );
    header( 'HTTP/1.1 403 Forbidden' );
    exit();
}




/**
* Create class ractiveJS() to prevent any function name conflicts with other WordPress plugins or the WordPress core.
* @since 0.1
*/
class ractiveJS {

        /**
        * Loads localization files for each language
        * @since 1.3
        */
        function _action_init()
        {
                // Localization
                load_plugin_textdomain('style-admin', false, 'style-admin/lang/');
        }


        /**
        * Adds the custom logo to the admin panel login page overwritting the default CSS
        * @since 1.2
        */
        function register_js_file()
        {
		wp_register_script ('ractive-js', WP_PLUGIN_URL.'/ractive-js/ractive.js', false, '0.7.3', true);
		wp_register_script ('ractive-hover', WP_PLUGIN_URL.'/ractive-js/plugins/hover/ractive-hover.js', array('ractive-js'), '0.1.1', true);
		wp_register_script ('ractive-keys', WP_PLUGIN_URL.'/ractive-js/plugins/keys/ractive-keys.js', array('ractive-js'), '0.2.1', true);
		wp_register_script ('ractive-mousewheel', WP_PLUGIN_URL.'/ractive-js/plugins/mousewheel/ractive-mousewheel.js', array('ractive-js'), '0.1.1', true);
		wp_register_script ('ractive-resize', WP_PLUGIN_URL.'/ractive-js/plugins/resize/ractive-resize.js', array('ractive-js'), '0.1.3', true);
		wp_register_script ('ractive-tap', WP_PLUGIN_URL.'/ractive-js/plugins/tap/ractive-taps.js', array('ractive-js'), '0.2.0', true);
		wp_register_script ('ractive-touch-hammer', WP_PLUGIN_URL.'/ractive-js/plugins/touch/hammer.js', false, '0.4.0', true);
		wp_register_script ('ractive-touch', WP_PLUGIN_URL.'/ractive-js/plugins/touch/ractive-touch.js', array('ractive-js', 'ractive-touch-hammer'), '0.4.0', true);
		wp_register_script ('ractive-typing', WP_PLUGIN_URL.'/ractive-js/plugins/typing/ractive-typing.js', array('ractive-js'), '0.0.1', true);
		wp_register_script ('ractive-viewport', WP_PLUGIN_URL.'/ractive-js/plugins/viewport/ractive-viewport.js', array('ractive-js'), '0.0.1', true);
	}


} //End of ractiveJS() class



/**
* Define the Class
* @since 0.1
*/
$ractive = new ractiveJS();


/**
* Load RactiveJS FrameWork
* @since 0.1
*/
	add_action( 'wp_enqueue_scripts', array($ractive, 'register_js_file'), 5);
?>
