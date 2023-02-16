<?php
/**
 * Admin assets
 *
 * Methods for enqueueing and printing assets
 * such as JavaScript and CSS files.
 *
 * @package    Front_More
 * @subpackage Includes
 * @category   Admin
 * @since      1.0.0
 */

namespace FrontMore\Admin_Assets;

// Alias namespaces.
use FrontMore\Classes\Core as Core,
	FrontMore\Customize    as Customize;

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

	// Admin scripts.
	add_action( 'admin_enqueue_scripts', $ns( 'admin_scripts' ) );

	/**
	 * Admin styles
	 * Call late to override plugin styles.
	 */
	add_action( 'admin_enqueue_scripts', $ns( 'admin_styles' ), 99 );
}

/**
 * Admin scripts
 *
 * @since  1.0.0
 * @return void
 */
function admin_scripts() {}

/**
 * Admin styles
 *
 * @since  1.0.0
 * @return void
 */
function admin_styles() {}
