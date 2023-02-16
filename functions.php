<?php
/**
 * Front More functions
 *
 * Extend the Front Core framework.
 *
 * @package    Front_More
 * @subpackage Functions
 * @since      1.0.0
 * @link       https://github.com/ControlledChaos/frontmore
 */

namespace FrontMore;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Constant: Theme file path
 *
 * @since 1.0.0
 * @var   string File path with trailing slash.
 */
$theme_path = get_theme_file_path();
define( 'FMT_PATH', $theme_path . '/' );

// Load required files.
foreach ( glob( FMT_PATH . 'includes/assets/*.php' ) as $filename ) {
	require $filename;
}

// Theme setup.
Shared_Assets\setup();

// Frontend functions.
if ( ! is_admin() ) {
	Front_Assets\setup();
}

// Backend functions.
if ( is_admin() ) {
	Admin_Assets\setup();
}
