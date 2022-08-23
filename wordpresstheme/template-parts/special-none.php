<?php
/**
 * The template for displaying a content when no specials are available.
 *
 * @package Custom_Theme
 */

get_template_part(
	'template-parts/content',
	'copy',
	array(
		'alignment' => 'center',
		'headline'  => 'Sorry, No Current Specials',
		'body'      => 'Check back soon for more special offers from ' . get_bloginfo( 'name' ) . '.',
	)
);
