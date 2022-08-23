<?php
/**
 * The template for displaying all single vehicle posts.
 *
 * @package Custom_Theme
 */

get_header();
get_template_part( 'template-parts/breadcrumb', 'search' );

$vehicle_id         = get_the_ID();
$vin                = get_field( 'vin' );
$msrp               = 0;
$sale_price         = 0;
$condition          = get_field( 'condition' );
$model_year         = get_field( 'year' );
$make               = get_field( 'make' );
$model              = get_field( 'model' );
$trim               = get_field( 'trim' );
$body_style         = get_field( 'body_style' );
$generic_body_style = get_field( 'generic_body_style' );
$transmission_type  = get_field( 'transmission_type' );
$drivetrain_type    = get_field( 'drivetrain_type' );
$stock_number       = get_field( 'stock_number' );
$miles              = get_field( 'miles' );
$ext_color          = get_field( 'ext_color' );
$int_color          = get_field( 'int_color' );
$engine             = get_field( 'engine_desc' );
$city_mpg           = get_field( 'city_mpg' );
$highway_mpg        = get_field( 'highway_mpg' );
$horsepower         = '';
$displayed_price    = '';
$description        = get_field( 'description' );
$images             = get_attached_media( 'image' );
$placeholder        = get_field( 'vehicle_image_placeholder', 'option' );
$in_transit         = get_field( 'in_transit' );

if ( get_field( 'msrp' ) ) {
	$msrp            = (int) get_field( 'msrp' );
	$displayed_price = $msrp;
}
if ( ! get_field( 'hide_price' ) && get_field( 'sale_price' ) ) {
	$sale_price      = (int) get_field( 'sale_price' );
	$displayed_price = $sale_price;
}

$factory_rebate_disclaimer = '';
$factory_rebate_ends_date  = '';
if ( has_term( custom_NEW_VEHICLES_SLUG, custom_TAXONOMY ) ) {
	$today                 = (int) current_time( 'Ymd' );
	$factory_rebate        = (int) get_field( 'factory_rebate' );
	$factory_rebate_starts = (int) get_field( 'factory_rebate_starts' );
	$factory_rebate_ends   = (int) get_field( 'factory_rebate_ends' );
	if ( ! empty( $factory_rebate ) && ! empty( $factory_rebate_starts ) && ! empty( $factory_rebate_ends ) && $factory_rebate_starts <= $today && $factory_rebate_ends >= $today ) {
		$factory_rebate_disclaimer = get_field( 'factory_rebate_disclaimer' );
		$factory_rebate_ends_date  = date_create_from_format( 'Ymd', $factory_rebate_ends );
		if ( $sale_price ) {
			$displayed_price = $sale_price - $factory_rebate;
		} elseif ( $msrp ) {
			$displayed_price = $msrp - $factory_rebate;
		}
	}
}

$ga_label = array();
if ( ! empty( $condition ) ) {
	$ga_label[] = $condition;
}
if ( ! empty( $model_year ) ) {
	$ga_label[] = $model_year;
}
if ( ! empty( $make ) ) {
	$ga_label[] = $make;
}
if ( ! empty( $model ) ) {
	$ga_label[] = $model;
}
$ga_label = implode( ' ', $ga_label );

global $post;
$term_id        = 0;
$term_ancestors = get_the_terms( $post, custom_TAXONOMY );
if ( $term_ancestors ) {
	$terms  = array();
	$parent = false;
	foreach ( $term_ancestors as $tax_term ) {
		if ( false === $parent || $tax_term->term_id === $parent ) {
			$terms[] = $tax_term->term_id;
		}
		$parent = $tax_term->parent;
	}
	if ( ! empty( $terms ) ) {
		$term_id = $terms[0];
	}
}

