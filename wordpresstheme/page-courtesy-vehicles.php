<?php
/**
 * The template for displaying the car Courtesy Vehicles page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom_Theme
 */

get_header();

get_template_part( 'template-parts/service', 'subhead' );

$dealership_name = get_bloginfo( 'name' );
$service_phone   = get_field( 'service_telephone_number', 'option' );

?>
<div class="service">
	<div class="service__hero">
		<div class="service__hero__content">
			<div class="service__hero__copy">
				<div class="service__hero__headline">
					<h1 class="widow-fix">Get A Loaner Vehicle From <?php echo esc_html( $dealership_name ); ?></h1>
				</div>
				<p>Loaner vehicles from <?php echo esc_html( $dealership_name ); ?> get you back on the road as quickly as possible.</p>
			</div>
			<div class="service__hero__ctas">
				<p>Click or call today to make an appointment for service you can trust.</p>
				<button class="button button--primary--white"
					type="button"
					data-toggle="modal"
					data-target="#scheduleServiceModal"
					data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
					data-ga-action="Click"
					data-ga-label="Schedule Service Button">Schedule Service</button>
				<a class="button button--secondary--transparent" href="/car-service-specials">View Specials</a>
			</div>
		</div>
	</div>

	<div class="service__copy-center">
		<h2 class="service__copy-center__headline">Courtesy Vehicles From <?php echo esc_html( $dealership_name ); ?></h2>
		<div class="service__copy-center__content">
			<p>As an authorized car dealer, we offer our Service customers a fleet of new car courtesy loaner vehicles while their vehicles are in for service.</p>
		</div>
	</div>

	<div class="service__fifty-fifty service__fifty-fifty--right">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-courtesy-vehicles-loaner-vehicles.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-courtesy-vehicles-loaner-vehicles.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async"src="<?php echo esc_url( get_template_directory_uri() . '/images/car-courtesy-vehicles-loaner-vehicles.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">Loaner Vehicles</h2>
			<p>We maintain a fleet of new car Courtesy Vehicles for our customers to use while their vehicle is in routine maintenance, repairs, or warranty work. Take advantage of the opportunity to drive a different model each time you&rsquo;re in for service or check out the latest features by requesting a car Courtesy Vehicle on your next visit. Use of a car Courtesy Vehicle is always free. Please call us at <a href="<?php echo esc_url( 'tel:' . $service_phone ); ?>" data-sd-department="Service"><?php echo esc_html( $service_phone ); ?></a> for more information about the car Courtesy Vehicle Program.</p>
			<button class="button button--primary--black"
				type="button"
				data-toggle="modal"
				data-target="#scheduleServiceModal"
				data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
				data-ga-action="Click"
				data-ga-label="Schedule Service Button">Schedule Service</button>
		</div>
	</div>

	<div class="service__icon-links__container">
		<h2 class="service__icon-links__headline">All Service Offerings And Specials</h2>
		<div class="service__icon-links">
			<a href="/routine-maintenance" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-routine-maintenance.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-routine-maintenance.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async"src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-routine-maintenance.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Routine Maintenance
			</a>
			<a href="/car-tires" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async"src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Tire Service
			</a>
			<!-- <a href="/genuine-car-premium-oil" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async"src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				car Premium Oil
			</a> -->
			<a href="/car-courtesy-vehicles" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-courtesy-vehicles.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-courtesy-vehicles.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async"src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-courtesy-vehicles.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				car Courtesy Vehicles
			</a>
			<a href="/car-service-specials" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-service-specials.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-service-specials.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async"src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-service-specials.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				car Service Specials
			</a>
			<a href="/genuine-car-parts" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-parts.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-parts.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async"src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-parts.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Genuine car Parts
			</a>
			<a href="/genuine-car-accessories" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-accessories.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-accessories.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async"src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-accessories.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Genuine car Accessories
			</a>
			<a href="/genuine-car-replacement-batteries" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async"src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Genuine car Batteries
			</a>
			<a href="/genuine-car-brakes" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async"src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Genuine car Brakes
			</a>
			<a href="/genuine-car-air-filters" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-air-filters.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-air-filters.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async"src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-air-filters.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Air Filters
			</a>
			<a href="/parts-department-specials" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-parts-specials.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-parts-specials.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async"src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-parts-specials.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				car Parts Specials
			</a>
			<button class="icon-link"
				type="button"
				data-toggle="modal"
				data-target="#scheduleServiceModal"
				data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
				data-ga-action="Click"
				data-ga-label="Schedule Service Today Button">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-schedule-service.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-schedule-service.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async"src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-schedule-service.jpg' ); ?>" width="100" height="100" alt="">
				</picture>
				Schedule Service Today
			</button>
		</div>
	</div>
	<?php



	?>
	<div class="site-disclaimer">
		<?php get_template_part( 'template-parts/disclaimer', 'prop-65' ); ?>
	</div>
</div>
<?php

get_footer();
