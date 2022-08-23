<?php
/**
 * The template for displaying Special Offer post type archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Custom_Theme
 */

get_header();

?>
<div class="breadcrumb-search__container">
	<div class="breadcrumb-search">
		<div class="breadcrumb-search__content">
			<h1 class="breadcrumb-search__title">Specials</h1>
		</div>
	</div>
</div>
<div class="specials">
	<div class="specials__filter">
		<form id="specialsFilter" role="navigation" method="get" action="<?php echo esc_url( home_url( add_query_arg( null, null ) ) ); ?>">
		<input type="hidden" id="specialCategory" name="special_offer_category" value="<?php echo esc_attr( get_query_var( 'special_offer_category' ) ); ?>">
			<div id="specialsFilterDropdown" class="specials__filter__dropdown">
				<button id="specialsFilterButton" class="specials__filter__dropdown__button" type="button" aria-haspopup="true" aria-expanded="false"><span id="specialsFilterDropdownSelected" class="specials__filter__dropdown__selected">All</span> </button>
				<ul id="specialsFilterDropdownMenu" class="specials__filter__dropdown__menu" aria-labelledby="specialsFilterButton" role="menu">
					<li role="presentation"><button type="button" class="<?php echo ( ! get_query_var( 'special_offer_category' ) ? 'active' : '' ); ?>" role="menuitem" data-value="">All</button></li>
					<li role="presentation"><button type="button" class="<?php echo ( 'lease-offers' === get_query_var( 'special_offer_category' ) ? 'active' : '' ); ?>" role="menuitem" data-value="lease-offers">Lease</button></li>
					<li role="presentation"><button type="button" class="<?php echo ( 'purchase-offers' === get_query_var( 'special_offer_category' ) ? 'active' : '' ); ?>" role="menuitem" data-value="purchase-offers">Finance</button></li>
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
</div>
<?php

get_footer();
