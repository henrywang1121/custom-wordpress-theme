<?php
/**
 * The template for displaying dealer awards.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom_Theme
 */

?>
<div class="dealer-awards__container">
	<div class="dealer-awards">
		<div class="dealer-awards__title">Awards</div>
		<div class="dealer-awards__content">See our awards below.</div>
		<div class="dealer-awards__carousel">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/dealer-awards-car-gold-cup-2019.jpg' ); ?>"
				class="dealer-awards__carousel__cell"
				width="437"
				height="163"
				alt="car Gold Cup 2019">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/dealer-awards-car-presidents-club-2019.jpg' ); ?>"
				class="dealer-awards__carousel__cell"
				width="471"
				height="163"
				alt="car President's Club 2019">
		</div>
	</div>
</div>
<script defer>
	jQuery(function ($) {
		// Dealer Awards Carousel.
		const $dealerAwardsCarousel = $('.dealer-awards__carousel');
		const dealerAwardsOptions = {
			freeScroll: false,
			groupCells: true,
			imagesLoaded: true,
			percentPosition: false,
			lazyload: true,
			arrowShape: {
				x0: 25,
				x1: 75,
				y1: 50,
				x2: 77,
				y2: 47.5,
				x3: 30,
			},
		};
		$dealerAwardsCarousel.flickity(dealerAwardsOptions);

		matchMedia('screen and (max-width: 767px)').addEventListener(
		'change',
		function () {
			if (this.matches) {
				if ($dealerAwardsCarousel.data('flickity')) {
					$dealerAwardsCarousel.flickity('destroy');
				}
				$dealerAwardsCarousel.flickity(dealerAwardsOptions);
			}
		}
		);

		matchMedia('screen and (min-width: 992px)').addEventListener(
		'change',
		function () {
			if (this.matches) {
				if ($dealerAwardsCarousel.data('flickity')) {
					$dealerAwardsCarousel.flickity('destroy');
				}
				$dealerAwardsCarousel.flickity(dealerAwardsOptions);
			}
		}
		);
	});
</script>
<?php
