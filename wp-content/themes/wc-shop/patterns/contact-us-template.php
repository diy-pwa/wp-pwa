<?php
/**
 * Title: Contact Us Template
 * Slug: wc-shop/contact-us-template
 * Categories: wc-shop
 *
 * @package Wc Shop
 * @since 1.0.0
 */

?>
<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"backgroundColor":"secondary-bg","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-secondary-bg-background-color has-background" style="margin-top:0;margin-bottom:0;padding-right:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:spacer {"height":"120px","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:120px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:media-text {"mediaId":1549,"mediaLink":"#","mediaType":"image","imageFill":true,"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"className":"contact-us-img"} -->
<div class="wp-block-media-text is-stacked-on-mobile is-image-fill contact-us-img" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><figure class="wp-block-media-text__media" style="background-image:url(<?php echo esc_url( get_template_directory_uri() );?>/assets/images/contact.jpg);background-position:50% 50%"><img src="<?php echo esc_url( get_template_directory_uri() );?>/assets/images/contact.jpg" alt="" class="wp-image-1549 size-full"/></figure><div class="wp-block-media-text__content">
	<?php
	if ( class_exists( 'WPCF7' ) ) {
		?>
		<!-- wp:shortcode -->
		[contact-form-7 id="c301081" title="Contact Form"]
		<!-- /wp:shortcode -->
		<?php
	}
	?>
	
</div></div>
<!-- /wp:media-text -->

<!-- wp:spacer {"height":"120px","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:120px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->