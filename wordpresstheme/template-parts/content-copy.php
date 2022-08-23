<?php
/**
 * The template for displaying new and used vehicle inventory and search results.
 *
 * @package Custom_Theme
 */

$args = wp_parse_args(
	$args,
	array(
		'alignment'     => 'center',
		'background'    => '',
		'headline'      => '',
		'subhead'       => '',
		'body'          => '',
		'primary_cta'   => '',
		'secondary_cta' => '',
		'link_cta'      => '',
	)
);

?>
<div class="content-copy__container <?php echo esc_attr( $args['background'] ? 'content-copy__container--' . $args['background'] : '' ); ?>">
	<div class="content-copy <?php echo esc_attr( 'content-copy--' . $args['alignment'] ); ?>">
		<?php if ( $args['subhead'] ) : ?>
			<div class="content-copy__subhead"><?php echo $args['headline']; ?></div>
		<?php endif; ?>
		<?php if ( $args['headline'] ) : ?>
			<h2 class="content-copy__headline"><?php echo $args['headline']; ?></h2>
		<?php endif; ?>
		<?php if ( $args['body'] ) : ?>
			<div class="content-copy__body">
				<?php echo $args['body']; ?>
			</div>
		<?php endif; ?>
		<?php if ( $args['primary_cta'] ) : ?>
			<a class="button button--primary--black" href="<?php echo esc_url( $args['primary_cta']['url'] ); ?>" <?php echo esc_attr( $args['primary_cta']['target'] ? 'target="' . $args['primary_cta']['target'] . '"' : '' ); ?>><?php echo esc_html( $args['primary_cta']['title'] ); ?></a>
		<?php endif; ?>
		<?php if ( $args['secondary_cta'] ) : ?>
			<a class="button button--secondary--black" href="<?php echo esc_url( $args['secondary_cta']['url'] ); ?>" <?php echo esc_attr( $args['secondary_cta']['target'] ? 'target="' . $args['secondary_cta']['target'] . '"' : '' ); ?>><?php echo esc_html( $args['secondary_cta']['title'] ); ?></a>
		<?php endif; ?>
		<?php if ( $args['link_cta'] ) : ?>
			<a class="link" href="<?php echo esc_url( $args['link_cta']['url'] ); ?>" <?php echo esc_attr( $args['link_cta']['target'] ? 'target="' . $args['link_cta']['target'] . '"' : '' ); ?>><?php echo esc_html( $args['link_cta']['title'] ); ?></a>
		<?php endif; ?>
	</div>
</div>
<?php
