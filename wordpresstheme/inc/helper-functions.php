<?php
/**
 * custom helper functions
 *
 * @package Custom_Theme
 */

/**
 * Undocumented function
 *
 * @param string $field_name
 * @param int    $id
 * @return bool
 */
function custom_check_field_locked( $field_name, $id ) {
	if ( get_field( 'locked_fields', $id ) ) {
		$locked_fields = json_decode( get_field( 'locked_fields', $id ), true );
		if ( json_last_error() !== JSON_ERROR_NONE || ( isset( $locked_fields[ $field_name ] ) && true === $locked_fields[ $field_name ] ) ) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

/**
 * Undocumented function
 *
 * @param int $id
 * @return bool
 */
function custom_post_exists( $id ) {
	if ( ! empty( $id ) ) {
		return is_string( get_post_status( $id ) );
	} else {
		return false;
	}
}

/**
 * Sorts an array by key using natural sorting. Like ksort().
 *
 * @param  array $array An array.
 * @return array        A sorted array.
 */
function natksort( $array ) {
	$keys = array_keys( $array );
	natsort( $keys );
	foreach ( $keys as $k ) {
		$new_array[ $k ] = $array[ $k ];
	}
	return $new_array;
}

/**
 * Rounds a price, always up, to multiple of 5000. Use to create maximum price filters.
 *
 * @param int $int
 * @return int
 */
function custom_price_round_up( $int ) {
	$diff = $int % 5000;
	if ( 0 === $diff ) {
		return $int;
	} else {
		return $int - $diff + 5000;
	}
}

/**
 * Rounds a price, always up, to multiple of 10000. Use to create maximum miles filters.
 *
 * @param int $num Number of miles.
 * @return int
 */
function custom_mile_round_up( $num ) {
	$diff = $num % 10000;
	if ( 0 === $diff ) {
		return $num;
	} else {
		return $num - $diff + 10000;
	}
}

/**
 * Converts integer prices to string and apply number format.
 *
 * @param int $int
 * @return int
 */
function custom_pretty_prices( $int ) {
	if ( is_numeric( $int ) ) {
		$float  = floatval( $int );
		$number = number_format( $float );
		return $number;
	} else {
		return $int;
	}
}

/**
 * Finds post_id by vehicle VIN.
 *
 * @param string $vin
 * @return int|bool
 */
function custom_get_vehicle_by_vin( $vin ) {
	if ( ! empty( $vin ) && strlen( $vin ) === 17 ) {
		$return_id = array();
		$args      = array(
			'post_type'      => 'vehicle',
			'fields'         => 'ids',
			'posts_per_page' => -1,
			'meta_query'     => array(
				array(
					'key'     => 'vin',
					'value'   => $vin,
					'compare' => '=',
				),
			),
		);
		$vin_query = get_posts( $args );
		if ( ! empty( $vin_query ) ) {
			foreach ( $vin_query as $id ) {
				$return_id[] = $id;
			}
			wp_reset_postdata();
			if ( count( $return_id ) === 1 ) {
				return $return_id[0];
			} else {
				return false;
			}
		} else {
			return false;
		}
	} else {
		return false;
	}
}

/**
 * Faster find and replace than str_replace by encoding and decoding as json before and after.
 *
 * @param string $search
 * @param string $replace
 * @param string $subject
 * @return string
 */
function str_replace_json( $search, $replace, $subject ) {
	return json_decode( str_replace( $search, $replace, wp_json_encode( $subject ) ) );

}

/**
 * Replaces degree symbol with html entity.
 *
 * @param string $string
 * @return string
 */
function custom_html_symbols( $string ) {
	return str_replace( '°', '&deg;', $string );
}

/**
 * Returns true is a give number param is a positive number.
 *
 * @param int $num
 * @return boolean
 */
function is_positive_number( $num ) {
	if ( ! empty( $num ) && is_numeric( $num ) && (int) $num > 0 ) {
		return true;
	}
	return false;
}

/**
 * Returns true if both an incentive's start and end date (in format YYYYMMDD) are valid in relation to today's date.
 *
 * @param string $starts
 * @param string $ends
 * @return boolean
 */
function is_valid_incentive( $starts, $ends ) {
	$today = current_time( 'Ymd' );
	if ( is_numeric( $starts ) && is_numeric( $ends ) && strlen( $starts ) === 8 && strlen( $ends ) === 8 && is_positive_number( $starts ) && is_positive_number( $ends ) && $starts <= $today && $ends >= $today ) {
		return true;
	}
	return false;
}

/**
 * Returns an array definition of sensible allowed HTML elements and attributes for wp_kses().
 *
 * @return array
 */
function custom_allowed_html() {
	return array(
		'a'          => array(
			'class' => array(),
			'href'  => array(),
			'rel'   => array(),
			'title' => array(),
		),
		'abbr'       => array(
			'title' => array(),
		),
		'b'          => array(),
		'blockquote' => array(
			'cite' => array(),
		),
		'cite'       => array(
			'title' => array(),
		),
		'code'       => array(),
		'del'        => array(
			'datetime' => array(),
			'title'    => array(),
		),
		'dd'         => array(),
		'div'        => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
		),
		'dl'         => array(),
		'dt'         => array(),
		'em'         => array(),
		'h1'         => array(
			'class' => array(),
		),
		'h2'         => array(
			'class' => array(),
		),
		'h3'         => array(
			'class' => array(),
		),
		'h4'         => array(
			'class' => array(),
		),
		'h5'         => array(
			'class' => array(),
		),
		'h6'         => array(
			'class' => array(),
		),
		'i'          => array(
			'class' => array(),
		),
		'img'        => array(
			'alt'    => array(),
			'class'  => array(),
			'height' => array(),
			'src'    => array(),
			'width'  => array(),
		),
		'li'         => array(
			'class' => array(),
		),
		'ol'         => array(
			'class' => array(),
		),
		'p'          => array(
			'class' => array(),
		),
		'q'          => array(
			'cite'  => array(),
			'title' => array(),
		),
		'span'       => array(
			'class' => array(),
			'title' => array(),
			'style' => array(),
		),
		'strike'     => array(),
		'strong'     => array(),
		'ul'         => array(
			'class' => array(),
		),
		'sub'        => array(),
		'sup'        => array(),
	);
}
