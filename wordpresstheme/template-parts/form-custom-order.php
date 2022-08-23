<?php
/**
 * The template for displaying the Custom Order form.
 *
 * @package Custom_Theme
 */

$args = wp_parse_args(
	$args,
	array(
		'id'             => get_the_ID(),
		'title'          => '',
		'ga_event_cat'   => 'Custom Order Landing Page',
		'ga_event_label' => 'Custom Order Quote Form',
	)
);

?>
<div class="form__container">
	<div class="form__wrap">
		<form class="form form--custom-order"
			method="post"
			action="<?php echo esc_url( home_url( add_query_arg( null, null ) ) ); ?>">
			<?php if ( $args['title'] ) : ?>
				<h2 class="form__title" id="<?php echo esc_html( $args['id'] . 'Title' ); ?>"><?php echo esc_html( $args['title'] ); ?></h2>
			<?php endif; ?>
			<section>
			<?php if ( $args['title'] ) : ?>
					<h3 class="form__section-title">Contact Information</h3>
				<?php else : ?>
					<h2 class="form__section-title">Contact Information</h2>
				<?php endif; ?>
				<div class="form__field">
					<label for="firstName">First Name<span class="form__field__required"><span class="visually-hidden">Required</span>*</span></label>
					<input id="firstName" name="firstName" type="text" placeholder="First Name" required>
				</div>
				<div class="form__field">
					<label for="lastName">Last Name<span class="form__field__required"><span class="visually-hidden">Required</span>*</span></label>
					<input id="lastName" name="lastName" type="text" placeholder="Last Name" required>
				</div>
				<div class="form__field">
					<label for="phone">Phone Number</label>
					<input id="phone" name="phone" type="tel" placeholder="xxx-xxx-xxxx">
				</div>
				<div class="form__field">
					<label for="email">Email Address<span class="form__field__required"><span class="visually-hidden">Required</span>*</span></label>
					<input id="email" name="email" type="email" placeholder="Email" required>
				</div>
			</section>
			<section>
				<?php if ( $args['title'] ) : ?>
					<h3 class="form__section-title">Vehicle Information</h3>
				<?php else : ?>
					<h2 class="form__section-title">Vehicle Information</h2>
				<?php endif; ?>
				<input type="hidden" name="make" value="car">
				<div class="form__field">
					<label for="year">Year</label>
					<select name="year" id="year">
						<option value="" selected><?php esc_html_e( 'Any', 'custom' ); ?></option>
					</select>
				</div>
				<div class="form__field">
					<label for="model">Model</label>
					<select name="model" id="model" disabled>
						<option value="" selected><?php esc_html_e( 'Any', 'custom' ); ?></option>
					</select>
				</div>
				<div class="form__field">
					<label for="trim">Trim</label>
					<select name="trim" id="trim" disabled>
						<option value="" selected><?php esc_html_e( 'Any', 'custom' ); ?></option>
					</select>
				</div>
				<div class="form__field">
					<label for="extColor">Exterior Color</label>
					<select name="extColor" id="extColor" disabled>
						<option value="" selected><?php esc_html_e( 'Any', 'custom' ); ?></option>
					</select>
				</div>
				<div class="form__field">
					<label for="intColor">Interior Color</label>
					<select name="intColor" id="intColor" disabled>
						<option value="" selected><?php esc_html_e( 'Any', 'custom' ); ?></option>
					</select>
				</div>
			</section>
			<input type="hidden" name="gaEventCat" value="<?php echo esc_attr( ! empty( $args['ga_event_cat'] ) ? $args['ga_event_cat'] : '' ); ?>">
			<input type="hidden" name="gaEventLabel" value="<?php echo esc_attr( ! empty( $args['ga_event_label'] ) ? $args['ga_event_label'] : '' ); ?>">
			<div class="form__checkbox">
				<input type="checkbox" name="confirmAge" id="confirmAge" value="true">
				<label for="confirmAge"><?php esc_html_e( 'I verify that I am at least 16 years of age.', 'custom' ); ?></label>
			</div>
			<div class="grecaptcha" data-recaptcha-id=""></div>
			<button type="submit" class="button button--primary--black"><div class="buttonSpinner"></div>Submit</button>
			<div class="formResponse formResponse--success">
				<p class="formResponse__title">Thank You!</p>
				<p>Someone from <?php echo esc_html( get_bloginfo( 'name' ) ); ?> will be in touch soon.</p>
			</div>
			<div class="formResponse formResponse--fail">
				<p class="formResponse__title">Something went wrong</p>
				<p>Please give us a call at <?php echo esc_html( get_field( 'sales_telephone_number', 'option' ) ); ?>.</p>
			</div>
		</form>
	</div>
</div>
<?php
