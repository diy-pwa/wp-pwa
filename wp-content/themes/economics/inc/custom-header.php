<?php
/**
 * @package Economics
 * Setup the WordPress core custom header feature.
 *
 * @uses economics_header_style()

 */
function economics_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'economics_custom_header_args', array(		
		'default-text-color'     => 'ffffff',
		'width'                  => 1400,
		'height'                 => 280,
		'wp-head-callback'       => 'economics_header_style',		
	) ) );
}
add_action( 'after_setup_theme', 'economics_custom_header_setup' );

if ( ! function_exists( 'economics_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see economics_custom_header_setup().
 */
function economics_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		.header {
			background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat;
			background-position: center top;
		}
	<?php endif; ?>	
	</style>
    <?php
	// If the header text option is untouched, let's bail.
	if ( display_header_text() ) {
		return;
	}

	// If the header text has been hidden.
	?>
    <style type="text/css">		
		.logo h1,
		.logo span{
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
    </style>
    
    
	<?php   
} 
endif; // economics_header_style 