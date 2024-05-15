<?php
/**
 *
 * Plugin Options.
 *
 * @package mwf
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

use Carbon_Fields\Container;
use Carbon_Fields\Field;
/**
 * Plugin Options for MM Whatsapp Form.
 */
function mwf_options() {
	Container::make( 'theme_options', 'WA Form Options' )
	->add_fields(
		array(
			// Fields start below this line.

			// ##############################
			// Name Fields.
			// ##############################

			// checkbox enable display name.
			Field::make( 'checkbox', 'enable_name_field_mwf', 'Enable Name Field' )
			->set_option_value( 'yes' )
			->set_default_value( true )
			->set_help_text( 'Enable Name Field in the form.' ),

			// Label for Name Field.
			Field::make( 'text', 'name_field_label_mwf', 'Name Field Label' )
			->set_default_value( 'Name' )
			->set_help_text( 'Enter the Label for Name Field. E.g "Name"' ),

			// text help for input help for name field.
			Field::make( 'text', 'name_field_help_mwf', 'Name Field Help' )
			->set_default_value( 'Name must be letter only' )
			->set_help_text( 'Enter the help text for Name Field. E.g "Name must be letter only" leave it blank if you dont need this' ),

			// ##############################
			// Phone Fields.
			// #############################

			// checkbox enable phone field.
			Field::make( 'checkbox', 'enable_phone_field_mwf', 'Enable Phone Field' )
			->set_option_value( 'yes' )
			->set_default_value( true )
			->set_help_text( 'Enable Phone Field in the form.' ),

			// Label for Phone Field.
			Field::make( 'text', 'phone_field_label_mwf', 'Phone Field Label' )
			->set_default_value( 'Phone' )
			->set_help_text( 'Enter the Label for Phone Field. E.g "Phone"' ),

			// text help for input help for phone field.
			Field::make( 'text', 'phone_field_help_mwf', 'Phone Field Help' )
			->set_default_value( 'Phone must be valid' )
			->set_help_text( 'Enter the help text for Phone Field. E.g "Phone must be valid" leave it blank if you dont need this' ),

			// ##############################
			// Email Fields.
			// ##############################

			// checkbox enable email field.
			Field::make( 'checkbox', 'enable_email_field_mwf', 'Enable Email Field' )
			->set_option_value( 'yes' )
			->set_default_value( true )
			->set_help_text( 'Enable Email Field in the form.' ),

			// Label for Email Field.
			Field::make( 'text', 'email_field_label_mwf', 'Email Field Label' )
			->set_default_value( 'Email' )
			->set_help_text( 'Enter the Label for Email Field. E.g "Email"' ),

			// text help for input help for email field.
			Field::make( 'text', 'email_field_help_mwf', 'Email Field Help' )
			->set_default_value( 'Email must be valid' )
			->set_help_text( 'Enter the help text for Email Field. E.g "Email must be valid" leave it blank if you dont need this' ),

			// ##############################
			// Dept. Fields.
			// ##############################

			// complex field to create dept and it's phone number as individual.
			Field::make( 'complex', 'dept_mwf', 'Departments' )
			->set_layout( 'tabbed-horizontal' )
			->add_fields(
				array(

					// Department Name.
					Field::make( 'text', 'dept_name_mwf', 'Department Name' )
					->set_required( true )
					->set_help_text( 'Enter the Department Name. E.g Billing, Sales, Support etc.' ),

					// Departement Phone Number.
					Field::make( 'text', 'dept_phone_mwf', 'Department Phone Number' )
					->set_required( true )
					->set_help_text( 'Enter the Department Phone Number. E.g 6281234567890' ),
				)
			),

			// Label for Dept. Field.
			Field::make( 'text', 'dept_field_label_mwf', 'Department Field Label' )
			->set_default_value( 'Choose Department' )
			->set_help_text( 'Enter the Label for Department Field. E.g "Choose Department"' ),

			// ##############################
			// Message. Fields.
			// ##############################

			// checkbox enable message box.
			Field::make( 'checkbox', 'enable_message_field_mwf', 'Enable Message Field' )
			->set_option_value( 'yes' )
			->set_default_value( true )
			->set_help_text( 'Enable Message Field in the form.' ),

			// Label for Message Field.
			Field::make( 'text', 'message_field_label_mwf', 'Message Field Label' )
			->set_default_value( 'Message' )
			->set_help_text( 'Enter the Label for Message Field. E.g "Message"' ),

			// ##############################
			// Captcha Fields.
			// ##############################

			// checkbox to enable text captcha.
			Field::make( 'checkbox', 'enable_text_captcha_mwf', 'Enable Text Captcha' )
			->set_option_value( 'yes' )
			->set_default_value( true )
			->set_help_text( 'Enable Text Captcha in the form.' ),

			// Label for Text Captcha.
			Field::make( 'text', 'text_captcha_label_mwf', 'Text Captcha Label' )
			->set_default_value( 'Captcha' )
			->set_help_text( 'Enter the Label for Text Captcha. E.g "Captcha"' ),

			// complex field cpatcha pair.
			Field::make( 'complex', 'captcha_pair_mwf', 'Captcha Pair' )
			->set_layout( 'tabbed-horizontal' )
			->add_fields(
				array(
					// Captcha Question.
					Field::make( 'text', 'captcha_question_mwf', 'Captcha Question' )
					->set_required( true )
					->set_help_text( 'Enter the Captcha Question. E.g "2 + 2 = ?"' ),

					// Captcha Answer.
					Field::make( 'text', 'captcha_answer_mwf', 'Captcha Answer' )
					->set_required( true )
					->set_help_text( 'Enter the Captcha Answer. E.g "4"' ),
				)
			),

			// ##############################
			// Send Button.
			// ##############################

			// Button text.
			Field::make( 'text', 'button_text_mwf', 'Button Text' )
			->set_default_value( 'Send' )
			->set_help_text( 'Enter the Button Text. E.g "Send"' ),

			// Fields End above this line.
		)
	);
}
add_action( 'carbon_fields_register_fields', 'mwf_options' );
