<?php
/**
 * The template for displaying the posts archive.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom_Theme
 */

get_header();

?>
<main id="main" class="site-main">
	<?php

	global $post;
	$post = get_page_by_path( 'blog' );
	setup_postdata( $post );
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
	get_template_part( 'template-parts/page', 'content' );
	wp_reset_postdata();

	?>
	<div class="posts__container">
		<div class="posts__inner">
			<div class="posts">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : ?>
						<?php

						the_post();
						get_template_part( 'template-parts/content', get_post_type() );

						?>
					<?php endwhile; ?>

					<nav class="page-navigation" aria-label="Page navigation">
						<?php echo custom_pagination(); ?>
					</nav>
				<?php else : ?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>
<?php

get_footer();
