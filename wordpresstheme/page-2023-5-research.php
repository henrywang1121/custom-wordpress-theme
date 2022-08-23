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
			<h1 class="breadcrumb-search__title">2023 CX-5</h1>
		</div>
		<div class="breadcrumb-search__cta">
			<a class="button button--primary--black"
				href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-5">Explore CX-5 Inventory</a>
		</div>
	</div>
</div>

<div class="research">
	<div class="research__hero cx-5">
		<picture>
			<source type="image/avif"
				srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-hero.avif' ); ?>">
			<source type="image/webp"
				srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-hero.jpg.webp' ); ?>">
			<img loading="eager"
				decoding="auto"
				src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-hero.jpg' ); ?>"
				width="1920"
				height="1080"
				alt="">
		</picture>
		<div class="research__hero__headline">
			<span>Transcend The Ordinary</span>
			The 2023 car CX-5 With Standard AWD
		</div>
		<div class="research__hero__ctas">
			<a class="button button--secondary--transparent ga-event"
				href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-5"
				data-ga-cat="2023 car CX-5"
				data-ga-action="Click"
				data-ga-label="Schedule Test Drive Button">View Inventory</a>
			<?php

			$template_part = array(
				'template-parts/form',
				'contact',
				array(
					'title' => 'Schedule a Test Drive',
				),
			);

			?>
			<button class="button button--primary--white ga-event"
				type="button"
				data-toggle="modal"
				data-target="#scheduleTestDriveModal"
				data-modal-id="scheduleTestDriveModal"
				data-modal-template-part="<?php echo esc_attr( wp_json_encode( $template_part ) ); ?>"
				data-ga-cat="2023 car CX-5"
				data-ga-action="Click"
				data-ga-label="Schedule Test Drive Button">Schedule Test Drive</button>
		</div>
	</div>

	<div class="fifty-fifty fifty-fifty--black fifty-fifty--left">
		<div class="fifty-fifty__media fifty-fifty__media--image">
			<video class="iihs-cx-5" width="960" height="540" controls poster="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-iihs-cx-5-crash-test.png' ); ?>">
				<source src="https://www.customtheme.com/wp-content/uploads/iihs-cx-5-crash-test.mp4" type="video/mp4">
    		</video>
		</div>
		<div class="fifty-fifty__content">
			<div class="fifty-fifty__headline--black">The 2022 car CX-5 is the only vehicle in its class to achieve the highest rating in the new IIHS side impact crash test — proof our engineering provides peace of mind.</div>
			<div class="fifty-fifty__body--black">
				<p>The 2022 car CX-5 was the only vehicle among 20 participating small SUVs to earn a “Good” rating in the new, tougher side impact test performed by the IIHS (May 2022).</p>
			</div>
			<div class="fifty-fifty__ctas--black">
				<a class="button button--secondary--transparent ga-event"
					href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-5"
					data-ga-cat="2023 car CX-5"
					data-ga-action="Click"
					data-ga-label="Schedule Test Drive Button">View Inventory</a>
			</div>
		</div>
	</div>

	<div class="research__trims">
		<h2><span>car CX-5 Trims</span>Pick Your Style</h2>
		<div class="research__trims__carousel">
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-jet-black-mica-carousel.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-jet-black-mica-carousel.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-jet-black-mica-carousel.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 S</h3>
					<div class="research__trims__carousel__details__price">Starting at $26,700<sup>4</sup></div>
					<ul>
						<li>i-ACTIV AWD®</li>
						<li>Advanced Smart City Brake Support with Pedestrian Detection<sup>2</sup></li>
						<li>Apple CarPlay™ and Android Auto™ integration<sup>3</sup></li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-5&trim=2.5+S+Package">View Inventory</a>
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-select-sonic-silver-metallic-carousel.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-select-sonic-silver-metallic-carousel.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-select-sonic-silver-metallic-carousel.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 S Select</h3>
					<div class="research__trims__carousel__details__price">Starting at $28,500<sup>4</sup></div>
					<ul>
						<li>Heated front seats</li>
						<li>Dual-zone automatic climate control</li>
						<li>6-way power-adjusted driver’s seat</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-5&trim=2.5+S+Select+Package">View Inventory</a>
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-prferred-eternal-blue-mica-carousel.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-prferred-eternal-blue-mica-carousel.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-prferred-eternal-blue-mica-carousel.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 S Preferred</h3>
					<div class="research__trims__carousel__details__price">Starting at $30,190<sup>4</sup></div>
					<ul>
						<li>Leather-trimmed seats</li>
						<li>Power sliding-glass moonroof with interior sunshade</li>
						<li>Rear Power Liftgate with programmable height adjustment<sup>5</sup></li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-5&trim=2.5+S+Preferred+Package">View Inventory</a>
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-carbon-edition-polymetal-gray-carousel.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-carbon-edition-polymetal-gray-carousel.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-carbon-edition-polymetal-gray-carousel.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 S CARBON EDITION</h3>
					<div class="research__trims__carousel__details__price">Starting at $31,100<sup>4</sup></div>
					<ul>
						<li>Exclusive Polymetal Gray Metallic paint</li>
						<li>19-inch aluminum alloy wheels with Black Metallic Finish</li>
						<li>Leather-wrapped steering wheel with red stitching</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-5&trim=2.5+S+Carbon+Edition">View Inventory</a>
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-soul-red-crystal-metallic-carousel.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-soul-red-crystal-metallic-carousel.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-soul-red-crystal-metallic-carousel.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 S Premium</h3>
					<div class="research__trims__carousel__details__price">Starting at $33,000<sup>4</sup></div>
					<ul>
						<li>Dual body-colored heated side mirrors</li>
						<li>19-inch aluminum alloy wheels with Black Metallic finish with Machine Cut</li>
						<li>Paddle shifters</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-5&trim=2.5+S+Premium+Package">View Inventory</a>
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-plus-machine-gray-metallic-carousel.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-plus-machine-gray-metallic-carousel.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-plus-machine-gray-metallic-carousel.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 S Premium Plus</h3>
					<div class="research__trims__carousel__details__price">Starting at $35,500<sup>4</sup></div>
					<ul>
						<li>Active Driving Display</li>
						<li>Bose® 10-speaker surround sound system with Centerpoint® and AudioPilot®</li>
						<li>Heated rear seats</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-5&trim=2.5+S+Premium+Plus+Package">View Inventory</a>
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-soul-red-crystal-metallic-carousel.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-soul-red-crystal-metallic-carousel.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-soul-red-crystal-metallic-carousel.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 Turbo</h3>
					<div class="research__trims__carousel__details__price">Starting at $36,850<sup>4</sup></div>
					<ul>
						<li>SKYACTIV®-G 2.5 Dynamic Pressure Turbo engine</li>
						<li>Wireless phone charger<sup>6</sup></li>
						<li>Gloss Black grille</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-5&trim=2.5+Turbo">View Inventory</a>
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-turbo-signature-snowflake-white-pearl-mica-carousel.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-turbo-signature-snowflake-white-pearl-mica-carousel.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-turbo-signature-snowflake-white-pearl-mica-carousel.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 Turbo Signature</h3>
					<div class="research__trims__carousel__details__price">Starting at $39,650<sup>4</sup></div>
					<ul>
						<li>Nappa leather-trimmed seats</li>
						<li>360º View Monito<sup>7</sup></li>
						<li>Genuine layered wood trim</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-5&trim=2.5+Turbo+Signature">View Inventory</a>
				</div>
			</div>
		</div>
		<div class="research__trims__carousel__nav">
			<div class="research__trims__carousel__nav__cell" data-target-trim="club">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-jet-black-mica-carousel.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-jet-black-mica-carousel.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-jet-black-mica-carousel.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 S</h4>
				<div class="research__trims__carousel__nav__price">Starting at $26,700<sup>4</sup></div>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-select-sonic-silver-metallic-thumbnail.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-select-sonic-silver-metallic-thumbnail.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-select-sonic-silver-metallic-thumbnail.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 S Select</h4>
				<div class="research__trims__carousel__nav__price">Starting at $28,500<sup>4</sup></div>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-prferred-eternal-blue-mica-thumbnail.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-prferred-eternal-blue-mica-thumbnail.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-prferred-eternal-blue-mica-thumbnail.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 S Preferred</h4>
				<div class="research__trims__carousel__nav__price">Starting at $30,190<sup>4</sup></div>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-carbon-edition-polymetal-gray-thumbnail.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-carbon-edition-polymetal-gray-thumbnail.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-carbon-edition-polymetal-gray-thumbnail.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 S CARBON EDITION</h4>
				<div class="research__trims__carousel__nav__price">Starting at $31,100<sup>4</sup></div>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-soul-red-crystal-metallic-carousel.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-soul-red-crystal-metallic-carousel.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-soul-red-crystal-metallic-carousel.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 S Premium</h4>
				<div class="research__trims__carousel__nav__price">Starting at $33,000<sup>4</sup></div>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-plus-machine-gray-metallic-thumbnail.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-plus-machine-gray-metallic-thumbnail.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-plus-machine-gray-metallic-thumbnail.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 S Premium Plus</h4>
				<div class="research__trims__carousel__nav__price">Starting at $35,500<sup>4</sup></div>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-soul-red-crystal-metallic-carousel.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-soul-red-crystal-metallic-carousel.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-s-premium-soul-red-crystal-metallic-carousel.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 Turbo</h4>
				<div class="research__trims__carousel__nav__price">Starting at $36,850<sup>4</sup></div>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-turbo-signature-snowflake-white-pearl-mica-thumbnail.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-turbo-signature-snowflake-white-pearl-mica-thumbnail.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-2-5-turbo-signature-snowflake-white-pearl-mica-thumbnail.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 Turbo Signature</h4>
				<div class="research__trims__carousel__nav__price">Starting at $39,650<sup>4</sup></div>
			</div>
		</div>
		<div class="disclaimers">
			<p class="disclaimer"><sup>2</sup>Advanced Smart City Brake Support with Day and Night-time Pedestrian Detection operates under certain conditions between about 2 and 50 mph when object is a vehicle and between about 6.2 to 50 mph when the object is a pedestrian. It is not a substitute for safe and attentive driving and is only designed to reduce damage in the event of a collision. There are limitations to the operation and detection of the system. Please see your Owner&rsquo;s Manual for further details.</p>
			<p class="disclaimer"><sup>3</sup>Requires compatible phone and standard text and data rates apply. Third-party interface providers are solely responsible for their product functionality and third-party terms and privacy statements apply. Don&rsquo;t drive while distracted or while using a hand-held device. Android and Android Auto are trademarks of Google LLC. Apple CarPlay, iPhone and Siri are trademarks of Apple Inc.</p>
			<p class="disclaimer"><sup>4</sup>MSRP excludes tax, title, license fees and $1,275 destination charge (Alaska $1,320). Vehicle shown may be priced higher. Actual dealer price will vary. See dealer for complete details.</p>
			<p class="disclaimer"><sup>5</sup>Always check the area around the Rear Power Liftgate before opening and closing it. Please see your Owner&rsquo;s Manual for further details.</p>
			<p class="disclaimer"><sup>6</sup>Requires Qi-enabled smartphone. Please see your Owner&rsquo;s Manual for further details.</p>
			<p class="disclaimer"><sup>7</sup>360º View Monitor may not provide a comprehensive view of the entire surrounding area of this vehicle. Always check your surroundings visually. Please see your Owner&rsquo;s Manual for further details.</p>
		</div>
	</div>

	<div class="research__gallery">
		<div class="research__gallery__row">
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-5.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-5.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-5.jpg' ); ?>"
						width="1800"
						height="1013"
						alt="">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-3.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-3.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-3.jpg' ); ?>"
						width="1600"
						height="900"
						alt="">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-2.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-2.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-2.jpg' ); ?>"
						width="1600"
						height="900"
						alt="">
				</picture>
			</div>
		</div>
		<div class="research__gallery__row">
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-1.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-1.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-1.jpg' ); ?>"
						width="1600"
						height="900"
						alt="">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-4.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-4.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-4.jpg' ); ?>"
						width="1600"
						height="900"
						alt="">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-6.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-6.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-6.jpg' ); ?>"
						width="1600"
						height="900"
						alt="">
				</picture>
			</div>
		</div>
		<div class="research__gallery__disclainer">
			<p class="disclaimer">Late availability pre-production trim and accessories shown subject to change.</p>
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
							<button class="tab-link active" id="exterior-2-5-s-tab" data-target="#exterior-2-5-s" type="button" role="tab" aria-controls="exterior-2-5-s" aria-selected="true">2.5 S</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="exterior-2-5-s-select-tab" data-target="#exterior-2-5-s-select" type="button" role="tab" aria-controls="exterior-2-5-s-select" aria-selected="false">2.5 S Select</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="exterior-2-5-s-select-preferred-tab" data-target="#exterior-2-5-s-select-preferred" type="button" role="tab" aria-controls="exterior-2-5-s-select-preferred" aria-selected="false">2.5 S Preferred</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="exterior-2-5-carbon-edition-tab" data-target="#exterior-2-5-carbon-edition" type="button" role="tab" aria-controls="exterior-2-5-carbon-edition" aria-selected="true">2.5 CARBON EDITION</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="exterior-2-5-s-premium-tab" data-target="#exterior-2-5-s-premium" type="button" role="tab" aria-controls="exterior-2-5-s-premium" aria-selected="false">2.5 S Premium</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="exterior-2-5-s-premium-plus-tab" data-target="#exterior-2-5-s-premium-plus" type="button" role="tab" aria-controls="exterior-2-5-s-premium-plus" aria-selected="false">2.5 S Premium Plus</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="exterior-2-5-turbo-tab" data-target="#exterior-2-5-turbo" type="button" role="tab" aria-controls="exterior-2-5-turbo" aria-selected="false">2.5 TURBO</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="exterior-2-5-turbo-signature-tab" data-target="#exterior-2-5-turbo-signature" type="button" role="tab" aria-controls="exterior-2-5-turbo-signature" aria-selected="false">2.5 TURBO SIGNATURE</button>
						</li>
					</ul>

					<!-- Exterior trim content -->
					<div class="research__color__exterior__trim__tabs-content" id="researchColorExteriorTrimTabsContent">

						<!-- Exterior 2.5 S Trim -->
						<div class="tab-panel show" id="exterior-2-5-s" role="tabpanel" aria-labelledby="exterior-2-5-s-tab">
							<?php

							$exterior_2_5_s_colors = array(
								array(
									'name' => 'Soul Red Crystal Metallic | Extra $595',
									'slug' => 'soulred',
									'hex'  => '#890000',
								),
								array(
									'name' => 'Rhodium White Metallic | Extra $595',
									'slug' => 'rhodiumwhite',
									'hex'  => '#f7f7f7',
								),
								array(
									'name' => 'Eternal Blue Mica',
									'slug' => 'eternalblue',
									'hex'  => '#4d7fa6',
								),
								array(
									'name' => 'Jet Black Mica',
									'slug' => 'jetblack',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $exterior_2_5_s_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg' ); ?>"
													width="1920"
													height="1080"
													alt="2023 CX-5 2.5 S <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $exterior_2_5_s_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 S <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<div class="tab-panel" id="exterior-2-5-s-select" role="tabpanel" aria-labelledby="exterior-2-5-s-select-tab">
							<?php

							$exterior_2_5_s_select_colors = array(
								array(
									'name' => 'Soul Red Crystal Metallic | Extra $595',
									'slug' => 'soulred',
									'hex'  => '#890000',
								),
								array(
									'name' => 'Rhodium White Metallic | Extra $595',
									'slug' => 'rhodiumwhite',
									'hex'  => '#f7f7f7',
								),
								array(
									'name' => 'Eternal Blue Mica',
									'slug' => 'eternalblue',
									'hex'  => '#4d7fa6',
								),
								array(
									'name' => 'Machine Gray Metallic | Extra $595',
									'slug' => 'machinegray',
									'hex'  => '#4f535b',
								),
								array(
									'name' => 'Sonic Silver Metallic',
									'slug' => 'sonicsilver',
									'hex'  => '#cdd0d0',
								),
								array(
									'name' => 'Deep Crystal Blue Mica',
									'slug' => 'deepcrystalblue',
									'hex'  => '#273754',
								),
								array(
									'name' => 'Jet Black Mica',
									'slug' => 'jetblack',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $exterior_2_5_s_select_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg' ); ?>"
													width="1920"
													height="1080"
													alt="2023 CX-5 2.5 S Select<?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $exterior_2_5_s_select_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 S Select <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<div class="tab-panel" id="exterior-2-5-s-select-preferred" role="tabpanel" aria-labelledby="exterior-2-5-s-select-preferred-tab">
							<?php

							$exterior_2_5_s_select_preferred_colors = array(
								array(
									'name' => 'Soul Red Crystal Metallic | Extra $595',
									'slug' => 'soulred',
									'hex'  => '#890000',
								),
								array(
									'name' => 'Rhodium White Metallic | Extra $595',
									'slug' => 'rhodiumwhite',
									'hex'  => '#f7f7f7',
								),
								array(
									'name' => 'Eternal Blue Mica',
									'slug' => 'eternalblue',
									'hex'  => '#4d7fa6',
								),
								array(
									'name' => 'Machine Gray Metallic | Extra $595',
									'slug' => 'machinegray',
									'hex'  => '#4f535b',
								),
								array(
									'name' => 'Sonic Silver Metallic',
									'slug' => 'sonicsilver',
									'hex'  => '#cdd0d0',
								),
								array(
									'name' => 'Deep Crystal Blue Mica',
									'slug' => 'deepcrystalblue',
									'hex'  => '#273754',
								),
								array(
									'name' => 'Jet Black Mica',
									'slug' => 'jetblack',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $exterior_2_5_s_select_preferred_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg' ); ?>"
													width="1920"
													height="1080"
													alt="2023 CX-5 2.5 S Select Preferred <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $exterior_2_5_s_select_preferred_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 S Select Preferred<?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<div class="tab-panel" id="exterior-2-5-carbon-edition" role="tabpanel" aria-labelledby="exterior-2-5-carbon-edition-tab">
							<?php

							$exterior_2_5_carbon_edition_colors = array(
								array(
									'name' => 'Polymetal Gray',
									'slug' => 'carbon-edition-polymetalgray',
									'hex'  => '#747d81',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $exterior_2_5_carbon_edition_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg' ); ?>"
													width="1920"
													height="1080"
													alt="2023 CX-5 2.5 Carbon Edition <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $exterior_2_5_carbon_edition_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 Carbon Edition <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<div class="tab-panel" id="exterior-2-5-s-premium" role="tabpanel" aria-labelledby="exterior-2-5-s-premium-tab">
							<?php

							$exterior_2_5_s_premium_colors = array(
								array(
									'name' => 'Soul Red Crystal Metallic | Extra $595',
									'slug' => 'soulred',
									'hex'  => '#890000',
								),
								array(
									'name' => 'Rhodium White Metallic | Extra $595',
									'slug' => 'rhodiumwhite',
									'hex'  => '#f7f7f7',
								),
								array(
									'name' => 'Eternal Blue Mica',
									'slug' => 'eternalblue',
									'hex'  => '#4d7fa6',
								),
								array(
									'name' => 'Machine Gray Metallic | Extra $595',
									'slug' => 'machinegray',
									'hex'  => '#4f535b',
								),
								array(
									'name' => 'Sonic Silver Metallic',
									'slug' => 'sonicsilver',
									'hex'  => '#cdd0d0',
								),
								array(
									'name' => 'Deep Crystal Blue Mica',
									'slug' => 'deepcrystalblue',
									'hex'  => '#273754',
								),
								array(
									'name' => 'Jet Black Mica',
									'slug' => 'jetblack',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $exterior_2_5_s_premium_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg' ); ?>"
													width="1920"
													height="1080"
													alt="2023 CX-5 2.5 S Premium <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $exterior_2_5_s_premium_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 S Premium <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<div class="tab-panel" id="exterior-2-5-s-premium-plus" role="tabpanel" aria-labelledby="exterior-2-5-s-premium-plus-tab">
							<?php

							$exterior_2_5_s_premium_plus_colors = array(
								array(
									'name' => 'Soul Red Crystal Metallic | Extra $595',
									'slug' => 'soulred',
									'hex'  => '#890000',
								),
								array(
									'name' => 'Rhodium White Metallic | Extra $595',
									'slug' => 'rhodiumwhite',
									'hex'  => '#f7f7f7',
								),
								array(
									'name' => 'Eternal Blue Mica',
									'slug' => 'eternalblue',
									'hex'  => '#4d7fa6',
								),
								array(
									'name' => 'Machine Gray Metallic | Extra $595',
									'slug' => 'machinegray',
									'hex'  => '#4f535b',
								),
								array(
									'name' => 'Sonic Silver Metallic',
									'slug' => 'sonicsilver',
									'hex'  => '#cdd0d0',
								),
								array(
									'name' => 'Deep Crystal Blue Mica',
									'slug' => 'deepcrystalblue',
									'hex'  => '#273754',
								),
								array(
									'name' => 'Jet Black Mica',
									'slug' => 'jetblack',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $exterior_2_5_s_premium_plus_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg' ); ?>"
													width="1920"
													height="1080"
													alt="2023 CX-5 2.5 S Premium Plus <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $exterior_2_5_s_premium_plus_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 S Premium Plus <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<div class="tab-panel" id="exterior-2-5-turbo" role="tabpanel" aria-labelledby="exterior-2-5-turbo-tab">
							<?php

							$exterior_2_5_turbo_colors = array(
								array(
									'name' => 'Soul Red Crystal Metallic | Extra $595',
									'slug' => 'soulred',
									'hex'  => '#890000',
								),
								array(
									'name' => 'Rhodium White Metallic | Extra $595',
									'slug' => 'rhodiumwhite',
									'hex'  => '#f7f7f7',
								),
								array(
									'name' => 'Eternal Blue Mica',
									'slug' => 'eternalblue',
									'hex'  => '#4d7fa6',
								),
								array(
									'name' => 'Machine Gray Metallic | Extra $595',
									'slug' => 'machinegray',
									'hex'  => '#4f535b',
								),
								array(
									'name' => 'Sonic Silver Metallic',
									'slug' => 'sonicsilver',
									'hex'  => '#cdd0d0',
								),
								array(
									'name' => 'Deep Crystal Blue Mica',
									'slug' => 'deepcrystalblue',
									'hex'  => '#273754',
								),
								array(
									'name' => 'Jet Black Mica',
									'slug' => 'jetblack',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $exterior_2_5_turbo_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg' ); ?>"
													width="1920"
													height="1080"
													alt="2023 CX-5 2.5 Turbo <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $exterior_2_5_turbo_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 Turbo <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<div class="tab-panel" id="exterior-2-5-turbo-signature" role="tabpanel" aria-labelledby="exterior-2-5-turbo-signature-tab">
							<?php

							$exterior_2_5_turbo_signature_colors = array(
								array(
									'name' => 'Soul Red Crystal Metallic | Extra $595',
									'slug' => 'soulred',
									'hex'  => '#890000',
								),
								array(
									'name' => 'Rhodium White Metallic | Extra $595',
									'slug' => 'rhodiumwhite',
									'hex'  => '#f7f7f7',
								),
								array(
									'name' => 'Eternal Blue Mica',
									'slug' => 'eternalblue',
									'hex'  => '#4d7fa6',
								),
								array(
									'name' => 'Machine Gray Metallic | Extra $595',
									'slug' => 'machinegray',
									'hex'  => '#4f535b',
								),
								array(
									'name' => 'Deep Crystal Blue Mica',
									'slug' => 'deepcrystalblue',
									'hex'  => '#273754',
								),
								array(
									'name' => 'Jet Black Mica',
									'slug' => 'jetblack',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $exterior_2_5_turbo_signature_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-exterior-' . $color['slug'] . '.jpg' ); ?>"
													width="1920"
													height="1080"
													alt="2023 CX-5 2.5 Turbo Signature <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $exterior_2_5_turbo_signature_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 Turbo Signature <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
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
							<button class="tab-link active" id="interior-2-5-s-tab" data-target="#interior-2-5-s" type="button" role="tab" aria-controls="interior-2-5-s" aria-selected="true">2.5 S</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="interior-2-5-s-select-tab" data-target="#interior-2-5-s-select" type="button" role="tab" aria-controls="interior-2-5-s-select" aria-selected="false">2.5 S Select</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="interior-2-5-s-select-preferred-tab" data-target="#interior-2-5-s-select-preferred" type="button" role="tab" aria-controls="interior-2-5-s-select-preferred" aria-selected="false">2.5 S Preferred</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="interior-2-5-carbon-edition-tab" data-target="#interior-2-5-carbon-edition" type="button" role="tab" aria-controls="interior-2-5-carbon-edition" aria-selected="true">2.5 CARBON EDITION</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="interior-2-5-s-premium-tab" data-target="#interior-2-5-s-premium" type="button" role="tab" aria-controls="interior-2-5-s-premium" aria-selected="false">2.5 S Premium</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="interior-2-5-s-premium-plus-tab" data-target="#interior-2-5-s-premium-plus" type="button" role="tab" aria-controls="interior-2-5-s-premium-plus" aria-selected="false">2.5 S Premium Plus</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="interior-2-5-turbo-tab" data-target="#interior-2-5-turbo" type="button" role="tab" aria-controls="interior-2-5-turbo" aria-selected="false">2.5 TURBO</button>
						</li>
						<li role="presentation">
							<button class="tab-link" id="interior-2-5-turbo-signature-tab" data-target="#interior-2-5-turbo-signature" type="button" role="tab" aria-controls="interior-2-5-turbo-signature" aria-selected="false">2.5 TURBO SIGNATURE</button>
						</li>
					</ul>

					<!-- Interior trim content -->
					<div class="research__color__interior__trim__tabs-content" id="researchColorInteriorTrimTabsContent">

						<!-- Interior 2.5 S Trim -->
						<div class="tab-panel show" id="interior-2-5-s" role="tabpanel" aria-labelledby="interior-2-5-s-tab">
							<?php

							$interior_2_5_s_colors = array(
								array(
									'name' => 'Black Cloth',
									'slug' => 'black-cloth',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $interior_2_5_s_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg' ); ?>"
													width="2729"
													height="1365"
													alt="2023 CX-5 2.5 S <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $interior_2_5_s_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 S <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<div class="tab-panel" id="interior-2-5-s-select" role="tabpanel" aria-labelledby="interior-2-5-s-select-tab">
							<?php

							$interior_2_5_s_select_colors = array(
								array(
									'name' => 'Silk Beige Leatherette ',
									'slug' => 'silk-beige-leatherette',
									'hex'  => '#A19679',
								),
								array(
									'name' => 'Black Leatherette',
									'slug' => 'black-leatherette',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $interior_2_5_s_select_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg' ); ?>"
													width="2729"
													height="1365"
													alt="2023 CX-5 2.5 S Select <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $interior_2_5_s_select_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 S Select <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<div class="tab-panel" id="interior-2-5-s-select-preferred" role="tabpanel" aria-labelledby="interior-2-5-s-select-preferred-tab">
							<?php

							$interior_2_5_s_select_preferred_colors = array(
								array(
									'name' => 'Silk Beige Leather',
									'slug' => 'silk-beige-leatherette',
									'hex'  => '#A19679',
								),
								array(
									'name' => 'Black Leather',
									'slug' => 'black-leather-2-5-s-preferred',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $interior_2_5_s_select_preferred_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg' ); ?>"
													width="2729"
													height="1365"
													alt="3 CX-5 2.5 S Select Preferred <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $interior_2_5_s_select_preferred_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 S Select Preferred<?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<div class="tab-panel" id="interior-2-5-carbon-edition" role="tabpanel" aria-labelledby="interior-2-5-carbon-edition-tab">
							<?php

							$interior_2_5_carbon_edition_colors = array(
								array(
									'name' => 'Red Leather',
									'slug' => 'red-leather-carbon',
									'hex'  => '#5A2E32',
								),
								array(
									'name' => 'Black Leather',
									'slug' => 'black-leather-carbon',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $interior_2_5_carbon_edition_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg' ); ?>"
													width="2729"
													height="1365"
													alt="2023 CX-5 2.5 Carbon Edition <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $interior_2_5_carbon_edition_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 Carbon Edition <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<div class="tab-panel" id="interior-2-5-s-premium" role="tabpanel" aria-labelledby="interior-2-5-s-premium-tab">
							<?php

							$interior_2_5_s_premium_colors = array(
								array(
									'name' => 'Parchment Leather',
									'slug' => 'parchment-leather',
									'hex'  => '#ADAB99',
								),
								array(
									'name' => 'Black Leather',
									'slug' => 'black-leather-2-5-s-premium-2-5-s-premium-plus-2-5-turbo',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $interior_2_5_s_premium_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg' ); ?>"
													width="2729"
													height="1365"
													alt="2023 CX-5 2.5 S Premium <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $interior_2_5_s_premium_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 S Premium <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<div class="tab-panel" id="interior-2-5-s-premium-plus" role="tabpanel" aria-labelledby="interior-2-5-s-premium-plus-tab">
							<?php

							$interior_2_5_s_premium_plus_colors = array(
								array(
									'name' => 'Parchment Leather',
									'slug' => 'parchment-leather',
									'hex'  => '#ADAB99',
								),
								array(
									'name' => 'Black Leather',
									'slug' => 'black-leather-2-5-s-premium-2-5-s-premium-plus-2-5-turbo',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $interior_2_5_s_premium_plus_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg' ); ?>"
													width="2729"
													height="1365"
													alt="2023 CX-5 2.5 S Premium Plus <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $interior_2_5_s_premium_plus_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 S Premium Plus <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<div class="tab-panel" id="interior-2-5-turbo" role="tabpanel" aria-labelledby="interior-2-5-turbo-tab">
							<?php

							$interior_2_5_turbo_colors = array(
								array(
									'name' => 'Parchment Leather',
									'slug' => 'parchment-leather',
									'hex'  => '#ADAB99',
								),
								array(
									'name' => 'Black Leather',
									'slug' => 'black-leather-2-5-s-premium-2-5-s-premium-plus-2-5-turbo',
									'hex'  => '#101312',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $interior_2_5_turbo_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg' ); ?>"
													width="2729"
													height="1365"
													alt="2023 CX-5 2.5 Turbo <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $interior_2_5_turbo_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 Turbo <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
									<?php endforeach; ?>
								</div>
								<div class="research__color__selected"></div>
							</div>
						</div>

						<div class="tab-panel" id="interior-2-5-turbo-signature" role="tabpanel" aria-labelledby="interior-2-5-turbo-signature-tab">
							<?php

							$interior_2_5_turbo_signature_colors = array(
								array(
									'name' => 'Caturra Brown Nappa Leather ',
									'slug' => 'caturra-brown-nappa-leather',
									'hex'  => '#181515',
								),
							);

							?>
							<div class="research__color__section">
								<div class="research__color__photos research__color__photos_cx_5">
									<?php foreach ( $interior_2_5_turbo_signature_colors as $color ) : ?>
										<div class="research__color__photo" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
											<picture>
												<source type="image/avif"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.avif' ); ?>">
												<source type="image/webp"
													srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg.webp' ); ?>">
												<img loading="lazy"
													decoding="async"
													src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-interior-' . $color['slug'] . '.jpg' ); ?>"
													width="2729"
													height="1365"
													alt="2023 CX-5 2.5 Turbo Signature <?php echo esc_attr( $color['name'] ); ?>">
											</picture>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="research__color__picker">
									<?php foreach ( $interior_2_5_turbo_signature_colors as $color ) : ?>
										<button class="research__color__picker__button"
											type="button"
											data-color-name="<?php echo esc_attr( $color['name'] ); ?>"
											data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden">2.5 Turbo Signature <?php echo esc_html( $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
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
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-three-column-car-connected-services.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-three-column-car-connected-services.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-three-column-car-connected-services.jpg' ); ?>"
									width="1040"
									height="980"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Technology</div>
						<div class="research__highlights__card__title">car CONNECTED SERVICES<sup>1</sup></div>
						<div class="research__highlights__card__body">
							<p>Remotely start the engine, check vehicle status reports and more through the Mycar App with car Connected Services, complimentary for three years.<sup>1</sup> And so you don’t miss a moment, your vehicle can also be equipped with in-car Wi-Fi<sup>2</sup> capabilities—and provide access to emergency services like automatic 911<sup>3</sup>dialing and roadside assistance.</p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-remote-engine-start.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-remote-engine-start.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-remote-engine-start.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Mycar APP</div>
						<div class="research__highlights__card__title">REMOTE ENGINE START</div>
						<div class="research__highlights__card__body">Start your CX-5’s engine and return to the previously set interior temperature before you even get in. It’s comfort and convenience right at your fingertips.<sup>1</sup></div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-vehicle-finder-v5.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-vehicle-finder-v5.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-vehicle-finder-v5.jpg' ); ?>"
									width="979"
									height="491"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Mycar APP</div>
						<div class="research__highlights__card__title">VEHICLE FINDER</div>
						<div class="research__highlights__card__body">Forgot where you parked your car? The Mycar App pins the location of your vehicle on the map and shows you its exact spot, as well as activates the hazard lights and horn to make it easier to find.<sup>1</sup></div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-vehicle-health-status.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-vehicle-health-status.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-vehicle-health-status.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Mycar APP</div>
						<div class="research__highlights__card__title">VEHICLE HEALTH AND STATUS</div>
						<div class="research__highlights__card__body">
							<p>The Mycar App can proactively notify you when something may need your attention. Find out when your oil, lights, or tire pressure should be checked; or when it’s time for service — before you get on the road.<sup>1</sup></p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-seamless-connection.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-seamless-connection.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-seamless-connection.jpg' ); ?>"
									width="1800"
									height="900"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Mycar APP</div>
						<div class="research__highlights__card__title">SEAMLESS CONNECTION</div>
						<div class="research__highlights__card__body">
							<p>Enjoy the convenience of your smartphone while on the road with car Connect™.<sup>4</sup> Featuring Apple CarPlay™ integration<sup>5</sup> for your iPhone® (shown) and Android Auto™ integration,<sup>5</sup> you can access maps, playlists, contacts and more, and view them clearly on the large 10.25-inch center display.</p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-4.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-4.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-gallery-4.jpg' ); ?>"
									width="1600"
									height="900"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Mycar APP</div>
						<div class="research__highlights__card__title">BOSE® AUDIO</div>
						<div class="research__highlights__card__body">
							<p>Every inspiring performance deserves a proper soundtrack. Enjoy crisp and clear music through the available 10-speaker Bose® audio system, featuring a unique speaker design and layout for optimal listening throughout the cabin.</p>
						</div>
					</div>
				</div>
				<div class="disclaimers">
					<p class="disclaimer"><sup>1</sup>Connected services are subject to change at any time without notice. car Connected Services is provided during a 3-year trial period; annual subscription fees apply thereafter. Use of Mycar App and compatible phone are required. Connected services require cellular or Wi-Fi service. Data fees may apply. Never drive while distracted or while using a hand-held device. Please see your Owner’s Manual for important feature details and related privacy information. </p>
					<p class="disclaimer"><sup>2</sup>3-month/2GB wireless data trial provides access to AT&T’s wireless data services. Eligible vehicle, compatible SIM card and trial activation by customer required. 3-month period begins at time of trial activation; wireless data service expires when 2GB of data is used or when 3-month period ends, whichever comes first. Hotspot connects up to 5 Wi-Fi capable devices, which use data from your plan. Wi-Fi hotspot functionality not available outside of U.S. & Canada. Service in Canada subject to unaffiliated carrier coverage. Offer, terms, and pricing subject to change. Coverage and service not available everywhere. Visit www.att.com/USTermsandconditions for more information. Never drive while distracted or while using a hand-held device. Please see your Owner’s Manual for important feature details and related privacy information.
					</p>
					<p class="disclaimer"><sup>3</sup>Mobile 911 automatically calls 911 from a paired hands-free device when a moderate to severe collision is detected. Specific phone settings are required. There are limitations to the system. Please see your Owner’s Manual for further details.
					</p>
					<p class="disclaimer"><sup>4</sup> Don’t drive while distracted. Even with voice commands, only use car Connect™/ other devices when safe. Some features may require cellular or Wi-Fi service; some features may be locked out while the vehicle is in motion. Not all features are compatible with all phones. Message and data rates may apply.
					</p>
					<p class="disclaimer"><sup>5</sup>Requires compatible phone and standard text and data rates apply. Third-party interface providers are solely responsible for their product functionality and third-party terms and privacy statements apply. Don’t drive while distracted or while using a hand-held device. Android and Android Auto are trademarks of Google LLC. Apple CarPlay, iPhone and Siri are trademarks of Apple Inc.
					</p>
				</div>
			</div>
			<div class="tab-panel" id="safety" role="tabpanel" aria-labelledby="safety-tab">
				<div class="research__highlights__carousel">
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-i-activsense.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-i-activsense.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-i-activsense.jpg' ); ?>"
									width="1800"
									height="725"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title"><span class="lowercase">i</span>-Activsense&reg; Safety Technology</div>
						<div class="research__highlights__card__body">car’s i-Activsense®<sup>3</sup> safety technology is constantly evolving to help protect drivers, passengers and pedestrians in the event of an accident; and when possible, to avoid them entirely. With features like Advanced Smart City Brake Support with Day and Night-time Pedestrian Detection<sup>2</sup> and available Traffic Jam Assist,<sup>1</sup> it’s all part of our goal to create safer cars and more confident drivers.
						<p class="disclaimer">European model shown. Specifications may vary.</p>
					</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-three-column-blind-spot-monitoring.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-three-column-blind-spot-monitoring.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-three-column-blind-spot-monitoring.jpg' ); ?>"
									width="1040"
									height="980"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">BLIND SPOT MONITORING</div>
						<div class="research__highlights__card__body">
							<p>Blind Spot Monitoring<sup>4</sup> helps detect objects in your blind spots and alerts you with a chime and warning light in your side mirror and in the available Active Driving Display (when equipped). There are some surprises that are worth doing without.</p>
							<p class="disclaimer">The illustration displayed is for feature explanation only.</p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-rear-cross-traffic-alert.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-rear-cross-traffic-alert.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-rear-cross-traffic-alert.jpg' ); ?>"
									width="1170"
									height="585"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">REAR CROSS TRAFFIC ALERT</div>
						<div class="research__highlights__card__body">
							<p>When backing up, Rear Cross Traffic Alert<sup>4</sup> helps detect a vehicle approaching from the side and promptly alerts the driver with an audible warning, as well as a visual warning, in either side mirror and the Rear View Monitor display.</p>
							<p class="disclaimer">The illustration displayed is for feature explanation only.</p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-radar-cruise-control-with-stop-and-go.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-radar-cruise-control-with-stop-and-go.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-radar-cruise-control-with-stop-and-go.jpg' ); ?>"
									width="1170"
									height="585"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">car RADAR CRUISE CONTROL</div>
						<div class="research__highlights__card__body">
							<p>Maintain a set speed and minimum following distance from the traffic ahead with car Radar Cruise Control with Stop & Go.<sup>5</sup> If the vehicle you’re following reduces speed, even down to a stop, your vehicle will automatically slow down or stop as needed.
							</p>
							<p class="disclaimer">For illustration purposes only</p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-adaptive-front-lighting-system.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-adaptive-front-lighting-system.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-adaptive-front-lighting-system.jpg' ); ?>"
									width="1170"
									height="585"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">ADAPTIVE FRONT-LIGHTING SYSTEM</div>
						<div class="research__highlights__card__body">
							<p>This available system is designed to help you see around corners at night. As you turn a corner, the LED headlights pivot in the direction of your turn, improve visibility and allow you to spot potential hazards ahead. Now isn’t that illuminating?</p>
							<p class="disclaimer">For illustration purposes only</p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-smart-braking-systems.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-smart-braking-systems.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-smart-braking-systems.jpg' ); ?>"
									width="1170"
									height="585"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">SMART BRAKING SYSTEM</div>
						<div class="research__highlights__card__body">
							<p>car’s automatic braking technology includes standard high and low speed systems<sup>7</sup> (shown) and an available system that works while in reverse.<sup>8</sup> If an impact is predicted, these systems will warn the driver and, if necessary, apply the brakes. </p>
							<p class="disclaimer">For illustration purposes only</p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-lane-departure-warning-system.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-lane-departure-warning-system.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-lane-departure-warning-system.jpg' ); ?>"
									width="1170"
									height="585"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">LANE DEPARTURE WARNING AND LANE-KEEP ASSIST </div>
						<div class="research__highlights__card__body">
							<p>When travelling at the speed of 37 mph or higher, the Lane Departure Warning System<sup>8</sup> gives you a combination of audible and visual warnings when it detects that you are about to unintentionally depart from your lane. And with Lane-keep Assist,<sup>8</sup> minor steering corrections are made to help keep your vehicle in its lane.  </p>
							<p class="disclaimer">For illustration purposes only</p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-driver-attention-alert.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-driver-attention-alert.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-safety-driver-attention-alert.jpg' ); ?>"
									width="1170"
									height="585"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">DRIVER ATTENTION ALERT  </div>
						<div class="research__highlights__card__body">
							<p>Available Driver Attention Alert<sup>9</sup> monitors the driver’s steering and throttle inputs and lane position. When it recognizes driving behavior suggesting driver fatigue or decreased attentiveness, it activates a warning sound and displays an alert in the LCD Meter Display.</p>
							<p class="disclaimer">For illustration purposes only</p>
						</div>
					</div>
				</div>
				<div class="disclaimers">
					<p class="disclaimer"><sup>1</sup>Traffic Jam Assist is not a substitute for safe and attentive driving. There are limitations to the range and detection of the system. Please see your Owner’s Manual for further details</p>
					<p class="disclaimer"><sup>2</sup>Advanced Smart City Brake Support with Day and Night-time Pedestrian Detection operates under certain conditions between about 2 and 50 mph when object is a vehicle and between about 6.2 to 50 mph when the object is a pedestrian. It is not a substitute for safe and attentive driving and is only designed to reduce damage in the event of a collision.  There are limitations to the operation and detection of the system.  Please see your Owner’s Manual for further details.</p>
					<p class="disclaimer"><sup>3</sup>i-Activsense® safety features are not a substitute for safe and attentive driving. There are limitations to the range and detection of each safety feature. Safety features vary based on vehicle package and trim combinations. Please see your Owner’s Manual for further details.</p>
					<p class="disclaimer"><sup>4</sup>Always check your mirrors. Be aware of the traffic around you. There are limitations to the range and detection of the system. Please see your Owner’s Manual for further details.</p>
					<p class="disclaimer"><sup>5</sup>car Radar Cruise Control (MRCC) with Stop & Go is not a substitute for safe and attentive driving. There are limitations to the range and detection of the system. Driver action is required to resume MRCC with Stop & Go after a complete stop. Please see your Owner’s Manual for further details.</p>
					<p class="disclaimer"><sup>6</sup>Advanced Smart City Brake Support with Day and Night-time Pedestrian Detection operates under certain conditions between about 2 and 50 mph when object is a vehicle and between about 6.2 to 50 mph when the object is a pedestrian. It is not a substitute for safe and attentive driving and is only designed to reduce damage in the event of a collision. There are limitations to the operation and detection of the system. Please see your Owner’s Manual for further details. Smart Brake Support with Collision Warning operates under certain conditions above 10 mph. It is not a substitute for safe and attentive driving and is only designed to reduce damage in the event of a collision. There are limitations to the range and detection of the system. Please see your Owner’s Manual for details.</p>
					<p class="disclaimer"><sup>7</sup>Smart City Brake Support–Reverse operates under certain conditions between about 2 and 4 mph when an obstruction is detected at the rear of the vehicle. It is not a substitute for safe and attentive driving and is only designed to reduce damage in the event of a collision. There are limitations to the operation and detection of the system. Please see your Owner’s Manual for further details.</p>
					<p class="disclaimer"><sup>8</sup>Lane Departure Warning System and Lane-keep Assist operate at speeds of about 37 mph and faster. Neither system is a substitute for safe and attentive driving. There are limitations to the range and detection of each system. Please see your Owner’s Manual for further details.</p>
					<p class="disclaimer"><sup>9</sup>Driver Attention Alert operates between about 40 to 87 mph. It is not a substitute for safe and attentive driving. There are limitations to the operation and detection of the system. Please see your Owner’s Manual for further details.</p>
				</div>
			</div>
			<div class="tab-panel" id="design" role="tabpanel" aria-labelledby="design-tab">
				<div class="research__highlights__carousel">
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-signature-design.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-signature-design.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-signature-design.jpg' ); ?>"
									width="1800"
									height="900"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">EXTERIOR DESIGN</div>
						<div class="research__highlights__card__title">SIGNATURE DESIGN</div>
						<div class="research__highlights__card__body">
							<p>Drawing inspiration from our Kodo design philosophy, the car CX-5 2.5 Turbo Signature allures you with its sleek exterior styling. With a distinct front grille, 19” alloy wheels and a matching body-colored lower bumper and wheel arches, it stands out in the city even at a standstill.</p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-turn-heads-with-the-2.5-turbo.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-turn-heads-with-the-2.5-turbo.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-turn-heads-with-the-2.5-turbo.jpg' ); ?>"
									width="1280"
									height="639"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">TURBO</div>
						<div class="research__highlights__card__title">TURN HEADS WITH THE 2.5 TURBO</div>
						<div class="research__highlights__card__body">
							<p>The 2023 car CX-5 2.5 Turbo offers a distinct aesthetic that beckons to be driven. It’s outfitted with a gloss black grille, signature wing and lower bumper, and paired with a set of 19” black alloy wheels. Punctuating this striking look is our black leather interior with red stitching.</p>
						</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-art-in-every-detail.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-art-in-every-detail.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-art-in-every-detail.jpg' ); ?>"
									width="1280"
									height="639"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">INTERIOR DESIGN</div>
						<div class="research__highlights__card__title">ART IN EVERY DETAIL</div>
						<div class="research__highlights__card__body">
							<p>The CX-5 interior surrounds you with sophistication. The Signature trim offers genuine layered wood trim and Caturra Brown Nappa leather-trimmed seats while the 2.5 Turbo is styled with a black leather interior and red stitching.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-panel" id="performance" role="tabpanel" aria-labelledby="performance-tab">
				<div class="research__highlights__carousel">
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-three-column-performance.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-three-column-performance.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-5-three-column-performance.jpg' ); ?>"
									width="1040"
									height="980"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">PERFORMANCE</div>
						<div class="research__highlights__card__title">CONNECT TO THE ROAD WITH STANDARD AWD</div>
						<div class="research__highlights__card__body">
							<p>Experience refined performance with i-Activ AWD®, standard across all 2023 CX-5 models. In addition, our available car Intelligent Drive Select technology (Mi-Drive) allows you to customize your drive modes along various roads and surfaces.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

get_footer();
