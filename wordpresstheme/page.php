<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom_Theme
 */

get_header();

get_template_part( 'template-parts/page', 'subhead' );

?>
<main id="main" class="site-main">
	<?php

	get_template_part(
		'template-parts/page',
		'header',
		array(
			'hero'          => get_field( 'page_header_hero' ),
			'subhead'       => get_field( 'page_header_subhead' ),
			'headline'      => get_field( 'page_header_headline' ),
			'body'          => get_field( 'page_header_body' ),
			'primary_cta'   => get_field( 'page_header_primary_cta' ),
			'secondary_cta' => get_field( 'page_header_secondary_cta' ),
		)
	);

	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/page', 'content' );
	}

	?>
</main>
<?php

get_footer();
