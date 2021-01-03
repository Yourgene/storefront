<?php

// Remove articles page from wp admin menu
function post_remove (){
	remove_menu_page('edit.php');
	remove_menu_page( 'edit-comments.php');
}
add_action('admin_menu', 'post_remove');

function deregister_useless_scripts(){
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'deregister_useless_scripts' );

// Remove emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );