<?php
/**
 * custom vehicle import functions for WP ALL IMPORT
 *
 * @package Custom_Theme
 */

/**
 * Runs before importing file. Abort import if file is empty or header row is missing.
 *
 * @param int $import_id Import ID.
 * @return void
 */
function custom_before_xml_import( $import_id ) {
	// Retrieve import object.
	$import = new PMXI_Import_Record();
	$import->getById( $import_id );

	// Ensure object is not empty.
	if ( ! $import->isEmpty() ) {

		// Retrieve import file path.
		$file_to_import = wp_all_import_get_absolute_path( $import->path );

		// Read CSV to get header row.
		$handle = fopen( $file_to_import, 'r' );
		if ( $handle ) {
			ini_set( 'auto_detect_line_endings', true );
			$headers = fgetcsv( $handle, 0, ',', ',' );
			fclose( $handle );
		}

		// If file is empty or missing headers, cancel import.
		if ( ( file_exists( $file_to_import ) && filesize( $file_to_import ) === 0 ) || ! in_array( '"VIN"', $headers, true ) ) {

			// Reset import stats to 0.
			$import->set(
				array(
					'queue_chunk_number' => 0,
					'processing'         => 0,
					'imported'           => 0,
					'created'            => 0,
					'updated'            => 0,
					'skipped'            => 0,
					'deleted'            => 0,
					'triggered'          => 0,
					'executing'          => 0,
				)
			)->update();

			// Display the reason the import was cancelled.
			echo 'Import cancelled because the file is empty or missing header row.';

			// Stop the import.
			die();
		}
	}
}
add_action( 'pmxi_before_xml_import', 'custom_before_xml_import', 10, 1 );

/**
 * Runs after importing file. Update Relevanssi Index.
 *
 * @return void
 */
function custom_after_xml_import() {
	if ( function_exists( 'relevanssi_build_index' ) ) {
		relevanssi_build_index();
	}
}
add_action( 'pmxi_after_xml_import', 'custom_after_xml_import' );

/**
 * Update highest price and price history after post is imported.
 *
 * @param  int $id Vehicle Post ID.
 * @return void
 */
function custom_price_record_import( $id ) {

	// Update price history record.
	custom_update_price_record( $id );
}
add_action( 'pmxi_saved_post', 'custom_price_record_import', 10, 1 );

/**
 * Returns vehicle post date.
 *
 * @param string $vin Vehicle VIN.
 * @return string
 */
function custom_post_date( $vin ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( $id && get_the_time( '', $id ) ) {
		return get_the_time( '', $id );
	}
	return current_time( 'Y-m-d' );
}

/**
 * Returns City MPG.
 *
 * @param string $city_mpg City MPG.
 * @param string $vin Vehicle VIN.
 * @return string
 */
function custom_city_mpg( $city_mpg, $vin ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( $id && ( custom_check_field_locked( 'city_mpg', $id ) === true || get_field( 'city_mpg', $id ) ) ) {
		return get_field( 'city_mpg', $id );
	}
	return $city_mpg;
}

/**
 * Returns Highway MPG.
 *
 * @param string $highway_mpg Highway MPG.
 * @param string $vin Vehicle VIN.
 * @return string
 */
function custom_highway_mpg( $highway_mpg, $vin ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( $id && ( custom_check_field_locked( 'highway_mpg', $id ) === true || get_field( 'highway_mpg', $id ) ) ) {
		return get_field( 'highway_mpg', $id );
	} else {
		return $highway_mpg;
	}
}

/**
 * Calculate prices for MSRP, discounts/adjustments, and sale price.
 *
 * @param string $new_msrp Vehicle MSRP.
 * @param string $new_sale_price Vehicle Sale Price.
 * @param string $condition Vehicle condition.
 * @param string $vin Vehicle VIN.
 * @param string $field_name Slug for the custom field being updated with returned value.
 * @return string
 */
function custom_price( $new_msrp, $new_sale_price, $condition, $vin, $field_name ) {
	$id     = custom_get_vehicle_by_vin( $vin );
	$return = array(
		'msrp'             => 0,
		'price_adjustment' => 0,
		'sale_price'       => 0,
	);
	if ( $id && 'N' === $condition ) {

		// New vehicle already in inventory.
		// Get existing values.
		$installed_options          = (int) get_field( 'installed_options', $id );
		$return['msrp']             = (int) get_field( 'msrp', $id );
		$return['price_adjustment'] = (int) get_field( 'price_adjustment', $id );
		$return['sale_price']       = (int) get_field( 'sale_price', $id );

		// New vehicles.
		if ( custom_check_field_locked( 'msrp', $id ) === true && custom_check_field_locked( 'sale_price', $id ) === true ) {

			// 'msrp' and 'sale_price' are locked.
			$return['price_adjustment'] = $return['sale_price'] - $return['msrp'] - $installed_options;
		} elseif ( custom_check_field_locked( 'msrp', $id ) === true ) {

			// 'msrp' is locked.
			if ( empty( $return['sale_price'] ) ) {
				$return['sale_price']       = $return['msrp'] + $installed_options;
				$return['price_adjustment'] = 0;
			}
		} elseif ( custom_check_field_locked( 'sale_price', $id ) === true ) {

			// 'sale_price' is locked.
			$return['msrp'] = (int) $new_msrp;
			if ( ! empty( $new_msrp ) ) {
				$return['price_adjustment'] = $return['sale_price'] - $return['msrp'] - $installed_options;
			}
		} else {

			// No locked fields.
			if ( ! empty( $new_msrp ) ) {
				$return['msrp'] = (int) $new_msrp;
			}
			$return['sale_price']       = $return['msrp'] - $installed_options;
			$return['price_adjustment'] = 0;
		}
	} elseif ( 'N' === $condition ) {

		// New vehicle not in inventory.
		$return['msrp']             = (int) $new_msrp;
		$return['price_adjustment'] = 0;
		$return['sale_price']       = (int) $new_msrp;
	} elseif ( 'U' === $condition ) {

		// Used vehicles.
		$return['msrp']             = 0;
		$return['sale_price']       = (int) $new_sale_price;
		$return['price_adjustment'] = 0;
	} else {

		// No condition.
		$return['msrp']             = 0;
		$return['sale_price']       = 0;
		$return['price_adjustment'] = 0;
	}

	// Return values by $field_name.
	foreach ( $return as &$value ) {
		if ( empty( $value ) ) {
			$value = '';
		}
	}
	if ( 'msrp' === $field_name ) {
		return (string) $return['msrp'];
	} elseif ( 'price_adjustment' === $field_name ) {
		return (string) $return['price_adjustment'];
	} elseif ( 'sale_price' === $field_name ) {
		return (string) $return['sale_price'];
	} else {
		return '';
	}
}

