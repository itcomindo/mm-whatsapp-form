<?php
/**
 *
 * Assets.
 *
 * @package mwf
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 *  Load Styles and Scripts.
 */
function mwf_assets() {
	wp_enqueue_style( 'mwf-style', MWF_URL . 'assets/css/mwf.css', array(), MWF_VERSION, 'all' );

	// Call https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js.
	wp_enqueue_script( 'select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array( 'jquery' ), '4.1.0', true );

	wp_enqueue_script( 'area-js', MWF_URL . 'assets/js/area.js', array( 'select2-js' ), MWF_VERSION, true );
	wp_enqueue_script( 'mwf-js', MWF_URL . 'assets/js/mwf-js.js', array( 'jquery' ), MWF_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'mwf_assets' );
