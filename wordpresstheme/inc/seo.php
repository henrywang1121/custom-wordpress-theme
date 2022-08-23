<?php
/**
 * custom Post Type and Taxonomy Definitions.
 *
 * @package Custom_Theme
 */

function custom_seo_canonical( $canonical ) {
  if ( ( is_tax( custom_TAXONOMY ) || is_post_type_archive( 'vehicle' ) || is_search() ) ) {
    $path = '/inventory/';
    if ( 'new-cars' === get_query_var( 'inventory' ) ) {
      // New cars.
      $model = get_query_var( 'model' );
      if ( $model && stripos( $model, ',' ) === false ) {
        // Only one model, not comma-separated list.
        $path = '/inventory/?inventory=new-cars&model=' . str_replace( ' ', '+', $model );
      } else {
        $path = '/inventory/new-cars/';
      }
    } elseif ( 'used-vehicles' === get_query_var( 'inventory' ) ) {
      $path = '/inventory/used-vehicles/';
    } elseif ( 'certified-pre-owned-cars' === get_query_var( 'inventory' ) ) {
      $path = '/inventory/certified-pre-owned-cars/';
    }
    return get_site_url( null, $path, 'https' );
  }
  return $canonical;
}
add_filter( 'wpseo_canonical', 'custom_seo_canonical', 10, 1 );

function custom_seo_title( $title ) {
  if ( is_tax( custom_TAXONOMY ) || is_post_type_archive( 'vehicle' ) || is_search() ) {
    $name = get_bloginfo( 'name' );
    if ( 'new-cars' === get_query_var( 'inventory' ) ) {
      // New cars.
      $model = get_query_var( 'model' );
      if ( $model && stripos( $model, ',' ) === false ) {
        // Only one model, not comma-separated list.
        switch ( $model ) {
          case 'car3 Hatchback':
            return 'New 2022 car3 Hatchback -  ' . $name;
            break;
          case 'car3 Sedan':
            return 'New 2022 car3 Sedan - ' . $name;
          case 'CX-30':
            return 'New 2022 car CX-30 - Custom Theme car' . $name;
            break;
          case 'CX-5':
            return 'New 2022 car CX-5 - ' . $name;
            break;
          case 'CX-50':
            return 'New 2023 car CX-50 - ' . $name;
            break;
          case 'CX-9':
            return 'New 2022 car CX-9 - ' . $name;
            break;
          case 'MX-30':
            return 'New 2022 car MX-30 - ' . $name;
            break;
          case 'MX-5 Miata RF':
            return 'New 2022 car MX-5 Miata RF - ' . $name;
            break;
          case 'MX-5 Miata':
            return 'New 2022 car MX-5 Miata - ' . $name;
            break;
        }
      } else {
        return 'New 2022-2023 car Models - ' . $name;
      }
    } elseif ( 'used-vehicles' === get_query_var( 'inventory' ) ) {
      return 'Used Car Dealership - ' . $name;
    } elseif ( 'certified-pre-owned-cars' === get_query_var( 'inventory' ) ) {
      return 'Certified Pre-Owned cars - ' . $name;
    }
  }
  return $title;
}
add_filter( 'wpseo_title', 'custom_seo_title', 10, 1 );

