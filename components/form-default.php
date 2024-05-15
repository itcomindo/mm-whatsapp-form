<?php
/**
 *
 * Form Default
 *
 * @package mwf
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 *  Form Default.
 */
function mwf_form_default() {
	?>
	<!-- Name -->

	<?php
	mwf_name_field();

	// Phone Field.
	mwf_phone_field();

	// Email Field.
	mwf_email_field();

	// Dept Field.
	mwf_department_fields();

	// Message Field.
	mwf_message_fields();

	// Captcha Field.
	mwf_captcha_fields();

	// Send Button.
	mwf_send_button();

	?>

	<!-- Submit -->
	
	<?php
}


/**
 *  Button Send.
 */
function mwf_send_button() {
	$text = carbon_get_theme_option( 'button_text_mwf' );
	$icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255,255,255,1);transform: ;msFilter:;"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.403 5.633A8.919 8.919 0 0 0 12.053 3c-4.948 0-8.976 4.027-8.978 8.977 0 1.582.413 3.126 1.198 4.488L3 21.116l4.759-1.249a8.981 8.981 0 0 0 4.29 1.093h.004c4.947 0 8.975-4.027 8.977-8.977a8.926 8.926 0 0 0-2.627-6.35m-6.35 13.812h-.003a7.446 7.446 0 0 1-3.798-1.041l-.272-.162-2.824.741.753-2.753-.177-.282a7.448 7.448 0 0 1-1.141-3.971c.002-4.114 3.349-7.461 7.465-7.461a7.413 7.413 0 0 1 5.275 2.188 7.42 7.42 0 0 1 2.183 5.279c-.002 4.114-3.349 7.462-7.461 7.462m4.093-5.589c-.225-.113-1.327-.655-1.533-.73-.205-.075-.354-.112-.504.112s-.58.729-.711.879-.262.168-.486.056-.947-.349-1.804-1.113c-.667-.595-1.117-1.329-1.248-1.554s-.014-.346.099-.458c.101-.1.224-.262.336-.393.112-.131.149-.224.224-.374s.038-.281-.019-.393c-.056-.113-.505-1.217-.692-1.666-.181-.435-.366-.377-.504-.383a9.65 9.65 0 0 0-.429-.008.826.826 0 0 0-.599.28c-.206.225-.785.767-.785 1.871s.804 2.171.916 2.321c.112.15 1.582 2.415 3.832 3.387.536.231.954.369 1.279.473.537.171 1.026.146 1.413.089.431-.064 1.327-.542 1.514-1.066.187-.524.187-.973.131-1.067-.056-.094-.207-.151-.43-.263"></path></svg>';
	if ( $text ) {
		$text = carbon_get_theme_option( 'button_text_mwf' );
	} else {
		$text = 'Send';
	}
	?>
	<div class="mwf-form mwf-hide">
		<button type="submit" id="mwf-submit" class="mwf-hide"><?php echo wp_kses( $icon, mwf_kses( array( 'svg' ) ) ) . ' ' . esc_html( $text ); ?></button>
	</div>
	<?php
}

/**
 *  Captcha Fields.
 */
function mwf_captcha_fields() {
	if ( carbon_get_theme_option( 'enable_text_captcha_mwf' ) ) {
		$captcha_pairs = carbon_get_theme_option( 'captcha_pair_mwf' );
		if ( $captcha_pairs ) {
			$random_captcha   = $captcha_pairs[ array_rand( $captcha_pairs ) ];
			$captcha_question = esc_html( $random_captcha['captcha_question_mwf'] );
			$captcha_answer   = esc_html( $random_captcha['captcha_answer_mwf'] );

			?>
			<div id="mwf-message-field" class="mwf-form">
				<label for="mwf-captcha">Captcha:</label>
				<small class="mwf-captcha-ask" data-ask="<?php echo esc_html( $captcha_question ); ?>" data-answer="<?php echo esc_html( $captcha_answer ); ?>">
					Isi hasil dari <?php echo esc_html( $captcha_question ); ?>
				</small>
				<input type="text" name="mwf-captcha" id="mwf-captcha">
			</div>
			<?php
		}
	} else {
		return;
	}
}



/**
 *  Message Fields.
 */
