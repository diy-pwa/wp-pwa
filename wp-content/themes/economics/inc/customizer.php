<?php
/**
 *economics Theme Customizer
 *
 * @package Economics
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function economics_customize_register( $wp_customize ) {	
	
	function economics_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	
	function economics_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	//Layout Options
	$wp_customize->add_section('layout_option',array(
			'title'	=> __('Site Layout','economics'),			
			'priority'	=> 1,
	));		
	
	$wp_customize->add_setting('sitebox_layout',array(
			'sanitize_callback' => 'economics_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'sitebox_layout', array(
    	   'section'   => 'layout_option',    	 
		   'label'	=> __('Check to Box Layout','economics'),
		   'description'	=> __('if you want to box layout please check the Box Layout Option.','economics'),
    	   'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#01c18d',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','economics'),			
			 'description'	=> __('More color options in PRO Version','economics'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	// Slider Section		
	$wp_customize->add_section( 'slider_options', array(
            'title' => __('Slider Section', 'economics'),
            'priority' => null,
			'description'	=> __('Featured Image Size Should be ( 1400x747 ).','economics'),            			
    ));
	
	$wp_customize->add_setting('slide-page1',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'economics_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('slide-page1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','economics'),
			'section'	=> 'slider_options'
	));	
	
	$wp_customize->add_setting('slide-page2',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'economics_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('slide-page2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','economics'),
			'section'	=> 'slider_options'
	));	
	
	$wp_customize->add_setting('slide-page3',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'economics_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('slide-page3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','economics'),
			'section'	=> 'slider_options'
	));	// Slider Section
	
	 $wp_customize->add_setting('slider_learnmore',array(
	 		'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	 ));
	 
	 $wp_customize->add_control('slider_learnmore',array(
	 		'settings'	=> 'slider_learnmore',
			'section'	=> 'slider_options',
			'label'		=> __('Add text for slide read more button','economics'),
			'type'		=> 'text'
	 ));// Slider Read more	
	
	$wp_customize->add_setting('show_slider',array(
				'default' => false,
				'sanitize_callback' => 'economics_sanitize_checkbox',
				'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_slider', array(
			   'settings' => 'show_slider',
			   'section'   => 'slider_options',
			   'label'     => __('Check To Show This Section','economics'),
			   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	  // Four Column What We Do Section
	$wp_customize->add_section('whatwedo_section', array(
		'title'	=> __('What We Do Section','economics'),
		'description'	=> __('Select Pages from the dropdown for four column What We Do section','economics'),
		'priority'	=> null
	));	
	
	$wp_customize->add_setting('whatwedo_title',array(
	 		'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	 ));
	 
	 $wp_customize->add_control('whatwedo_title',array(
	 		'settings'	=> 'whatwedo_title',
			'section'	=> 'whatwedo_section',
			'label'		=> __('Add section title for what we do section','economics'),
			'type'		=> 'text'
	 ));// whatwedo Title
	
	$wp_customize->add_setting('pagelist4',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'economics_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'pagelist4',array(
			'type' => 'dropdown-pages',			
			'section' => 'whatwedo_section',
	));		
	
	$wp_customize->add_setting('pagelist5',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'economics_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'pagelist5',array(
			'type' => 'dropdown-pages',			
			'section' => 'whatwedo_section',
	));
	
	$wp_customize->add_setting('pagelist6',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'economics_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'pagelist6',array(
			'type' => 'dropdown-pages',			
			'section' => 'whatwedo_section',
	));
	
	$wp_customize->add_setting('pagelist7',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'economics_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'pagelist7',array(
			'type' => 'dropdown-pages',			
			'section' => 'whatwedo_section',
	));//end four column page boxes	
	
	$wp_customize->add_setting('show_whatwedo',array(
			'default' => false,
			'sanitize_callback' => 'economics_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_whatwedo', array(
			   'settings' => 'show_whatwedo',
			   'section'   => 'whatwedo_section',
			   'label'     => __('Check To Show This Section','economics'),
			   'type'      => 'checkbox'
	 ));//Show Services Section	 
	
	
	// About Us Section 	
	$wp_customize->add_section('aboutuspage_section', array(
		'title'	=> __('About Us Page Section','economics'),
		'description'	=> __('Select Pages from the dropdown for about us age section','economics'),
		'priority'	=> null
	));		
	
	$wp_customize->add_setting('aboutuspage',array(
			'default'	=> '0',			
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'economics_sanitize_dropdown_pages'
		));
 
	$wp_customize->add_control(	'aboutuspage',array(
			'type' => 'dropdown-pages',			
			'section' => 'aboutuspage_section',
	));		
	
	
	$wp_customize->add_setting('show_aboutuspage',array(
			'default' => false,
			'sanitize_callback' => 'economics_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'show_aboutuspage', array(
			   'settings' => 'show_aboutuspage',
			   'section'   => 'aboutuspage_section',
			   'label'     => __('Check To Show This Section','economics'),
			   'type'      => 'checkbox'
	 ));//Show About US Section
	 
		 
}
add_action( 'customize_register', 'economics_customize_register' );



function economics_custom_css() {
	wp_enqueue_style(
		'custom-style',
		get_template_directory_uri() . '/css/custom_script.css'
	);
        $color = get_theme_mod( 'color_scheme' );
        $custom_css = "
                .a, .recent_articles h2 a:hover,
				#sidebar ul li a:hover,									
				.recent_articles h3 a:hover,
				.cols-4 ul li a:hover, .cols-4 ul li.current_page_item a,
				.recent-post h6:hover,					
				.page-four-column:hover h3,
				.footer-icons a:hover,	
				.column-4:hover h5 a,				
				.postmeta a:hover, .design-by a, 				
				.header-menu ul li a:hover, 
				.header-menu ul li.current_page_item a, 
				.header-menu ul li.current-menu-ancestor a.parent{
					color: {$color};
                }
				.pagination ul li .current, .pagination ul li a:hover, 
				#commentform input#submit:hover,					
				.nivo-controlNav a.active,
				.learnmore,					
				.appbutton:hover,					
				#sidebar .search-form input.search-submit,				
				.wpcf7 input[type='submit'],
				#featureswrap,
				.column-4:hover .learnmore,
				nav.pagination .page-numbers.current,
				.slide_info .slide_more:hover {
					background-color: {$color};
                }";
        wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'economics_custom_css' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function economics_customize_preview_js() {
	wp_enqueue_script( 'economics_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20161014', true );
}
add_action( 'customize_preview_init', 'economics_customize_preview_js' );