function custom_seo_metadesc( $metadesc ) {
  if ( is_tax( custom_TAXONOMY ) || is_post_type_archive( 'vehicle' ) || is_search()  ) {
    $name  = get_bloginfo( 'name' );
    $city  = get_field( 'dealership_city', 'option' );
    $state = get_field( 'dealership_state', 'option' );
    if ( 'new-cars' === get_query_var( 'inventory' ) ) {
      // New cars.
      $model = get_query_var( 'model' );
      if ( $model && stripos( $model, ',' ) === false ) {
        switch ( $model ) {
          case 'car3 Hatchback':
            $metadesc = 'Zip around town in the sporty new 2022 car3 Hatchback at ' . $name . ' in ' . $city . ', ' . $state . '. Now available with the car Skyactiv-G 2.5 Turbo engine!';
            break;
          case 'car3 Sedan':
            $metadesc = 'Buy the sporty, fun to drive new 2022 car3 at ' . $name . ' in ' . $city . ', ' . $state . '. Now available with the car Skyactiv-G 2.5 Turbo engine!';
            break;
          case 'CX-30':
            $metadesc = 'Discover the new 2022 car CX-30 crossover at ' . $name . ' in ' . $city . ', ' . $state . '. Now available with the car Skyactiv-G 2.5 Turbo engine!';
            break;
          case 'CX-5':
            $metadesc = 'Experience the capable new 2022 car CX-5 SUV at ' . $name . ' in ' . $city . ', ' . $state . '. Now available with the car Skyactiv-G 2.5 Turbo engine!';
            break;
          case 'CX-50':
            $metadesc = 'Be inspired by the 2023 car CX-50 SUV at ' . $name . ' in ' . $city . ', ' . $state . '. Connect with the road, even when there isn\'t one, with i-Activ-AWD technology.';
            break;
          case 'CX-9':
            $metadesc = 'Enjoy the extra room in the three-row new 2022 car CX-9 SUV at ' . $name . ' in ' . $city . ', ' . $state . '. Now featuring the car Skyactiv-G 2.5 Turbo engine!';
            break;
          case 'MX-30':
            $metadesc = 'Experience the highest levels of comfort and sustainable materials in the 2022 MX-30 EV at ' . $name . ' in ' . $city . ', ' . $state . '.';
            break;
          case 'MX-5 Miata RF':
            $metadesc = 'Drop the top in the spunky new 2022 car MX-5 Miata RF hardtop convertible at ' . $name . ' in ' . $city . ', ' . $state . '.';
            break;
          case 'MX-5 Miata':
            $metadesc = 'Experience the iconic roadster convertible, the new 2022 car MX-5 Miata at ' . $name . ' in ' . $city . ', ' . $state . '.';
            break;
        }
      } else {
        return 'View our large inventory of new 2022-2023 car models in ' . $city . ', ' . $state . '. The latest car models at incredible prices. Test drive a new car today!';
      }
    } elseif ( 'used-vehicles' === get_query_var( 'inventory' ) ) {
      return 'cars are known to be reliable, so you can be rest assured that a pre-owned car is a safe bet. Shop our great selection at ' . $name . ' in ' . $city . ', ' . $state . '.';
    } elseif ( 'certified-pre-owned-cars' === get_query_var( 'inventory' ) ) {
      return 'Certified Pre-Owned cars are meticulously maintained cars, only the best make the cut & are backed by a CPO warranty. Shop our big selection at ' . $name;
    }
  }
  return $metadesc;
}
add_filter( 'wpseo_metadesc', 'custom_seo_metadesc', 10, 1 );

/**
 * Filters page title string and meta description. Replaces current year in SEO page title with actual model year(s) based on vehicles in inventory for that VLP.
 *
 * @param  string $string Page title or meta description created by WordPress or Yoast SEO Plugin.
 * @return string Filtered page title or meta description for output.
 */
function custom_seo_replace( $string ) {
	$year_placeholder = '[custom_model_year]';
	if ( stripos( $string, $year_placeholder ) !== false ) {

		$year_string = current_time( 'Y' );

		// For VLPs, determine model years available and add to page title with filter.
		if ( is_post_type_archive( 'vehicle' ) || is_tax( custom_TAXONOMY ) ) {
			$new_cars_cat = get_term_by( 'slug', custom_NEW_VEHICLES_SLUG, custom_TAXONOMY );
			global $wp_query;
			if ( ! empty( $wp_query->query_vars[ custom_TAXONOMY ] ) ) {
				$current_term_slug = $wp_query->query_vars[ custom_TAXONOMY ];
				$current_term      = get_term_by( 'slug', $current_term_slug, custom_TAXONOMY );
				if ( ! empty( $current_term ) && ( custom_NEW_VEHICLES_SLUG === $current_term_slug || ( $new_cars_cat && term_is_ancestor_of( (int) $new_cars_cat->term_id, $current_term->term_id, custom_TAXONOMY ) ) ) ) {

					// Get all vehicles in vehicle category.
					$args     = array(
						'post_type'      => 'vehicle',
						'posts_per_page' => -1,
						'fields'         => 'ids',
						'no_found_rows'  => true,
						'tax_query'      => array(
							array(
								'taxonomy' => custom_TAXONOMY,
								'field'    => 'slug',
								'terms'    => $current_term_slug,
							),
						),
					);
					$vehicles = get_posts( $args );
					if ( ! empty( $vehicles ) ) {
						$years = array();
						foreach ( $vehicles as $id ) {
							$year = get_field( 'year', $id );
							if ( ! empty( $year ) && is_numeric( $year ) ) {
								$years[] = $year;
							}
						}
						if ( ! empty( $years ) ) {
							$min_years = min( $years );
							$max_years = max( $years );
							if ( $min_years !== $max_years ) {
								$year_string = $min_years . '-' . $max_years;
							} elseif ( ! empty( $min_years ) ) {
								$year_string = $min_years;
							}
						}
					}
				}
			}
		}
		if ( $year_string ) {
			return str_replace( $year_placeholder, $year_string, $string );
		}
	}
	return $string;
}

// Filter contents of Yoast SEO page title.
add_filter( 'wpseo_title', 'custom_seo_replace', 20, 1 );

// Filter contents of Yoast SEO meta description.
add_filter( 'wpseo_metadesc', 'custom_seo_replace', 20, 1 );