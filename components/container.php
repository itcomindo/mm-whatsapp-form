<?php
/**
 *
 * Container
 *
 * @package what
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Container.
 */
function mwf_container() {
	?>
	<div id="mwf-overlay" class="mwf-show">
		<div id="mwf" class="mwf-show">
			<?php
			echo wp_kses( mwf_close_button(), mwf_kses( array( 'div', 'span' ) ) );
			?>
			<div id="mwf-inner">
				<div id="mwf-form-wr">
					<?php
					mwf_form_default();
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
add_action( 'wp_body_open', 'mwf_container', 10 );
