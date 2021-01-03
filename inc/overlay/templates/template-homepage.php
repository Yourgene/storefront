<?php

require_once(get_template_directory() . '/inc/overlay/enums/AcfConstants.php');
require_once(get_template_directory() . '/inc/overlay/enums/SiteConstants.php');
use WP\Enums\AcfConstants;
use WP\Enums\SiteConstants;

// Added by add_action( 'homepage', 'overlay_homepage_intro_products', 20 );
// in storefront_actions
function overlay_homepage_intro_products() {
	$products_group = get_field(AcfConstants::SERVICES_GROUP);
	$products_title = $products_group[AcfConstants::SERVICES_FIRST_TITLE];
	$products_content = $products_group[AcfConstants::SERVICES_CONTENT];
	$products_image = $products_group[AcfConstants::SERVICES_IMAGE];
	$product_page_url = get_permalink(get_page_by_path(SiteConstants::PRODUCTS_PAGE_SLUG ));
	?>
		<section class="">
			<img class="image-responsive" src="<?php echo($products_image['url'])?>" alt="<?php echo($products_image['alt'])?>">
			<h2 class="section-title"><?php echo $products_title ?></h2>
			<div><?php echo($products_content)?></div>
			<a class="link-button card-button" href="<?php echo($product_page_url)?>">En savoir plus &rarr;</a>
		</section>
	<?php
}
