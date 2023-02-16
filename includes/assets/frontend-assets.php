<?php
/**
 * Frontend assets
 *
 * Methods for enqueueing and printing assets
 * such as JavaScript and CSS files.
 *
 * @package    Front_More
 * @subpackage Includes
 * @category   Assets
 * @since      1.0.0
 */

namespace FrontMore\Front_Assets;

use function FrontMore\Shared_Assets\suffix;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
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

	// Frontend scripts.
	add_action( 'wp_enqueue_scripts', $ns( 'frontend_scripts' ) );

	// Frontend styles, priority lower than parent.
	add_action( 'wp_enqueue_scripts', $ns( 'frontend_styles' ), 11 );
}

/**
 * Frontend scripts
 *
 * @since  1.0.0
 * @return void
 */
function frontend_scripts() {

	// Enqueue jQuery if not already.
	wp_enqueue_script( 'jquery' );
}

/**
 * Frontend styles
 *
 * @since  1.0.0
 * @return void
 */
function frontend_styles() {

	// Google fonts.
	// wp_enqueue_style( 'fmt-google-fonts', 'add-url-here', [], FCT_VERSION, 'screen' );

	// Prevent loading of empty parent stylesheet in root directory.
	wp_dequeue_style( 'fct-theme' );
	wp_deregister_style( 'fct-theme' );

	/**
	 * Theme stylesheet
	 *
	 * This enqueues the minified stylesheet compiled from SASS (.scss) files.
	 * The main stylesheet, in the root directory, only contains the theme header but
	 * it is necessary for theme activation. DO NOT delete the main stylesheet!
	 */
	wp_enqueue_style( 'fmt-parent', get_parent_theme_file_uri( '/assets/css/style' . suffix() . '.css' ), [], '', 'all' );
	wp_enqueue_style( 'fmt-theme', get_theme_file_uri( '/assets/css/style' . suffix() . '.css' ), [ 'fmt-parent' ], '', 'all' );

	// Block styles.
	if ( function_exists( 'has_blocks' ) ) {
		wp_enqueue_style( 'fmt-blocks', get_parent_theme_file_uri( '/assets/css/blocks' . suffix() . '.css' ), [ 'wp-block-library', 'fmt-theme' ], FCT_VERSION, 'all' );

		if ( is_rtl() ) {
			wp_enqueue_style( 'fmt-blocks-rtl', get_parent_theme_file_uri( '/assets/css/blocks-rtl' . suffix() . '.css' ), [ 'fmt-blocks' ], FCT_VERSION, 'all' );
		}
	}
}
