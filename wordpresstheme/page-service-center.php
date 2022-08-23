<?php
/**
 * The template for displaying the car Service Center page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom_Theme
 */

get_header();

get_template_part( 'template-parts/service', 'subhead' );

?>
<div class="service">
	<div class="service__hero">
		<div class="service__hero__content">
			<div class="service__hero__copy">
				<div class="service__hero__headline">
					<span>Experience Service You Can Trust</span>
					<h1 class="widow-fix">Genuine car Service Center in <?php echo esc_html( get_field( 'dealership_city', 'option' ) ); ?></h1>
				</div>
				<p>We&rsquo;re car professionals, and we care more about what&rsquo;s best for car vehicles than any other
					service center. We use only Genuine car Parts and Value Products by car, so you&rsquo;ll know the parts
					will perform properly.</p>
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

	<div class="service__fullsize service__fullsize--perfection-in-every-detail">
		<div class="service__fullsize__background lazy-background"></div>
		<div class="service__fullsize__content">
			<div class="service__fullsize__tagline">car Full Circle Inspection</div>
			<h2 class="service__fullsize__headline">Perfection In Every Detail</h2>
			<div class="service__fullsize__body">
				<p>Your car-trained technicians are perfectionists. We know your car better than anyone else, and
					we&rsquo;re meticulous about its care. So rely only on car for a Full Circle Inspection and report card,
					Genuine car Parts, and the most convenient service experience possible.</p>
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

	<div class="service__icon-links__container">
		<h2 class="service__icon-links__headline">All Service Offerings And Specials</h2>
		<div class="service__icon-links">
			<a href="/routine-maintenance" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-routine-maintenance.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-routine-maintenance.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-routine-maintenance.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Routine Maintenance
			</a>
			<a href="/car-tires" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-tires.jpg' ); ?>" width="120" height="120" alt="">
				</picture>
				Tire Service
			</a>
			<!-- <a href="/genuine-car-premium-oil" class="icon-link">
				<picture>
					<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.avif' ); ?>">
					<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.jpg.webp' ); ?>">
					<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/service-icon-premium-oil.jpg' ); ?>" width="120" height="120" alt="">
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
				</picture>
				Schedule Service Today
			</button>
		</div>
	</div>

	<div class="service__fifty-fifty service__fifty-fifty--right">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-service-center-saturdays.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-service-center-saturdays.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/car-service-center-saturdays.jpg' ); ?>" width="1440" height="921" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">Now Open Saturdays</h2>
			<p>Your life is hectic enough. We want to make it easy for you to depend on expert car service, technology and
				parts for your vehicle. Click or call today to schedule your convenient service appointment.</p>
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
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-service-center-schedule-your-service.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-service-center-schedule-your-service.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/car-service-center-schedule-your-service.jpg' ); ?>" width="1440" height="921" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">car Appointment Scheduler</h2>
			<p>Experience a more convenient way to schedule your service. Visit our website to make your next appointment,
				receive automatic confirmations and view appointment history for any service schedule online.</p>
			<button class="button button--primary--black"
				type="button"
				data-toggle="modal"
				data-target="#scheduleServiceModal"
				data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
				data-ga-action="Click"
				data-ga-label="Make Your Appointment Button">Make Your Appointment</button>
		</div>
	</div>
	<div class="service__fifty-fifty service__fifty-fifty--right">
		<div class="service__fifty-fifty__photo">
			<picture>
				<source type="image/avif" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-service-center-your-car-gets-better.avif' ); ?>">
				<source type="image/webp" srcset="<?php echo esc_url( get_template_directory_uri() . '/images/car-service-center-your-car-gets-better.jpg.webp' ); ?>">
				<img loading="lazy" decoding="async" src="<?php echo esc_url( get_template_directory_uri() . '/images/car-service-center-your-car-gets-better.jpg' ); ?>" width="1440" height="1100" alt="">
			</picture>
		</div>
		<div class="service__fifty-fifty__content">
			<h2 class="service__fifty-fifty__headline">Your car Gets Better With Time</h2>
			<p>We&rsquo;re here to make sure you continue to get the best out of your car for years to come, so we encourage
				you to take advantage of Mycar. It makes keeping track of your car&rsquo;s service and maintenance more
				convenient than ever. Stay up to date with a factory maintenance schedule, service history log, service coupons,
				interactive guides to your vehicle&rsquo;s features and more. Simply visit Mycar.com and enjoy the full
				benefits of owning a car.</p>
			<a class="link" href="https://mycar.com/Mycar/welcome.action" target="_blank">Learn More</a>
		</div>
	</div>

	<div class="service__fullsize service__fullsize--my-car-app">
		<div class="service__fullsize__background lazy-background"></div>
		<div class="service__fullsize__content">
			<div class="service__fullsize__tagline">Mycar App</div>
			<h2 class="service__fullsize__headline">Manage Your car From The Palm Of Your Hand.</h2>
			<div class="service__fullsize__body">
				<p>The Mycar App<sup>1</sup> makes your car experience simpler and more convenient than ever. Calibrated to
					your vehicle&rsquo;s mileage, Mycar shows your car&rsquo;s maintenance schedule and remembers its service
					history at car Dealers for easy reference.</p>
				<p>Mycar also helps you save with coupons about service offers exclusively for car owners. And with the app,
					you&rsquo;ll have the contact information of your service dealer and the nearest car Dealers right at your
					fingertips, making it fast and easy to schedule a service appointment.</p>
				<p>An easy-to-use, interactive guide and quick video demos will help walk you through your vehicle&rsquo;s
					features, such as the instrument panel, navigation, entertainment system and more.</p>
				<h3>Features:</h3>
				<ul>
					<li>For New Offers, Promotions and Service Coupons</li>
					<li>Service History Information</li>
					<li>Maintenance Schedules</li>
					<li>Locate a Dealer and Schedule Service Online</li>
					<li>Vehicle &ldquo;How To&rdquor; Information & Videos</li>
					<li>Scan VIN Barcode Capability When Registering a Vehicle</li>
					<li>Easy-to-Use car Roadside Assistance</li>
					<li>Alerts for Recall Information</li>
					<li>Full Circle Service Inspection Results</li>
					<li>Bluetooth&reg;2 and car CONNECT&trade;3 support</li>
				</ul>
				<a class="button button--primary--black" href="https://apps.apple.com/us/app/mycar/id451886367" target="_blank">Download for
					iOS</a>
				<a class="button button--secondary--white" href="https://play.google.com/store/apps/details?id=com.interrait.mycar&hl=en_US&gl=US" target="_blank">Download for
					Android</a>
				<p class="disclaimer"><sup>1</sup>App available on iPhone&reg;, iPad&reg; and iPod touch&reg; devices with iOS
					4.3 or later and Android&trade; devices with Android 1.1 – 4.4. iPhone, iPad and iPod touch are registered
					trademarks of Apple, Inc. Android is a trademark of Google Inc.</p>
			</div>
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
