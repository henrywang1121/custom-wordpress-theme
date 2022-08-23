<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Custom_Theme
 */

get_header();

?>
<main id="main" class="site-main">
	<?php

	get_template_part(
		'template-parts/content',
		'copy',
		array(
			'alignment' => 'center',
			'headline'  => 'Sorry, Nothing Found',
			'body'      => 'The page you requested was not found.',
		)
	);

	?>
</main>
<?php

get_footer();
