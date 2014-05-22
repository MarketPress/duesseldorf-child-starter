<?php
/**
 * Feature Name:    Duesseldorf Child general functions
 * Version:		    0.1
 * Author:		    Inpsyde GmbH for MarketPress.com
 * Author URI:	    http://inpsyde.com/
 */



/**
 * Adding our own Theme-Info
 *
 * @wp-hook duesseldorf_get_theme_info
 * @param   String $text
 * @return  String $text
 */
function duesseldorf_child_filter_duesseldorf_get_theme_info( $text ) {

	$home_url = home_url( '/' );
	$home_url = esc_url( $home_url );

	$text = sprintf(
		'<p id="site-info">Custom footer here, including a <a href="%s" rel="nofollow">link</a>. Edit this line in: <br><br><code>vendors/<br>&nbsp;|- duesseldorf_child/<br>&nbsp;&nbsp;|- frontend/<br>&nbsp;&nbsp;&nbsp;|- general.php</code></p>',
		$home_url
	);

	return $text;

}
