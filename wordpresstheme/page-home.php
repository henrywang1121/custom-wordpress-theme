<?php

/**
 * The template for displaying the home page.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom_Theme
 */

get_header();

?>
<div class="breadcrumb-search__container">
	<div class="breadcrumb-search">
		<button class="breadcrumb-search__link"
			type="button"
			data-toggle="modal"
			data-target="#scheduleServiceModal"
			data-ga-cat="<?php echo esc_attr( get_the_title() . ' Page' ); ?>"
			data-ga-action="Click"
			data-ga-label="Schedule Service Button">Schedule Service</button>
		<div class="breadcrumb-search__cta">
			<form method="get" action="/inventory">
				<div class="breadcrumb-search__cta__search">
					<input type="search" name="s" placeholder="Search" required><button type="submit"><span class="visually-hidden">Search</span></button>
				</div>
			</form>
		</div>
	</div>
</div>
<main>
	<div class="home__upper">
		<?php get_template_part( 'template-parts/home', 'carousel' ); ?>
		<?php get_template_part( 'template-parts/home', 'filter' ); ?>
	</div>
	<?php

	$new_vehicle_menu = get_field( 'new_vehicle_menu', 'option' );

	?>
	<?php if ( ! empty( $new_vehicle_menu ) ) : ?>
		<?php

		$models            = array();
		$sedans_hatchbacks = array();
		$crossovers_suvs   = array();
		$sports_cars       = array();
		foreach ( $new_vehicle_menu as $vehicle ) {
			// Initialize model counts.
			$models[ $vehicle['inventory_model_name'] ] = 0;

			// Sort models into categories.
			if ( 'sedans_hatchbacks' === $vehicle['category'] ) {
				$sedans_hatchbacks[] = $vehicle;
			} elseif ( 'crossovers_suvs' === $vehicle['category'] ) {
				$crossovers_suvs[] = $vehicle;
			} elseif ( 'sports_cars' === $vehicle['category'] ) {
				$sports_cars[] = $vehicle;
			}
		}

		// Get all new vehicles to count each model.
		$args = array(
			'post_type'      => 'vehicle',
			'posts_per_page' => -1,
			'post_status'    => 'publish',
			'fields'         => 'ids',
			'no_found_rows'  => true,
			'tax_query'      => array(
				array(
					'taxonomy' => 'inventory',
					'field'    => 'slug',
					'terms'    => array( 'new-cars' ),
				),
			),
		);

		$new_cars = new WP_Query( $args );
		if ( ! empty( $new_cars ) ) {
			foreach ( $new_cars->posts as $vehicle_id ) {
				// Add each vehicle to model count.
				$model = get_field( 'model', $vehicle_id );
				if ( isset( $models[ $model ] ) ) {
					$models[ $model ] += 1;
				}
			}
		}

		?>
		<div class="home__new-vehicle-menu">
			<ul class="home__new-vehicle-menu__tabs" id="newVehicleMenuTabs" role="tablist">
				<?php if ( ! empty( $sedans_hatchbacks ) ) : ?>
					<li role="presentation">
						<button class="tab-link" id="sedans-hatchbacks-tab" data-target="#sedans-hatchbacks" type="button" role="tab" aria-controls="sedans-hatchbacks" aria-selected="true">Sedans &amp; Hatchbacks</button>
					</li>
				<?php endif; ?>
				<?php if ( ! empty( $crossovers_suvs ) ) : ?>
					<li role="presentation">
						<button class="tab-link active" id="crossovers-suvs-tab" data-target="#crossovers-suvs" type="button" role="tab" aria-controls="crossovers-suvs" aria-selected="false">Crossovers &amp; SUVs</button>
					</li>
				<?php endif; ?>
				<?php if ( ! empty( $sports_cars ) ) : ?>
					<li role="presentation">
						<button class="tab-link" id="sports-cars-tab" data-target="#sports-cars" type="button" role="tab" aria-controls="sports-cars" aria-selected="false">Sports Cars</button>
					</li>
				<?php endif; ?>
			</ul>
			<div class="home__new-vehicle-menu__tabs-content" id="newVehicleMenuTabsContent">
				<?php if ( ! empty( $sedans_hatchbacks ) ) : ?>
					<div class="tab-panel" id="sedans-hatchbacks" role="tabpanel" aria-labelledby="sedans-hatchbacks-tab">
						<h2>Sedans &amp; Hatchbacks</h2>
						<div class="home__new-vehicle-menu__tabs-content__carousel">
							<?php foreach ( $sedans_hatchbacks as $vehicle ) : ?>
								<?php

								$name           = $vehicle['name'];
								$image          = $vehicle['image'];
								$inventory_link = $vehicle['link'];
								$count          = $models[ $vehicle['inventory_model_name'] ];

								?>
								<div class="home__new-vehicle-menu__tabs-content__carousel__carousel-cell">
									<a href="<?php echo esc_url( $inventory_link['url'] ); ?>">
										<span class="home__new-vehicle-menu__tabs-content__vehicle-name"><?php echo esc_html( $name ); ?></span>
										<?php if ( ! empty( $image['id'] ) ) : ?>
											<?php echo wp_get_attachment_image( $image['id'], 'full' ); ?>
										<?php endif; ?>
										<span class="home__new-vehicle-menu__tabs-content__vehicle-count"><?php echo esc_html( $count . ' Available' ); ?></span>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $crossovers_suvs ) ) : ?>
					<div class="tab-panel show" id="crossovers-suvs" role="tabpanel" aria-labelledby="crossovers-suvs-tab">
						<h2>Crossovers &amp; SUVs</h2>
						<div class="home__new-vehicle-menu__tabs-content__carousel">
							<?php foreach ( $crossovers_suvs as $vehicle ) : ?>
								<?php

								$name           = $vehicle['name'];
								$image          = $vehicle['image'];
								$inventory_link = $vehicle['link'];
								$count          = $models[ $vehicle['inventory_model_name'] ];

								?>
								<div class="home__new-vehicle-menu__tabs-content__carousel__carousel-cell">
									<a href="<?php echo esc_url( $inventory_link['url'] ); ?>">
										<span class="home__new-vehicle-menu__tabs-content__vehicle-name"><?php echo esc_html( $name ); ?></span>
										<?php if ( ! empty( $image['id'] ) ) : ?>
											<?php echo wp_get_attachment_image( $image['id'], 'full' ); ?>
										<?php endif; ?>
										<span class="home__new-vehicle-menu__tabs-content__vehicle-count"><?php echo esc_html( $count . ' Available' ); ?></span>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $sports_cars ) ) : ?>
					<div class="tab-panel" id="sports-cars" role="tabpanel" aria-labelledby="sports-cars-tab">
						<h2>Sports Cars</h2>
						<div class="home__new-vehicle-menu__tabs-content__carousel">
							<?php foreach ( $sports_cars as $vehicle ) : ?>
								<?php

								$name           = $vehicle['name'];
								$image          = $vehicle['image'];
								$inventory_link = $vehicle['link'];
								$count          = $models[ $vehicle['inventory_model_name'] ];

								?>
								<div class="home__new-vehicle-menu__tabs-content__carousel__carousel-cell">
									<a href="<?php echo esc_url( $inventory_link['url'] ); ?>">
										<span class="home__new-vehicle-menu__tabs-content__vehicle-name"><?php echo esc_html( $name ); ?></span>
										<?php if ( ! empty( $image['id'] ) ) : ?>
											<?php echo wp_get_attachment_image( $image['id'], 'full' ); ?>
										<?php endif; ?>
										<span class="home__new-vehicle-menu__tabs-content__vehicle-count"><?php echo esc_html( $count . ' Available' ); ?></span>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
	<?php

	get_template_part(
		'template-parts/content',
		'copy',
		array(
			'alignment'  => 'center',
			'background' => 'white',
			'headline'   => get_field( 'home_page_headline' ),
			'body'       => get_field( 'home_page_content' ),
		)
	);

	?>
	<div class="tiles__container">
		<div class="tiles">
			<div class="tile">
				<div class="tile__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/home-tiles-current-offers.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/home-tiles-current-offers.jpg.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/home-tiles-current-offers.jpg' ); ?>"
							loading="lazy"
							decoding="async"
							width="1362"
							height="600"
							alt="">
					</picture>
				</div>
				<div class="tile__title">Current Offers</div>
				<a href="/special-offers/" class="tile__button button button--primary--black">See Offers</a>
			</div>
			<div class="tile">
				<div class="tile__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/home-tiles-service-department.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/home-tiles-service-department.jpg.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/home-tiles-service-department.jpg' ); ?>"
							loading="lazy"
							decoding="async"
							width="1362"
							height="600"
							alt="">
					</picture>
				</div>
				<div class="tile__title">Service Department</div>
				<a href="/car-service-center/" class="tile__button button button--primary--black">Schedule Service</a>
			</div>
			<div class="tile">
				<div class="tile__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/home-tiles-new-vehicles.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/home-tiles-new-vehicles.jpg.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/home-tiles-new-vehicles.jpg' ); ?>"
							loading="lazy"
							decoding="async"
							width="1362"
							height="600"
							alt="">
					</picture>
				</div>
				<div class="tile__title">New Vehicles</div>
				<a href="/inventory/?inventory=new-cars" class="tile__button button button--primary--black">Shop New Vehicles</a>
			</div>
			<div class="tile">
				<div class="tile__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/home-tiles-cpo.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/home-tiles-cpo.jpg.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/home-tiles-cpo.jpg' ); ?>"
							loading="lazy"
							decoding="async"
							width="1362"
							height="600"
							alt="">
					</picture>
				</div>
				<div class="tile__title">Certified Pre-Owned</div>
				<a href="/inventory/?inventory=certified-pre-owned-cars" class="tile__button button button--primary--black">Shop Pre-Owned</a>
			</div>
		</div>
	</div>
</main>
<?php // get_template_part( 'template-parts/roadster', 'video' ); ?>
<?php

get_footer();
