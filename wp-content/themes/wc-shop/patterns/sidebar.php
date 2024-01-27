<?php
/**
 * Title: Siderbar 
 * Slug: wc-shop/sidebar
 * Categories: wc-shop
 *
 * @package Wc Shop
 * @since 1.0.0
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"var:preset|spacing|50"}},"className":"site-sidebar","layout":{"type":"constrained"}} -->
<div class="wp-block-group site-sidebar" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"radius":"10px"}},"backgroundColor":"tertiary","className":"box-shadow","layout":{"type":"default"}} -->
<div class="wp-block-group box-shadow has-tertiary-background-color has-background" style="border-radius:10px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--50);padding-bottom:0;padding-left:var(--wp--preset--spacing--50)"><!-- wp:spacer {"height":"25px","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:search {"label":"Search","placeholder":"Search...","buttonText":"Search","style":{"border":{"width":"0px","style":"none"}}} /-->

<!-- wp:spacer {"height":"25px"} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"radius":"10px"}},"backgroundColor":"tertiary","className":"box-shadow","layout":{"type":"constrained"}} -->
<div class="wp-block-group box-shadow has-tertiary-background-color has-background" style="border-radius:10px;padding-top:0;padding-right:var(--wp--preset--spacing--50);padding-bottom:0;padding-left:var(--wp--preset--spacing--50)"><!-- wp:spacer {"height":"25px"} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"level":4,"style":{"typography":{"lineHeight":"1.5"}},"fontSize":"large"} -->
<h4 class="wp-block-heading has-large-font-size" style="line-height:1.5"><strong><?php echo esc_html__( 'Recent post', 'wc-shop' ); ?></strong></h4>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"25px"} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":15,"query":{"perPage":"6","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"aspectRatio":"auto","width":"95px","height":"91px"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:post-title {"level":6,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"small"} /-->

<!-- wp:post-date {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"tiny"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query -->

<!-- wp:spacer {"height":"25px"} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"radius":"10px"}},"backgroundColor":"tertiary","className":"box-shadow","layout":{"type":"constrained"}} -->
<div class="wp-block-group box-shadow has-tertiary-background-color has-background" style="border-radius:10px;padding-top:0;padding-right:var(--wp--preset--spacing--50);padding-bottom:0;padding-left:var(--wp--preset--spacing--50)"><!-- wp:spacer {"height":"25px"} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"1.5"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="line-height:1.5"><strong><?php echo esc_html__( 'Tags', 'wc-shop' ); ?></strong></h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"25px"} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:post-terms {"term":"post_tag","separator":""} /-->

<!-- wp:spacer {"height":"25px"} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"0","bottom":"0"}},"border":{"radius":"10px"}},"backgroundColor":"tertiary","className":"box-shadow","layout":{"type":"constrained"}} -->
<div class="wp-block-group box-shadow has-tertiary-background-color has-background" style="border-radius:10px;margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50);padding-top:0;padding-right:var(--wp--preset--spacing--50);padding-bottom:0;padding-left:var(--wp--preset--spacing--50)"><!-- wp:spacer {"height":"25px"} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"1.5"}},"fontSize":"large"} -->
<h2 class="wp-block-heading has-large-font-size" style="line-height:1.5"><strong><?php echo esc_html__( 'Categories', 'wc-shop' ); ?></strong></h2>
<!-- /wp:heading -->

<!-- wp:spacer {"height":"25px"} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:categories {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->

<!-- wp:spacer {"height":"25px"} -->
<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->