<?php
/**
 * custom Advanced Custom Fields setup and customization functions.
 *
 * @package Custom_Theme
 */

/**
 * Adds taxonomy "Vehicle Category" to Advanced Custom Fields Location Rules.
 *
 * @param  array $choices An array of rule types.
 * @return array
 */
function custom_acf_location_rules_types( $choices ) {
	$choices['Other'][ custom_TAXONOMY ] = 'Vehicle Category';
	return $choices;
}
add_filter( 'acf/location/rule_types', 'custom_acf_location_rules_types' );

/**
 * Adds terms from taxonomy "Vehicle Category" to Advanced Custom Fields Location Rules Values.
 *
 * @param  array $choices An array of rule values.
 * @return mixed
 */
function custom_acf_location_rules_values_vehicle_category( $choices ) {
	$terms = get_terms( custom_TAXONOMY );
	if ( $terms ) {
		foreach ( $terms as $term ) {
			$choices[ $term->term_id ] = $term->name;
		}
	}
	return $choices;
}
add_filter( 'acf/location/rule_values/vehicle_category', 'custom_acf_location_rules_values_vehicle_category' );

/**
 * Matches Advanced Custom Fields Vehicle Category Term Values to Vehicle Category Edit pages.
 *
 * @param bool  $match   The true / false variable which must be returned.
 * @param array $rule    The current rule that you are matching against. This is an array with keys for ‘param’, ‘operator’, ‘value’.
 * @param array $options An array of data about the current edit screen (post_id, page_template, post_type, etc). This array will also include any data posted in an ajax call (ajax calls are made on a post / page when you change the category, page_template, etc).
 * @return bool
 */
function custom_acf_location_rules_match_vehicle_category( $match, $rule, $options ) {
	$match          = false;
	$selected_term  = (int) $rule['value'];
	$args           = array(
		'child_of' => $selected_term,
	);
	$category_array = get_terms( custom_TAXONOMY, $args );
	$selected_array = array();
	if ( ! empty( $category_array ) ) {
		foreach ( $category_array as $category ) {
			$selected_array[] = (int) $category->term_id;
		}
	}
	$selected_array[] = $selected_term;
	if ( ! empty( $_GET['tag_ID'] ) ) {
		$current_term = (int) $_GET['tag_ID'];
		if ( '==' === $rule['operator'] && in_array( $current_term, $selected_array, true ) ) {
			$match = true;
		} elseif ( '!=' === $rule['operator'] && ! in_array( $current_term, $selected_array, true ) ) {
			$match = true;
		}
	}
	return $match;
}
add_filter( 'acf/location/rule_match/vehicle_category', 'custom_acf_location_rules_match_vehicle_category', 10, 3 );

// Add ACF Options Pages.
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}

if ( function_exists( 'acf_add_options_sub_page' ) ) {
	acf_add_options_sub_page( 'Contact Information' );
	acf_add_options_sub_page( 'Hours' );
	acf_add_options_sub_page( 'Site Header' );
	acf_add_options_sub_page( 'New Vehicle Menu' );
	acf_add_options_sub_page( 'Site Footer' );
	acf_add_options_sub_page( 'Service Specials' );
	acf_add_options_sub_page( 'Video Archive Header' );
	acf_add_options_sub_page( 'Configuration' );
}

/**
 * Undocumented function
 *
 * @return array
 */
function custom_get_acf_fields() {
	$acf_fields = array();
	$files      = glob( get_stylesheet_directory() . '/acf-json/*.json' );
	if ( ! empty( $files ) ) {
		foreach ( $files as $file ) {
			$field_group = json_decode( file_get_contents( $file ), true );
			if ( ! empty( $field_group ) && array_key_exists( 'fields', $field_group ) && ! empty( $field_group['fields'] ) ) {
				foreach ( $field_group['fields'] as $field ) {
					$acf_fields[ $field['name'] ] = $field['key'];
				}
			}
		}
	}
	return $acf_fields;
}

/**
 * Undocumented function
 *
 * @param string $field_name ACF field name.
 * @return string
 */
function custom_get_acf_field_key( $field_name ) {
	$field_key  = '';
	$acf_fields = custom_get_acf_fields();
	if ( ! empty( $acf_fields ) && array_key_exists( $field_name, $acf_fields ) ) {
		$field_key = $acf_fields[ $field_name ];
	}
	return $field_key;
}

/**
 * Get ACF field group ID for each supplied field group name.
 *
 * @param string|array $name A string containing a single field group name, or an array containing multiple.
 * @return array             SQL query result.
 */
function custom_get_acf_group_id_by_name( $name ) {
	global $wpdb;
	$sql = "SELECT id FROM {$wpdb->posts} WHERE post_title";
	if ( is_array( $name ) ) {
		$string_array = array_fill( 0, count( $name ), '%s' );
		$sql          = $wpdb->prepare( $sql . ' IN ( ' . implode( ', ', $string_array ) . ' )', $name );
	} else {
		$sql = $wpdb->prepare( $sql . ' = %s', $name );
	}
	return $wpdb->get_results( $sql );
}

/**
 * Undocumented function
 *
 * @param [type] $group_id
 * @param [type] $context
 * @return array
 */
function custom_get_group_fields( $group_id, $context = null ) {
	if ( ! $context ) {
		global $post;
	}
	$group_fields = array();
	$fields       = acf_get_fields( $group_id );
	foreach ( $fields as $field ) {
		if ( $context ) {
			$field_value = get_field( $field['name'], $context );
		} else {
			$field_value = get_field( $field['name'] );
		}
		if ( $field_value && ! empty( $field_value ) ) {
			$group_fields[ $field['name'] ]          = $field;
			$group_fields[ $field['name'] ]['value'] = $field_value;
		}
	}
	return $group_fields;
}
