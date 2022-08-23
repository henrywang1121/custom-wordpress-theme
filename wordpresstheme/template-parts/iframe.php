<?php
/**
 * The template for displaying an iframe.
 *
 * @package Custom_Theme
 */

$args = wp_parse_args(
	$args,
	array(
		'url'    => '',
		'title'  => '',
		'height' => '500',
	)
);

?>
<div class="iframe">
	<iframe src="<?php echo esc_url( $args['url'] ); ?>"
		title="<?php echo esc_attr( $args['title'] ); ?>"
		width="100%"
		height="<?php echo esc_attr( $args['height'] ); ?>"
		loading="lazy"></iframe>
	<div class="iframeSpinner"></div>
</div>
<script defer>
	jQuery(function ($) {
		$('iframe').on('load', function() {
			$('.iframeSpinner').hide();
		});
	});
</script>
<?php
