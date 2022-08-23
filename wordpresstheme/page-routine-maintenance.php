<?php
/**
 * The template for displaying the car Routine Maintenance page.
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
					<h1 class="widow-fix">Maintenance From Your car Dealer</h1>
				</div>
				<p>Routine maintenance from <?php echo esc_html( $dealership_name ); ?> keeps your vehicle performing at its&nbsp;best.</p>
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
				<a class="button button--secondary--transparent" href="/car-service-specials">View Specials</a>
			</div>
		</div>
	</div>

	<div class="service__copy-center">
		<h2 class="service__copy-center__headline">Routine Maintenance From <?php echo esc_html( $dealership_name ); ?></h2>
		<div class="service__copy-center__content">
			<p>The service team at your car Dealer has been factory-trained to provide you with exceptional service and ensure your vehicle is performing at its best. car Full Circle Service dealerships use Genuine car Parts and equipment to make sure your car receives the finest care possible.</p>
		</div>
	</div>

	<div class="service__fifty-fifty service__fifty-fifty--right">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-know-your-tires.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-know-your-tires.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-know-your-tires.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">Schedule Service</h2>
			<p>Schedule a service appointment for your vehicle. Find your nearest service dealer to schedule an appointment.</p>
			<button class="button button--primary--black"
				type="button"
				data-toggle="modal"
				data-target="#scheduleServiceModal"
				data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
				data-ga-action="Click"
				data-ga-label="Schedule Service Button">Schedule Service</button>
		</div>
	</div>
	<div class="service__fifty-fifty service__fifty-fifty--left">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/routine-maintenance-extended-confidence.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/routine-maintenance-extended-confidence.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/routine-maintenance-extended-confidence.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">car Extended Confidence</h2>
			<p>Enjoy peace of mind and years of driving pleasure, even after your vehicle warranty has expired. car Extended Confidence covers nearly all the same parts and components covered under your New-Vehicle Limited Warranty, is accepted nationwide and utilizes only Genuine car Parts (where available).</p>
			<!-- <a class="link" href="#">Learn More</a> -->
		</div>
	</div>
	<div class="service__fifty-fifty service__fifty-fifty--right">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/routine-maintenance-we-value-your-time.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/routine-maintenance-we-value-your-time.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/routine-maintenance-we-value-your-time.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">We Value Your Time</h2>
			<p>At <?php echo esc_html( $dealership_name ); ?>, you can always expect quick and timely service that merges speed and quality to offer you even greater value and convenience. Whether you drive a car3, car CX-5, or any other model, you can rely on our team to take care of you and ensure your service is fast and convenient. Our precision service system expedites the maintenance process, providing a seamless experience that allows you and your vehicle to get back on the road as quickly as possible.</p>
			<button class="button button--primary--black"
				type="button"
				data-toggle="modal"
				data-target="#scheduleServiceModal"
				data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
				data-ga-action="Click"
				data-ga-label="Schedule Service Button">Schedule Service</button>
		</div>
	</div>
	<div class="service__fifty-fifty service__fifty-fifty--left">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/routine-maintenance-car-full-circle-service.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/routine-maintenance-car-full-circle-service.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/routine-maintenance-car-full-circle-service.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">car Full Circle Service</h2>
			<p>car Full Circle Service is a comprehensive, no-surprises approach to maintaining your car. Every time you visit the service department of a car Full Circle Service dealership you will receive a complimentary Full Circle Service Inspection and Report Card, detailing anything on your car that may need attention – now or in the future. All car Full Circle Service dealerships are staffed by car service professionals and use Genuine car Parts and equipment designed specifically for your vehicle.</p>
			<button class="button button--primary--black"
				type="button"
				data-toggle="modal"
				data-target="#scheduleServiceModal"
				data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
				data-ga-action="Click"
				data-ga-label="Schedule Service Button">Schedule Service</button>
		</div>
	</div>
	<div class="service__fifty-fifty service__fifty-fifty--right">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-inspect-your-tires.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-inspect-your-tires.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-inspect-your-tires.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">Pre-Paid Maintenance</h2>
			<p>Save up to 25 percent over the total life of your vehicle&rsquo;s service plan with a comprehensive car Pre-Paid Maintenance plan.</p>
			<a class="link" href="https://www.carfinancialservices.com/us/en/vehicle-protection/prepaid-maintenance-plans.html" target="_blank">Learn More</a>
		</div>
	</div>
	<div class="service__fifty-fifty service__fifty-fifty--left">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-rotate-your-tires.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-rotate-your-tires.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/car-tires-rotate-your-tires.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">car Warranty</h2>
			<p>Every new car comes with limited warranty that provides coverage in the unlikely event a repair is needed in the first years of ownership.</p>
			<a class="link" href="https://www.carusa.com/owners/warranty" target="_blank">Learn More</a>
		</div>
	</div>

	<div class="service__fullsize service__fullsize--need-maintenance">
		<div class="service__fullsize__background lazy-background"></div>
		<div class="service__fullsize__content">
			<div class="service__fullsize__tagline">Need Maintenance?</div>
			<h2 class="service__fullsize__headline">Contact <?php echo esc_html( $dealership_name ); ?> Today</h2>
			<div class="service__fullsize__body">
				<p>Delaying routine maintenance can result in damage to your vehicle. Let our service team at <?php echo esc_html( $dealership_name ); ?> provide the best possible service for your car.</p>
				<button class="button button--primary--black"
					type="button"
					data-toggle="modal"
					data-target="#scheduleServiceModal"
					data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
					data-ga-action="Click"
					data-ga-label="Schedule Maintenance Button">Schedule Maintenance</button>
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
