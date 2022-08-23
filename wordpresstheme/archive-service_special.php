<?php
/**
 * The template for displaying Service Special post type archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Custom_Theme
 */

get_header();

?>
<div class="breadcrumb-search__container">
	<div class="breadcrumb-search">
		<div class="breadcrumb-search__content">
			<h1 class="breadcrumb-search__title">Service &amp; Parts Specials</h1>
		</div>
	</div>
</div>
<div class="specials">
	<div class="specials__filter">
		<form id="specialsFilter" role="navigation" method="get" action="<?php echo esc_url( home_url( add_query_arg( null, null ) ) ); ?>">
			<input type="hidden" id="specialCategory" name="service_special_category" value="<?php echo esc_attr( get_query_var( 'service_special_category' ) ); ?>">
			<div id="specialsFilterDropdown" class="specials__filter__dropdown">
				<button id="specialsFilterButton" class="specials__filter__dropdown__button" type="button" aria-haspopup="true" aria-expanded="false"><span id="specialsFilterDropdownSelected" class="specials__filter__dropdown__selected">All</span></button>
				<ul id="specialsFilterDropdownMenu" class="specials__filter__dropdown__menu" aria-labelledby="specialsFilterButton" role="menu">
					<li role="presentation"><button type="button" class="<?php echo ( '' === get_query_var( 'service_special_category' ) ? 'active' : '' ); ?>" role="menuitem" data-value="">All</button></li>
					<li role="presentation"><button type="button" class="<?php echo ( 'service-specials' === get_query_var( 'service_special_category' ) ? 'active' : '' ); ?>" role="menuitem" data-value="service-specials">Service</button></li>
					<li role="presentation"><button type="button" class="<?php echo ( 'parts-specials' === get_query_var( 'service_special_category' ) ? 'active' : '' ); ?>" role="menuitem" data-value="parts-specials">Parts</button></li>
					<li role="presentation"><button type="button" class="<?php echo ( 'accessories-specials' === get_query_var( 'service_special_category' ) ? 'active' : '' ); ?>" role="menuitem" data-value="accessories-specials">Accessories</button></li>
				</ul>
			</div>
		</form>
	</div>
	<?php

	get_template_part( 'template-parts/specials' );

	?>
	<nav class="page-navigation" aria-label="Page navigation">
		<?php echo custom_pagination(); ?>
	</nav>
	<div class="site-disclaimer">
		<?php get_template_part( 'template-parts/disclaimer', 'prop-65' ); ?>
	</div>
</div>
<?php

get_footer();
