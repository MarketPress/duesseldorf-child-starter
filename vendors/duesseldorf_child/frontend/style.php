<?php
/**
 * Feature Name:    Duesseldorf Child Styles
 * Version:		    0.1
 * Author:		    Inpsyde GmbH for MarketPress.com
 * Author URI:	    http://inpsyde.com/
 */



/**
 * Adding our own Styles for our Child-Theme
 *
 * @wp-hook duesseldorf_get_styles
 * @param   Array $styles
 * @return  Array $styles
 */
function duesseldorf_child_filter_duesseldorf_get_styles_add_stylesheets( array $styles = array() ) {

	// getting the ".min"-suffix for styles
	$suffix = duesseldorf_get_script_suffix();

	// Save same data about the theme into a variable
	$duesseldorf_child_my_theme_data = wp_get_theme();

	// adding our own styles to
	$styles[ 'duesseldorf_child' ] = array(
		'src'       => get_stylesheet_directory_uri() . '/style' . $suffix . '.css',
		'deps'      => NULL,
		'version'   => $duesseldorf_child_my_theme_data->Version,
		'media'     => NULL
	);

	return $styles;

}
