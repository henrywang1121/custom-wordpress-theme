<?php
/**
 * The template for displaying a single special.
 *
 * @package Custom_Theme
 */

global $wp_query;
$args = wp_parse_args(
	$args,
	array(
		'query' => $wp_query,
	)
);

?>
<?php if ( $args['query']->have_posts() ) : ?>
	<div class="specials__list">
		<?php while ( $args['query']->have_posts() ) : ?>
			<?php

			$args['query']->the_post();

			get_template_part( 'template-parts/special', get_post_type() );

			?>
		<?php endwhile; ?>
	</div>
<?php else : ?>
	<?php get_template_part( 'template-parts/special', 'none' ); ?>
<?php endif; ?>
<?php
