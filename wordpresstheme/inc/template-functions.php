<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Custom_Theme
 */

/**
 * Undocumented function
 *
 * @param array $classes
 * @param array $attributes
 * @return string
 */
function custom_body_class_attr( $classes = array(), $attributes = array() ) {

	global $wp_query;
	global $post;

	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	$new_vehicles_term = get_term_by( 'slug', custom_NEW_VEHICLES_SLUG, custom_TAXONOMY );
	if ( $new_vehicles_term ) {
		$new_vehicles_id = $new_vehicles_term->term_id;
	}

	//  Tagging Data Layer Variables.
	$attributes['data-sd-page-type'] = 'Other';
	$more_info_page                  = get_page_by_path( 'more-information' );
	if ( is_front_page() ) {
		$attributes['data-sd-page-type'] = 'Home';
	} elseif ( is_page( '2022-mx-5-miata-st-research' ) ) {
		$attributes['data-sd-page-type'] = '22MX5LP';
	} elseif ( is_page( '2022-mx-5-miata-rf-research' ) ) {
		$attributes['data-sd-page-type'] = '22MX5RFLP';
	} elseif ( is_home() || is_post_type_archive( 'post' ) || is_category() || is_date() || is_singular( 'post' ) ) {
		$classes[]                       = 'blog';
		$attributes['data-sd-page-type'] = 'Blog';
	} elseif ( is_singular( 'vehicle' ) ) {
		$attributes['data-sd-page-type'] = 'Vehicle Details';
	} elseif ( is_page( '2021-car6-research' ) ) {
		$attributes['data-sd-page-type'] = 'Model Showroom';
	} elseif ( is_post_type_archive( 'vehicle' ) || is_tax( custom_TAXONOMY ) ) {
		$attributes['data-sd-page-type'] = 'Vehicle Listing';
	} elseif ( is_post_type_archive( 'service_special' ) || is_tax( 'service_special_category' ) || is_singular( 'service_special' ) ) {
		$attributes['data-sd-page-type'] = 'Service Specials';
	} elseif ( is_page( 'car-service-center' ) ) {
		$attributes['data-sd-page-type'] = 'Service';
	} elseif ( is_page( 'car-tires' ) ) {
		$attributes['data-sd-page-type'] = 'Tire Store';
	} elseif ( is_page( 'genuine-car-parts' ) ) {
		$attributes['data-sd-page-type'] = 'Parts';
	} elseif ( is_page( 'contact-custom-theme' ) ) {
		$attributes['data-sd-page-type'] = 'Contact Us';
	} elseif ( is_page( 'value-your-car' ) ) {
		$attributes['data-sd-page-type'] = 'Trade In';
	} elseif ( is_post_type_archive( 'special_offer' ) || is_tax( 'special_offer_category' ) || is_singular( 'special_offer' ) ) {
		$attributes['data-sd-page-type'] = 'OEM Incentives';
	} elseif ( is_page( 'apply-auto-loan' ) ) {
		$attributes['data-sd-page-type'] = 'Finance';
	} elseif ( is_page( 'about-custom-theme' ) ) {
		$attributes['data-sd-page-type'] = 'About Us';
	} elseif ( ! empty( $post ) && ! empty( $more_info_page ) && ( $more_info_page->ID === $post->ID || ( ! empty( $post->ancestors ) && in_array( $more_info_page->ID, $post->ancestors, true ) ) ) ) {
		// 'More Information' page.
		$attributes['data-sd-page-type'] = 'Custom Dealer Content';
	}
	$attributes['data-sd-dealer-zip-code'] = get_field( 'dealership_zip_code', 'option' );
	$attributes['data-sd-traffic-type']    = '';

	// countSearchResults.
	$attributes['data-sd-count-search-results'] = $wp_query->found_posts;

	//  filterSearch.
	if ( ( is_post_type_archive( 'vehicle' ) || is_tax( custom_TAXONOMY ) ) && ! get_query_var( 's' ) ) {
		$classes[]                           = 'filter-results';
		$attributes['data-sd-filter-search'] = array(
			'status'    => 'Mixed',
			'year'      => 'All',
			'make'      => 'All',
			'model'     => 'All',
			'trim'      => 'All',
			'color'     => 'All',
			'minPrice'  => '',
			'maxPrice'  => '',
			'bodyStyle' => 'All',
			'features'  => 'All',
		);

		// status.
		if ( ! empty( $wp_query->query_vars[ custom_TAXONOMY ] ) ) {
			$current_term_slug = $wp_query->query_vars[ custom_TAXONOMY ];
			$current_term      = get_term_by( 'slug', $current_term_slug, custom_TAXONOMY );
		}

		if ( is_tax( custom_TAXONOMY, custom_NEW_VEHICLES_SLUG ) || custom_NEW_VEHICLES_SLUG === get_query_var( 'inventory' ) ) {
			$attributes['data-sd-filter-search']['status'] = 'New';
		} elseif ( is_tax( custom_TAXONOMY, custom_CPO_VEHICLES_SLUG ) || custom_CPO_VEHICLES_SLUG === get_query_var( 'inventory' ) ) {
			$attributes['data-sd-filter-search']['status'] = 'CPO';
		} elseif ( is_tax( custom_TAXONOMY, custom_USED_VEHICLES_SLUG ) || custom_USED_VEHICLES_SLUG === get_query_var( 'inventory' ) ) {
			$attributes['data-sd-filter-search']['status'] = 'Used';
		}

		// year.
		$year_from = '';
		$year_to   = '';
		if ( get_query_var( 'year_from' ) ) {
			$year_from = get_query_var( 'year_from' );
		}
		if ( get_query_var( 'year_to' ) ) {
			$year_to = get_query_var( 'year_to' );
		}
		if ( $year_from && $year_to ) {
			$years = array();
			while ( $year_from <= $year_to ) {
				$years[] = $year_from;
				$year_from++;
			}
			$attributes['data-sd-filter-search']['year'] = implode( '|', $years );
		} elseif ( $year_from ) {
			$attributes['data-sd-filter-search']['year'] = $year_from;
		} elseif ( $year_to ) {
			$attributes['data-sd-filter-search']['year'] = $year_to;
		}

		// make.
		if ( is_tax( custom_TAXONOMY, custom_NEW_VEHICLES_SLUG ) || custom_NEW_VEHICLES_SLUG === get_query_var( 'inventory' ) ) {
			$attributes['data-sd-filter-search']['make'] = 'car';
		} elseif ( get_query_var( 'make' ) ) {
			$attributes['data-sd-filter-search']['make'] = get_query_var( 'make' );
		}

		// model.
		if ( get_query_var( 'model' ) ) {
			$attributes['data-sd-filter-search']['model'] = get_query_var( 'model' );
		}

		// trim.
		if ( get_query_var( 'trim' ) ) {
			$attributes['data-sd-filter-search']['trim'] = get_query_var( 'trim' );
		}

		// color.
		if ( get_query_var( 'color' ) ) {
			$attributes['data-sd-filter-search']['color'] = get_query_var( 'color' );
		}

		// maxPrice.
		if ( get_query_var( 'sale_price' ) ) {
			$attributes['data-sd-filter-search']['maxPrice'] = get_query_var( 'sale_price' );
		} elseif ( ! empty( $current_term->term_id ) ) {
			$prices = custom_get_meta_values_term( 'sale_price', $current_term->term_id, 'vehicle' );
			if ( ! empty( $prices ) ) {
				$highest_price                                   = max( $prices );
				$attributes['data-sd-filter-search']['maxPrice'] = custom_price_round_up( (int) $highest_price );
			}
		}

		// features.
		$feature_array = array();
		if ( get_query_var( 'transmission' ) ) {
			$feature_array[] = get_query_var( 'transmission' );
		}
		if ( get_query_var( 'drivetrain' ) ) {
			$feature_array[] = get_query_var( 'drivetrain' );
		}
		if ( ! empty( $feature_array ) ) {
			$attributes['data-sd-filter-search']['features'] = implode( '|', $feature_array );
		}
	}

	//  typedSearch.
	$attributes['data-sd-typed-search-content'] = '';
	if ( is_search() && get_query_var( 's' ) ) {
		$classes[]                                  = 'search-results';
		$attributes['data-sd-typed-search-content'] = implode( '|', explode( ' ', get_query_var( 's' ) ) );
	}

	$attribute_array = array();
	foreach ( $attributes as $key => $value ) {
		if ( is_array( $value ) ) {
			$value = htmlspecialchars( wp_json_encode( $value ) );
		}
		$attribute_array[] = $key . '="' . $value . '"';
	}
	return body_class( $classes ) . ' ' . implode( ' ', $attribute_array );
}

