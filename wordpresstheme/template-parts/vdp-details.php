<?php
/**
 * The template for displaying VDP Specifications section.
 *
 * @package Custom_Theme
 */

$mechanical_features      = get_field( 'mechanical_features' );
$exterior_features        = get_field( 'exterior_features' );
$interior_features        = get_field( 'interior_features' );
$safety_features          = get_field( 'safety_features' );
$epa_features             = get_field( 'epa_features' );
$options                  = get_field( 'options' );
$options_packages         = get_field( 'options_packages' );
$additional_equipment     = get_field( 'additional_equipment' );
$port_installed_options   = get_field( 'port_installed_options' );
$dealer_installed_options = get_field( 'dealer_installed_options' );
$emissions                = get_field( 'emissions' );

?>
<div class="vdp__details">
	<details class="vdp__specifications">
		<summary class="vdp__specifications__title"><span>Specifications</span> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path d="M28.122 11.628l-1.646-1.689-10.354 10.8-10.354-10.8-1.646 1.689 12 12.311 12-12.311z"/></svg></summary>
		<div class="vdp__specifications__content">
			<?php if ( $mechanical_features ) : ?>
				<details class="vdp__specifications__item">
					<summary class="vdp__specifications__item__title"><span>Mechanical</span>
						<svg class="vdp__specifications__item__title__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
						<svg class="vdp__specifications__item__title__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg>
					</summary>
					<div class="vdp__specifications__item__content">
						<ul>
							<?php foreach ( $mechanical_features as $feature ) : ?>
								<li><?php echo esc_html( $feature['feature'] ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</details>
			<?php endif; ?>
			<?php if ( $exterior_features ) : ?>
				<details class="vdp__specifications__item">
					<summary class="vdp__specifications__item__title"><span>Exterior</span>
						<svg class="vdp__specifications__item__title__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
						<svg class="vdp__specifications__item__title__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg>
					</summary>
					<div class="vdp__specifications__item__content">
						<ul>
							<?php foreach ( $exterior_features as $feature ) : ?>
								<li><?php echo esc_html( $feature['feature'] ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</details>
			<?php endif; ?>
			<?php if ( $interior_features ) : ?>
				<details class="vdp__specifications__item">
					<summary class="vdp__specifications__item__title"><span>Interior</span>
						<svg class="vdp__specifications__item__title__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
						<svg class="vdp__specifications__item__title__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg>
					</summary>
					<div class="vdp__specifications__item__content">
						<ul>
							<?php foreach ( $interior_features as $feature ) : ?>
								<li><?php echo esc_html( $feature['feature'] ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</details>
			<?php endif; ?>
			<?php if ( $safety_features ) : ?>
				<details class="vdp__specifications__item">
					<summary class="vdp__specifications__item__title"><span>Safety</span>
						<svg class="vdp__specifications__item__title__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
						<svg class="vdp__specifications__item__title__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg>
					</summary>
					<div class="vdp__specifications__item__content">
						<ul>
							<?php foreach ( $safety_features as $feature ) : ?>
								<li><?php echo esc_html( $feature['feature'] ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</details>
			<?php endif; ?>
			<?php if ( $epa_features ) : ?>
				<details class="vdp__specifications__item">
					<summary class="vdp__specifications__item__title"><span>EPA</span>
						<svg class="vdp__specifications__item__title__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
						<svg class="vdp__specifications__item__title__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg>
					</summary>
					<div class="vdp__specifications__item__content">
						<ul>
							<?php foreach ( $epa_features as $feature ) : ?>
								<li><?php echo esc_html( $feature['feature'] ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</details>
			<?php endif; ?>
		</div>
	</details>

	<?php if ( $options || $options_packages || $additional_equipment || $port_installed_options || $dealer_installed_options || $emissions ) : ?>
		<details class="vdp__options">
			<summary class="vdp__options__title"><span>Options &amp; Accessories</span> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"><path d="M28.122 11.628l-1.646-1.689-10.354 10.8-10.354-10.8-1.646 1.689 12 12.311 12-12.311z"/></svg></summary>
			<div class="vdp__options__content">
				<?php if ( $options ) : ?>
					<details class="vdp__options__item">
						<summary class="vdp__options__item__title"><span>Options</span>
							<svg class="vdp__options__item__title__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
							<svg class="vdp__options__item__title__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg>
						</summary>
						<div class="vdp__options__item__content">
							<ul>
								<?php foreach ( $options as $option ) : ?>
									<li><?php echo esc_html( $option['option'] ); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					</details>
				<?php endif; ?>
				<?php if ( $options_packages ) : ?>
					<details class="vdp__options__item">
						<summary class="vdp__options__item__title"><span>Options Packages</span>
							<svg class="vdp__options__item__title__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
							<svg class="vdp__options__item__title__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg>
						</summary>
						<div class="vdp__options__item__content">
							<table>
								<?php foreach ( $options_packages as $option ) : ?>
									<tr>
										<td class="vdp__options__option-oem-code">
											<?php if ( $option['option_oem_code'] ) : ?>
												<?php echo esc_html( $option['option_oem_code'] ); ?>
											<?php endif; ?>
										</td>
										<td class="vdp__options__option-description">
											<?php if ( $option['option_description'] ) : ?>
												<?php echo esc_html( $option['option_description'] ); ?></td>
											<?php endif; ?>
										</td>
										<td class="vdp__options__option-msrp">
											<?php if ( $option['option_msrp'] ) : ?>
												<?php echo esc_html( '$' . custom_pretty_prices( (int) $option['option_msrp'] ) ); ?></td>
											<?php endif; ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</table>
						</div>
					</details>
				<?php endif; ?>
				<?php if ( $additional_equipment ) : ?>
					<details class="vdp__options__item">
						<summary class="vdp__options__item__title"><span>Additional Equipment</span>
							<svg class="vdp__options__item__title__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
							<svg class="vdp__options__item__title__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg>
						</summary>
						<div class="vdp__options__item__content">
							<table>
								<?php foreach ( $additional_equipment as $option ) : ?>
									<tr>
										<td class="vdp__options__option-oem-code">
											<?php if ( $option['option_oem_code'] ) : ?>
												<?php echo esc_html( $option['option_oem_code'] ); ?>
											<?php endif; ?>
										</td>
										<td class="vdp__options__option-description">
											<?php if ( $option['option_description'] ) : ?>
												<?php echo esc_html( $option['option_description'] ); ?></td>
											<?php endif; ?>
										</td>
										<td class="vdp__options__option-msrp">
											<?php if ( $option['option_msrp'] ) : ?>
												<?php echo esc_html( '$' . custom_pretty_prices( (int) $option['option_msrp'] ) ); ?></td>
											<?php endif; ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</table>
						</div>
					</details>
				<?php endif; ?>
				<?php if ( $port_installed_options ) : ?>
					<details class="vdp__options__item">
						<summary class="vdp__options__item__title"><span>Port Installed Options</span>
							<svg class="vdp__options__item__title__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
							<svg class="vdp__options__item__title__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg>
						</summary>
						<div class="vdp__options__item__content">
							<table>
								<?php foreach ( $port_installed_options as $option ) : ?>
									<tr>
										<td class="vdp__options__option-oem-code">
											<?php if ( $option['option_oem_code'] ) : ?>
												<?php echo esc_html( $option['option_oem_code'] ); ?>
											<?php endif; ?>
										</td>
										<td class="vdp__options__option-description">
											<?php if ( $option['option_description'] ) : ?>
												<?php echo esc_html( $option['option_description'] ); ?></td>
											<?php endif; ?>
										</td>
										<td class="vdp__options__option-msrp">
											<?php if ( $option['option_msrp'] ) : ?>
												<?php echo esc_html( '$' . custom_pretty_prices( (int) $option['option_msrp'] ) ); ?></td>
											<?php endif; ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</table>
						</div>
					</details>
				<?php endif; ?>
				<?php if ( $dealer_installed_options ) : ?>
					<details class="vdp__options__item">
						<summary class="vdp__options__item__title"><span>Dealer Installed Options</span>
							<svg class="vdp__options__item__title__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
							<svg class="vdp__options__item__title__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg>
						</summary>
						<div class="vdp__options__item__content">
							<table>
								<?php foreach ( $dealer_installed_options as $option ) : ?>
									<tr>
										<td class="vdp__options__option-oem-code">
											<?php if ( $option['option_oem_code'] ) : ?>
												<?php echo esc_html( $option['option_oem_code'] ); ?>
											<?php endif; ?>
										</td>
										<td class="vdp__options__option-description">
											<?php if ( $option['option_description'] ) : ?>
												<?php echo esc_html( $option['option_description'] ); ?></td>
											<?php endif; ?>
										</td>
										<td class="vdp__options__option-msrp">
											<?php if ( $option['option_msrp'] ) : ?>
												<?php echo esc_html( '$' . custom_pretty_prices( (int) $option['option_msrp'] ) ); ?></td>
											<?php endif; ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</table>
						</div>
					</details>
				<?php endif; ?>
				<?php if ( $emissions ) : ?>
					<details class="vdp__options__item">
						<summary class="vdp__options__item__title"><span>Emissions</span>
							<svg class="vdp__options__item__title__plus" height="32" viewBox="0 0 32 32" width="32" xmlns="http://www.w3.org/2000/svg"><path d="m26.88 17.28h-9.6v9.28h-2.56v-9.28h-9.28v-2.56h9.28v-9.6h2.56v9.6h9.6z"/></svg>
							<svg class="vdp__options__item__title__minus" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M5 17.375v-2.749h22v2.749H5z"/></svg>
						</summary>
						<div class="vdp__options__item__content">
							<table>
								<?php foreach ( $emissions as $option ) : ?>
									<tr>
										<td class="vdp__options__option-oem-code">
											<?php if ( $option['option_oem_code'] ) : ?>
												<?php echo esc_html( $option['option_oem_code'] ); ?>
											<?php endif; ?>
										</td>
										<td class="vdp__options__option-description">
											<?php if ( $option['option_description'] ) : ?>
												<?php echo esc_html( $option['option_description'] ); ?></td>
											<?php endif; ?>
										</td>
										<td class="vdp__options__option-msrp">
											<?php if ( $option['option_msrp'] ) : ?>
												<?php echo esc_html( '$' . custom_pretty_prices( (int) $option['option_msrp'] ) ); ?></td>
											<?php endif; ?>
										</td>
									</tr>
								<?php endforeach; ?>
							</table>
						</div>
					</details>
				<?php endif; ?>
			</div>
		</details>
	<?php endif; ?>
</div>
<?php
