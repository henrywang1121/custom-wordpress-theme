<?php
/**
 * The template for displaying page content.
 *
 * @package Custom_Theme
 */

global $post;

?>
<article id="page-<?php echo esc_attr( $post->post_name ); ?>" <?php post_class(); ?>>
	<!-- Content Sections -->
	<?php if ( have_rows( 'content_sections' ) ) : ?>
		<?php while ( have_rows( 'content_sections' ) ) : ?>
			<?php the_row(); ?>
			<?php if ( 'Copy' === get_sub_field( 'content_section_type' ) ) : ?>
				<?php

				get_template_part(
					'template-parts/content',
					'copy',
					array(
						'alignment'     => get_sub_field( 'copy_alignment' ),
						'background'    => get_sub_field( 'copy_background_color' ),
						'headline'      => get_sub_field( 'copy_headline' ),
						'subhead'       => get_sub_field( 'copy_subhead' ),
						'body'          => get_sub_field( 'copy_body' ),
						'primary_cta'   => get_sub_field( 'copy_primary_cta' ),
						'secondary_cta' => get_sub_field( 'copy_secondary_cta' ),
						'link_cta'      => get_sub_field( 'copy_link_cta' ),
					)
				);

				?>
			<?php elseif ( 'Awards' === get_sub_field( 'content_section_type' ) ) : ?>
				<?php get_template_part( 'template-parts/content', 'dealer-awards' ); ?>
			<?php elseif ( 'Fifty-Fifty' === get_sub_field( 'content_section_type' ) ) : ?>
				<?php

				get_template_part(
					'template-parts/content',
					'fifty-fifty',
					array(
						'media_position' => get_sub_field( 'fifty_fifty_media_position' ),
						'background'     => get_sub_field( 'fifty_fifty_background_color' ),
						'headline'       => get_sub_field( 'fifty_fifty_headline' ),
						'subhead'        => get_sub_field( 'fifty_fifty_subhead' ),
						'body'           => get_sub_field( 'fifty_fifty_body' ),
						'media_type'     => get_sub_field( 'fifty_fifty_media_type' ),
						'image'          => get_sub_field( 'fifty_fifty_image' ),
						'video'          => get_sub_field( 'fifty_fifty_video' ),
						'embed'          => get_sub_field( 'fifty_fifty_embed' ),
						'primary_cta'    => get_sub_field( 'fifty_fifty_primary_cta' ),
						'secondary_cta'  => get_sub_field( 'fifty_fifty_secondary_cta' ),
						'link_cta'       => get_sub_field( 'fifty_fifty_link_cta' ),
					)
				);

				?>
			<?php elseif ( 'iframe' === get_sub_field( 'content_section_type' ) ) : ?>
				<?php

				$iframe_placement = get_sub_field( 'iframe_placement' );
				$iframe_url       = get_sub_field( 'iframe_url' );
				$iframe_title     = get_sub_field( 'iframe_title' );
				$iframe_height    = get_sub_field( 'iframe_height' );


				?>
				<?php if ( 'page' === $iframe_placement ) : ?>
					<div class="iframe__container iframe__container--page">
						<?php

						get_template_part(
							'template-parts/iframe',
							'',
							array(
								'url'    => $iframe_url,
								'title'  => $iframe_title,
								'height' => $iframe_height,
							)
						);

						?>
					</div>
				<?php else : ?>
					<div class="iframe__container iframe__container--modal">
						<?php

						$iframe_button   = get_sub_field( 'iframe_modal_button_label' );
						$iframe_modal_id = lcfirst( str_replace( ' ', '', ucwords( $iframe_title ) ) );

						?>
						<div class="iframe__button">
							<button class="button button--primary--black"
								type="button"
								data-toggle="modal"
								data-target="<?php echo esc_attr( '#' . $iframe_modal_id ); ?>"
								data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
								data-ga-action="Click"
								data-ga-label="<?php echo esc_attr( $iframe_title . ' Button' ); ?>"><?php echo esc_html( $iframe_button ); ?></button>
						</div>
						<?php

						get_template_part(
							'template-parts/modal',
							'',
							array(
								'id'            => $iframe_modal_id,
								'template_part' => array(
									'template-parts/iframe',
									'',
									array(
										'url'    => $iframe_url,
										'title'  => $iframe_title,
										'height' => $iframe_height,
									),
								),
							)
						);

						?>
					</div>
				<?php endif; ?>
			<?php elseif ( 'Service Specials' === get_sub_field( 'content_section_type' ) ) : ?>
				<?php

				$specials_headline = get_sub_field( 'service_specials_headline' );
				$specials          = get_sub_field( 'service_specials' );

				?>
				<div class="service-specials">
					<?php if ( $specials_headline ) : ?>
						<h2 class="service-specials__headline"><?php echo esc_html( $specials_headline ); ?></h2>
					<?php endif; ?>
					<?php if ( $specials ) : ?>
						<div class="specials__list">
							<?php foreach ( $specials as $post ) : ?>
								<?php

								setup_postdata( $post );
								get_template_part( 'template-parts/special', 'service_special' );

								?>
							<?php endforeach; ?>
							<?php wp_reset_postdata(); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php elseif ( 'Staff' === get_sub_field( 'content_section_type' ) ) : ?>
				<?php

				$staff_headline = get_sub_field( 'staff_headline' );
				$staff_body     = get_sub_field( 'staff_body' );
				$staff_list     = get_sub_field( 'staff_list' );

				?>
				<div class="staff__container">
					<?php if ( $staff_headline ) : ?>
						<h2 class="staff__headline"><?php echo esc_html( $staff_headline ); ?></h2>
					<?php endif; ?>
					<?php if ( $staff_list ) : ?>
						<div class="staff__list">
							<?php foreach ( $staff_list as $staff ) : ?>
								<div class="staff__item">
									<div class="staff__photo">
										<?php

										if ( ! empty( $staff['photo']['ID'] ) ) {
											echo wp_get_attachment_image( $staff['photo']['ID'], 'medium_large' );
										}

										?>
									</div>
									<div class="staff__job-title"><?php echo esc_html( $staff['job_title'] ); ?></div>
									<div class="staff__name"><?php echo esc_html( $staff['name'] ); ?></div>
									<?php if ( ! empty( $staff['links'] ) ) : ?>
										<?php foreach ( $staff['links'] as $link ) : ?>
											<a href="<?php echo esc_url( $link['link']['url'] ); ?>" class="staff__link link" <?php echo esc_attr( $link['link']['target'] ? 'target="' . $link['link']['target'] . '"' : '' ); ?>><?php echo esc_html( $link['link']['title'] ); ?></a>
										<?php endforeach; ?>
									<?php endif; ?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php elseif ( 'WYSIWYG' === get_sub_field( 'content_section_type' ) ) : ?>
				<div class="wysiwyg__container">
					<?php echo get_sub_field( 'wysiwyg' ); ?>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php if ( is_page( 'contact-custom-theme' ) ) : ?>
		<?php

		// Contact Form.
		get_template_part( 'template-parts/form', 'contact' );

		?>
	<?php elseif ( is_page( 'custom-order' ) ) : ?>
		<?php

		// Custom Order Form.
		get_template_part( 'template-parts/form', 'custom-order' );

		?>
	<?php elseif ( is_page( 'payment-calculator' ) ) : ?>
		<?php

		// Payment Calculator.
		get_template_part( 'template-parts/payment', 'calculator' );

		?>
	<?php elseif ( is_page( 'value-your-car' ) ) : ?>

		<div class="value-your-car__cta1__container">
			<div class="value-your-car__cta1">
				<p>Text Us at <a href="sms:9257666169">(925) 766-6169</a></p>
				<a class="button button--primary--black" href="sms:9257666169">Text Us</a>
			</div>
		</div>

		<div class="value-your-car__photos__container">
			<section class="value-your-car__photos">
				<h2>Photos We Need</h2>
				<div class="value-your-car__photos__grid">
					<picture>
						<source	srcset="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-1.avif' ); ?>" type="image/avif">
						<source	srcset="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-1.jpg.webp' ); ?>" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-1.jpg' ); ?>"
							loading="lazy"
							decoding="async"
							width="600"
							height="400"
							alt="Three-quarter view of front and driver's side of vehicle.">
					</picture>
					<picture>
						<source	srcset="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-2.avif' ); ?>" type="image/avif">
						<source	srcset="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-2.jpg.webp' ); ?>" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-2.jpg' ); ?>"
							loading="lazy"
							decoding="async"
							width="600"
							height="400"
							alt="Three-quarter view of front and passenger's side of vehicle.">
					</picture>
					<picture>
						<source	srcset="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-3.avif' ); ?>" type="image/avif">
						<source	srcset="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-3.jpg.webp' ); ?>" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-3.jpg' ); ?>"
							loading="lazy"
							decoding="async"
							width="600"
							height="400"
							alt="Three-quarter view of rear and passenger's side of vehicle.">
					</picture>
					<picture>
						<source	srcset="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-4.avif' ); ?>" type="image/avif">
						<source	srcset="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-4.jpg.webp' ); ?>" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-4.jpg' ); ?>"
							loading="lazy"
							decoding="async"
							width="600"
							height="400"
							alt="Three-quarter view of rear and driver's side of vehicle.">
					</picture>
					<picture>
						<source	srcset="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-5.avif' ); ?>" type="image/avif">
						<source	srcset="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-5.jpg.webp' ); ?>" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-5.jpg' ); ?>"
							loading="lazy"
							decoding="async"
							width="600"
							height="400"
							alt="View of driver's seat.">
					</picture>
					<picture>
						<source	srcset="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-6.avif' ); ?>" type="image/avif">
						<source	srcset="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-6.jpg.webp' ); ?>" type="image/webp">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/value-your-car-photos-6.jpg' ); ?>"
							loading="lazy"
							decoding="async"
							width="600"
							height="400"
							alt="View of instrument panel with odometer and warning lights.">
					</picture>
				</div>
			</section>
		</div>
		<div class="value-your-car__cta2__container">
			<section class="value-your-car__cta2">
				<!-- <p>If you prefer to <a href="tel:9257666169">call us</a> or use this <button class="link"
					type="button"
					data-toggle="modal"
					data-target="#valueYourCarModal"
					data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
					data-ga-action="Click"
					data-ga-label="Contact Form Button">contact form</button>, you can do that too. Act now!</p> -->
				<p>If you prefer to <a href="tel:9257666169">call us</a> or use the contact form below, you can do that too. Act now!</p>
				<p class="disclaimer">*Your carrier may have texting charges.</p>
			</section>
		</div>
		<?php

		// Value Your Car Form.
		get_template_part( 'template-parts/form', 'value-your-car' );

		// get_template_part(
		// 	'template-parts/modal',
		// 	'',
		// 	array(
		// 		'id'            => 'valueYourCarModal',
		// 		'template_part' => array(
		// 			'template-parts/form',
		// 			'value-your-car',
		// 		),
		// 	)
		// );

		?>
	<?php endif; ?>
</article>
<?php
