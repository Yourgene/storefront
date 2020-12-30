<?php

/**
 * Header and Navigation
 */

// Remove search in nav
remove_action('storefront_header', 'storefront_product_search', 40);

// Remove edit buttons in posts and pages
remove_action( 'storefront_single_post_bottom', 'storefront_edit_post_link', 5 );
remove_action( 'storefront_page', 'storefront_edit_post_link', 30 );
