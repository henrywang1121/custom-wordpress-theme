<?php
/**
 * Form Validation, Submit and Logging Functions.
 *
 * @package Custom_Theme
 */

/**
 * Logs sent emails.
 *
 * @param string $message  Email message content.
 * @param string $function Name of calling function.
 * @return void
 */
function custom_log_email( $message, $function ) {
	$email_log_path = dirname( ABSPATH ) . '/log/email.log';
	$email_log      = '[' . current_time( 'mysql' ) . '] [' . $function . '()] ' . $message . PHP_EOL;
	file_put_contents( $email_log_path, $email_log, FILE_APPEND );
}

/**
 * Logs email send success or failure and sends notification email to admin.
 *
 * @param string $first_name Email recipient first name.
 * @param string $last_name  Email recipient last name.
 * @param string $email      Email recipient address.
 * @param string $function   Name of calling function.
 * @param bool   $success    Email send success.
 * @return void
 */
function custom_log_email_error( $first_name, $last_name, $email, $function, $success ) {
	$email_error_log_path = dirname( ABSPATH ) . '/log/email-error.log';
	$status               = 'SUCCESS';
	if ( true !== $success ) {
		$status = 'FAIL';
		wp_mail( array( 'email@email.com' ), get_field( 'custom_client_code', 'option' ) . ' / Amazon SES Authentication Failed', 'This is a notification that the SMTP authentication with Amazon by the ' . get_bloginfo( 'name' ) . ' website has failed for email ' . $email );
	}
	$email_error_log = '[' . current_time( 'mysql' ) . '] [' . $function . '()] [' . $status . '] [' . $first_name . ' ' . $last_name . ' ' . $email . ']' . PHP_EOL;
	file_put_contents( $email_error_log_path, $email_error_log, FILE_APPEND );
}

/**
 * Archive log files, date stamp and create new files.
 *
 * @return void
 */
function custom_email_log_maintenanace() {
	$file_path = dirname( get_home_path() ) . '/log/';
	$files     = glob( $file_path . '*' );
	$now       = time();
	foreach ( $files as $file ) {
		if ( is_file( $file ) ) {

			// Delete file if older than 30 days.
			if ( $now - filemtime( $file ) >= 60 * 60 * 24 * 30 ) { // 30 days.
				unlink( $file );
			}

			// If file is not numbered, copy to a new file and add timestamp.
			$filename_parts = explode( '.', $file );
			if ( ! is_numeric( end( $filename_parts ) ) ) {
				$new_file = $file_path . basename( $file ) . '.' . current_time( 'Ymd' );
				if ( ! file_exists( $new_file ) ) {
					copy( $file, $new_file );
					file_put_contents( $file, '' );
				}
			}
		}
	}
}

/**
 * If form array contains a vehicle ID, populate other vehicle-related fields, and return the array.
 *
 * @param array $form Lead form data array.
 * @return array
 */
function custom_get_lead_vehicle_data( $form ) {
	if ( ! empty( $form['vehicle_id'] ) ) {
		$form['vehicle_status']       = strtolower( get_field( 'condition', $form['vehicle_id'] ) );
		$form['vehicle_year']         = get_field( 'year', $form['vehicle_id'] );
		$form['vehicle_make']         = get_field( 'make', $form['vehicle_id'] );
		$form['vehicle_model']        = get_field( 'model', $form['vehicle_id'] );
		$form['vehicle_vin']          = get_field( 'vin', $form['vehicle_id'] );
		$form['vehicle_stock']        = get_field( 'stock_number', $form['vehicle_id'] );
		$form['vehicle_trim']         = get_field( 'trim', $form['vehicle_id'] );
		$form['vehicle_doors']        = get_field( 'door_count', $form['vehicle_id'] );
		$form['vehicle_bodystyle']    = get_field( 'body_style', $form['vehicle_id'] );
		$form['vehicle_transmission'] = 'Automatic' === get_field( 'transmission_type', $form['vehicle_id'] ) ? 'A' : 'M';
		$form['vehicle_odometer']     = (int) get_field( 'miles', $form['vehicle_id'] );
		$form['vehicle_color']        = get_field( 'ext_color', $form['vehicle_id'] );
		$form['vehicle_price']        = get_field( 'sale_price', $form['vehicle_id'] );
	}
	return $form;
}

/**
 * Tests whether form submission grecaptcha response is valid.
 *
 * @param string $grecaptcha_response Grecaptcha response to verify.
 * @return bool
 */
function custom_grecaptcha_response_verify( $grecaptcha_response ) {
	$grecaptcha_remote = wp_remote_get( 'https://www.google.com/recaptcha/api/siteverify?secret=' . RECAPTCHA_SECRET . '&response=' . $grecaptcha_response );
	$grecaptcha_result = json_decode( wp_remote_retrieve_body( $grecaptcha_remote ), true );
	if ( isset( $grecaptcha_result['success'] ) && true === $grecaptcha_result['success'] ) {
		return true;
	}
	return false;
}

/**
 * Form Handler Callback Functions.
 */

/**
 * Handles special order form submissions.
 *
 * @return void
 */
