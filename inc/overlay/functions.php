<?php

/**
 * General Settings
 */
include 'template-functions.php';

//todo : enlever toutes les icones inutiles du menu admin
//todo : faire une GROSSE passe sur le css
	//todo : deplacer le css
	// todo: remettre les mixins : screen width, etc
//todo : rendre le footer sticky
//todo : la page de settings
//todo: mettre acf
//todo: mettre seo
//todo : refaire la page d'accueil

/**
 * Storefront settings
 */
include 'storefront_functions.php';

/**
 * Woocommerce settings
 */
include 'woocommerce_functions.php';

/**
 * Acf settings
 */
add_filter('acf/settings/show_admin', '__return_false');