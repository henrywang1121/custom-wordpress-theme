<?php
/**
 * The template for displaying a sales lead form.
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

$condition    = get_field( 'condition', $args['id'] );
$vehicle_year = get_field( 'year', $args['id'] );
$make         = get_field( 'make', $args['id'] );
$model        = get_field( 'model', $args['id'] );

?>
<div class="form__container">
	<div class="form__wrap">
		<form class="form form--sales"
			method="post"
			action="<?php echo esc_url( home_url( add_query_arg( null, null ) ) ); ?>">
			<?php if ( $args['title'] ) : ?>
				<h2 class="form__title" id="<?php echo esc_html( $args['id'] . 'Title' ); ?>"><?php echo esc_html( $args['title'] ); ?></h2>
			<?php endif; ?>
			<fieldset>
				<legend>Interest</legend>
				<div class="form__radio">
					<input type="radio" name="interest" id="interest1" value="buy" checked="checked">
					<label for="interest1">Purchase</label>
				</div>
				<div class="form__radio">
					<input type="radio" name="interest" id="interest2" value="lease">
					<label for="interest1">Lease</label>
				</div>
				<div class="form__radio">
					<input type="radio" name="interest" id="interest3" value="">
					<label for="interest1">Not Sure</label>
				</div>
			</fieldset>
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
				<label for="preferredContact">Preferred Contact Method</label>
				<select name="preferredContact" id="preferredContact">
					<option value="email" selected>Email</option>
					<option value="phone">Phone</option>
				</select>
			</div>
			<div class="form__field">
				<label for="comments">Comments</label>
				<textarea id="comments" name="comments" placeholder="Tell us what you&rsquo;re looking for&hellip;" rows="8"></textarea>
			</div>
			<fieldset>
				<legend>Purchase Time Frame</legend>
				<div class="form__radio">
					<input type="radio" name="timeframe" id="timeframe1" value="24 Hours">
					<label for="timeframe1">24 Hours</label>
				</div>
				<div class="form__radio">
					<input type="radio" name="timeframe" id="timeframe2" value="3 Days">
					<label for="timeframe2">3 Days</label>
				</div>
				<div class="form__radio">
					<input type="radio" name="timeframe" id="timeframe3" value="1 Week">
					<label for="timeframe3">1 Week</label>
				</div>
				<div class="form__radio">
					<input type="radio" name="timeframe" id="timeframe4" value="1 Month">
					<label for="timeframe4">1 Month</label>
				</div>
				<div class="form__radio">
					<input type="radio" name="timeframe" id="timeframe5" value="" checked="checked">
					<label for="timeframe5">Not Sure</label>
				</div>
			</fieldset>
			<div class="form__checkbox">
				<input type="checkbox" name="tradeIn" id="tradeIn" value="true" aria-expanded="false" aria-controls="tradeInForm">
				<label for="tradeIn">Trade-In</label>
			</div>
			<div id="tradeInForm">
				<fieldset>
					<legend class="visually-hidden">Trade-In</legend>
					<p>Please tell us a bit about your trade-in:</p>
					<div class="form__row">
						<div class="form__field">
							<label for="tradeInYear">Year</label>
							<input id="tradeInYear" name="tradeInYear" type="text">
						</div>
						<div class="form__field">
							<label for="tradeInMake">Make</label>
							<input id="tradeInMake" name="tradeInMake" type="text">
						</div>
					</div>
					<div class="form__row">
						<div class="form__field">
							<label for="tradeInModel">Model</label>
							<input id="tradeInModel" name="tradeInModel" type="text">
						</div>
						<div class="form__field">
							<label for="tradeInMiles">Miles</label>
							<input id="tradeInMiles" name="tradeInMiles" type="number">
						</div>
					</div>
				</fieldset>
			</div>
			<div class="grecaptcha" data-recaptcha-id=""></div>
			<input type="hidden" name="vehicleId" id="vehicleId" value="<?php echo esc_attr( $args['id'] ); ?>">
			<input type="hidden" name="gaCat" id="gaCat" value="VDP">
			<input type="hidden" name="gaLabel" id="gaLabel" value="<?php echo esc_attr( $condition . ' ' . $vehicle_year . ' ' . $make . ' ' . $model . ' Check Availability / Reserve Now Form' ); ?>">
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