function custom_special_order_form_submit_callback() {
	check_ajax_referer( 'form', '_wpnonce' );
	$response = array(
		'success' => false,
		'message' => 'Something went wrong! Please give us a call at ' . get_field( 'sales_telephone_number', 'option' ),
		'lead_id' => '',
	);
	if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] && ! empty( $_POST['gRecaptchaResponse'] ) && custom_grecaptcha_response_verify( sanitize_text_field( wp_unslash( $_POST['gRecaptchaResponse'] ) ) ) ) {
		$form = array(
			'customer_first_name' => '',
			'customer_last_name'  => '',
			'customer_email'      => '',
			'customer_zip_code'   => '',
			'customer_comments'   => 'Please contact me at the email or phone number provided.',
			'vehicle_year'        => '',
			'vehicle_make'        => '',
			'vehicle_model'       => '',
			'vehicle_trim'        => '',
			'lead_source_id'      => '',
			'lead_source_name'    => '',
			'lead_type'           => 'sales',
		);
		if ( ! empty( $_POST['firstName'] ) ) {
			$form['customer_first_name'] = filter_var( wp_unslash( $_POST['firstName'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['lastName'] ) ) {
			$form['customer_last_name'] = filter_var( wp_unslash( $_POST['lastName'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['email'] ) ) {
			$form['customer_email'] = filter_var( wp_unslash( $_POST['email'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['zip'] ) ) {
			$form['customer_zip_code'] = filter_var( wp_unslash( $_POST['zip'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['comments'] ) ) {
			$form['customer_comments'] = filter_var( wp_unslash( $_POST['comments'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['vehicleYear'] ) ) {
			$form['vehicle_year'] = filter_var( wp_unslash( $_POST['vehicleYear'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['vehicleMake'] ) ) {
			$form['vehicle_make'] = filter_var( wp_unslash( $_POST['vehicleMake'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['vehicleModel'] ) ) {
			$form['vehicle_model'] = filter_var( wp_unslash( $_POST['vehicleModel'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['vehicleTrim'] ) ) {
			$form['vehicle_trim'] = filter_var( wp_unslash( $_POST['vehicleTrim'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['leadSourceId'] ) ) {
			$form['lead_source_id'] = filter_var( wp_unslash( $_POST['leadSourceId'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['leadName'] ) ) {
			$form['lead_source_name'] = filter_var( wp_unslash( $_POST['leadName'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}

		// Build XML/ADF-formatted verion of lead.
		$xml = custom_form_build_lead_xml( $form );

		// Hook to allow additional action on form data.
		do_action( 'custom_form_submit', $form );

		// Post lead as XML/ADF to  ELMS.
		if ( 'production' === wp_get_environment_type() ) {
			$lead_id = custom_form_post_elms_xml( $xml, $form['customer_email'] );
		} else {
			$lead_id = 1;
		}

		if ( $lead_id ) {
			$response['success'] = true;
			$response['message'] = 'Thank you!';
			$response['lead_id'] = $lead_id;
		}
	}
	echo wp_json_encode( $response );
	exit();
}
add_action( 'wp_ajax_custom_special_order_form_submit_callback', 'custom_special_order_form_submit_callback' );
add_action( 'wp_ajax_nopriv_custom_special_order_form_submit_callback', 'custom_special_order_form_submit_callback' );

/**
 * Handles sales form submissions.
 *
 * @return void
 */
function custom_sales_form_submit_callback() {
	check_ajax_referer( 'form', '_wpnonce' );
	$response = array(
		'success' => false,
		'message' => 'Something went wrong! Please give us a call at ' . get_field( 'sales_telephone_number', 'option' ),
		'lead_id' => '',
	);
	if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] && ! empty( $_POST['gRecaptchaResponse'] ) && custom_grecaptcha_response_verify( sanitize_text_field( wp_unslash( $_POST['gRecaptchaResponse'] ) ) ) ) {
		$form = array(
			'customer_first_name' => '',
			'customer_last_name'  => '',
			'customer_phone'      => '',
			'customer_email'      => '',
			'customer_comments'   => 'Please contact me at the email or phone number provided.',
			'customer_timeframe'  => '',
			'trade_in'            => false,
			'trade_in_year'       => '',
			'trade_in_make'       => '',
			'trade_in_model'      => '',
			'trade_in_odometer'   => '',
			'vehicle_id'          => 0,
			'vehicle_interest'    => '',
			'lead_type'           => 'sales',
		);
		if ( ! empty( $_POST['interest'] ) && 'notsure' !== $_POST['interest'] ) {
			$form['vehicle_interest'] = filter_var( wp_unslash( $_POST['interest'] ), FILTER_SANITIZE_STRING );
		}
		if ( ! empty( $_POST['vehicleId'] ) ) {
			$form['vehicle_id'] = filter_var( wp_unslash( $_POST['vehicleId'] ), FILTER_VALIDATE_INT );

			// Add vehicle meta to array from ID.
			$form = custom_get_lead_vehicle_data( $form );
		}
		if ( ! empty( $_POST['firstName'] ) ) {
			$form['customer_first_name'] = filter_var( wp_unslash( $_POST['firstName'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['lastName'] ) ) {
			$form['customer_last_name'] = filter_var( wp_unslash( $_POST['lastName'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['phone'] ) ) {
			$form['customer_phone'] = preg_replace( '/[^0-9]/', '', filter_var( wp_unslash( $_POST['phone'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS ) );
		}
		if ( ! empty( $_POST['email'] ) ) {
			$form['customer_email'] = filter_var( wp_unslash( $_POST['email'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['comments'] ) ) {
			$form['customer_comments'] = filter_var( wp_unslash( $_POST['comments'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		} elseif ( $form['vehicle_id'] ) {
			$form['customer_comments'] = 'I am interested in this vehicle and would like more information. Please contact me at the email or phone number provided.';
		}
		if ( ! empty( $_POST['timeframe'] ) ) {
			$form['customer_timeframe'] = sanitize_text_field( wp_unslash( $_POST['timeframe'] ) );
		}
		if ( ! empty( $_POST['tradeInYear'] ) ) {
			$form['trade_in_year'] = sanitize_text_field( wp_unslash( $_POST['tradeInYear'] ) );
		}
		if ( ! empty( $_POST['tradeInMake'] ) ) {
			$form['trade_in_make'] = sanitize_text_field( wp_unslash( $_POST['tradeInMake'] ) );
		}
		if ( ! empty( $_POST['tradeInModel'] ) ) {
			$form['trade_in_model'] = sanitize_text_field( wp_unslash( $_POST['tradeInModel'] ) );
		}
		if ( isset( $_POST['tradeInMiles'] ) && is_numeric( $_POST['tradeInMiles'] ) ) {
			$form['trade_in_odometer'] = number_format( floatval( wp_unslash( $_POST['tradeInMiles'] ) ) );
		}

		// Build XML/ADF-formatted verion of lead.
		$xml = custom_form_build_lead_xml( $form );

		// Hook to allow additional action on form data.
		do_action( 'custom_form_submit', $form );

		// Post lead as XML/ADF to  ELMS.
		if ( 'production' === wp_get_environment_type() ) {
			$lead_id = custom_form_post_elms_xml( $xml, $form['customer_email'] );
		} else {
			$lead_id = 1;
		}

		if ( $lead_id ) {
			$response['success'] = true;
			$response['message'] = 'Thank you!';
			$response['lead_id'] = $lead_id;
		}
	}
	echo wp_json_encode( $response );
	exit();
}
add_action( 'wp_ajax_custom_sales_form_submit_callback', 'custom_sales_form_submit_callback' );
add_action( 'wp_ajax_nopriv_custom_sales_form_submit_callback', 'custom_sales_form_submit_callback' );

/**
 * Handles AJAX contact form submissions.
 *
 * @return void
 */
function custom_contact_form_submit_callback() {
	check_ajax_referer( 'form', '_wpnonce' );
	$response = array(
		'success' => false,
		'message' => 'Something went wrong! Please give us a call at ' . get_field( 'sales_telephone_number', 'option' ),
		'lead_id' => '',
	);
	if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] && ! empty( $_POST['gRecaptchaResponse'] ) && custom_grecaptcha_response_verify( sanitize_text_field( wp_unslash( $_POST['gRecaptchaResponse'] ) ) ) ) {
		$form = array(
			'customer_first_name' => '',
			'customer_last_name'  => '',
			'customer_phone'      => '',
			'customer_email'      => '',
			'customer_comments'   => 'Please contact me at the email or phone number provided.',
			'department'          => '',
			'lead_type'           => 'contact',
		);
		if ( ! empty( $_POST['firstName'] ) ) {
			$form['customer_first_name'] = filter_var( wp_unslash( $_POST['firstName'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['lastName'] ) ) {
			$form['customer_last_name'] = filter_var( wp_unslash( $_POST['lastName'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['phone'] ) ) {
			$form['customer_phone'] = preg_replace( '/[^0-9]/', '', filter_var( wp_unslash( $_POST['phone'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS ) );
		}
		if ( ! empty( $_POST['email'] ) ) {
			$form['customer_email'] = filter_var( wp_unslash( $_POST['email'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['department'] ) ) {
			$form['department'] = filter_var( wp_unslash( $_POST['department'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['comments'] ) ) {
			$form['customer_comments'] = filter_var( wp_unslash( $_POST['comments'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}

		// Email lead as text to dealership.
		custom_contact_form_send_text_email( $form );

		// Build XML/ADF-formatted verion of lead.
		$xml = custom_form_build_lead_xml( $form );

		// Email lead as XML/ADF to dealership CRM.
		$xml_email = custom_contact_form_send_xml_email( $xml, $form );

		// Hook to allow additional action on form data.
		do_action( 'custom_form_submit', $form );

		// Post lead as XML/ADF to  ELMS.
		if ( 'production' === wp_get_environment_type() ) {
			$lead_id = custom_form_post_elms_xml( $xml, $form['customer_email'] );
		} else {
			$lead_id = 1;
		}

		if ( $xml_email ) {
			$response['success'] = true;
			$response['message'] = 'Thank you!';
			$response['lead_id'] = $lead_id;
		}
	}
	echo wp_json_encode( $response );
	exit();
}
add_action( 'wp_ajax_custom_contact_form_submit_callback', 'custom_contact_form_submit_callback' );
add_action( 'wp_ajax_nopriv_custom_contact_form_submit_callback', 'custom_contact_form_submit_callback' );

/**
 * Handles AJAX Value Your Car form submissions.
 *
 * @return void
 */
function custom_value_your_car_form_submit_callback() {
	check_ajax_referer( 'form', '_wpnonce' );
	$response = array(
		'success' => false,
		'message' => 'Something went wrong! Please give us a call at ' . get_field( 'sales_telephone_number', 'option' ),
		'lead_id' => '',
	);

	if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] && ! empty( $_POST['g-recaptcha-response'] ) && custom_grecaptcha_response_verify( sanitize_text_field( wp_unslash( $_POST['g-recaptcha-response'] ) ) ) ) {

		// Setup unique temp upload directory for user photos.
		$nonce = '';
		if ( ! empty( $_POST['_wpnonce'] ) ) {
			$nonce = sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) );
		}
		$upload_dir = wp_upload_dir();
		$temp_dir   = $upload_dir['basedir'] . '/temp/' . $nonce;
		if ( ! file_exists( $temp_dir ) ) {
			wp_mkdir_p( $temp_dir );
		}

		$form = array(
			'customer_first_name'        => '',
			'customer_last_name'         => '',
			'customer_phone'             => '',
			'customer_email'             => '',
			'customer_comments'          => 'Please contact me at the email or phone number provided.',
			'customer_preferred_contact' => '',
			'lead_type'                  => 'trade-in',
		);
		if ( ! empty( $_POST['firstName'] ) ) {
			$form['customer_first_name'] = filter_var( wp_unslash( $_POST['firstName'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['lastName'] ) ) {
			$form['customer_last_name'] = filter_var( wp_unslash( $_POST['lastName'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['phone'] ) ) {
			$form['customer_phone'] = preg_replace( '/[^0-9]/', '', filter_var( wp_unslash( $_POST['phone'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS ) );
		}
		if ( ! empty( $_POST['email'] ) ) {
			$form['customer_email'] = filter_var( wp_unslash( $_POST['email'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['preferredContact'] ) ) {
			$form['customer_preferred_contact'] = sanitize_text_field( wp_unslash( $_POST['preferredContact'] ) );
		}
		if ( ! empty( $_POST['vehicleYear'] ) ) {
			$form['trade_in_year'] = sanitize_text_field( wp_unslash( $_POST['vehicleYear'] ) );
		}
		if ( ! empty( $_POST['vehicleMake'] ) ) {
			$form['trade_in_make'] = sanitize_text_field( wp_unslash( $_POST['vehicleMake'] ) );
		}
		if ( ! empty( $_POST['vehicleModel'] ) ) {
			$form['trade_in_model'] = sanitize_text_field( wp_unslash( $_POST['vehicleModel'] ) );
		}
		if ( ! empty( $_POST['vehicleVIN'] ) ) {
			$form['trade_in_vin'] = sanitize_text_field( wp_unslash( $_POST['vehicleVIN'] ) );
		}
		if ( ! empty( $_POST['comments'] ) ) {
			$form['customer_comments'] = filter_var(
				wp_unslash( $_POST['comments'] ),
				FILTER_SANITIZE_FULL_SPECIAL_CHARS,
				array(
					'flags' => FILTER_FLAG_NO_ENCODE_QUOTES,
				)
			);
		}

		$photos       = array();
		if ( ! empty( $_FILES['vehiclePhotos'] ) ) {
			$photos_count = count( $_FILES['vehiclePhotos']['name'] );
			for ( $i = 0; $i < $photos_count; $i++ ) {

				// Check for errors.
				if ( ! empty( $_FILES['vehiclePhotos']['error'][ $i ] ) ) {
					continue;
				}

				// Check filesize (10MB).
				if ( ! empty( $_FILES['vehiclePhotos']['size'][ $i ] ) && $_FILES['vehiclePhotos']['size'][ $i ] > 10000000 ) {
					continue;
				}

				// Check MIME Type.
				$finfo = new finfo( FILEINFO_MIME_TYPE );
				$ext   = false;
				if ( ! empty( $_FILES['vehiclePhotos']['tmp_name'][ $i ] ) ) {
					$ext = array_search(
						$finfo->file( $_FILES['vehiclePhotos']['tmp_name'][ $i ] ),
						array(
							'jpg' => 'image/jpeg',
							'png' => 'image/png',
							'gif' => 'image/gif',
						),
						true
					);
				}
				if ( false === $ext ) {
					continue;
				}

				if ( ! empty( $_FILES['vehiclePhotos']['name'][ $i ] ) && ! empty( $_FILES['vehiclePhotos']['tmp_name'][ $i ] ) ) {
					$from = sanitize_text_field( wp_unslash( $_FILES['vehiclePhotos']['tmp_name'][ $i ] ) );
					$to   = $temp_dir . '/' . sanitize_text_field( wp_unslash( $_FILES['vehiclePhotos']['name'][ $i ] ) );
					if ( move_uploaded_file( $from, $to ) ) {
						$photos[] = $to;
					}
				}
			}
		}

		// Hook to allow additional action on form data.
		do_action( 'custom_form_submit', $form );

		// Email lead as text to dealership.
		$email = custom_value_your_car_form_send_email( $form, $photos );
		if ( $email ) {
			$response['success'] = true;
			$response['message'] = 'Thank you!';
		}

		// Delete temp images.
		foreach ( $photos as $photo ) {
			unlink( $photo );
		}
	}
	echo wp_json_encode( $response );
	exit();
}
add_action( 'wp_ajax_custom_value_your_car_form_submit_callback', 'custom_value_your_car_form_submit_callback' );
add_action( 'wp_ajax_nopriv_custom_value_your_car_form_submit_callback', 'custom_value_your_car_form_submit_callback' );

/**
 * Sends contact form submission to dealership as human-readable inquiry. Returns true on successful send, false on failure.
 *
 * @param  array $form Array of form data.
 * @param  array $attachments Array of image file paths to attach.
 * @return bool
 */
function custom_value_your_car_form_send_email( $form, $attachments ) {
	$to      = array( 'email@email.com' );
	$subject = 'Custom Theme car Website Value Your Car Page Form Submission';

	$message  = 'First Name: ' . $form['customer_first_name'] . "\r\n";
	$message .= 'Last Name: ' . $form['customer_last_name'] . "\r\n";
	$message .= 'Phone: ' . $form['customer_phone'] . "\r\n";
	$message .= 'Email: ' . $form['customer_email'] . "\r\n";
	$message .= 'Preferred Contact: ' . $form['customer_preferred_contact'] . "\r\n";
	$message .= 'Vehicle Year: ' . $form['trade_in_year'] . "\r\n";
	$message .= 'Vehicle Make: ' . $form['trade_in_make'] . "\r\n";
	$message .= 'Vehicle Model: ' . $form['trade_in_model'] . "\r\n";
	$message .= 'Vehicle VIN: ' . $form['trade_in_vin'] . "\r\n";
	$message .= 'Comments: ' . $form['customer_comments'] . "\r\n";

	// Log email.
	custom_log_email( $message, __FUNCTION__ );

	// Send email.
	$send_email = wp_mail( $to, $subject, $message, '', $attachments );

	// Log email success/errors.
	custom_log_email_error( $form['customer_first_name'], $form['customer_last_name'], $form['customer_email'], __FUNCTION__, $send_email );

	return $send_email;
}

/**
 * Handles AJAX parts form submissions.
 *
 * @return void
 */
function custom_parts_form_submit_callback() {
	check_ajax_referer( 'form', '_wpnonce' );

	$response = array(
		'success' => false,
		'message' => 'Something went wrong! Please give us a call at ' . get_field( 'parts_telephone_number', 'option' ),
		'lead_id' => '',
	);
	if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] && ! empty( $_POST['gRecaptchaResponse'] ) && custom_grecaptcha_response_verify( sanitize_text_field( wp_unslash( $_POST['gRecaptchaResponse'] ) ) ) ) {
		$form = array(
			'customer_first_name'  => '',
			'customer_last_name'   => '',
			'customer_phone'       => '',
			'customer_email'       => '',
			'vehicle_year'         => '',
			'vehicle_make'         => '',
			'vehicle_model'        => '',
			'vehicle_trim'         => '',
			'vehicle_transmission' => '',
			'vehicle_parts'        => array(),
			'lead_type'            => 'parts',
		);
		if ( ! empty( $_POST['firstName'] ) ) {
			$form['customer_first_name'] = filter_var( wp_unslash( $_POST['firstName'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['lastName'] ) ) {
			$form['customer_last_name'] = filter_var( wp_unslash( $_POST['lastName'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['phone'] ) ) {
			$form['customer_phone'] = preg_replace( '/[^0-9]/', '', filter_var( wp_unslash( $_POST['phone'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS ) );
		}
		if ( ! empty( $_POST['email'] ) ) {
			$form['customer_email'] = filter_var( wp_unslash( $_POST['email'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['partsYear'] ) ) {
			$form['vehicle_year'] = filter_var( wp_unslash( $_POST['partsYear'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['partsMake'] ) ) {
			$form['vehicle_make'] = filter_var( wp_unslash( $_POST['partsMake'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['partsModel'] ) ) {
			$form['vehicle_model'] = filter_var( wp_unslash( $_POST['partsModel'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['partsTrim'] ) ) {
			$form['vehicle_trim'] = filter_var( wp_unslash( $_POST['partsTrim'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['partsTransmission'] ) ) {
			$form['vehicle_transmission'] = filter_var( wp_unslash( $_POST['partsTransmission'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}

		if ( ! empty( $_POST['parts'] ) ) {
			foreach ( $_POST['parts'] as $part ) {
				$form['vehicle_parts'][] = array(
					'part_name'         => filter_var( wp_unslash( $part['name'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS ),
					'part_number'       => filter_var( wp_unslash( $part['number'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS ),
					'part_description'  => filter_var( wp_unslash( $part['description'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS ),
					'part_installation' => ( 'true' === $part['installation'] ? true : false ),
				);
			}
		}

		// Email lead as text to dealership.
		$result = custom_parts_form_send_text_email( $form );

		// Build XML/ADF-formatted verion of lead.
		$xml = custom_parts_form_build_lead_xml( $form );

		// Hook to allow additional action on form data.
		do_action( 'custom_form_submit', $form );

		// Post lead as XML/ADF to  ELMS.
		if ( 'production' === wp_get_environment_type() ) {
			$lead_id = custom_form_post_elms_xml( $xml, $form['customer_email'] );
		} else {
			$lead_id = 1;
		}

		if ( $result ) {
			$response['success'] = true;
			$response['message'] = 'Thank you!';
			$response['lead_id'] = $lead_id;
		}
	}
	echo wp_json_encode( $response );
	exit();
}
add_action( 'wp_ajax_custom_parts_form_submit_callback', 'custom_parts_form_submit_callback' );
add_action( 'wp_ajax_nopriv_custom_parts_form_submit_callback', 'custom_parts_form_submit_callback' );


/**
 * Handles AJAX contact form submissions.
 *
 * @return void
 */
function custom_custom_order_form_submit_callback() {
	check_ajax_referer( 'form', '_wpnonce' );
	$response = array(
		'success' => false,
		'message' => 'Something went wrong! Please give us a call at ' . get_field( 'sales_telephone_number', 'option' ),
		'lead_id' => '',
	);
	if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] && ! empty( $_POST['gRecaptchaResponse'] ) && custom_grecaptcha_response_verify( sanitize_text_field( wp_unslash( $_POST['gRecaptchaResponse'] ) ) ) ) {
		$form = array(
			'customer_first_name'    => '',
			'customer_last_name'     => '',
			'customer_full_name'     => '',
			'customer_phone'         => '',
			'customer_email'         => '',
			'customer_address'       => '',
			'vehicle_interest'       => 'custom',
			'vehicle_year'           => '',
			'vehicle_model'          => '',
			'vehicle_trim'           => '',
			'vehicle_exterior_color' => '',
			'vehicle_interior_color' => '',
			'lead_type'              => 'custom',
		);
		if ( ! empty( $_POST['firstName'] ) ) {
			$form['customer_first_name'] = filter_var( wp_unslash( $_POST['firstName'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
			$form['customer_full_name']  = $form['customer_first_name'];
		}
		if ( ! empty( $_POST['lastName'] ) ) {
			$form['customer_last_name']  = filter_var( wp_unslash( $_POST['lastName'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
			$form['customer_full_name'] .= ' ' . $form['customer_last_name'];
		}
		if ( ! empty( $_POST['phone'] ) ) {
			$form['customer_phone'] = preg_replace( '/[^0-9]/', '', filter_var( wp_unslash( $_POST['phone'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS ) );
		}
		if ( ! empty( $_POST['email'] ) ) {
			$form['customer_email'] = filter_var( wp_unslash( $_POST['email'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['year'] ) ) {
			$form['vehicle_year'] = filter_var( wp_unslash( $_POST['year'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['model'] ) ) {
			$form['vehicle_model'] = filter_var( wp_unslash( $_POST['model'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['trim'] ) ) {
			$form['vehicle_trim'] = filter_var( wp_unslash( $_POST['trim'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['extColor'] ) ) {
			$form['vehicle_exterior_color'] = filter_var( wp_unslash( $_POST['extColor'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}
		if ( ! empty( $_POST['intColor'] ) ) {
			$form['vehicle_interior_color'] = filter_var( wp_unslash( $_POST['intColor'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		}

		// Build XML/ADF-formatted verion of lead.
		$xml = custom_form_build_custom_order_lead_xml( $form );

		// Post lead as XML/ADF to  ELMS.
		if ( 'production' === wp_get_environment_type() ) {
			$lead_id = custom_form_post_elms_xml( $xml, $form['customer_email'] );
		} else {
			$lead_id = 1;
		}

		if ( $lead_id ) {
			$response['success'] = true;
			$response['message'] = 'Thank you!';
			$response['lead_id'] = $lead_id;
		}
	}
	echo wp_json_encode( $response );
	exit();
}
add_action( 'wp_ajax_custom_custom_order_form_submit_callback', 'custom_custom_order_form_submit_callback' );
add_action( 'wp_ajax_nopriv_custom_custom_order_form_submit_callback', 'custom_custom_order_form_submit_callback' );

/**
 * XML BUILD FUNCTIONS.
 */

/**
 * Combines and formats form submission data into XML/ADF format.
 *
 * @param  array $form Array of form data.
 * @return string
 */
function custom_form_build_lead_xml( $form ) {
	$dealership_name = get_field( 'dealership_name', 'option' );
	$xml             = '<?xml version="1.0"?>
		<?adf version="1.0"?>
		<adf>
			<prospect status="new">
				<id source="custom Advertising"></id>
				<requestdate>' . current_time( DATE_W3C ) . '</requestdate>';
	if ( 'sales' === $form['lead_type'] ) {
		$xml .= '<vehicle interest="' . ( ! empty( $form['vehicle_interest'] ) ? $form['vehicle_interest'] : 'buy' ) . '" status="' . ( ! empty( $form['vehicle_status'] ) ? $form['vehicle_status'] : 'new' ) . '">';
		if ( ! empty( $form['vehicle_year'] ) ) {
			$xml .= '<year>' . $form['vehicle_year'] . '</year>';
		}
		if ( ! empty( $form['vehicle_make'] ) ) {
			$xml .= '<make>' . $form['vehicle_make'] . '</make>';
		}
		if ( ! empty( $form['vehicle_model'] ) ) {
			$xml .= '<model>' . $form['vehicle_model'] . '</model>';
		}
		if ( ! empty( $form['vehicle_trim'] ) ) {
			$xml .= '<trim>' . $form['vehicle_trim'] . '</trim>';
		}
		if ( ! empty( $form['vehicle_vin'] ) ) {
			$xml .= '<vin>' . $form['vehicle_vin'] . '</vin>';
		}
		if ( ! empty( $form['vehicle_stock'] ) ) {
			$xml .= '<stock>' . $form['vehicle_stock'] . '</stock>';
		}
		$xml .= '</vehicle>';
		if ( ! empty( $form['trade_in_year'] ) || ! empty( $form['trade_in_make'] ) || ! empty( $form['trade_in_model'] ) || ! empty( $form['trade_in_odometer'] ) ) {
			$xml .= '<vehicle interest="trade-in">
				<year>' . $form['trade_in_year'] . '</year>
				<make>' . $form['trade_in_make'] . '</make>
				<model>' . $form['trade_in_model'] . '</model>
				<odometer>' . $form['trade_in_odometer'] . '</odometer>
			</vehicle>';
		}
	}
	$xml .= '<customer>
		<contact>';
	if ( ! empty( $form['customer_first_name'] ) && ! empty( $form['customer_last_name'] ) ) {
		$xml .= '<name part="full">' . trim( $form['customer_first_name'] . ' ' . $form['customer_last_name'] ) . '</name>';
	}
	if ( ! empty( $form['customer_first_name'] ) ) {
		$xml .= '<name part="first">' . $form['customer_first_name'] . '</name>';
	}
	if ( ! empty( $form['customer_last_name'] ) ) {
		$xml .= '<name part="last">' . $form['customer_last_name'] . '</name>';
	}
	if ( ! empty( $form['customer_email'] ) ) {
		$xml .= '<email>' . $form['customer_email'] . '</email>';
	}
	if ( ! empty( $form['customer_phone'] ) ) {
		$xml .= '<phone type="voice">' . $form['customer_phone'] . '</phone>';
	}
	if ( ! empty( $form['customer_zip_code'] ) ) {
		$xml .= '<address>
				<postalcode>' . $form['customer_zip_code'] . '</postalcode>
			</address>';
	}
	$xml .= '</contact>
		<comments><![CDATA[';
	if ( ! empty( $form['customer_comments'] ) ) {
		$xml .= $form['customer_comments'];
	}
	if ( 'sales' === $form['lead_type'] ) {
		if ( ! empty( $form['customer_timeframe'] ) ) {
			$xml .= ' Plan to Purchase: ' . $form['customer_timeframe'] . '.';
		}
		if ( ! empty( $form['trade_in_year'] ) || ! empty( $form['trade_in_make'] ) || ! empty( $form['trade_in_model'] ) || ! empty( $form['trade_in_odometer'] ) ) {
			$xml .= ' Trade-in: Yes. Trade-in Year: ' . $form['trade_in_year'] . '. Trade-in Make: ' . $form['trade_in_make'] . '. Trade-in Model: ' . $form['trade_in_model'] . '. Trade-in Miles: ' . $form['trade_in_odometer'] . '.';
		}
	}
	$xml .= ']]></comments>
				</customer>
				<vendor>
					<id source="car-dealer-code">' . car_DEALER_ID . '</id>
					<vendorname>' . $dealership_name . '</vendorname>
					<url>' . get_home_url() . '</url>
					<contact>
						<name part="full">' . $dealership_name . '</name>
						<email>email@email.com</email>
						<phone type="voice"></phone>
						<address type="work">
							<street>' . get_field( 'dealership_street_address', 'option' ) . '</street>
							<apartment />
							<city>' . get_field( 'dealership_city', 'option' ) . '</city>
							<regioncode>' . get_field( 'dealership_state', 'option' ) . '</regioncode>
							<postalcode>' . get_field( 'dealership_zip_code', 'option' ) . '</postalcode>
							<country>US</country>
						</address>
					</contact>
				</vendor>
				<provider>
					<id source="car-source-id">';
	if ( ! empty( $form['lead_source_id'] ) ) {
		$xml .= $form['lead_source_id'];
	} elseif ( 'sales' === $form['lead_type'] ) {
		$xml .= '1525';
	} elseif ( 'contact' === $form['lead_type'] ) {
		$xml .= '1526';
	} elseif ( 'parts' === $form['lead_type'] ) {
		$xml .= '1527';
	}
	$xml .= '</id>
	<name part="full">';
	if ( ! empty( $form['lead_source_name'] ) ) {
		$xml .= $form['lead_source_name'];
	} elseif ( 'sales' === $form['lead_type'] ) {
		$xml .= 'custom Advertising - Request More Info';
	} elseif ( 'contact' === $form['lead_type'] ) {
		$xml .= 'custom Advertising - Contact Us';
	} elseif ( 'parts' === $form['lead_type'] ) {
		$xml .= 'custom Advertising - General Parts and Service';
	}
	$xml .= '</name>
				<contact>
					<name part="full">custom Advertising</name>
					<email>custom@customadvertising.com</email>
					<phone type="voice" time="day">5108659378</phone>
					<address type="work">
						<street line="1">1410 Park Ave.</street>
						<city>Alameda</city>
						<regioncode>CA</regioncode>
						<postalcode>94501</postalcode>
						<country>US</country>
					</address>
				</contact>
			</provider>
		</prospect>
	</adf>';
	return $xml;
}

/**
 * Create ADF/XML-formatted email content for parts form submissions.
 *
 * @param array $form Array of form data.
 * @return string
 */
function custom_parts_form_build_lead_xml( $form ) {
	$dealership_name = get_field( 'dealership_name', 'option' );
	$xml             = '<?xml version="1.0"?>
		<?adf version="1.0"?>
		<adf>
			<prospect status="new">
				<id source="custom Advertising"></id>
				<requestdate>' . current_time( DATE_W3C ) . '</requestdate>
				<customer>
					<contact>
						<name part="full">' . trim( $form['customer_first_name'] . ' ' . $form['customer_last_name'] ) . '</name>
						<name part="first">' . $form['customer_first_name'] . '</name>
						<name part="last">' . $form['customer_last_name'] . '</name>
						<email>' . $form['customer_email'] . '</email>
						<phone type="voice">' . $form['customer_phone'] . '</phone>
					</contact>
					<comments><![CDATA[
						Vehicle Year: ' . $form['vehicle_year'] . "\r\n" .
						'Vehicle Make: ' . $form['vehicle_make'] . "\r\n" .
						'Vehicle Model: ' . $form['vehicle_model'] . "\r\n" .
						'Vehicle Trim: ' . $form['vehicle_trim'] . "\r\n" .
						'Vehicle Transmission: ' . $form['vehicle_transmission'] . "\r\n" .
						"\r\n";
	if ( ! empty( $form['vehicle_parts'] ) ) {
		foreach ( $form['vehicle_parts'] as $part ) {
			$xml .= 'Part Name: ' . $part['part_name'] . "\r\n" .
				'Part Number: ' . $part['part_number'] . "\r\n" .
				'Part Description: ' . $part['part_description'] . "\r\n" .
				'Installation Requested: ' . $part['part_installation'] . "\r\n" .
				"\r\n";
		}
	}
	$xml .= ']]></comments>
			</customer>
			<vendor>
				<id source="car-dealer-code">' . car_DEALER_ID . '</id>
				<vendorname>' . $dealership_name . '</vendorname>
				<url>' . get_home_url() . '</url>
				<contact>
					<name part="full">' . $dealership_name . '</name>
					<email>email@email.com</email>
					<phone type="voice"></phone>
					<address type="work">
						<street>' . get_field( 'dealership_street_address', 'option' ) . '</street>
						<apartment />
						<city>' . get_field( 'dealership_city', 'option' ) . '</city>
						<regioncode>' . get_field( 'dealership_state', 'option' ) . '</regioncode>
						<postalcode>' . get_field( 'dealership_zip_code', 'option' ) . '</postalcode>
						<country>US</country>
					</address>
				</contact>
			</vendor>
			<provider>
				<id source="car-source-id">1527</id>
				<name part="full">custom Advertising - General Parts and Service</name>
				<contact>
					<name part="full">custom Advertising</name>
					<email>custom@customadvertising.com</email>
					<phone type="voice" time="day">5108659378</phone>
					<address type="work">
						<street line="1">1410 Park Ave.</street>
						<city>Alameda</city>
						<regioncode>CA</regioncode>
						<postalcode>94501</postalcode>
						<country>US</country>
					</address>
				</contact>
			</provider>
		</prospect>
	</adf>';
	return $xml;
}

/**
 * Combines and formats form submission data into XML/ADF format.
 *
 * @param  array $form Form user input.
 * @return string $xml            XML/ADF formated string.
 */
function custom_form_build_custom_order_lead_xml( $form ) {
	$dealership_name = get_field( 'dealership_name', 'option' );
	$xml             = '<?xml version="1.0"?>
		<?adf version="1.0"?>
		<adf>
			<prospect status="new">
				<id source="custom Advertising"></id>
				<requestdate>' . current_time( DATE_W3C ) . '</requestdate>';
	$xml .= '<vehicle interest="' . $form['vehicle_interest'] . '" status="new" >
					<year>' . $form['vehicle_year'] . '</year>
					<make>car</make>
					<model>' . $form['vehicle_model'] . '</model>
					<trim>' . $form['vehicle_trim'] . '</trim>
				</vehicle>';

	$xml .= '<customer>
					<contact>
						<name part="full"><![CDATA[' . $form['customer_full_name'] . ']]></name>
						<name part="first"><![CDATA[' . $form['customer_first_name'] . ']]></name>
						<name part="last"><![CDATA[' . $form['customer_last_name'] . ']]></name>
						<email>' . $form['customer_email'] . '</email>
						<phone type="voice">' . $form['customer_phone'] . '</phone>
					</contact>
					<comments><![CDATA['
					. 'Customer Address: ' . $form['customer_address']
					. '. Customer Order Model:' . $form['vehicle_model']
					. '. Customer Order Trim: ' . $form['vehicle_trim']
					. '. Customer Order Exterior Color: ' . $form['vehicle_exterior_color']
					. '. Customer Order Interior Color: ' . $form['vehicle_interior_color'] .
					']]></comments>
				</customer>
				<vendor>
					<id source="car-dealer-code">' . car_DEALER_ID . '</id>
					<vendorname>' . $dealership_name . '</vendorname>
					<url>' . get_home_url() . '</url>
					<contact>
						<name part="full">' . $dealership_name . '</name>
						<email>email@email.com</email>
						<phone type="voice"></phone>
						<address type="work">
							<street>' . get_field( 'dealership_street_address', 'option' ) . '</street>
							<apartment />
							<city>' . get_field( 'dealership_city', 'option' ) . '</city>
							<regioncode>' . get_field( 'dealership_state', 'option' ) . '</regioncode>
							<postalcode>' . get_field( 'dealership_zip_code', 'option' ) . '</postalcode>
							<country>US</country>
						</address>
					</contact>
				</vendor>
				<provider>
					<id source="car-source-id">1525</id>
					<name part="full">custom Advertising - Custom Order </name>
						<contact>
							<name part="full">custom Advertising</name>
							<email>custom@customadvertising.com</email>
							<phone type="voice" time="day">5108659378</phone>
							<address type="work">
								<street line="1">1410 Park Ave.</street>
								<city>Alameda</city>
								<regioncode>CA</regioncode>
								<postalcode>94501</postalcode>
								<country>US</country>
							</address>
						</contact>
				</provider>
			</prospect>
		</adf>';
	return $xml;
}


/**
 * Combines and formats form submission data into XML and send by email to dealer CRM.
 *
 * @param  string $xml  Lead formatted as XML/ADF string.
 * @param  array  $form Array of form data.
 * @return bool
 */
function custom_sales_form_send_xml_email( $xml, $form ) {
	$to = array(
		'email@email.com',
	);

	$subject = 'New lead from ' . get_bloginfo( 'name' ) . ' Website';

	// Log email.
	custom_log_email( $xml, __FUNCTION__ );

	// Send email.
	$send_email = wp_mail( $to, $subject, $xml );

	// Log email success/errors.
	custom_log_email_error( $form['customer_first_name'], $form['customer_last_name'], $form['customer_email'], __FUNCTION__, $send_email );

	return $send_email;
}

/**
 * Posts XML/ADF Lead to  ELMS service and receives status confirmation in return. Returns leads status on successful send, false on failure.
 *
 * @param  string $xml            Lead formatted as XML/ADF string.
 * @param  string $email          Lead email address.
 * @return string|bool
 */
function custom_form_post_elms_xml( $xml, $email ) {

	// Submit lead and recieve LeadId.
	$elms_resp = custom_post_shift_digital_elms_lead_curl( $xml, $email );

	// Confirm lead status.
	if ( $elms_resp && isset( $elms_resp->LeadId ) ) {
		$lead_status = custom_get_status_shift_digital_elms_lead_curl( $elms_resp->LeadId, $email );
		if ( isset( $lead_status->Successful ) && 'true' === (string) $lead_status->Successful ) {
			return (string) $lead_status->LeadId;
		}
	}
	return false;
}

/**
 * Sends sales form submission to dealership as human-readable inquiry. Returns true on successful send, false on failure.
 *
 * @param  string $form Array of form data.
 * @return bool
 */
function custom_sales_form_send_text_email( $form ) {
	$to      = array( 'email@email.com' );
	$subject = 'New Lead from ' . get_bloginfo( 'name' ) . ' Website';
	$message = 'First Name: ' . $form['customer_first_name'] . "\r\n" .
		'Last Name: ' . $form['customer_last_name'] . "\r\n" .
		'Phone: ' . $form['customer_phone'] . "\r\n" .
		'Email: ' . $form['customer_email'] . "\r\n" .
		'Comments: ' . $form['customer_comments'] . "\r\n";
	if ( $form['vehicle_id'] ) {
		$message .= 'Buy or Lease Interest: ' . $form['vehicle_interest'] . "\r\n" .
			'Vehicle Status: ' . $form['vehicle_status'] . "\r\n" .
			'Vehicle Year: ' . $form['vehicle_year'] . "\r\n" .
			'Vehicle Make: ' . $form['vehicle_make'] . "\r\n" .
			'Vehicle Model: ' . $form['vehicle_model'] . "\r\n" .
			'Vehicle VIN: ' . $form['vehicle_vin'] . "\r\n" .
			'Vehicle Stock Number: ' . $form['vehicle_stock'] . "\r\n";
	}
	if ( ! empty( $form['customer_timeframe'] ) ) {
		$message .= 'Plan to Purchase: ' . $form['customer_timeframe'] . "\r\n";
	}
	if ( ! empty( $form['trade_in_year'] ) || ! empty( $form['trade_in_make'] ) || ! empty( $form['trade_in_model'] ) || ! empty( $form['trade_in_odometer'] ) ) {
		$message .= 'Trade-in: Yes' . "\r\n" .
		'Trade-in Year: ' . $form['trade_in_year'] . "\r\n" .
		'Trade-in Make: ' . $form['trade_in_make'] . "\r\n" .
		'Trade-in Model: ' . $form['trade_in_model'] . "\r\n" .
		'Trade-in Miles: ' . $form['trade_in_odometer'] . "\r\n";
	} else {
		$message .= 'Has Trade-in: No.' . "\r\n";
	}
	$message .= 'Comments: ' . $form['customer_comments'] . "\r\n";

	// Log email.
	custom_log_email( $message, __FUNCTION__ );

	// Send email.
	$send_email = wp_mail( $to, $subject, $message );

	// Log email success/errors.
	custom_log_email_error( $form['customer_first_name'], $form['customer_last_name'], $form['customer_email'], __FUNCTION__, $send_email );

	return $send_email;
}

/**
 * Combines and formats form submission data into XML and sends by email to dealer CRM. Returns true on successful send, false on failure.
 *
 * @param  string $xml  Lead formatted as XML/ADF string.
 * @param  array  $form Array of form data.
 * @return bool
 */
function custom_contact_form_send_xml_email( $xml, $form ) {
	$to = array(
		'email@email.com',
	);

	$subject = 'New Lead from ' . get_bloginfo( 'name' ) . ' Website Contact Form';

	// Log email.
	custom_log_email( $xml, __FUNCTION__ );

	// Send email.
	$send_email = wp_mail( $to, $subject, $xml );

	// Log email success/errors.
	custom_log_email_error( $form['customer_first_name'], $form['customer_last_name'], $form['customer_email'], __FUNCTION__, $send_email );

	return $send_email;
}

/**
 * Sends contact form submission to dealership as human-readable inquiry. Returns t== c rue on successful send, false on failure.
 *
 * @param  array $form Array of form data.
 * @return bool
 */
function custom_contact_form_send_text_email( $form ) {
	$to      = array( 'email@email.com' );
	if( $form['department'] === 'Service' ){
		$to       = array( 'email@email.com' );
	} elseif ( $form['department'] === 'Parts' ){
		$to       = array( 'email@email.com' );
	}

	$subject = 'New Message from ' . get_bloginfo( 'name' ) . ' Website Contact Form';
	$message = 'First Name: ' . $form['customer_first_name'] . "\r\n" .
		'Last Name: ' . $form['customer_last_name'] . "\r\n" .
		'Phone: ' . $form['customer_phone'] . "\r\n" .
		'Email: ' . $form['customer_email'] . "\r\n" .
		'Comments: ' . $form['customer_comments'] . "\r\n";

	// Log email.
	custom_log_email( $message, __FUNCTION__ );

	// Send email.
	$send_email = wp_mail( $to, $subject, $message );

	// Log email success/errors.
	custom_log_email_error( $form['customer_first_name'], $form['customer_last_name'], $form['customer_email'], __FUNCTION__, $send_email );

	return $send_email;
}

/**
 * Emails parts order form requests to dealer. Returns true on successful send, false on failure.
 *
 * @param  array $form Array of form data.
 * @return bool
 */
function custom_parts_form_send_text_email( $form ) {
	$to      = array( 'email@email.com' );
	$subject = 'New Parts Request from ' . get_bloginfo( 'name' ) . ' Website';
	$message = 'First Name: ' . $form['customer_first_name'] . "\r\n" .
		'Last Name: ' . $form['customer_last_name'] . "\r\n" .
		'Phone: ' . $form['customer_phone'] . "\r\n" .
		'Email: ' . $form['customer_email'] . "\r\n" .
		'Vehicle Year: ' . $form['vehicle_year'] . "\r\n" .
		'Vehicle Make: ' . $form['vehicle_make'] . "\r\n" .
		'Vehicle Model: ' . $form['vehicle_model'] . "\r\n" .
		'Vehicle Trim: ' . $form['vehicle_trim'] . "\r\n" .
		'Vehicle Transmission: ' . $form['vehicle_transmission'] . "\r\n" .
		"\r\n";
	if ( ! empty( $form['vehicle_parts'] ) ) {
		foreach ( $form['vehicle_parts'] as $part ) {
			$message .= 'Part Name: ' . $part['part_name'] . "\r\n" .
				'Part Number: ' . $part['part_number'] . "\r\n" .
				'Part Description: ' . $part['part_description'] . "\r\n" .
				'Installation Requested: ' . ( $part['part_installation'] ? 'Yes' : 'No' ) . "\r\n" .
				"\r\n";
		}
	}

	// Log email.
	custom_log_email( $message, __FUNCTION__ );

	// Send email.
	$send_email = wp_mail( $to, $subject, $message );

	// Log email success/errors.
	custom_log_email_error( $form['customer_first_name'], $form['customer_last_name'], $form['customer_email'], __FUNCTION__, $send_email );

	return $send_email;
}