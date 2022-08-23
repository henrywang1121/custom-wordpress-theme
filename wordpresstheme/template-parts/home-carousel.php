<?php
/**
 * The template for displaying the home page carousel.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom_Theme
 */

?>
<?php if ( have_rows( 'home_carousel' ) ) : ?>
	<div class="home__carousel home__carousel--small is-hidden">
		<?php

		$count = 1;
		$size  = 'x_large';

		?>
		<?php while ( have_rows( 'home_carousel' ) ) : ?>
			<?php

			the_row();
			$image = get_sub_field( 'image_small' );

			?>
			<?php if ( ! empty( $image['id'] ) ) : ?>
				<?php

				$label    = get_sub_field( 'image_label' );
				$cta_link = get_sub_field( 'cta_link' );

				?>
				<?php if ( ! empty( $cta_link['url'] ) ) : ?>
					<a href="<?php echo esc_url( $cta_link['url'] ); ?>"
						class="home__carousel__cell"
						data-asset-position="<?php echo esc_attr( $count ); ?>"
						data-asset-name="<?php echo esc_attr( $label ); ?>"
						<?php echo esc_attr( $cta_link['target'] ? 'target="' . $cta_link['target'] . '"' : '' ); ?>>
				<?php else : ?>
					<div class="home__carousel__cell"
						data-asset-position="<?php echo esc_attr( $count ); ?>"
						data-asset-name="<?php echo esc_attr( $label ); ?>">
				<?php endif; ?>
					<?php

					$src = wp_get_attachment_image_src( $image['id'], $size );

					?>
					<img data-flickity-lazyload-src="<?php echo esc_url( $src[0] ); ?>"
						data-flickity-lazyload-srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( $image['id'], $size ) ); ?>"
						sizes="<?php echo esc_attr( wp_get_attachment_image_sizes( $image['id'], $size ) ); ?>"
						width="<?php echo esc_attr( $src[1] ); ?>"
						height="<?php echo esc_attr( $src[2] ); ?>"
						alt="<?php echo esc_attr( $image['alt'] ); ?>"
						decoding="async">
				<?php if ( ! empty( $cta_link['url'] ) ) : ?>
					</a>
				<?php else : ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			<?php

			$count++;

			?>
		<?php endwhile; ?>
	</div>

	<div class="home__carousel home__carousel--large is-hidden">
		<?php

		$count = 1;
		$size  = '2048x2048';

		?>
		<?php while ( have_rows( 'home_carousel' ) ) : ?>
			<?php

			the_row();
			$image = get_sub_field( 'image_large' );

			?>
			<?php if ( ! empty( $image['id'] ) ) : ?>
				<?php

				$label    = get_sub_field( 'image_label' );
				$cta_link = get_sub_field( 'cta_link' );

				?>
				<?php if ( ! empty( $cta_link['url'] ) ) : ?>
					<a href="<?php echo esc_url( $cta_link['url'] ); ?>"
						class="home__carousel__cell"
						data-asset-position="<?php echo esc_attr( $count ); ?>"
						data-asset-name="<?php echo esc_attr( $label ); ?>"
						<?php echo esc_attr( $cta_link['target'] ? 'target="' . $cta_link['target'] . '"' : '' ); ?>>
				<?php else : ?>
					<div class="home__carousel__cell"
						data-asset-position="<?php echo esc_attr( $count ); ?>"
						data-asset-name="<?php echo esc_attr( $label ); ?>">
				<?php endif; ?>
					<?php

					$src = wp_get_attachment_image_src( $image['id'], $size );

					?>
					<img data-flickity-lazyload-src="<?php echo esc_url( $src[0] ); ?>"
						data-flickity-lazyload-srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( $image['id'], $size ) ); ?>"
						sizes="<?php echo esc_attr( wp_get_attachment_image_sizes( $image['id'], $size ) ); ?>"
						width="<?php echo esc_attr( $src[1] ); ?>"
						height="<?php echo esc_attr( $src[2] ); ?>"
						alt="<?php echo esc_attr( $image['alt'] ); ?>"
						decoding="async">
				<?php if ( ! empty( $cta_link['url'] ) ) : ?>
					</a>
				<?php else : ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			<?php

			$count++;

			?>
		<?php endwhile; ?>
	</div>
<?php endif; ?>
