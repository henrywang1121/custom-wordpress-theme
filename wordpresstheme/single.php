<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
				<?php

				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content', 'post' );

					the_post_navigation(
						array(
							'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M29 17.268H7.815l9.951 9.829L16.16 29 3 16 16.16 3l1.605 1.585-9.95 10.147H29v2.536z"/></svg> <span>' . esc_html__( 'Previous:', 'custom' ) . ' %title</span>',
							'next_text' => '<span>' . esc_html__( 'Next:', 'custom' ) . ' %title</span> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M3 14.7h21.2l-10-10.1L15.8 3 29 16 15.8 29l-1.6-1.9 10-9.8H3v-2.6z"/></svg>',
						)
					);
				}

				?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</main>
<?php

get_footer();
