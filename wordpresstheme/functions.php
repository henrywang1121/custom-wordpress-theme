<?php
/**
 * custom car functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Custom_Theme
 */

/**
 * Theme Constants.
 */
if ( ! defined( 'custom_BRAND' ) ) {
	define( 'custom_BRAND', 'car' );
}
if ( ! defined( 'custom_TAXONOMY' ) ) {
	define( 'custom_TAXONOMY', 'inventory' );
}
if ( ! defined( 'custom_NEW_VEHICLES_SLUG' ) ) {
	define( 'custom_NEW_VEHICLES_SLUG', 'new-cars' );
}
if ( ! defined( 'custom_USED_VEHICLES_SLUG' ) ) {
	define( 'custom_USED_VEHICLES_SLUG', 'used-vehicles' );
}
if ( ! defined( 'custom_CPO_VEHICLES_SLUG' ) ) {
	define( 'custom_CPO_VEHICLES_SLUG', 'certified-pre-owned-cars' );
}
if ( ! defined( 'custom_USED_BRAND_SLUG' ) ) {
	define( 'custom_USED_BRAND_SLUG', 'used-cars' );
}

if ( ! defined( 'RECAPTCHA_SITEKEY' ) ) {
	define( 'RECAPTCHA_SITEKEY', '' );
}
if ( ! defined( 'RECAPTCHA_SECRET' ) ) {
	define( 'RECAPTCHA_SECRET', '' );
}

