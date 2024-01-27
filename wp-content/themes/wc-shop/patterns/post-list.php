<?php
/**
 * Title: Post List
 * Slug: wc-shop/post-list
 * Categories: wc-shop
 *
 * @package Wc Shop
 * @since 1.0.0
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"},"metadata":{"name":"Post List"}} -->
<div class="wp-block-group has-tertiary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)"><!-- wp:spacer {"height":"120px","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:120px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"typography":{"lineHeight":"1.2","fontSize":"48px"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="margin-top:0;margin-bottom:0;font-size:48px;line-height:1.2"><?php echo esc_html__( 'Our Blog and News', 'wc-shop' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":13,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"blog-posts","layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"16px","bottom":"0px"}},"border":{"radius":"20px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:20px;margin-top:16px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:post-featured-image {"height":"350px","style":{"border":{"radius":"20px"}}} /-->

<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"typography":{"lineHeight":"1.6","fontSize":"25px","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"right":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"fontFamily":"hind"} /-->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)"><!-- wp:post-author-name {"fontSize":"small"} /-->

<!-- wp:post-date {"fontSize":"small"} /--></div>
<!-- /wp:group -->

<!-- wp:post-excerpt {"textAlign":"center","moreText":"Read More","showMoreOnNewLine":false,"excerptLength":17,"style":{"typography":{"lineHeight":"1.6","fontSize":"18px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|70","bottom":"0"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--70);margin-bottom:0"><!-- wp:button {"style":{"spacing":{"padding":{"left":"var:preset|spacing|70","right":"var:preset|spacing|70","top":"12px","bottom":"12px"}},"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"18px"},"border":{"radius":"10px","width":"1px"}},"borderColor":"Theme","className":"is-style-outline","fontFamily":"hind"} -->
<div class="wp-block-button has-custom-font-size is-style-outline has-hind-font-family" style="font-size:18px;font-style:normal;font-weight:400"><a class="wp-block-button__link has-border-color has-theme-border-color wp-element-button" href="#" style="border-width:1px;border-radius:10px;padding-top:12px;padding-right:var(--wp--preset--spacing--70);padding-bottom:12px;padding-left:var(--wp--preset--spacing--70)"><?php echo esc_html__( 'View all news', 'wc-shop' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {"height":"120px","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:120px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->