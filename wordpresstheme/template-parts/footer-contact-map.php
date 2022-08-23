<?php
/**
 * The template for displaying footer contact and map.
 *
 * @package Custom_Theme
 */

$name            = get_bloginfo( 'name' );
$street_address  = get_field( 'dealership_street_address', 'option' );
$city            = get_field( 'dealership_city', 'option' );
$state           = get_field( 'dealership_state_abbr', 'option' );
$zip_code        = get_field( 'dealership_zip_code', 'option' );
$sales_phone     = get_field( 'sales_telephone_number', 'option' );
$map_img         = get_field( 'map', 'option' );
$map_link_url    = get_field( 'map_link_url', 'option' );
$sales_hours     = custom_get_hours( 'sales', true );
$sales_message   = get_field( 'sales_message', 'option' );
$service_hours   = custom_get_hours( 'service', true );
$service_message = get_field( 'service_message', 'option' );
$parts_hours     = custom_get_hours( 'parts', true );
$parts_message   = get_field( 'parts_message', 'option' );

?>
<div class="footer-contact-map">
	<div class="footer-contact-map__contact-hours">
		<div class="footer-contact-map__contact">
			<address>
				<h2 class="footer-contact-map__contact__heading"><?php echo esc_html( $name ); ?></h2>
				<span class="footer-contact-map__contact__city"><?php echo esc_html( $city . ', ' . $state ); ?></span>
				<span class="footer-contact-map__contact__street_address">
					<?php echo esc_html( $street_address ); ?>,<br>
					<?php echo esc_html( $city . ', ' . $state . ' ' . $zip_code ); ?>
				</span>
				<a class="ga-event"
					data-ga-cat="Footer"
					data-ga-action="Click"
					data-ga-label="Footer Directions Link"
					href="<?php echo esc_url( $map_link_url ); ?>"
					target="_blank"><svg enable-background="new 0 0 32 32" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m28.8 8c-.2.2-.3.4-.3.6l-.6 1.3 1.3.6v18.2l-5.4-2.2v-10.8l-1.4 1.3-1-1.3v10.9l-10.5 2.6v-18.6l6.1-1.3c-.6-.6-1-1.3-1-1.9l-6.1 1.6-8.9-3.9v22.7l8.6 3.5 12.8-3.2 8.6 3.9v-22.7zm-20.1 20.8-5.4-2.2v-18.3l5.4 2.2zm13.7-28.8c-1.5 0-2.7.5-3.7 1.6s-1.4 2.2-1.4 3.5.2 2.3.6 3.2 1.1 1.8 1.9 2.9l2.6 3.5 2.9-3.2c.6-1.1 1.2-2.1 1.8-3s.8-2.1.8-3.4-.5-2.5-1.6-3.5c-1.2-1.1-2.4-1.6-3.9-1.6zm0 6.7c-.6 0-1.1-.2-1.4-.5s-.5-.8-.5-1.4.2-1.1.5-1.4.8-.5 1.4-.5 1.1.2 1.4.5.5.7.5 1.3-.2 1-.6 1.4c-.5.4-.9.6-1.3.6z"/></svg> <span>Get Directions</span></a>
				<a class="telephone-number ga-event"
					data-ga-cat="Footer Telephone"
					data-ga-action="Click to Call"
					data-ga-label="General Sales Telephone Link"
					data-sd-department="Sales"
					href="<?php echo esc_url( 'tel:' . $sales_phone ); ?>"><svg enable-background="new 0 0 32 32" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m2.1 23.6c-.4-1.3.1-2.3 1.6-2.9l5.5-2.6c.6-.2 1.2-.3 1.6-.3s.9.2 1.3.6l1.6 1.6c1.3-.9 2.4-1.8 3.4-2.8s1.9-2.2 2.8-3.7l-1.3-1.3c-.6-.4-1-.9-1-1.3s.1-1 .3-1.6l2.6-5.8c.4-1.1 1.1-1.6 1.9-1.6h1c1.7.6 3.2 1.6 4.5 2.8s2.1 2.6 2.1 4.3-.6 3.9-1.9 6.5-3.1 5-5.5 7.3-4.9 4-7.4 5.3c-2.6 1.3-4.8 1.9-6.5 1.9-1.5.2-2.9-.3-4-1.6-1.3-1.2-2.1-2.9-2.6-4.8zm2.6-.7c.2 1.3.8 2.4 1.6 3.4s1.7 1.5 2.6 1.5c1.3 0 3.1-.6 5.5-1.8s4.6-2.8 6.6-4.9 3.7-4.3 4.9-6.6c1.2-2.4 1.8-4.3 1.8-5.8 0-.6-.5-1.4-1.5-2.3s-2-1.5-3.1-1.9l-2.6 5.8 2.6 2.9-.3.6c0 .2-.4.9-1.1 1.9-.7 1.2-1.6 2.3-2.7 3.5s-2.6 2.3-4.5 3.4l-1 .3-2.9-2.6z"/></svg> <span><?php echo esc_html( $sales_phone ); ?></span></a>
			</address>
		</div>

		<div class="footer-contact-map__hours">
			<h2 class="footer-contact-map__hours__heading">Hours</h2>
			<?php if ( ! empty( $sales_hours ) ) : ?>
				<div class="footer-contact-map__hours__block">
					<span class="footer-contact-map__hours__block__heading">Sales</span>
					<ul>
						<?php foreach ( $sales_hours as $hours ) : ?>
							<?php

							$days       = substr( $hours['day'][0], 0, 3 );
							$days_count = count( $hours['day'] );
							if ( $days_count > 1 ) {
								$days = substr( $hours['day'][0], 0, 3 ) . ' &ndash; ' . substr( $hours['day'][ $days_count - 1 ], 0, 3 );
							}

							$time   = 'Closed';
							$opens  = DateTime::createFromFormat( 'H:i', $hours['opens'] );
							$closes = DateTime::createFromFormat( 'H:i', $hours['closes'] );
							if ( $opens && $closes ) {
								$time = $opens->format( 'g:i A' ) . ' &ndash; ' . $closes->format( 'g:i A' );
							}

							?>
							<li><?php echo esc_html( $days ); ?>: <?php echo esc_html( $time ); ?></li>
						<?php endforeach ?>
						<?php if ( $sales_message ) : ?>
							<li><strong><?php echo esc_html( $sales_message ); ?></strong></li>
						<?php endif; ?>
					</ul>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $service_hours ) ) : ?>
				<div class="footer-contact-map__hours__block">
					<span class="footer-contact-map__hours__block__heading">Service</span>
					<ul>
						<?php foreach ( $service_hours as $hours ) : ?>
							<?php

							$days       = substr( $hours['day'][0], 0, 3 );
							$days_count = count( $hours['day'] );
							if ( $days_count > 1 ) {
								$days = substr( $hours['day'][0], 0, 3 ) . ' &ndash; ' . substr( $hours['day'][ $days_count - 1 ], 0, 3 );
							}

							$time   = 'Closed';
							$opens  = DateTime::createFromFormat( 'H:i', $hours['opens'] );
							$closes = DateTime::createFromFormat( 'H:i', $hours['closes'] );
							if ( $opens && $closes ) {
								$time = $opens->format( 'g:i A' ) . ' &ndash; ' . $closes->format( 'g:i A' );
							}

							?>
							<li><?php echo esc_html( $days ); ?>: <?php echo esc_html( $time ); ?></li>
						<?php endforeach ?>
						<?php if ( $service_message ) : ?>
							<li><strong><?php echo esc_html( $service_message ); ?></strong></li>
						<?php endif; ?>
					</ul>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $parts_hours ) ) : ?>
				<div class="footer-contact-map__hours__block">
					<span class="footer-contact-map__hours__block__heading">Parts</span>
					<ul>
					<?php foreach ( $parts_hours as $hours ) : ?>
							<?php

							$days       = substr( $hours['day'][0], 0, 3 );
							$days_count = count( $hours['day'] );
							if ( $days_count > 1 ) {
								$days = substr( $hours['day'][0], 0, 3 ) . ' &ndash; ' . substr( $hours['day'][ $days_count - 1 ], 0, 3 );
							}

							$time   = 'Closed';
							$opens  = DateTime::createFromFormat( 'H:i', $hours['opens'] );
							$closes = DateTime::createFromFormat( 'H:i', $hours['closes'] );
							if ( $opens && $closes ) {
								$time = $opens->format( 'g:i A' ) . ' &ndash; ' . $closes->format( 'g:i A' );
							}

							?>
							<li><?php echo esc_html( $days ); ?>: <?php echo esc_html( $time ); ?></li>
						<?php endforeach ?>
						<?php if ( $parts_message ) : ?>
							<li><strong><?php echo esc_html( $parts_message ); ?></strong></li>
						<?php endif; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<?php if ( ! empty( $map_img['ID'] ) ) : ?>
		<div class="footer-contact-map__map">
			<?php if ( ! empty( $map_link_url ) ) : ?>
				<a class="ga-event"
					data-ga-cat="Footer Map"
					data-ga-action="Click"
					data-ga-label="Footer Map Directions Link"
					href="<?php echo esc_url( $map_link_url ); ?>"
					aria-label="Get Directions to <?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
					target="_blank">
			<?php endif; ?>
			<style>
				.footer-contact-map__map__container.lazy-background.visible {
					background-image: url(<?php echo esc_url( wp_get_attachment_url( $map_img['id'] ) ); ?>);
				}
			</style>
			<div class="footer-contact-map__map__container lazy-background"></div>
			<?php if ( ! empty( $map_link_url ) ) : ?>
				</a>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>
<?php
