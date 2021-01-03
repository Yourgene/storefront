<?php

require_once(get_template_directory() . '/inc/overlay/vendor/autoload.php');
require_once(get_template_directory() . '/inc/overlay/enums/AcfConstants.php');

use StoutLogic\AcfBuilder\FieldsBuilder;
use WP\Enums\AcfConstants;

add_action('acf/init', function()  {
	init_all();
});
add_filter('acf/settings/remove_wp_meta_box', '__return_true');

//------------------------------------------------------------------------------------
//----------- Functions  -------------------------------------------------------------
//------------------------------------------------------------------------------------
function init_all(){
	init_front_page();
}

function init_front_page(){

	// Description des produits
	$home_products = new FieldsBuilder('home_products');
	$home_products
		->addGroup(AcfConstants::SERVICES_GROUP, [ 'label' => ''])
		->addText(AcfConstants::SERVICES_FIRST_TITLE, [
			'label' => 'Titre de la Section',
			'wrapper' => array(
				'width' => 50
			)
		])
		->addImage(AcfConstants::SERVICES_IMAGE, [
			'label' => 'Image de la Section',
			'wrapper' => array(
				'width' => 50
			)
		])
		->addWysiwyg(AcfConstants::SERVICES_CONTENT, [
			'label' => 'Contenu'
		]);


	//Front Page fields
	$frontPage = new FieldsBuilder('champs_fonctionnels_accueil', [
		'label' => 'Champs Fonctionnels',
		'hide_on_screen' => [
			0 => 'the_content',
		],
	]);
	$frontPage
		->addTab('Introduction produit')
		->addFields($home_products);

	$frontPage
		->setLocation('page_template', '==', 'template-homepage.php');

	acf_add_local_field_group($frontPage->build());
}

