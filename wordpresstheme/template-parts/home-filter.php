<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Custom_Theme
 */

$new_vehicles_term  = get_term_by( 'slug', custom_NEW_VEHICLES_SLUG, custom_TAXONOMY );
$cpo_vehicles_term  = get_term_by( 'slug', custom_CPO_VEHICLES_SLUG, custom_TAXONOMY );
$used_vehicles_term = get_term_by( 'slug', custom_USED_VEHICLES_SLUG, custom_TAXONOMY );
$filter             = custom_get_filter_array( array( $new_vehicles_term->slug ) );

?>
<nav class="home__inventory__filter">
	<form id="homeFilter" action="<?php echo esc_url( get_post_type_archive_link( 'vehicle' ) ); ?>">

		<div class="home__filter__dropdown">
			<input type="hidden" name="inventory" value="<?php echo esc_attr( $new_vehicles_term->slug ); ?>">
			<button id="inventoryButton" class="home__filter__dropdown__button" type="button" aria-haspopup="true" aria-expanded="false"><span class="home__filter__dropdown__selected">New</span> </button>
			<ul class="home__filter__dropdown__menu" aria-labelledby="inventoryButton" role="menu">
				<li role="presentation"><button type="button" role="menuitem" data-value="<?php echo esc_attr( $new_vehicles_term->slug ); ?>">New</button></li>
				<li role="presentation"><button type="button" role="menuitem" data-value="<?php echo esc_attr( $cpo_vehicles_term->slug ); ?>">Certified</button></li>
				<li role="presentation"><button type="button" role="menuitem" data-value="<?php echo esc_attr( $used_vehicles_term->slug ); ?>">Pre-Owned</button></li>
			</ul>
		</div>

		<div class="home__filter__dropdown">
			<input type="hidden" name="model" value="">
			<button id="modelButton" class="home__filter__dropdown__button" type="button" aria-haspopup="true" aria-expanded="false"><span class="home__filter__dropdown__selected">Model</span> </button>
			<ul class="home__filter__dropdown__menu" aria-labelledby="modelButton" role="menu">
				<li role="presentation"><button type="button" role="menuitem" data-value="">All</button></li>
				<?php if ( ! empty( $filter['model']['options'] ) ) : ?>
					<?php foreach ( $filter['model']['options'] as $model => $quantity ) : ?>
						<li role="presentation"><button type="button" role="menuitem" data-value="<?php echo esc_attr( $model ); ?>"><?php echo esc_html( $model ); ?></button></li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div>

		<div class="home__filter__dropdown">
			<input type="hidden" name="yearFrom" value="">
			<input type="hidden" name="yearTo" value="">
			<button id="yearButton" class="home__filter__dropdown__button" type="button" aria-haspopup="true" aria-expanded="false"><span class="home__filter__dropdown__selected">Year</span> </button>
			<ul class="home__filter__dropdown__menu" aria-labelledby="yearButton" role="menu">
				<li role="presentation"><button type="button" role="menuitem" data-value="">All</button></li>
				<?php if ( ! empty( $filter['year_from']['options'] ) ) : ?>
					<?php foreach ( $filter['year_from']['options'] as $model_year => $quantity ) : ?>
						<li role="presentation"><button type="button" role="menuitem" data-value="<?php echo esc_attr( $model_year ); ?>"><?php echo esc_html( $model_year ); ?></button></li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div>

		<input class="button button--primary--black" type="submit" value="View Inventory">
	</form>
</nav>
<?php
