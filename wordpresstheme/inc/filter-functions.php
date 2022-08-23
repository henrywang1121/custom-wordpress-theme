<?php
/**
 * custom Vehicle Filter and Sort functions.
 *
 * @package Custom_Theme
 */

/**
 * Registers custom query vars.
 *
 * @param array $public_query_vars The array of allowed query variable names.
 * @return array
 */
function custom_query_vars( $public_query_vars ) {
	$public_query_vars[] = 'sort';
	$public_query_vars[] = 'year_from';
	$public_query_vars[] = 'year_to';
	$public_query_vars[] = 'make';
	$public_query_vars[] = 'model';
	$public_query_vars[] = 'trim';
	$public_query_vars[] = 'color';
	$public_query_vars[] = 'transmission';
	$public_query_vars[] = 'drivetrain';
	$public_query_vars[] = 'fuel';
	$public_query_vars[] = 'miles_from';
	$public_query_vars[] = 'miles_to';
	$public_query_vars[] = 'price_from';
	$public_query_vars[] = 'price_to';
	return $public_query_vars;
}
add_filter( 'query_vars', 'custom_query_vars' );

/**
 * Validates and sansitizes $_GET and $_POST variables.
 *
 * @param string $method Optional. Method and global variable to access.
 * @param string $key    Optional. Variable key to return.
 * @return array|bool
 */
function custom_request_vars( $method = 'get', $key = null ) {
	$args = array(
		'inventory'    => FILTER_SANITIZE_STRING,
		'sort'         => FILTER_SANITIZE_STRING,
		'year_from'    => FILTER_VALIDATE_INT,
		'year_to'      => FILTER_VALIDATE_INT,
		'make'         => array(
			'filter' => FILTER_SANITIZE_STRING,
			'flags'  => FILTER_REQUIRE_ARRAY,
		),
		'model'        => array(
			'filter' => FILTER_SANITIZE_STRING,
			'flags'  => FILTER_REQUIRE_ARRAY,
		),
		'trim'         => array(
			'filter' => FILTER_SANITIZE_STRING,
			'flags'  => FILTER_REQUIRE_ARRAY,
		),
		'color'        => array(
			'filter' => FILTER_SANITIZE_STRING,
			'flags'  => FILTER_REQUIRE_ARRAY,
		),
		'transmission' => array(
			'filter' => FILTER_SANITIZE_STRING,
			'flags'  => FILTER_REQUIRE_ARRAY,
		),
		'drivetrain'   => array(
			'filter' => FILTER_SANITIZE_STRING,
			'flags'  => FILTER_REQUIRE_ARRAY,
		),
		'fuel'         => array(
			'filter' => FILTER_SANITIZE_STRING,
			'flags'  => FILTER_REQUIRE_ARRAY,
		),
		'miles_from'   => FILTER_VALIDATE_INT,
		'miles_to'     => FILTER_VALIDATE_INT,
		'price_from'   => FILTER_VALIDATE_INT,
		'price_to'     => FILTER_VALIDATE_INT,
		's'            => FILTER_SANITIZE_STRING,
	);
	if ( 'post' === $method ) {
		$vars = filter_input_array( INPUT_POST, $args );
	} else {
		$vars = filter_input_array( INPUT_GET, $args );
	}
	if ( ! empty( $vars ) ) {
		if ( $key ) {
			return $vars[ $key ];
		} elseif ( is_array( $vars ) ) {
			return array_filter( $vars );
		}
		return false;
	}
	return false;
}

/**
 * Alters main query on vehicle inventory pages using pre_get_posts. Adds metaquery and orderby filters to apply user filter selections and default ordering.
 *
 * @param WP_Query $query
 * @return void
 */
