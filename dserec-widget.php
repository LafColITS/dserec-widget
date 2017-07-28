<?php
/**
 * Plugin Name:     Dserec Widget
 * Plugin URI:      https://github.com/LafColITS/dserec-widget
 * Description:     DSE login widget
 * Author:          Charles Fulton
 * Author URI:      https://sites.lafayette.edu/fultonc
 * Text Domain:     dserec-widget
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Dserec_Widget
 */

/**
 * Output embedded content from DSE.
 *
 * @param array  $atts attributes from the shortcode.
 * @param string $content page content.
 *
 * @return string
 */
function dserec_widget_module_embed( $atts, $content = '' ) {
	$atts = shortcode_atts( array(
		'module' => 'clubsports',
		'school' => '',
	), $atts, 'desrecmodule' );

	// No op if there's no institution.
	if ( empty( $atts['school'] ) ) {
		return $content;
	}

	$scripturl = "https://{$atts['school']}.dserec.com/scripts/online/frameconnect.js";
	$widgeturl = "https://{$atts['school']}.dserec.com/online/{$atts['module']}_widget";

	$content = "<script src=\"$scripturl\" widget-url=\"{$widgeturl}\"></script>";
	return $content;
}

add_shortcode( 'dserecmodule', 'dserec_widget_module_embed' );
