<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Custom_Theme
 */

$new_vehicles_term  = get_term_by( 'slug', custom_NEW_VEHICLES_SLUG, custom_TAXONOMY );
$used_vehicles_term = get_term_by( 'slug', custom_USED_VEHICLES_SLUG, custom_TAXONOMY );
$cpo_vehicles_term  = get_term_by( 'slug', custom_CPO_VEHICLES_SLUG, custom_TAXONOMY );

$search_query = '';
if ( is_search() ) {
	$search_query = get_search_query();
}

$tax_terms = array();
if ( get_query_var( 'inventory' ) ) {
	$tax_terms = explode( ',', get_query_var( 'inventory' ) );
}
$filter = custom_get_filter_array( $tax_terms, $search_query );

?>
<div class="vlp__filter__backdrop" id="vlpFilterBackdrop"></div>
<div class="vlp__filter" tabindex="-1" aria-labelledby="vlpFilterButton" aria-modal="true" role="dialog">
	<button class="vlp__filter__close" id="vlpFilterClose" type="button"><span class="visually-hidden">Close</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M17.925 16.904L25 23.979l-2.021 1.684-7.075-7.075-7.075 7.075-1.684-1.684 7.075-7.075-7.075-7.075 1.684-2.021 7.075 7.075 7.075-7.075L25 9.829l-7.075 7.075z"/></svg></button>

	<?php get_template_part( 'template-parts/vlp', 'filter-selections' ); ?>

	<div class="vlp__filter__keyword">
		<h2 class="vlp__filter__keyword__heading">Keyword</h2>
		<?php get_search_form(); ?>
	</div>
	<form id="vlpFilter"
		class="form"
		role="navigation"
		method="get"
		action="/inventory">

		<div class="vlp__filter__inventory">
			<h2 class="vlp__filter__keyword__heading">Inventory</h2>
			<input type="hidden" name="taxonomy" value="inventory">
			<input type="hidden" name="inventory" value="<?php echo esc_attr( get_query_var( 'inventory' ) ); ?>">
			<div class="form__checkbox">
				<input type="checkbox"
					id="inventory-<?php echo esc_attr( $new_vehicles_term->slug ); ?>"
					name="inventory[]"
					value="<?php echo esc_attr( $new_vehicles_term->slug ); ?>"
					<?php echo esc_attr( in_array( $new_vehicles_term->slug, explode( ',', get_query_var( 'inventory' ) ), true ) ? 'checked' : '' ); ?>>
				<label for="inventory-<?php echo esc_attr( $new_vehicles_term->slug ); ?>">New</label>
			</div>
			<div class="form__checkbox">
				<input type="checkbox"
					id="inventory-<?php echo esc_attr( $cpo_vehicles_term->slug ); ?>"
					name="inventory[]"
					value="<?php echo esc_attr( $cpo_vehicles_term->slug ); ?>"
					<?php echo esc_attr( in_array( $cpo_vehicles_term->slug, explode( ',', get_query_var( 'inventory' ) ), true ) ? 'checked' : '' ); ?>>
				<label for="inventory-<?php echo esc_attr( $cpo_vehicles_term->slug ); ?>">Certified Pre-Owned</label>
			</div>
			<div class="form__checkbox">
				<input type="checkbox"
					id="inventory-<?php echo esc_attr( $used_vehicles_term->slug ); ?>"
					name="inventory[]"
					value="<?php echo esc_attr( $used_vehicles_term->slug ); ?>"
					<?php echo esc_attr( in_array( $used_vehicles_term->slug, explode( ',', get_query_var( 'inventory' ) ), true ) ? 'checked' : '' ); ?>>
				<label for="inventory-<?php echo esc_attr( $used_vehicles_term->slug ); ?>">Used</label>
			</div>
		</div>

		<?php if ( is_search() || ( get_query_var( 'inventory' ) && in_array( $used_vehicles_term->slug, explode( ',', get_query_var( 'inventory' ) ), true ) ) ) : ?>
			<details class="vlp__filter__make"
				data-options="<?php echo esc_html( wp_json_encode( $filter['make']['options'] ) ); ?>"
				data-selected="<?php echo esc_html( wp_json_encode( $filter['make']['selected'] ) ); ?>">
				<summary>Make <svg class="vlp__filter__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg><svg class="vlp__filter__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg></summary>
				<input type="hidden" name="make" value="<?php echo esc_attr( get_query_var( 'make' ) ); ?>">
				<?php

				$disabled = $filter['make']['disabled'] ? 'disabled' : '';

				if ( ! empty( $filter['make']['options'] ) ) {

					$i = 0;
					foreach ( $filter['make']['options'] as $option => $num ) {
						if ( empty( $option ) || 'null' === $option ) {
							continue;
						}

						$checked  = '';
						$quantity = '';
						if ( ! empty( $filter['make']['selected'] ) && in_array( $option, $filter['make']['selected'], true ) ) {
							$checked = 'checked';
						}

						// If field is disabled, don't show quantity.
						if ( ! $filter['make']['disabled'] && $num > 0 ) {
							$quantity = ' (' . $num . ')';
						}

						?>
						<div class="form__checkbox">
							<input type="checkbox"
								value="<?php echo esc_attr( $option ); ?>"
								id="make<?php echo esc_attr( (string) $i ); ?>"
								name="make[]" <?php echo esc_attr( $checked . ' ' . $disabled ); ?>>
							<label for="make<?php echo esc_attr( (string) $i ); ?>"><?php echo esc_html( $option . $quantity ); ?></label>
						</div>
						<?php

						$i++;

					}
				}

				?>
			</details>
		<?php endif; ?>

		<details class="vlp__filter__model"
			data-options="<?php echo esc_html( wp_json_encode( $filter['model']['options'] ) ); ?>" data-selected="<?php echo esc_html( wp_json_encode( $filter['model']['selected'] ) ); ?>">
			<summary>Model <svg class="vlp__filter__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg><svg class="vlp__filter__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg></summary>
			<input type="hidden" name="model" value="<?php echo esc_attr( get_query_var( 'model' ) ); ?>">
			<?php

			$disabled = $filter['model']['disabled'] ? 'disabled' : '';
			if ( ! empty( $filter['model']['options'] ) ) {
				$i = 0;
				foreach ( $filter['model']['options'] as $option => $num ) {
					if ( empty( $option ) || 'null' === $option ) {
						continue;
					}

					$checked  = '';
					$quantity = '';
					if ( ! empty( $filter['model']['selected'] ) && in_array( $option, $filter['model']['selected'], true ) ) {
						$checked = 'checked';
					}

					// If field is disabled, don't show quantity.
					if ( ! $filter['model']['disabled'] && $num > 0 ) {
						$quantity = ' (' . $num . ')';
					}

					?>
					<div class="form__checkbox">
						<input type="checkbox"
							id="model<?php echo esc_attr( (string) $i ); ?>"
							name="model[]"
							value="<?php echo esc_attr( $option ); ?>"
							<?php echo esc_attr( $checked . ' ' . $disabled ); ?>>
						<label for="model<?php echo esc_attr( (string) $i ); ?>"><?php echo esc_html( $option . $quantity ); ?></label>
					</div>
					<?php

					$i++;
				}
			}

			?>
		</details>

		<details class="vlp__filter__trim"
			data-options="<?php echo esc_html( wp_json_encode( $filter['trim']['options'] ) ); ?>"
			data-selected="<?php echo esc_html( wp_json_encode( $filter['trim']['selected'] ) ); ?>">
			<summary>Trim <svg class="vlp__filter__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg><svg class="vlp__filter__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg></summary>
			<input type="hidden" name="trim" value="<?php echo esc_attr( get_query_var( 'trim' ) ); ?>">
			<?php

			if ( ! empty( $filter['trim']['options'] ) ) {

				$i = 0;
				foreach ( $filter['trim']['options'] as $option => $num ) {
					if ( empty( $option ) || 'null' === $option ) {
						continue;
					}

					$checked  = '';
					$quantity = '';
					if ( ! empty( $filter['trim']['selected'] ) && in_array( $option, $filter['trim']['selected'], true ) ) {
						$checked = 'checked';
					}
					if ( $num > 0 ) {
						$quantity = ' (' . $num . ')';
					}

					?>
					<div class="form__checkbox">
						<input type="checkbox"
							value="<?php echo esc_attr( $option ); ?>"
							id="trim<?php echo esc_attr( (string) $i ); ?>"
							name="trim[]"
							<?php echo esc_attr( $checked ); ?>>
						<label for="trim<?php echo esc_attr( (string) $i ); ?>"><?php echo esc_html( $option . $quantity ); ?></label>
					</div>
					<?php

					$i++;
				}
			}

			?>
		</details>

		<details class="vlp__filter__year">
			<summary>Year <svg class="vlp__filter__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg><svg class="vlp__filter__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg></summary>
			<?php

			$year_from_min = 2000;
			if ( ! empty( $filter['year_from']['options'] ) ) {
				$year_from_min = (int) min( array_keys( $filter['year_from']['options'] ) );
			}
			$year_from = $year_from_min;
			if ( ! empty( $filter['year_from']['selected'] ) ) {
				$year_from = (int) $filter['year_from']['selected'];
			}
			$year_to_max = (int) current_time( 'Y' ) + 2;
			if ( ! empty( $filter['year_to']['options'] ) ) {
				$year_to_max = (int) max( array_keys( $filter['year_to']['options'] ) );
			}
			$year_to = $year_to_max;
			if ( ! empty( $filter['year_to']['selected'] ) ) {
				$year_to = (int) $filter['year_to']['selected'];
			}

			?>
			<div class="slider-histogram">
				<?php foreach ( $filter['year_from']['options'] as $name => $quantity ) : ?>
					<span class="slider-histogram__col" data-name="<?php echo esc_attr( $name ); ?>" data-quantity="<?php echo esc_attr( $quantity ); ?>"></span>
				<?php endforeach; ?>
			</div>
			<div id="sliderYear" class="slider"></div>
			<div class="slider-inputs">
				<div class="slider-input">
					<label for="yearFrom"><?php esc_html_e( 'Min', 'custom' ); ?></label>
					<input type="number"
						id="yearFrom"
						name="year_from"
						data-options="<?php echo esc_html( $year_from_min ); ?>"
						data-selected="<?php echo esc_attr( ! empty( $filter['year_from']['selected'] ) ? $filter['year_from']['selected'] : '' ); ?>"
						value="<?php echo esc_attr( $year_from ); ?>">
				</div>
				<div class="slider-input">
					<label for="yearTo"><?php esc_html_e( 'Max', 'custom' ); ?></label>
					<input type="number"
						id="yearTo"
						name="year_to"
						data-options="<?php echo esc_html( $year_to_max ); ?>"
						data-selected="<?php echo esc_attr( ! empty( $filter['year_to']['selected'] ) ? $filter['year_to']['selected'] : '' ); ?>"
						value="<?php echo esc_attr( $year_to ); ?>">
				</div>
			</div>
		</details>

		<details class="vlp__filter__color"
			data-options="<?php echo esc_html( wp_json_encode( $filter['color']['options'] ) ); ?>"
			data-selected="<?php echo esc_html( wp_json_encode( $filter['color']['selected'] ) ); ?>">
			<summary>Color <svg class="vlp__filter__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg><svg class="vlp__filter__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg></summary>
			<input type="hidden" name="color" value="<?php echo esc_attr( get_query_var( 'color' ) ); ?>">
			<?php

			if ( ! empty( $filter['color']['options'] ) ) {
				$i = 0;
				foreach ( $filter['color']['options'] as $option => $num ) {
					if ( empty( $option ) || 'null' === $option ) {
						continue;
					}

					$checked  = '';
					$quantity = '';
					if ( ! empty( $filter['color']['selected'] ) && in_array( $option, $filter['color']['selected'], true ) ) {
						$checked = 'checked ';
					}
					if ( $num > 0 ) {
						$quantity = ' (' . $num . ')';
					}

					?>
					<div class="form__checkbox">
						<input type="checkbox" value="<?php echo esc_attr( $option ); ?>" id="color<?php echo esc_attr( (string) $i ); ?>" name="color[]" <?php echo esc_attr( $checked ); ?>>
						<label for="color<?php echo esc_attr( (string) $i ); ?>"><?php echo esc_html( $option . $quantity ); ?></label>
					</div>
					<?php

					$i++;
				}
			}

			?>
		</details>

		<details class="vlp__filter__transmission"
			data-options="<?php echo esc_html( wp_json_encode( $filter['transmission']['options'] ) ); ?>"
			data-selected="<?php echo esc_html( wp_json_encode( $filter['transmission']['selected'] ) ); ?>">
			<summary>Transmission <svg class="vlp__filter__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg><svg class="vlp__filter__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg></summary>
			<input type="hidden" name="transmission" value="<?php echo esc_attr( get_query_var( 'transmission' ) ); ?>">
			<?php

			if ( ! empty( $filter['transmission']['options'] ) ) {
				$i = 0;
				foreach ( $filter['transmission']['options'] as $option => $num ) {
					if ( empty( $option ) || 'null' === $option ) {
						continue;
					}

					$checked  = '';
					$quantity = '';
					if ( ! empty( $filter['transmission']['selected'] ) && in_array( $option, $filter['transmission']['selected'], true ) ) {
						$checked = 'checked ';
					}
					if ( $num > 0 ) {
						$quantity = ' (' . $num . ')';
					}

					?>
					<div class="form__checkbox">
						<input type="checkbox"
							value="<?php echo esc_attr( $option ); ?>"
							id="transmission<?php echo esc_attr( (string) $i ); ?>"
							name="transmission[]"
							<?php echo esc_attr( $checked ); ?>>
						<label for="transmission<?php echo esc_attr( (string) $i ); ?>"><?php echo esc_html( $option . $quantity ); ?></label>
					</div>
					<?php

					$i++;
				}
			}

			?>
		</details>

		<details class="vlp__filter__drivetrain"
			data-options="<?php echo esc_html( wp_json_encode( $filter['drivetrain']['options'] ) ); ?>"
			data-selected="<?php echo esc_html( wp_json_encode( $filter['drivetrain']['selected'] ) ); ?>">
			<summary>Drivetrain <svg class="vlp__filter__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg><svg class="vlp__filter__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg></summary>
			<input type="hidden" name="drivetrain" value="<?php echo esc_attr( get_query_var( 'drivetrain' ) ); ?>">
			<?php

			if ( ! empty( $filter['drivetrain']['options'] ) ) {
				$i = 0;
				foreach ( $filter['drivetrain']['options'] as $option => $num ) {
					if ( empty( $option ) || 'null' === $option ) {
						continue;
					}

					$checked  = '';
					$quantity = '';
					if ( ! empty( $filter['drivetrain']['selected'] ) && in_array( $option, $filter['drivetrain']['selected'], true ) ) {
						$checked = 'checked ';
					}
					if ( $num > 0 ) {
						$quantity = ' (' . $num . ')';
					}

					?>
					<div class="form__checkbox">
						<input type="checkbox"
							value="<?php echo esc_attr( $option ); ?>"
							id="drivetrain<?php echo esc_attr( (string) $i ); ?>"
							name="drivetrain[]"
							<?php echo esc_attr( $checked ); ?>>
						<label for="drivetrain<?php echo esc_attr( (string) $i ); ?>"><?php echo esc_html( $option . $quantity ); ?></label>
					</div>
					<?php

					$i++;
				}
			}

			?>
		</details>

		<details class="vlp__filter__fuel"
			data-options="<?php echo esc_html( wp_json_encode( $filter['fuel']['options'] ) ); ?>"
			data-selected="<?php echo esc_html( wp_json_encode( $filter['fuel']['selected'] ) ); ?>">
			<summary>Fuel Type<svg class="vlp__filter__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg><svg class="vlp__filter__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg></summary>
			<input type="hidden" name="fuel" value="<?php echo esc_attr( get_query_var( 'fuel' ) ); ?>">
			<?php

			if ( ! empty( $filter['fuel']['options'] ) ) {
				$i = 0;
				foreach ( $filter['fuel']['options'] as $option => $num ) {
					if ( empty( $option ) || 'null' === $option ) {
						continue;
					}

					$checked  = '';
					$quantity = '';
					if ( ! empty( $filter['fuel']['selected'] ) && in_array( $option, $filter['fuel']['selected'], true ) ) {
						$checked = 'checked ';
					}
					if ( $num > 0 ) {
						$quantity = ' (' . $num . ')';
					}

					?>
					<div class="form__checkbox">
						<input type="checkbox"
							value="<?php echo esc_attr( $option ); ?>"
							id="fuel<?php echo esc_attr( (string) $i ); ?>"
							name="fuel[]"
							<?php echo esc_attr( $checked ); ?>>
						<label for="fuel<?php echo esc_attr( (string) $i ); ?>"><?php echo esc_html( $option . $quantity ); ?></label>
					</div>
					<?php

					$i++;
				}
			}

			?>
		</details>

		<?php if ( get_query_var( 'inventory' ) && in_array( $used_vehicles_term->slug, explode( ',', get_query_var( 'inventory' ) ), true ) ) : ?>
			<details class="vlp__filter__miles">
				<summary>Miles <svg class="vlp__filter__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
					<svg class="vlp__filter__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg></summary>
				<?php

				$miles_from_min = 0;
				if ( ! empty( $filter['miles_from']['options'] ) ) {
					$miles_from_min = (int) min( array_keys( $filter['miles_from']['options'] ) );
				}
				$miles_from = $miles_from_min;
				if ( ! empty( $filter['miles_from']['selected'] ) ) {
					$miles_from = $filter['miles_from']['selected'];
				}
				$miles_to_max = 500000;
				if ( ! empty( $filter['miles_to']['options'] ) ) {
					$miles_to_max = (int) max( array_keys( $filter['miles_to']['options'] ) );
				}
				$miles_to = $miles_to_max;
				if ( ! empty( $filter['miles_to']['selected'] ) ) {
					$miles_to = (int) $filter['miles_to']['selected'];
				}

				?>
				<div class="slider-histogram">
				<?php foreach ( $filter['miles_from']['options'] as $name => $quantity ) : ?>
					<span class="slider-histogram__col" data-name="<?php echo esc_attr( $name ); ?>" data-quantity="<?php echo esc_attr( $quantity ); ?>"></span>
				<?php endforeach; ?>
			</div>
				<div id="sliderMiles" class="slider"></div>
				<div class="slider-inputs">
					<div class="slider-input">
						<label for="milesFrom"><?php esc_html_e( 'Min', 'custom' ); ?></label>
						<input type="number"
							id="milesFrom"
							name="miles_from"
							min="<?php echo esc_attr( $miles_from_min ); ?>"
							max="<?php echo esc_attr( $miles_to_max - 10000 ); ?>"
							step="10000"
							data-options="<?php echo esc_attr( $miles_from_min ); ?>"
							data-selected="<?php echo esc_attr( ! empty( $filter['miles_from']['selected'] ) ? $filter['miles_from']['selected'] : '' ); ?>"
							value="<?php echo esc_attr( $miles_from ); ?>">
					</div>
					<div class="slider-input">
						<label for="milesTo"><?php esc_html_e( 'Max', 'custom' ); ?></label>
						<input type="number"
							id="milesTo"
							name="miles_to"
							min="<?php echo esc_attr( $miles_from_min + 10000 ); ?>"
							max="<?php echo esc_attr( $miles_to_max ); ?>"
							step="10000"
							data-options="<?php echo esc_attr( $miles_to_max ); ?>"
							data-selected="<?php echo esc_attr( ! empty( $filter['miles_from']['selected'] ) ? $filter['miles_from']['selected'] : '' ); ?>"
							value="<?php echo esc_attr( $miles_to ); ?>">
					</div>
				</div>
			</details>
		<?php endif; ?>

		<details class="vlp__filter__price">
			<summary>Price <svg class="vlp__filter__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
					<svg class="vlp__filter__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg></summary>
			<?php

			$price_from_min = 0;
			if ( ! empty( $filter['price_from']['options'] ) ) {
				$price_from_min = (int) min( array_keys( $filter['price_from']['options'] ) );
			}
			$price_from = $price_from_min;
			if ( ! empty( $filter['price_from']['selected'] ) ) {
				$price_from = (int) $filter['price_from']['selected'];
			}

			$price_to_max = 100000;
			if ( ! empty( $filter['price_to']['options'] ) ) {
				$price_to_max = (int) max( array_keys( $filter['price_to']['options'] ) );
			}
			$price_to = $price_to_max;
			if ( ! empty( $filter['price_to']['selected'] ) ) {
				$price_to = (int) $filter['price_to']['selected'];
			}

			?>
			<div class="slider-histogram">
				<?php foreach ( $filter['price_from']['options'] as $name => $quantity ) : ?>
					<span class="slider-histogram__col" data-name="<?php echo esc_attr( $name ); ?>" data-quantity="<?php echo esc_attr( $quantity ); ?>"></span>
				<?php endforeach; ?>
			</div>
			<div id="sliderPrice" class="slider"></div>
			<div class="slider-inputs">
				<div class="slider-input">
					<label for="priceFrom"><?php esc_html_e( 'Min', 'custom' ); ?></label>
					<input type="number"
						id="priceFrom"
						name="price_from"
						min="<?php echo esc_attr( $price_from_min ); ?>"
						max="<?php echo esc_attr( $price_to_max - 1000 ); ?>"
						step="1000"
						data-options="<?php echo esc_attr( $price_from_min ); ?>"
						data-selected="<?php echo esc_attr( ! empty( $filter['price_from']['selected'] ) ? $filter['price_from']['selected'] : '' ); ?>"
						value="<?php echo esc_attr( $price_from ); ?>">
				</div>
				<div class="slider-input">
					<label for="priceTo"><?php esc_html_e( 'Max', 'custom' ); ?></label>
					<input type="number"
						id="priceTo"
						name="price_to"
						min="<?php echo esc_attr( $price_from_min + 1000 ); ?>"
						max="<?php echo esc_attr( $price_to_max ); ?>"
						step="1000"
						data-options="<?php echo esc_attr( $price_to_max ); ?>"
						data-selected="<?php echo esc_attr( ! empty( $filter['price_to']['selected'] ) ? $filter['price_to']['selected'] : '' ); ?>"
						value="<?php echo esc_attr( $price_to ); ?>">
				</div>
			</div>
		</details>

		<input class="button button--primary--black" type="submit" value="Filter">

	</form>
</div>
<?php