function custom_filter( $query ) {
	if ( is_admin() ) {
		return;
	}

	if ( ! $query->is_main_query() ) {
		return;
	}

	if ( ! $query->is_tax( custom_TAXONOMY ) && ! $query->is_post_type_archive( 'vehicle' ) ) {
		return;
	}

	// Build metaquery.
	if ( get_query_var( 'year_from' ) ) {
		$meta_query[] = array(
			'key'     => 'year',
			'value'   => get_query_var( 'year_from' ),
			'type'    => 'numeric',
			'compare' => '>=',
		);
	}

	if ( get_query_var( 'year_to' ) ) {
		$meta_query[] = array(
			'key'     => 'year',
			'value'   => get_query_var( 'year_to' ),
			'type'    => 'numeric',
			'compare' => '<=',
		);
	}

	if ( get_query_var( 'make' ) ) {
		$make_array = explode( ',', get_query_var( 'make' ) );
		$make_query = array(
			'relation' => 'OR',
		);
		foreach ( $make_array as $make ) {
			$make_query[] = array(
				'key'     => 'make',
				'value'   => $make,
				'compare' => '=',
			);
		}
		$meta_query[] = $make_query;
	}

	if ( get_query_var( 'model' ) ) {
		$model_array = explode( ',', get_query_var( 'model' ) );
		$model_query = array(
			'relation' => 'OR',
		);
		foreach ( $model_array as $model ) {
			if ( 'null' === $model ) {
				$model_query[] = array(
					'key'     => 'model',
					'value'   => 'n/a',
					'compare' => 'NOT EXISTS',
				);
			} else {
				$model_query[] = array(
					'key'     => 'model',
					'value'   => $model,
					'compare' => '=',
				);
			}
		}
		$meta_query[] = $model_query;
	}

	if ( get_query_var( 'trim' ) ) {
		$trim_array = explode( ',', get_query_var( 'trim' ) );
		$trim_query = array(
			'relation' => 'OR',
		);
		foreach ( $trim_array as $trim ) {
			if ( 'null' === $trim ) {
				$trim_query[] = array(
					'key'     => 'trim',
					'value'   => 'n/a',
					'compare' => 'NOT EXISTS',
				);
			} else {
				$trim_query[] = array(
					'key'     => 'trim',
					'value'   => $trim,
					'compare' => '=',
				);
			}
		}
		$meta_query[] = $trim_query;
	}

	if ( get_query_var( 'color' ) ) {
		$color_array = explode( ',', get_query_var( 'color' ) );
		$color_query = array(
			'relation' => 'OR',
		);
		foreach ( $color_array as $color ) {
			$color_query[] = array(
				'key'     => 'ext_color_generic',
				'value'   => $color,
				'compare' => '=',
			);
		}
		$meta_query[] = $color_query;
	}

	if ( get_query_var( 'transmission' ) ) {
		$transmission_array = explode( ',', get_query_var( 'transmission' ) );
		$transmission_query = array(
			'relation' => 'OR',
		);
		foreach ( $transmission_array as $transmission ) {
			if ( 'null' === $transmission ) {
				$transmission_query[] = array(
					'key'     => 'transmission_type',
					'value'   => 'n/a',
					'compare' => 'NOT EXISTS',
				);
				$transmission_query[] = array(
					'key'     => 'transmission_type',
					'value'   => '',
					'compare' => '=',
				);
			} else {
				$transmission_query[] = array(
					'key'     => 'transmission_type',
					'value'   => $transmission,
					'compare' => '=',
				);
			}
		}
		$meta_query[] = $transmission_query;
	}

	if ( get_query_var( 'drivetrain' ) ) {
		$drivetrain_array = explode( ',', get_query_var( 'drivetrain' ) );
		$drivetrain_query = array(
			'relation' => 'OR',
		);
		foreach ( $drivetrain_array as $drivetrain ) {
			$drivetrain_query[] = array(
				'key'     => 'drivetrain_type',
				'value'   => $drivetrain,
				'compare' => '=',
			);
		}
		$meta_query[] = $drivetrain_query;
	}

	if ( get_query_var( 'fuel' ) ) {
		$fuel_array = explode( ',', get_query_var( 'fuel' ) );
		$fuel_query = array(
			'relation' => 'OR',
		);
		foreach ( $fuel_array as $fuel ) {
			$fuel_query[] = array(
				'key'     => 'fuel_type',
				'value'   => $fuel,
				'compare' => '=',
			);
		}
		$meta_query[] = $fuel_query;
	}

	if ( get_query_var( 'miles_from' ) ) {
		$meta_query[] = array(
			'key'     => 'miles',
			'value'   => get_query_var( 'miles_from' ),
			'type'    => 'numeric',
			'compare' => '>=',
		);
	}

	if ( get_query_var( 'miles_to' ) ) {
		$meta_query[] = array(
			'key'     => 'miles',
			'value'   => get_query_var( 'miles_to' ),
			'type'    => 'numeric',
			'compare' => '<=',
		);
	}

	if ( get_query_var( 'price_from' ) ) {
		$meta_query[] = array(
			'key'     => 'sale_price',
			'value'   => get_query_var( 'price_from' ),
			'type'    => 'numeric',
			'compare' => '>=',
		);
	}

	if ( get_query_var( 'price_to' ) ) {
		$meta_query[] = array(
			'key'     => 'sale_price',
			'value'   => get_query_var( 'price_to' ),
			'type'    => 'numeric',
			'compare' => '<=',
		);
	}

	$sort = get_query_var( 'sort' );
	if ( $sort ) {
		if ( 'year-desc' === $sort ) {
			$query->set( 'orderby', 'meta_value' );
			$query->set( 'meta_key', 'year' );
			$query->set( 'order', 'DESC' );
		} elseif ( 'year-asc' === $sort ) {
			$query->set( 'orderby', 'meta_value' );
			$query->set( 'meta_key', 'year' );
			$query->set( 'order', 'ASC' );
		} elseif ( 'miles-desc' === $sort ) {
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'meta_key', 'miles' );
			$query->set( 'order', 'DESC' );
		} elseif ( 'miles-asc' === $sort ) {
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'meta_key', 'miles' );
			$query->set( 'order', 'ASC' );
		} elseif ( 'price-desc' === $sort ) {
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'meta_key', 'sale_price' );
			$query->set( 'order', 'DESC' );
		} elseif ( 'price-asc' === $sort ) {
			$query->set( 'meta_key', 'sale_price' );
			add_filter( 'posts_orderby', 'custom_orderby_price_asc', 10, 2 );
		} elseif ( 'in-stock-asc' === $sort ) {
			$query->set( 'orderby', 'meta_value' );
			$query->set( 'meta_key', 'on_lot_date' );
			$query->set( 'order', 'DESC' );
		} elseif ( 'discount-desc' === $sort ) {
			$query->set( 'orderby', 'meta_value_num' );
			$query->set( 'meta_key', 'price_adjustment' );
			$query->set( 'order', 'ASC' );
		} elseif ( 'relevance' === $sort ) {
			$query->set( 'orderby', 'relevance' );
		}
	}

	if ( ! empty( $meta_query ) ) {
		$meta_query['relation'] = 'AND';
		$query->set( 'meta_query', $meta_query );

		// Reset to page one for filter results.
		// $query->set( 'paged', 1 );
	}

	if ( empty( $meta_query ) && empty( $sort ) ) {
		// Default to sort by price.
		$query->set(
			'meta_query',
			array(
				'relation' => 'AND',
				array(
					'relation' => 'OR',
					array(
						'key'     => 'in_transit',
						'compare' => 'NOT EXISTS',
					),
					array(
						'key'     => 'in_transit',
						'compare' => 'EXISTS',
					),
				),
				array(
					'key' => 'sale_price',
				),
			)
		);
		add_filter( 'posts_orderby', 'custom_orderby_in_transit_asc_price_asc', 10, 2 );
	}
}
add_action( 'pre_get_posts', 'custom_filter' );

