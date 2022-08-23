<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Custom_Theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php // Favicons and theme color. ?>
	<link rel="icon" href="/favicon.ico" sizes="any" /><!-- 32×32 -->
	<link rel="icon" href="/icon.svg" type="image/svg+xml" />
	<link rel="apple-touch-icon" href="/apple-touch-icon.png" /><!-- 180×180 -->
	<link rel="manifest" href="/manifest.webmanifest" />
	<meta name="theme-color" content="#2b2b2b">
	<?php wp_head(); ?>

	<?php

	if ( get_field( 'custom_styles' ) ) {
		echo '<style type="text/css">';
		echo wp_kses( get_field( 'custom_styles' ), array() );
		echo '</style>';
	}

	?>
</head>
<body <?php echo custom_body_class_attr(); ?>>
	<?php custom_body_prepend(); ?>
	<div class="site-outer-wrap">
		<div class="site-inner-wrap">
			<div id="page" class="hfeed">
				<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'custom' ); ?></a>
				<?php get_template_part( 'template-parts/site', 'header' ); ?>
				<div id="content">
					<?php
