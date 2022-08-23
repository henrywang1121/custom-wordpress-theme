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