/**
 * Undocumented function
 *
 * @param string   $orderby_statement The ORDER BY clause of the query.
 * @param WP_Query $wp_query          The WP_Query instance (passed by reference).
 * @return string
 */
function custom_orderby_price_asc( $orderby_statement, $wp_query ) {
	if ( ! is_admin() && $wp_query->is_main_query() && ( $wp_query->is_tax( custom_TAXONOMY ) || $wp_query->is_post_type_archive( 'vehicle' ) ) ) {
		global $wpdb;
		$orderby_statement = $wpdb->prefix . 'postmeta.meta_value=0, ' . $wpdb->prefix . 'postmeta.meta_value+0 ASC';
	}
	return $orderby_statement;
}

/**
 * Undocumented function
 *
 * @param string   $orderby_statement The ORDER BY clause of the query.
 * @param WP_Query $wp_query          The WP_Query instance (passed by reference).
 * @return string
 */
function custom_orderby_in_transit_asc_price_asc( $orderby_statement, $wp_query ) {
	if ( ! is_admin() && $wp_query->is_main_query() && ( $wp_query->is_tax( custom_TAXONOMY ) || $wp_query->is_post_type_archive( 'vehicle' ) ) ) {
		$orderby_statement = 'mt1.meta_value=+0 DESC, mt2.meta_value=0, mt2.meta_value+0 ASC';
	}
	return $orderby_statement;
}

