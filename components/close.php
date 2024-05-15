<?php
/**
 *
 * Close Button.
 *
 * @package mwf
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 *  Close Button.
 */
function mwf_close_button() {
	$close = "<div id='mwf-close' class='mwf-close'><span class='mwf-close-icon'>X</span></div>";
	return $close;
}
