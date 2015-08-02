<?php
/**
 * Plugin Name: RactiveJS
 * Plugin URI: http://www.fuzzguard.com.au/plugins/ractive-js
 * Description: Adds RactiveJS FrameWork library to WordPress
 * Version: 1.1
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
        * Return the plugin URL
        * @since 1.0
        */
	function getPluginURL() {
		return plugins_url().'/ractive-js';
	}

        /**
        * Register the required RactiveJS files
        * @since 1.0
        */
        function register_js_files()
        {
		wp_register_script ('ractive-js', $this->getPluginURL().'/ractive.min.js', false, '0.7.3', true);

		$this->register_events_scripts();
		$this->register_transitions_scripts();
	}


        /**
        * Register the RactiveJS scripts for Events (http://docs.ractivejs.org/latest/events-overview)
        * @since 1.1
        */

	function register_events_scripts() {
                wp_register_script ('ractive-hover', $this->getPluginURL().'/plugins/hover/ractive-hover.min.js', array('ractive-js'), '0.1.1', true); #https://raw.githubusercontent.com/ractivejs/ractive-events-hover/master/ractive-events-hover.js
                wp_register_script ('ractive-keys', $this->getPluginURL().'/plugins/keys/ractive-keys.min.js', array('ractive-js'), '0.2.1', true); #https://raw.githubusercontent.com/ractivejs/ractive-events-keys/master/dist/ractive-events-keys.js
                wp_register_script ('ractive-mousewheel', $this->getPluginURL().'/plugins/mousewheel/ractive-mousewheel.min.js', array('ractive-js'), '0.1.1', true); #https://raw.githubusercontent.com/ractivejs/ractive-events-mousewheel/master/ractive-events-mousewheel.js
                wp_register_script ('ractive-resize', $this->getPluginURL().'/plugins/resize/ractive-resize.min.js', array('ractive-js'), '0.1.3', true); #https://raw.githubusercontent.com/smallhadroncollider/ractive.events.resize/master/ractive.events.resize.js
                wp_register_script ('ractive-tap', $this->getPluginURL().'/plugins/tap/ractive-taps.min.js', array('ractive-js'), '0.2.0', true); #http://ractivejs.github.io/ractive-events-tap/ractive-events-tap.js
                wp_register_script ('ractive-touch-hammer', $this->getPluginURL().'/plugins/touch/hammer.min.js', false, '0.4.0', true); #https://cdn.rawgit.com/hammerjs/hammer.js/2.0.1/hammer.js
                wp_register_script ('ractive-touch',$this->getPluginURL().'/plugins/touch/ractive-touch.min.js', array('ractive-js', 'ractive-touch-hammer'), '0.4.0', true); #https://raw.githubusercontent.com/rstacruz/ractive-touch/master/index.js
                wp_register_script ('ractive-typing', $this->getPluginURL().'/plugins/typing/ractive-typing.min.js', array('ractive-js'), '0.0.1', true); #https://raw.githubusercontent.com/svapreddy/ractive-events-typing/master/ractive-events-typing.js
                wp_register_script ('ractive-viewport', $this->getPluginURL().'/plugins/viewport/ractive-viewport.min.js', array('ractive-js'), '0.0.1', true); #https://raw.githubusercontent.com/svapreddy/ractive-event-viewport/master/lib/in-view.js
	}

        /**
        * Register the RactiveJS scripts for Transitions (http://docs.ractivejs.org/latest/transitions)
        * @since 1.1
        */

        function register_transitions_scripts() {
                wp_register_script ('ractive-fade', $this->getPluginURL().'/plugins/fade/ractive-fade.min.js', array('ractive-js'), '0.2.1', true); #https://raw.githubusercontent.com/ractivejs/ractive-transitions-fade/master/dist/ractive-transitions-fade.js 
		wp_register_script ('ractive-fly', $this->getPluginURL().'/plugins/fly/ractive-fly.min.js', array('ractive-js'), '0.1.3', true); #http://ractivejs.github.io/ractive-transitions-fly/ractive-transitions-fly.js
                wp_register_script ('ractive-scale', $this->getPluginURL().'/plugins/scale/ractive-transitions-scale.min.js', array('ractive-js'), '0.1.0', true); #https://raw.githubusercontent.com/1N50MN14/Ractive-transitions-scale/master/Ractive-transitions-scale.js

                wp_register_script ('ractive-slide', $this->getPluginURL().'/plugins/slide/ractive-transitions-slide.min.js', array('ractive-js'), '0.2.1', true); #https://raw.githubusercontent.com/ractivejs/ractive-transitions-slide/master/src/ractive-transitions-slide.js
                wp_register_script ('ractive-slide-horizontal', $this->getPluginURL().'/plugins/slide/ractive-transitions-slidehorizontal.min.js', array('ractive-js'), '1.0.0', true); #https://raw.githubusercontent.com/zenflow/ractive-transitions-slidehorizontal/master/src/ractive-transitions-slidehorizontal.js
		wp_register_script ('ractive-typewriter', $this->getPluginURL().'/plugins/typewriter/ractive-transitions-typewriter.min.js', array('ractive-js'), '1.0.0', true); #https://raw.githubusercontent.com/RactiveJS/Ractive-transitions-typewriter/master/Ractive-transitions-typewriter.js

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
	add_action( 'wp_enqueue_scripts', array($ractive, 'register_js_files'), 5);
?>