/**
 * [TODO]
 *
 * @param array  $tax_terms     Optional. Array of inventory term slugs.
 * @param string $search_query  Optional. Search query term(s).
 * @return array|bool
 */
function custom_query_vehicles( $tax_terms = array(), $search_query = '' ) {
	$args = array(
		'post_type'      => 'vehicle',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'no_found_rows'  => true,
		'fields'         => 'ids',
	);
	if ( ! empty( $tax_terms ) ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => custom_TAXONOMY,
				'field'    => 'slug',
				'terms'    => $tax_terms,
			),
		);
	}

	if ( $search_query ) {
		$args['s'] = $search_query;
	}
	$vehicles = new WP_Query( $args );
	if ( $search_query && function_exists( 'relevanssi_do_query' ) ) {
		$vehicles->parse_query( $args );
		relevanssi_do_query( $vehicles );
	}
	$values = array();
	if ( $vehicles->have_posts() ) {
		foreach ( $vehicles->posts as $id ) {
			$values[ $id ] = array(
				'year'         => (int) get_post_meta( $id, 'year', true ),
				'make'         => get_post_meta( $id, 'make', true ),
				'model'        => get_post_meta( $id, 'model', true ),
				'trim'         => get_post_meta( $id, 'trim', true ),
				'color'        => get_post_meta( $id, 'ext_color_generic', true ),
				'transmission' => get_post_meta( $id, 'transmission_type', true ),
				'drivetrain'   => get_post_meta( $id, 'drivetrain_type', true ),
				'fuel'         => get_post_meta( $id, 'fuel_type', true ),
				'miles'        => (int) get_post_meta( $id, 'miles', true ),
				'price'        => (int) get_post_meta( $id, 'sale_price', true ),
			);
		}
	}
	if ( ! empty( $values ) ) {
		return $values;
	}
	return false;
}

/**
 * Filter all vehicles in query by matching values in filter state, returning array of values for provided meta key.
 *
 * @param array  $vehicle_query
 * @param array  $filter_state
 * @param string $meta_key
 * @return array
 */
function custom_filter_vehicles( $vehicle_query, $filter_state, $meta_key ) {
	$field_values = array();
	$filtered     = array();
	if ( is_array( $vehicle_query ) ) {
		$filtered = array_filter(
			$vehicle_query,
			function( $vehicle ) use ( $filter_state ) {
				$match = true;
				foreach ( $filter_state as $key => $value ) {
					if ( 'year_from' === $key || 'year_to' === $key ) {
						$key = 'year';
						if ( 'year_from' === $key && (int) $vehicle[ $key ] < $value ) {
							$match = false;
						} elseif ( 'year_to' === $key && (int) $vehicle[ $key ] > $value ) {
							$match = false;
						}
					} elseif ( 'miles_from' === $key || 'miles_to' === $key ) {
						$key = 'miles';
						if ( 'miles_from' === $key && (int) $vehicle[ $key ] < $value ) {
							$match = false;
						} elseif ( 'miles_to' === $key && (int) $vehicle[ $key ] > $value ) {
							$match = false;
						}
					} elseif ( 'price_from' === $key || 'price_to' === $key ) {
						$key = 'price';
						if ( 'price_from' === $key && (int) $vehicle[ $key ] < $value ) {
							$match = false;
						} elseif ( 'price_to' === $key && (int) $vehicle[ $key ] > $value ) {
							$match = false;
						}
					} elseif ( ( is_array( $value ) && ! in_array( $vehicle[ $key ], $value, true ) ) || ( ! is_array( $value ) && $value !== $vehicle[ $key ] ) ) {
						$match = false;
					}
				}
				return $match;
			}
		);
	}
	if ( ! empty( $filtered ) ) {
		foreach ( $filtered as $i => $vehicle ) {
			$field_values[] = $vehicle[ $meta_key ];
		}
	}
	return $field_values;
}

/**
 * Undocumented function
 *
 * @param array  $tax_terms    Optional. Array of term slugs to query.
 * @param string $search_query Optional. Search query.
 * @return array
 */
