<?php
/**
 * The template for displaying a fullscreen modal.
 *
 * @package Custom_Theme
 */

$args = wp_parse_args(
	$args,
	array(
		'id'            => 'modal',
		'template_part' => array(),
	)
);

?>
<div class="modal" id="<?php echo esc_html( $args['id'] ); ?>" tabindex="-1" aria-labelledby="<?php echo esc_html( $args['id'] . 'Title' ); ?>" aria-modal="true" role="dialog">
	<div class="modal__content">
		<div class="modal__header">
			<button class="modal__close" type="button"><span class="visually-hidden">Close</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M17.925 16.904L25 23.979l-2.021 1.684-7.075-7.075-7.075 7.075-1.684-1.684 7.075-7.075-7.075-7.075 1.684-2.021 7.075 7.075 7.075-7.075L25 9.829l-7.075 7.075z" /></svg></button>
		</div>
		<div class="modal__body">
			<div class="modal__body__inner">
				<?php if ( $args['template_part'] ) : ?>
					<?php get_template_part( ...$args['template_part'] ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php
