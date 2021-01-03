<?php

/**
 * General Settings
 */
include 'setup/remove_unused_functionnalities.php';
include 'setup/acf.php';

include 'templates/template-functions.php';
include 'templates/template-homepage.php';

//todo : faire une GROSSE passe sur le css
	//todo : deplacer le css
	// todo: remettre les mixins : screen width, etc
//todo : enlever tous les scripts inutiles
//todo : la page de settings
//todo: mettre seo
//todo : refaire la page d'accueil
//todo: faire le footer

/**
 * Storefront settings
 */
include 'storefront_functions.php';

/**
 * Woocommerce settings
 */
include 'woocommerce_functions.php';