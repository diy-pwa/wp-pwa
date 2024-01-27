<?php
/**
 * Title: Cart Template
 * Slug: wc-shop/cart-template
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
    <h1 class="wp-block-heading alignwide has-text-align-center" style="margin-top:0;margin-bottom:0;font-size:48px;line-height:1.2"><?php echo esc_html__( 'Cart', 'wc-shop' ); ?></h1>
    <!-- /wp:heading -->
    
    <!-- wp:spacer -->
    <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->
    
    <!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide" style="padding-right:0;padding-left:0"><!-- wp:woocommerce/cart {"align":"","className":"wc-block-cart"} -->
    <div class="wp-block-woocommerce-cart is-loading wc-block-cart"><!-- wp:woocommerce/filled-cart-block -->
    <div class="wp-block-woocommerce-filled-cart-block"><!-- wp:woocommerce/cart-items-block -->
    <div class="wp-block-woocommerce-cart-items-block"><!-- wp:woocommerce/cart-line-items-block -->
    <div class="wp-block-woocommerce-cart-line-items-block"></div>
    <!-- /wp:woocommerce/cart-line-items-block -->
    
    <!-- wp:woocommerce/cart-cross-sells-block -->
    <div class="wp-block-woocommerce-cart-cross-sells-block"><!-- wp:heading {"fontSize":"large"} -->
    <h2 class="wp-block-heading has-large-font-size"><?php echo esc_html__( 'You may be interested in', 'wc-shop' ); ?>…</h2>
    <!-- /wp:heading -->
    
    <!-- wp:woocommerce/cart-cross-sells-products-block -->
    <div class="wp-block-woocommerce-cart-cross-sells-products-block"></div>
    <!-- /wp:woocommerce/cart-cross-sells-products-block --></div>
    <!-- /wp:woocommerce/cart-cross-sells-block --></div>
    <!-- /wp:woocommerce/cart-items-block -->
    
    <!-- wp:woocommerce/cart-totals-block -->
    <div class="wp-block-woocommerce-cart-totals-block"><!-- wp:woocommerce/cart-order-summary-block -->
    <div class="wp-block-woocommerce-cart-order-summary-block"><!-- wp:woocommerce/cart-order-summary-heading-block -->
    <div class="wp-block-woocommerce-cart-order-summary-heading-block"></div>
    <!-- /wp:woocommerce/cart-order-summary-heading-block -->
    
    <!-- wp:woocommerce/cart-order-summary-coupon-form-block -->
    <div class="wp-block-woocommerce-cart-order-summary-coupon-form-block"></div>
    <!-- /wp:woocommerce/cart-order-summary-coupon-form-block -->
    
    <!-- wp:woocommerce/cart-order-summary-subtotal-block -->
    <div class="wp-block-woocommerce-cart-order-summary-subtotal-block"></div>
    <!-- /wp:woocommerce/cart-order-summary-subtotal-block -->
    
    <!-- wp:woocommerce/cart-order-summary-fee-block -->
    <div class="wp-block-woocommerce-cart-order-summary-fee-block"></div>
    <!-- /wp:woocommerce/cart-order-summary-fee-block -->
    
    <!-- wp:woocommerce/cart-order-summary-discount-block -->
    <div class="wp-block-woocommerce-cart-order-summary-discount-block"></div>
    <!-- /wp:woocommerce/cart-order-summary-discount-block -->
    
    <!-- wp:woocommerce/cart-order-summary-shipping-block -->
    <div class="wp-block-woocommerce-cart-order-summary-shipping-block"></div>
    <!-- /wp:woocommerce/cart-order-summary-shipping-block -->
    
    <!-- wp:woocommerce/cart-order-summary-taxes-block -->
    <div class="wp-block-woocommerce-cart-order-summary-taxes-block"></div>
    <!-- /wp:woocommerce/cart-order-summary-taxes-block --></div>
    <!-- /wp:woocommerce/cart-order-summary-block -->
    
    <!-- wp:woocommerce/cart-express-payment-block -->
    <div class="wp-block-woocommerce-cart-express-payment-block"></div>
    <!-- /wp:woocommerce/cart-express-payment-block -->
    
    <!-- wp:woocommerce/proceed-to-checkout-block -->
    <div class="wp-block-woocommerce-proceed-to-checkout-block"></div>
    <!-- /wp:woocommerce/proceed-to-checkout-block -->
    
    <!-- wp:woocommerce/cart-accepted-payment-methods-block -->
    <div class="wp-block-woocommerce-cart-accepted-payment-methods-block"></div>
    <!-- /wp:woocommerce/cart-accepted-payment-methods-block --></div>
    <!-- /wp:woocommerce/cart-totals-block --></div>
    <!-- /wp:woocommerce/filled-cart-block -->
    
    <!-- wp:woocommerce/empty-cart-block -->
    <div class="wp-block-woocommerce-empty-cart-block"><!-- wp:heading {"textAlign":"center","className":"with-empty-cart-icon wc-block-cart__empty-cart__title"} -->
    <h2 class="wp-block-heading has-text-align-center with-empty-cart-icon wc-block-cart__empty-cart__title"><?php echo esc_html__( 'Your cart is currently empty!', 'wc-shop' ); ?></h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center"><a href="#"><?php echo esc_html__( 'Browse store', 'wc-shop' ); ?></a></p>
    <!-- /wp:paragraph -->
    
    <!-- wp:separator {"className":"is-style-dots"} -->
    <hr class="wp-block-separator has-alpha-channel-opacity is-style-dots"/>
    <!-- /wp:separator -->
    
    <!-- wp:heading {"textAlign":"center"} -->
    <h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'New in store', 'wc-shop' ); ?></h2>
    <!-- /wp:heading -->
    
    <!-- wp:woocommerce/product-new {"columns":4,"rows":1} /--></div>
    <!-- /wp:woocommerce/empty-cart-block --></div>
    <!-- /wp:woocommerce/cart --></div>
    <!-- /wp:group -->
    
    <!-- wp:spacer {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
    <div style="margin-top:0;margin-bottom:0;height:100px" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer --></main>
    <!-- /wp:group -->