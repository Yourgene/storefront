<?php

/**
 * removes downloads section from my account
 */
function custom_my_account_menu_items( $items ) {
	unset($items['downloads']);
	return $items;
}
add_filter( 'woocommerce_account_menu_items', 'custom_my_account_menu_items' );


/**
 * Désactive les Produits Apparentés / related products des fiches produits
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products',20);

/**
 * add guide des tailles section in product page
 */
add_filter( 'woocommerce_product_tabs', 'guide_taille_tab' );
function guide_taille_tab( $tabs ) {
	$tabs['guide_tailles'] = array(
		'title' 	=> 'Guide des tailles',
		'priority' 	=> 50,
		'callback' 	=> 'contenu_guide_tailles'
	);
	return $tabs;
}
function contenu_guide_tailles() {
	$image = get_image_data_by_slug('guide-tailles');
	echo '<h2>Guide des tailles</h2>';
	echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '"/>';
}

/**
 * Disable WooCommerce block styles (back-end).
 * And Gutemberg
 */
function slug_disable_woocommerce_block_editor_styles() {
	wp_deregister_style( 'wc-block-editor' );
	wp_deregister_style( 'wc-block-style' );
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );

}
add_action( 'enqueue_block_assets', 'slug_disable_woocommerce_block_editor_styles', 1, 1 );

/**
 * Removes strength meter
 */
function remove_password_strength() {
	wp_dequeue_script( 'wc-password-strength-meter' );
}
add_action( 'wp_print_scripts', 'remove_password_strength', 10 );
