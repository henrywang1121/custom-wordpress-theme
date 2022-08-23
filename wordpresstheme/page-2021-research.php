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
			<h1 class="breadcrumb-search__title">2021 car6</h1>
		</div>
		<div class="breadcrumb-search__cta">
			<a class="button button--primary--black"
				href="/inventory/?inventory=new-cars&model=car6">Explore car6 Inventory</a>
		</div>
	</div>
</div>

<div class="research">
	<div class="research__hero">
		<picture>
			<source type="image/avif"
				srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-hero.avif' ); ?>">
			<source type="image/webp"
				srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-hero.jpg.webp' ); ?>">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-hero.jpg' ); ?>"
				loading="eager"
				decoding="auto"
				width="960"
				height="552"
				alt="">
		</picture>
		<div class="research__hero__headline">
			<span>Turbocharged car6 Signature</span>
			Everything You Want, and More.
		</div>
		<div class="research__hero__ctas">
			<a class="button button--primary--white" href="/inventory/?inventory=new-cars&model=car6">View Inventory</a>
		</div>
	</div>
	<div class="research__trims">
		<h2><span>car6 Trims</span> Choose a Trim Level</h2>
		<div class="research__trims__carousel">
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-sport.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-sport.png.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-sport.png' ); ?>"
							loading="lazy"
							decoding="async"
							width="960"
							height="552"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">Sport</h3>
					<div class="research__trims__carousel__details__price">Starting at $24.475<sup>6</sup></div>
					<ul>
						<li>Android Auto&trade; / Apple CarPlay&trade; integration<sup>7</sup></li>
						<li>Blind Spot Monitoring and Rear Cross Traffic Alert<sup>8</sup></li>
						<li>LED headlights with auto leveling</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?inventory=new-cars&model=car6&trim=Sport">View Inventory</a>
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-touring.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-touring.png.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-touring.png' ); ?>"
							width="960"
							height="552"
							alt=""
							loading="lazy"
							decoding="async">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">Touring</h3>
					<div class="research__trims__carousel__details__price">Starting at $27,075<sup>6</sup></div>
					<ul>
						<li>19" Aluminum alloy wheels</li>
						<li>Power moonroof with one-touch open/close</li>
						<li>Heated front seats</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?inventory=new-cars&model=car6&trim=Touring">View Inventory</a>
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-grand-touring.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-grand-touring.png.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-grand-touring.png' ); ?>"
							width="960"
							height="552"
							alt=""
							loading="lazy"
							decoding="async">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">Grand Touring</h3>
					<div class="research__trims__carousel__details__price">Starting at $30.175<sup>6</sup></div>
					<ul>
						<li>SKYACTIV&reg;-G 2.5 Dynamic Pressure Turbo engine</li>
						<li>Bose&reg; 11-speaker audio system</li>
						<li>Wireless Apple CarPlay&trade; integration<sup>9</sup></li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?inventory=new-cars&model=car6&trim=Grand%20Touring">View Inventory</a>
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-grand-touring-reserve.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-grand-touring-reserve.png.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-grand-touring-reserve.png' ); ?>"
							width="960"
							height="552"
							alt=""
							loading="lazy"
							decoding="async">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">Grand Touring Reserve</h3>
					<div class="research__trims__carousel__details__price">Starting at $32,675<sup>6</sup></div>
					<ul>
						<li>Automatic power folding side mirrors</li>
						<li>Active Driving Display</li>
						<li>Leather-trimmed seats with ventilated front seats</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?inventory=new-cars&model=car6&trim=Grand%20Touring%20Reserve">View Inventory</a>
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-carbon-edition.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-carbon-edition.jpg.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-carbon-edition.jpg' ); ?>"
							width="960"
							height="552"
							alt=""
							loading="lazy"
							decoding="async">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">Carbon Edition</h3>
					<div class="research__trims__carousel__details__price">Starting at $24.475<sup>6</sup></div>
					<ul>
						<li>19" Alloy wheels with Black Metallic finish</li>
						<li>Black rear lip spoiler and mirrors</li>
						<li>Exclusive Polymetal Gray and Red leather interior</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?inventory=new-cars&model=car6&trim=Carbon%20Edition">View Inventory</a>
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-signature.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-signature.png.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trims-signature.png' ); ?>"
							width="960"
							height="552"
							alt=""
							loading="lazy"
							decoding="async">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">Signature</h3>
					<div class="research__trims__carousel__details__price">Starting at $24.475<sup>6</sup></div>
					<ul>
						<li>360&deg; View Monitor<sup>10</sup> with front and rear parking sensors<sup>11</sup></li>
						<li>Smart City Brake Support—Reverse<sup>12</sup></li>
						<li>Nappa leather-trimmed seats</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?inventory=new-cars&model=car6&trim=Signature">View Inventory</a>
				</div>
			</div>
		</div>
		<div class="research__trims__carousel__nav">
			<div class="research__trims__carousel__nav__cell" data-target-trim="sport">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-sport-jet-black.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-sport-jet-black.png.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-sport-jet-black.png' ); ?>"
							width="1000"
							height="575"
							alt=""
							loading="lazy"
							decoding="async">
					</picture>
				</div>
				<h3 class="research__trims__carousel__nav__title">Sport</h3>
				<div class="research__trims__carousel__nav__price">Starting at $24.475<sup>6</sup></div>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="touring">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-touring-package.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-touring-package.png.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-touring-package.png' ); ?>"
							width="1000"
							height="575"
							alt=""
							loading="lazy"
							decoding="async">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">Touring</h4>
				<div class="research__trims__carousel__nav__price">Starting at $27,075<sup>6</sup></div>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="grand-touring">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-grand-touring-package.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-grand-touring-package.png.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-grand-touring-package.png' ); ?>"
							width="1000"
							height="575"
							alt=""
							loading="lazy"
							decoding="async">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">Grand Touring</h4>
				<div class="research__trims__carousel__nav__price">Starting at $30,175<sup>6</sup></div>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="grand-touring-reserve">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-grand-touring-reserve-package.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-grand-touring-reserve-package.png.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-grand-touring-reserve-package.png' ); ?>"
							width="1000"
							height="575"
							alt=""
							loading="lazy"
							decoding="async">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">Grand Touring Reserve</h4>
				<div class="research__trims__carousel__nav__price">Starting at $32,675<sup>6</sup></div>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="carbon-edition">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-carbon-edition-package.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-carbon-edition-package.png.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-carbon-edition-package.png' ); ?>"
							width="1000"
							height="575"
							alt=""
							loading="lazy"
							decoding="async">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">Carbon Edition</h4>
				<div class="research__trims__carousel__nav__price">Starting at $32,950<sup>6</sup></div>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="signature">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-signature-package.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-signature-package.png.webp' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-signature-package.png' ); ?>"
							width="1000"
							height="575"
							alt=""
							loading="lazy"
							decoding="async">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">Signature</h4>
				<div class="research__trims__carousel__nav__price">Starting at $35,900<sup>6</sup></div>
			</div>
		</div>
		<div class="disclaimers">
			<p class="disclaimer"><sup>6</sup>MSRP excludes tax, title, license fees and $995 destination charge (Alaska $1,040). Vehicle shown may be priced higher. Actual dealer price will vary. See dealer for complete details. </p>
			<p class="disclaimer"><sup>7</sup>Requires compatible phone and standard text and data rates apply. Third-party interface providers are solely responsible for their product functionality and third-party terms and privacy statements apply. Don&rsquo;t drive while distracted or while using a hand-held device. Android and Android Auto are trademarks of Google LLC. Apple CarPlay, iPhone and Siri are trademarks of Apple Inc.</p>
			<p class="disclaimer"><sup>8</sup>Always check your mirrors. Be aware of the traffic around you. There are limitations to the range and detection of the system. Please see your Owner&rsquo;s Manual for further details.</p>
			<p class="disclaimer"><sup>9</sup>Requires compatible iPhone and standard text and data rates apply. Apple is solely responsible for CarPlay functionality and its terms and privacy statements apply. Don&rsquo;t drive while distracted or while using a hand-held device. Apple CarPlay, iPhone and Siri are trademarks of Apple Inc.</p>
			<p class="disclaimer"><sup>10</sup>360&deg; View Monitor may not provide a comprehensive view of the entire surrounding area of this vehicle. Always check your surroundings visually. Please see your Owner&rsquo;s Manual for further details.</p>
			<p class="disclaimer"><sup>11</sup>Always check your mirrors. Be aware of your surroundings. There are limitations to the range and detection of the system. Please see your Owner&rsquo;s Manual for further details.</p>
			<p class="disclaimer"><sup>12</sup>Smart City Brake Support-Reverse operates under certain conditions between about 2 and 4 mph when an obstruction is detected at the rear of the vehicle. It is not a substitute for safe and attentive driving and is only designed to reduce damage in the event of a collision. There are limitations to the operation and detection of the system. Please see your Owner&rsquo;s Manual for further details.</p>
		</div>
	</div>

	<div class="research__gallery">
		<div class="research__gallery__row">
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-center-console.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-center-console.jpg.webp' ); ?>">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-center-console.jpg' ); ?>"
						width="1800"
						height="1013"
						alt=""
						loading="lazy"
						decoding="async">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-sports-sedan-turbo-engine.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-sports-sedan-turbo-engine.jpg.webp' ); ?>">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-sports-sedan-turbo-engine.jpg' ); ?>"
						width="1800"
						height="1013"
						alt=""
						loading="lazy"
						decoding="async">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-sedan-drivers-car.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-sedan-drivers-car.jpg.webp' ); ?>">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-sedan-drivers-car.jpg' ); ?>"
						width="1800"
						height="1013"
						alt=""
						loading="lazy"
						decoding="async">
				</picture>
			</div>
		</div>
		<div class="research__gallery__row">
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-interior.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-interior.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-interior.jpg' ); ?>"
						width="1800"
						height="1013"
						alt="">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-dashboard.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-dashboard.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-dashboard.jpg' ); ?>"
						width="1800"
						height="1013"
						alt="">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-front-grille.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-front-grille.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-front-grille.jpg' ); ?>"
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
			<?php

			$trim_colors = array(
				array(
					'name'   => 'Sport',
					'slug'   => 'sport',
					'colors' => array(
						array(
							'name' => 'Crystal Blue',
							'slug' => 'crystal-blue',
							'hex'  => '#273754'
						),
						array(
							'name' => 'Jet Black',
							'slug' => 'jet-black',
							'hex'  => '#010101'
						),
						array(
							'name' => 'Machine Gray',
							'slug' => 'machine-gray',
							'hex'  => '#737373'
						),
						array(
							'name' => 'Snowflake White',
							'slug' => 'snowflake-white',
							'hex'  => '#f5f5f5'
						),
						array(
							'name' => 'Soul Red',
							'slug' => 'soul-red',
							'hex'  => '#890000'
						),
					)
					),
				array(
					'name'   => 'Touring',
					'slug'   => 'touring',
					'colors' => array(
						array(
							'name' => 'Crystal Blue',
							'slug' => 'crystal-blue',
							'hex'  => '#273754'
						),
						array(
							'name' => 'Jet Black',
							'slug' => 'jet-black',
							'hex'  => '#010101'
						),
						array(
							'name' => 'Machine Gray',
							'slug' => 'machine-gray',
							'hex'  => '#737373'
						),
						array(
							'name' => 'Snowflake White',
							'slug' => 'snowflake-white',
							'hex'  => '#f5f5f5'
						),
						array(
							'name' => 'Soul Red',
							'slug' => 'soul-red',
							'hex'  => '#890000'
						),
					)
				),
				array(
					'name'   => 'Grand Touring',
					'slug'   => 'grand-touring',
					'colors' => array(
						array(
							'name' => 'Crystal Blue',
							'slug' => 'crystal-blue',
							'hex'  => '#273754'
						),
						array(
							'name' => 'Jet Black',
							'slug' => 'jet-black',
							'hex'  => '#010101'
						),
						array(
							'name' => 'Machine Gray',
							'slug' => 'machine-gray',
							'hex'  => '#737373'
						),
						array(
							'name' => 'Snowflake White',
							'slug' => 'snowflake-white',
							'hex'  => '#f5f5f5'
						),
						array(
							'name' => 'Soul Red',
							'slug' => 'soul-red',
							'hex'  => '#890000'
						),
					)
				),
				array(
					'name'   => 'Grand Touring Reserve',
					'slug'   => 'grand-touring-reserve',
					'colors' => array(
						array(
							'name' => 'Crystal Blue',
							'slug' => 'crystal-blue',
							'hex'  => '#273754'
						),
						array(
							'name' => 'Jet Black',
							'slug' => 'jet-black',
							'hex'  => '#010101'
						),
						array(
							'name' => 'Machine Gray',
							'slug' => 'machine-gray',
							'hex'  => '#737373'
						),
						array(
							'name' => 'Snowflake White',
							'slug' => 'snowflake-white',
							'hex'  => '#f5f5f5'
						),
						array(
							'name' => 'Soul Red',
							'slug' => 'soul-red',
							'hex'  => '#890000'
						),
					)
				),
				array(
					'name'   => 'Signature',
					'slug'   => 'signature',
					'colors' => array(
						array(
							'name' => 'Crystal Blue',
							'slug' => 'crystal-blue',
							'hex'  => '#273754'
						),
						array(
							'name' => 'Jet Black',
							'slug' => 'jet-black',
							'hex'  => '#010101'
						),
						array(
							'name' => 'Machine Gray',
							'slug' => 'machine-gray',
							'hex'  => '#737373'
						),
						array(
							'name' => 'Snowflake White',
							'slug' => 'snowflake-white',
							'hex'  => '#f5f5f5'
						),
						array(
							'name' => 'Soul Red',
							'slug' => 'soul-red',
							'hex'  => '#890000'
						),
					)
				),
				array(
					'name'   => 'Carbon Edition',
					'slug'   => 'carbon-edition',
					'colors' => array(
						array(
							'name' => 'Polymetal Gray',
							'slug' => 'polymetal-gray',
							'hex'  => '#7a8292',
						),
					)
				),
			);

			?>
			<div class="research__color__photos">
				<?php foreach ( $trim_colors as $trim ) : ?>
					<?php foreach ( $trim['colors'] as $color ) : ?>
						<div class="research__color__photo" data-trim="<?php echo esc_attr( $trim['slug'] ); ?>" data-color="<?php echo esc_attr( $color['slug'] ); ?>">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trim-color-'  . $trim['slug'] . '-' . $color['slug'] . '.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trim-color-'  . $trim['slug'] . '-' . $color['slug'] . '.png.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-trim-color-'  . $trim['slug'] . '-' . $color['slug'] . '.png' ); ?>"
									width="1222"
									height="703"
									alt="2021 car6 <?php echo esc_attr( $trim['name'] . ' ' . $color['name'] ); ?>">
							</picture>
						</div>
					<?php endforeach; ?>
				<?php endforeach; ?>
			</div>
			<div class="research__color__picker">
				<?php foreach ( $trim_colors as $trim ) : ?>
					<?php foreach ( $trim['colors'] as $color ) : ?>
						<button class="research__color__picker__button"
							type="button"
							data-target-trim="<?php echo esc_attr( $trim['slug'] ); ?>"
							data-target-color="<?php echo esc_attr( $color['slug'] ); ?>" <?php echo ( '#f5f5f5' === $color['hex'] ? 'data-color="light"' : '' ); ?>><span class="visually-hidden"><?php echo esc_html( $trim['name'] . ' ' . $color['name'] ); ?></span><span class="research__color__picker__button__color" style="background-color: <?php echo esc_attr( $color['hex'] ); ?>;"></span></button>
					<?php endforeach; ?>
				<?php endforeach; ?>
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
		</ul>
		<div class="research__highlights__tabs-content" id="researchHighlightsTabsContent">
			<div class="tab-panel show" id="technology" role="tabpanel" aria-labelledby="technology-tab">
				<div class="research__highlights__carousel">
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-technology-actively-aware.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-technology-actively-aware.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-technology-actively-aware.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Technology</div>
						<div class="research__highlights__card__title">Actively Aware</div>
						<div class="research__highlights__card__body">Everything we do as a carmaker is centered around elevating your driving experience. That starts with eliminating distractions. To that end, the available Active Driving Display is placed at a precise angle for ideal visibility. At a glance, you can see vehicle speed and safety system warnings; and when equipped, you also get turn-by-turn commands from the navigation system plus Traffic Sign Recognition System notifications.<sup>13</sup> They all work together to help keep your focus where it belongs.</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-technology-see-it-all.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-technology-see-it-all.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-technology-see-it-all.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Technology</div>
						<div class="research__highlights__card__title">See It all</div>
						<div class="research__highlights__card__body">Maneuvering a midsize sedan in and out of tight spaces is a challenge for every driver. We&rsquo;ve made it a lot easier with our available 360&deg; View Monitor.<sup>15</sup> It uses four cameras to stitch together an image of the car&rsquo;s periphery on the center display, while parking sensors11 at the front and rear help detect proximity to obstacles. It&rsquo;s all about giving you, the driver, a full picture of your surroundings.</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-technology-bose-speaker-audio-system.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-technology-bose-speaker-audio-system.jpg.webp' ); ?>">
							<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-technology-bose-speaker-audio-system.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Technology</div>
						<div class="research__highlights__card__title">Bose&reg; 11-Speaker Audio System</div>
						<div class="research__highlights__card__body">A superlative driving experience should even include your sense of hearing. That&rsquo;s why your car6 can be equipped with an available Bose&reg; audio system. Delivering clear and detailed audio through 11 speakers, it lets you enjoy a surround-sound experience from nearly any source, including Bluetooth&reg;-enabled devices, radio broadcasts, available SiriusXM&reg; Satellite Radio<sup>16</sup> and more.</div>
					</div>
				</div>
				<div class="disclaimers">
					<p class="disclaimer"><sup>13</sup>Traffic Sign Recognition System is not a substitute for safe and attentive driving. Factors including weather and the condition of the traffic sign can impact recognition or display of the sign. Always check traffic signs visually while driving. Please see your Owner&rsquo;s Manual for further details. </p>
					<p class="disclaimer"><sup>15</sup>360&deg; View Monitor may not provide a comprehensive view of the entire surrounding area of this vehicle. Always check your surroundings visually. Please see your Owner&rsquo;s Manual for further details. Simulated screen.</p>
					<p class="disclaimer"><sup>16</sup>SiriusXM audio and data services each require a subscription sold separately, or as a package, by Sirius XM Radio Inc. If you decide to continue service after your trial, the subscription plan you choose will automatically renew thereafter and you will be charged according to your chosen payment method at then-current rates. Fees and taxes apply. To cancel you must call SiriusXM at 1-866-635-2349. See SiriusXM Customer Agreement for complete terms at www.siriusxm.com. All fees and programming subject to change. Sirius satellite service available only to those at least 18 and older in the 48 contiguous U.S.A., D.C., and P.R. (with coverage limitations). Current information and features may not be available in all locations. Sirius, XM and all related marks and logos are trademarks of Sirius XM Radio Inc.</p></p>
				</div>
			</div>
			<div class="tab-panel" id="safety" role="tabpanel" aria-labelledby="safety-tab">
				<div class="research__highlights__carousel">
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-blind-spot-monitoring.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-blind-spot-monitoring.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-blind-spot-monitoring.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">Blind Spot Monitoring</div>
						<div class="research__highlights__card__body">Blind Spot Monitoring<sup>18</sup> helps detect objects in your blind spots and alerts you with a chime and warning light in the side mirror and in the available Active Driving Display.</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
							<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-rear-cross-traffic-alert.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-rear-cross-traffic-alert.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-rear-cross-traffic-alert.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">Rear Cross Traffic Alert</div>
						<div class="research__highlights__card__body">When backing up, Rear Cross Traffic Alert<sup>19</sup> helps detect a vehicle approaching from the side and promptly alerts the driver with an audible warning, as well as a visual warning, in either side mirror and the rearview camera display.</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-car-radar-cruise-control-with-stop-go.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-car-radar-cruise-control-with-stop-go.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-car-radar-cruise-control-with-stop-go.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">car Radar Cruise Control with Stop &amp; Go</div>
						<div class="research__highlights__card__body">Driving in stressful traffic conditions can become a thing of the past with car Radar Cruise Control with Stop & Go.<sup>20</sup> This system maintains a set speed and minimum following distance from the traffic ahead. If the vehicle you&rsquo;re following reduces speed, even down to a stop, your vehicle will automatically slow or stop as needed.</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-smart-brake-support.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-smart-brake-support.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-smart-brake-support.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">Smart Brake Support</div>
						<div class="research__highlights__card__body">When traveling at speeds above 10 mph, Smart Brake Support<sup>21</sup> helps detect vehicles in your path. If an impact is predicted, the system will warn the driver and, if necessary, apply the brakes.</div>
					</div>
					<div class="research__highlights__card">
						<div class="research__highlights__card__photo">
						<picture>
								<source type="image/avif"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-lane-keep-assist.avif' ); ?>">
								<source type="image/webp"
									srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-lane-keep-assist.jpg.webp' ); ?>">
								<img loading="lazy"
									decoding="async"
									src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2021-car6-safety-lane-keep-assist.jpg' ); ?>"
									width="969"
									height="457"
									alt="">
							</picture>
						</div>
						<div class="research__highlights__card__section">Safety</div>
						<div class="research__highlights__card__title">Lane-Keep Assist</div>
						<div class="research__highlights__card__body">Lane-keep Assist<sup>22</sup> adds to the warnings of the Lane Departure Warning System. When it senses a potential unintentional lane departure, it will perform minor steering corrections to help prevent your vehicle from exiting the lane.</div>
					</div>
				</div>
				<div class="disclaimers">
					<p class="disclaimer"><sup>18</sup>Always check your mirrors. Be aware of the traffic around you. There are limitations to the range and detection of the system. Please see your Owner&rsquo;s Manual for further details.</p>
					<p class="disclaimer"><sup>19</sup>Always check your mirrors. Be aware of the traffic around you. There are limitations to the range and detection of the system. Please see your Owner&rsquo;s Manual for further details.</p>
					<p class="disclaimer"><sup>20</sup>car Radar Cruise Control (MRCC) with Stop & Go is not a substitute for safe and attentive driving. There are limitations to the range and detection of the system. Driver action is required to resume MRCC with Stop & Go after a complete stop. Please see your Owner&rsquo;s Manual for further details.</p>
					<p class="disclaimer"><sup>21</sup>Smart Brake Support with Collision Warning operates under certain conditions above 10 mph. It is not a substitute for safe and attentive driving and is only designed to reduce damage in the event of a collision. There are limitations to the range and detection of the system. Please see your Owner&rsquo;s Manual for details.</p>
					<p class="disclaimer"><sup>22</sup>Lane-keep Assist operates at speeds of about 37 mph and faster. It is not a substitute for safe and attentive driving. There are limitations to the range and detection of the system. Please see your Owner&rsquo;s Manual for further details.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

get_footer();