/**
 * Return vehicle title string from vehicle post ID.
 *
 * @param int $id Vehicle Post ID.
 * @return string
 */
function custom_get_vehicle_title( $id ) {
	$vehicle_title      = '';
	$year               = get_field( 'year', $id );
	$make               = get_field( 'make', $id );
	$model              = get_field( 'model', $id );
	$trim               = get_field( 'trim', $id );
	$trim_detail        = get_field( 'trim_detail', $id );
	$body_style         = get_field( 'body_style', $id );
	$generic_body_style = get_field( 'generic_body_style', $id );
	$drivetrain_type    = get_field( 'drivetrain_type', $id );
	$transmission_type  = get_field( 'transmission_type', $id );
	if ( $year ) {
		$vehicle_title .= ' ' . $year;
	}
	if ( $make && $model && strpos( $model, $make ) === false ) {
		$vehicle_title .= ' ' . $make . ' ' . $model;
	} elseif ( $model ) {
		$vehicle_title .= ' ' . $model;
		if ( $body_style && strpos( $model, $body_style ) === false ) {
			$vehicle_title .= ' ' . $body_style;
		}
	}
	if ( $trim ) {
		$vehicle_title .= ' ' . $trim;
	}
	if ( $trim_detail ) {
		$vehicle_title .= ' ' . $trim_detail;
	}
	if ( $transmission_type ) {
		$vehicle_title .= ' ' . $transmission_type;
	}
	if ( $generic_body_style && ( 'Truck' === $generic_body_style || 'SUV' === $generic_body_style || 'FWD' !== $drivetrain_type ) ) {
		$vehicle_title .= ' ' . $drivetrain_type;
	}

	return str_replace( '®', '<sup>®</sup>', esc_html( trim( $vehicle_title ) ) );
};

