<?php

/**
 * The template for displaying fifty-fifty template part.
 *
 * @package Custom_Theme
 */

$args = wp_parse_args(
	$args,
	array(
		'media_position' => 'right',
		'background'     => 'white',
		'headline'       => '',
		'subhead'        => '',
		'body'           => '',
		'media_type'     => 'image',
		'image'          => '',
		'video'          => '',
		'embed'          => '',
		'primary_cta'    => '',
		'secondary_cta'  => '',
		'link_cta'       => '',
	)
);

?>
<div class="fifty-fifty <?php echo esc_attr( 'fifty-fifty--' . $args['background'] . ' fifty-fifty--' . $args['media_position'] ); ?>">
	<div class="fifty-fifty__media <?php echo esc_attr( 'fifty-fifty__media--' . $args['media_type'] ); ?>">
		<?php if ( 'video' === $args['media_type'] ) : ?>
			<video width="100%" src="<?php echo esc_url( $args['video']['url'] ); ?>" loop muted playsinline autoplay></video>
		<?php elseif ( 'embed' === $args['media_type'] ) : ?>
			<div class="embed-container">
				<?php

				echo str_replace( '></iframe>', ' loading="lazy"></iframe>', $args['embed'] );

				?>
			</div>
		<?php elseif ( ! empty( $args['image']['ID'] ) ) : ?>
			<?php

			echo wp_get_attachment_image( $args['image']['ID'], 'xx_large' );

			?>
		<?php endif; ?>
	</div>
	<div class="fifty-fifty__content">
		<?php if ( $args['subhead'] ) : ?>
			<div class="fifty-fifty__subhead"><?php echo esc_html( $args['subhead'] ); ?></div>
		<?php endif; ?>
		<?php if ( $args['headline'] ) : ?>
			<div class="fifty-fifty__headline"><?php echo esc_html( $args['headline'] ); ?></div>
		<?php endif; ?>
		<?php if ( $args['body'] ) : ?>
			<div class="fifty-fifty__body">
				<?php echo $args['body']; ?>
			</div>
		<?php endif; ?>
		<div class="fifty-fifty__ctas">
			<?php if ( $args['primary_cta'] ) : ?>
				<a class="button button--primary--black" href="<?php echo esc_url( $args['primary_cta']['url'] ); ?>" <?php echo esc_attr( $args['primary_cta']['target'] ? 'target="' . $args['primary_cta']['target'] . '"' : '' ); ?>><?php echo esc_html( $args['primary_cta']['title'] ); ?></a>
			<?php endif; ?>
			<?php if ( $args['secondary_cta'] ) : ?>
				<a class="button button--secondary--black" href="<?php echo esc_url( $args['secondary_cta']['url'] ); ?>" <?php echo esc_attr( $args['secondary_cta']['target'] ? 'target="' . $args['secondary_cta']['target'] . '"' : '' ); ?>><?php echo esc_html( $args['secondary_cta']['title'] ); ?></a>
			<?php endif; ?>
			<?php if ( $args['link_cta'] ) : ?>
				<a class="link" href="<?php echo esc_url( $args['link_cta']['url'] ); ?>" <?php echo esc_attr( $args['link_cta']['target'] ? 'target="' . $args['link_cta']['target'] . '"' : '' ); ?>><?php echo esc_attr( $args['link_cta']['title'] ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php