function custom_get_filter_array( $tax_terms = array(), $search_query = '' ) {
	$filter_state = array();
	$meta_keys    = array(
		'year',
		'make',
		'model',
		'trim',
		'color',
		'transmission',
		'drivetrain',
		'fuel',
		'miles',
		'price',
	);
	$filter       = array(
		'year_from'    => array(
			'name'     => 'Year',
			'options'  => array(),
			'selected' => 0,
			'disabled' => false,
		),
		'year_to'      => array(
			'name'     => 'Year',
			'options'  => array(),
			'selected' => 0,
			'disabled' => false,
		),
		'make'         => array(
			'name'     => 'Make',
			'options'  => array(),
			'selected' => array(),
			'disabled' => false,
		),
		'model'        => array(
			'name'     => 'Model',
			'options'  => array(),
			'selected' => array(),
			'disabled' => false,
		),
		'trim'         => array(
			'name'     => 'Trim',
			'options'  => array(),
			'selected' => array(),
			'disabled' => false,
		),
		'color'        => array(
			'name'     => 'Color',
			'options'  => array(),
			'selected' => array(),
			'disabled' => false,
		),
		'transmission' => array(
			'name'     => 'Transmission',
			'options'  => array(),
			'selected' => array(),
			'disabled' => false,
		),
		'drivetrain'   => array(
			'name'     => 'Drivetrain',
			'options'  => array(),
			'selected' => array(),
			'disabled' => false,
		),
		'fuel'         => array(
			'name'     => 'Fuel',
			'options'  => array(),
			'selected' => array(),
			'disabled' => false,
		),
		'miles_from'   => array(
			'name'     => 'Miles',
			'options'  => array(),
			'selected' => 0,
			'disabled' => false,
		),
		'miles_to'     => array(
			'name'     => 'Miles',
			'options'  => array(),
			'selected' => 0,
			'disabled' => false,
		),
		'price_from'   => array(
			'name'     => 'Price',
			'options'  => array(),
			'selected' => 0,
			'disabled' => false,
		),
		'price_to'     => array(
			'name'     => 'Price',
			'options'  => array(),
			'selected' => 0,
			'disabled' => false,
		),
	);

	// Set filter state from query vars.
	foreach ( array_keys( $filter ) as $key ) {
		$var = get_query_var( $key );
		if ( $var && array_key_exists( $key, $filter ) ) {
			$var_array = explode( ',', $var );
			if ( is_array( $filter[ $key ]['selected'] ) ) {
				$filter_state[ $key ] = $var_array;
			} else {
				$filter_state[ $key ] = $var;
			}
		}
	}

	// Set taxonomy terms from query var.
	if ( get_query_var( 'inventory' ) ) {
		$tax_terms = explode( ',', get_query_var( 'inventory' ) );
	}

	// Get all vehicles in taxonomy terms.
	$vehicle_query = custom_query_vehicles( $tax_terms, $search_query );
	if ( ! empty( $vehicle_query ) ) {
		foreach ( $meta_keys as $meta_key ) {

			// Set selected option from state, temporarily remove this field state.
			if ( 'year' === $meta_key ) {
				if ( array_key_exists( 'year_from', $filter_state ) ) {
					$filter['year_from']['selected'] = $filter_state['year_from'];
					unset( $filter_state['year_from'] );
				}
				if ( array_key_exists( 'year_to', $filter_state ) ) {
					$filter['year_to']['selected'] = $filter_state['year_to'];
					unset( $filter_state['year_to'] );
				}
			} elseif ( 'miles' === $meta_key ) {
				if ( array_key_exists( 'miles_from', $filter_state ) ) {
					$filter['miles_from']['selected'] = $filter_state['miles_from'];
					unset( $filter_state['miles_from'] );
				}
				if ( array_key_exists( 'miles_to', $filter_state ) ) {
					$filter['miles_to']['selected'] = $filter_state['miles_to'];
					unset( $filter_state['miles_to'] );
				}
			} elseif ( 'price' === $meta_key ) {
				if ( array_key_exists( 'price_from', $filter_state ) ) {
					$filter['price_from']['selected'] = $filter_state['price_from'];
					unset( $filter_state['price_from'] );
				}
				if ( array_key_exists( 'price_to', $filter_state ) ) {
					$filter['price_to']['selected'] = $filter_state['price_to'];
					unset( $filter_state['price_to'] );
				}
			} elseif ( array_key_exists( $meta_key, $filter_state ) ) {
				$filter[ $meta_key ]['selected'] = $filter_state[ $meta_key ];
				unset( $filter_state[ $meta_key ] );
			}

			// Get options for this field excluding current state selection.
			$field_query = custom_filter_vehicles( $vehicle_query, $filter_state, $meta_key );
			if ( ! empty( $field_query ) ) {
				$values_count = array();
				if ( 'year' === $meta_key ) {

					// Year fields.
					$field_query = array_filter( array_map( 'intval', $field_query ) );
					if ( ! empty( $field_query ) ) {
						$min     = min( $field_query );
						$max     = max( $field_query );
						$options = array();
						for ( $i = $min; $i <= $max; $i++ ) {
							$options[ $i ] = 0;
						}
						$values = array_count_values( $field_query );

						$filter['year_from']['options'] = array_replace( $options, $values );
						$filter['year_to']['options']   = array_replace( $options, $values );
					}
				} elseif ( 'miles' === $meta_key ) {

					// Miles fields.
					$field_query = array_map( 'intval', $field_query );
					if ( ! empty( $field_query ) ) {
						$min     = floor( (float) min( $field_query ) / 10000 ) * 10000;
						$max     = ceil( (float) max( $field_query ) / 10000 ) * 10000;
						$options = array();
						for ( $i = $min; $i <= $max; $i += 10000 ) {
							$options[ $i ] = 0;
						}
						$field_query = array_filter( $field_query );
						$field_query = array_map(
							function( $value ) {
								return (int) ceil( (float) $value / 10000 ) * 10000;
							},
							$field_query
						);
						$values      = array_count_values( $field_query );

						$filter['miles_from']['options'] = array_replace( $options, $values );
						$filter['miles_to']['options']   = array_replace( $options, $values );
					}
				} elseif ( 'price' === $meta_key ) {

					// Sale Price field.
					$field_query = array_filter( array_map( 'intval', $field_query ) );
					if ( ! empty( $field_query ) ) {
						$min     = floor( (float) min( $field_query ) / 5000 ) * 5000;
						$max     = ceil( (float) max( $field_query ) / 5000 ) * 5000;
						$options = array();
						for ( $i = $min; $i <= $max; $i += 5000 ) {
							$options[ $i ] = 0;
						}
						$field_query = array_map(
							function( $value ) {
								return (int) ceil( (float) $value / 5000 ) * 5000;
							},
							$field_query
						);
						$values      = array_count_values( $field_query );

						$filter['price_from']['options'] = array_replace( $options, $values );
						$filter['price_to']['options']   = array_replace( $options, $values );
					}
				} else {

					// The rest of the fields.
					foreach ( $field_query as $fq_val ) {
						if ( empty( $fq_val ) ) {
							$fq_val = 'null';
						}
						if ( isset( $values_count[ $fq_val ] ) ) {
							$values_count[ $fq_val ] += 1;
						} else {
							$values_count[ $fq_val ] = 1;
						}
					}

					if ( ! empty( $values_count ) ) {
						ksort( $values_count, SORT_NATURAL | SORT_FLAG_CASE );
						if ( array_key_exists( 'null', $values_count ) ) {
							// Move null to end.
							$na = $values_count['null'];
							unset( $values_count['null'] );
							$values_count['null'] = $na;
						}
						$filter[ $meta_key ]['options'] = $values_count;
					}
				}
			}

			if ( ! empty( $filter[ $meta_key ]['selected'] ) ) {
				$filter_state[ $meta_key ] = $filter[ $meta_key ]['selected'];
			}
		}
	}

	return $filter;
}

