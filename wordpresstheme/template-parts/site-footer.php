<?php
/**
 * The Site Header for our theme.
 *
 * @package Custom_Theme
 */

$facebook_url = get_field( 'facebook_url', 'option' );
$youtube_url  = get_field( 'youtube_url', 'option' );
$yelp_url     = get_field( 'yelp_url', 'option' );

?>
<footer class="site-footer" role="contentinfo">
	<?php get_template_part( 'template-parts/footer', 'contact-map' ); ?>
	<div class="site-footer__navigation">
		<div class="site-footer__navigation__logo">
			<img loading="lazy"
				src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/dealership-logo.svg' ); ?>"
				width="230"
				height="40"
				alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
		</div>
		<nav class="site-footer__navigation__nav">
			<?php

			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'depth'          => 2,
					'container'      => '',
				)
			);

			?>
		</nav>
		<div class="site-footer__navigation__social">
			<?php if ( ! empty( $facebook_url ) ) : ?>
				<a class="social-link ga-event"
					data-ga-cat="Footer Link"
					data-ga-action="Click"
					data-ga-label="Facebook Link"
					href="<?php echo esc_url( $facebook_url ); ?>"
					target="_blank">
					<span class="visually-hidden">Facebook</span><svg enable-background="new 0 0 32 32" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m12.5 17h-3.4v-4.4h3.4v-3.6c0-1.7.5-3.2 1.6-4.3s2.7-1.7 4.9-1.7l3.1.3v3.9h-2.9c-.9 0-1.4.2-1.7.7s-.4 1-.4 1.7v3.1h4.9l-.1 4.3h-4.7v12h-4.7z"/></svg>
				</a>
			<?php endif; ?>
			<?php if ( ! empty( $youtube_url ) ) : ?>
				<a class="social-link ga-event"
					data-ga-cat="Footer Link"
					data-ga-action="Click"
					data-ga-label="YouTube Link"
					href="<?php echo esc_url( $youtube_url ); ?>"
					target="_blank">
					<span class="visually-hidden">YouTube</span><svg enable-background="new 0 0 32 32" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m29 16.5c0 2.8-.1 4.6-.3 5.5-.2 1.2-.6 2.1-1.4 2.6s-2 .9-3.8 1h-15c-1.7-.2-3-.5-3.8-1s-1.3-1.4-1.4-2.6c-.2-1-.3-2.8-.3-5.5s.1-4.6.3-5.5c.2-1.2.7-2.1 1.4-2.6.8-.5 2-.9 3.8-1 1.2-.2 3.7-.3 7.5-.3s6.3.1 7.5.3c1.7.2 3 .5 3.8 1s1.3 1.4 1.4 2.6c.2.9.3 2.7.3 5.5zm-8.1 0-8.1-4.9v9.6z"/></svg>
				</a>
			<?php endif; ?>
			<?php if ( ! empty( $yelp_url ) ) : ?>
				<a class="social-link ga-event"
					data-ga-cat="Footer Link"
					data-ga-action="Click"
					data-ga-label="Yelp Link"
					href="<?php echo esc_url( $yelp_url ); ?>"
					target="_blank">
					<span class="visually-hidden">Yelp</span><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="m7.6 14.7 5.3 2.6c1 .5.9 2-.2 2.3l-5.7 1.3c-.6.2-1.3-.2-1.5-.9 0-.1 0-.1 0-.2-.2-1.5 0-3.1.5-4.5.2-.6.9-1 1.5-.8.1.1.1.1.1.2zm2.4 12.6c1.3.9 2.7 1.4 4.2 1.7.7.1 1.3-.3 1.4-1 0-.1 0-.1 0-.2l.2-5.8c0-1.1-1.3-1.7-2.1-.8l-3.9 4.3c-.4.5-.4 1.3.1 1.7 0 0 0 .1.1.1zm7.6-5.8 3.1 5c.4.6 1.1.7 1.7.4 0 0 .1-.1.1-.1 1.2-1 2.1-2.2 2.8-3.6.3-.6 0-1.3-.6-1.6 0 0-.1 0-.1-.1l-5.6-1.8c-1-.3-2 .8-1.4 1.8zm7.9-7c-.6-1.4-1.5-2.6-2.7-3.7-.5-.4-1.3-.4-1.7.1 0 0-.1.1-.1.1l-3.3 4.8c-.6.9.2 2.1 1.3 1.8l5.6-1.6c.6-.2 1-.9.8-1.5.1.1.1.1.1 0zm-16.8-10.9c-.6.3-.9 1-.6 1.6v.1l5.5 9.5c.6 1.1 2.2.6 2.2-.6v-11c0-.7-.5-1.2-1.2-1.2h-.1c-2 .2-4 .7-5.8 1.6z"/></svg>
				</a>
			<?php endif; ?>
		</div>
		<div class="site-footer__navigation__copyright-privacy">
			<ul>
				<li><a href="/privacy-policy">Privacy Policy</a></li>
				<li><a href="/do-not-sell-my-personal-information/">Do Not Sell My Personal Information</a></li>
				<!-- <li><a href=""><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="m6.3 29c-.3 0-.6-.1-.8-.3l-.3-.5c-.1-.2-.2-.3-.2-.5v-23.5c0-.3.1-.6.3-.8.1-.1.4-.3.7-.4s.7 0 1 .1l19.6 11.7c.2 0 .3.1.4.3s.1.4.1.7-.1.6-.3.9l-.3.5-12.8 7.6c-.2.2-.4.3-.7.3s-.5-.1-.7-.3l-.3-.5s-.1-.3-.3-.8v-6c0-.3.2-.7.5-1s.7-.5 1-.5.7.1.9.4c.3.3.4.6.4.9v3.9l8.6-5.2-15.2-9.2v18.3l1-.5c.2-.2.4-.2.8-.1s.7.3.9.7c.3.3.3.7.3 1-.1.3-.3.6-.7.8l-3.1 1.8c-.2.1-.4.2-.8.2zm5.7-15.7c0 .3.1.7.4.9.3.3.6.4.9.4s.7-.1.9-.4c.3-.3.4-.6.4-.9s-.1-.7-.4-.9c-.2-.2-.5-.4-.9-.4-.3 0-.7.1-.9.4s-.4.6-.4.9z"/></svg> Ad Choices</a></li> -->
			</ul>
			<p>
				<?php

				$copyright = '2017';
				$now       = current_time( 'Y' );
				if ( $now !== $copyright ) {
					$copyright .= ' &ndash; ' . $now;
				}

				?>
				Copyright &copy; <?php echo esc_html( $copyright ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</p>
		</div>
	</div>
</footer>
<?php