/**
 * Calculates Net Cost.
 *
 * @param string $sale_price Vehicle Sale Price.
 * @param string $condition Vehicle Condition.
 * @param string $vin Vehicle VIN.
 * @return string
 */
function custom_net_cost( $sale_price, $condition, $vin ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( 'N' === $condition && ! empty( $sale_price ) ) {
		$msrp                  = (int) get_field( 'msrp', $id );
		$price_adjustment      = (int) get_field( 'price_adjustment', $id );
		$factory_rebate        = (int) get_field( 'factory_rebate', $id );
		$factory_rebate_starts = get_field( 'factory_rebate_starts', $id );
		$factory_rebate_ends   = get_field( 'factory_rebate_ends', $id );
		$today                 = current_time( 'Ymd' );
		if ( ! empty( $msrp ) && ! empty( $price_adjustment ) ) {
			$sale_price = (int) get_field( 'sale_price', $id );
		}
		if ( ! empty( $factory_rebate ) && ! empty( $factory_rebate_starts ) && $factory_rebate_starts <= $today && ! empty( $factory_rebate_ends ) && $factory_rebate_ends >= $today ) {
			$net_cost = $sale_price - $factory_rebate;
		} else {
			$net_cost = $sale_price;
		}
		return (string) $net_cost;
	}
	return '';
}

/**
 * Returns inventory category hierarchy.
 *
 * @param string $condition Vehicle condition.
 * @param string $certified Vehicle is certified, yes or no.
 * @return string
 */
function custom_inventory_cat( $condition, $certified ) {
	if ( 'N' === $condition ) {
		return 'New cars';
	} elseif ( 'U' === $condition && 'Yes' === $certified ) {
		return 'Used Vehicles > Certified Pre-Owned cars';
	} elseif ( 'U' === $condition ) {
		return 'Used Vehicles';
	}
	return '';
}

/**
 * Returns complete vehicle model name, including body style and fuel type.
 *
 * @param string $condition Vehicle condition.
 * @param string $model Vehicle model name.
 * @param string $fuel Vehicle fuel type.
 * @param string $body Vehicle body style.
 * @param string $vin Vehicle VIN.
 * @param string $field_name Slug for the custom field being updated with returned value.
 * @return string
 */
function custom_model( $condition, $model, $fuel, $body, $vin, $field_name = '' ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( $field_name && custom_check_field_locked( $field_name, $id ) === true ) {
		return get_field( $field_name, $id );
	} else {
		if ( 'N' === $condition ) {
			if ( 'Miata RF' === $model || stripos( $model, 'Miata RF' ) !== false ) {
				return 'MX-5 Miata RF';
			} elseif ( 'Miata' === $model || stripos( $model, 'Miata' ) !== false ) {
				return 'MX-5 Miata';
			} elseif ( 'car3' === $model && '4D Hatchback' === $body ) {
				return 'car3 Hatchback';
			} elseif ( 'car3' === $model && '4D Sedan' === $body ) {
				return 'car3 Sedan';
			} elseif ( ( 'CX-5' === $model && 'Diesel' === $fuel ) || ( stripos( $model, 'cx-5' ) !== false && ( stripos( $model, 'skyactiv' ) !== false || stripos( $model, 'diesel' ) !== false ) ) ) {
				return 'CX-5 SKYACTIV®-D';
			}
			return $model;
		} else {
			if ( 'Hybrid' === $fuel ) {
				return $model . ' Hybrid';
			} elseif ( stripos( $fuel, 'Fuel-Cell' ) !== false || stripos( $fuel, 'Fuel Cell' ) !== false || stripos( $fuel, 'Fuelcell' ) !== false ) {
				return $model . ' Fuel Cell';
			} elseif ( stripos( $fuel, 'Electric' ) !== false || stripos( $fuel, 'EV' ) !== false ) {
				return $model . ' Electric';
			} elseif ( stripos( $fuel, 'Plug-in Hybrid' ) !== false || stripos( $fuel, 'Plugin Hybrid' ) !== false || stripos( $fuel, 'Plug in Hybrid' ) !== false ) {
				return $model . ' Plug-in Hybrid';
			} elseif ( stripos( $fuel, 'Flex-Fuel' ) !== false || stripos( $fuel, 'Flexfuel' ) !== false || stripos( $fuel, 'Flex Fuel' ) !== false ) {
				return $model . ' Flex-Fuel';
			}
			return $model;
		}
	}
}

function custom_trim( $trim, $condition, $vin ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( custom_check_field_locked( 'trim', $id ) === true ) {
		return get_field( 'trim', $id );
	}

	if ( 'N' === $condition ) {
		if ( 'GT' === $trim ) {
			$trim = 'Grand Touring';
		}
	}

	return $trim;
}

/**
 * Returns vehicle fuel type.
 *
 * @param string $fuel Vehicle fuel type.
 * @param string $vin Vehicle VIN.
 * @param string $field_name Slug for the custom field being updated with returned value.
 * @return string
 */
function custom_fuel( $fuel, $vin, $field_name = null ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( custom_check_field_locked( $field_name, $id ) === true ) {
		return get_field( $field_name, $id );
	}
	if ( 'Hybrid' === $fuel ) {
		return 'Hybrid';
	} elseif ( stripos( $fuel, 'Fuel-Cell' ) !== false || stripos( $fuel, 'Fuel Cell' ) !== false || stripos( $fuel, 'Fuelcell' ) !== false ) {
		return 'Fuel Cell';
	} elseif ( stripos( $fuel, 'Electric' ) !== false || stripos( $fuel, 'EV' ) !== false ) {
		return 'Electric';
	} elseif ( stripos( $fuel, 'Plug-in Hybrid' ) !== false || stripos( $fuel, 'Plugin Hybrid' ) !== false || stripos( $fuel, 'Plug in Hybrid' ) !== false ) {
		return 'Plug-in Hybrid';
	} elseif ( stripos( $fuel, 'Flex-Fuel' ) !== false || stripos( $fuel, 'Flexfuel' ) !== false || stripos( $fuel, 'Flex Fuel' ) !== false ) {
		return 'Flex-Fuel';
	}
	return $fuel;
}

