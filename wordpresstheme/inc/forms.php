<?php
/**
 * Form Validation, Submit and Logging Functions.
 *
 * @package Custom_Theme
 */

/**
 * Return modal template part wth ajax.
 *
 * @return void
 */
function custom_get_modal_callback() {
	check_ajax_referer( 'form', '_wpnonce' );
	if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] ) {
		$id            = '';
		$template_part = array();
		if ( ! empty( $_POST['id'] ) ) {
			$id = sanitize_text_field( wp_unslash( $_POST['id'] ) );
		}
		if ( ! empty( $_POST['templatePart'] ) && is_array( $_POST['templatePart'] ) ) {
			$template_part = wp_unslash( $_POST['templatePart'] );
		}
		get_template_part(
			'template-parts/modal',
			'',
			array(
				'id'            => $id,
				'template_part' => $template_part,
			)
		);
	}
	exit();
}
add_action( 'wp_ajax_custom_get_modal_callback', 'custom_get_modal_callback' );
add_action( 'wp_ajax_nopriv_custom_get_modal_callback', 'custom_get_modal_callback' );
