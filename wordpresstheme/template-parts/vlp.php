<?php
/**
 * The template for displaying vehicle inventory and search results.
 *
 * @package Custom_Theme
 */

?>
<div class="vlp">
	<div class="vlp__inventory__columns">
		<div class="vlp__inventory__main">
			<div class="vlp__filter-tools">
				<?php get_template_part( 'template-parts/vlp', 'filter-selections' ); ?>
				<button id="vlpFilterButton" class="button button--primary--black vlp__filter__button" type="button">Refine Search</button>
				<?php get_template_part( 'template-parts/vlp', 'sort' ); ?>
			</div>
			<main class="vlp__inventory">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : ?>
						<?php

						the_post();
						get_template_part( 'template-parts/vlp', 'vehicle' );

						?>
					<?php endwhile; ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/vlp', 'none' ); ?>
				<?php endif; ?>
			</main>

			<nav class="page-navigation" aria-label="Page navigation">
				<?php echo custom_pagination(); ?>
			</nav>
		</div>

		<div class="vlp__inventory__sidebar">
			<?php get_template_part( 'template-parts/vlp', 'filter' ); ?>
		</div>
	</div>

	<div class="vlp__disclaimer">
		<p class="disclaimer">Subject to prior sale, plus government fees and any taxes, any finance charges, any dealer document processing charge, electronic filing charge, and any emission testing charge.</p>

		<p class="disclaimer">All of our vehicles are equipped with an anti-theft device to prevent theft from our inventory. The advertised price for all our vehicles does not include the price of the anti-theft device. This device can be purchased for an additional cost of $995, or may be removed at the customer's option.</p>

		<p class="disclaimer">In-transit vehicle will arrive within 30 days.</p>

		<?php get_template_part( 'template-parts/disclaimer', 'prop-65' ); ?>
	</div>

	<?php wp_reset_postdata(); ?>
	<div id="inTransitInfoTooltip" class="tooltip">The selected vehicle is in transit. Any ETA shown is only an estimate and is subject to change or delay. Please contact us for more information.<div class="tooltip__arrow" data-popper-arrow></div></div>
</div>
<?php
