<?php
/**
 * The template for displaying the Genuine car Brakes page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
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
					<h1 class="widow-fix">Genuine car Brakes Have A Lifetime Warranty</h1>
				</div>
				<p>Genuine car brakes from <?php echo esc_html( $dealership_name ); ?> keep your vehicle peorming at its best.</p>
			</div>
			<div class="service__hero__ctas">
				<p>Click or call today to make an appointment for service you can trust.</p>
				<button class="button button--primary--white"
					type="button"
					data-toggle="modal"
					data-target="#scheduleServiceModal"
					data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
					data-ga-action="Click"
					data-ga-label="Schedule Brake Service Button">Schedule Brake Service</button>
				<a class="button button--secondary--transparent" href="/car-service-specials">View Specials</a>
			</div>
		</div>
	</div>

	<div class="service__copy-center">
		<h2 class="service__copy-center__headline">Brake Service From <?php echo esc_html( $dealership_name ); ?></h2>
		<div class="service__copy-center__content">
			<p>Genuine car Brakes make sure you stop smoothly. Designed for specific car models, we ensure that they&rsquo;re the highest-quality brakes available.</p>
		</div>
	</div>

	<div class="service__fifty-fifty service__fifty-fifty--right">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-brakes-genuine-vs-aftermarket.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-brakes-genuine-vs-aftermarket.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-brakes-genuine-vs-aftermarket.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">Genuine car Brakes VS. Aftermarket Brakes</h2>
			<p>Aftermarket brakes can be as unpredictable as the road you&rsquo;re driving on. Genuine car Brake Pads have an advantage in braking effectiveness. See the comparison chart* below.</p>
			<button class="button button--primary--black"
				type="button"
				data-toggle="modal"
				data-target="#scheduleServiceModal"
				data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
				data-ga-action="Click"
				data-ga-label="Schedule Brake Service Button">Schedule Brake Service</button>
		</div>
	</div>

	<div class="service__copy-center">
		<h2 class="service__copy-center__headline">Stopping-Distance Comparison</h2>
		<div class="service__copy-center__content">
			<p>(car = 100% Genuine)</p>
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-brakes-stopping-distance-comparison.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-brakes-stopping-distance-comparison.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-brakes-stopping-distance-comparison.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
			<p class="disclaimer">*Information based on an independent study peormed for car Motor Corporation in February 2004.</p>
		</div>
	</div>

	<div class="service__copy-center">
		<h2 class="service__copy-center__headline">Know When To Inspect And Replace Your Brakes</h2>
		<div class="service__copy-center__content">
			<p>To keep braking peormance at its optimum level, an inspection every six months is recommended. Because brake pads and shoes are hidden behind the wheels, it is difficult to see how much product life is remaining. See your authorized car Dealer for a brake inspection and ask about our Lifetime Limited Warranty on Genuine car and Value Products by car Brake Pads and Shoes.</p>
		</div>
	</div>

	<div class="service__fullsize service__fullsize--need-brake-service">
		<div class="service__fullsize__background lazy-background"></div>
		<div class="service__fullsize__content">
			<div class="service__fullsize__tagline">Need Brake Service?</div>
			<h2 class="service__fullsize__headline">Contact <?php echo esc_html( $dealership_name ); ?> Today</h2>
			<div class="service__fullsize__body">
				<p>Delaying brake service can result in damage to your vehicle. Let our service team at <?php echo esc_html( $dealership_name ); ?> provide the best possible service for your car.</p>
				<button class="button button--primary--black"
					type="button"
					data-toggle="modal"
					data-target="#scheduleServiceModal"
					data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
					data-ga-action="Click"
					data-ga-label="Schedule Brake Service Button">Schedule Brake Service</button>
			</div>
		</div>
	</div>

	<div class="service__touts">
		<a href="/car-tires" class="tout">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.jpg' ); ?>" width="120" height="120" alt="">
			</picture>
			Tire Service
		</a>
		<!-- <a href="/genuine-car-premium-oil" class="tout">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.jpg' ); ?>" width="120" height="120" alt="">
			</picture>
			Oil Change
		</a> -->
		<a href="/genuine-car-replacement-batteries" class="tout">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.jpg' ); ?>" width="120" height="120" alt="">
			</picture>
			Battery Service
		</a>
		<a href="/genuine-car-brakes" class="tout">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.jpg' ); ?>" width="120" height="120" alt="">
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
