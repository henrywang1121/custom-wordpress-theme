<?php
/**
 * The template for displaying a single special.
 *
 * @package Custom_Theme
 */

$offer_ends   = get_field( 'offer_ends' );
$offer_starts = get_field( 'offer_starts' );
$today        = current_time( 'Ymd' );

?>
<?php if ( ( empty( $offer_ends ) || $offer_ends >= $today ) && ( empty( $offer_starts ) || $offer_starts <= $today ) ) : ?>
	<?php

	$model_name           = get_field( 'model_name' );
	$model_year           = get_field( 'year' );
	$trim_name            = get_field( 'trim_name' );
	$image_url            = get_field( 'image_url' );
	$purchase_description = get_field( 'purchase_description' );
	$purchase_disclaimer  = get_field( 'purchase_disclaimer' );
	$lease_header         = get_field( 'lease_header' );
	$purchase_header      = get_field( 'purchase_header' );
	$offer_id             = get_field( 'offer_id' );
	$offer_name           = get_field( 'offer_name' );

	?>
	<div class="special special--special-offer"
		data-sd-offer-id="<?php echo esc_attr( $offer_id ); ?>"
		data-sd-offer-name="<?php echo esc_attr( $offer_name ); ?>">
		<div class="special__content">
			<?php if ( ! empty( $trim_name ) ) : ?>
				<?php if ( is_singular( 'special_offer' ) ) : ?>
					<h1 class="special__title"><div class="special__tagline"><?php echo esc_html( $model_name ); ?> </div> <?php echo esc_html( $trim_name ); ?></h1>
				<?php else : ?>
					<h2 class="special__title"><div class="special__tagline"><?php echo esc_html( $model_name ); ?> </div> <?php echo esc_html( $trim_name ); ?></h2>
				<?php endif; ?>
			<?php else : ?>
				<?php if ( is_singular( 'special_offer' ) ) : ?>
					<h1 class="special__title"><div class="special__tagline"><?php echo esc_html( $model_year ); ?> </div> <?php echo esc_html( trim( str_replace( $model_year, '', $model_name ) ) ); ?></h1>
				<?php else : ?>
					<h2 class="special__title"><div class="special__tagline"><?php echo esc_html( $model_year ); ?> </div> <?php echo esc_html( trim( str_replace( $model_year, '', $model_name ) ) ); ?></h2>
				<?php endif; ?>
			<?php endif; ?>
			<div class="special__photo">
				<?php if ( ! empty( $image_url ) ) : ?>
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( $image_url ); ?>"
						alt="<?php echo esc_attr( get_field( 'image_alt' ) ); ?>">
				<?php endif; ?>
			</div>
			<?php if ( has_term( 'lease-offers', 'special_offer_category' ) ) : ?>
				<div class="special__category">Lease</div>
			<?php elseif ( has_term( 'purchase-offers', 'special_offer_category' ) ) : ?>
				<div class="special__category">Finance</div>
			<?php endif; ?>
			<div class="special__offer">
				<?php if ( has_term( 'lease-offers', 'special_offer_category' ) ) : ?>
					<?php echo esc_html( $lease_header ); ?>
				<?php elseif ( has_term( 'purchase-offers', 'special_offer_category' ) ) : ?>
					<?php echo esc_html( $purchase_header ); ?>
				<?php endif; ?>
			</div>

			<div class="special__description show">
				<?php if ( has_term( 'lease-offers', 'special_offer_category' ) ) : ?>
					<p><?php echo wp_kses( get_field( 'lease_detail' ), array( 'br' => array(), 'span' => array() ) ); ?></p>
				<?php elseif ( has_term( 'purchase-offers', 'special_offer_category' ) ) : ?>
					<p><?php echo esc_html( trim( str_replace( $purchase_header, '', get_field( 'purchase_description' ) ) ) ); ?></p>
				<?php endif; ?>
				<p class="special__disclaimer disclaimer">
					<?php

					if ( has_term( 'lease-offers', 'special_offer_category' ) ) {
						echo wp_kses(
							get_field( 'dealer_disclaimer' ),
							array(
								'a'  => array(
									'href'   => array(),
									'rel'    => array(),
									'target' => array(),
								),
								'br' => array(),
							)
						);
					} elseif ( has_term( 'purchase-offers', 'special_offer_category' ) ) {
						echo esc_html( get_field( 'purchase_disclaimer' ) );
					}
					if ( $offer_ends ) {
						$offer_ends = date_create_from_format( 'Ymd', $offer_ends );
						echo esc_html( ' Expires ' . $offer_ends->format( 'm/d/y' ) . '.' );
					}

					?>
				</p>
				<?php if ( ! is_singular( 'special_offer' ) ) : ?>
					<button class="special__view-offer" type="button"><span class="hide">View Offer</span><span class="show">Close</span> <svg class="hide" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg><svg class="show" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg></button>
				<?php endif; ?>
			</div>
		</div>
		<div class="special__ctas">
			<?php

			$carline_code = get_field( 'carline_code' );

			switch ( $carline_code ) {
				case 'C30':
					$model = 'CX-30';
					break;
				case 'CX5':
					$model = 'CX-5';
					break;
				case 'CX9':
					$model = 'CX-9';
					break;
				case 'MX5':
					$model = 'MX-5 Miata';
					break;
				case 'MXR':
					$model = 'MX-5 Miata RF';
					break;
				case 'M30':
					$model = 'MX-30';
					break;
				case 'M3H':
					$model = 'car3 Hatchback';
					break;
				case 'M3S':
					$model = 'car3 Sedan';
					break;
				case 'M6G':
					$model = 'car6';
					break;
				default:
					$model = '';
			}

			$make_model = $model;
			if ( stripos( $model, 'car' ) === false ) {
				$make_model = 'car ' . $model;
			}

			?>
			<a href="<?php echo esc_url( '/inventory?inventory=new-cars&model=' . $model ); ?>" class="button button--print button--primary--black">View <?php echo esc_html( $make_model ); ?> Inventory</a>
		</div>
	</div>
<?php else : ?>
	<?php

	// Set post_status to draft.
	wp_update_post(
		array(
			'ID'          => get_the_ID(),
			'post_status' => 'draft',
		),
		true
	);

	?>
<?php endif; ?>
<?php