function mwf_message_fields() {
	if ( carbon_get_theme_option( 'enable_message_field_mwf' ) ) {
		$label = carbon_get_theme_option( 'message_field_label_mwf' );
		if ( $label ) {
			$label = carbon_get_theme_option( 'message_field_label_mwf' );
		} else {
			$label = 'Message';
		}

		$help = carbon_get_theme_option( 'message_field_help_mwf' );
		if ( $help ) {
			$help = carbon_get_theme_option( 'message_field_help_mwf' );
		} else {
			$help = 'Please enter your message';
		}
		?>
		<div id="mwf-message-field" class="mwf-form">
			<label for="mwf-message"><?php echo esc_html( $label ); ?></label>
			<textarea name="mwf-message" id="mwf-message"></textarea>
			<small class="mwf-notif mwf-wrong"><?php echo esc_html( $help ); ?></small>
		</div>
		<?php
	} else {
		return;
	}
}

/**
 *  Dept. Fields.
 */
function mwf_department_fields() {
	$deps = carbon_get_theme_option( 'dept_mwf' );
	if ( $deps ) {
		$label = carbon_get_theme_option( 'dept_field_label_mwf' );
		if ( $label ) {
			$label        = carbon_get_theme_option( 'dept_field_label_mwf' );
			$first_option = '<option value="choose">' . $label . '</option>';
		} else {
			$label        = 'Choose Department';
			$first_option = '';
		}
		?>
		<div class="mwf-form">
			<label for="dept"><?php echo esc_html( $label ); ?></label>
			<select name="dept" id="mwf-dept">
				<?php
				echo wp_kses( $first_option, mwf_kses( array( 'option' ) ) );
				foreach ( $deps as $dep ) {
					$dept_name  = $dep['dept_name_mwf'];
					$dept_phone = $dep['dept_phone_mwf'];
					?>
					<option value="<?php echo esc_html( $dept_name ); ?>" data-mwf-phone="<?php echo esc_html( $dept_phone ); ?>">
						<?php echo esc_html( $dept_name ); ?>
					</option>
					<?php
				}
				?>
			</select>
		</div>
		<?php
	} else {
		return;
	}
}



/**
 * Email Field.
 */
function mwf_email_field() {
	if ( carbon_get_theme_option( 'enable_email_field_mwf' ) ) {
		$label = carbon_get_theme_option( 'email_field_label_mwf' );
		if ( $label ) {
			$label = carbon_get_theme_option( 'email_field_label_mwf' );
		} else {
			$label = 'Email';
		}

		$help = carbon_get_theme_option( 'email_field_help_mwf' );
		if ( $help ) {
			$help = carbon_get_theme_option( 'email_field_help_mwf' );
		} else {
			$help = 'Email must be valid';
		}
		?>
		<div id="mwf-email-field" class="mwf-form">
			<label for="mwf-email"><?php echo esc_html( $label ); ?></label>
			<input type="email" name="mwf-email" id="mwf-email">
			<small class="mwf-notif mwf-wrong"><?php echo esc_html( $help ); ?></small>
		</div>
		<?php
	} else {
		return;
	}
}

/**
 * Phone Field.
 */
function mwf_phone_field() {
	if ( carbon_get_theme_option( 'enable_phone_field_mwf' ) ) {
		$label = carbon_get_theme_option( 'phone_field_label_mwf' );
		if ( $label ) {
			$label = carbon_get_theme_option( 'phone_field_label_mwf' );
		} else {
			$label = 'Phone';
		}

		$help = carbon_get_theme_option( 'phone_field_help_mwf' );
		if ( $help ) {
			$help = carbon_get_theme_option( 'phone_field_help_mwf' );
		} else {
			$help = 'Phone must be valid';
		}

		?>
	<div id="mwf-phone-field" class="mwf-form">
		<label for="mwf-phone"><?php echo esc_html( $label ); ?></label>
		<input type="number" name="mwf-phone" id="mwf-phone">
		<small class="mwf-notif mwf-wrong"><?php echo esc_html( $help ); ?></small>
	</div>
		<?php
	} else {
		return;
	}
}

/**
 * Name Field
 */
function mwf_name_field() {
	if ( carbon_get_theme_option( 'enable_name_field_mwf' ) ) {

		// Get Label.
		$label = carbon_get_theme_option( 'name_field_label_mwf' );
		if ( $label ) {
			$label = carbon_get_theme_option( 'name_field_label_mwf' );
		} else {
			$label = 'Name';
		}

		// Get Help.
		$help = carbon_get_theme_option( 'name_field_help_mwf' );
		if ( $help ) {
			$help = carbon_get_theme_option( 'name_field_help_mwf' );
		} else {
			$help = 'Name must be valid';
		}

		?>
	<div id="mwf-name-field" class="mwf-form">
		<label for="mwf-name"><?php echo esc_html( $label ); ?></label>
		<input type="text" name="mwf-name" id="mwf-name">
		<small class="mwf-notif mwf-wrong"><?php echo esc_html( $help ); ?></small>
	</div>
		<?php
	} else {
		return;
	}
}