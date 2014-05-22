<?php
/**
 * Functions and definitions for Düsseldorf Child.
 *
 * @package    WordPress
 * @subpackage Düsseldorf_Child
 * @version    05/21/2014
 * @author     marketpress.com
 */

add_action( 'after_setup_theme', 'duesseldorf_child_setup' );
/**
 * Sets up theme defaults and registers support for various WordPress features
 * of Düsseldorf Child Theme.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support for post thumbnails.
 *
 * @since   05/21/2014
 * @return  void
 */
function duesseldorf_child_setup() {

	// Loads the child theme's translated strings
	load_child_theme_textdomain(
		'theme_duesseldorf_child',
		get_stylesheet_directory() . '/languages'
	);

	$vendor_dir = dirname( __FILE__ ) . '/vendors/';

	if( !is_admin() ){

		// styles
		include_once( $vendor_dir . 'duesseldorf_child/frontend/style.php' );
		add_filter( 'duesseldorf_get_styles', 'duesseldorf_child_filter_duesseldorf_get_styles_add_stylesheets' );

		// general
		include_once( $vendor_dir . 'duesseldorf_child/frontend/general.php' );
		add_filter( 'duesseldorf_get_theme_info', 'duesseldorf_child_filter_duesseldorf_get_theme_info' );

	}
}