<?php
/**
 * The template for displaying the Genuine car Air Filters page.
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
					<h1 class="widow-fix">Breathe Easy In Your car</h1>
				</div>
				<p>Genuine car air filters from <?php echo esc_html( $dealership_name ); ?> keep dust, allergens, and contaminants out of your cabin and engine.</p>
			</div>
			<div class="service__hero__ctas">
				<p>Click or call today to make an appointment for service you can trust.</p>
				<button class="button button--primary--white"
					type="button"
					data-toggle="modal"
					data-target="#scheduleServiceModal"
					data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
					data-ga-action="Click"
					data-ga-label="Schedule Filter Service Button">Schedule Filter Service</button>
				<a class="button button--secondary--transparent" href="/car-service-specials">View Specials</a>
			</div>
		</div>
	</div>

	<div class="service__copy-center">
		<h2 class="service__copy-center__headline">Air Filter Overview</h2>
		<div class="service__copy-center__content">
			<p>There&rsquo;s no better time than now to replace your cabin air filter. Allergy season can be extremely tough on some, and this maintenance can make all the difference in your breathability inside your vehicle. To learn more, contact us at <?php echo esc_html( $dealership_name ); ?> today.</p>
		</div>
	</div>

	<div class="service__fifty-fifty service__fifty-fifty--right">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-air-filters-you-deserve-fresh-air.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-air-filters-you-deserve-fresh-air.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-air-filters-you-deserve-fresh-air.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">You Deserve Fresh Air</h2>
			<p>Many people may not be aware that you even need to replace your cabin air filter. Failing to do so can result in a number of issues: it affects the quality of air that you inhale in the vehicle, as it&rsquo;s the main gateway through which air enters the cabin. Delaying the interval between filter replacements allows contaminants and allergens into the cabin. Additionally, lack of routine air filter replacements can also contribute to decreased efficiency and increased emissions, as your vehicle requires more energy to force air through a dirty filter. To help prevent such issues, bring your vehicle in for an air filter replacement here at <?php echo esc_html( $dealership_name ); ?>.</p>
			<button class="button button--primary--black"
				type="button"
				data-toggle="modal"
				data-target="#scheduleServiceModal"
				data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
				data-ga-action="Click"
				data-ga-label="Schedule Brake Service Button">Schedule Filter Service</button>
		</div>
	</div>
	<div class="service__fifty-fifty service__fifty-fifty--left">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-air-filters-your-car-needs-clean-air.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-air-filters-your-car-needs-clean-air.jpg.webp' ); ?>">
				<img loading="lazy"
					decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/genuine-car-air-filters-your-car-needs-clean-air.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">Your car Needs Clean Air</h2>
			<p>Your car&rsquo;s engine needs air to be scrubbed of dirty and contaminants before entering the combustion system. Delaying engine air filter replacement can significantly degrade engine peormance and efficiency. A dirty engine air filter starves your engine of oxygen it needs for effective combustion. In addition to reducing peormance, a dirty engine air filter reduces efficiency by degrading even idle combustion force and dirtying combustion cylinders, deteriorating your engine&rsquo;s effectiveness while forcing it to have to work harder to force air through the intake system.</p>
			<button class="button button--primary--black"
				type="button"
				data-toggle="modal"
				data-target="#scheduleServiceModal"
				data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
				data-ga-action="Click"
				data-ga-label="Schedule Filter Service Button">Schedule Filter Service</button>
		</div>
	</div>

	<div class="service__fullsize service__fullsize--need-air-filter">
		<div class="service__fullsize__background lazy-background"></div>
		<div class="service__fullsize__content">
			<div class="service__fullsize__tagline">Need An Air Filter?</div>
			<h2 class="service__fullsize__headline">Contact <?php echo esc_html( $dealership_name ); ?> Today</h2>
			<div class="service__fullsize__body">
				<p>Delaying air filter service can affect your health and result in damage to your engine. Let our service team at <?php echo esc_html( $dealership_name ); ?> provide the best possible service for your car.</p>
				<button class="button button--primary--black"
					type="button"
					data-toggle="modal"
					data-target="#scheduleServiceModal"
					data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
					data-ga-action="Click"
					data-ga-label="Schedule Filter Service Button">Schedule Filter Service</button>
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
