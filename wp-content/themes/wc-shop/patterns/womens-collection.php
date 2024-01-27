<?php
/**
 * Title: Womens Collection
 * Slug: wc-shop/womens-collection
 * Categories: wc-shop
 *
 * @package Wc Shop
 * @since 1.0.0
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"0","bottom":"0"}}},"layout":{"type":"default"},"metadata":{"name":"Womens Collection"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)"><!-- wp:spacer {"height":"120px"} -->
<div style="height:120px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"lineHeight":"1.2","fontSize":"48px"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-top:0;margin-bottom:0;font-size:48px;line-height:1.2"><?php echo esc_html__( 'Women\'s Winter Collection', 'wc-shop' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":1,"query":{"perPage":"3","pages":0,"offset":"14","postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":false,"__woocommerceAttributes":[],"__woocommerceStockStatus":["instock","outofstock","onbackorder"]},"namespace":"woocommerce/product-query","layout":{"type":"constrained"}} -->
<div class="wp-block-query"><!-- wp:post-template {"backgroundColor":"base","className":"products-block-post-template","layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"16px","bottom":"0"}},"border":{"radius":"20px"}},"backgroundColor":"tertiary","layout":{"type":"default"}} -->
<div class="wp-block-group has-tertiary-background-color has-background" style="border-radius:20px;margin-top:16px;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"height":"350px"} /-->

<!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"left":"0"},"padding":{"top":"0","bottom":"0"},"margin":{"top":"0px","bottom":"0px"}}}} -->
<div class="wp-block-columns is-not-stacked-on-mobile" style="margin-top:0px;margin-bottom:0px;padding-top:0;padding-bottom:0"><!-- wp:column {"width":"15%"} -->
<div class="wp-block-column" style="flex-basis:15%"></div>
<!-- /wp:column -->

<!-- wp:column {"width":"70%","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}}} -->
<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:70%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"},"blockGap":"0"},"border":{"radius":"20px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-radius:20px;padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0","top":"0"},"padding":{"top":"0"}},"typography":{"fontSize":"25px","fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->

<!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"className":"is-style-cart-button","fontSize":"small","style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"15%"} -->
<div class="wp-block-column" style="flex-basis:15%"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|70","bottom":"0"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:0"><!-- wp:button {"style":{"spacing":{"padding":{"left":"var:preset|spacing|70","right":"var:preset|spacing|70","top":"12px","bottom":"12px"}},"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"18px"},"border":{"radius":"10px","width":"1px"}},"borderColor":"Theme","className":"is-style-outline","fontFamily":"hind"} -->
<div class="wp-block-button has-custom-font-size is-style-outline has-hind-font-family" style="font-size:18px;font-style:normal;font-weight:400"><a class="wp-block-button__link has-border-color has-theme-border-color wp-element-button" href="#" style="border-width:1px;border-radius:10px;padding-top:12px;padding-right:var(--wp--preset--spacing--70);padding-bottom:12px;padding-left:var(--wp--preset--spacing--70)"><?php echo esc_html__( 'View all products', 'wc-shop' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {"height":"120px","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:120px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->