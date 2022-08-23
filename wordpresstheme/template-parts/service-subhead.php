<?php
/**
 * The template for displaying the car Service Subhead section.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom_Theme
 */

$service_phone = get_field( 'service_telephone_number', 'option' );

?>
<div class="breadcrumb-search__container">
	<div class="breadcrumb-search">
		<div class="breadcrumb-search__content">
			<h1 class="breadcrumb-search__title">Service</h1>
		</div>
		<div class="breadcrumb-search__cta">
			<div class="breadcrumb-search__phone">
				Questions? <a href="<?php echo esc_url( 'tel:' . $service_phone ); ?>" data-sd-department="Service"><?php echo esc_html( $service_phone ); ?></a>
			</div>
		</div>
	</div>
</div>

<div class="service__sub-nav__container">
	<nav class="service__sub-nav">
		<ul>
			<li <?php echo ( is_page( 'schedule-service' ) ? 'class="active" aria-current="page"' : '' ); ?>>
				<button type="button"
					data-toggle="modal"
					data-target="#scheduleServiceModal"
					data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
					data-ga-action="Click"
					data-ga-label="Schedule Service Link">Schedule Service</button>
			</li>
			<?php if ( is_page( 'car-service-specials' ) ) : ?>
				<li><a href="/parts-department-specials">Parts Specials</a></li>
			<?php else : ?>
				<li><a href="/car-service-specials">Service Specials</a></li>
			<?php endif; ?>
			<li <?php echo ( is_page( 'car-tires' ) ? 'class="active" aria-current="page"' : '' ); ?>><a href="/car-tires">Tires</a></li>
			<li <?php echo ( is_page( 'genuine-car-brakes' ) ? 'class="active" aria-current="page"' : '' ); ?>><a href="/genuine-car-brakes">Brakes</a></li>
			<li <?php echo ( is_page( 'genuine-car-replacement-batteries' ) ? 'class="active" aria-current="page"' : '' ); ?>><a href="/genuine-car-replacement-batteries">Batteries</a></li>
			<!-- <li <?php echo ( is_page( 'genuine-car-premium-oil' ) ? 'class="active" aria-current="page"' : '' ); ?>><a href="/genuine-car-premium-oil">Oil Change</a></li> -->
		</ul>
	</nav>
</div>
