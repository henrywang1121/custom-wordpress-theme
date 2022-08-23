<?php
/**
 * The template for displaying a contact form.
 *
 * @package Custom_Theme
 */

$args = wp_parse_args(
	$args,
	array(
		'id'    => get_the_ID(),
		'title' => '',
	)
);

?>
<div class="form__container">
	<div class="form__wrap">
		<form class="form form--contact"
			method="post"
			action="<?php echo esc_url( home_url( add_query_arg( null, null ) ) ); ?>">
			<?php if ( $args['title'] ) : ?>
				<h2 class="form__title" id="<?php echo esc_html( $args['id'] . 'Title' ); ?>"><?php echo esc_html( $args['title'] ); ?></h2>
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
			<div class="form__field">
				<label for="department">Department</label>
				<select id="department" name="department">
					<option value="Sales">Sales</option>
					<option value="Service">Service</option>
					<option value="Parts">Parts</option>
				</select>
			</div>
			<div class="form__field">
				<label for="preferredContact">Preferred Contact Method</label>
				<select name="preferredContact" id="preferredContact">
					<option value="email" selected>Email</option>
					<option value="phone">Phone</option>
				</select>
			</div>
			<div class="form__field">
				<label for="comments">Comments</label>
				<textarea id="comments" name="comments" placeholder="How can we help you?" rows="8"></textarea>
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
