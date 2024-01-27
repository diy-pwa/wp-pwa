<?php
/**
 * Title: Product Search Results Template
 * Slug: wc-shop/product-search-results-template
 * Categories: wc-shop
 *
 * @package Wc Shop
 * @since 1.0.0
 */

?>
<!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"right":"0","left":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<main class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:0;padding-left:0"><!-- wp:group {"style":{"dimensions":{"minHeight":""},"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() );?>/assets/images/gallery-images-4.jpg","id":258,"dimRatio":30,"minHeight":450,"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="min-height:450px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-30 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-258" alt="" src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/gallery-images-4.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignfull"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"48px"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:48px"><?php echo esc_html__( 'Welcome To Wc Shop Store', 'wc-shop' ); ?> </h2>
<!-- /wp:heading -->

<!-- wp:woocommerce/breadcrumbs {"fontSize":"medium","align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":{"left":"var:preset|spacing|70"}},"color":{"gradient":"linear-gradient(135deg,rgb(238,238,238) 23%,rgb(169,184,195) 52%)"}}} -->
<div class="wp-block-columns has-background" style="background:linear-gradient(135deg,rgb(238,238,238) 23%,rgb(169,184,195) 52%);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"30%","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0;padding-bottom:0;flex-basis:30%"><!-- wp:image {"id":1064,"width":"325px","height":"auto","aspectRatio":"0.7","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"sale-banner-left-img"} -->
<figure class="wp-block-image size-full is-resized sale-banner-left-img"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/sale-banner-1.jpg" alt="" class="wp-image-1064" style="aspect-ratio:0.7;object-fit:cover;width:325px;height:auto"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%"><!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:paragraph {"align":"left","style":{"typography":{"textTransform":"uppercase","letterSpacing":"3px"}}} -->
<p class="has-text-align-left" style="letter-spacing:3px;text-transform:uppercase"><?php echo esc_html__( 'Limited Time Offer', 'wc-shop' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"left","style":{"typography":{"fontSize":"48px","lineHeight":"1.2"},"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
<p class="has-text-align-left" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20);font-size:48px;line-height:1.2"><?php echo esc_html__( 'New Arrivals', 'wc-shop' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"0"}}}} -->
<p class="has-text-align-left" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:0"><?php echo esc_html__( 'Get an extra 50% Off', 'wc-shop' ); ?> </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"left","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<p class="has-text-align-left" style="margin-top:0;margin-bottom:0">&amp; <?php echo esc_html__( 'free shipping', 'wc-shop' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textAlign":"center"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button"><?php echo esc_html__( 'Shop Now', 'wc-shop' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","width":"40%","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"0"}}} -->
<div class="wp-block-column is-vertically-aligned-bottom" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:40%"><!-- wp:image {"id":1170,"scale":"cover","sizeSlug":"full","linkDestination":"none","style":{"color":[]},"className":"is-style-default"} -->
<figure class="wp-block-image size-full is-style-default"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/sale-banner-2.png" alt="" class="wp-image-1170" style="object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"30%"} -->
<div class="wp-block-column" style="flex-basis:30%"><!-- wp:group {"style":{"spacing":{"blockGap":"16px","padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}},"border":{"radius":"5px"}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-tertiary-background-color has-background" style="border-radius:5px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","fontSize":"large"} -->
<h3 class="wp-block-heading has-black-color has-text-color has-link-color has-large-font-size"><?php echo esc_html__( 'Search', 'wc-shop' ); ?> </h3>
<!-- /wp:heading -->

<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search products…","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"query":{"post_type":"product"},"style":{"border":{"width":"0px","style":"none"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}},"border":{"radius":"5px"}},"backgroundColor":"tertiary","layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group has-tertiary-background-color has-background" style="border-radius:5px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","className":"is-style-default","fontSize":"large"} -->
<h3 class="wp-block-heading is-style-default has-black-color has-text-color has-link-color has-large-font-size"><?php echo esc_html__( 'Categories', 'wc-shop' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/product-categories {"style":{"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","fontSize":"small"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}},"border":{"radius":"5px"}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-tertiary-background-color has-background" style="border-radius:5px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:woocommerce/filter-wrapper {"filterType":"price-filter","heading":"Filter by price"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","fontSize":"large"} -->
<h3 class="wp-block-heading has-black-color has-text-color has-link-color has-large-font-size"><?php echo esc_html__( 'Filter by price', 'wc-shop' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/price-filter {"heading":"","lock":{"remove":true},"textColor":"black","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}}} -->
<div class="wp-block-woocommerce-price-filter is-loading has-black-color has-text-color has-link-color"><span aria-hidden="true" class="wc-block-product-categories__placeholder"></span></div>
<!-- /wp:woocommerce/price-filter --></div>
<!-- /wp:woocommerce/filter-wrapper --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}},"border":{"radius":"5px"}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-tertiary-background-color has-background" style="border-radius:5px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:woocommerce/filter-wrapper {"filterType":"attribute-filter","heading":"Filter by attribute"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black"} -->
<h3 class="wp-block-heading has-black-color has-text-color has-link-color"><?php echo esc_html__( 'Filter by color', 'wc-shop' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/attribute-filter {"attributeId":1,"heading":"","lock":{"remove":true},"textColor":"black","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}}} -->
<div class="wp-block-woocommerce-attribute-filter is-loading has-black-color has-text-color has-link-color"></div>
<!-- /wp:woocommerce/attribute-filter --></div>
<!-- /wp:woocommerce/filter-wrapper --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}},"border":{"radius":"5px"}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-tertiary-background-color has-background" style="border-radius:5px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:woocommerce/filter-wrapper {"filterType":"attribute-filter","heading":"Filter by attribute"} -->
<div class="wp-block-woocommerce-filter-wrapper"><!-- wp:heading {"level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black"} -->
<h3 class="wp-block-heading has-black-color has-text-color has-link-color"><?php echo esc_html__( 'Filter by size', 'wc-shop' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:woocommerce/attribute-filter {"attributeId":2,"heading":"","lock":{"remove":true},"textColor":"black","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}}}} -->
<div class="wp-block-woocommerce-attribute-filter is-loading has-black-color has-text-color has-link-color"></div>
<!-- /wp:woocommerce/attribute-filter --></div>
<!-- /wp:woocommerce/filter-wrapper --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"70%"} -->
<div class="wp-block-column" style="flex-basis:70%"><!-- wp:query-title {"type":"archive","textAlign":"left","level":2,"showPrefix":false,"align":"wide","fontSize":"large"} /-->

<!-- wp:woocommerce/store-notices /-->

<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"},"fontSize":"small"} -->
<div class="wp-block-group alignwide has-small-font-size"><!-- wp:woocommerce/product-results-count /-->

<!-- wp:woocommerce/catalog-sorting /--></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":3,"query":{"perPage":3,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":true,"__woocommerceAttributes":[],"__woocommerceStockStatus":["instock","outofstock","onbackorder"]},"namespace":"woocommerce/product-query","align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"className":"products-block-post-template","layout":{"type":"grid","columnCount":3},"__woocommerceNamespace":"woocommerce/product-query/product-template"} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"},"border":{"radius":{"topLeft":"5px","topRight":"5px","bottomLeft":"0px","bottomRight":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-top-left-radius:5px;border-top-right-radius:5px;border-bottom-left-radius:0px;border-bottom-right-radius:0px"><!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} /-->

<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0","top":"var:preset|spacing|40"}},"typography":{"lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"medium","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->

<!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"className":"is-style-outline","fontSize":"small","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}}}} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:spacer {"height":"50px","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|50","margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:spacer {"height":"50px","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"style":{"typography":{"fontSize":"48px"}}} -->
<h2 class="wp-block-heading" style="font-size:48px"><?php echo esc_html__( 'Hot Deals!', 'wc-shop' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"style":{"spacing":{"padding":{"bottom":"0","top":"0"}}}} -->
<div class="wp-block-column" style="padding-top:0;padding-bottom:0"><!-- wp:group {"style":{"border":{"radius":"10px"},"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|60"}}},"backgroundColor":"tertiary","className":"hot-deals-columns","layout":{"type":"constrained"}} -->
<div class="wp-block-group hot-deals-columns has-tertiary-background-color has-background" style="border-radius:10px;padding-top:0;padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:image {"align":"center","id":1064,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topLeft":"10px","topRight":"10px"}}}} -->
<figure class="wp-block-image aligncenter size-full has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/sale-banner-1.jpg" alt="" class="wp-image-1064" style="border-top-left-radius:10px;border-top-right-radius:10px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size"><?php echo esc_html__( 'JUST ARRIVED', 'wc-shop' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size" style="margin-top:0;margin-bottom:0;line-height:1.5"><strong><?php echo esc_html__( 'New Products', 'wc-shop' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"><!-- wp:button {"textAlign":"center"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button"><?php echo esc_html__( 'Shop Now', 'wc-shop' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"border":{"radius":"10px"},"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|60"}}},"backgroundColor":"tertiary","className":"hot-deals-columns","layout":{"type":"constrained"}} -->
<div class="wp-block-group hot-deals-columns has-tertiary-background-color has-background" style="border-radius:10px;padding-top:0;padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:image {"align":"center","id":1061,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topLeft":"10px","topRight":"10px"}}}} -->
<figure class="wp-block-image aligncenter size-full has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/hot-deals-2.jpg" alt="" class="wp-image-1061" style="border-top-left-radius:10px;border-top-right-radius:10px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo esc_html__( 'SAVE BIG', 'wc-shop' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size" style="margin-top:0;margin-bottom:0;line-height:1.5"><strong><?php echo esc_html__( 'Sale', 'wc-shop' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"><!-- wp:button {"textAlign":"center"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button"><?php echo esc_html__( 'Shop Sale', 'wc-shop' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"style":{"border":{"radius":"10px"},"spacing":{"padding":{"top":"0","bottom":"var:preset|spacing|60"}}},"backgroundColor":"tertiary","className":"hot-deals-columns","layout":{"type":"constrained"}} -->
<div class="wp-block-group hot-deals-columns has-tertiary-background-color has-background" style="border-radius:10px;padding-top:0;padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:image {"align":"center","id":1066,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":{"topLeft":"10px","topRight":"10px"}}}} -->
<figure class="wp-block-image aligncenter size-full has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/hot-deals-3.jpg" alt="" class="wp-image-1066" style="border-top-left-radius:10px;border-top-right-radius:10px"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center has-small-font-size"><?php echo esc_html__( 'COLLECTION', 'wc-shop' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1.5"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size" style="margin-top:0;margin-bottom:0;line-height:1.5"><strong><?php echo esc_html__( 'New Collection', 'wc-shop' ); ?></strong></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"><!-- wp:button {"textAlign":"center"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button"><?php echo esc_html__( 'View Collection', 'wc-shop' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group --></main>
<!-- /wp:group -->