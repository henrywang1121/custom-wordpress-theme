<?php
/**
 * The template for displaying inventory vehicle comparisons.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom_Theme
 */

$args = wp_parse_args(
	$args,
	array(
		'vehicle_ids' => array(),
	)
);

$placeholder     = get_field( 'vehicle_image_placeholder', 'option' );
$exclude_overlay = get_field( 'exclude_brand_overlay_vehicle_images', 'option' )

?>
<div class="vlp__compare">
	<div class="vlp__compare__header__row">
		<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
			<?php

			$vehicle_title = '';
			if ( has_term( custom_NEW_VEHICLES_SLUG, custom_TAXONOMY, $vehicle_id ) ) {
				$vehicle_title .= 'New';
			} elseif ( has_term( custom_CPO_VEHICLES_SLUG, custom_TAXONOMY, $vehicle_id ) ) {
				$vehicle_title .= 'car Certified Pre-Owned';
			}

			$vehicle_title .= ' ' . custom_get_vehicle_title( $vehicle_id );

			?>
			<div class="vlp__compare__photo">
				<a href="<?php echo esc_url( get_permalink( $vehicle_id ) ); ?>">
					<?php

					$images = get_attached_media( 'image', $vehicle_id );
					if ( ! empty( $images ) ) {
						$image         = current( $images );
						$images_source = get_field( 'images_source', $vehicle_id );
						if ( count( $images ) > 5 && $exclude_overlay && ( 'vauto' === $images_source || 'promotionpix' === $images_source ) ) {

							// Use second image.
							$image = next( $images );
						}
						if ( ! empty( $image->ID ) ) {
							echo wp_get_attachment_image(
								$image->ID,
								'x_large',
								false,
								array(
									'alt' => $vehicle_title,
								),
							);
						}
					} elseif ( ! empty( $placeholder['ID'] ) ) {
						echo wp_get_attachment_image( $placeholder['ID'], 'x_large' );
					}

					?>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="vlp__compare__header__row">
		<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
			<?php

			$vin        = get_field( 'vin', $vehicle_id );
			$condition  = get_field( 'condition', $vehicle_id );
			$model_year = get_field( 'year', $vehicle_id );
			$make       = get_field( 'make', $vehicle_id );
			$model      = get_field( 'model', $vehicle_id );
			$ga_label   = array();
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
			<div class="vlp__compare__title">
				<h2><?php echo esc_html( trim( $vehicle_title ) ); ?></h2>
				<a class="ga-event"
					href="<?php echo esc_url( get_permalink( $vehicle_id ) ); ?>"
					data-ga-cat="VLP"
					data-ga-action="Click"
					data-ga-label="<?php echo esc_attr( $ga_label ); ?> See Details Button">Details</a>
				<a href="<?php echo esc_url( 'https://express.customtheme.com/express/' . $vin ); ?>" target="_blank">Purchase</a>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="vlp__compare__heading">MSRP</div>
	<div class="vlp__compare__row">
		<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
			<div class="vlp__compare__col"><?php echo esc_html( '$' . custom_pretty_prices( get_field( 'msrp', $vehicle_id ) ) ); ?></div>
		<?php endforeach; ?>
	</div>
	<div class="vlp__compare__heading">Year</div>
	<div class="vlp__compare__row">
		<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
			<div class="vlp__compare__col"><?php echo esc_html( get_field( 'year', $vehicle_id ) ); ?></div>
		<?php endforeach; ?>
	</div>
	<div class="vlp__compare__heading">Model</div>
	<div class="vlp__compare__row">
		<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
			<div class="vlp__compare__col"><?php echo esc_html( get_field( 'model', $vehicle_id ) ); ?></div>
		<?php endforeach; ?>
	</div>
	<div class="vlp__compare__heading">Trim</div>
	<div class="vlp__compare__row">
		<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
			<div class="vlp__compare__col"><?php echo esc_html( get_field( 'trim', $vehicle_id ) ); ?></div>
		<?php endforeach; ?>
	</div>
	<div class="vlp__compare__heading">Exterior Color</div>
	<div class="vlp__compare__row">
		<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
			<div class="vlp__compare__col"><?php echo esc_html( get_field( 'ext_color', $vehicle_id ) ); ?></div>
		<?php endforeach; ?>
	</div>
	<div class="vlp__compare__heading">Interior Color</div>
	<div class="vlp__compare__row">
		<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
			<div class="vlp__compare__col"><?php echo esc_html( get_field( 'int_color', $vehicle_id ) ); ?></div>
		<?php endforeach; ?>
	</div>

	<details class="vlp__compare__section">
		<summary>Key Features
			<svg class="vlp__filter__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
			<svg class="vlp__filter__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg>
		</summary>

		<div class="vlp__compare__heading">Bodystyle</div>
		<div class="vlp__compare__row">
			<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
				<div class="vlp__compare__col"><?php echo esc_html( get_field( 'body_style', $vehicle_id ) ); ?></div>
			<?php endforeach; ?>
		</div>
		<div class="vlp__compare__heading">Doors</div>
		<div class="vlp__compare__row">
			<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
				<div class="vlp__compare__col"><?php echo esc_html( get_field( 'door_count', $vehicle_id ) ); ?></div>
			<?php endforeach; ?>
		</div>
		<div class="vlp__compare__heading">Mileage</div>
		<div class="vlp__compare__row">
			<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
				<div class="vlp__compare__col"><?php echo esc_html( get_field( 'miles', $vehicle_id ) ); ?></div>
			<?php endforeach; ?>
		</div>
		<div class="vlp__compare__heading">Engine</div>
		<div class="vlp__compare__row">
			<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
				<div class="vlp__compare__col"><?php echo esc_html( get_field( 'engine_desc', $vehicle_id ) ); ?></div>
			<?php endforeach; ?>
		</div>
		<div class="vlp__compare__heading">Transmission</div>
		<div class="vlp__compare__row">
			<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
				<div class="vlp__compare__col"><?php echo esc_html( get_field( 'transmission_desc', $vehicle_id ) ); ?></div>
			<?php endforeach; ?>
		</div>
		<div class="vlp__compare__heading">Drive Type</div>
		<div class="vlp__compare__row">
			<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
				<div class="vlp__compare__col"><?php echo esc_html( get_field( 'drivetrain_type', $vehicle_id ) ); ?></div>
			<?php endforeach; ?>
		</div>
		<div class="vlp__compare__heading">Fuel Type</div>
		<div class="vlp__compare__row">
			<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
				<div class="vlp__compare__col"><?php echo esc_html( get_field( 'fuel_type', $vehicle_id ) ); ?></div>
			<?php endforeach; ?>
		</div>
	</details>

	<details class="vlp__compare__section">
		<summary>Warranty
			<svg class="vlp__filter__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
			<svg class="vlp__filter__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg>
		</summary>

	</details>

	<details class="vlp__compare__section">
		<summary>Comments
			<svg class="vlp__filter__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
			<svg class="vlp__filter__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg>
		</summary>

		<div class="vlp__compare__heading">Comments</div>
		<div class="vlp__compare__row">
			<?php foreach ( $args['vehicle_ids'] as $vehicle_id ) : ?>
				<div class="vlp__compare__col"><?php echo esc_html( get_field( 'description', $vehicle_id ) ); ?></div>
			<?php endforeach; ?>
		</div>
	</details>
</div>
