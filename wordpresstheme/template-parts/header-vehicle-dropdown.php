<?php
/**
 * The template for displaying the vehicle dropdown menu.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom_Theme
 */

?>
<div class="vehicle-dropdown" id="vehicleDropdown">
	<div class="vehicle-dropdown__vehicles__container">
		<div class="vehicle-dropdown__vehicles">
			<?php

			$new_vehicle_menu = get_field( 'new_vehicle_menu', 'option' );

			?>
			<?php if ( ! empty( $new_vehicle_menu ) ) : ?>
				<?php

				$model_counts      = array();
				$model_prices      = array();
				$sedans_hatchbacks = array();
				$crossovers_suvs   = array();
				$sports_cars       = array();
				foreach ( $new_vehicle_menu as $vehicle ) {
					// Initialize model counts and prices.
					$model_counts[ $vehicle['inventory_model_name'] ] = 0;
					$model_prices[ $vehicle['inventory_model_name'] ] = null;

					// Sort models into categories.
					if ( 'sedans_hatchbacks' === $vehicle['category'] ) {
						$sedans_hatchbacks[] = $vehicle;
					} elseif ( 'crossovers_suvs' === $vehicle['category'] ) {
						$crossovers_suvs[] = $vehicle;
					} elseif ( 'sports_cars' === $vehicle['category'] ) {
						$sports_cars[] = $vehicle;
					}
				}

				// Get all new vehicles to count each model.
				$args = array(
					'post_type'      => 'vehicle',
					'posts_per_page' => -1,
					'post_status'    => 'publish',
					'fields'         => 'ids',
					'no_found_rows'  => true,
					'tax_query'      => array(
						array(
							'taxonomy' => 'inventory',
							'field'    => 'slug',
							'terms'    => array( 'new-cars' ),
						),
					),
				);

				$new_cars = new WP_Query( $args );
				if ( ! empty( $new_cars ) ) {
					foreach ( $new_cars->posts as $vehicle_id ) {
						// Add each vehicle to model count.
						$model = get_field( 'model', $vehicle_id );

						if ( isset( $model_counts[ $model ] ) ) {
							$model_counts[ $model ] += 1;
						}

						$price = get_field( 'sale_price', $vehicle_id );
						if ( ! empty( $price ) ) {
							if ( empty( $model_prices[ $model ] ) ) {
								$model_prices[ $model ] = $price;
							} elseif ( $price < $model_prices[ $model ] ) {
								$model_prices[ $model ] = $price;
							}
						}
					}
				}

				?>
				<?php if ( ! empty( $sedans_hatchbacks ) ) : ?>
					<div class="vehicle-dropdown__vehicles__section">
						<?php foreach ( $sedans_hatchbacks as $vehicle ) : ?>
							<?php

							$name           = $vehicle['name'];
							$image          = $vehicle['image'];
							$inventory_link = $vehicle['link'];
							$count          = $model_counts[ $vehicle['inventory_model_name'] ];
							$price          = $model_prices[ $vehicle['inventory_model_name'] ];

							?>
							<a href="<?php echo esc_url( $inventory_link['url'] ); ?>">
								<span class="vehicle-dropdown__vehicle__name"><?php echo esc_html( $name ); ?></span>
								<?php if ( ! empty( $image['id'] ) ) : ?>
									<?php echo wp_get_attachment_image( $image['id'], 'small' ); ?>
								<?php endif; ?>
								<?php if ( ! empty( $price ) ) : ?>
									<span class="vehicle-dropdown__vehicle__price"><?php echo esc_html( 'Starting at $' . custom_pretty_prices( $price ) ); ?></span>
								<?php endif; ?>
								<span class="vehicle-dropdown__vehicle__count"><?php echo esc_html( $count . ' Available' ); ?></span>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $crossovers_suvs ) ) : ?>
					<div class="vehicle-dropdown__vehicles__section">
						<?php foreach ( $crossovers_suvs as $vehicle ) : ?>
							<?php

							$name           = $vehicle['name'];
							$image          = $vehicle['image'];
							$inventory_link = $vehicle['link'];
							$count          = $model_counts[ $vehicle['inventory_model_name'] ];
							$price          = $model_prices[ $vehicle['inventory_model_name'] ];

							?>
							<a href="<?php echo esc_url( $inventory_link['url'] ); ?>">
								<span class="vehicle-dropdown__vehicle__name"><?php echo esc_html( $name ); ?></span>
								<?php if ( ! empty( $image['id'] ) ) : ?>
									<?php echo wp_get_attachment_image( $image['id'], 'small' ); ?>
								<?php endif; ?>
								<?php if ( ! empty( $price ) ) : ?>
									<span class="vehicle-dropdown__vehicle__price"><?php echo esc_html( 'Starting at $' . custom_pretty_prices( $price ) ); ?></span>
								<?php endif; ?>
								<span class="vehicle-dropdown__vehicle__count"><?php echo esc_html( $count . ' Available' ); ?></span>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $sports_cars ) ) : ?>
					<div class="vehicle-dropdown__vehicles__section">
						<?php foreach ( $sports_cars as $vehicle ) : ?>
							<?php

							$name           = $vehicle['name'];
							$image          = $vehicle['image'];
							$inventory_link = $vehicle['link'];
							$count          = $model_counts[ $vehicle['inventory_model_name'] ];
							$price          = $model_prices[ $vehicle['inventory_model_name'] ];

							?>
							<a href="<?php echo esc_url( $inventory_link['url'] ); ?>">
								<span class="vehicle-dropdown__vehicle__name"><?php echo esc_html( $name ); ?></span>
								<?php if ( ! empty( $image['id'] ) ) : ?>
									<?php echo wp_get_attachment_image( $image['id'], 'small' ); ?>
								<?php endif; ?>
								<?php if ( ! empty( $price ) ) : ?>
									<span class="vehicle-dropdown__vehicle__price"><?php echo esc_html( 'Starting at $' . custom_pretty_prices( $price ) ); ?></span>
								<?php endif; ?>
								<span class="vehicle-dropdown__vehicle__count"><?php echo esc_html( $count . ' Available' ); ?></span>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="vehicle-dropdown__links__container">
		<div class="vehicle-dropdown__links">
			<?php

			$locations       = get_nav_menu_locations();
			$nav_menu_object = wp_get_nav_menu_object( $locations['primary'] );

			?>
			<?php if ( ! empty( $nav_menu_object ) && ! is_wp_error( $nav_menu_object ) ) : ?>
				<?php

				$nav_menu_items = wp_get_nav_menu_items( $nav_menu_object );
				$menu_parent_id = 0;
				foreach ( $nav_menu_items as $menu_item ) {
					if ( 'New' === $menu_item->post_title ) {
						$menu_parent_id = $menu_item->ID;
						break;
					}
				}

				?>
				<?php if ( $menu_parent_id ) : ?>
					<?php foreach ( $nav_menu_items as $menu_item ) : ?>
						<?php if ( (int) $menu_item->menu_item_parent === $menu_parent_id ) : ?>
							<a class="button button--primary--black" href="<?php echo esc_url( $menu_item->url ); ?>" <?php echo esc_attr( $menu_item->target ? 'target="' . $menu_item->target . '"' : '' ); ?>><?php echo esc_html( $menu_item->title ); ?></a>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php
