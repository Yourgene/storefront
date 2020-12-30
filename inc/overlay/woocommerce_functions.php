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
