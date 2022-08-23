<?php
/**
 * The template for displaying a single special.
 *
 * @package Custom_Theme
 */

$special_ends   = get_field( 'special_ends' );
$special_starts = get_field( 'special_starts' );
$today          = current_time( 'Ymd' );

?>
<?php if ( 'publish' === get_post_status() && ( empty( $special_ends ) || $special_ends >= $today ) && ( empty( $special_starts ) || $special_starts <= $today ) ) : ?>
	<?php

	$special_tagline     = get_field( 'special_tagline' );
	$special_photo       = get_field( 'special_photo' );
	$special_offer       = get_field( 'special_offer' );
	$special_description = get_field( 'special_description' );
	$special_disclaimer  = get_field( 'special_disclaimer' );

	?>
	<div class="special special--service-special">
		<?php if ( is_singular( 'service_special' ) ) : ?>
			<h1 class="special__title"><div class="special__tagline"><?php echo esc_html( $special_tagline ); ?> </div> <?php the_title(); ?></h1>
		<?php else : ?>
			<h2 class="special__title"><div class="special__tagline"><?php echo esc_html( $special_tagline ); ?> </div> <?php the_title(); ?></h2>
		<?php endif; ?>
		<div class="special__photo">
			<?php if ( ! empty( $special_photo['ID'] ) ) : ?>
				<?php

				echo wp_get_attachment_image(
					$special_photo['ID'],
					'xx_large',
					false,
					array(
						'sizes' => '(max-width: 767px) 690px, (max-width: 991px) 441px, 368px',
					)
				);

				?>
			<?php endif; ?>
		</div>
		<?php if ( has_term( 'service-specials', 'service_special_category' ) ) : ?>
			<div class="special__category">Service</div>
		<?php elseif ( has_term( 'parts-specials', 'service_special_category' ) ) : ?>
			<div class="special__category">Parts</div>
		<?php elseif ( has_term( 'accessories-specials', 'service_special_category' ) ) : ?>
			<div class="special__category">Accessories</div>
		<?php endif; ?>
		<div class="special__offer">
			<?php

			if ( $special_offer ) {
				echo esc_html( $special_offer );
			}

			?>
		</div>

		<div class="special__description show">
			<?php

			if ( $special_description ) {
				echo $special_description;
			}

			?>
			<p class="special__disclaimer disclaimer">
				<?php

				if ( $special_disclaimer ) {
					echo $special_disclaimer . ' ';
				}
				if ( $special_ends ) {
					$special_ends = date_create_from_format( 'Ymd', $special_ends );
					echo esc_html( 'Expires ' . $special_ends->format( 'm/d/y' ) . '.' );
				}

				?>
			</p>
			<?php if ( ! is_singular( 'service_special' ) ) : ?>
				<button class="special__view-offer" type="button"><span class="hide">View Offer</span><span class="show">Close</span> <svg class="hide" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg><svg class="show" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg></button>
			<?php endif; ?>
		</div>
		<div class="special__ctas">
			<button class="button button--secondary--white"
				type="button"
				data-toggle="modal"
				data-target="#scheduleServiceModal"
				data-modal-id="scheduleServiceModal"
				data_modal_template_part="<?php //echo esc_attr( wp_json_encode( array( 'template-parts/iframe', 'schedule-service' ) ) ); ?>"
				data-ga-cat="<?php echo esc_attr( get_the_title() ); ?>"
				data-ga-action="Click"
				data-ga-label="Schedule Service Button">Schedule Service</button>
			<?php if ( is_singular( 'service_special' ) ) : ?>
				<button onclick="window.print()" type="button" class="button button--print button--primary--black">Print</button>
			<?php else : ?>
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="button button--primary--black">Print Coupon</a>
			<?php endif; ?>
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

?>
<?php
