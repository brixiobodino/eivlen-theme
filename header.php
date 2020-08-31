<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eivlen
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700|Poppins:400,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'eivlen' ); ?></a>

	<header id="masthead" class="site-header">
		 <nav class="navbar top-menu-bar">
		 	<div class="navbar-menu top_menu-bar">
              <div class="navbar-start is-vcentered" style="padding-left:15px;padding-right:15px;">
                  	<div class="container" >
                  		<?php
                  if (!empty(get_theme_mod("eivlen_fb_settings"))) {
                ?>
                    <a href="<?php echo get_theme_mod("eivlen_fb_settings") ?>"><span class="icon top_social_icon"><i class="fab fa-facebook-f"></i></span> </a>
                <?php
                  }
                  if (!empty(get_theme_mod("eivlen_instagram_settings"))) {
                ?>
                   <a href="<?php echo get_theme_mod("eivlen_instagram_settings") ?>"><span class="icon top_social_icon"><i class="fab fa-instagram"></i></span></a>
                <?php
                  }
                  if (!empty(get_theme_mod("eivlen_twitter_settings"))) {
                ?>
                   <a href="<?php echo get_theme_mod("eivlen_twitter_settings") ?>"><span class="icon top_social_icon"><i class="fab fa-twitter"></i></span></a>
                <?php
                  }
                  if (!empty(get_theme_mod("eivlen_pinterest_settings"))) {
                ?>
                    <a href="<?php echo get_theme_mod("eivlen_pinterest_settings") ?>"><span class="icon top_social_icon"><i class="fab fa-pinterest-p"></i></span></a>
                <?php
                  }
                  if (!empty(get_theme_mod("eivlen_youtube_settings"))) {
                ?>
                    <a href="<?php echo get_theme_mod("eivlen_youtube_settings") ?>"><span class="icon top_social_icon"><i class="fab fa-youtube"></i></span></a>
                <?php
                  }
                  if (!empty(get_theme_mod("eivlen_linkedin_settings"))) {
                ?>
                    <a href="<?php echo get_theme_mod("eivlen_linkedin_settings") ?>"><span class="icon top_social_icon"><i class="fab fa-linkedin"></i></span></a>
                <?php
                  }
                  if (!empty(get_theme_mod("eivlen_reddit_settings"))) {
                ?>
                    <a href="<?php echo get_theme_mod("eivlen_reddit_settings") ?>"><span class="icon top_social_icon"><i class="fab fa-reddit"></i></span></a>
                <?php
                  }
                ?>             
                  	</div>
              </div>
              <div class="navbar-end is-vcentered" style="padding-right:15px;">
                  <?php get_search_form();?>
              </div>
          </div>
		 </nav>
		 <nav class="navbar main-navigation is-spaced" id="site-navigation" style="border-top:1px solid rgba(0,0,0,0.1);border-bottom: 1px solid rgba(0,0,0,0.1);">
	       	<div class="navbar-brand is-vcentered">
	        	
    					<h1 class="site-title title is-3">
    						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
    						<?php 
    							if ( has_custom_logo() ) {
    						?>
         							<?php 
       									$custom_logo_id = get_theme_mod( 'custom_logo' );
       									$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
          							?>
    								<img src="<?php echo $image[0]; ?>" alt="<?php echo get_bloginfo( 'name' ) ?>">
          					<?php 
    						} else {
            				?>
            				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>	
            				<?php
    						}
    						?>
    						</a>
    					</h1>	
             <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
			
	       	</div>
	     
	       	<div class="navbar-menu is-vcentered" id="navMenu">
	        	<div class="navbar-end">
			        <?php wp_nav_menu(array(
	                    'theme-location'  => 'primary-menu',
	                    'depth'   =>  3,
	                    'menu'      =>  'NewNav',
	                    'container'   =>  '',
	                    'menu_class'    =>  '',
	                    'items_wrap'    =>  '%3$s',
	                    'walker'    =>  new Bulma_NavWalker(),
	                    'fallback_cb'   =>  'Bulma_NavWalker::fallback'
	                    ));
                  	?>
	        	</div>
	        </div>
    	</nav>
	</header><!-- #masthead -->
	<div id="content" class="site-content" >
      