<?php
/**
 * Title: Index Template
 * Slug: wc-shop/index-template
 * Categories: wc-shop
 *
 * @package Wc Shop
 * @since 1.0.0
 */

?>
<!-- wp:group {"tagName":"main","align":"full","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"secondary-bg","layout":{"type":"default"}} -->
<main class="wp-block-group alignfull has-secondary-bg-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() );?>/assets/images/blog-banner.jpg","id":1278,"dimRatio":50,"minHeight":450,"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:450px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-1278" alt="" src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/blog-banner.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"48px"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:48px"><?php echo esc_html__( 'Wc Shop\'s Blog', 'wc-shop' ); ?></h2>
<!-- /wp:heading -->

<?php
	if ( ! function_exists( 'is_woocommerce_activated' ) ) {
    function is_woocommerce_activated() {
        if ( class_exists( 'woocommerce' ) ) {
        	?>
        	<!-- wp:woocommerce/breadcrumbs {"fontSize":"medium","align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}}} /-->
        	<?php
        }
    }
}
?>


</div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"120px","bottom":"120px","right":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:120px;padding-right:var(--wp--preset--spacing--40);padding-bottom:120px;padding-left:var(--wp--preset--spacing--40)"><!-- wp:columns {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}},"border":{"width":"0px","style":"none"}},"className":"sidebar-variation"} -->
<div class="wp-block-columns sidebar-variation" style="border-style:none;border-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:column {"verticalAlignment":"top","width":"33.33%","style":{"spacing":[]}} -->
<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:33.33%"><!-- wp:template-part {"slug":"sidebar","theme":"wc-shop","area":"sidebar"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"top","width":"66.66%","className":"col-content"} -->
<div class="wp-block-column is-vertically-aligned-top col-content" style="flex-basis:66.66%"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"}},"className":"wp-block-section","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide wp-block-section" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:query {"queryId":23,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":true},"layout":{"type":"constrained"}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":2}} -->
<!-- wp:group {"style":{"spacing":{"blockGap":"0"},"border":{"radius":"10px"}},"className":"blog-description-section box-shadow","layout":{"type":"constrained"}} -->
<div class="wp-block-group blog-description-section box-shadow" style="border-radius:10px"><!-- wp:post-featured-image {"isLink":true,"height":"250px","style":{"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"0px","bottomRight":"0px"}},"spacing":{"padding":{"right":"0","left":"0"}}}} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"},"blockGap":"0"},"border":{"radius":{"bottomLeft":"10px","bottomRight":"10px"}}},"backgroundColor":"tertiary","layout":{"type":"default"}} -->
<div class="wp-block-group has-tertiary-background-color has-background" style="border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left","orientation":"horizontal"}} -->
<div class="wp-block-group"><!-- wp:post-date {"style":{"spacing":{"padding":{"right":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|contrast"}}}},"textColor":"contrast"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:post-terms {"term":"category","separator":"","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.5"},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"textColor":"primary"} /-->

<!-- wp:post-excerpt {"textAlign":"left","moreText":"Read More","style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:spacer -->
<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query-pagination {"paginationArrow":"arrow","backgroundColor":"background","layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous {"label":" "} /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next {"label":" "} /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></main>
<!-- /wp:group -->