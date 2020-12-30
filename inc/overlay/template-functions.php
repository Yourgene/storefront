<?php

/**
 * Returns alt image by slug
 */
function get_alt_of_image_by_slug($slug){
	return get_post_meta($slug, '_wp_attachment_image_alt', true);
}

/**
 * Returns image data by its slug
 */
function get_image_data_by_slug( $slug ) {
	$args = array(
		'post_type' => 'attachment',
		'name' => sanitize_title($slug),
		'posts_per_page' => 1,
		'post_status' => 'inherit',
	);
	$_header = get_posts( $args );
	$header = $_header ? array_pop($_header) : null;

	$image = [
		'url' => wp_get_attachment_url($header->ID),
		'alt' => get_alt_of_image_by_slug($header->ID)
	];

	return $image;
}