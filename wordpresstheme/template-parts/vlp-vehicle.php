<?php
/**
 * The template for displaying new and used vehicle inventory and search results.
 *
 * @package Custom_Theme
 */

$vehicle_id         = get_the_ID();
$vehicle_title      = custom_get_vehicle_title( $vehicle_id );
$condition          = get_field( 'condition' );
$model_year         = get_field( 'year' );
$make               = get_field( 'make' );
$model              = get_field( 'model' );
$trim               = get_field( 'trim' );
$ext_color          = get_field( 'ext_color' );
$int_color          = get_field( 'int_color' );
$ext_color_hex      = get_field( 'ext_color_hex' );
$int_color_hex      = get_field( 'int_color_hex' );
$body_style         = get_field( 'body_style' );
$generic_body_style = get_field( 'generic_body_style' );
$transmission_type  = get_field( 'transmission_type' );
$drivetrain_type    = get_field( 'drivetrain_type' );
$stock_number       = get_field( 'stock_number' );
$miles              = get_field( 'miles' );
$images             = get_attached_media( 'image' );
$placeholder        = get_field( 'vehicle_image_placeholder', 'option' );

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
<div <?php post_class( 'vlp__vehicle' ); ?>
	id="post-<?php echo absint( $vehicle_id ); ?>"
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
	data-miles="<?php echo esc_attr( $miles ); ?>">

	<div class="vlp__vehicle__photo">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php

			$image_id = 0;
			if ( ! empty( $images ) ) {
				$image         = current( $images );
				$images_source = get_field( 'images_source' );
				if ( count( $images ) > 5 && get_field( 'exclude_brand_overlay_vehicle_images', 'option' ) && ( 'vauto' === $images_source || 'promotionpix' === $images_source ) ) {

					// Use second image.
					$image = next( $images );
				}
				if ( ! empty( $image->ID ) ) {
					echo wp_get_attachment_image( $image->ID, 'x_large', false, array( 'alt' => $vehicle_title ) );
				}
			} elseif ( ! empty( $placeholder['ID'] ) ) {
				echo wp_get_attachment_image( $placeholder['ID'], 'x_large' );
			}

			?>
		</a>
	</div>

	<div class="vlp__vehicle__title">
		<div class="vlp__vehicle__title__heading">
			<?php if ( has_term( custom_NEW_VEHICLES_SLUG, custom_TAXONOMY ) ) : ?>
				<div class="vlp__vehicle__title__condition">New</div>
			<?php elseif ( has_term( custom_CPO_VEHICLES_SLUG, custom_TAXONOMY ) ) : ?>
				<div class="vlp__vehicle__title__condition">car Certified Pre-Owned</div>
			<?php endif; ?>
			<h1><?php echo $vehicle_title; ?></h1>
		</div>
		<?php if ( $ext_color_hex ) : ?>
			<div class="vlp__vehicle__color" style="<?php echo esc_attr( 'background-color: #' . $ext_color_hex . ';' ); ?>"><span class="visually-hidden">Exterior Color: <?php echo esc_html( $ext_color ); ?></span></div>
		<?php endif; ?>
	</div>

	<div class="vlp__vehicle__content">
		<?php if ( 'New' === $condition && get_field( 'in_transit' ) ) : ?>
			<div class="vlp__vehicle__in-transit">
				<span>Location:</span> <span><button type="button" class="tooltip__button tooltip__button--inTransitButton" data-tooltip="<?php echo esc_attr( $vehicle_id ); ?>"><span aria-hidden="true">i</span><span class="visually-hidden">More Information</span></button> In Transit</span>
			</div>
		<?php endif; ?>

		<div class="vlp__vehicle__details">
			<?php if ( $stock_number ) : ?>
				<div class="vlp__vehicle__details__item">
					<span>Stock:</span> <span><?php echo esc_html( $stock_number ); ?></span>
				</div>
			<?php endif; ?>
			<?php if ( $ext_color ) : ?>
				<div class="vlp__vehicle__details__item">
					<span>Exterior Color:</span> <span><?php echo esc_html( $ext_color ); ?></span>
				</div>
			<?php endif; ?>
			<?php if ( $int_color ) : ?>
				<div class="vlp__vehicle__details__item">
					<span>Interior Color:</span> <span><?php echo esc_html( $int_color ); ?></span>
				</div>
			<?php endif; ?>
			<?php if ( $transmission_type ) : ?>
				<div class="vlp__vehicle__details__item">
					<span>Transmission:</span> <span><?php echo esc_html( $transmission_type ); ?></span>
				</div>
			<?php endif; ?>
			<?php if ( 'Used' === $condition && $miles ) : ?>
				<div class="vlp__vehicle__details__item">
					<span>Miles:</span> <span><?php echo esc_html( number_format( $miles ) ); ?></span>
				</div>
			<?php endif; ?>
			</div>
	</div>

	<?php get_template_part( 'template-parts/vlp', 'vehicle-price' ); ?>

</div>
<?php