/**
 * Filters and sorts Relevanssi search results on search page.
 *
 * @param array $hits Relevanssi search results as an array of post objects.
 * @return array
 */
function custom_filter_relevanssi_search_results( $hits ) {
	global $wp_query;
	if ( $wp_query->is_search() ) {
		$get_vars = custom_request_vars( 'get' );
		if ( ! empty( $get_vars ) ) {
			foreach ( $hits[0] as $i => $hit ) {
				foreach ( $get_vars as $key => $value ) {
					if ( 'sort' === $key ) {
						continue;
					}
					$meta_key = '';
					switch ( $key ) {
						case 'year_from':
							$meta_key = 'year';
							break;
						case 'year_to':
							$meta_key = 'year';
							break;
						case 'make':
							$meta_key = 'make';
							break;
						case 'model':
							$meta_key = 'model';
							break;
						case 'trim':
							$meta_key = 'trim';
							break;
						case 'color':
							$meta_key = 'ext_color_generic';
							break;
						case 'transmission':
							$meta_key = 'transmission_type';
							break;
						case 'drivetrain':
							$meta_key = 'drivetrain_type';
							break;
						case 'fuel':
							$meta_key = 'fuel_type';
							break;
						case 'price_from':
							$meta_key = 'sale_price';
							break;
						case 'price_to':
							$meta_key = 'sale_price';
							break;
					}
					if ( ! empty( $meta_key ) ) {
						$meta = get_field( $meta_key, $hit );
						if ( 'year_from' === $key || 'price_from' === $key ) {
							if ( $value > $meta ) {
								unset( $hits[0][ $i ] );
								break;
							}
						} elseif ( 'year_to' === $key || 'price_to' === $key ) {
							if ( $value < $meta ) {
								unset( $hits[0][ $i ] );
								break;
							}
						} elseif ( ! in_array( $meta, $value, true ) ) {
							unset( $hits[0][ $i ] );
							break;
						}
					}
				}
			}

			// Orderby.
			// Default to price-asc.
			if ( ! empty( $get_vars['sort'] ) ) {
				$meta_key = 'sale_price';
				$order    = 'ASC';
				switch ( $get_vars['sort'] ) {
					case 'year-desc':
						$meta_key = 'year';
						$order    = 'DESC';
						break;
					case 'year-asc':
						$meta_key = 'year';
						$order    = 'ASC';
						break;
					case 'miles-desc':
						$meta_key = 'miles';
						$order    = 'DESC';
						break;
					case 'miles-asc':
						$meta_key = 'miles';
						$order    = 'ASC';
						break;
					case 'price-desc':
						$meta_key = 'sale_price';
						$order    = 'DESC';
						break;
					case 'price-asc':
						$meta_key = 'sale_price';
						$order    = 'ASC';
						break;
					case 'in-stock-asc':
						$meta_key = 'on_lot_date';
						$order    = 'DESC';
						break;
					case 'discount-desc':
						$meta_key = 'price_adjustment';
						$order    = 'ASC';
						break;
				}
				$meta_array = array();
				foreach ( $hits[0] as $hit ) {
					$meta = get_field( $meta_key, $hit );
					if ( 'sale_price' === $meta_key && ! $meta ) {
						// Very large number to position last in list.
						$meta = '999999';
					} elseif ( ! $meta ) {
						// Lower number to position first in list.
						$meta = '0';
					}
					if ( ! isset( $meta_array[ $meta ] ) ) {
						$meta_array[ $meta ] = array();
					}
					array_push( $meta_array[ $meta ], $hit );
				}
				if ( 'ASC' === $order ) {
					ksort( $meta_array );
				} else {
					krsort( $meta_array );
				}
				$sorted_hits = array();
				foreach ( $meta_array as $meta => $meta_hits ) {
					$sorted_hits = array_merge( $sorted_hits, $meta_hits );
				}
				$hits[0] = $sorted_hits;
			}
		}
	}
	return $hits;
}
add_filter( 'relevanssi_hits_filter', 'custom_filter_relevanssi_search_results' );

