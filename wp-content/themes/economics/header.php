<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Economics
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<?php
$show_slider 	  = get_theme_mod('show_slider', false);
$show_aboutuspage = get_theme_mod('show_aboutuspage', false);
$show_whatwedo 	  = get_theme_mod('show_whatwedo', false);
?>
<div id="site-holder" <?php if( get_theme_mod( 'sitebox_layout' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($show_slider)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>


<div class="container">
     <div class="site-header <?php echo esc_attr($inner_cls); ?>">      
          <div class="logo">
				<?php economics_the_custom_logo(); ?>
                 <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <span><?php echo esc_html($description); ?></span>
            <?php endif; ?>
          </div><!-- logo -->
          <div class="head-rightpart">
               <div class="toggle">
                 <a class="toggleMenu" href="#"><?php esc_html_e('Menu','economics'); ?></a>
               </div><!-- toggle --> 
               <div class="header-menu">                   
                <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>   
               </div><!--.header-menu -->             
            </div><!-- .head-rightpart -->            
         <div class="clear"></div>       
     </div><!--.site-header -->           
</div><!-- container -->   


<?php 
if ( is_front_page() && !is_home() ) {
if($show_slider != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('slide-page'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('slide-page'.$i,true));
	  }
	}
?>                
                
<?php if(!empty($slider_Arr)){ ?>
    <div id="slider" class="nivoSlider">
        <?php 
        $i=1;
        $slidequery = new WP_query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
        while( $slidequery->have_posts() ) : $slidequery->the_post();
        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
        <?php if(!empty($image)){ ?>
        <img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
        <?php }else{ ?>
        <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
        <?php } ?>
        <?php $i++; endwhile; ?>
    </div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">
        <div class="slide_info">
            <h2><?php the_title(); ?></h2>
            <p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '' ) );  ?></p>
            <?php
		 $slider_learnmore = get_theme_mod('slider_learnmore');
		 if( !empty($slider_learnmore) ){ ?>
          <a class="slide_more" href="<?php the_permalink(); ?>"><?php echo esc_html($slider_learnmore); ?></a>
	  	 <?php } ?>                   
        </div>
    </div>      
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>  
<div class="clear"></div>        
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
if( $show_whatwedo != ''){ ?>  
    <section id="sectiopn-first">
            	<div class="container">
                    <div class="page-wrapper">                    	           
						<?php
                         $whatwedo_title = get_theme_mod('whatwedo_title');
                         if( !empty($whatwedo_title) ){ ?>
                          <h2 class="sectiontitle"><?php echo esc_html($whatwedo_title); ?></h2>
                         <?php } ?>
                        
                        <?php for($n=4; $n<=7; $n++) { ?>    
                        <?php if( get_theme_mod('pagelist'.$n,false)) { ?>          
                            <?php $queryvar = new WP_query('page_id='.absint(get_theme_mod('pagelist'.$n,true)) ); ?>				
                                    <?php while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
                                    <div class="column-4 <?php if($n % 4 == 3) { echo "last_column"; } ?>">                                    
                                      <?php if(has_post_thumbnail() ) { ?>
                                        <div class="column-4-imgbx"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
                                      <?php } ?>
                                     <div class="column-4-content">
                                     <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>                                     
                                     <p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '&hellip;' ) );  ?></p>                                   
                                     </div>                                   
                                    </div>
                                    <?php endwhile;
                                   		 wp_reset_postdata(); ?>                                    
                       				<?php } } ?>                                 
                    <div class="clear"></div>  
               </div><!-- .page-wrapper-->            
            </div><!-- .container -->
       </section><!-- .sectiopn-first-->                      	      
<?php } ?>

<?php if( $show_aboutuspage != ''){ ?>  
    <section id="sectiopn-second">
            	<div class="container">
                    <div class="about-wrapper">                            
                        <?php if( get_theme_mod('aboutuspage',false)) { ?>          
                            <?php $queryvar = new WP_query('page_id='.absint(get_theme_mod('aboutuspage',true)) ); ?>				
                                    <?php while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>                                        
                                     <div class="aboutus-content">
                                     <h3><?php the_title(); ?></h2>
                                     <p><?php echo esc_html( wp_trim_words( get_the_content(), 125, '&hellip;' ) );  ?></p>   
                                     <a class="learnmore" href="<?php the_permalink(); ?>">                                      
                                      <?php esc_html_e('Read More','economics'); ?>
                                    </a>                                                                     
                                    </div>                                    
                                    <?php if(has_post_thumbnail() ) { ?>
                                      <div class="aboutus-thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
                                    <?php } ?>
                                      
                                    <?php endwhile;
                                   		 wp_reset_postdata(); ?>                                    
                       				<?php } ?>                                 
                    <div class="clear"></div>  
               </div><!-- about-wrapper-->            
            </div><!-- container -->
       </section><!-- #sectiopn-second -->
<?php } ?>
<?php } ?>