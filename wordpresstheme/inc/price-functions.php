<?php
/**
 * custom price display and sorting functions.
 *
 * @package Custom_Theme
 */

/**
 * Undocumented function
 *
 * @param int $id Vehicle Post ID.
 * @return bool
 */
function custom_update_price_record( $id ) {
	$price_history_record_key = '';
	if ( function_exists( 'wvd_get_acf_field_key' ) ) {
		$price_history_record_key = wvd_get_acf_field_key( 'price_history_record' );
	}
	if ( $price_history_record_key ) {
		$sale_price          = get_field( 'sale_price', $id );
		$latest_price        = '';
		$price_history       = get_field( 'price_history_record', $id );
		$price_history_array = json_decode( $price_history, true );
		if ( ! empty( $price_history_array ) ) {
			$latest_price = end( $price_history_array );
			reset( $price_history_array );
		}
		if ( $sale_price !== $latest_price ) {
			$price_history_array[ (int) current_time( 'timestamp' ) ] = $sale_price;
			return update_field( $price_history_record_key, wp_json_encode( $price_history_array ), $id );
		}
	}
	return false;
}

function custom_update_price_records_on_save_post( $id ) {
	if ( empty( $_POST['fields'] ) ) {
		return;
	}

	$post_type = get_post_type( $id );
	if ( 'vehicle' !== $post_type ) {
		return;
	}

	$field_keys = wvd_get_acf_fields();
	if ( ! empty( $field_keys ) ) {
		$price_history_record_key = $field_keys['price_history_record'];
		$sale_price_key           = $field_keys['sale_price'];
		if ( $price_history_record_key && $sale_price_key ) {
			$sale_price = $_POST['fields'][ $sale_price_key ];

			// Update price history record.
			$latest_price        = '';
			$price_history       = get_field( 'price_history_record', $id );
			$price_history_array = array();
			if ( ! empty( $price_history ) ) {
				$price_history_array = json_decode( $price_history, true );
				$latest_price        = end( $price_history_array );
				reset( $price_history_array );
			}
			if ( $sale_price !== $latest_price ) {
				$price_history_array[ (int) current_time( 'timestamp' ) ] = $sale_price;
				$_POST['fields'][ $price_history_record_key ]             = wp_json_encode( $price_history_array );
			}
		}
	}
}
add_action( 'acf/save_post', 'custom_update_price_records_on_save_post', 1 );


/**
 * Calculate monthly loan payments.
 *
 * @param int   $principal Loan amount.
 * @param float $apr       APR.
 * @param int   $term      Monthly loan payments.
 * @return int
 */
function custom_calculate_monthly_payments( $principal, $apr, $term ) {
	if ( 0.0 === $apr ) {
		return $principal / $term;
	} else {
		$interest = $apr / ( 100 * 12 );
		return $principal * ( ( $interest * pow( ( 1 + $interest ), $term ) ) / ( pow( ( 1 + $interest ), $term ) - 1 ) );
	}
}

/**
 * Callback function for Payment Calculator Form AJAX.
 *
 * @return void
 */
function custom_ajax_calculate_monthly_payments() {
	$response = array(
		'payment' => '',
		'errors'  => array(),
	);
	if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
		$sale_price   = 0;
		$down_payment = 0;
		$apr          = 0;
		$term         = 0;
		if ( isset( $_POST['salePrice'] ) ) {
			$sale_price = filter_var( wp_unslash( $_POST['salePrice'] ), FILTER_VALIDATE_INT );
		}
		if ( isset( $_POST['downPayment'] ) ) {
			$down_payment = filter_var( wp_unslash( $_POST['downPayment'] ), FILTER_VALIDATE_INT );
		}
		if ( isset( $_POST['apr'] ) ) {
			$apr = filter_var( wp_unslash( $_POST['apr'] ), FILTER_VALIDATE_FLOAT );
		}
		if ( isset( $_POST['term'] ) ) {
			$term = filter_var( wp_unslash( $_POST['term'] ), FILTER_VALIDATE_INT );
		}
		if ( empty( $sale_price ) ) {
			$response['errors'][] = 'Please enter a value for Sale Price.';
		} elseif ( empty( $term ) ) {
			$response['errors'][] = 'Please choose a loan term in months.';
		} else {
			$principal           = $sale_price - $down_payment;
			$response['payment'] = round( custom_calculate_monthly_payments( $principal, $apr, $term ) );
		}
	}
	echo wp_json_encode( $response );
	die();
}
add_action( 'wp_ajax_nopriv_custom_ajax_calculate_monthly_payments', 'custom_ajax_calculate_monthly_payments' );
add_action( 'wp_ajax_custom_ajax_calculate_monthly_payments', 'custom_ajax_calculate_monthly_payments' );
