<?php
/**
 * The template for displaying VDP Breacrumb and Search.
 *
 * @package Custom_Theme
 */

?>
<div class="breadcrumb-search__container">
	<div class="breadcrumb-search">
		<?php if ( is_singular( 'vehicle' ) || ( is_post_type_archive( 'vehicle' ) || is_tax( 'inventory' ) ) && ! empty( $_GET['compare'] ) ) : ?>
			<?php

			$get = $_GET;
			unset( $get['compare'] );
			$query_string = http_build_query( $get );

			?>
			<a class="breadcrumb-search__link" href="<?php echo esc_url( '/inventory?' . $query_string ); ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M29 17.268H7.815l9.951 9.829L16.16 29 3 16 16.16 3l1.605 1.585-9.95 10.147H29v2.536z"/></svg> Back to Inventory</a>
		<?php endif; ?>

		<?php if ( ( is_post_type_archive( 'vehicle' ) || is_tax( 'inventory' ) ) && empty( $_GET['compare'] ) ) : ?>
			<div class="breadcrumb-search__content breadcrumb-search__content--vlp">
				<?php

				$breadcrumb_title = '';
				if ( get_query_var( 'inventory' ) && count( explode( ',', get_query_var( 'inventory' ) ) ) === 1 ) {
					$tax_term_slug = get_query_var( 'inventory' );
					$tax_term      = get_term_by( 'slug', $tax_term_slug, 'inventory' );
					if ( 'New cars' === $tax_term->name ) {
						$breadcrumb_title = 'New car';
					} elseif ( 'Used Vehicles' === $tax_term->name ) {
						$breadcrumb_title = 'Used';
					} elseif ( 'Certified Pre-Owned cars' === $tax_term->name ) {
						$breadcrumb_title = 'Certified Pre-Owned car';
					}
				}
				if ( get_query_var( 'model' ) && count( explode( ',', get_query_var( 'model' ) ) ) === 1 ) {
					if ( stripos( get_query_var( 'model' ), 'car' ) !== false ) {
						$breadcrumb_title .= str_replace( 'car', '', get_query_var( 'model' ) );
					} else {
						$breadcrumb_title .= ' ' . get_query_var( 'model' );
					}
				}
				$breadcrumb_title .= ' Inventory';

				?>
				<h1 class="breadcrumb-search__title"><?php echo esc_html( trim( $breadcrumb_title ) ); ?></h1>
				<div class="breadcrumb-search__vehicles-found"><?php echo esc_html( 1 === $wp_query->found_posts ? $wp_query->found_posts . ' Vehicle Found' : $wp_query->found_posts . ' Vehicles Found' ); ?></div>
			</div>
		<?php endif; ?>

		<?php if ( is_singular( 'vehicle' ) || ( is_post_type_archive( 'vehicle' ) || is_tax( 'inventory' ) ) && empty( $_GET['compare'] ) ) : ?>
				<div class="breadcrumb-search__cta">
					<form method="get" action="/inventory">
						<div class="breadcrumb-search__cta__search">
							<input type="search" name="s" placeholder="Search" required><button type="submit"><span class="visually-hidden">Search</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M26.442 28l-6.545-6.462c-1.662 1.436-3.636 2.154-5.922 2.154-1.455 0-2.753-.256-3.896-.769-1.143-.513-2.234-1.231-3.273-2.154-1.039-.923-1.766-2-2.182-3.231A11.464 11.464 0 014 13.846c0-1.231.208-2.462.623-3.692s1.143-2.308 2.182-3.231 2.13-1.641 3.273-2.154S12.468 4 13.818 4c1.351 0 2.597.256 3.74.769a10.588 10.588 0 013.117 2.154 9.91 9.91 0 012.182 3.231c.519 1.231.779 2.41.779 3.538s-.208 2.205-.623 3.231a12.006 12.006 0 01-1.558 2.769L28 26.154 26.442 28zm-12.78-6.769c2.078 0 3.844-.718 5.299-2.154 1.455-1.436 2.182-3.179 2.182-5.231 0-2.051-.727-3.795-2.182-5.231s-3.221-2.154-5.299-2.154-3.844.718-5.298 2.154-2.182 3.179-2.182 5.231.727 3.795 2.182 5.231c1.454 1.436 3.22 2.154 5.298 2.154z"/></svg></button>
						</div>
					</form>
				</div>
			<?php endif; ?>
	</div>
</div>
<?php