/**
 * Numbered pagination links.
 *
 * @return void
 */
function custom_pagination() {
	global $wp_query;
	$big   = 999999999; // Need an unlikely integer.
	$pages = paginate_links(
		array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '/page/%#%',
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $wp_query->max_num_pages,
			'type'      => 'array',
			'show_all'  => true,
			'prev_next' => true,
			'prev_text' => '<span class="visually-hidden">' . __( 'Previous', 'custom' ) . '</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M21.311 29L23 27.354 12.2 17 23 6.646 21.311 5 9 17l12.311 12z"/></svg>',
			'next_text' => '<span class="visually-hidden">' . __( 'Next', 'custom' ) . '</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M10.689 5L9 6.646 19.8 17 9 27.354 10.689 29 23 17 10.689 5z"/></svg>',
		)
	);
	if ( is_array( $pages ) ) {
		echo '<ul>';
		foreach ( $pages as $page ) {
			$page = str_replace( 'page-numbers', 'page-numbers page-link', $page );
			echo '<li>' . $page . '</li>';
		}
		echo '</ul>';
	}
}

/**
 * Returns array of department hours, with days grouped by open and close times.
 *
 * @param string $department Department name slug. One of 'sales', 'service', 'parts' or 'rental'.
 * @return array
 */
function custom_get_hours( $department ) {
	$days = array(
		'Monday',
		'Tuesday',
		'Wednesday',
		'Thursday',
		'Friday',
		'Saturday',
		'Sunday',
	);
	return custom_group_hours(
		array(
			array(
				'name'   => $days[0],
				'opens'  => get_field( $department . '_monday_open', 'option' ),
				'closes' => get_field( $department . '_monday_close', 'option' ),
			),
			array(
				'name'   => $days[1],
				'opens'  => get_field( $department . '_tuesday_open', 'option' ),
				'closes' => get_field( $department . '_tuesday_close', 'option' ),
			),
			array(
				'name'   => $days[2],
				'opens'  => get_field( $department . '_wednesday_open', 'option' ),
				'closes' => get_field( $department . '_wednesday_close', 'option' ),
			),
			array(
				'name'   => $days[3],
				'opens'  => get_field( $department . '_thursday_open', 'option' ),
				'closes' => get_field( $department . '_thursday_close', 'option' ),
			),
			array(
				'name'   => $days[4],
				'opens'  => get_field( $department . '_friday_open', 'option' ),
				'closes' => get_field( $department . '_friday_close', 'option' ),
			),
			array(
				'name'   => $days[5],
				'opens'  => get_field( $department . '_saturday_open', 'option' ),
				'closes' => get_field( $department . '_saturday_close', 'option' ),
			),
			array(
				'name'   => $days[6],
				'opens'  => get_field( $department . '_sunday_open', 'option' ),
				'closes' => get_field( $department . '_sunday_close', 'option' ),
			),
		)
	);
}

/**
 * Returns department hours with days grouped by time.
 *
 * @param array $hours_by_day Array of days of the week with opening and closing times.
 * @return array
 */
function custom_group_hours( $hours_by_day ) {
	$hours   = array();
	$i       = 0;
	$pointer = 0;
	foreach ( $hours_by_day as $day ) {
		if ( 0 === $i || $hours[ $pointer ]['opens'] !== $day['opens'] || $hours[ $pointer ]['closes'] !== $day['closes'] ) {
			$hours[] = array(
				'day'    => array( $day['name'] ),
				'opens'  => $day['opens'],
				'closes' => $day['closes'],
			);
			$pointer = count( $hours ) - 1;
		} else {
			$hours[ $pointer ]['day'][] = $day['name'];
		}
		$i++;
	}
	return $hours;
}