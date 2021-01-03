<?php

// Remove search in nav, desktop view
remove_action('storefront_header', 'storefront_product_search', 40);
// Remove search in nav, mobile view
add_filter( 'storefront_handheld_footer_bar_links', 'remove_search_bottom_nav' );
function remove_search_bottom_nav($links){
	unset($links['search']);
	return $links;
}

/**
 * Edit buttons
*/

// Remove edit links in posts, pages and products
remove_action( 'storefront_single_post_bottom', 'storefront_edit_post_link', 5 );
remove_action( 'storefront_page', 'storefront_edit_post_link', 30 );
remove_action( 'woocommerce_single_product_summary', 'storefront_edit_post_link', 60 );

/**
 * Footer
 */

// Remove "Made with Storefront"
add_filter( 'storefront_credit_link', function(){return false;} );


/**
 * Homepage Overlay
 */

// Remove unused sections on Homepage
remove_action( 'homepage', 'storefront_product_categories', 20 );
remove_action( 'homepage', 'storefront_recent_products', 30 );
remove_action( 'homepage', 'storefront_featured_products', 40 );
remove_action( 'homepage', 'storefront_popular_products', 50 );
remove_action( 'homepage', 'storefront_on_sale_products', 60 );
//remove_action( 'homepage', 'storefront_best_selling_products', 70 );

//Edit number of products on best sellings products, on home page
add_filter('storefront_best_selling_products_args', 'edit_best_sellings_args');
function edit_best_sellings_args($args){
	$args['limit'] = 3;
	$args['columns'] = 3;

	return $args;
}

//Remove the_content() after header
remove_action( 'storefront_homepage', 'storefront_page_content', 20 );

// Add content between header and featured products
add_action( 'homepage', 'overlay_homepage_intro_products', 20 );