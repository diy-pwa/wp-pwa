<?php
/**
 * Title: Checkout Template
 * Slug: wc-shop/checkout-template
 * Categories: wc-shop
 *
 * @package Wc Shop
 * @since 1.0.0
 */

?>
<!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"right":"var:preset|spacing|40","left":"var:preset|spacing|40","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"secondary-bg","layout":{"inherit":true,"type":"constrained"}} -->
<main class="wp-block-group has-secondary-bg-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:var(--wp--preset--spacing--40);padding-bottom:0;padding-left:var(--wp--preset--spacing--40)"><!-- wp:spacer -->
    <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->
    
    <!-- wp:heading {"textAlign":"center","level":1,"align":"wide","style":{"typography":{"fontSize":"48px","lineHeight":"1.2"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
    <h1 class="wp-block-heading alignwide has-text-align-center" style="margin-top:0;margin-bottom:0;font-size:48px;line-height:1.2"><?php echo esc_html__( 'Checkout', 'wc-shop' ); ?></h1>
    <!-- /wp:heading -->
    
    <!-- wp:spacer {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
    <div style="margin-top:0;margin-bottom:0;height:100px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->
    
    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide" style="padding-right:0;padding-left:0"><!-- wp:woocommerce/checkout {"align":"","className":"wc-block-checkout"} -->
    <div class="wp-block-woocommerce-checkout wc-block-checkout is-loading"><!-- wp:woocommerce/checkout-fields-block -->
    <div class="wp-block-woocommerce-checkout-fields-block"><!-- wp:woocommerce/checkout-express-payment-block -->
    <div class="wp-block-woocommerce-checkout-express-payment-block"></div>
    <!-- /wp:woocommerce/checkout-express-payment-block -->
    
    <!-- wp:woocommerce/checkout-contact-information-block -->
    <div class="wp-block-woocommerce-checkout-contact-information-block"></div>
    <!-- /wp:woocommerce/checkout-contact-information-block -->
    
    <!-- wp:woocommerce/checkout-shipping-method-block -->
    <div class="wp-block-woocommerce-checkout-shipping-method-block"></div>
    <!-- /wp:woocommerce/checkout-shipping-method-block -->
    
    <!-- wp:woocommerce/checkout-pickup-options-block -->
    <div class="wp-block-woocommerce-checkout-pickup-options-block"></div>
    <!-- /wp:woocommerce/checkout-pickup-options-block -->
    
    <!-- wp:woocommerce/checkout-shipping-address-block -->
    <div class="wp-block-woocommerce-checkout-shipping-address-block"></div>
    <!-- /wp:woocommerce/checkout-shipping-address-block -->
    
    <!-- wp:woocommerce/checkout-billing-address-block -->
    <div class="wp-block-woocommerce-checkout-billing-address-block"></div>
    <!-- /wp:woocommerce/checkout-billing-address-block -->
    
    <!-- wp:woocommerce/checkout-shipping-methods-block -->
    <div class="wp-block-woocommerce-checkout-shipping-methods-block"></div>
    <!-- /wp:woocommerce/checkout-shipping-methods-block -->
    
    <!-- wp:woocommerce/checkout-payment-block -->
    <div class="wp-block-woocommerce-checkout-payment-block"></div>
    <!-- /wp:woocommerce/checkout-payment-block -->
    
    <!-- wp:woocommerce/checkout-order-note-block -->
    <div class="wp-block-woocommerce-checkout-order-note-block"></div>
    <!-- /wp:woocommerce/checkout-order-note-block -->
    
    <!-- wp:woocommerce/checkout-terms-block -->
    <div class="wp-block-woocommerce-checkout-terms-block"></div>
    <!-- /wp:woocommerce/checkout-terms-block -->
    
    <!-- wp:woocommerce/checkout-actions-block -->
    <div class="wp-block-woocommerce-checkout-actions-block"></div>
    <!-- /wp:woocommerce/checkout-actions-block --></div>
    <!-- /wp:woocommerce/checkout-fields-block -->
    
    <!-- wp:woocommerce/checkout-totals-block -->
    <div class="wp-block-woocommerce-checkout-totals-block"><!-- wp:woocommerce/checkout-order-summary-block -->
    <div class="wp-block-woocommerce-checkout-order-summary-block"><!-- wp:woocommerce/checkout-order-summary-cart-items-block -->
    <div class="wp-block-woocommerce-checkout-order-summary-cart-items-block"></div>
    <!-- /wp:woocommerce/checkout-order-summary-cart-items-block -->
    
    <!-- wp:woocommerce/checkout-order-summary-coupon-form-block -->
    <div class="wp-block-woocommerce-checkout-order-summary-coupon-form-block"></div>
    <!-- /wp:woocommerce/checkout-order-summary-coupon-form-block -->
    
    <!-- wp:woocommerce/checkout-order-summary-subtotal-block -->
    <div class="wp-block-woocommerce-checkout-order-summary-subtotal-block"></div>
    <!-- /wp:woocommerce/checkout-order-summary-subtotal-block -->
    
    <!-- wp:woocommerce/checkout-order-summary-fee-block -->
    <div class="wp-block-woocommerce-checkout-order-summary-fee-block"></div>
    <!-- /wp:woocommerce/checkout-order-summary-fee-block -->
    
    <!-- wp:woocommerce/checkout-order-summary-discount-block -->
    <div class="wp-block-woocommerce-checkout-order-summary-discount-block"></div>
    <!-- /wp:woocommerce/checkout-order-summary-discount-block -->
    
    <!-- wp:woocommerce/checkout-order-summary-shipping-block -->
    <div class="wp-block-woocommerce-checkout-order-summary-shipping-block"></div>
    <!-- /wp:woocommerce/checkout-order-summary-shipping-block -->
    
    <!-- wp:woocommerce/checkout-order-summary-taxes-block -->
    <div class="wp-block-woocommerce-checkout-order-summary-taxes-block"></div>
    <!-- /wp:woocommerce/checkout-order-summary-taxes-block --></div>
    <!-- /wp:woocommerce/checkout-order-summary-block --></div>
    <!-- /wp:woocommerce/checkout-totals-block --></div>
    <!-- /wp:woocommerce/checkout --></div>
    <!-- /wp:group -->
    
    <!-- wp:spacer {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
    <div style="margin-top:0;margin-bottom:0;height:100px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer --></main>
    <!-- /wp:group -->