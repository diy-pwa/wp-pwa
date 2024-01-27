<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wc-shop
 * @since 1.0.0
 */

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */

if ( ! function_exists( 'wc_shop_support' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */

	function wc_shop_support() {

		add_editor_style( get_template_directory_uri().'/assets/css/editor.css' );

		load_theme_textdomain( 'wc-shop', get_template_directory() . '/languages' );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for post thumbnails
		add_theme_support( 'post-thumbnails' );

	}

endif;
add_action( 'after_setup_theme', 'wc_shop_support' );

function wc_shop_styles() {
	wp_enqueue_style(
		'wc-shop-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style(
		'wc-shop-font-awesome',
		get_template_directory_uri() . '/assets/css/font-awesome/css/all.css',
		[],
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'wc_shop_styles' );

// enqueue dashicons
add_action( 'enqueue_block_assets', function (): void {
	wp_enqueue_style( 'dashicons' );
});

function wc_shop_excerpt_length( $length ){ 

	$excerpt_length = 20;
	if ( is_admin() ) return $length;
	return $excerpt_length;
}
add_filter( 'excerpt_length', 'wc_shop_excerpt_length' );

// tgm-plugin
require get_template_directory() . '/inc/tgm-plugin/tgmpa-hook.php';

// add block patterns
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Register block styles.
 */

if ( ! function_exists( 'wc_shop_block_styles' ) ) :
	/**
	 * Register custom block styles
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function wc_shop_block_styles() {

		register_block_style(
			'core/paragraph',
			array(
				'name'         => 'admin-icon',
				'label'        => __( 'Admin Icon', 'wc-shop' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-admin-icon:before {
					content: "\f110";
					font-family: "dashicons";
				}
				.is-style-admin-icon span{
					display: none;
				}',
			)
		);

		register_block_style(
			'core/paragraph',
			array(
				'name'         => 'cart-icon',
				'label'        => __( 'Cart Icon', 'wc-shop' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-cart-icon:before {
					content: "\f174";
					font-family: "dashicons";
				}
				.is-style-cart-icon span{
					display: none;
				}',
			)
		);

		register_block_style(
			'woocommerce/product-button',
			array(
				'name'         => 'cart-button',
				'label'        => __( 'Cart Button', 'wc-shop' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-cart-button button.add_to_cart_button:after {
					content: "\f174";
					font-family: "Dashicons";
					margin:-3px 0 0 5px;
				}',
			)
		);
	}
endif;

add_action( 'init', 'wc_shop_block_styles' );
