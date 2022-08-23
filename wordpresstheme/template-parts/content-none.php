<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom_Theme
 */

?>
<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<section class="no-results not-found">
		<header class="page-header page-header">
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'custom' ); ?></h1>
		</header>
	</section>
<?php elseif ( is_search() ) : ?>
	<section class="no-results not-found">
		<header class="page-header page-header">
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'custom' ); ?></h1>
		</header>
		<div class="page-content">
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'custom' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</section>
<?php elseif ( is_tax( custom_TAXONOMY ) ) : ?>
	<section class="no-results not-found">
		<?php if ( ! empty( $_GET ) ) : ?>
			<p class="no-results">Sorry, there are no vehicles matching your criteria. Try again with different options, or try a keyword search.</p>
		<?php else : ?>
		<p class="no-results">Sorry, this model is temporarily out of stock. Please call us to see if any arrived in our latest shipment. Thanks.</p>
	<?php endif; ?>
	</section>
<?php else : ?>
	<section class="no-results not-found">
		<header class="page-header page-header">
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'custom' ); ?></h1>
		</header>
		<div class="page-content">
			<p><?php esc_html_e( 'It seems we can\'t find what you&rsquo;re looking for. Perhaps searching can help.', 'custom' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</section>
<?php endif; ?>