/**
 * Returns vehicle drivetrain type.
 *
 * @param string $drivetrain Vehicle drivetrain.
 * @param string $vin Vehicle VIN.
 * @param string $field_name Slug for the custom field being updated with returned value.
 * @return string
 */
function custom_drivetrain( $drivetrain, $vin, $field_name = '' ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( $field_name && custom_check_field_locked( $field_name, $id ) === true ) {
		return get_field( $field_name, $id );
	} else {
		if ( '4WD' === $drivetrain || 'Four Wheel Drive' === $drivetrain || stripos( $drivetrain, 'Four Wheel Drive' ) !== false || stripos( $drivetrain, 'Four-Wheel Drive' ) !== false || stripos( $drivetrain, '4WD' ) !== false || stripos( $drivetrain, '4x4' ) !== false || stripos( $drivetrain, '4 x 4' ) !== false ) {
			$drivetrain = '4WD';
		} elseif ( 'AWD' === $drivetrain || 'All Wheel Drive' === $drivetrain || stripos( $drivetrain, 'All Wheel Drive' ) !== false || stripos( $drivetrain, 'All-Wheel Drive' ) !== false || stripos( $drivetrain, 'AWD' ) !== false ) {
			$drivetrain = 'AWD';
		} elseif ( 'Front Wheel Drive' === $drivetrain || stripos( $drivetrain, 'Front Wheel Drive' ) !== false || stripos( $drivetrain, 'Front-Wheel Drive' ) !== false || stripos( $drivetrain, 'FWD' ) !== false ) {
			$drivetrain = 'FWD';
		} elseif ( 'RWD' === $drivetrain || 'Rear Wheel Drive' === $drivetrain || 'Rear-Wheel Drive' === $drivetrain || stripos( $drivetrain, 'Rear Wheel Drive' ) !== false || stripos( $drivetrain, 'Rear-Wheel Drive' ) !== false || stripos( $drivetrain, 'RWD' ) !== false ) {
			$drivetrain = 'RWD';
		}
		return $drivetrain;
	}
}

/**
 * Returns vehicle condition.
 *
 * @param string $condition Vehicle condition.
 * @param string $vin Vehicle VIN.
 * @param string $field_name Slug for the custom field being updated with returned value.
 * @return string
 */
function custom_condition( $condition, $vin, $field_name ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( custom_check_field_locked( $field_name, $id ) === true ) {
		return get_field( $field_name, $id );
	} else {
		if ( 'N' === $condition ) {
			return 'New';
		} else {
			return 'Used';
		}
	}
}

/**
 * Sets vehicle title.
 *
 * @param string $condition Vehicle condition.
 * @param string $year Vehicle year.
 * @param string $make Vehicle make.
 * @param string $model Vehicle model.
 * @param string $trim Vehicle trim.
 * @param string $drivetrain Vehicle drivetrain.
 * @param string $body Vehicle body.
 * @param string $fuel Vehicle fuel.
 * @param string $vin Vehicle VIN.
 * @return string
 */
function custom_title( $condition, $year, $make, $model, $trim, $drivetrain, $body, $fuel, $vin ) {
	$title_model      = custom_model( $condition, $model, $fuel, $body, $vin );
	$title_drivetrain = custom_drivetrain( $drivetrain, $vin );
	if ( 'FWD' === $title_drivetrain ) {
		$title_drivetrain = '';
	}
	if ( $trim && strpos( $title_model, $make ) !== false ) {
		return $year . ' ' . $title_model . ' ' . $trim . ' ' . $title_drivetrain;
	} elseif ( $trim ) {
		return $year . ' ' . $make . ' ' . $title_model . ' ' . $trim . ' ' . $title_drivetrain;
	} else {
		return $year . ' ' . $make . ' ' . $title_model . ' ' . $title_drivetrain;
	}
}

/**
 * Removes duplicate options on import.
 *
 * @param string $x Vehicle options string.
 * @return string
 */
function custom_options( $x ) {
	$x = implode( '|', array_unique( explode( '|', $x ) ) );
	return $x;
}

/**
 * Translates body style text.
 *
 * @param string $body Vehicle body style.
 * @param string $vin Vehicle VIN.
 * @param string $field_name Slug for the custom field being updated with returned value.
 * @return string
 */
function custom_body_style( $body, $vin, $field_name ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( custom_check_field_locked( $field_name, $id ) === true ) {
		return get_field( $field_name, $id );
	} else {
		if ( '2D Cabriolet' === $body || '2D Convertible' === $body ) {
			$body = 'Coupe Convertible';
		} elseif ( '2D Coupe' === $body ) {
			$body = 'Coupe';
		} elseif ( '2D Hatchback' === $body ) {
			$body = 'Hatchback';
		} elseif ( '4D Crew Cab' === $body || '4D Double Cab' === $body ) {
			$body = 'Crew Cab';
		} elseif ( '4D Hatchback' === $body ) {
			$body = 'Hatchback';
		} elseif ( '4D Passenger Van' === $body ) {
			$body = 'Minivan';
		} elseif ( '4D Sedan' === $body ) {
			$body = 'Sedan';
		} elseif ( '4D Sport Utility' === $body ) {
			$body = 'SUV';
		} elseif ( '4D Station Wagon' === $body ) {
			$body = 'Wagon';
		} else {
			$body = null;
		}
		return $body;
	}
}

/**
 * Returns vehicle transmission type.
 *
 * @param string $transmission Vehicle transmission.
 * @param string $vin Vehicle VIN.
 * @param string $inventory_file Current import file unique ID.
 * @return string
 */
