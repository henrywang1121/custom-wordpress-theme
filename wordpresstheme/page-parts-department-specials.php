<?php
/**
 * The template for displaying the car Parts Department Specials page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Custom_Theme
 */

get_header();

get_template_part( 'template-parts/service', 'subhead' );

$dealership_name = get_bloginfo( 'name' );

?>
<div class="service">
	<div class="service__hero">
		<div class="service__hero__content">
			<div class="service__hero__copy">
				<div class="service__hero__headline">
					<h1 class="widow-fix">Parts From Your car Dealer</h1>
				</div>
				<p>Genuine car parts available from <?php echo esc_html( $dealership_name ); ?> keep your vehicle performing at its best.</p>
			</div>
			<div class="service__hero__ctas">
				<p>Click or call today to make an appointment for service you can trust.</p>
				<button class="button button--primary--white"
					type="button"
					data-toggle="modal"
					data-target="#scheduleServiceModal"
					data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
					data-ga-action="Click"
					data-ga-label="Schedule Maintenance Button">Schedule Maintenance</button>
				<a class="button button--secondary--transparent" href="/service-specials">View Specials</a>
			</div>
		</div>
	</div>

	<div class="service__copy-center">
		<div class="service__copy-center__content">
			<p>The parts team at your car Dealer has been factory-trained to provide you with exceptional service and ensure your vehicle is performing at its best. car Full Circle Service dealerships use Genuine car Parts and equipment to make sure your car receives the finest care possible.</p>
		</div>
	</div>

	<div class="specials">
		<?php

		$args = array(
			'post_type'      => 'service_special',
			'posts_per_page' => -1,
			'no_found_rows'  => true,
			'tax_query'      => array(
				array(
					'taxonomy' => 'service_special_category',
					'field'    => 'slug',
					'terms'    => array( 'parts-specials' ),
				),
			),
		);

		get_template_part(
			'template-parts/specials',
			'',
			array(
				'query' => new WP_Query( $args ),
			)
		);

		wp_reset_postdata();

		?>
	</div>

	<div class="service__touts">
		<a href="/car-tires" class="tout">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.jpg' ); ?>" width="120" height="120" alt="">
			</picture>
			Tire Service
		</a>
		<!-- <a href="/genuine-car-premium-oil" class="tout">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.jpg' ); ?>" width="120" height="120" alt="">
			</picture>
			Oil Change
		</a> -->
		<a href="/genuine-car-replacement-batteries" class="tout">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.jpg' ); ?>" width="120" height="120" alt="">
			</picture>
			Battery Service
		</a>
		<a href="/genuine-car-brakes" class="tout">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.jpg' ); ?>" width="120" height="120" alt="">
			</picture>
			Brake Service
		</a>
	</div>
	<?php



	?>
	<div class="site-disclaimer">
		<?php get_template_part( 'template-parts/disclaimer', 'prop-65' ); ?>
	</div>
</div>
<?php

get_footer();

