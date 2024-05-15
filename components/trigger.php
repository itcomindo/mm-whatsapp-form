<?php
/**
 *
 * Trigger.
 *
 * @package what
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Trigger.
 */
function mwf_trigger() {
	?>
	<div id="mwf-trigger" class="mwf-trigger">
		<span class="mwf-trigger-icon">FORM</span>
	</div>
	<?php
}
add_action( 'wp_footer', 'mwf_trigger', 10 );