function custom_transmission_type( $transmission, $vin, $inventory_file ) {
	$id                    = custom_get_vehicle_by_vin( $vin );
	$old_transmission_type = get_field( 'transmission_type', $id );
	if ( custom_check_field_locked( 'transmission_type', $id ) === true ) {
		return $old_transmission_type;
	} else {
		if ( 'vauto' === $inventory_file && ( stripos( $transmission, 'CVT' ) !== false || stripos( $transmission, 'Automatic' ) !== false || stripos( $transmission, 'Auto' ) !== false || stripos( $transmission, 'Doppelkupplung' ) !== false || stripos( $transmission, 'PDK' ) !== false || stripos( $transmission, 'A/T' ) !== false ) ) {
			return 'Automatic';
		} elseif ( 'vauto' === $inventory_file && ( stripos( $transmission, 'Manual' ) !== false || stripos( $transmission, 'Man' ) !== false || stripos( $transmission, 'M/T' ) !== false || stripos( $transmission, '5-speed' ) !== false || stripos( $transmission, '6-speed' ) !== false ) ) {
			return 'Manual';
		} elseif ( ! empty( $old_transmission_type ) ) {
			return $old_transmission_type;
		} elseif ( 'autosweet' === $inventory_file && ( stripos( $transmission, 'CVT' ) !== false || stripos( $transmission, 'Automatic' ) !== false || stripos( $transmission, 'Auto' ) !== false || stripos( $transmission, 'Doppelkupplung' ) !== false || stripos( $transmission, 'PDK' ) !== false || stripos( $transmission, 'A/T' ) !== false ) ) {
			return 'Automatic';
		} elseif ( 'autosweet' === $inventory_file && ( stripos( $transmission, 'Manual' ) !== false || stripos( $transmission, 'Man' ) !== false || stripos( $transmission, 'M/T' ) !== false || stripos( $transmission, '5-speed' ) !== false || stripos( $transmission, '6-speed' ) !== false ) ) {
			return 'Manual';
		} else {
			return '';
		}
	}
}

/**
 * Returns vehicle transmission description.
 *
 * @param string $transmission_desc Vehicle transmission description.
 * @param string $vin Vehicle VIN.
 * @param string $condition Vehicle VIN.
 * @param string $inventory_file Current import file unique ID.
 * @return string
 */
function custom_transmission_desc( $transmission_desc, $vin, $condition, $inventory_file ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( custom_check_field_locked( 'transmission_desc', $id ) === true ) {
		return get_field( 'transmission_desc', $id );
	} else {
		$transmission_type = get_field( 'transmission_type', $id );
		if ( ( 'N' === $condition && 'autosweet' === $inventory_file ) || ( 'U' === $condition && 'vauto' === $inventory_file ) ) {
			if ( empty( $transmission_type ) || ( 'Automatic' === $transmission_type && ( stripos( $transmission_desc, 'CVT' ) !== false || stripos( $transmission_desc, 'Automatic' ) !== false || stripos( $transmission_desc, 'Auto' ) !== false || stripos( $transmission_desc, 'Doppelkupplung' ) !== false || stripos( $transmission_desc, 'PDK' ) !== false || stripos( $transmission_desc, 'A/T' ) !== false ) ) || ( 'Manual' === $transmission_type && ( stripos( $transmission_desc, 'Manual' ) !== false || stripos( $transmission_desc, 'Man' ) !== false || stripos( $transmission_desc, 'M/T' ) !== false || stripos( $transmission_desc, '5-speed' ) !== false || stripos( $transmission_desc, '6-speed' ) !== false ) ) ) {
				return $transmission_desc;
			} else {
				return '';
			}
		} elseif ( get_field( 'transmission_desc', $id ) ) {
			return get_field( 'transmission_desc', $id );
		} else {
			return '';
		}
	}
}

/**
 * Converts whole number to decimal for engine size.
 *
 * @param string $engine_size Vehicle engine size/displacement.
 * @param string $vin Vehicle VIN.
 * @param string $field_name Slug for the custom field being updated with returned value.
 * @return string
 */
function custom_engine_size( $engine_size, $vin, $field_name ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( custom_check_field_locked( $field_name, $id ) === true ) {
		return get_field( $field_name, $id );
	} else {
		$engine_size = number_format( $engine_size, 1 );
		return $engine_size;
	}
}

/**
 * Returns vehicle exterior color name.
 *
 * @param string $color Vehicl exterior color.
 * @param string $vin Vehicle VIN.
 * @param string $field_name Slug for the custom field being updated with returned value.
 * @return string
 */
function custom_ext_color( $color, $vin, $field_name ) {
	$id        = custom_get_vehicle_by_vin( $vin );
	$old_color = get_field( 'ext_color', $id );
	if ( custom_check_field_locked( $field_name, $id ) === true ) {
		return $old_color;
	} else {
		if ( 'Drkblue' === $color ) {
			return 'Dark Blue';
		} elseif ( 'CREAM' === $color ) {
			return 'Cream';
		} elseif ( 'GOLD' === $color ) {
			return 'Gold';
		} elseif ( 'MAROON' === $color ) {
			return 'Maroon';
		} elseif ( strcasecmp( 'YR-600M/KONA COFFE', $color ) === 0 ) {
			return 'Kona Coffee Metallic';
		} elseif ( strcasecmp( 'NH-797M/MODERN STE', $color ) === 0 ) {
			return 'Modern Steel Metallic';
		} elseif ( strcasecmp( 'B-588P/OBSIDIAN BL', $color ) === 0 ) {
			return 'Obsidian Blue Pearl';
		} elseif ( strcasecmp( 'B-607M/COSMIC BLUE', $color ) === 0 ) {
			return 'Cosmic Blue Metallic';
		} elseif ( strcasecmp( 'NH-731P/CRYSTAL BL', $color ) === 0 ) {
			return 'Crystal Black Pearl';
		} elseif ( strcasecmp( 'NH-578/TAFFETA WHI', $color ) === 0 ) {
			return 'Taffeta White';
		} elseif ( strcasecmp( 'NH-788PX/WHITE ORC', $color ) === 0 ) {
			return 'White Orchid Pearl';
		} elseif ( strcasecmp( 'NH-830M/LUNAR SILV', $color ) === 0 || strcasecmp( 'NH-830MX/LUNAR SIL', $color ) === 0 ) {
			return 'Lunar Silver Metallic';
		} elseif ( strcasecmp( 'R-561P/DEEP SCARLE', $color ) === 0 ) {
			return 'Deep Scarlet Pearl';
		} elseif ( 'Basque Red Pearl Ii' === $color || strcasecmp( 'R-548P/BASQUE RED', $color ) === 0 ) {
			return 'Basque Red Pearl II';
		} else {
			$color = ucwords( strtolower( $color ) );
			return $color;
		}
	}
}

/**
 * Returns vehicle exterior color generic name.
 *
 * @param string $color Vehicle exterior color generic name.
 * @param string $vin Vehicle VIN.
 * @param string $field_name Slug for the custom field being updated with returned value.
 * @return string
 */
