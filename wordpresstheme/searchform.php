<?php
/**
 * The template for displaying search forms
 *
 * @package Custom_Theme
 */

?>
<form class="search-form" method="get" action="/inventory">
	<label for="s" class="visually-hidden">Search</label>
	<input type="text" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" id="s" placeholder="Search">
	<button type="submit"><span class="visually-hidden">Search</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M26.442 28l-6.545-6.462c-1.662 1.436-3.636 2.154-5.922 2.154-1.455 0-2.753-.256-3.896-.769-1.143-.513-2.234-1.231-3.273-2.154-1.039-.923-1.766-2-2.182-3.231A11.464 11.464 0 014 13.846c0-1.231.208-2.462.623-3.692s1.143-2.308 2.182-3.231 2.13-1.641 3.273-2.154S12.468 4 13.818 4c1.351 0 2.597.256 3.74.769a10.588 10.588 0 013.117 2.154 9.91 9.91 0 012.182 3.231c.519 1.231.779 2.41.779 3.538s-.208 2.205-.623 3.231a12.006 12.006 0 01-1.558 2.769L28 26.154 26.442 28zm-12.78-6.769c2.078 0 3.844-.718 5.299-2.154 1.455-1.436 2.182-3.179 2.182-5.231 0-2.051-.727-3.795-2.182-5.231s-3.221-2.154-5.299-2.154-3.844.718-5.298 2.154-2.182 3.179-2.182 5.231.727 3.795 2.182 5.231c1.454 1.436 3.22 2.154 5.298 2.154z"/></svg></button>
</form>
