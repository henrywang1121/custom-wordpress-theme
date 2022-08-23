<?php
/**
 * The template for displaying the car Tires page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom_Theme
 */

get_header();

get_template_part( 'template-parts/service', 'subhead' );

$dealership_name = get_bloginfo( 'name' );
$dealership_city = get_field( 'dealership_city', 'option' );

?>
<div class="service">
	<div class="service__hero">
		<div class="service__hero__content">
			<div class="service__hero__copy">
				<div class="service__hero__headline">
					<h1 class="widow-fix">The Right Tires Makes A Difference</h1>
				</div>
				<p>Original equipment tires available from <?php echo esc_html( $dealership_name ); ?> keep your vehicle performing at its best.</p>
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
		<h2 class="service__copy-center__headline">Inspect Your Tires At Least Once A Month</h2>
		<div class="service__copy-center__content">
			<p>Ride quality and performance depend largely on your tires, and not all tires are created equally. Every original equipment tire has been rated by car to be the best available for your specific model and driving needs. Whether you need all-season or all-terrain tires, your car Dealer will find the right tires for you.</p>
		</div>
		<a href="https://www.thecartirecenter.com/" class="button button--primary--black" target="_blank">Shop Tires</a>
	</div>

	<div class="service__fifty-fifty service__fifty-fifty--right service__fifty-fifty--gray">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-know-your-tires.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-know-your-tires.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-know-your-tires.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">Know Your Tires</h2>
			<p>Either you or your car technician should inspect them for damage, uneven wear and tire pressure.</p>
			<button class="button button--primary--black"
				type="button"
				data-toggle="modal"
				data-target="#scheduleServiceModal"
				data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
				data-ga-action="Click"
				data-ga-label="Schedule Inspection Button">Schedule Inspection</button>
		</div>
	</div>
	<div class="service__fifty-fifty service__fifty-fifty--left service__fifty-fifty--gray">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-rotate-your-tires.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-rotate-your-tires.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-rotate-your-tires.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">Rotate Your Tires</h2>
			<p>This will ensure even tread wear and help them last longer.</p>
			<button class="button button--primary--black"
				type="button"
				data-toggle="modal"
				data-target="#scheduleServiceModal"
				data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
				data-ga-action="Click"
				data-ga-label="Schedule Tire Rotation Button">Schedule Tire Rotation</button>
		</div>
	</div>
	<div class="service__fifty-fifty service__fifty-fifty--right service__fifty-fifty--gray">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-inspect-your-tires.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-inspect-your-tires.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-inspect-your-tires.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">Inspect Your Tires</h2>
			<p>The benefits of tire maintenance go beyond a smooth, safe drive – it will help reduce wear and tear on suspension parts, and extend the life of your vehicle.</p>
			<a class="link" href="https://www.thecartirecenter.com/" target="_blank">Learn More</a>
		</div>
	</div>

	<div class="service__copy-center">
		<h2 class="service__copy-center__headline">Check Your Tread Wear</h2>
		<div class="service__copy-center__content">
			<p>The tread on your tires can tell you more than how many miles you&rsquo;ve logged. Worn tires should be replaced when the tires&rsquo; tread-wear bar meets the tread. Have your tires inspected regularly and do not drive on a damaged tire or wheel. Visit your authorized car Dealer for a Full Circle Service inspection to check the wear of your tires for your safety and to maintain your vehicle&rsquo;s best performance.</p>
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-check-your-tread-wear.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-check-your-tread-wear.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-check-your-tread-wear.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
			<p>Driving on bald or worn-out tires can make driving unsafe on <?php echo esc_html( $dealership_city ); ?> roads, so it&rsquo;s important to be mindful of the depth of your tire treads. Rather than having to deal with changing a flat tire, take preventative measures and learn how to monitor tire tread depth courtesy of <?php echo esc_html( $dealership_name ); ?>! Please refer to your tire warranty guide for additional information.</p>
		</div>
	</div>

	<div class="service__fifty-fifty service__fifty-fifty--right service__fifty-fifty--gray">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-the-penny-test.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-the-penny-test.png.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-the-penny-test.png' ); ?>" width="1536" height="910" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">The Penny Test</h2>
			<p>Tread depth is measured in 32nds of an inch. Tread depth on new tires typically measures 10/32 inches or 11/32 inches (about a third of an inch), while trucks, SUVs, or winter tires may have deeper treads. When tires reach 2/32 inches, the U.S. Department of Transportation recommends replacing them.</p>
			<p>To check whether you&rsquo;ve hit the 2/32-inch mark, use the penny test as follows:</p>
			<ul>
				<li>Place a penny in a tire tread groove with Lincoln&rsquo;s head face first in the groove.</li>
				<li>Check if Lincoln&rsquo;s face on the penny disappears between the grooves.</li>
				<li>If it does, your tread is still above 2/32 inches. If you can see all of Lincoln&rsquo;s face, it&rsquo;s time to replace your tire.</li>
				<li>Make sure to repeat with all tires and in various places on each tire.</li>
			</ul>
			<p>There are a few other ways for drivers in <?php echo esc_html( $dealership_city ); ?> to check tire tread depth, including using a tread depth gauge and tread wear indicator bars.</p>
			<p>Learn more about how to give your car tire treads a longer life is by maintaining recommended tire pressure, or connect with the Service Department at <?php echo esc_html( $dealership_name ); ?> for any and all tire service! Learn why to choose our service department while our staff can also help confirm if your battery is dying and give you more maintenance tips&mdash;like how to check your transmission fluid&mdash;before you get back on the road.</p>
		</div>
	</div>

	<div class="service__fullsize service__fullsize--need-tire-service">
		<div class="service__fullsize__background lazy-background"></div>
		<div class="service__fullsize__content">
			<div class="service__fullsize__tagline">Need Tire Service?</div>
			<h2 class="service__fullsize__headline">Contact <?php echo esc_html( $dealership_name ); ?> Today</h2>
			<div class="service__fullsize__body">
				<p>Delaying tire service can result in damage to your tires and suspension. Let our service team at <?php echo esc_html( $dealership_name ); ?> provide the best possible service for your car.</p>
				<button class="button button--primary--black"
					type="button"
					data-toggle="modal"
					data-target="#scheduleServiceModal"
					data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
					data-ga-action="Click"
					data-ga-label="Schedule Inspection Button">Schedule Inspection</button>
			</div>
		</div>
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