function custom_ext_color_generic( $color, $vin, $field_name ) {
	$id                    = custom_get_vehicle_by_vin( $vin );
	$old_ext_color_generic = get_field( 'ext_color_generic', $id );
	if ( custom_check_field_locked( $field_name, $id ) === true ) {
		return $old_ext_color_generic;
	} else {
		$color = ucwords( strtolower( $color ) );
		if ( in_array( $color, array( 'Obsidian', 'Asphalt' ), true ) ) {
			return 'Black';
		} elseif ( in_array( $color, array( 'Starfire Pearl', 'Blizzard Pearl' ), true ) || stripos( $color, 'White' ) !== false ) {
			return 'White';
		} elseif ( in_array( $color, array( 'Burgundy', 'Deep Scarlet Pearl', 'Maroon', 'Copper Sunset Pearl', 'Crimson Pearl', 'Dark Cherry Pearl', 'Venetian Ruby', 'Merlot Jewel', 'Tuscan Sun' ), true ) || stripos( $color, 'Red' ) !== false ) {
			return 'Red';
		} elseif ( in_array( $color, array( 'Still Night Pearl', 'Deep Ocean Pearl', 'Steel Sapphire Metallic', 'Wave Line Pearl' ), true ) || stripos( $color, 'Blue' ) !== false ) {
			return 'Blue';
		} elseif ( in_array( $color, array( 'Liquid Platinum', 'Lunar Mist' ), true ) || stripos( $color, 'Silver' ) !== false ) {
			return 'Silver';
		} elseif ( in_array( $color, array( 'Mountain Air Metallic', 'Black Forest Pearl', 'Forest Mist Metallic', 'Alumina Jade Metallic' ), true ) || stripos( $color, 'Green' ) !== false ) {
			return 'Green';
		} elseif ( in_array( $color, array( 'Kona Coffee Metallic', 'Urban Titanium Metallic', 'Truffle Pearl', 'Smoky Topaz Metallic', 'Bronze', 'Dark Amber', 'Dark Copper', 'Mocha', 'Tiger Eye Pearl', 'Army Rock Metallic' ), true ) || stripos( $color, 'Brown' ) !== false ) {
			return 'Brown';
		} elseif ( in_array( $color, array( 'Polished Metal Metallic', 'Modern Steel Metallic', 'Green Opal Metallic', 'Granite Crystal', 'Graphite Shadow', 'Modern Steel', 'Polished Metal', 'Halo' ), true ) || stripos( $color, 'Gray' ) !== false || stripos( $color, 'Grey' ) !== false ) {
			return 'Gray';
		} elseif ( in_array( $color, array( 'Habanero' ), true ) || stripos( $color, 'Orange' ) !== false ) {
			return 'Orange';
		} elseif ( in_array( $color, array( 'Light Sandstone', 'Sandy Beach', 'Pueblo Gold', 'Cream' ), true ) || stripos( $color, 'Tan' ) !== false ) {
			return 'Tan';
		} elseif ( in_array( $color, array( 'Champagne Frost Pearl', 'Champagne' ), true ) ) {
			return 'Gold';
		} elseif ( in_array( $color, array( 'Burgundy Night Pearl', 'Deep Violet Pearl', 'Passion Berry Pearl', 'Mulberry Metallic' ), true ) || stripos( $color, 'Purple' ) !== false ) {
			return 'Purple';
		} elseif ( stripos( $color, 'Yellow' ) !== false ) {
			return 'Yellow';
		} elseif ( stripos( $color, 'Black' ) !== false ) {
			return 'Black';
		} elseif ( stripos( $color, 'White' ) !== false ) {
			return 'White';
		} elseif ( stripos( $color, 'Red' ) !== false ) {
			return 'Red';
		} elseif ( stripos( $color, 'Blue' ) !== false ) {
			return 'Blue';
		} elseif ( stripos( $color, 'Silver' ) !== false ) {
			return 'Silver';
		} elseif ( stripos( $color, 'Green' ) !== false ) {
			return 'Green';
		} elseif ( stripos( $color, 'Brown' ) !== false ) {
			return 'Brown';
		} elseif ( stripos( $color, 'Gray' ) !== false || stripos( $color, 'Grey' ) !== false ) {
			return 'Gray';
		} elseif ( stripos( $color, 'Orange' ) !== false ) {
			return 'Orange';
		} elseif ( stripos( $color, 'Tan' ) !== false ) {
			return 'Tan';
		} elseif ( stripos( $color, 'Gold' ) !== false ) {
			return 'Gold';
		} elseif ( stripos( $color, 'Purple' ) !== false ) {
			return 'Purple';
		} else {
			return null;
		}
	}
}

/**
 * Returns vehicle exterior color as hex code.
 *
 * @param string $color Vehicle exterior color as hex code.
 * @param string $condition Vehicle condition.
 * @param string $vin Vehicle VIN.
 * @param string $inventory_file Current import file unique ID.
 * @param string $field_name Slug for the custom field being updated with returned value.
 * @return string
 */
