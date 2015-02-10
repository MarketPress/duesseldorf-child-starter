<?php
/**
 * Functions and definitions for Düsseldorf Child.
 *
 * @package    WordPress
 * @subpackage Düsseldorf_Child
 * @version    1.1
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

	/* The .min suffix for stylesheets and scripts.
	 *
	 * In order to provide a quick start, this child theme by default will load
	 * regular CSS and javascript files (whereas its parent theme loads
	 * minified versions of its stylesheets and scripts by default).
	 *
	 * If you want your child theme to default on minified stylesheets and scripts,
	 * set the following filter:
	 *
	 * if( function_exists( 'duesseldorf_get_script_suffix' ) ) {
	 *     add_filter( 'duesseldorf_child_starter_get_script_suffix', 'duesseldorf_get_script_suffix' );
	 * }
	 *
	 * Don’t forget to actually add applicable .min files to your child theme first!
	 *
	 * You can then temporarily switch back to unminified versions of the same
	 * files by setting the constant SCRIPT_DEBUG to TRUE in your wp-config.php:
	 * define( 'SCRIPT_DEBUG', TRUE );
	 */

	// Loads the child theme's translated strings
	load_child_theme_textdomain(
		'duesseldorf-child-starter',
		get_stylesheet_directory() . '/languages'
	);

	if( !is_admin() ){

		// styles
		add_filter( 'duesseldorf_get_styles', 'duesseldorf_child_filter_duesseldorf_get_styles_add_stylesheets' );

		// general
		add_filter( 'duesseldorf_get_theme_info', 'duesseldorf_child_filter_duesseldorf_get_theme_info' );

	}
}


/**
 * Adding our own styles for our child theme
 *
 * @wp-hook duesseldorf_get_styles
 * @param   Array $styles
 * @return  Array $styles
 */
function duesseldorf_child_filter_duesseldorf_get_styles_add_stylesheets( array $styles = array() ) {

	// add suffix
	$suffix = apply_filters( 'duesseldorf_child_starter_get_script_suffix', '' );

	// getting the theme-data
	$theme_data = wp_get_theme();

	// adding our own styles to
	$styles[ 'duesseldorf_child' ] = array(
		'src'       => get_stylesheet_directory_uri() . '/style' . $suffix . '.css',
		'deps'      => NULL,
		'version'   => $theme_data->Version,
		'media'     => NULL
	);

	return $styles;

}



/**
 * Adding our own site info footer line
 *
 * @wp-hook duesseldorf_get_theme_info
 * @param   String $text
 * @return  String $text
 */
function duesseldorf_child_filter_duesseldorf_get_theme_info( $text ) {

	$home_url = home_url( '/' );
	$home_url = esc_url( $home_url );

	$text = sprintf(
		'<p id="site-info">Custom copyright here, including a <a href="%s" rel="nofollow">link</a>.</p>',
		$home_url
	);

	return $text;

}