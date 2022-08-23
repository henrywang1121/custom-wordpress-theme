<?php

/**
 * The template for displaying a Service Specials section.
 *
 * @package Custom_Theme
 */

$args = wp_parse_args(
	$args,
	array(
		'hero'          => '',
		'subhead'       => '',
		'headline'      => '',
		'body'          => '',
		'primary_cta'   => '',
		'secondary_cta' => '',
	)
);

?>
<header class="page__header" <?php echo ( ! empty( $args['hero']['ID'] ) ? 'style="background-image: linear-gradient(to top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)), url(' . esc_url( $args['hero']['url'] ) . ');"' : '' ); ?>>
	<div class="page__header__content">
		<div class="page__header__copy">
			<div class="page__header__headline">
				<span><?php echo esc_html( $args['subhead'] ); ?></span>
				<h1><?php echo esc_html( $args['headline'] ); ?></h1>
			</div>
			<?php echo $args['body']; ?>
		</div>
		<div class="page__header__ctas">
			<?php if ( $args['primary_cta'] ) : ?>
				<a class="button button--primary--white" href="<?php echo esc_url( $args['primary_cta']['url'] ); ?>" <?php echo esc_attr( $args['primary_cta']['target'] ? 'target="' . $args['primary_cta']['target'] . '"' : '' ); ?>><?php echo esc_html( $args['primary_cta']['title'] ); ?></a>
			<?php endif; ?>
			<?php if ( $args['secondary_cta'] ) : ?>
				<a class="button button--secondary--transparent" href="<?php echo esc_url( $args['secondary_cta']['url'] ); ?>" <?php echo esc_attr( $args['secondary_cta']['target'] ? 'target="' . $args['secondary_cta']['target'] . '"' : '' ); ?>><?php echo esc_html( $args['secondary_cta']['title'] ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</header>
<?php
