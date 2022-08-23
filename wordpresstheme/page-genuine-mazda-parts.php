<?php
/**
 * The template for displaying the Genuine car Accessories page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom_Theme
 */

get_header();

get_template_part( 'template-parts/service', 'subhead' );

$dealership_name = get_bloginfo( 'name' );

$order_parts_template_part = array(
	'template-parts/form',
	'parts',
	array(
		'title' => 'Order Parts',
	),
);

?>
<div class="service">
	<div class="service__hero">
		<div class="service__hero__content">
			<div class="service__hero__copy">
				<div class="service__hero__headline">
					<h1 class="widow-fix">You And Your car Deserve Bespoke Parts</h1>
				</div>
				<p>Genuine car parts from <?php echo esc_html( $dealership_name ); ?> keep your vehicle peorming at its best.</p>
			</div>
			<div class="service__hero__ctas">
				<p>Click or call today to make an appointment for service you can trust.</p>
				<button class="button button--primary--white ga-event"
					type="button"
					data-toggle="modal"
					data-target="#orderPartsModal"
					data-modal-id="orderPartsModal"
					data-modal-template-part="<?php echo esc_attr( wp_json_encode( $order_parts_template_part ) ); ?>"
					data-ga-cat="Genuine car Parts"
					data-ga-action="Click"
					data-ga-label="Order Parts Button">Order Parts</button>
				<a class="button button--secondary--transparent" href="/car-service-specials">View Specials</a>
			</div>
		</div>
	</div>

	<div class="service__copy-center">
		<h2 class="service__copy-center__headline">Parts Overview</h2>
		<div class="service__copy-center__content">
			<p>Genuine car Parts offer the style, comfort, quality and satisfaction that make driving a car even more rewarding. Designed and guaranteed to fit your car peectly inside and out, they are the only parts built to the same quality standards as your car and are backed by our long-term warranty.*</p>
			<p class="disclaimer">*car's genuine new or remanufactured parts (other than battery) and accessories purchased from or installed by a car dealer are covered under the Replacement Parts and Accessories Warranty. This includes car Accessories installed by a car dealer prior to the retail delivery of a new car vehicle. A car dealer will repair or replace any properly installed car part or accessory found to be defective in material or workmanship during the Replacement Parts and Accessories Warranty or the remainder of the warranty coverage applied by car to the component. Please refer to your Warranty Information booklet or check with your car Dealer for details.</p>
		</div>
	</div>

	<div class="service__fifty-fifty service__fifty-fifty--right">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-parts-genuine-vs-aftermarket.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-parts-genuine-vs-aftermarket.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-parts-genuine-vs-aftermarket.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">Choosing Genuine car Parts VS. Aftermarket Parts</h2>
			<p>Genuine car Parts and Genuine car Body Parts provide unsurpassed quality, fit, finish, appearance, corrosion resistance, safety and warranty coverage. They are crafted from the same blueprints as the original parts, made to fit your car model peectly and guaranteed to peorm with the same quality and wear as on the first day your drove your car. They are the only parts specifically covered by the car warranty. Request Genuine car Parts and Genuine car Body Parts to ensure your vehicle receives the best treatment.</p>
			<button class="button button--primary--black ga-event"
				type="button"
				data-toggle="modal"
				data-target="#orderPartsModal"
				data-modal-id="orderPartsModal"
				data-modal-template-part="<?php echo esc_attr( wp_json_encode( $order_parts_template_part ) ); ?>"
				data-ga-cat="Genuine car Parts"
				data-ga-action="Click"
				data-ga-label="Order Parts Button">Order Parts</button>
		</div>
	</div>

	<div class="service__icon-links__container">
		<h2 class="service__icon-links__headline">All Service Offerings And Specials</h2>
		<div class="service__icon-links">
			<a href="/routine-maintenance" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-routine-maintenance.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-routine-maintenance.jpg.webp' ); ?>">
					<img loading="lazy"
					decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-routine-maintenance.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Routine Maintenance
			</a>
			<a href="/car-tires" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.jpg.webp' ); ?>">
					<img loading="lazy"
					decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Tire Service
			</a>
			<!-- <a href="/genuine-car-premium-oil" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.jpg.webp' ); ?>">
					<img loading="lazy"
					decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				car Premium Oil
			</a> -->
			<a href="/car-courtesy-vehicles" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-courtesy-vehicles.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-courtesy-vehicles.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-courtesy-vehicles.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				car Courtesy Vehicles
			</a>
			<a href="/car-service-specials" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-service-specials.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-service-specials.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-service-specials.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				car Service Specials
			</a>
			<a href="/genuine-car-parts" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-parts.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-parts.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-parts.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Genuine car Parts
			</a>
			<a href="/genuine-car-accessories" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-accessories.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-accessories.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-accessories.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Genuine car Accessories
			</a>
			<a href="/genuine-car-replacement-batteries" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Genuine car Batteries
			</a>
			<a href="/genuine-car-brakes" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Genuine car Brakes
			</a>
			<a href="/genuine-car-air-filters" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-air-filters.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-air-filters.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-air-filters.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Air Filters
			</a>
			<a href="/parts-department-specials" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-parts-specials.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-parts-specials.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-parts-specials.jpg' ); ?>" width="120" height="120" alt="">
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
					<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-schedule-service.jpg' ); ?>" width="100" height="100" alt="">
				</picture>Schedule Service Today
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
