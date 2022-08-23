<?php
/**
 * The template for displaying a single video post.
 *
 * @package Custom_Theme
 */

get_header();

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

	?>
	<?php while ( have_posts() ) : ?>
		<?php

		the_post();
		get_template_part( 'template-parts/page', 'content' );

		?>
	<?php endwhile; ?>
</main>
<?php

get_footer();