function custom_ext_color_hex( $color, $condition, $vin, $inventory_file, $field_name ) {
	$id                = custom_get_vehicle_by_vin( $vin );
	$old_ext_color_hex = get_field( $field_name, $id );
	if ( custom_check_field_locked( $field_name, $id ) === true ) {
		return $old_ext_color_hex;
	} else {
		$generic_ext = custom_ext_color_generic( $color, $condition, $vin, $inventory_file, $field_name );
		// car Colors.
		if ( 'Soul Red Metallic' === $color ) {
			return '890000';
		} elseif ( 'Snowflake White Pearl Mica' === $color ) {
			return 'f7f7f7';
		} elseif ( 'Machine Gray Metallic' === $color ) {
			return '4f535b';
		} elseif ( 'Sonic Silver Metallic' === $color ) {
			return '7a8292';
		} elseif ( 'Titanium Flash Mica' === $color ) {
			return '646054';
		} elseif ( 'Deep Crystal Blue Mica' === $color ) {
			return '273754';
		} elseif ( 'Eternal Blue Mica' === $color ) {
			return '4d7fa6';
		} elseif ( 'Jet Black Mica' === $color ) {
			return '101312';
		} elseif ( 'Blue Reflex Mica' === $color ) {
			return '3b5666';
		} elseif ( 'Crystal White Pearl Mica' === $color ) {
			return 'f5f5f5';
		} elseif ( 'Meteor Gray Mica' === $color ) {
			return '323337';
		} elseif ( 'Ceramic Metallic' === $color ) {
			return 'acb0b2';
		} elseif ( 'Dynamic Blue Mica' === $color ) {
			return '004291';
		} elseif ( 'Arctic White' === $color ) {
			return 'f5f5f5';
			// Honda Colors.
		} elseif ( 'Still Night Pearl' === $color ) {
			return '151c7b';
		} elseif ( 'Crystal Black Pearl' === $color ) {
			return '070707';
		} elseif ( 'White Orchid Pearl' === $color ) {
			return 'e4e3de';
		} elseif ( 'Deep Blue Opal Metallic' === $color ) {
			return '30455f';
		} elseif ( 'Lunar Silver Metallic' === $color ) {
			return '8e8e91';
		} elseif ( 'Modern Steel Metallic' === $color ) {
			return '484848';
		} elseif ( 'San Marino Red' === $color ) {
			return '75121f';
		} elseif ( 'Basque Red Pearl II' === $color ) {
			return '50252a';
		} elseif ( 'Champagne Frost Pearl' === $color || 'Champagne' === $color ) {
			return 'c8c3bb';
		} elseif ( 'Kona Coffee Metallic' === $color ) {
			return '433b35';
		} elseif ( 'Obsidian Blue Pearl' === $color ) {
			return '191b49';
		} elseif ( 'Crimson Pearl' === $color ) {
			return '632528';
		} elseif ( 'Mandarin Gold' === $color ) {
			return '6c5c46';
		} elseif ( 'Vortex Blue' === $color ) {
			return '1b3475';
		} elseif ( 'Blue Sky Metallic' === $color ) {
			return '808998';
		} elseif ( 'Aegean Blue Metallic' === $color ) {
			return '1a263b';
		} elseif ( 'Rallye Red' === $color ) {
			return 'ce1318';
		} elseif ( 'Energy Green' === $color ) {
			return '64a22c';
		} elseif ( 'Taffeta White' === $color ) {
			return 'd5d5d5';
		} elseif ( 'Alabaster Silver Metallic' === $color ) {
			return 'a3a4a4';
		} elseif ( 'Green Opal Metallic' === $color ) {
			return '596365';
		} elseif ( 'Cosmic Blue Metallic' === $color ) {
			return '1a263b';
		} elseif ( 'Burgundy Night Pearl' === $color ) {
			return '3b2c35';
		} elseif ( 'White Diamond Pearl' === $color ) {
			return 'f3f3e9';
		} elseif ( 'Mountain Air Metallic' === $color ) {
			return '6a7d8b';
		} elseif ( 'Urban Titanium Metallic' === $color ) {
			return '747675';
		} elseif ( 'Copper Sunset Pearl' === $color ) {
			return '69300e';
		} elseif ( 'Deep Violet Pearl' === $color ) {
			return '3e2a39';
		} elseif ( 'Jet Black' === $color ) {
			return '000000';
		} elseif ( 'Milano Red' === $color ) {
			return '8e1b2b';
		} elseif ( 'Polished Metal Metallic' === $color ) {
			return '4d5457';
		} elseif ( 'Mystic Yellow Pearl' === $color ) {
			return 'cec622';
		} elseif ( 'Passion Berry Pearl' === $color ) {
			return '4a3e4f';
		} elseif ( 'Deep Ocean Pearl' === $color ) {
			return '001d5c';
		} elseif ( 'Misty Green Pearl' === $color ) {
			return '3c4513';
		} elseif ( 'Mulberry Metallic' === $color ) {
			return '332e36';
		} elseif ( 'Mediterranean Blue Pearl' === $color ) {
			return '044661';
		} elseif ( 'Truffle Pearl' === $color ) {
			return '47352e';
		} elseif ( 'Deep Scarlet Pearl' === $color ) {
			return '47130d';
		} elseif ( 'Smoky Topaz Metallic ' === $color ) {
			return '453d3d';
		} elseif ( 'Steel Sapphire Metallic' === $color ) {
			return '384860';
		} elseif ( 'Dark Cherry Pearl' === $color ) {
			return '3b1f25';
		} elseif ( 'Black Forest Pearl' === $color ) {
			return '2a3527';
		} elseif ( 'Forest Mist Metallic' === $color ) {
			return '525a55';
			// Toyota Colors.
		} elseif ( '4Evergreen Mica' === $color ) {
			return '20371f';
		} elseif ( 'Absolutely Red' === $color ) {
			return 'b1160c';
		} elseif ( 'Alumina Jade Metallic' === $color ) {
			return '383E3A';
		} elseif ( 'Amazon Green Metallic' === $color ) {
			return '384021';
		} elseif ( 'Asphalt' === $color ) {
			return '141414';
		} elseif ( 'Army Rock Metallic' === $color ) {
			return '686258';
		} elseif ( 'Attitude Black Metallic' === $color || 'Attitude Black' === $color ) {
			return '00031e';
		} elseif ( 'Barcelona Red Metallic' === $color ) {
			return 'a21e22';
		} elseif ( 'Black' === $color ) {
			return '000000';
		} elseif ( 'Black Currant Metallic' === $color ) {
			return '433133';
		} elseif ( 'Black Sand Pearl' === $color ) {
			return '232424';
		} elseif ( 'Blizzard Pearl' === $color ) {
			return 'f3f2f2';
		} elseif ( 'Blue Crush Metallic' === $color ) {
			return '111d69';
		} elseif ( 'Blue Ribbon Metallic' === $color ) {
			return '273476';
		} elseif ( 'Blue Streak Metallic' === $color ) {
			return '0359a6';
		} elseif ( 'Brown Sugar Metallic' === $color ) {
			return '605c55';
		} elseif ( 'Celestial Silver Metallic' === $color || 'Celestial Silver' === $color ) {
			return '828387';
		} elseif ( 'Cement' === $color ) {
			return '867e7e';
		} elseif ( 'Classic Silver Metallic' === $color || 'Classic Silver' === $color ) {
			return 'e1e1e1';
		} elseif ( 'Clearwater Blue Metallic' === $color || 'Clearwater Blue' === $color ) {
			return '8EAECE';
		} elseif ( 'Cosmic Gray Mica' === $color ) {
			return '062438';
		} elseif ( 'Crème Brulee Mica' === $color || 'Creme Brulee Mica' === $color || 'Crème Brulee' === $color || 'Creme Brulee' === $color ) {
			return 'E2DBCF';
		} elseif ( 'Electric Lime Metallic' === $color || 'Electric Lime' === $color ) {
			return 'acc036';
		} elseif ( 'Firestorm' === $color ) {
			return '5f1517';
		} elseif ( 'Halo' === $color ) {
			return 'd7d2ce';
		} elseif ( 'Hot Lava' === $color ) {
			return 'B9370A';
		} elseif ( 'Inferno' === $color ) {
			return 'D63400';
		} elseif ( 'Magnetic Gray Metallic' === $color || 'Magnetic Gray' === $color ) {
			return '494848';
		} elseif ( 'Moonglow' === $color ) {
			return 'f5f7ed';
		} elseif ( 'Nautical Blue Metallic' === $color || 'Nautical Blue' === $color ) {
			return '18194A';
		} elseif ( 'Ooh La La Rouge Mica' === $color || 'Ooh La La Rouge' === $color ) {
			return '3F010B';
		} elseif ( 'Pacific Blue Metallic' === $color || 'Pacific Blue' === $color ) {
			return '3F010B';
		} elseif ( 'Parisian Night Pearl' === $color || 'Parisian Night' === $color ) {
			return '102740';
		} elseif ( 'Predawn Gray Mica' === $color || 'Predawn Gray' === $color ) {
			return '63615E';
		} elseif ( 'Pyrite Mica' === $color ) {
			return '776352';
		} elseif ( 'Radiant Red' === $color ) {
			return 'D3202A';
		} elseif ( 'Raven' === $color ) {
			return '202020';
		} elseif ( 'Ruby Flare Pearl' === $color ) {
			return '740000';
		} elseif ( 'Salsa Red Pearl' === $color ) {
			return '8D1A2C';
		} elseif ( 'Sandy Beach Metallic' === $color ) {
			return 'C3B79D';
		} elseif ( 'Sea Glass Pearl' === $color ) {
			return '94ADAF';
		} elseif ( 'Shoreline Blue Pearl' === $color ) {
			return '42556D';
		} elseif ( 'Silver Sky Metallic' === $color ) {
			return 'C6C8CC';
		} elseif ( 'Sizzling Crimson Mica' === $color ) {
			return '4C1B31';
		} elseif ( 'Sky Blue Pearl' === $color ) {
			return '78898D';
		} elseif ( 'Slate Metallic' === $color ) {
			return '383c45';
		} elseif ( 'Sonora Gold Pearl' === $color ) {
			return 'B29D76';
		} elseif ( 'Sparkling Sea Metallic' === $color ) {
			return '70a3bb';
		} elseif ( 'Steel' === $color ) {
			return 'a6a7a8';
		} elseif ( 'Sun Fusion' === $color ) {
			return 'f8a805';
		} elseif ( 'Sunset Bronze Mica' === $color ) {
			return '673F18';
		} elseif ( 'Super White' === $color ) {
			return 'ffffff';
		} elseif ( 'Tangerine Splash Pearl' === $color || 'Tangerine' === $color ) {
			return 'f87907';
		} elseif ( 'Toasted Walnut Pearl' === $color || 'Walnut' === $color ) {
			return '4F3B35';
		} elseif ( 'Ultramarine' === $color ) {
			return '253653';
		} elseif ( 'Winter Gray Metallic' === $color ) {
			return '2D3544';
		} elseif ( 'Black' === $generic_ext ) {
			return '000000';
		} elseif ( 'White' === $generic_ext ) {
			return 'ffffff';
		} elseif ( 'Red' === $generic_ext ) {
			return 'ed1c24';
		} elseif ( 'Blue' === $generic_ext ) {
			return '0054a6';
		} elseif ( 'Silver' === $generic_ext ) {
			return 'acacac';
		} elseif ( 'Green' === $generic_ext ) {
			return '007236';
		} elseif ( 'Orange' === $generic_ext ) {
			return 'f26522';
		} elseif ( 'Brown' === $generic_ext ) {
			return '534742';
		} elseif ( 'Gray' === $generic_ext ) {
			return '555555';
		} elseif ( 'Tan' === $generic_ext ) {
			return 'c69c72';
		} elseif ( 'Yellow' === $generic_ext ) {
			return 'f6eb14';
		} elseif ( 'Gold' === $generic_ext ) {
			return 'c8c3bb';
		} else {
			return '';
		}
	}
}