/**
 * Queries the database for all published posts of type 'vehicle' and vehicle category '$term' with a specific meta key.
 *
 * @param string $key
 * @param int    $term_id
 * @param string $type
 * @param string $status
 * @return array
 */
function custom_get_meta_values_term( $key = '', $term_id = 0, $type = 'post', $status = 'publish' ) {
	global $wpdb;
	if ( empty( $key ) ) {
		return;
	}
	if ( $term_id ) {
		$r = $wpdb->get_col(
			$wpdb->prepare(
				"SELECT pm.meta_value
				FROM {$wpdb->postmeta} pm
				LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
				LEFT JOIN {$wpdb->term_relationships} tr ON tr.object_id = p.ID
				LEFT JOIN {$wpdb->terms} t ON t.term_id = tr.term_taxonomy_id
				WHERE pm.meta_key = %s
				AND p.post_status = %s
				AND p.post_type = %s
				AND t.term_id = %d",
				$key,
				$status,
				$type,
				$term_id
			)
		);
	} else {
		$r = $wpdb->get_col(
			$wpdb->prepare(
				"SELECT pm.meta_value
				FROM {$wpdb->postmeta} pm
				LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
				WHERE pm.meta_key = %s
				AND p.post_status = %s
				AND p.post_type = %s",
				$key,
				$status,
				$type
			)
		);
	}
	return $r;
}
