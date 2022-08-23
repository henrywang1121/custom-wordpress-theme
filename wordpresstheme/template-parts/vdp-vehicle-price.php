<?php
/**
 * The template for displaying VDP Vehicle Price.
 *
 * @package Custom_Theme
 */

$vehicle_id        = get_the_ID();
$vin               = get_field( 'vin' );
$condition         = get_field( 'condition' );
$model_year        = get_field( 'year' );
$make              = get_field( 'make' );
$model             = get_field( 'model' );
$hide_price        = get_field( 'hide_price' );
$in_transit        = get_field( 'in_transit' );
$installed_options = get_field( 'installed_options' );

$sale_price = 0;
if ( ! $hide_price ) {
	$sale_price       = (int) get_field( 'sale_price' );
	$price_adjustment = (int) get_field( 'price_adjustment' );
}
$price       = 0;
$sales_phone = get_field( 'sales_telephone_number', 'option' );

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

?>
<div class="vdp__vehicle__price">
	<div class="vdp__vehicle__price__math">
		<?php if ( 'New' === $condition ) : ?>
			<?php

			// New.

			// MSRP.
			$msrp = 0;
			if ( ! $hide_price ) {
				$msrp = (int) get_field( 'msrp' );
			}

			// Price.
			if ( $sale_price ) {
				$price = $sale_price;
			} elseif ( $msrp ) {
				$price = $msrp;
			}

			$factory_rebate        = (int) get_field( 'factory_rebate' );
			$today                 = current_time( 'Ymd' );
			$factory_rebate_starts = get_field( 'factory_rebate_starts' );
			$factory_rebate_ends   = get_field( 'factory_rebate_ends' );
			if ( ! empty( $factory_rebate ) && ! empty( $factory_rebate_starts ) && ! empty( $factory_rebate_ends ) && $factory_rebate_starts <= $today && $factory_rebate_ends >= $today ) {
				// Factory Rebate.
				$price_adjustment -= $factory_rebate;
			}

			?>

			<!--Force Call for Pricing by default-->
			<?php //$price = false; ?>

			<?php if ( $price ) : ?>
				<?php if ( $msrp || $price_adjustment || $installed_options ) : ?>
					<div class="vdp__vehicle__price__math_rows">
						<?php if ( $msrp ) : ?>
							<div class="vdp__vehicle__price__math__row">
								<span>MSRP</span>
								<span>$<?php echo esc_html( custom_pretty_prices( $msrp ) ); ?></span>
							</div>
						<?php endif; ?>
						<?php if ( $price_adjustment ) : ?>
							<div class="vdp__vehicle__price__math__row">
								<span><?php echo esc_html( $price_adjustment < 0 ? 'Discounts' : 'Market Adjustment' ); ?></span>
								<span><?php echo esc_html( $price_adjustment < 0 ? '-' : '' ); ?> $<?php echo esc_html( custom_pretty_prices( absint( $price_adjustment ) ) ); ?></span>
							</div>
						<?php endif; ?>
						<?php if ( $installed_options ) : ?>
							<div class="vdp__vehicle__price__math__row">
								<span>Dealer Installed Options</span>
								<span>$<?php echo esc_html( custom_pretty_prices( absint( $installed_options ) ) ); ?></span>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<div class="vdp__vehicle__price__math__sale-price">
					<span>Price</span>
					<span class="vdp__vehicle__price__math__sale-price__price">$<?php echo esc_html( custom_pretty_prices( $price ) ); ?></span>
				</div>
			<?php else : ?>
				<div class="vdp__vehicle__price__math__sale-price">
					<span>Call</span>
					<span class="vdp__vehicle__price__math__sale-price__price">
						<?php

						$new_sales_phone = get_field( 'new_sales_telephone_number', 'option' );
						if ( $new_sales_phone ) {
							$sales_phone = $new_sales_phone;
						}

						?>
						<a class="telephone-number ga-event"
							data-sd-department="Sales"
							href="tel:<?php echo esc_attr( $sales_phone ); ?>"
							data-ga-cat="vdp"
							data-ga-action="Click to Call"
							data-ga-label="<?php echo esc_attr( $ga_label ); ?> Call for Price Sales Telephone Link"><?php echo esc_html( $sales_phone ); ?></a>
					</span>
				</div>
			<?php endif; ?>
		<?php else : ?>
			<?php

			// Used.

			?>
			<?php if ( $sale_price ) : ?>
				<div class="vdp__vehicle__price__math__sale-price">
					<span>Price</span>
					<span class="vdp__vehicle__price__math__sale-price__price">$<?php echo esc_html( custom_pretty_prices( $sale_price ) ); ?></span>
				</div>
			<?php else : ?>
				<div class="vdp__vehicle__price__math__sale-price">
					<span>Call</span>
					<span class="vdp__vehicle__price__math__sale-price__price">
						<?php

						$used_sales_phone = get_field( 'used_sales_telephone_number', 'option' );
						if ( $used_sales_phone ) {
							$sales_phone = $used_sales_phone;
						}

						?>
						<a class="telephone-number ga-event"
							data-sd-department="Sales"
							href="tel:<?php echo esc_attr( $sales_phone ); ?>"
							data-ga-cat="vdp"
							data-ga-action="Click to Call"
							data-ga-label="<?php echo esc_attr( $ga_label ); ?> Call for Price Sales Telephone Link"><?php echo esc_html( $sales_phone ); ?></a>
					</span>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<?php

	$check_availability_template_part = array(
		'template-parts/form',
		'sales',
		array(
			'id'    => $vehicle_id,
			'title' => 'Check Availability',
		),
	);

	$reserve_now_template_part = array(
		'template-parts/form',
		'sales',
		array(
			'id'    => $vehicle_id,
			'title' => 'Reserve Now',
		),
	);

	?>
	<div class="vdp__vehicle__price__cta">
		<button class="button button--secondary--white ga-event"
			type="button"
			data-toggle="modal"
			data-target="#checkAvailabilityModal"
			data-modal-id="checkAvailabilityModal"
			data-modal-template-part="<?php echo esc_attr( wp_json_encode( $check_availability_template_part ) ); ?>"
			data-ga-cat="VDP"
			data-ga-action="Click"
			data-ga-label="<?php echo esc_attr( $ga_label . ' Check Availability Button' ); ?>">Check Availability</button>
		<button class="button button--secondary--white ga-event"
			type="button"
			data-toggle="modal"
			data-target="#reserveNowModal"
			data-modal-id="reserveNowModal"
			data-modal-template-part="<?php echo esc_attr( wp_json_encode( $reserve_now_template_part ) ); ?>"
			data-ga-cat="VDP"
			data-ga-action="Click"
			data-ga-label="<?php echo esc_attr( $ga_label . ' Reserve Now Button' ); ?>">Reserve Now</button>
		<a class="button button--primary--black"
			href="<?php echo esc_url( 'https://express.customtheme.com/express/' . $vin ); ?>"
			data-ga-cat="VDP"
			data-ga-action="Click"
			data-ga-label="<?php echo esc_attr( $ga_label ); ?> See Payment Options Button">See Payment Options</a>
		<a class="button button--primary--black"
			href="<?php echo esc_url( 'https://express.customtheme.com/express/' . $vin ); ?>"
			data-ga-cat="VDP"
			data-ga-action="Click"
			data-ga-label="<?php echo esc_attr( $ga_label ); ?> Start Buying Process Button">Start Buying Process</a>
	</div>
</div>
<?php