/**
 * Returns vehicle interior color name.
 *
 * @param string $color Vehicle interior color.
 * @param string $vin Vehicle VIN.
 * @param string $field_name Slug for the custom field being updated with returned value.
 * @return string
 */
function custom_int_color( $color, $vin, $field_name ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( custom_check_field_locked( $field_name, $id ) === true ) {
		return get_field( $field_name, $id );
	} else {
		return ucwords( strtolower( $color ) );
	}
}

/**
 * Returns vehicle interior color generic name.
 *
 * @param string $color Vehicle interior color generic name.
 * @param string $vin Vehicle VIN.
 * @param string $field_name Slug for the custom field being updated with returned value.
 * @return string
 */
function custom_int_color_generic( $color, $vin, $field_name ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( custom_check_field_locked( $field_name, $id ) === true ) {
		return get_field( $field_name, $id );
	} else {
		$color = ucwords( strtolower( $color ) );
		if ( 'Beige' === $color || 'Wheat' === $color || 'Sand' === $color || 'Parchment' === $color || 'Light Frost Beige' === $color || 'Ivory' === $color || 'Camel' === $color || 'Latte' === $color || 'Sand' === $color || 'Sand Beige' === $color ) {
			return 'Beige';
		} elseif ( 'Brown' === $color || 'Taupe' === $color || 'Truffle' === $color || 'Chestnut' === $color || 'Bisque' === $color || 'Auburn' === $color ) {
			return 'Brown';
		} elseif ( 'Black' === $color || 'Titan Black' === $color || 'Jet Black' === $color || 'Ebony' === $color || 'Charcoal Black' === $color || 'Carbon Black' === $color ) {
			return 'Black';
		} elseif ( 'Grey' === $color || 'Gray' === $color || 'Stone' === $color || 'Graystone' === $color || 'Dark Gray' === $color || 'Dark Grey' === $color || 'Dark Charcoal' === $color || 'Charcoal' === $color || 'Graphite' === $color || 'Misty Gray' === $color || 'Steel Gray' === $color ) {
			return 'Gray';
		} elseif ( 'Blue' === $color || 'Steel Blue' === $color ) {
			return 'Blue';
		} elseif ( stripos( $color, 'Black' ) !== false ) {
			return 'Black';
		} elseif ( stripos( $color, 'White' ) !== false ) {
			return 'White';
		} elseif ( stripos( $color, 'Red' ) !== false ) {
			return 'Red';
		} elseif ( stripos( $color, 'Blue' ) !== false ) {
			return 'Blue';
		} elseif ( stripos( $color, 'Silver' ) !== false ) {
			return 'Gray';
		} elseif ( stripos( $color, 'Green' ) !== false ) {
			return 'Green';
		} elseif ( stripos( $color, 'Orange' ) !== false ) {
			return 'Orange';
		} elseif ( stripos( $color, 'Brown' ) !== false ) {
			return 'Brown';
		} elseif ( stripos( $color, 'Gray' ) !== false || stripos( $color, 'Grey' ) ) {
			return 'Gray';
		} elseif ( stripos( $color, 'Tan' ) !== false ) {
			return 'Beige';
		} elseif ( stripos( $color, 'Yellow' ) !== false ) {
			return 'Yellow';
		} else {
			return null;
		}
	}
}

