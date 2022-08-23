<?php
/**
 * The template for displaying single service specials posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Custom_Theme
 */

get_header();

?>
<div class="breadcrumb-search__container">
	<div class="breadcrumb-search">
		<a class="breadcrumb-search__link" href="/service-specials"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M29 17.268H7.815l9.951 9.829L16.16 29 3 16 16.16 3l1.605 1.585-9.95 10.147H29v2.536z"/></svg> Back to Specials</a>
	</div>
</div>
<div class="specials specials--single">
	<?php

	get_template_part( 'template-parts/specials' );

	?>
	<div class="site-disclaimer">
		<?php get_template_part( 'template-parts/disclaimer', 'prop-65' ); ?>
	</div>
</div>
<?php

get_footer();
