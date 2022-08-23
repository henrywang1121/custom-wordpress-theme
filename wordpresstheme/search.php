<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Custom_Theme
 */

get_header();
get_template_part( 'template-parts/breadcrumb', 'search' );

if ( ! empty( $_GET['compare'] ) ) {
	get_template_part(
		'template-parts/vlp',
		'compare',
		array(
			'vehicle_ids' => $_GET['compare'],
		)
	);
} else {
	get_template_part( 'template-parts/vlp', '' );
}

get_footer();
