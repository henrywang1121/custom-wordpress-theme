<?php
/**
 * The template for displaying new and used vehicle inventory and search results.
 *
 * @package Custom_Theme
 */

?>
<article id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<?php custom_post_thumbnail(); ?>
	<?php elseif ( has_post_format( 'video' ) ) : ?>
		<div class="embed-container">
			<?php echo get_field( 'blog_featured_video' ); ?>
		</div>
	<?php endif; ?>

	<header class="post__header">
		<div class="post__meta">
			<?php

			$allowed_html = array(
				'a' => array(
					'href' => array(),
					'rel'  => array(),
				),
			);

			echo get_the_date() . ' | ' . wp_kses( get_the_category_list( ', ' ), $allowed_html );

			?>
		</div>
		<?php if ( is_single() ) : ?>
			<h1 class="post__title"><?php echo esc_html( get_the_title() ); ?></h1>
		<?php else : ?>
			<h2 class="post__title"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo esc_html( get_the_title() ); ?></a></h2>
		<?php endif; ?>
	</header>

	<div class="post__content">
		<?php if ( is_singular( 'post' ) ) : ?>
			<div class="post__body">
				<?php the_content(); ?>
			</div>
		<?php else : ?>
			<div class="post__body">
				<?php the_excerpt(); ?>
			</div>
			<div class="post__more-link"><a class="button button--primary--black" href="<?php echo esc_url( get_permalink() ); ?>">Read More</a></div>
		<?php endif; ?>

		<!-- the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '_s' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		); -->

		<?php

		wp_link_pages(
			array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'custom' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		?>
	</div>
</article>
