<?php
/**
 * The template for displaying all video posts.
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
			'hero'     => get_field( 'video_archive_header_image', 'option' ),
			'headline' => get_field( 'video_archive_header_headline', 'option' ),
			'body'     => get_field( 'video_archive_header_body', 'option' ),
		)
	);

	?>
	<div class="videos__container">
		<div class="videos__filter">
			<form id="videosFilter" role="navigation" method="get" action="<?php echo esc_url( home_url( add_query_arg( null, null ) ) ); ?>">
				<input type="hidden" id="videoCategory" name="video_category" value="<?php echo esc_attr( get_query_var( 'video_category' ) ); ?>">
				<div id="videosFilterDropdown" class="videos__filter__dropdown">
					<button id="videosFilterButton" class="videos__filter__dropdown__button" type="button" aria-haspopup="true" aria-expanded="false"><span id="videosFilterDropdownSelected" class="videos__filter__dropdown__selected">All</span> </button>
					<ul id="videosFilterDropdownMenu" class="videos__filter__dropdown__menu" aria-labelledby="videosFilterButton" role="menu">
						<li role="presentation"><button type="button" class="<?php echo ( '' === get_query_var( 'video_category' ) ? 'active' : '' ); ?>" data-value="">All</button></li>
						<li role="presentation"><button type="button" class="<?php echo ( 'how-to' === get_query_var( 'video_category' ) ? 'active' : '' ); ?>" data-value="how-to">How-To</button></li>
						<li role="presentation"><button type="button" class="<?php echo ( 'new-cars' === get_query_var( 'video_category' ) ? 'active' : '' ); ?>" data-value="new-cars">New cars</button></li>
						<li role="presentation"><button type="button" class="<?php echo ( 'service' === get_query_var( 'video_category' ) ? 'active' : '' ); ?>" data-value="service">Service</button></li>
						<li role="presentation"><button type="button" class="<?php echo ( 'testimonials' === get_query_var( 'video_category' ) ? 'active' : '' ); ?>" data-value="testimonials">Testimonials</button></li>
					</ul>
				</div>
			</form>
		</div>
		<div class="videos">
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
	</div>
</main>
<?php

get_footer();
