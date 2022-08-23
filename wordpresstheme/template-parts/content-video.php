<?php
/**
 * The template for displaying videos on the archive page.
 *
 * @package Custom_Theme
 */

$video_placeholder = get_field( 'video_placeholder' );
$term_list         = get_the_term_list( get_the_ID(), 'video_category', '', ', ', '' );

?>
<article id="video-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! empty( $video_placeholder['ID'] ) ) : ?>
		<div class="video__placeholder">
			<a href="<?php echo esc_url( get_the_permalink() ); ?>">
				<?php echo wp_get_attachment_image( $video_placeholder['ID'], 'large' ); ?>
				<div class="video__placeholder__overlay__circle">
					<div class="video__placeholder__overlay__triangle"></div>
				</div>
			</a>
		</div>
	<?php endif; ?>

	<header class="video__header">
		<h2 class="video__title widow-fix"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo esc_html( get_the_title() ); ?></a></h2>
	</header>

	<div>
		<div class="video__cta">
			<a class="button button--primary--black" href="<?php echo esc_url( get_permalink() ); ?>">Watch Video</a>
		</div>

		<?php if ( ! is_wp_error( $term_list ) && ! empty( $term_list ) ) : ?>
			<div class="video__categories">Filed Under: <?php echo $term_list; ?></div>
		<?php endif; ?>
	</div>
</article>
<?php
