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
			<h1 class="breadcrumb-search__title">2023 CX-50</h1>
		</div>
		<div class="breadcrumb-search__cta">
			<a class="button button--primary--black"
				href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-50">Explore CX-50 Inventory</a>
		</div>
	</div>
</div>

<div class="research">
	<div class="research__hero cx-50">
		<picture>
			<source type="image/avif"
				srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-hero.avif' ); ?>">
			<source type="image/webp"
				srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-hero.jpg.webp' ); ?>">
			<img loading="eager"
				decoding="auto"
				src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-hero.jpg' ); ?>"
				width="960"
				height="552"
				alt="">
		</picture>
		<div class="research__hero__headline">
			<span>The first-ever car CX-50</span>
			We're More Human in Nature
		</div>
		<div class="research__hero__ctas">
			<a class="button button--secondary--transparent ga-event"
				href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-50"
				data-ga-cat="2023 car CX-50"
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
				data-ga-cat="2023 car CX-50"
				data-ga-action="Click"
				data-ga-label="Schedule Test Drive Button">Schedule Test Drive</button>
				<p class="disclaimer">Pre-production car CX-50 2.5 Turbo Meridian Edition with Apex package and accessories shown.<sup>1</sup></p>
		</div>
        <p class="disclaimer"></p>
	</div>

	<div class="research__trims">
		<h2><span>car CX-50 Trims</span>Trim Comparison</h2>
		<div class="research__trims__carousel">
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-jet-black.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-jet-black.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-jet-black.png' ); ?>"
							width="960"
							height="552"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 S</h3>
					<div class="research__trims__carousel__details__price">Starting at $27,550<sup>1</sup></div>
					<ul>
						<li>i-ACTIV AWD®</li>
						<li>Apple CarPlay™ integration<sup>2</sup></li>
						<li>car Radar Cruise Control w/ Stop & Go<sup>3</sup></li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-50&trim=2.5+S+Package">View Inventory</a>
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-select-ingot-blue.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-select-ingot-blue.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-select-ingot-blue.png' ); ?>"
							width="960"
							height="552"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 S Select</h3>
					<div class="research__trims__carousel__details__price">Starting at $28,950<sup>1</sup></div>
					<ul>
						<li>Dual zone automatic climate control</li>
						<li>10.25 full color display</li>
						<li>17" Black Metallic finish wheel</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-50&trim=2.5+S+Select+Package">View Inventory</a>
				</div>
			</div>
            <div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-preferred-machine-gray.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-preferred-machine-gray.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-preferred-machine-gray.png' ); ?>"
							width="960"
							height="552"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 S Preferred</h3>
					<div class="research__trims__carousel__details__price">Starting at $30,250<sup>1</sup></div>
					<ul>
						<li>Rear Power Liftgate<sup>4</sup></li>
						<li>Heated side mirrors</li>
						<li>3-level heated front seats</li>
						<li>*Available Late 2022</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-50&trim=2.5+S+Preferred+Package">View Inventory</a>
				</div>
			</div>
            <div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-preferred-plus-soul-red.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-preferred-plus-soul-red.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-preferred-plus-soul-red.png' ); ?>"
							width="960"
							height="552"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 S Preferred Plus</h3>
					<div class="research__trims__carousel__details__price">Starting at $32,690<sup>1</sup></div>
					<ul>
						<li>Power sliding panoramic moonroof</li>
						<li>Rear Power Liftgate<sup>4</sup></li>
						<li>Heated side mirrors</li>
						<li>*Available Late 2022</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-50&trim=2.5+S+Preferred+Plus+Package">View Inventory</a>
				</div>
			</div>
            <div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-premium-wind-chill-pearl.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-premium-wind-chill-pearl.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-premium-wind-chill-pearl.png' ); ?>"
							width="960"
							height="552"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 S Premium</h3>
					<div class="research__trims__carousel__details__price">Starting at $35,150<sup>1</sup></div>
					<ul>
						<li>Leather seats</li>
						<li>6-way power adjustable passenger seat</li>
						<li>Audio dimming rearview mirror with HomeLink®</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-50&trim=2.5+S+Premium+Package">View Inventory</a>
				</div>
			</div>
            <div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-premium-plus-machine-gray.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-premium-plus-machine-gray.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-premium-plus-machine-gray.png' ); ?>"
							width="960"
							height="552"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 S Premium Plus</h3>
					<div class="research__trims__carousel__details__price">Starting at $37,150<sup>1</sup></div>
					<ul>
						<li>20" Aluminum alloy wheels</li>
						<li>Active Driving Display</li>
						<li>Automatic power folding side mirrors</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-50&trim=2.5+S+Premium+Plus+Package">View Inventory</a>
				</div>
			</div>
            <div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-soul-red.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-soul-red.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-soul-red.png' ); ?>"
							width="960"
							height="552"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 Turbo</h3>
					<div class="research__trims__carousel__details__price">Starting at $37,150<sup>1</sup></div>
					<ul>
						<li>Mi-Drive towing mode </li>
						<li>8-speaker audio sound system</li>
						<li>Paddle shifters</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-50&trim=2.5+Turbo+Package">View Inventory</a>
				</div>
			</div>
			<div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-meridian-zircon-sand.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-meridian-zircon-sand.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-meridian-zircon-sand.png' ); ?>"
							width="960"
							height="552"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 Turbo Meridian Edition</h3>
					<div class="research__trims__carousel__details__price">Starting at $39,950<sup>1</sup></div>
					<ul>
						<li>18” black allow wheels w/ all-terrain tires</li>
						<li>Hood graphics</li>
						<li>Side rocker and head lamp garnish</li>
						<li>*Expected Late August/September 2022</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-50&trim=2.5+Turbo+Meridian+Package">View Inventory</a>
				</div>
			</div>
            <div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-premium-zircon-sand.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-premium-zircon-sand.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-premium-zircon-sand.png' ); ?>"
							width="960"
							height="552"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 Turbo Premium</h3>
					<div class="research__trims__carousel__details__price">Starting at $40,300<sup>1</sup></div>
					<ul>
						<li>Automatic power folding side mirrors</li>
						<li>10-speaker Bose® audio system</li>
						<li>Heated steering wheel</li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-50&trim=2.5+Turbo+Premium+Package">View Inventory</a>
				</div>
			</div>
            <div class="research__trims__carousel__cell">
				<div class="research__trims__carousel__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-premium-plus-polymetal-gray.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-premium-plus-polymetal-gray.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-premium-plus-polymetal-gray.png' ); ?>"
							width="960"
							height="552"
							alt="">
					</picture>
				</div>
				<div class="research__trims__carousel__details">
					<h3 class="research__trims__carousel__details__title">2.5 Turbo Premium Plus</h3>
					<div class="research__trims__carousel__details__price">Starting at $42,300<sup>1</sup></div>
					<ul>
						<li>Heated rear seats</li>
						<li>Wireless phone charge<sup>5</sup></li>
						<li>360º View Monitor<sup>6</sup></li>
					</ul>
					<a class="button button--primary--black" href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-50&trim=2.5+Turbo+Premium+Plus+Package">View Inventory</a>
				</div>
			</div>
		</div>
		<div class="research__trims__carousel__nav">
			<div class="research__trims__carousel__nav__cell" data-target-trim="club">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-jet-black.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-jet-black.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-jet-black.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 S</h4>
				<div class="research__trims__carousel__nav__price">Starting at $27,550<sup>1</sup></div>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-select-ingot-blue.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-select-ingot-blue.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-select-ingot-blue.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 S Select</h4>
				<div class="research__trims__carousel__nav__price">Starting at $28,950<sup>1</sup></div>
			</div>
            <div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-preferred-machine-gray.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-preferred-machine-gray.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-preferred-machine-gray.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 S Preferred</h4>
				<div class="research__trims__carousel__nav__price">Starting at $30,250<sup>1</sup></div>
			</div>
            <div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-preferred-plus-soul-red.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-preferred-plus-soul-red.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-preferred-plus-soul-red.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 S Preferred Plus</h4>
				<div class="research__trims__carousel__nav__price">Starting at $32,690<sup>1</sup></div>
			</div>
            <div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-premium-wind-chill-pearl.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-premium-wind-chill-pearl.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-premium-wind-chill-pearl.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 S Premium</h4>
				<div class="research__trims__carousel__nav__price">Starting at $35,150<sup>1</sup></div>
			</div>
            <div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-premium-plus-machine-gray.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-premium-plus-machine-gray.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5S-premium-plus-machine-gray.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 S Premium Plus</h4>
				<div class="research__trims__carousel__nav__price">Starting at $37,150<sup>1</sup></div>
			</div>
            <div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-soul-red.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-soul-red.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-soul-red.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 Turbo</h4>
				<div class="research__trims__carousel__nav__price">Starting at $37,150<sup>1</sup></div>
			</div>
			<div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-meridian-zircon-sand.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-meridian-zircon-sand.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-meridian-zircon-sand.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 Turbo Meridian Edition</h4>
				<div class="research__trims__carousel__nav__price">Starting at $39,950<sup>1</sup></div>
			</div>
            <div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-premium-zircon-sand.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-premium-zircon-sand.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-premium-zircon-sand.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 Turbo Premium</h4>
				<div class="research__trims__carousel__nav__price">Starting at $40,300<sup>1</sup></div>
			</div>
            <div class="research__trims__carousel__nav__cell" data-target-trim="gt">
				<div class="research__trims__carousel__nav__photo">
					<picture>
						<source type="image/avif"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-premium-plus-polymetal-gray.avif' ); ?>">
						<source type="image/webp"
							srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-premium-plus-polymetal-gray.png.webp' ); ?>">
						<img loading="lazy"
							decoding="async"
							src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-2-5-turbo-premium-plus-polymetal-gray.png' ); ?>"
							width="1000"
							height="575"
							alt="">
					</picture>
				</div>
				<h4 class="research__trims__carousel__nav__title">2.5 Turbo Premium Plus</h4>
				<div class="research__trims__carousel__nav__price">Starting at $42,300<sup>1</sup></div>
			</div>
		</div>
		<div class="disclaimers">
			<p class="disclaimer"><sup>1</sup>MSRP excludes tax, title, license fees and $1,275 destination charge (Alaska $1,320). Vehicle shown may be priced higher. Actual dealer price will vary. See dealer for complete details.</p>
            <p class="disclaimer"><sup>2</sup>Requires compatible iPhone and standard text and data rates apply. Apple is solely responsible for CarPlay functionality and its terms and privacy statements apply. Don’t drive while distracted or while using a hand-held device. Apple CarPlay, iPhone and Siri are trademarks of Apple Inc.</p>
            <p class="disclaimer"><sup>3</sup>car Radar Cruise Control (MRCC) with Stop & Go is not a substitute for safe and attentive driving. There are limitations to the range and detection of the system. Driver action is required to resume MRCC with Stop & Go after a complete stop. Please see your Owner’s Manual for further details.</p>
            <p class="disclaimer"><sup>4</sup>Always check the area around the Rear Power Liftgate before opening and closing it. Please see your Owner’s Manual for further details.</p>
            <p class="disclaimer"><sup>5</sup>Requires Qi-enabled smartphone. Please see your Owner’s Manual for further details.</p>
            <p class="disclaimer"><sup>6</sup>360º View Monitor may not provide a comprehensive view of the entire surrounding area of this vehicle. Always check your surroundings visually. Please see your Owner’s Manual for further details.</p>
		</div>
	</div>


    <div class="research__hero intro_panel">
		<div class="research__hero__headline">
			There is always a new terrain
		</div>
        <div class="research__hero__body">
            <p>We created the car CX-50 to enhance your connection to nature, to the road and everything along the way. Via advanced driving technologies and rugged yet refined design, the CX-50 is fully capable of elevating every outdoor experience.</p>
		</div>
		<div class="research__hero__ctas">
            <p class="disclaimer">2023 car CX-50 available Spring 2022. Late availability pre-production trim and accessories shown throughout initially expected late 2022 and subject to change. Production model will vary.</p>
		</div>
	</div>

    <div class="research__hero performance_panel">
		<picture>
			<source 
				media="(max-width: 576px)"
				srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-performance-meridian.jpg' ); ?>">
			<img loading="eager"
				decoding="auto"
				src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-performance-meridian.jpg' ); ?>"
				width="960"
				height="552"
				alt="">
		</picture>
		<div class="research__hero__headline">
            Chase your Wonder 
		</div>
        <div class="research__hero__body">
            <p>Enjoy a seamless connection to every terrain with our necustom i-Activ AWD® technology, a standard feature on all trim levels. The CX-50 is also equipped with car intelligent Drive Select (Mi-Drive) technology that includes drive modes which enhance off-road and sport driving. Turbo models also include a mode designed to support towing. So, you can stay effortlessly immersed in the moment, no matter where the road takes you.</p>
		</div>
		<div class="research__hero__ctas">
            <p class="disclaimer">Use care and reduce speed when traveling on rough/uneven roads.</p>
            <p class="disclaimer">2023 car CX-50 available Spring 2022.  Late availability pre-production trim and accessories shown throughout initially expected late 2022 and subject to change. Production model will vary.</p>
		</div>
	</div>
    <div class="research__hero performance_panel_mobile">
		<div class="research__hero__headline">
            Chase your Wonder 
		</div>
        <div class="research__hero__body">
            <p>Enjoy a seamless connection to every terrain with our necustom i-Activ AWD® technology, a standard feature on all trim levels. The CX-50 is also equipped with car intelligent Drive Select (Mi-Drive) technology that includes drive modes which enhance off-road and sport driving. Turbo models also include a mode designed to support towing. So, you can stay effortlessly immersed in the moment, no matter where the road takes you.</p>
		</div>
		<div class="research__hero__ctas">
            <p class="disclaimer">Use care and reduce speed when traveling on rough/uneven roads.</p>
            <p class="disclaimer">2023 car CX-50 available Spring 2022.  Late availability pre-production trim and accessories shown throughout initially expected late 2022 and subject to change. Production model will vary.</p>
		</div>
	</div>

    <div class="research__hero vibrant_utility_panel">
		<div class="research__hero__headline">
            Beautifully capable 
		</div>
        <div class="research__hero__body">
            <p>The modern, refined yet utilitarian lines of the CX-50 are meant to fuel your passion for nature. With a wide stance, low roof line, and a cabin that takes its cues from outdoor equipment such as the grip of a telephoto lens and the resilient sturdy fabric of hiking backpacks, the CX-50 inspires and enables you to go further.</p>
		</div>
	</div>

	<div class="research__gallery">
		<div class="research__gallery__row">
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-1.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-1.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-1.jpg' ); ?>"
						width="1800"
						height="1013"
						alt="">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-2.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-2.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-2.jpg' ); ?>"
						width="1800"
						height="1013"
						alt="">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-3.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-3.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-3.jpg' ); ?>"
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
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-7.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-7.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-7.jpg' ); ?>"
						width="1800"
						height="1013"
						alt="">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-5.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-5.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-5.jpg' ); ?>"
						width="1800"
						height="1013"
						alt="">
				</picture>
			</div>
			<div class="research__gallery__photo">
				<picture>
					<source type="image/avif"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-6.avif' ); ?>">
					<source type="image/webp"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-6.jpg.webp' ); ?>">
					<img loading="lazy"
						decoding="async"
						src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-gallery-6.jpg' ); ?>"
						width="1800"
						height="1013"
						alt="">
				</picture>
			</div>
		</div>
        <div class="research__gallery__disclainer">
            <p class="disclaimer">Late availability pre-production trim and accessories shown subject to change.</p>
		</div>
	</div>

    <div class="research__hero cargo_capacity">
		<picture>
			<source 
				media="(max-width: 576px)"
				srcset="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-cargo-meridian.jpg' ); ?>">
			<img loading="eager"
				decoding="auto"
				src="<?php echo esc_url( get_template_directory_uri() . '/images/research-2023-cx-50-cargo-meridian.jpg' ); ?>"
				width="960"
				height="552"
				alt="">
		</picture>
		<div class="research__hero__headline">
            For collectors of rare experiences
		</div>
        <div class="research__hero__body">
            <p>Your connection with nature is intensified even more through the versatility and strength of the CX-50. The roof rails have been designed to carry outdoor equipment like kayaks, rooftop storage units and rooftop tents. The elongated cargo floor and liftgate opening are optimized for easily stowing all your outdoor gear.</p>
			<a class="button button--secondary--transparent ga-event"
				href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-50"
				data-ga-cat="2023 car CX-50"
				data-ga-action="Click"
				data-ga-label="Schedule Test Drive Button">View Inventory</a>
		</div>
		<div class="research__hero__ctas">
            <p class="disclaimer">Pre-production 2023 car CX-50 shown with standard AWD. Available Spring 2022. Late availability model and accessories shown. Production model will vary. Please remember to properly secure all cargo.</p>
		</div>
	</div>
    <div class="research__hero cargo_capacity_mobile">
		<div class="research__hero__headline">
            For collectors of rare experiences
		</div>
        <div class="research__hero__body">
            <p>Your connection with nature is intensified even more through the versatility and strength of the CX-50. The roof rails have been designed to carry outdoor equipment like kayaks, rooftop storage units and rooftop tents. The elongated cargo floor and liftgate opening are optimized for easily stowing all your outdoor gear.</p>
		</div>
		<div class="research__hero__ctas">
			<a class="button button--secondary--transparent ga-event"
				href="/inventory/?sort=price-asc&taxonomy=inventory&inventory=new-cars&model=CX-50"
				data-ga-cat="2023 car CX-50"
				data-ga-action="Click"
				data-ga-label="Schedule Test Drive Button">View Inventory</a>
            <p class="disclaimer">Pre-production 2023 car CX-50 shown with standard AWD. Available Spring 2022. Late availability model and accessories shown. Production model will vary. Please remember to properly secure all cargo.</p>
		</div>
	</div>
</div>
<?php

get_footer();
