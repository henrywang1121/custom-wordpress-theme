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
					<h1 class="widow-fix">Give Your car The Perfect Fit</h1>
				</div>
				<p>Genuine car Accessories from <?php echo esc_html( $dealership_name ); ?> keep your vehicle performing at its best.</p>
			</div>
			<div class="service__hero__ctas">
				<p>Click or call today to make an appointment for service you can trust.</p>
				<button class="button button--primary--white ga-event"
					type="button"
					data-toggle="modal"
					data-target="#orderPartsModal"
					data-modal-id="orderPartsModal"
					data-modal-template-part="<?php echo esc_attr( wp_json_encode( $order_parts_template_part ) ); ?>"
					data-ga-cat="Genuine car Accessories"
					data-ga-action="Click"
					data-ga-label="Shop Accessories Button">Shop Accessories</button>
				<a class="button button--secondary--transparent" href="/car-service-specials">View Specials</a>
			</div>
		</div>
	</div>

	<div class="service__copy-center">
		<h2 class="service__copy-center__headline">Accessories Overview</h2>
		<div class="service__copy-center__content">
			<p>Genuine car Accessories offer the style, comfort, quality and satisfaction that make driving a car even more rewarding. Designed and guaranteed to fit your car perfectly inside and out, they are the only accessories built to the same quality standards as your car and are backed by our long-term warranty.*</p>
			<p class="disclaimer">*car's genuine new or remanufactured parts (other than battery) and accessories purchased from or installed by a car dealer are covered under the Replacement Parts and Accessories Warranty. This includes car Accessories installed by a car dealer prior to the retail delivery of a new car vehicle. A car dealer will repair or replace any properly installed car part or accessory found to be defective in material or workmanship during the Replacement Parts and Accessories Warranty or the remainder of the warranty coverage applied by car to the component. Please refer to your Warranty Information booklet or check with your car Dealer for details.</p>
		</div>
	</div>

	<div class="service__fifty-fifty service__fifty-fifty--right">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-accessories-interior.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-accessories-interior.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async"
					src="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-accessories-interior.jpg' ); ?>"
					width="1440"
					height="1100"
					alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">Interior Accessories</h2>
			<p>Your car is a part of your life, so make your vehicle&rsquo;s interior personal. Find accessories that best suit your lifestyle, like cargo nets and covers that help secure your gear, all-weather floor mats and durable cargo trays for protection from the elements, a Roadside Assistance Kit for those just-in-case moments and more.</p>
			<button class="button button--primary--black ga-event"
				type="button"
				data-toggle="modal"
				data-target="#orderPartsModal"
				data-modal-id="orderPartsModal"
				data-modal-template-part="<?php echo esc_attr( wp_json_encode( $order_parts_template_part ) ); ?>"
				data-ga-cat="Genuine car Accessories"
				data-ga-action="Click"
				data-ga-label="Shop Interior Accessories Button">Shop Interior Accessories</button>
		</div>
	</div>
	<div class="service__fifty-fifty service__fifty-fifty--left">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-accessories-exterior.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-accessories-exterior.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async"
					src="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-accessories-exterior.jpg' ); ?>"
					width="1440"
					height="1100"
					alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">Exterior Accessories</h2>
			<p>Enhance your car with purposeful and stylish exterior accessories. Find options such as weather-resistant car covers that can protect your finish, accent trims for shine and style and roof racks that help secure your gear.</p>
			<button class="button button--primary--black ga-event"
				type="button"
				data-toggle="modal"
				data-target="#orderPartsModal"
				data-modal-id="orderPartsModal"
				data-modal-template-part="<?php echo esc_attr( wp_json_encode( $order_parts_template_part ) ); ?>"
				data-ga-cat="Genuine car Accessories"
				data-ga-action="Click"
				data-ga-label="Shop Exterior Accessories Button">Shop Exterior Accessories</button>
		</div>
	</div>
	<div class="service__fifty-fifty service__fifty-fifty--right">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-accessories-shop-genuine-car-accessories.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-accessories-shop-genuine-car-accessories.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async"
					src="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-accessories-shop-genuine-car-accessories.jpg' ); ?>"
					width="1440"
					height="1100"
					alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">Shop Genuine car Accessories</h2>
			<p>It&rsquo;s time to get personal. Customize your car inside and out.</p>
			<button class="button button--primary--black ga-event"
				type="button"
				data-toggle="modal"
				data-target="#orderPartsModal"
				data-modal-id="orderPartsModal"
				data-modal-template-part="<?php echo esc_attr( wp_json_encode( $order_parts_template_part ) ); ?>"
				data-ga-cat="Genuine car Accessories"
				data-ga-action="Click"
				data-ga-label="Shop All Accessories Button">Shop All Accessories</button>
		</div>
	</div>

	<div class="service__fullsize service__fullsize--need-accessories">
		<div class="service__fullsize__background lazy-background"></div>
		<div class="service__fullsize__content">
			<div class="service__fullsize__tagline">Need Accessories?</div>
			<h2 class="service__fullsize__headline">Contact <?php echo esc_html( $dealership_name ); ?> Today</h2>
			<div class="service__fullsize__body">
				<p>Genuine car Accessories fit right, work right and look good. They're built to the same standards of quality as your vehicle, and they're the only accessories backed by car.</p>
				<button class="button button--primary--black ga-event"
				type="button"
				data-toggle="modal"
				data-target="#orderPartsModal"
				data-modal-id="orderPartsModal"
				data-modal-template-part="<?php echo esc_attr( wp_json_encode( $order_parts_template_part ) ); ?>"
				data-ga-cat="Genuine car Accessories"
				data-ga-action="Click"
				data-ga-label="Shop Accessories Button">Shop Accessories</button>
			</div>
		</div>
	</div>

	<div class="service__touts">
		<a href="/car-tires" class="tout">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async"
					src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.jpg' ); ?>"
					width="120"
					height="120"
					alt="">
			</picture>
			Tire Service
		</a>
		<!-- <a href="/genuine-car-premium-oil" class="tout">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async"
					src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.jpg' ); ?>"
					width="120"
					height="120"
					alt="">
			</picture>
			Oil Change
		</a> -->
		<a href="/genuine-car-replacement-batteries" class="tout">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async"
					src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-batteries.jpg' ); ?>"
					width="120"
					height="120"
					alt="">
			</picture>
			Battery Service
		</a>
		<a href="/genuine-car-brakes" class="tout">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async"
					src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-brakes.jpg' ); ?>"
					width="120"
					height="120"
					alt="">
			</picture>
			Brake Service
		</a>
	</div>
	<div class="site-disclaimer">
		<?php get_template_part( 'template-parts/disclaimer', 'prop-65' ); ?>
	</div>
</div>
<?php

get_footer();