?>
<main>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<div <?php post_class( 'vdp' ); ?>
			id="post-<?php absint( $vehicle_id ); ?>"
			data-id="<?php echo esc_attr( $vehicle_id ); ?>"
			data-condition="<?php echo esc_attr( $condition ); ?>"
			data-year="<?php echo esc_attr( $model_year ); ?>"
			data-make="<?php echo esc_attr( $make ); ?>"
			data-model="<?php echo esc_attr( $model ); ?>"
			data-trim="<?php echo esc_attr( $trim ); ?>"
			data-body-style="<?php echo esc_attr( $body_style ); ?>"
			data-generic-body-style="<?php echo esc_attr( $generic_body_style ); ?>"
			data-transmission-type="<?php echo esc_attr( $transmission_type ); ?>"
			data-drivetrain-type="<?php echo esc_attr( $drivetrain_type ); ?>"
			data-stock-number="<?php echo esc_attr( $stock_number ); ?>"
			data-miles="<?php echo esc_attr( $miles ); ?>"
			data-ext-color="<?php echo esc_attr( $ext_color ); ?>"
			data-engine="<?php echo esc_attr( $engine ); ?>"
			data-vin="<?php echo esc_attr( $vin ); ?>"
			data-msrp="<?php echo esc_attr( $msrp ); ?>"
			data-displayed-price="<?php echo esc_attr( $displayed_price ); ?>">
			<div class="vdp__columns">
				<div class="vdp__photos">
					<?php if ( ! empty( $images ) ) : ?>
						<div class="vdp__photos__carousel">
							<?php

							$index = 0;
							$size  = 'x_large';

							?>
							<?php foreach ( $images as $image ) : ?>
								<?php if ( ! empty( $image->ID ) ) : ?>
									<?php if ( 0 === $index ) : ?>
										<?php

										echo wp_get_attachment_image(
											$image->ID,
											$size,
											false,
											array(
												'class'    => 'vdp__photos__carousel__cell',
												'data-index' => $index,
												'sizes'    => '(max-width: 767px) 100vw, (max-width: 850px) 384px, (max-width: 1050px) 576px, 992px',
												'loading'  => 'eager',
												'decoding' => 'auto',
											),
										);

										?>
									<?php else : ?>
										<?php

										$src = wp_get_attachment_image_src( $image->ID, $size );

										?>
										<img class="vdp__photos__carousel__cell"
											data-flickity-lazyload-src="<?php echo esc_url( $src[0] ); ?>"
											data-flickity-lazyload-srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( $image->ID, $size ) ); ?>"
											sizes="(max-width: 767px) 100vw, 384px"
											width="<?php echo esc_attr( $src[1] ); ?>"
											height="<?php echo esc_attr( $src[2] ); ?>"
											alt="<?php echo esc_attr( get_post_meta( $image->ID, '_wp_attachment_image_alt', true ) ); ?>"
											decoding="async"
											loading="lazy">
									<?php endif; ?>
									<?php

									$index++;

									?>
								<?php endif; ?>
							<?php endforeach; ?>
							<div class="vdp__photos__carousel__pagination">
								<button id="vdpPhotosCarouselPaginationPrev" type="button" class="vdp__photos__carousel__pagination__arrow"><span class="visually-hidden">Left</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M21.311 29L23 27.354 12.2 17 23 6.646 21.311 5 9 17l12.311 12z"/></svg></button>
								<div class="vdp__photos__carousel__pagination__text">
									<span id="vdpPhotosCarouselPaginationCurrent">1</span> / <span class="vdp__photos__carousel__pagination__total"><?php echo esc_html( count( $images ) ); ?></span>
								</div>
								<button id="vdpPhotosCarouselPaginationNext" type="button" class="vdp__photos__carousel__pagination__arrow"><span class="visually-hidden">Right</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M10.689 5L9 6.646 19.8 17 9 27.354 10.689 29 23 17 10.689 5z"/></svg></button>
							</div>
						</div>
						<button type="button" id="vdpPhotosCarouselFullscreenOpen" class="vdp__photos__carousel__fullscreen-open"><svg enable-background="new 0 0 32 32" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m5 27h5.9v-5.9h-5.9zm7.9 0h5.9v-5.9h-5.9zm7.9 0h6.2v-5.9h-6.2zm-15.8-7.9h5.9v-5.9h-5.9zm7.9 0h5.9v-5.9h-5.9zm7.9 0h6.2v-5.9h-6.2zm-15.8-7.9h5.9v-6.2h-5.9zm7.9 0h5.9v-6.2h-5.9zm7.9 0h6.2v-6.2h-6.2z"/></svg> View All</button>
						<button type="button" id="vdpPhotosCarouselFullscreenClose" class="vdp__photos__carousel__fullscreen-close"><span class="visually-hidden">Close</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
							<path d="M17.925 16.904L25 23.979l-2.021 1.684-7.075-7.075-7.075 7.075-1.684-1.684 7.075-7.075-7.075-7.075 1.684-2.021 7.075 7.075 7.075-7.075L25 9.829l-7.075 7.075z" /></svg></button>
					<?php elseif ( ! empty( $placeholder['ID'] ) ) : ?>
						<?php

						echo wp_get_attachment_image(
							$placeholder['ID'],
							'x_large',
							false,
							array(
								'sizes' => '(max-width: 767px) 480px, (max-width: 991px) 260px, (max-width: 1199px) 360px, 535px',
							)
						);

						?>
					<?php endif; ?>
				</div>

				<div class="vdp__content">
					<div class="vdp__title">
						<?php if ( has_term( custom_CPO_VEHICLES_SLUG, custom_TAXONOMY ) ) : ?>
							<span class="vdp__title__cpo">car Certified Pre-Owned</span>
						<?php endif; ?>
						<h1><?php echo custom_get_vehicle_title( $id ); ?></h1>
					</div>

					<?php if ( 'New' === $condition && $in_transit ) : ?>
						<div class="vdp__in-transit">
							<svg enable-background="new 0 0 32 32" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26 13.1c0 2.1-.5 4.1-1.6 6-.6 1.5-1.7 3.2-3.2 5l-5.3 6.9-5.4-6.9c-1.5-2.1-2.6-3.7-3.2-5-1.1-1.9-1.6-3.7-1.6-5.7s.5-3.6 1.4-5.2c.9-1.7 2.2-2.8 3.7-3.8s3.2-1.4 5.1-1.4 3.6.5 5.1 1.4 2.7 2.2 3.7 3.7c.9 1.7 1.3 3.3 1.3 5zm-2.2 0c0-1.3-.4-2.5-1.1-3.6-.8-1.1-1.7-2.1-2.9-2.8s-2.5-1.1-4-1.1-2.8.4-4 1.1-2 1.6-2.6 2.8-1 2.5-1 3.9.3 2.9 1 4.2c.6 1.4 1.7 3 3.2 4.9l3.5 4.7 3.5-4.7c1.5-1.9 2.6-3.5 3.4-4.9s1-2.9 1-4.5zm-4.7-.9c0 1.1-.3 1.9-1 2.4s-1.4.8-2.2.8c-.9 0-1.6-.3-2.2-.8s-1-1.3-1-2.2c0-1 .3-1.8 1-2.4s1.4-1 2.2-1c.9 0 1.6.3 2.2 1s1 1.3 1 2.2z"/></svg> In Transit <button id="inTransitInfoButton" type="button" class="tooltip__button"><span aria-hidden="true">i</span><span class="visually-hidden">More Information</span></button>
							<div id="inTransitInfoTooltip" class="tooltip">The selected vehicle is in transit. Any ETA shown is only an estimate and is subject to change or delay. Please contact us for more information.<div class="tooltip__arrow" data-popper-arrow></div></div>
						</div>
					<?php endif; ?>

					<div class="vdp__stock-vin">
						<span>Stock:</span> <?php echo esc_html( $stock_number ); ?><br>
						<span>VIN:</span> <?php echo esc_html( $vin ); ?>
					</div>

					<?php get_template_part( 'template-parts/vdp', 'vehicle-price' ); ?>

					<?php if ( has_term( custom_NEW_VEHICLES_SLUG, custom_TAXONOMY ) ) : ?>
						<div class="vdp__tools">
							<!-- <a class="vdp__tools__button" href="/more-information/value-your-car/">
								<svg enable-background="new 0 0 32 32" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m5.6 15.9c0-2.7 2.2-5 5-5h10.5l-2.9 2.9 1.9 1.9 6.3-6.2-1.9-1.9-4.5-4.3-1.9 1.9 3.2 3.2h-10.7c-4.2 0-7.6 3.4-7.6 7.5 0 1.7.6 3.3 1.5 4.5l1.9-1.9c-.5-.7-.8-1.6-.8-2.6z"/><path d="m27.4 11.3-1.9 1.8c.5.8.8 1.7.8 2.7 0 2.7-2.2 5-5 5h-10.2l3-3-1.9-1.9-6.3 6.2 1.9 1.9 4.4 4.4 1.9-1.9-3.2-3.2h10.6c4.2 0 7.6-3.4 7.6-7.6-.1-1.5-.7-3.1-1.7-4.4z"/></svg>
								Value<br> a Trade
							</a> -->
							<button class="vdp__tools__button"
								type="button"
								data-toggle="modal"
								data-target="#windowStickerModal">
								<svg enable-background="new 0 0 32 32" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m15.6 25.3h2.6v-5.2h5.2v-2.5h-7.8z"/><path d="m4.8 2v28h14.8l8.5-8.5v-19.5zm20.7 18.4-7 7h-11.2v-22.8h18.1v15.8z"/></svg>
								Window Sticker
							</button>
							<button class="vdp__tools__button"
								type="button"
								data-toggle="modal"
								data-target="#paymentCalculatorModal">
								<svg enable-background="new 0 0 32 32" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m24 2h-16c-1 0-1.8.3-2.4 1s-1 1.4-1 2.4v21.3c0 .9.3 1.7 1 2.4.6.6 1.4.9 2.4.9h16.4c.9 0 1.7-.3 2.2-1 .6-.7.8-1.4.8-2.4v-21.2c0-.9-.3-1.7-1-2.4s-1.4-1-2.4-1zm.9 24.6c0 .4 0 .6-.1.7s-.3.1-.7.1h-16.1c-.4 0-.6 0-.7-.1s-.1-.3-.1-.7v-21.2c0-.4 0-.6.1-.7s.3-.2.7-.2h16.4c.2 0 .4 0 .6.1s.3.3.3.7v21.3zm-15-16.8h11.9v-2.2h-11.9zm1.7 11.8c-.4 0-.7.1-1 .4s-.4.6-.4 1 .1.7.4 1 .6.4 1 .4.7-.1 1-.4.4-.6.4-1-.1-.7-.4-1-.7-.4-1-.4zm4.4 0c-.4 0-.7.1-1 .4s-.4.6-.4 1 .1.7.4 1 .6.4 1 .4.7-.1 1-.4.4-.6.4-1-.1-.7-.4-1-.6-.4-1-.4zm4.4 0c-.4 0-.7.1-1 .4s-.4.6-.4 1 .1.7.4 1 .6.4 1 .4.7-.1 1-.4.4-.6.4-1-.1-.7-.4-1-.6-.4-1-.4zm-8.8-4.8c-.4 0-.7.2-1 .6s-.4.7-.4 1.1.1.7.4 1 .6.4 1 .4.7-.1 1-.4.4-.6.4-1-.1-.7-.4-1.1-.7-.6-1-.6zm4.4 0c-.4 0-.7.2-1 .6s-.4.7-.4 1.1.1.7.4 1 .6.4 1 .4.7-.1 1-.4.4-.6.4-1-.1-.7-.4-1.1-.6-.6-1-.6zm4.4 0c-.4 0-.7.2-1 .6s-.4.7-.4 1.1.1.7.4 1 .6.4 1 .4.7-.1 1-.4.4-.6.4-1-.1-.7-.4-1.1-.6-.6-1-.6zm-8.8-4.4c-.4 0-.7.2-1 .6s-.4.7-.4 1.1.1.7.4 1 .6.4 1 .4.7-.1 1-.4.4-.6.4-1-.1-.7-.4-1.1-.7-.6-1-.6zm4.4 0c-.4 0-.7.2-1 .6s-.4.7-.4 1.1.1.7.4 1 .6.4 1 .4.7-.1 1-.4.4-.6.4-1-.1-.7-.4-1.1c-.3-.5-.6-.6-1-.6zm4.4 0c-.4 0-.7.2-1 .6s-.4.7-.4 1.1.1.7.4 1 .6.4 1 .4.7-.1 1-.4.4-.6.4-1-.1-.7-.4-1.1c-.3-.5-.6-.6-1-.6z"/></svg>
								Payment Calculator
							</button>
						</div>
					<?php endif; ?>

					<div class="vdp__vehicle-details">
						<h2>Vehicle Details</h2>
						<?php if ( $ext_color ) : ?>
							<div class="vdp__vehicle-details__item">
								<span>Exterior Color</span>
								<?php echo esc_html( $ext_color ); ?>
							</div>
						<?php endif; ?>
						<?php if ( $int_color ) : ?>
							<div class="vdp__vehicle-details__item">
								<span>Interior Color</span>
								<?php echo esc_html( $int_color ); ?>
							</div>
						<?php endif; ?>
						<?php if ( $body_style ) : ?>
							<div class="vdp__vehicle-details__item">
								<span>Body Style</span>
								<?php echo esc_html( $body_style ); ?>
							</div>
						<?php endif; ?>
						<?php if ( $drivetrain_type ) : ?>
							<div class="vdp__vehicle-details__item">
								<span>Drive Type</span>
								<?php echo esc_html( $drivetrain_type ); ?>
							</div>
						<?php endif; ?>
						<?php if ( $city_mpg &&  $highway_mpg ) : ?>
							<div class="vdp__vehicle-details__item">
								<span>City/Highway Mileage</span>
								<?php echo esc_html( $city_mpg . '/' . $highway_mpg . ' MPG' ); ?>
							</div>
						<?php endif; ?>
						<?php if ( $horsepower ) : ?>
							<div class="vdp__vehicle-details__item">
								<span>Horsepower</span>
								<?php echo esc_html( $horsepower ); ?>
							</div>
						<?php endif; ?>
						<?php if ( $engine ) : ?>
							<div class="vdp__vehicle-details__item">
								<span>Engine</span>
								<?php echo esc_html( $engine ); ?>
							</div>
						<?php endif; ?>
						<?php if ( $transmission_type ) : ?>
							<div class="vdp__vehicle-details__item">
								<span>Transmission</span>
								<?php echo esc_html( $transmission_type ); ?>
							</div>
						<?php endif; ?>
					</div>

					<!-- <div class="vdp__vehicle-highlights"></div> -->

					<?php get_template_part( 'template-parts/vdp', 'details' ); ?>

					<?php if ( has_term( 'used-vehicles', custom_TAXONOMY ) ) : ?>
						<div class="vdp__history-report">
							<div class="vdp__history-report__heading">
								<h2>History Report</h2>
								<svg xmlns="http://www.w3.org/2000/svg" width="151.4" height="36.3" viewBox="0 0 151.4 36.3"><path d="M145.6 25.6c0 1.2-1 2.2-2.2 2.2H2.8c-1.2 0-2.2-1-2.2-2.2V2.8C.6 1.6 1.6.6 2.8.6h140.6c1.2 0 2.2 1 2.2 2.2v22.8z" fill="#fff"/><path d="M2.8 0C1.2 0 0 1.3 0 2.8v22.8c0 1.5 1.3 2.8 2.8 2.8h140.6c1.6 0 2.8-1.3 2.8-2.8V2.8c0-1.5-1.3-2.8-2.8-2.8H2.8zM1.2 25.6V2.8c0-.9.7-1.6 1.6-1.6h140.6c.9 0 1.6.7 1.6 1.6v22.8c0 .9-.7 1.6-1.6 1.6H2.8c-.9 0-1.6-.7-1.6-1.6z" fill="#231f20"/><path fill="#fff" d="M121.4 2.6h22.1v23.1h-22.1z"/><path d="M121.1 2.3V26h22.7V2.3h-22.7zm22.1.6v22.5h-21.5V2.9h21.5z" fill="#231f20"/><g fill="#231f20"><path d="M26.5 2.6h22.1v23.1H26.5z"/><path d="M26.2 2.3V26h22.7V2.3H26.2zm22 .6v22.5H26.7V2.9h21.5z"/></g><g fill="#231f20"><path d="M50.1 2.6h22.1v23.1H50.1z"/><path d="M49.8 2.3V26h22.7V2.3H49.8zm22.1.6v22.5H50.4V2.9h21.5z"/></g><g fill="#231f20"><path d="M74 2.6h22.1v23.1H74z"/><path d="M73.7 2.3V26h22.7V2.3H73.7zm22 .6v22.5H74.2V2.9h21.5z"/></g><g fill="#231f20"><path d="M97.8 2.6h22.1v23.1H97.8z"/><path d="M97.5 2.3V26h22.7V2.3H97.5zm22 .6v22.5H98V2.9h21.5z"/></g><g fill="#231f20"><path d="M2.7 2.6h22.1v23.1H2.7z"/><path d="M2.4 2.3V26h22.7V2.3H2.4zm22 .6v22.5H2.9V2.9h21.5z"/></g><path d="M14.2 22.5C9.5 22.5 7 19 7 14.3c0-5.1 3-8.2 7.2-8.2 3.9 0 5.4 1.7 6.5 4.7l-4 1.6c-.6-1.5-1.1-2.4-2.6-2.4-1.8 0-2.6 1.8-2.6 4.4 0 2.4.8 4.4 2.7 4.4 1.4 0 2-.7 2.8-2.2l3.7 2c-1 1.9-2.7 3.9-6.5 3.9zm24.7-6.7h-2.6l.3-1c.6-2 .8-2.9 1-4 .2 1.1.5 1.9 1 4l.3 1zm6.7 6.3L39.8 6.2h-4.4L29.7 22h4.7l.9-2.8h4.8L41 22h4.6zm17.8-10.5c0 1.1-.6 1.8-2 1.8h-2.6V9.9h2.6c1.5 0 2 .7 2 1.7zm4.7 10.5l-3.2-6c1.7-.8 2.9-2.3 2.9-4.6 0-3.8-2.5-5.2-6.2-5.2h-7.1v15.8h4.3v-5.3h1.8l2.6 5.3h4.9zm15-12.1v2.2h5v3.7h-5v6.2h-4.4V6.3h12.5V10h-8.1zm26.9 5.9h-2.6l.3-1c.6-2 .8-2.9 1-4 .2 1.1.5 1.9 1 4l.3 1zm6.6 6.3l-5.7-15.8h-4.4l-5.7 15.8h4.7l.9-2.8h4.7l.9 2.8h4.6z" fill="#fff"/><path d="M8.8 36.1l-2.1-5h1.5l1.5 3.8 1.5-3.8h1.4l-2.1 5H8.8zm5.1 0v-5h4.3v1.1h-2.9v.9H18v1h-2.7v1h3v1.1h-4.4v-.1zm5.8-5h1.4V33h2.5v-1.9H25v5h-1.4v-2h-2.5v2h-1.4v-5zm7.2 5v-5h1.4v5h-1.4zm8.3-1.8c0 .6-.2 1.1-.7 1.4-.4.3-1 .5-1.8.5-.9 0-1.6-.2-2.1-.7-.5-.4-.7-1.1-.7-1.9 0-.8.2-1.5.7-1.9.5-.4 1.2-.7 2.2-.7.7 0 1.3.1 1.7.4.4.3.6.7.7 1.3h-1.4c0-.2-.1-.4-.3-.5-.2-.1-.4-.2-.7-.2-.5 0-.8.1-1 .4-.2.3-.3.6-.3 1.2 0 .5.1.9.3 1.2.2.3.5.4 1 .4.3 0 .6-.1.8-.2.2-.1.3-.3.3-.6l1.3-.1zm1.5 1.8v-5h1.4V35h2.6v1.1h-4zm5.4 0v-5h4.3v1.1h-2.9v.9h2.7v1h-2.7v1h3v1.1h-4.4v-.1zm9.9-5h1.4V33h2.5v-1.9h1.4v5h-1.4v-2h-2.5v2H52v-5zm7.2 5v-5h1.4v5h-1.4zm3-1.7h1.4v.1c0 .2.1.4.2.5.2.1.4.2.8.2.3 0 .5 0 .7-.1.1-.1.2-.2.2-.4 0-.3-.3-.4-1-.6-.1 0-.2 0-.3-.1-.7-.1-1.2-.3-1.4-.5-.3-.2-.4-.5-.4-.9 0-.5.2-.9.6-1.2.4-.3 1-.4 1.7-.4s1.3.1 1.6.4c.3.2.5.6.6 1.1h-1.3c0-.2-.1-.3-.2-.4-.1-.1-.4-.1-.6-.1-.3 0-.5 0-.6.1-.4 0-.4.2-.4.3 0 .2.3.4 1 .5.1 0 .2 0 .3.1h.1c.7.1 1.2.3 1.5.5.1.1.2.3.3.4.1.2.1.4.1.6 0 .5-.2.9-.6 1.2-.4.3-1 .4-1.8.4s-1.4-.1-1.8-.4c-.4-.3-.6-.7-.6-1.2l-.1-.1zm7.8 1.7v-3.9h-1.9v-1.1h5.2v1.1h-1.9v3.9H70zm6.2-3.7c.3-.3.6-.4 1.1-.4.5 0 .9.1 1.2.4.3.3.4.7.4 1.3 0 .5-.1.9-.4 1.2-.3.3-.7.4-1.2.4s-.9-.1-1.1-.4c-.3-.3-.4-.7-.4-1.2 0-.6.2-1 .4-1.3zm3.4 3.1c.5-.4.8-1.1.8-1.9 0-.8-.3-1.5-.8-1.9-.5-.4-1.2-.7-2.2-.7-1 0-1.7.2-2.2.7-.5.5-.8 1.1-.8 1.9 0 .8.3 1.5.8 1.9.5.5 1.2.7 2.2.7.9 0 1.7-.2 2.2-.7zm4.6-3.4c.4 0 .7 0 .9.1.1.1.2.2.2.4s-.1.4-.2.5c-.2.1-.4.1-.9.1h-.9V32h.9zm-.8 4v-1.9h.8c.4 0 .7 0 .8.1.1.1.2.3.2.5l.1.7v.1c0 .3.1.4.1.5h1.5c-.1-.3-.2-.7-.2-1.1-.1-.4-.1-.7-.1-.8-.1-.2-.2-.3-.4-.4-.2-.1-.4-.1-.8-.1.5-.1.8-.2 1-.4.2-.2.3-.5.3-.8 0-.2-.1-.4-.2-.6-.1-.2-.3-.3-.5-.4-.2-.1-.3-.1-.5-.2h-3.6v5l1.5-.2zm6.4 0v-1.8l-2.3-3.2h1.7l1.4 2.1 1.3-2.1h1.5l-2.3 3.2v1.8h-1.3zm10.4-4c.4 0 .7 0 .9.1.1.1.2.2.2.4s-.1.4-.2.5c-.2.1-.4.1-.9.1h-.9V32h.9zm-.9 4v-1.9h.8c.4 0 .7 0 .8.1.1.1.2.3.2.5l.1.7v.1c0 .3.1.4.1.5h1.5c-.1-.3-.2-.7-.2-1.1-.1-.4-.1-.7-.1-.8-.1-.2-.2-.3-.4-.4-.2-.1-.4-.1-.8-.1.5-.1.8-.2 1-.4.2-.2.3-.5.3-.8 0-.2-.1-.4-.2-.6-.1-.2-.3-.3-.5-.4-.2-.1-.3-.1-.5-.2h-3.6v5l1.5-.2zm5.1 0v-5h4.3v1.1h-2.9v.9h2.7v1h-2.7v1h3v1.1h-4.4v-.1zm8.1-4c.4 0 .7 0 .8.1.1.1.2.3.2.5s-.1.4-.2.5c-.1.1-.4.1-.8.1h-.9V32l.9.1zm-.9 4v-1.8h.9c.5 0 .9 0 1.1-.1.2 0 .4-.1.6-.2.2-.1.4-.3.5-.5.1-.2.2-.5.2-.8 0-.3-.1-.6-.2-.8-.1-.2-.3-.4-.5-.5-.2-.1-.3-.1-.5-.2-.2 0-.5-.1-.9-.1h-2.6v5h1.4zm6.3-3.7c.3-.3.6-.4 1.1-.4.5 0 .9.1 1.2.4.3.3.4.7.4 1.3 0 .5-.1.9-.4 1.2-.3.3-.7.4-1.2.4s-.9-.1-1.1-.4c-.3-.3-.4-.7-.4-1.2s.2-1 .4-1.3zm3.4 3.1c.5-.4.8-1.1.8-1.9 0-.8-.3-1.5-.8-1.9-.5-.5-1.2-.7-2.2-.7-1 0-1.7.2-2.2.7-.5.5-.8 1.1-.8 1.9 0 .8.3 1.5.8 1.9.5.5 1.2.7 2.2.7.9 0 1.7-.2 2.2-.7zm4.6-3.4c.4 0 .7 0 .9.1.1.1.2.2.2.4s-.1.4-.2.5c-.2.1-.4.1-.9.1h-.9V32h.9zm-.8 4v-1.9h.8c.4 0 .7 0 .8.1.1.1.2.3.2.5l.1.7v.1c0 .3.1.4.1.5h1.5c-.1-.3-.2-.7-.2-1.1-.1-.4-.1-.7-.1-.8-.1-.2-.2-.3-.4-.4-.2-.1-.4-.1-.8-.1.5-.1.8-.2 1-.4.2-.2.3-.5.3-.8 0-.2-.1-.4-.2-.6-.1-.2-.3-.3-.5-.4-.2-.1-.3-.1-.5-.2h-3.6v5l1.5-.2zm6.4 0v-3.9h-1.9v-1.1h5.2v1.1h-1.9v3.9h-1.4zm4.5-1.7h1.4v.1c0 .2.1.4.2.5.2.1.4.2.8.2.3 0 .5 0 .7-.1.2-.1.2-.2.2-.4 0-.3-.3-.4-1-.6-.1 0-.2 0-.3-.1-.7-.1-1.2-.3-1.4-.5-.3-.2-.4-.5-.4-.9 0-.5.2-.9.6-1.2.4-.3 1-.4 1.7-.4s1.3.1 1.6.4c.3.2.5.6.6 1.1h-1.3c0-.2-.1-.3-.2-.4-.1-.1-.4-.1-.6-.1-.3 0-.5 0-.6.1-.2.1-.2.2-.2.3 0 .2.3.4 1 .5.1 0 .2 0 .3.1h.1c.7.1 1.2.3 1.5.5.1.1.2.3.3.4.1.1.1.4.1.6 0 .5-.2.9-.6 1.2-.4.3-1 .4-1.8.4s-1.4-.1-1.8-.4c-.4-.3-.6-.7-.6-1.2l-.3-.1zm-1.3-8.5l-.7-1.1c-.6-1-1.2-2-1.7-2.9-.4.8-1 1.9-1.7 2.9l-.8 1.1h-5.4l5.2-7.2-5.5-7.8h5.6l1 1.5c.6 1 1.3 2 1.7 2.9.4-.8 1.1-1.9 1.7-2.9l1-1.5h5.4l-5.5 7.7 5.1 7.3h-5.4z" fill="#231f20"/><g fill="#231f20"><path d="M151.3 2.2c0 .6-.2 1.1-.6 1.5-.4.4-.9.6-1.5.6s-1.1-.2-1.5-.6c-.4-.4-.6-.9-.6-1.5s.2-1.1.6-1.5c.4-.4.9-.6 1.5-.6s1.1.2 1.5.6c.4.4.6.9.6 1.5zm-.3 0c0-.5-.2-.9-.5-1.3s-.7-.5-1.2-.5-.9.2-1.3.5-.5.8-.5 1.3.2.9.5 1.3.8.5 1.2.5c.5 0 .9-.2 1.2-.5.4-.4.6-.8.6-1.3zm-.6-.5c0 .2-.1.4-.2.6-.2.1-.4.2-.6.2l.8 1h-.5l-.8-1h-.4v1h-.4V.9h1.2c.3 0 .5.1.6.2.2.2.3.3.3.6zm-.4 0c0-.3-.2-.4-.6-.4h-.7v.8h.8c.3 0 .5-.2.5-.4z"/><path d="M147.8.7c-.4.4-.6.9-.6 1.5s.2 1.1.6 1.5c.4.4.9.6 1.5.6s1.1-.2 1.5-.6c.4-.4.6-.9.6-1.5s-.2-1.1-.6-1.5c-.4-.4-.9-.6-1.5-.6s-1.1.2-1.5.6zm0 3c-.4-.4-.6-.9-.6-1.5s.2-1.1.6-1.5c.4-.4.9-.6 1.4-.6.6 0 1 .2 1.4.6.4.4.6.9.6 1.5s-.2 1.1-.6 1.5c-.4.4-.9.6-1.4.6-.5 0-1-.2-1.4-.6z"/><path d="M148 .9c-.3.4-.5.8-.5 1.3s.2.9.5 1.3.8.5 1.3.5.9-.2 1.2-.5c.3-.4.5-.8.5-1.3s-.2-.9-.5-1.3-.8-.5-1.2-.5c-.5 0-1 .2-1.3.5zm0 2.6c-.3-.3-.5-.8-.5-1.2 0-.5.2-.9.5-1.3.3-.3.7-.5 1.2-.5.4 0 .8.2 1.2.5.3.4.5.8.5 1.2 0 .5-.2.9-.5 1.3-.3.3-.7.5-1.2.5-.4 0-.8-.2-1.2-.5z"/><path d="M148.3.9v2.6h.4v-1h.4l.7 1h.6s-.7-.9-.8-1c.2 0 .4-.1.5-.2.2-.1.3-.3.3-.6 0-.2-.1-.4-.2-.5-.2-.1-.4-.2-.7-.2h-1.2V.9zm1.3.1c.3 0 .5.1.6.2.1.1.2.3.2.5s-.1.4-.2.5c-.2.1-.3.2-.5.2h-.1s.7.9.8 1h-.4l-.7-1h-.5v1h-.3V1h1.1z"/><path d="M148.7 1.2v.9h.8c.4 0 .6-.2.6-.5 0-.1-.1-.2-.2-.3-.1-.1-.3-.1-.5-.1h-.7zm.7.1c.2 0 .3 0 .4.1.1.1.1.1.1.3 0 .3-.2.4-.5.4h-.7v-.7c.1-.1.7-.1.7-.1z"/></g><path fill="none" d="M-1.8-2.2H153v40H-1.8z"/></svg>
							</div>
							<a class="button button--secondary--white ga-event"
								data-ga-cat="VDP"
								data-ga-action="Click"
								data-ga-label="CARFAX Vehicle Report Link"
								href="<?php echo esc_url( 'http://www.carfax.com/VehicleHistory/p/Report.cfx?vin=' . $vin ); ?>"
								target="_blank">View History Report</a>
						</div>
					<?php endif; ?>

				</div>

				<?php if ( has_term( custom_CPO_VEHICLES_SLUG, custom_TAXONOMY ) ) : ?>
					<div class="vdp__cpo">
						<h2>car Certified Pre-Owned</h2>
						<p>Only the best-maintained late-model vehicles make the car Certified Pre-Owned (CPO) vehicle cut. To be eligible, they must pass a rigorous 160-point inspection. From major to minor components, each vehicle is scrutinized and tested to make sure it meets the highest standards. So you can feel confident and enjoy every drive in your car with an elevated state of being, mile after mile.</p>
					</div>
				<?php endif; ?>
			</div>

			<div class="vdp__disclaimer">
				<p class="disclaimer">Subject to prior sale, plus government fees and any taxes, any finance charges, any dealer document processing charge, electronic filing charge, and any emission testing charge.</p>

				<p class="disclaimer">All of our vehicles are equipped with an anti-theft device to prevent theft from our inventory. The advertised price for all our vehicles does not include the price of the anti-theft device. This device can be purchased for an additional cost of $995, or may be removed at the customer's option.</p>

				<?php if ( $in_transit ) : ?>
					<p class="disclaimer">In-transit vehicle will arrive within 30 days.</p>
				<?php endif; ?>

				<?php get_template_part( 'template-parts/disclaimer', 'prop-65' ); ?>

				<?php if ( $factory_rebate_disclaimer && $factory_rebate_ends_date ) : ?>
					<p class="disclaimer">*<?php echo esc_html( $factory_rebate_disclaimer ); ?> Expires <?php echo esc_html( date_format( $factory_rebate_ends_date, 'n/j/y' ) ); ?>.</p>
				<?php endif; ?>
			</div>
		</div>

		<?php

		get_template_part(
			'template-parts/modal',
			'',
			array(
				'id'            => 'windowStickerModal',
				'template_part' => array(
					'template-parts/iframe',
					'',
					array(
						'url'    => 'https://www.carusa.com/MusaWeb/displayDealerWindowSticker.action?dealerId=' . car_DEALER_ID . '&vin=' . $vin,
						'title'  => 'Window Sticker',
						'height' => '1250',
					),
				),
			)
		);

		get_template_part(
			'template-parts/modal',
			'',
			array(
				'id'            => 'paymentCalculatorModal',
				'template_part' => array(
					'template-parts/payment-calculator',
					'',
					array(
						'sale_price' => $displayed_price,
					),
				),
			)
		);

		?>
	<?php endwhile; ?>
</main>
<?php

get_footer();
