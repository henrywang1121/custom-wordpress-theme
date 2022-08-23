<?php
/**
 * The template for displaying the header structured content.
 *
 * @package freemantoyota
 */

// Structured Data.
$address       = get_field( 'dealership_street_address', 'option' );
$city          = get_field( 'dealership_city', 'option' );
$state_abbr    = get_field( 'dealership_state_abbr', 'option' );
$zip           = get_field( 'dealership_zip_code', 'option' );
$country       = get_field( 'dealership_country', 'option' );
$latitude      = get_field( 'dealership_latitude', 'option' );
$longitude     = get_field( 'dealership_longitude', 'option' );
$sales_phone   = get_field( 'sales_telephone_number', 'option' );
$sales_hours   = custom_get_hours( 'sales' );
$service_phone = get_field( 'service_telephone_number', 'option' );
$service_hours = custom_get_hours( 'service' );
$parts_phone   = get_field( 'parts_telephone_number', 'option' );
$parts_hours   = custom_get_hours( 'parts' );
$social_urls   = array_values(
	array_filter(
		array(
			get_field( 'facebook_url', 'option' ),
			get_field( 'twitter_url', 'option' ),
			get_field( 'youtube_url', 'option' ),
			get_field( 'yelp_url', 'option' ),
		)
	)
);

$sales_phone     = '+1' . substr( str_replace( array( '(', ')', '-', ' ' ), '', $sales_phone ), -10 );
$sales_hours_arr = array();
foreach ( $sales_hours as $hours ) {
	if ( empty( $hours['opens'] ) || empty( $hours['closes'] ) ) {
		continue;
	}

	$sales_hours_arr[] = array(
		'@type'     => 'OpeningHoursSpecification',
		'dayOfWeek' => $hours['day'],
		'opens'     => $hours['opens'],
		'closes'    => $hours['closes'],
	);
}

$service_phone     = '+1' . substr( str_replace( array( '(', ')', '-', ' ' ), '', $service_phone ), -10 );
$service_hours_arr = array();
foreach ( $service_hours as $hours ) {
	if ( empty( $hours['opens'] ) || empty( $hours['closes'] ) ) {
		continue;
	}

	$service_hours_arr[] = array(
		'@type'     => 'OpeningHoursSpecification',
		'dayOfWeek' => $hours['day'],
		'opens'     => $hours['opens'],
		'closes'    => $hours['closes'],
	);
}

$parts_phone     = '+1' . substr( str_replace( array( '(', ')', '-', ' ' ), '', $parts_phone ), -10 );
$parts_hours_arr = array();
foreach ( $parts_hours as $hours ) {
	if ( empty( $hours['opens'] ) || empty( $hours['closes'] ) ) {
		continue;
	}

	$parts_hours_arr[] = array(
		'@type'     => 'OpeningHoursSpecification',
		'dayOfWeek' => $hours['day'],
		'opens'     => $hours['opens'],
		'closes'    => $hours['closes'],
	);
}

$json = array(
	'@context'                  => 'https://schema.org',
	'@type'                     => 'AutoDealer',
	'name'                      => get_bloginfo( 'name' ),
	'address'                   => array(
		'@type'           => 'PostalAddress',
		'streetAddress'   => $address,
		'addressLocality' => $city,
		'addressRegion'   => $state_abbr,
		'postalCode'      => $zip,
		'addressCountry'  => $country,
	),
	'geo'                       => array(
		'@type'     => 'GeoCoordinates',
		'latitude'  => $latitude,
		'longitude' => $longitude,
	),
	'image'                     => array(
		get_stylesheet_directory_uri() . '/images/dealership-image-1-1.jpg',
		get_stylesheet_directory_uri() . '/images/dealership-image-4-3.jpg',
		get_stylesheet_directory_uri() . '/images/dealership-image-16-9.jpg',
	),
	'url'                       => site_url(),
	'telephone'                 => $sales_phone,
	'logo'                      => get_stylesheet_directory_uri() . '/images/dealership-logo.svg',
	'sameAs'                    => $social_urls,
	'openingHoursSpecification' => $sales_hours_arr,
	'department'                => array(
		array(
			'@type'                     => 'AutoDealer',
			'name'                      => get_bloginfo( 'name' ) . ' Sales',
			'address'                   => array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => $address,
				'addressLocality' => $city,
				'addressRegion'   => $state_abbr,
				'postalCode'      => $zip,
				'addressCountry'  => $country,
			),
			'telephone'                 => $sales_phone,
			'url'                       => site_url( '/inventory/' ),
			'openingHoursSpecification' => $sales_hours_arr,
		),
		array(
			'@type'                     => 'AutoRepair',
			'name'                      => get_bloginfo( 'name' ) . ' Service Center',
			'address'                   => array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => $address,
				'addressLocality' => $city,
				'addressRegion'   => $state_abbr,
				'postalCode'      => $zip,
				'addressCountry'  => $country,
			),
			'telephone'                 => $service_phone,
			'url'                       => site_url( '/car-service-center/' ),
			'openingHoursSpecification' => $service_hours_arr,
		),
		array(
			'@type'                     => 'AutoPartsStore',
			'name'                      => get_bloginfo( 'name' ) . ' Parts',
			'address'                   => array(
				'@type'           => 'PostalAddress',
				'streetAddress'   => $address,
				'addressLocality' => $city,
				'addressRegion'   => $state_abbr,
				'postalCode'      => $zip,
				'addressCountry'  => $country,
			),
			'telephone'                 => $parts_phone,
			'url'                       => site_url( '/genuine-car-parts/' ),
			'openingHoursSpecification' => $parts_hours_arr,
		),
	),
);

?>
<script type="application/ld+json">
	<?php echo wp_json_encode( $json, JSON_PRETTY_PRINT ); ?>
</script>
