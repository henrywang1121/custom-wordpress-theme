<?php
/**
 * The template for displaying Roadster Express banners.
 *
 * @package Custom_Theme
 */

?>
<div class="roadster-banner roadster-banner--mobile">
	<a href="<?php echo ( has_term( custom_TAXONOMY, custom_NEW_VEHICLES_SLUG ) ? 'https://express.customtheme.com/inventory' : 'https://express.customtheme.com/inventory/used' ); ?>" target="_blank">
		<picture>
			<source type="image/avif"
				srcset="<?php echo esc_url( get_template_directory_uri() . '/images/roadster-Banner_mobile.avif' ); ?>">
			<source type="image/webp"
				srcset="<?php echo esc_url( get_template_directory_uri() . '/images/roadster-Banner_mobile.jpg.webp' ); ?>">
			<img loading="eager"
				decoding="auto"
				src="<?php echo esc_url( get_template_directory_uri() . '/images/roadster-Banner_mobile.jpg' ); ?>"
				width="600"
				height="100"
				alt="Express Store. Welcome to Car Buying Made Simple. Instant Pricing, No Hassle, Home Delivery. Shop All Models">
		</picture>
	</a>
</div>
<div class="roadster-banner roadster-banner--desktop">
	<a href="<?php echo ( has_term( custom_TAXONOMY, custom_NEW_VEHICLES_SLUG ) ? 'https://express.customtheme.com/inventory' : 'https://express.customtheme.com/inventory/used' ); ?>" target="_blank">
		<picture>
			<source type="image/avif"
				srcset="<?php echo esc_url( get_template_directory_uri() . '/images/roadster-Banner_@2x.avif' ); ?>">
			<source type="image/webp"
				srcset="<?php echo esc_url( get_template_directory_uri() . '/images/roadster-Banner_@2x.jpg.webp' ); ?>">
			<img loading="eager"
				decoding="auto"
				src="<?php echo esc_url( get_template_directory_uri() . '/images/roadster-Banner_@2x.jpg' ); ?>"
				width="2340"
				height="256"
				alt="Express Store. Welcome to Car Buying Made Simple. Instant Pricing, No Hassle, Home Delivery. Shop All Models">
		</picture>
	</a>
</div>
<?php
