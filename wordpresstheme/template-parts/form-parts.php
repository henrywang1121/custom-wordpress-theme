<?php
/**
 * The template for displaying the Parts Order form.
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
		<form class="form form--parts"
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
				<div class="form__field">
					<label for="partsYear">Year</label>
					<input id="partsYear" name="partsYear" type="text">
				</div>
				<div class="form__field">
					<label for="partsMake">Make</label>
					<input id="partsMake" name="partsMake" type="text">
				</div>
				<div class="form__field">
					<label for="partsModel">Model</label>
					<input id="partsModel" name="partsModel" type="text">
				</div>
				<div class="form__field">
					<label for="partsTrim">Trim</label>
					<input id="partsTrim" name="partsTrim" type="text">
				</div>
				<div class="form__field">
					<label for="partsTransmission">Transmission</label>
					<select name="partsTransmission" id="partsTransmission">
						<option value="Automatic">Automatic</option>
						<option value="Manual">Manual</option>
					</select>
				</div>
			</section>
			<section>
				<div class="parts__list" id="partsList">
					<details class="parts__list__part" data-part-index="1" open>
						<summary>
							<?php if ( $args['title'] ) : ?>
								<h3 class="form__section-title">Requested Part <span id="partIndex">1</span></h3>
							<?php else : ?>
								<h2 class="form__section-title">Requested Part <span id="partIndex">1</span></h2>
							<?php endif; ?>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path d="M28.122 11.628l-1.646-1.689-10.354 10.8-10.354-10.8-1.646 1.689 12 12.311 12-12.311z"/></svg></summary>
						<div class="form__field">
							<label for="partName1">Part Name</label>
							<input id="partName1" name="partName1" type="text">
						</div>
						<div class="form__field">
							<label for="partNumber1">Part Number</label>
							<input id="partNumber1" name="partNumber1" type="text">
						</div>
						<div class="form__field">
							<label for="partDescription1">Part Description</label>
							<textarea id="partDescription1" name="partDescription1" rows="8"></textarea>
						</div>
						<div class="form__checkbox">
							<input type="checkbox" name="partInstallation1" id="partInstallation1" value="true">
							<label for="partInstallation1">I want installation with this part</label>
						</div>
					</details>
				</div>
				<button type="button" id="addPart" class="button button--secondary--white">Add Part</button>
			</section>
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
