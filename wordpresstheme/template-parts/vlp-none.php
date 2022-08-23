<?php
/**
 * The template for displaying a content when no vehicles are available.
 *
 * @package Custom_Theme
 */

get_template_part(
	'template-parts/content',
	'copy',
	array(
		'alignment' => 'center',
		'headline'  => 'Sorry, No Inventory Found',
		'body'      => 'Check back soon for new inventory at ' . get_bloginfo( 'name' ) . '.',
	)
);
