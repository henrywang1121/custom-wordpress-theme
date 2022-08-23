<?php
/**
 * The template for displaying a contact form.
 *
 * @package Custom_Theme
 */

?>
<div class="form__container">
	<div class="form__wrap">
		<form class="form form--value-your-car"
			method="post"
			action="<?php echo esc_url( home_url( add_query_arg( null, null ) ) ); ?>"
      enctype="multipart/form-data">
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
          <option value="text">Text</option>
				</select>
			</div>
      <div class="form__field">
				<label for="vehicleYear">Vehicle Year</label>
				<input id="vehicleYear" name="vehicleYear" type="text">
			</div>
      <div class="form__field">
				<label for="vehicleMake">Vehicle Make</label>
				<input id="vehicleMake" name="vehicleMake" type="text">
			</div>
      <div class="form__field">
				<label for="vehicleModel">Vehicle Model</label>
				<input id="vehicleModel" name="vehicleModel" type="text">
			</div>
      <div class="form__field">
				<label for="vehicleVIN">Vehicle VIN</label>
				<input id="vehicleVIN" name="vehicleVIN" type="text" minlength="17" maxlength="17">
			</div>
      <div class="form__field form__file">
        <label for="vehiclePhotos">Vehicle Photos</label>
        <input type="file" name="vehiclePhotos[]" id="vehiclePhotos" accept="image/jpeg,image/png,image/gif" capture="environment" multiple>
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
