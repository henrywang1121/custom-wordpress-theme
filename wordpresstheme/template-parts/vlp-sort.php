<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Custom_Theme
 */

$used_vehicles_term    = get_term_by( 'slug', custom_USED_VEHICLES_SLUG, custom_TAXONOMY );
$used_vehicles_term_id = 0;
if ( $used_vehicles_term ) {
	$used_vehicles_term_id = (int) $used_vehicles_term->term_id;
}

$current_term      = get_term_by( 'slug', get_query_var( 'term' ), custom_TAXONOMY );
$current_term_slug = '';
$current_term_id   = 0;
if ( ! empty( $current_term ) ) {
	$current_term_slug = $current_term->slug;
	$current_term_id   = (int) $current_term->term_id;
}

$sort = get_query_var( 'sort', 'price-asc' );

?>
<div class="vlp__sort">
	<input type="hidden" id="sort" name="sort" form="vlpFilter" value="<?php echo esc_attr( $sort ); ?>">
	<span class="vlp__sort__label" id="vlpSortLabel">Sort By</span>
	<div id="vlpSortDropdown" class="vlp__sort__dropdown">
		<button class="vlp__sort__dropdown__button" id="vlpSortDropdownButton" type="button" aria-haspopup="true" aria-expanded="false" aria-labelledby="vlpSortButtonLabel">
			<?php

			$sort_selected = __( 'Locustom Price', 'custom' );
			if ( 'price-desc' === $sort ) {
				$sort_selected = __( 'Highest Price', 'custom' );
			} elseif ( 'miles-asc' === $sort ) {
				$sort_selected = __( 'Locustom Miles', 'custom' );
			} elseif ( 'miles-desc' === $sort ) {
				$sort_selected = __( 'Highest Miles', 'custom' );
			} elseif ( 'year-desc' === $sort ) {
				$sort_selected = __( 'Necustom Year', 'custom' );
			} elseif ( 'year-asc' === $sort ) {
				$sort_selected = __( 'Oldest Year', 'custom' );
			} elseif ( 'in-stock-asc' === $sort ) {
				$sort_selected = __( 'New Arrivals', 'custom' );
			} elseif ( 'discount-desc' === $sort ) {
				$sort_selected = __( 'Best Deal', 'custom' );
			} elseif ( 'relevance' === $sort ) {
				$sort_selected = __( 'Relevance', 'custom' );
			}

			?>
			<span id="vlpSortDropdownSelected"><?php echo esc_html( $sort_selected ); ?></span> 
		</button>
		<ul id="vlpSortDropdownMenu" class="vlp__sort__dropdown__menu" aria-labelledby="sortDropdownButton" role="menu">
			<?php if ( is_search() ) : ?>
				<li role="presentation">
					<button class="<?php echo ( 'relevance' === $sort ? 'active' : '' ); ?>" type="button" role="menuitem" data-value="relevance"><?php esc_html_e( 'Relevance', 'custom' ); ?></button>
				</li>
			<?php endif; ?>
			<li role="presentation">
				<button class="<?php echo ( 'price-asc' === $sort ? 'active' : '' ); ?>" type="button" role="menuitem" data-value="price-asc"><?php esc_html_e( 'Locustom Price', 'custom' ); ?></button>
			</li>
			<li role="presentation">
				<button class="<?php echo ( 'price-desc' === $sort ? 'active' : '' ); ?>" type="button" role="menuitem" data-value="price-desc"><?php esc_html_e( 'Highest Price', 'custom' ); ?></button>
			</li>
			<?php if ( is_search() || ( $current_term && ( custom_USED_VEHICLES_SLUG === $current_term_slug || ( $used_vehicles_term_id && in_array( $current_term_id, get_term_children( $used_vehicles_term_id, custom_TAXONOMY ), true ) ) ) ) ) : ?>
				<li role="presentation">
					<button class="<?php echo ( 'miles-asc' === $sort ? 'active' : '' ); ?>" type="button" role="menuitem" data-value="miles-asc"><?php esc_html_e( 'Locustom Miles', 'custom' ); ?></button>
				</li>
				<li role="presentation">
					<button class="<?php echo ( 'miles-desc' === $sort ? 'active' : '' ); ?>" type="button" role="menuitem" data-value="miles-desc"><?php esc_html_e( 'Highest Miles', 'custom' ); ?></button>
				</li>
				<li role="presentation">
					<button class="<?php echo ( 'year-desc' === $sort ? 'active' : '' ); ?>" type="button" role="menuitem" data-value="year-desc"><?php esc_html_e( 'Necustom Year', 'custom' ); ?></button>
				</li>
				<li role="presentation">
					<button class="<?php echo ( 'year-asc' === $sort ? 'active' : '' ); ?>" type="button" role="menuitem" data-value="year-asc"><?php esc_html_e( 'Oldest Year', 'custom' ); ?></button>
				</li>
			<?php else : ?>
				<li role="presentation">
					<button class="<?php echo ( 'discount-desc' === $sort ? 'active' : '' ); ?>" type="button" role="menuitem" data-value="discount-desc"><?php esc_html_e( 'Best Deal', 'custom' ); ?></button>
				</li>
			<?php endif; ?>
			<li role="presentation">
				<button class="<?php echo ( 'in-stock-asc' === $sort ? 'active' : '' ); ?>" type="button" role="menuitem" data-value="in-stock-asc"><?php esc_html_e( 'New Arrivals', 'custom' ); ?></button>
			</li>
		</ul>
	</div>
</div>
