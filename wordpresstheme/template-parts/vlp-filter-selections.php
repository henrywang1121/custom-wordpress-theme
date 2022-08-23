<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Custom_Theme
 */

?>
<div class="vlp__filter__selections">
	<?php

	$query_vars = array(
		'sort',
		'inventory',
		'year_from',
		'year_to',
		'make',
		'model',
		'trim',
		'color',
		'transmission',
		'drivetrain',
		'fuel',
		'miles_from',
		'miles_to',
		'price_from',
		'price_to',
	);

	?>
	<?php foreach ( $query_vars as $query_var ) : ?>
		<?php

		$var = get_query_var( $query_var );

		?>
		<?php if ( $var ) : ?>
			<?php

			$var_array = explode( ',', $var );

			?>
			<?php if ( is_array( $var_array ) && count( $var_array ) > 1 ) : ?>
				<?php foreach ( $var_array as $val ) : ?>
					<?php

					$label = $val;
					if ( 'inventory' === $query_var ) {
						$tax_term = get_term_by( 'slug', $val, custom_TAXONOMY );
						if ( ! empty( $tax_term->name ) ) {
							$label = $tax_term->name;
						}
					}

					?>
					<button class="vlpFilterSelectionsButton"
						type="button"
						data-key="<?php echo esc_attr( $query_var . '[]' ); ?>"
						data-value="<?php echo esc_attr( $val ); ?>">
						<?php echo esc_html( $label ); ?>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M17.925 16.904L25 23.979l-2.021 1.684-7.075-7.075-7.075 7.075-1.684-1.684 7.075-7.075-7.075-7.075 1.684-2.021 7.075 7.075 7.075-7.075L25 9.829l-7.075 7.075z"/></svg>
					</button>
				<?php endforeach; ?>
			<?php else : ?>
				<button class="vlpFilterSelectionsButton"
					type="button"
					data-key="<?php echo esc_attr( $query_var ); ?>"
					data-value="<?php echo esc_attr( $var ); ?>">
					<?php echo esc_html( $var ); ?>
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M17.925 16.904L25 23.979l-2.021 1.684-7.075-7.075-7.075 7.075-1.684-1.684 7.075-7.075-7.075-7.075 1.684-2.021 7.075 7.075 7.075-7.075L25 9.829l-7.075 7.075z"/></svg>
				</button>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
<?php
