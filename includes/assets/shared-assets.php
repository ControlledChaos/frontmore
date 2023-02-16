<?php
/**
 * Assets class
 *
 * Methods for enqueueing and printing assets
 * such as JavaScript and CSS files.
 *
 * @package    Front_More
 * @subpackage Includes
 * @category   Assets
 * @since      1.0.0
 */

namespace FrontMore\Shared_Assets;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Execute functions
 *
 * @since  1.0.0
 * @return void
 */
function setup() {

	// Return namespaced function.
	$ns = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	// Toolbar styles.
	add_action( 'wp_enqueue_scripts', $ns( 'toolbar_styles' ) );
	add_action( 'admin_enqueue_scripts', $ns( 'toolbar_styles' ), 99 );

	// Login styles.
	add_action( 'login_enqueue_scripts', $ns( 'login_styles' ) );

	// Embedded content styles.
	add_action( 'fct_embed_head', $ns( 'embed_styles' ) );
}

/**
 * Toolbar styles
 *
 * Enqueues if user is logged in and user toolbar is showing.
 *
 * @since  1.0.0
 * @return void
 */
function toolbar_styles() {}

/**
 * Login styles
 *
 * @since  1.0.0
 * @return void
 */
function login_styles() {}

/**
 * Embedded content styles
 *
 * @since  1.0.0
 * @return void
 */
function embed_styles() {}

/**
 * File suffix
 *
 * Adds the `.min` filename suffix if
 * the system is not in debug mode.
 *
 * @since  1.0.0
 * @param  string $suffix The string returned
 * @return string Returns the `.min` suffix or
 *                an empty string.
 */
function suffix() {

	// If in one of the debug modes do not minify.
	if (
		( defined( 'WP_DEBUG' ) && WP_DEBUG ) ||
		( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG )
	) {
		$suffix = '';
	} else {
		$suffix = '.min';
	}

	// Return the suffix or not.
	return $suffix;
}