/**
 * Returns vehicle interior color as hex code.
 *
 * @param string $color Vehicle interior color as hex code.
 * @param string $vin Vehicle VIN.
 * @param string $field_name Slug for the custom field being updated with returned value.
 * @return string
 */
function custom_int_color_hex( $color, $vin, $field_name ) {
	$id = custom_get_vehicle_by_vin( $vin );
	if ( custom_check_field_locked( $field_name, $id ) === true ) {
		return get_field( $field_name, $id );
	} else {
		$color       = ucwords( strtolower( $color ) );
		$generic_int = custom_int_color_generic( $color, $vin, $field_name );
		if ( 'Ash' === $color ) {
			return '565656';
		} elseif ( 'Black' === $color ) {
			return '141414';
		} elseif ( 'Steel Gray' === $color ) {
			return '626465';
		} elseif ( 'Almond' === $color ) {
			return 'ab9879';
		} elseif ( 'Light Gray' === $color ) {
			return '787878';
		} elseif ( 'Bisque' === $color ) {
			return '4f483f';
		} elseif ( 'Graphite' === $color ) {
			return '474747';
		} elseif ( 'Sand Beige' === $color ) {
			return '635445';
		} elseif ( 'Ivory' === $color ) {
			return 'ae9a7f';
		} elseif ( 'Sandstone' === $color ) {
			return '8d8475';
		} elseif ( 'Dark Gray' === $color ) {
			return '393b3a';
		} elseif ( 'Gray' === $color ) {
			return '898989';
		} elseif ( 'Grey' === $color ) {
			return '898989';
		} elseif ( 'Light Blue Gray' === $color ) {
			return '4d4f4e';
		} elseif ( 'Beige' === $generic_int ) {
			return 'F5F5DC';
		} elseif ( 'Brown' === $generic_int ) {
			return '964B00';
		} elseif ( 'Black' === $generic_int ) {
			return '000000';
		} elseif ( 'Gray' === $generic_int ) {
			return '555555';
		} elseif ( 'Blue' === $generic_int ) {
			return '0054a6';
		} elseif ( 'White' === $generic_int ) {
			return 'ffffff';
		} elseif ( 'Red' === $generic_int ) {
			return 'ed1c24';
		} elseif ( 'Silver' === $generic_int ) {
			return 'acacac';
		} elseif ( 'Green' === $generic_int ) {
			return '007236';
		} elseif ( 'Orange' === $generic_int ) {
			return 'f26522';
		} elseif ( 'Brown' === $generic_int ) {
			return '534742';
		} elseif ( 'Tan' === $generic_int ) {
			return 'c69c72';
		} elseif ( 'Yellow' === $generic_int ) {
			return 'f6eb14';
		} elseif ( 'Auburn' === $generic_int ) {
			return '62423c';
		} else {
			return '';
		}
	}
}

/**
 * Creates vehicle post permalink.
 *
 * @param string $year Vehicle year.
 * @param string $make Vehicle make.
 * @param string $model Vehicle model.
 * @param string $vin Vehicle VIN.
 * @return string
 */
function custom_url( $year, $make, $model, $vin ) {
	// Combine, separated with a dash.
	$slug = $year . '-' . $make . '-' . $model . '-' . $vin;
	// Lowercase everything.
	$slug = strtolower( $slug );
	// Make alphanumeric (removes all other characters).
	$slug = preg_replace( '#[^a-z0-9_\s-]#', '', $slug );
	// Clean up multiple dashes or whitespaces.
	$slug = preg_replace( '#[\s-]+#', ' ', $slug );
	// Convert whitespaces and underscore to dash.
	$slug = preg_replace( '#[\s_]#', '-', $slug );
	return $slug;
}

/**
 * Sorts features list into categories.
 *
 * @param string $features Vehicle features list.
 * @param string $section Vehicle features category.
 * @return string
 */
function custom_features_list( $features, $section ) {
	$features     = explode( '|', $features );
	$results      = array();
	$previous_row = '';
	$current      = array();
	foreach ( $features as $row ) {
		// if $previous_row is less than or equal to $row, still alphabetical.
		if ( strcasecmp( $row, $previous_row ) > 0 || strcasecmp( $row, $previous_row ) === 0 ) {
			// Add row to an array.
			$current[] = $row;
			// Current row becomes previous row.
			$previous_row = $row;
		} else {
			// $row is less than $previous_row. Alphabet starts over.
			// Add $current array to $results array as string.
			$results[] = implode( '|', $current );
			// Start new $current array.
			unset( $current );
			// Add row to array.
			$current[] = $row;
			// Current row becomes previous row.
			$previous_row = $row;
		}
	}
	if ( 4 === $section ) {
		if ( isset( $results[4] ) && ! is_array( $results[4] ) ) {
			$results_rows = explode( '|', $results[4] );
			if ( is_array( $results_rows ) ) {
				foreach ( $results_rows as &$row ) {
					$row = strtolower( $row );
					$row = ucwords( $row );
				}
			}
			$results[4] = implode( '|', $results_rows );
		}
	}
	if ( isset( $results[ $section ] ) && ! empty( $results[ $section ] ) ) {
		$results_rows = explode( '|', $results[ $section ] );
		foreach ( $results_rows as &$row ) {
			$find    = '-inc:';
			$replace = 'including';
			$row     = str_replace( $find, $replace, $row );
		}
		$results[ $section ] = implode( '|', $results_rows );
		return $results[ $section ];
	}
	return '';
}

/**
 * Returns 0 or 1 based on stock number containing a "T" signifying In-Transit status.
 *
 * @param string $stock Vehicle stock number.
 * @return int
 */
function custom_in_transit( $stock ) {
	return stripos( $stock, 'T' ) !== false ? 1 : 0;
}
