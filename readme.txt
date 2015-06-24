=== RactiveJS ===
Contributors: fuzzguard
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=G8SPGAVH8RTBU
tags: framework, library, lib, javascript
Requires at least: 3.8
Tested up to: 4.2.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==
This plugin registers the RactiveJS Framework library as part of Wordpress.  This means that Ractive scripts can be included in your plugins by just enqueuing the scripts.  Please see FAQ for usage for your plugin.

NOTE:  This does not add any ability to the wordpress front-end or back-end.  The scripts are disabled by default and must be included in your plugin by enqueuing the scripts as you would for any other scripting engine.  So to reiterate this plugin does not add any extra functionality on its own.  It is designed to be used as a dependancy for other plugins.

= Live, reactive templating =

Ractive.js is a template-driven UI library, but unlike other tools that generate inert HTML, it transforms your templates into blueprints for apps that are interactive by default.

= Powerful and extensible =

Two-way binding, animations, SVG support and more are provided out-of-the-box - but you can add whatever functionality you need by downloading and creating plugins.

= Optimised for your sanity =

Some tools force you to learn a new vocabulary and structure your app in a particular way. Ractive works for you, not the other way around - and it plays well with other libraries.

RactiveJS: http://www.ractivejs.org/

== Installation ==

1. Upload the `plugin` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= How to use RactiveJS in my plugin? =

This plugin is just a helper plugin to register the RactiveJS framework scripts into wordpress and allow them to be enqueued and utilized by other plugins.  Below is an explaination of the script handlers you have to enqueue to activate RactiveJS and to activate any of the ractive-plugins used in conjunction RactiveJS.

How to Enqueue the RactiveJS Framework scripts:

	wp_enqueue_script('ractive-js');		RactiveJS Framework
	wp_enqueue_script('ractive-hover');		Ractive.js hover event plugin
	wp_enqueue_script('ractive-keys');		Ractive.js keys event plugin
	wp_enqueue_script('ractive-mousewheel');	Ractive.js mousewheel event plugin
	wp_enqueue_script('ractive-resize');		Ractive.events.resize
	wp_enqueue_script('ractive-tap');		Ractive.js tap event plugin
	wp_enqueue_script('ractive-touch-hammer');	ractive-touch
	wp_enqueue_script('ractive-touch');		ractive-touch
	wp_enqueue_script('ractive-typing');		ractive-events-typing
	wp_enqueue_script('ractive-viewport');		ractive-event-viewport


= Script Dependancies =

Each of the scripts have dependancies.  They are all queued as dependancies in the plugin.  So if you forget to load the dependancy it will be automatically loaded for you.

	ractive-js		No Depenancies
	ractive-hover		ractive-js
	ractive-keys		ractive-js
	ractive-mousewheel	ractive-js
	ractive-resize		ractive-js
	ractive-tap		ractive-js
	ractive-touch-hammer	ractive-js
	ractive-touch		ractive-js, ractive-touch-hammer
	ractive-typing		ractive-js
	ractive-viewport	ractive-js


== Screenshots ==

== Changelog ==

= 1.0 =
* Gold release
