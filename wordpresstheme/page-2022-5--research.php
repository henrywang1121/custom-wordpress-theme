<?php
/**
 * The template for displaying model research pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Custom_Theme
 */

get_header();

?>
<div class="breadcrumb-search__container">
	<div class="breadcrumb-search">
		<div class="breadcrumb-search__content breadcrumb-search__content--research">
			<h1 class="breadcrumb-search__title">2022 MX-5 Miata RF</h1>
		</div>
		<!--<div class="breadcrumb-search__cta">
			<a class="button button--primary--black"
				href="/inventory/?inventory=new-cars&model=MX-5%20Miata%20RF">Explore MX-5 Miata RF Inventory</a>
		</div>-->
	</div>
</div>

<div class="research">
	<div class="research__hero">
		<picture>
			<source type="image/avif"
				srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-hero.avif' ); ?>">
			<source type="image/webp"
				srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-hero.jpg.webp' ); ?>">
			<img loading="eager"
				decoding="auto"
				src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-hero.jpg' ); ?>"
				width="960"
				height="552"
				alt="">
		</picture>
		<div class="research__hero__headline">
			<span>The 2022 car MX-5 Miata RF</span>
			Disruptive by Design
		</div>
		<div class="research__hero__ctas">
			<p class="disclaimer">car MX-5 Miata RF Grand Touring shown.</p>
			<!--<a class="button button--primary--white" href="/inventory/?inventory=new-cars&model=MX-5%20Miata%20RF">View Inventory</a>-->
			<?php

			$template_part = array(
				'template-parts/form',
				'contact',
				array(
					'title' => 'Schedule a Test Drive',
				),
			);

			?>
			<!--<button class="button button--secondary--transparent ga-event"
				type="button"
				data-toggle="modal"
				data-target="#scheduleTestDriveModal"
				data-modal-id="scheduleTestDriveModal"
				data-modal-template-part="<?php echo esc_attr( wp_json_encode( $template_part ) ); ?>"
				data-ga-cat="2022 car MX-5 Miata RF"
				data-ga-action="Click"
				data-ga-label="Schedule Test Drive Button">Schedule Test Drive</button>-->
		</div>
	</div>

	<div class="research__trims">
		<h2><span>car MX-5 Miata RF Trims</span> Pick Your Style</h2>
		<div class="research__trims__carousel">
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-trims-club.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-trims-club.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-trims-club.png' ); ?>"
							width="960"
							height="552"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">Club</h3>
					<div class="research__trims__carousel__details__price">Starting at $38,550<sup>3</sup></div>
					<p class="disclaimer">Sold Out</p>
					<ul>
						<li>Bose&reg; 9-speaker audio system</li>
						<li>17-inch alloy wheels</li>
						<li>Black front air dam and rear lip spoiler</li>
						<li>Special order only</li>
					</ul>
					<!--<a class="button button--primary--black" href="#form">Start Order Process</a>-->
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-trims-grand-touring.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-trims-grand-touring.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-trims-grand-touring.png' ); ?>"
							width="960"
							height="552"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">Grand Touring</h3>
					<div class="research__trims__carousel__details__price">Starting at $35,350<sup>3</sup></div>
					<p class="disclaimer">Sold Out</p>
					<ul>
						<li>Adaptive Front-lighting System</li>
						<li>Heated leather-trimmed seats</li>
						<li>Wireless Apple CarPlay&trade;<sup>5</sup></li>
					</ul>
					<!--<a class="button button--primary--black" href="/inventory/?inventory=new-cars&model=MX-5%20Miata%20RF&trim=Grand%20Touring">View Inventory</a>-->
				</div>
			</div>
		</div>
		<div class="research__trims__carousel__nav">
			<div class="research__trims__carousel__nav__cell" data-target-trim="club">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-trims-club.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-trims-club.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-trims-club.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">Club</h4>
				<div class="research__trims__carousel__nav__price">Starting at $38,550<sup>3</sup></div>
				<p class="disclaimer">Sold Out</p>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-trims-grand-touring.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-trims-grand-touring.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-trims-grand-touring.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">Grand Touring</h4>
				<div class="research__trims__carousel__nav__price">Starting at $35,350<sup>3</sup></div>
				<p class="disclaimer">Sold Out</p>
			</div>
		</div>
		<div class="disclaimers">
			<p class="disclaimer"><sup>3</sup>MSRP excludes taxes, title, license fees and $1,065 destination charge (Alaska $1,110). Vehicle shown may be priced higher. Actual dealer price will vary. See dealer for complete details.</p>
			<p class="disclaimer"><sup>5</sup>Requires compatible iPhone and standard text and data rates apply. Apple is solely responsible for CarPlay functionality and its terms and privacy statements apply. Don&rsquo;t drive while distracted or while using a hand-held device. Apple CarPlay, iPhone and Siri are trademarks of Apple Inc.</p>
		</div>
	</div>

	<div class="research__gallery">
		<div class="research__gallery__row">
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-1.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-1.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-1.jpg' ); ?>"
						width="1800"
						height="1013"
						alt="">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-2.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-2.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-2.jpg' ); ?>"
						width="1800"
						height="1013"
						alt="">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-3.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-3.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-3.jpg' ); ?>"
						width="1800"
						height="1013"
						alt="">
				</picture>
			</div>
		</div>
		<div class="research__gallery__row">
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-4.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-4.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-4.jpg' ); ?>"
						width="1800"
						height="1013"
						alt="">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-5.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-5.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-5.jpg' ); ?>"
						width="1800"
						height="1013"
						alt="">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-6.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-6.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gallery-6.jpg' ); ?>"
						width="1800"
						height="1013"
						alt="">
				</picture>
			</div>
		</div>
	</div>

	<div class="research__color-specials">
		<div class="research__color">
			<h3>Select a Color</h3>
			<!-- Vehicle area tabs -->
			<ul class="research__color__area__tabs" id="researchColorAreaTabs" role="tablist">
				<li role="presentation">
					<button class="tab-link active" id="exterior-tab" data-target="#exterior" type="button" role="tab" aria-controls="exterior" aria-selected="true">Exterior</button>
				</li>
				<li role="presentation">
					<button class="tab-link" id="interior-tab" data-target="#interior" type="button" role="tab" aria-controls="interior" aria-selected="false">Interior</button>
				</li>
			</ul>

			<!-- Vehicle area content -->
			<div class="research__color__area__tabs-content" id="researchColorAreaTabsContent">
				<div class="tab-panel show" id="exterior" role="tabpanel" aria-labelledby="exterior-tab">

					<!-- Exterior trim tabs -->
					<ul class="research__color__exterior__trim__tabs" id="researchColorExteriorTrimTabs" role="tablist">
						<li role="presentation">
							<button class="tab-link active" id="exterior-club-tab" data-target="#exterior-club" type="button" role="tab" aria-controls="exterior-club" aria-selected="true">Club</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="exterior-grand-touring-tab" data-target="#exterior-grand-touring" type="button" role="tab" aria-controls="exterior-grand-touring" aria-selected="false">Grand Touring</button>
						</li>
					</ul>

					<!-- Exterior trim content -->
					<div class="research__color__exterior__trim__tabs-content" id="researchColorExteriorTrimTabsContent">

						<!-- Exterior Club Trim -->
						<div class="tab-panel show" id="exterior-club" role="tabpanel" aria-labelledby="exterior-club-tab">
							<?php

							$exterior_club_colors = array(
								array(
									'name' => 'Soul Red Crystal Metallic | Extra $595',
									'slug' => 'soul-red-crystal',
									'hex'  => '#890000',
								),
								array(
									'name' => 'Arctic White',
									'slug' => 'arctic-white',
									'hex'  => '#ffffff',
								),
								array(
									'name' => 'Jet Black Mica',
									'slug' => 'jet-black',
									'hex'  => '#101312',
								),
								array(
									'name' => 'Polymetal Gray Metallic | Extra $395',
									'slug' => 'polymetal-gray',
									'hex'  => '#747d81',
								),
								array(
									'name' => 'Machine Gray Metallic | Extra $595',
									'slug' => 'machine-gray',
									'hex'  => '#4f535b',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos">
									<?php foreach ( $exterior_club_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-club-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-club-' . $color['slug'] . '.png.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-club-' . $color['slug'] . '.png' ); ?>"
													width="1222"
													height="703"
													alt="2022 MX-5 Miata Club <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $exterior_club_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">Club <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<!-- Exterior Grand Touring Trim -->
						<div class="tab-panel" id="exterior-grand-touring" role="tabpanel" aria-labelledby="exterior-grand-touring-tab">
							<?php

							$exterior_grand_touring_colors = array(
								array(
									'name' => 'Soul Red Crystal Metallic | Extra $595',
									'slug' => 'soul-red-crystal',
									'hex'  => '#890000',
								),
								array(
									'name' => 'Jet Black Mica',
									'slug' => 'jet-black',
									'hex'  => '#101312',
								),
								array(
									'name' => 'Polymetal Gray Metallic | Extra $395',
									'slug' => 'polymetal-gray',
									'hex'  => '#747d81',
								),
								array(
									'name' => 'Machine Gray Metallic | Extra $595',
									'slug' => 'machine-gray',
									'hex'  => '#4f535b',
								),
								array(
									'name' => 'Deep Crystal Blue Mica',
									'slug' => 'deep-crystal-blue',
									'hex'  => '#273754',
								),
								array(
									'name' => 'Snowflake White Pearl Mica | Extra $395',
									'slug' => 'snowflake-white-pearl',
									'hex'  => '#ffffff',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos">
									<?php foreach ( $exterior_grand_touring_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gt-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gt-' . $color['slug'] . '.png.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gt-' . $color['slug'] . '.png' ); ?>"
													width="1222"
													height="703"
													alt="2022 MX-5 Miata Grand Touring <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $exterior_grand_touring_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">Grand Touring <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

					</div>

				</div>

				<div class="tab-panel" id="interior" role="tabpanel" aria-labelledby="interior-tab">

					<!-- Interior trim tabs -->
					<ul class="research__color__interior__trim__tabs" id="researchColorInteriorTrimTabs" role="tablist">
						<li role="presentation">
							<button class="tab-link active" id="interior-club-tab" data-target="#interior-club" type="button" role="tab" aria-controls="interior-club" aria-selected="true">Club</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="interior-grand-touring-tab" data-target="#interior-grand-touring" type="button" role="tab" aria-controls="interior-grand-touring" aria-selected="false">Grand Touring</button>
						</li>
					</ul>

					<!-- Interior trim content -->
					<div class="research__color__interior__trim__tabs-content" id="researchColorInteriorTrimTabsContent">

						<!-- Interior Club Trim -->
						<div class="tab-panel show" id="interior-club" role="tabpanel" aria-labelledby="interior-club-tab">
							<?php

							$interior_club_colors = array(
								array(
									'name' => 'Black Cloth with Light Gray Stitching',
									'slug' => 'black-cloth',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos">
									<?php foreach ( $interior_club_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-club-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-club-' . $color['slug'] . '.png.webp' ); ?>">
												<img loading="lazy"
														decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-club-' . $color['slug'] . '.png' ); ?>"
													width="1222"
													height="703"
													alt="2022 MX-5 Miata RF Club <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $interior_club_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">Club <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<!-- Interior Grand Touring Trim -->
						<div class="tab-panel" id="interior-grand-touring" role="tabpanel" aria-labelledby="interior-grand-touring-tab">
							<?php

							$interior_grand_touring_colors = array(
								array(
									'name' => 'Black Leather',
									'slug' => 'black-leather',
									'hex'  => '#101312',
								),
								array(
									'name' => 'White Nappa Leather | Extra $300',
									'slug' => 'white-leather',
									'hex'  => '#ffffff',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos">
									<?php foreach ( $interior_grand_touring_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gt-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gt-' . $color['slug'] . '.png.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-gt-' . $color['slug'] . '.png' ); ?>"
													width="1222"
													height="703"
													alt="2022 MX-5 Miata RF Grand Touring <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $interior_grand_touring_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">Grand Touring <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="research__specials">
			<div class="research__specials__carousel">
				<div class="research__specials__carousel__cell"></div>
				<div class="research__specials__carousel__cell"></div>
				<div class="research__specials__carousel__cell"></div>
			</div>
		</div>
	</div>

	<div class="research__highlights">
		<ul class="research__highlights__tabs" id="researchHighlightsTabs" role="tablist">
			<li role="presentation">
				<button class="tab-link active" id="technology-tab" data-target="#technology" type="button" role="tab" aria-controls="technology" aria-selected="true">Technology</button>
			</li>
			<li role="presentation">
				<button class="tab-link" id="safety-tab" data-target="#safety" type="button" role="tab" aria-controls="safety" aria-selected="false">Safety</button>
			</li>
			<li role="presentation">
				<button class="tab-link" id="design-tab" data-target="#design" type="button" role="tab" aria-controls="design" aria-selected="false">Design</button>
			</li>
			<li role="presentation">
				<button class="tab-link" id="performance-tab" data-target="#performance" type="button" role="tab" aria-controls="performance" aria-selected="false">Performance</button>
			</li>
		</ul>
		<div class="research__highlights__tabs-content" id="researchHighlightsTabsContent">
			<div class="tab-panel show" id="technology" role="tabpanel" aria-labelledby="technology-tab">
				<div class="research__highlights__carousel">
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-technology-seamless-connectivity.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-technology-seamless-connectivity.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-technology-seamless-connectivity.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Technology</div>
						<div class="research__highlights__card__title">Seamless Connectivity</div>
						<div class="research__highlights__card__body">
							<p>With a greater level of technological integration, our car Connect&trade; Infotainment System<sup>1</sup> allows you to immerse yourself in each drive while staying in touch with the world at large with Apple CarPlay&trade;<sup>2</sup> integration through your compatible iPhone&reg;.</p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-technology-apple-carplay.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-technology-apple-carplay.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-technology-apple-carplay.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Technology</div>
						<div class="research__highlights__card__title">Apple CarPlay&trade;</div>
						<div class="research__highlights__card__body">Our car Connect&trade; Infotainment System<sup>1</sup> creates a seamless connectivity that allows you to focus on the drive. Apple CarPlay&trade;<sup>2</sup> is now standard in all 2021 car MX-5 RF models and Grand Touring models are further enhanced by a wireless connection to Apple CarPlay&trade;<sup>2</sup> through your compatible iPhone&reg;.</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-technology-commander.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-technology-commander.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-technology-commander.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Technology</div>
						<div class="research__highlights__card__title">Stay within reach</div>
						<div class="research__highlights__card__body">With the MX-5 RF Commander control, you can intuitively navigate through playlists, driving directions, contacts and more without taking your eyes off the road.<sup>1</sup></div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-technology-bose.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-technology-bose.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-technology-bose.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Technology</div>
						<div class="research__highlights__card__title">Optimal Listening with Bose&reg;</div>
						<div class="research__highlights__card__body">
							<p>The sounds of the open road deserve a worthy complement. And the available 9-speaker Bose&reg; audio system is just that. With speakers specifically tuned and oriented for the MX-5 RF&rsquo;s cabin, it delivers a pitch perfect acoustic experience, even with the top down. What&rsquo;s more, a 3-year traffic and travel link subscription to SiriusXM<sup>3</sup> is also available to enjoy.</p>
						</div>
					</div>
				</div>
				<div class="disclaimers">
					<p class="disclaimer"><sup>1</sup>Don&rsquo;t drive while distracted. Even with voice commands, only use car Connect™/other devices when safe. Some features may require cellular or Wi-Fi service; some features may be locked out while the vehicle is in motion. Not all features are compatible with all phones. Message and data rates may apply.</p>
					<p class="disclaimer"><sup>2</sup>Requires compatible iPhone and standard text and data rates apply. Apple is solely responsible for CarPlay functionality and its terms and privacy statements apply. Don&rsquo;t drive while distracted or while using a hand-held device. Apple CarPlay, iPhone and Siri are trademarks of Apple Inc.</p>
					<p class="disclaimer"><sup>3</sup>SiriusXM audio and data services each require a subscription sold separately, or as a package, by Sirius XM Radio Inc. If you decide to continue service after your trial, the subscription plan you choose will automatically renew thereafter and you will be charged according to your chosen payment method at then-current rates. Fees and taxes apply. To cancel you must call SiriusXM at 1-866-635-2349. See SiriusXM Customer Agreement for complete terms at www.siriusxm.com. All fees and programming subject to change. Current information and features may not be available in all locations. Sirius, XM and all related marks and logos are trademarks of Sirius XM Radio Inc.</p>
				</div>
			</div>
			<div class="tab-panel" id="safety" role="tabpanel" aria-labelledby="safety-tab">
				<div class="research__highlights__carousel">
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-safety-i-activsense.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-safety-i-activsense.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-safety-i-activsense.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title"><span class="lowercase">i</span>-Activsense&reg; Safety Technology</div>
						<div class="research__highlights__card__body">When it comes to a transcendent driving experience, confidence is everything. With i-Activsense&reg; safety technology<sup>5</sup>, sophisticated safety features alert you to hazards to help you avoid collisions&mdash;or lessen their impact.</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-safety-adaptive-lighting.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-safety-adaptive-lighting.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-safety-adaptive-lighting.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">Adaptive Front-Lighting System</div>
						<div class="research__highlights__card__body">
							<p>This available system is designed to help you see around corners at night. As you turn a corner, the headlights pivot in the direction of your turn, improving visibility and allowing you to spot potential hazards ahead.</p>
							<p class="disclaimer">For illustration purposes only<sup>6</sup></p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-safety-traffic-sign.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-safety-traffic-sign.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-safety-traffic-sign.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">Traffic Sign Recognition</div>
						<div class="research__highlights__card__body">
							<p>To help you stay alert and informed, the available Traffic Sign Recognition System<sup>7</sup> can show you Speed Limit, Stop and Do Not Enter information in the MX-5 Miata RF&rsquo;s 4.6-inch full-color LCD display. The system&rsquo;s strategically mounted camera scans for road signs, so you can keep your focus on what&rsquo;s ahead.</p>
							<p class="disclaimer">For illustration purposes only<sup>6</sup></p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-safety-rear-cross-traffic.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-safety-rear-cross-traffic.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-safety-rear-cross-traffic.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">Rear Cross Traffic Alert</div>
						<div class="research__highlights__card__body">
							<p>When backing up, this feature helps detect a vehicle approaching from the side and promptly alerts the driver with an audible warning<sup>4</sup>, as well as a visual warning, in either side mirror and the display screen.</p>
							<p class="disclaimer">For illustration purposes only<sup>6</sup></p>
						</div>
					</div>
				</div>
				<div class="disclaimers">
					<p class="disclaimer"><sup>4</sup>Always check your mirrors. Be aware of the traffic around you. There are limitations to the range and detection of the system. Please see your Owner&rsquo;s Manual for further details.</p>
					<p class="disclaimer"><sup>5</sup>i-Activsense&reg; safety features are not a substitute for safe and attentive driving. There are limitations to the range and detection of each safety feature. Safety features vary based on vehicle package and trim combinations. Please see your Owner&rsquo;s Manual for further details.</p>
					<p class="disclaimer"><sup>6</sup>The illustration displayed is for feature explanation only. It is neither technically accurate nor to scale.</p>
					<p class="disclaimer"><sup>7</sup>Traffic Sign Recognition System is not a substitute for safe and attentive driving. Factors including weather and the condition of the traffic sign can impact recognition or display of the sign. Always check traffic signs visually while driving. Please see your Owner&rsquo;s Manual for further details.</p>
				</div>
			</div>
			<div class="tab-panel" id="design" role="tabpanel" aria-labelledby="design-tab">
				<div class="research__highlights__carousel">
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-design-sheet-metal.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-design-sheet-metal.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-design-sheet-metal.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">The Retractable Fastback</div>
						<div class="research__highlights__card__title">Sheet metal cloaked in seduction</div>
						<div class="research__highlights__card__body">
							<p>At first glance, the MX-5 RF captivates your attention and won&rsquo;t let go. The flowing lines of its silhouette accentuate the styling and tear drop shaped cabin. When the open air beckons, the rigid hardtop retracts into the trunk, in about 13 seconds, without sacrificing space for your weekend getaway essentials.</p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-design-details-indulgence.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-design-details-indulgence.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-design-details-indulgence.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Design</div>
						<div class="research__highlights__card__title">The details of indulgence</div>
						<div class="research__highlights__card__body">Refined details are integral to the joy of driving. Sophisticated accents are showcased throughout the MX-5 Miata RF cabin. New for 2021, available White Nappa leather seats bring a rejuvenating touch to Grand Touring interiors.</div>
					</div>
				</div>
			</div>
			<div class="tab-panel" id="performance" role="tabpanel" aria-labelledby="performance-tab">
				<div class="research__highlights__carousel">
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-performance-designed-seduce.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-performance-designed-seduce.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-rf-performance-designed-seduce.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">PERFORMANCE</div>
						<div class="research__highlights__card__title">Designed to seduce. Engineered to astound.</div>
						<div class="research__highlights__card__body">Drawing from the purity of the MX-5 Miata Roadster, the MX-5 Miata RF connects car and driver with elegance and ingenuity. Its Skyactiv&reg;-G 2.0 engine delivers 181 hp and 151 lb-ft of torque to create an ideal power-to-weight ratio. The placement of this engine helps the MX-5 RF maintain a nearly perfect 50/50 weight balance. Behind the wheel, you feel as though your MX-5 RF is an extension of your body, anticipating and answering your every command.</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="research__timeline">
		<div class="research__timeline__carousel">
			<div class="research__timeline__carousel__cell">
				<div class="research__timeline__carousel__intro">
					<div class="research__timeline__carousel__photo">
						<picture>
							<source type="image/avif"
								srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-1.avif' ); ?>">
							<source type="image/webp"
								srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-1.png.webp' ); ?>">
							<img loading="lazy"
									decoding="async"
								src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-1.png' ); ?>"
								width="169"
								height="24"
								alt="MX-5 Logo">
						</picture>
					</div>
					<div class="research__timeline__carousel__details">
						<div class="research__timeline__carousel__details__pre-title">A Family of Distinction</div>
						<h4 class="research__timeline__carousel__details__title">The History of the MX-5 Miata</h4>
						<p class="research__timeline__carousel__details__body">Over its four generations, the MX-5 Miata has remained an authentic lightweight sports car. Its engaging open-air driving style has been discovered by over a million people all around the world. Making the MX-5 Miata the best-selling roadster of all time.</p>
					</div>
				</div>
				<div class="research__timeline__carousel__timeline">
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
				</div>
			</div>
			<div class="research__timeline__carousel__cell">
				<div class="research__timeline__carousel__cols">
					<div class="research__timeline__carousel__details">
						<div class="research__timeline__carousel__details__pre-title">Generation 1</div>
						<h4 class="research__timeline__carousel__details__title">Model NA 1989&ndash;1997</h4>
						<ul>
							<li>First introduced at the Chicago Auto Show on Feb. 10, 1989</li>
							<li>A short, direct shift made changing gears a joy</li>
							<li>Rounded taillights begin a signature design detail</li>
						</ul>
					</div>
					<div class="research__timeline__carousel__photo">
						<picture>
							<source type="image/avif"
								srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-2.avif' ); ?>">
							<source type="image/webp"
								srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-2.png.webp' ); ?>">
							<img loading="lazy"
									decoding="async"
								src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-2.png' ); ?>"
								width="511"
								height="163"
								alt="">
						</picture>
					</div>
				</div>
				<div class="research__timeline__carousel__year">1989</div>
				<div class="research__timeline__carousel__timeline">
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
				</div>
			</div>
			<div class="research__timeline__carousel__cell">
				<div class="research__timeline__carousel__cols">
					<div class="research__timeline__carousel__details">
						<div class="research__timeline__carousel__details__pre-title">Generation 2</div>
						<h4 class="research__timeline__carousel__details__title">Model NB 1998&ndash;2004</h4>
						<ul>
							<li>Engine power increased slightly</li>
							<li>Convertible top included glass rear window</li>
							<li>New headlights replaced the heavy pop-ups</li>
						</ul>
					</div>
					<div class="research__timeline__carousel__photo">
						<picture>
							<source type="image/avif"
								srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-3.avif' ); ?>">
							<source type="image/webp"
								srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-3.png.webp' ); ?>">
							<img loading="lazy"
									decoding="async"
								src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-3.png' ); ?>"
								width="512"
								height="183"
								alt="">
						</picture>
					</div>
				</div>
				<div class="research__timeline__carousel__year">1998</div>
				<div class="research__timeline__carousel__timeline">
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
				</div>
			</div>
			<div class="research__timeline__carousel__cell">
				<div class="research__timeline__carousel__cols">
					<div class="research__timeline__carousel__details">
						<div class="research__timeline__carousel__details__pre-title">Generation 3</div>
						<h4 class="research__timeline__carousel__details__title">Model NC 2005&ndash;2014</h4>
						<ul>
							<li>In 2000, the MX-5 Miata was certified as the world's best-selling roadster</li>
							<li>Steering wheel controls were introduced for a more premium feel</li>
							<li>A Power Retractable Hard Top was offered for the first time</li>
						</ul>
					</div>
					<div class="research__timeline__carousel__photo">
						<picture>
							<source type="image/avif"
								srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-4.avif' ); ?>">
							<source type="image/webp"
								srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-4.png.webp' ); ?>">
							<img loading="lazy"
									decoding="async"
								src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-4.png' ); ?>"
								width="452"
								height="165"
								alt="">
						</picture>
					</div>
				</div>
				<div class="research__timeline__carousel__year">2005</div>
				<div class="research__timeline__carousel__timeline">
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
				</div>
			</div>
			<div class="research__timeline__carousel__cell">
				<div class="research__timeline__carousel__cols">
					<div class="research__timeline__carousel__details">
						<div class="research__timeline__carousel__details__pre-title">Generation 4</div>
						<h4 class="research__timeline__carousel__details__title">Model ND Revealed in 2014</h4>
						<ul>
							<li>The design takes a sharp turn in a new direction</li>
							<li>Curb weight is reduced by 148 pounds or more</li>
							<li>Details like rounded taillights help keep the MX-5 Miata heritage intact</li>
						</ul>
					</div>
					<div class="research__timeline__carousel__photo">
						<picture>
							<source type="image/avif"
								srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-5.avif' ); ?>">
							<source type="image/webp"
								srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-5.png.webp' ); ?>">
							<img loading="lazy"
									decoding="async"
								src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-5.png' ); ?>"
								width="468"
								height="166"
								alt="">
						</picture>
					</div>
				</div>
				<div class="research__timeline__carousel__year">2014</div>
				<div class="research__timeline__carousel__timeline">
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
				</div>
			</div>
			<div class="research__timeline__carousel__cell">
				<div class="research__timeline__carousel__cols">
					<div class="research__timeline__carousel__details">
						<div class="research__timeline__carousel__details__pre-title">Generation 4</div>
						<h4 class="research__timeline__carousel__details__title">2017 car MX-5 Miata RF</h4>
						<ul>
							<li>Introduction of the retractable fastback roof</li>
							<li>Same great driving dynamics as the original</li>
							<li>Available in a new Signature Machine Gray Metallic paint</li>
						</ul>
					</div>
					<div class="research__timeline__carousel__photo">
						<picture>
							<source type="image/avif"
								srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-6.avif' ); ?>">
							<source type="image/webp"
								srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-6.png.webp' ); ?>">
							<img loading="lazy"
									decoding="async"
								src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-6.png' ); ?>"
								width="468"
								height="166"
								alt="">
						</picture>
					</div>
				</div>
				<div class="research__timeline__carousel__year">2016</div>
				<div class="research__timeline__carousel__timeline">
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
					<div class="research__timeline__carousel__timeline__tick"></div>
				</div>
			</div>
		</div>
		<div class="research__timeline__carousel__nav">
			<div class="research__timeline__carousel__nav__cell">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-1.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-1.png.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-1.png' ); ?>"
						width="38"
						height="38"
						alt="">
				</picture>
			</div>
			<div class="research__timeline__carousel__nav__cell">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-2.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-2.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-2.jpg' ); ?>"
						width="38"
						height="38"
						alt="">
				</picture>
			</div>
			<div class="research__timeline__carousel__nav__cell">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-3.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-3.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-3.jpg' ); ?>"
						width="38"
						height="38"
						alt="">
				</picture>
			</div>
			<div class="research__timeline__carousel__nav__cell">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-4.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-4.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-4.jpg' ); ?>"
						width="38"
						height="38"
						alt="">
				</picture>
			</div>
			<div class="research__timeline__carousel__nav__cell">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-5.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-5.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-5.jpg' ); ?>"
						width="38"
						height="38"
						alt="">
				</picture>
			</div>
			<div class="research__timeline__carousel__nav__cell">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-6.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-6.png.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2022-mx-5-miata-timeline-nav-6.png' ); ?>"
						width="38"
						height="38"
						alt="">
				</picture>
			</div>
		</div>
	</div>
	<!--
	<div class="form__container" id="form">
		<div class="form__wrap">
			<form class="form form--special-order"
				method="post"
				action="<?php echo esc_url( home_url( add_query_arg( null, null ) ) ); ?>">
				<h2 class="form__title">Start the 2022 car MX-5 Club Special Order Process</h2>
				<div class="form__field">
					<label for="specialOrderFirstName">First Name<span class="form__field__required"><span class="visually-hidden">Required</span>*</span></label>
					<input id="specialOrderFirstName" name="firstName" type="text" placeholder="First Name" required>
				</div>
				<div class="form__field">
					<label for="specialOrderLastName">Last Name<span class="form__field__required"><span class="visually-hidden">Required</span>*</span></label>
					<input id="specialOrderLastName" name="lastName" type="text" placeholder="Last Name" required>
				</div>
				<div class="form__field">
					<label for="specialOrderEmail">Email<span class="form__field__required"><span class="visually-hidden">Required</span>*</span></label>
					<input id="specialOrderEmail" name="email" type="email" placeholder="example@email.com" required>
				</div>
				<div class="form__field">
					<label for="specialOrderZip">Zip<span class="form__field__required"><span class="visually-hidden">Required</span>*</span></label>
					<input id="specialOrderZip" name="zip" type="text" placeholder="xxxxx" required>
				</div>
				<div class="form__field">
					<label for="specialOrderComments">Comments</label>
					<textarea id="specialOrderComments" name="comments" rows="8"></textarea>
				</div>
				<input type="hidden" name="vehicleYear" id="specialOrderVehicleYear" value="2022">
				<input type="hidden" name="vehicleMake" id="specialOrderVehicleMake" value="car">
				<input type="hidden" name="vehicleModel" id="specialOrderVehicleModel" value="MX-5 Miata RF">
				<input type="hidden" name="vehicleTrim" id="specialOrderVehicleTrim" value="Club">
				<input type="hidden" name="gaCat" id="specialOrderGaCat" value="<?php echo esc_attr( get_the_title() ); ?>">
				<input type="hidden" name="leadSourceId" id="specialOrderLeadSourceId" value="1756">
				<input type="hidden" name="leadName" id="specialOrderLeadName" value="custom Advertising - Special Order 2022 MX-5 RF Club">
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
	-->
</div>
<?php

get_footer();
