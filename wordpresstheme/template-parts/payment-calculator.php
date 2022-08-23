<?php
/**
 * The template for displaying the payment calculator form.
 *
 * @package Custom_Theme
 */

$args = wp_parse_args(
	$args,
	array(
		'sale_price' => 0,
	)
);

?>
<div class="form__container">
	<div class="form__wrap">
		<form class="form form--payment-calculator" id="formPaymentCalculator" method="post" action="<?php echo esc_url( home_url( add_query_arg( null, null ) ) ); ?>">
			<div class="form__field">
				<label for="salePrice"><?php esc_html_e( 'Sale Price', 'custom' ); ?></label>
				<div class="form__field__prepend">
					<span>$</span>
					<input id="salePrice" name="salePrice" type="number" placeholder="" value="<?php echo esc_attr( $args['sale_price'] ? $args['sale_price'] : '' ); ?>">
				</div>
			</div>
			<div class="form__field">
				<label for="downPayment"><?php esc_html_e( 'Down Payment', 'custom' ); ?></label>
				<div class="form__field__prepend">
					<span>$</span>
					<input id="downPayment" name="downPayment" type="number" placeholder="0">
				</div>
			</div>
			<div class="form__field">
				<label for="apr"><?php esc_html_e( 'APR (Estimated finance rate)', 'custom' ); ?></label>
				<div class="form__field__append">
					<input id="apr" name="apr" type="number" placeholder="0" step="0.1">
					<span>%</span>
				</div>
			</div>
			<div class="form__field">
				<label for="term"><?php esc_html_e( 'Term', 'custom' ); ?></label>
				<select id="term" name="term">
					<option value="">Choose&hellip;</option>
					<option value="12">12 months</option>
					<option value="24">24 months</option>
					<option value="36">36 months</option>
					<option value="48">48 months</option>
					<option value="60">60 months</option>
					<option value="72">72 months</option>
					<option value="84">84 months</option>
				</select>
			</div>
			<input type="reset" class="button button--secondary--white" value="Reset" />
		</form>
		<div class="form__container__results">
			<h2>Estimated Monthly Payment</h2>
			<div class="form__container__results__payment">$<span id=formResultsMonthlyPaymentAmount>____</span></div>
			<div id="formErrors" class="form__container__results__errors">
				<ul></ul>
			</div>
			<div class="disclaimers">
				<p class="disclaimer ">All prices plus government fees and taxes, any finance charges and $85 dealer document preparation charge, $1.75 per tire recycling fee.</p>
				<p class="disclaimer ">These calculations are for reference purposes only. All figures are estimates only and are not guaranteed as accurate. Always consult a professional financial advisor.</p>
			</div>
		</div>
	</div>
</div>
