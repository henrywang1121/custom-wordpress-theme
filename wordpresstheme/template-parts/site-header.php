<?php
/**
 * The Site Header for our theme.
 *
 * @package Custom_Theme
 */

?>
<header class="site-header" role="banner">
	<div class="site-header__inner">
		<div class="site-header__branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="site-header__branding__car">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/car-logo.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/car-logo.png.webp' ); ?>">
						<img loading="eager"
							decoding="auto"
							src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/car-logo.png' ); ?>"
							width="86"
							height="74"
							alt="car">
					</picture>
				</div>
				<img loading="eager"
					class="site-header__branding__dealership"
					src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/dealership-logo.svg' ); ?>"
					width="230"
					height="40"
					alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				<img loading="lazy"
					class="site-header__branding__dealership--print"
					src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/dealership-logo-print.svg' ); ?>"
					width="230"
					height="40"
					alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			</a>
		</div>
		<nav class="site-header__navigation" role="navigation">
			<div class="site-header__navigation__contact">
				<?php

				$sales_phone    = get_field( 'sales_telephone_number', 'option' );
				$service_phone  = get_field( 'service_telephone_number', 'option' );
				$directions_url = get_field( 'footer_map_link_url', 'option' );
				$street_address = get_field( 'dealership_street_address', 'option' );
				$city           = get_field( 'dealership_city', 'option' );
				$state          = get_field( 'dealership_state', 'option' );
				$zip_code       = get_field( 'dealership_zip_code', 'option' );

				?>
				<a class="ga-event"
					href="<?php echo esc_url( 'tel:' . $sales_phone ); ?>"
					data-ga-cat="Header"
					data-ga-action="Click to Call"
					data-ga-label="General Sales Telephone Link"
					data-sd-department="Sales">Sales: <?php echo esc_html( $sales_phone ); ?></a>
				<a class="ga-event"
					href="<?php echo esc_url( 'tel:' . $service_phone ); ?>"
					data-ga-cat="Header"
					data-ga-action="Click to Call"
					data-ga-label="Service Telephone Link"
					data-sd-department="Sales">Service: <?php echo esc_html( $service_phone ); ?></a>
				<a class="ga-event"
					href="<?php echo esc_url( $directions_url ); ?>"
					target="_blank"
					data-ga-cat="Header"
					data-ga-action="Click"
					data-ga-label="Header Directions Link"><?php echo esc_html( $street_address . ' ' . $city . ', ' . $state . ' ' . $zip_code ); ?> <svg enable-background="new 0 0 32 32" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.2 11.8c0 2.1-.5 4.2-1.6 6.1-.6 1.5-1.7 3.2-3.2 5.1l-5.4 7-5.4-7c-1.5-2.1-2.6-3.8-3.2-5.1-1.1-1.9-1.6-3.8-1.6-5.8s.5-3.7 1.4-5.3 2.2-2.8 3.7-3.8 3.2-1.4 5.1-1.4 3.6.5 5.1 1.4 2.7 2.2 3.7 3.8c1 1.7 1.4 3.3 1.4 5zm-2.2 0c0-1.3-.4-2.5-1.1-3.7-.8-1.1-1.7-2.1-2.9-2.8s-2.5-1.1-4-1.1-2.8.4-4 1.1-2.1 1.7-2.7 2.9-1 2.5-1 4 .3 2.9 1 4.3c.6 1.4 1.7 3 3.2 5l3.5 4.8 3.5-4.8c1.5-1.9 2.6-3.6 3.4-5s1.1-3 1.1-4.7zm-4.8-.9c0 1.1-.3 1.9-1 2.4s-1.4.8-2.2.8c-.9 0-1.6-.3-2.2-.8s-1-1.3-1-2.2c0-1 .3-1.8 1-2.4s1.4-1 2.2-1c.9 0 1.6.3 2.2 1s1 1.3 1 2.2z"/></svg></a>
			</div>
			<div id="site-header__navigation__backdrop"></div>
			<button id="site-header__navigation__toggle" type="button">
				<span id="site-header__navigation__toggle__text">Menu</span> <span class="site-header__navigation__toggle__icon">
					<svg class="site-header__navigation__toggle__icon--navigation-hamburger" enable-background="new 0 0 32 32" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m3.9 20.9h24.3v3.6h-24.3zm0-7.3h24.3v3.6h-24.3zm0-7.3h24.3v3.7h-24.3z"/></svg>
					<svg class="site-header__navigation__toggle__icon--close" enable-background="new 0 0 32 32" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m18.5 16 9.6 9.6-2.7 2.3-9.6-9.6-9.6 9.6-2.3-2.3 9.6-9.6-9.6-9.7 2.3-2.7 9.6 9.6 9.6-9.6 2.7 2.7z"/></svg>
				</span>
			</button>
			<div class="site-header__navigation__menu">
				<?php

				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'depth'          => 2,
						'container'      => '',
						'link_after'     => '<svg height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m4.8 11.2 1.92-1.6 9.28 9.28 9.6-9.28 1.6 1.6-11.2 11.2z"/></svg>',
					)
				);

				?>
			</div>
		</nav>
	</div>
	<?php get_template_part( 'template-parts/header', 'vehicle-dropdown' ); ?>
</header>
<?php