if ( ! defined( 'car_DEALER_ID' ) ) {
	define( 'car_DEALER_ID', '' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function custom_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'custom' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * Enable support for Video post format.
	 *
	 */
	add_theme_support( 'post-formats', array( 'video' ) );

}
add_action( 'after_setup_theme', 'custom_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function custom_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'custom' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'custom' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'custom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function custom_scripts() {

	// Underscores (_s) starter theme scripts.
	wp_enqueue_script(
		'underscores-navigation',
		get_stylesheet_directory_uri() . '/js/vendor/navigation.js',
		array(),
		'20120206',
		true
	);
	wp_enqueue_script(
		'underscores-skip-link-focus-fix',
		get_stylesheet_directory_uri() . '/js/vendor/skip-link-focus-fix.js',
		array(),
		'20130115',
		true
	);

	// Theme stylesheet.
	wp_enqueue_style(
		'custom-style',
		get_stylesheet_uri(),
		array(),
		filemtime( get_stylesheet_directory() . '/style.css' )
	);

	// Main JS.
	wp_enqueue_script(
		'custom-main',
		get_stylesheet_directory_uri() . '/js/custom-main.min.js',
		array(
			'jquery',
		),
		filemtime( get_template_directory() . '/js/custom-main.min.js' ),
		true
	);
	wp_localize_script(
		'custom-main',
		'customMain',
		array(
			'trafficType' => custom_traffic_type(),
		)
	);

	// Forms.
	if ( is_front_page() ||
	is_page( '2022-5-research' ) ||
	is_page( '2022-5-research' ) ||
	is_page( '2023-50-research' ) ||
	is_page( '2023-5-research' ) ||
	is_page( 'genuine-car-accessories' ) ||
	is_page( 'genuine-car-air-filters' ) ||
	is_page( 'genuine-car-brakes' ) ||
	is_page( 'genuine-car-parts' ) ||
	is_page( 'genuine-car-premium-oil' ) ||
	is_page( 'genuine-car-replacement-batteries' ) ||
	is_page( 'car-courtesy-vehicles' ) ||
	is_page( 'car-service-center' ) ||
	is_page( 'car-service-specials' ) ||
	is_page( 'car-tires' ) ||
	is_page( 'parts-department-specials' ) ||
	is_page( 'routine-maintenance' ) ||
	is_page( 'contact-custom-theme' ) ||
	is_page( 'custom-order' ) ||
	is_page( 'value-your-car' ) ||
	is_page( 'job-opportunities' ) ||
	is_singular( 'service_special' ) ||
	is_singular( 'video' ) ||
	is_tax( custom_TAXONOMY ) ||
	is_post_type_archive( 'vehicle' ) ||
	is_singular( 'vehicle' ) ) {

		wp_enqueue_script(
			'custom-forms',
			get_stylesheet_directory_uri() . '/js/custom-forms.min.js',
			array(
				'custom-recaptcha',
				'jquery',
				'jquery-validation',
				'jquery-validation-additional'
			),
			filemtime( get_template_directory() . '/js/custom-forms.min.js' ),
			true
		);
		wp_localize_script(
			'custom-forms',
			'customForms',
			array(
				'ajaxurl'           => admin_url( 'admin-ajax.php' ),
				'_wpnonce'          => wp_create_nonce( 'form' ),
				'firstNameRequired' => __( 'Your first name is required.', 'custom' ),
				'lastNameRequired'  => __( 'Your last name is required.', 'custom' ),
				'emailRequired'     => __( 'Your email address is required.', 'custom' ),
				'emailInvalid'      => __( 'Please enter a valid email address.', 'custom' ),
				'phoneRequired'     => __( 'Your phone number is required.', 'custom' ),
				'phoneInvalid'      => __( 'Please enter a valid 10-digit phone number.', 'custom' ),
				'zipCodeRequired'   => __( 'Please enter your zip code.', 'custom' ),
				'vehicleVINInvalid' => __( 'Please enter a valid VIN of 17 characters.', 'custom' ),
				'reCaptchaRequired' => __( 'A ReCaptcha answer is required.', 'custom' ),
				'sitekey'           => RECAPTCHA_SITEKEY,
			)
		);

		// jQuery Validation Plugin.
		wp_enqueue_script(
			'jquery-validation',
			get_stylesheet_directory_uri() . '/js/vendor/jquery-validation/jquery.validate.min.js',
			array(
				'jquery'
			),
			'1.19.3',
			true
		);
		wp_enqueue_script(
			'jquery-validation-additional',
			get_stylesheet_directory_uri() . '/js/vendor/jquery-validation/additional-methods.min.js',
			array(
				'jquery',
				'jquery-validation'
			),
			'1.19.3',
			true
		);

		// custom reCAPTCHA.
		wp_enqueue_script(
			'custom-recaptcha',
			get_stylesheet_directory_uri() . '/js/custom-recaptcha.min.js',
			array(),
			filemtime( get_template_directory() . '/js/custom-recaptcha.min.js' ),
			true
		);
		wp_localize_script(
			'custom-recaptcha',
			'customRecaptcha',
			array(
				'sitekey' => RECAPTCHA_SITEKEY,
			)
		);

		// reCAPTCHA.
		wp_enqueue_script(
			'recaptcha',
			'https://www.google.com/recaptcha/api.js?render=explicit',
			array(),
			false,
			true
		);
	}

	// VDP.
	if ( is_singular( 'vehicle' ) ) {

		// Carousel.
		wp_enqueue_script(
			'custom-vdp',
			get_stylesheet_directory_uri() . '/js/custom-vdp.min.js',
			array(
				'jquery',
				'flickity',
				'popper'
			),
			filemtime( get_template_directory() . '/js/custom-vdp.min.js' ),
			true
		);
	}

	// VLPs.
	if ( is_tax( custom_TAXONOMY ) || is_post_type_archive( 'vehicle' ) || is_search() ) {

		// VLP.
		wp_enqueue_script(
			'custom-vlp',
			get_stylesheet_directory_uri() . '/js/custom-vlp.min.js',
			array(
				'jquery',
				'nouislider',
				'popper'
			),
			filemtime( get_template_directory() . '/js/custom-vlp.min.js' ),
			true
		);

		// NoUiSlider: Slider input plugin for multiple-handle range inputs.
		wp_enqueue_script(
			'nouislider',
			get_stylesheet_directory_uri() . '/js/vendor/nouislider/nouislider.min.js',
			array(),
			'15.6.0',
			true
		);
		wp_enqueue_style(
			'nouislider-style',
			get_stylesheet_directory_uri() .
			'/js/vendor/nouislider/nouislider.min.css',
			array(),
			'15.6.0'
		);
	}

	// VLP and VDP.
	if ( is_tax( custom_TAXONOMY ) || is_post_type_archive( 'vehicle' ) || is_search() || is_singular( 'vehicle' ) ) {
		wp_enqueue_script(
			'popper',
			get_stylesheet_directory_uri() .
			'/js/vendor/popper/popper.min.js',
			array(),
			'2.11.5',
			true
		);
	}

	// Home.
	if ( is_front_page() ) {

		// Carousels / Filter.
		wp_enqueue_script(
			'custom-home',
			get_stylesheet_directory_uri() . '/js/custom-home.min.js',
			array(
				'jquery',
				'flickity'
			),
			filemtime( get_template_directory() . '/js/custom-home.min.js' ),
			true
		);
		wp_localize_script(
			'custom-home',
			'customHome',
			array(
				'ajaxurl'  => admin_url( 'admin-ajax.php' ),
				'_wpnonce' => wp_create_nonce( 'home_filter' ),
			)
		);
	}

	// Flickity.
	if ( is_front_page() || is_singular( 'vehicle' ) || is_page( '2021-car6-research' ) || is_page( '2022-5-research' ) || is_page( '2022-5-research' ) || is_page( '2023-50-research' ) || is_page( '2023-5-research' ) || is_page( 'more-information' ) || is_page( 'awards' ) ) {

		// Flickity carousel plugin.
		wp_enqueue_style(
			'flickity-style',
			get_stylesheet_directory_uri() . '/js/vendor/flickity/flickity.min.css',
			array(),
			'2.3.0'
		);
		wp_enqueue_style(
			'flickity-fade-style',
			get_stylesheet_directory_uri() . '/js/vendor/flickity/flickity-fade.min.css',
			array( 'flickity-style' ),
			'1.0.0'
		);

		wp_enqueue_script(
			'flickity',
			get_stylesheet_directory_uri() . '/js/vendor/flickity/flickity.pkgd.min.js',
			array( 'jquery' ),
			'2.3.0',
			true
		);
		wp_enqueue_script(
			'flickity-fade',
			get_stylesheet_directory_uri() . '/js/vendor/flickity/flickity-fade.min.js',
			array(
				'jquery',
				'flickity',
			),
			'1.0.0',
			true
		);
	}

	// Specials.
	if ( is_tax( 'service_special_category' ) || is_post_type_archive( 'service_special' ) || is_singular( 'service_special' ) || is_page( 'car-service-specials' ) || is_page( 'parts-department-specials' ) || is_tax( 'special_offer_category' ) || is_post_type_archive( 'special_offer' ) || is_singular( 'video' ) ) {

		// Specials.
		wp_enqueue_script(
			'custom-specials',
			get_stylesheet_directory_uri() . '/js/custom-specials.min.js',
			array( 'jquery' ),
			filemtime( get_stylesheet_directory() . '/js/custom-specials.min.js' ),
			true
		);
	}

	// Video Archives.
	if ( is_tax( 'video_category' ) || is_post_type_archive( 'video' ) ) {

		// Videos.
		wp_enqueue_script(
			'custom-videos',
			get_stylesheet_directory_uri() . '/js/custom-videos.min.js',
			array( 'jquery' ),
			filemtime( get_stylesheet_directory() . '/js/custom-videos.min.js' ),
			true
		);
	}

	// Research Pages.
	if ( is_page( '2021-car6-research' ) || is_page( '2022-5-research' ) || is_page( '2022-5-research' ) || is_page( '2023-50-research' ) || is_page( '2023-5-research' ) ) {

		// Carousel.
		wp_enqueue_script(
			'custom-research',
			get_stylesheet_directory_uri() . '/js/custom-research.min.js',
			array(
				'jquery',
				'flickity'
			),
			filemtime( get_template_directory() . '/js/custom-research.min.js' ),
			true
		);
	}

	// Value Your Car.
	if ( is_page( 'value-your-car' ) ) {
	}

	// Dequeue unwanted default scripts and styles.
	wp_dequeue_style( 'dashicons' );
	wp_dequeue_script( 'devicepx' );
	wp_dequeue_script( 'grofiles-cards' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );

}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );

/**
 * See https://matthewhorne.me/defer-async-wordpress-scripts/.
 *
 * @param string $tag    A script tag to be loaded on page.
 * @param string $handle Script handle.
 * @return string
 */
function custom_add_script_attribute( $tag, $handle ) {
	// Script handles to defer.
	$scripts_to_defer = array(
		'underscores-navigation',
		'underscores-skip-link-focus-fix',
		'custom-main',
		'custom-recaptcha',
		'jquery-validation',
		'jquery-validation-additional',
		'custom-forms',
		'custom-vdp',
		'custom-vlp',
		'nouislider',
		'popper',
		'custom-home',
		'flickity',
		'flickity-fade',
		'custom-specials',
		'custom-videos',
		'custom-research',
	);
	foreach ( $scripts_to_defer as $defer_script ) {
		if ( $defer_script === $handle ) {
			return str_replace( ' src', ' defer src', $tag );
		}
	}

	// Script handles to async.
	$scripts_to_async = array(
		'recaptcha',
	);
	foreach ( $scripts_to_async as $async_script ) {
		if ( $async_script === $handle ) {
			return str_replace( ' src', ' async src', $tag );
		}
	}

	return $tag;
}
add_filter( 'script_loader_tag', 'custom_add_script_attribute', 10, 2 );

/**
 * Replaces the excerpt "Read More" text by a link.
 *
 * @param string $more_string The string shown within the more link.
 * @return string
 */
function custom_new_excerpt_more( $more_string ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'custom_new_excerpt_more' );

/**
 * Uses query parameters or http referer to define traffic type. Used in reporting analytics to .
 *
 * @return string
 */
function custom_traffic_type() {
	$traffic_type = 'Other';
	if ( isset( $_GET['custom_ad'] ) && 'search' === $_GET['custom_ad'] ) {
		$traffic_type = 'Paid Search';
	} elseif ( isset( $_GET['custom_ad'] ) && 'display' === $_GET['custom_ad'] ) {
		$traffic_type = 'Paid Display';
	} elseif ( ! isset( $_SERVER['HTTP_REFERER'] ) ) {
		$traffic_type = 'Typed/Bookmarked';
	} elseif ( isset( $_SERVER['HTTP_REFERER'] ) && preg_match( '[google.com|bing.com|yahoo.com|duckduckgo.com|ask.com]', sanitize_text_field( wp_unslash( $_SERVER['HTTP_REFERER'] ) ) ) === 1 ) {
		$traffic_type = 'Organic Search';
	}
	if ( ! isset( $_SESSION['traffic_type'] ) ) {
		$_SESSION['traffic_type'] = $traffic_type;
	}
	return $_SESSION['traffic_type'];
}

/**
 * Fire the custom_body_prepend action.
 *
 * @return void
 */
function custom_body_prepend() {

	/**
	 * Prints content in just inside the opening body tag and before other content.
	 */
	do_action( 'custom_body_prepend' );
}

/**
 * UAdd new image sizes.
 *
 * @return void
 */
function custom_theme_setup() {
	add_image_size( 'small', 384 );
	add_image_size( 'x_large', 1200 );
	add_image_size( 'xx_large', 1400 );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

/**
 * Undocumented class
 */
class custom_Yearly_Archives_Widget extends WP_Widget {

	/**
	 * Undocumented function
	 */
	public function __construct() {
		parent::__construct(
			// Base ID of your widget.
			'custom_yearly_archives_widget',
			// Widget name will appear in UI.
			__( 'Yearly Archives', 'custom' )
		);
	}

	/**
	 * Echoes the widget content.
	 *
	 * @param array $args Display arguments including 'before_title', 'after_title', 'before_widget', and 'after_widget'.
	 * @param array $instance The settings for the particular instance of the widget.
	 * @return void
	 */
	public function widget( $args, $instance ) {
		$default_title = __( 'Archives' );
		$title         = ! empty( $instance['title'] ) ? $instance['title'] : $default_title;
		$title         = apply_filters( 'widget_title', $title );
		$count         = ! empty( $instance['count'] ) ? '1' : '0';

		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';

		/** This filter is documented in wp-includes/widgets/class-wp-nav-menu-widget.php */
		$format = apply_filters( 'navigation_widgets_format', $format );

		if ( 'html5' === $format ) {
			// The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
			$title      = trim( strip_tags( $title ) );
			$aria_label = $title ? $title : $default_title;
			echo '<nav role="navigation" aria-label="' . esc_attr( $aria_label ) . '">';
		}

		?>
		<ul>
			<?php

			wp_get_archives(
				/**
				 * Filters the arguments for the Archives widget.
				 *
				 * @since 2.8.0
				 * @since 4.9.0 Added the `$instance` parameter.
				 *
				 * @see wp_get_archives()
				 *
				 * @param array $args     An array of Archives option arguments.
				 * @param array $instance Array of settings for the current widget.
				 */
				apply_filters(
					'widget_archives_args',
					array(
						'type'            => 'yearly',
						'show_post_count' => $count,
					),
					$instance
				)
			);

			?>
		</ul>
		<?php

		if ( 'html5' === $format ) {
			echo '</nav>';
		}
		echo $args['after_widget'];
	}

	/**
	 * Outputs the settings form for the Archives widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title' => '',
				'count' => 0,
			)
		);
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<input class="checkbox" type="checkbox"<?php checked( $instance['count'] ); ?> id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Show post counts' ); ?></label>
		</p>
		<?php
	}

	/**
	 * Handles updating settings for the current Archives widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via WP_Widget_Archives::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$new_instance      = wp_parse_args(
			(array) $new_instance,
			array(
				'title' => '',
				'count' => 0,
			)
		);
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['count'] = $new_instance['count'] ? 1 : 0;

		return $instance;
	}
}

/**
 * Registers and loads the widget.
 *
 * @return void
 */
function custom_load_widget() {
	register_widget( 'custom_Yearly_Archives_Widget' );
}
add_action( 'widgets_init', 'custom_load_widget' );

/**
 * Add attributes to images returned by wp_get_attachment_image().
 *
 * @param array $attr Array of attribute values for the image markup, keyed by attribute name.
 *
 * @return array
 */
function custom_get_attachment_image_attributes( $attr ) {
	$attr['decoding'] = 'async';
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'custom_get_attachment_image_attributes' );

/**
 * Disables emojis.
 * https://kinsta.com/knowledgebase/disable-emojis-wordpress/
 */
function custom_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'custom_disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'custom_disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'custom_disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * https://kinsta.com/knowledgebase/disable-emojis-wordpress/
 *
 * @param array $plugins An array of default TinyMCE plugins.
 * @return array
 */
function custom_disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 * https://kinsta.com/knowledgebase/disable-emojis-wordpress/
 *
 * @param array  $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function custom_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		/** Note: SVG url version number is updated with WordPress and must be changed to current version to work. */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/13.1.0/svg/' );
		$urls          = array_diff( $urls, array( $emoji_svg_url ) );
	}
	return $urls;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Advanced Custom Fields functions.
 */
require get_template_directory() . '/inc/custom-acf-functions.php';

/**
 * Vehicle Filter and Sort functions.
 */
require get_template_directory() . '/inc/custom-filter-functions.php';

/**
 * Form functions.
 */
require get_template_directory() . '/inc/custom-forms.php';

/**
 * Form submit functions.
 */
require get_template_directory() . '/inc/custom-form-submit-functions.php';

/**
 * Price functions.
 */
require get_template_directory() . '/inc/custom-price-functions.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Vehicle Import functions.
 */
require get_template_directory() . '/inc/custom-wp-all-import-functions.php';

/**
 * custom helper functions.
 */
require get_template_directory() . '/inc/custom-helper-functions.php';

/**
 * Template-related functions.
 */
require get_template_directory() . '/inc/custom-template-functions.php';

/**
 * Custom Post Type and Taxonomy functions.
 */
require get_template_directory() . '/inc/custom-post-types-taxonomies.php';

/**
 * Custom SEO title and description functions.
 */
require get_template_directory() . '/inc/custom-seo.php';