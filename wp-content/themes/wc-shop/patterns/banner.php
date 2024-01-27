<?php
/**
 * Title: Banner
 * Slug: wc-shop/banner
 * Categories: wc-shop
 *
 * @package Wc Shop
 * @since 1.0.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"130px","bottom":"130px"}},"background":{"backgroundImage":{"url":"<?php echo esc_url( get_template_directory_uri() );?>/assets/images/banner.jpg","id":1358,"source":"file","title":"banner"}},"dimensions":{"minHeight":""}},"backgroundColor":"secondary-bg","className":"featured-banner","layout":{"type":"constrained"},"metadata":{"name":"Banner"}} -->
<div class="wp-block-group alignfull featured-banner has-secondary-bg-background-color has-background" style="padding-top:130px;padding-right:var(--wp--preset--spacing--40);padding-bottom:130px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"45%","className":"banner-left-column","layout":{"type":"constrained"}} -->
<div class="wp-block-column is-vertically-aligned-center banner-left-column" style="flex-basis:45%"><!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"typography":{"lineHeight":"1.6","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"#113976"}}},"color":{"text":"#113976"}},"fontSize":"large"} -->
<p class="has-text-color has-link-color has-large-font-size" style="color:#113976;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0;font-style:normal;font-weight:700;line-height:1.6"><?php echo esc_html__( 'Winter fashion', 'wc-shop' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1","letterSpacing":"1px","fontSize":"6.5rem"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0"}},"color":{"text":"#0e0e0e"},"elements":{"link":{"color":{"text":"#0e0e0e"}}}},"fontFamily":"hind"} -->
<h1 class="wp-block-heading has-text-color has-link-color has-hind-font-family" style="color:#0e0e0e;margin-top:0;margin-bottom:0;padding-right:0;font-size:6.5rem;font-style:normal;font-weight:700;letter-spacing:1px;line-height:1"><?php echo esc_html__( 'Discover The Future', 'wc-shop' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.6","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|50"}}},"fontSize":"medium"} -->
<p class="has-medium-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--50);font-style:normal;font-weight:400;line-height:1.6"><?php echo esc_html__( 'Explore our curated selection of fabulous winter attire, tailor-made to keep you looking cool while staying warm.', 'wc-shop' ); ?> </p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|70","bottom":"0"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:0"><!-- wp:button {"style":{"spacing":{"padding":{"left":"var:preset|spacing|70","right":"var:preset|spacing|70","top":"12px","bottom":"12px"}},"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"18px"},"border":{"radius":"10px"}},"fontFamily":"hind"} -->
<div class="wp-block-button has-custom-font-size has-hind-font-family" style="font-size:18px;font-style:normal;font-weight:400"><a class="wp-block-button__link wp-element-button" style="border-radius:10px;padding-top:12px;padding-right:var(--wp--preset--spacing--70);padding-bottom:12px;padding-left:var(--wp--preset--spacing--70)"><?php echo esc_html__( 'Buy Now', 'wc-shop' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"","className":"banner-right-column","layout":{"type":"constrained"}} -->
<div class="wp-block-column is-vertically-aligned-center banner-right-column"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->