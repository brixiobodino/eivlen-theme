<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eivlen
 */

get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php $the_query = new WP_Query( 'posts_per_page=1' ); ?>
  			<?php while (
  			$the_query -> have_posts()) : $the_query -> the_post();
  		?>	
		<section class="section" id="front_page_header" style="background:url(<?php the_post_thumbnail_url() ; ?>);">
	        <div class="header_overlay">
	          	<div style="width:100%;height:400px;background:rgba(0,0,0,0.4);position: absolute;top:0;"></div>
			        <div class="header_overlay_content white_text">
			            <div class="container">
			              	<h1 id="front_page_header_title" ><a href="<?php the_permalink() ?>" style="color:#fff !Important;"><?php the_title(); ?></a></h1>
			            </div>
			            <div class="container">
			               <?php the_excerpt(); ?>
			            </div>
			            <div class="container" style="margin-top: 20px;">
			               <a href="<?php the_permalink(); ?>" class="white_text button">Read More</a>
			            </div>
			        </div>
			</div>
        <?php 
        endwhile;
        wp_reset_postdata();
        ?>
    	</section>
  		<section class="section">
	    	<div class="container">
				<?php
					if ( have_posts() ) :
						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text title is-3"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif;
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );
						endwhile;
						the_posts_navigation();
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
				?>
			</div> <!--container -->
			<div class="container">
		      <div class="columns is-multiline">
		      	<?php dynamic_sidebar("home_grid"); ?>
		      </div>
		    </div>
		</section>
		<!-- Hero Section -->
		<section class="hero is-dark homepage_hero">
			<div class="hero-body">
				<div class="container">
			  		<div class="columns">
			  			<div class="column is-auto">
			     			<h1 class="title is-2" style="color:#fff !important;margin-bottom:40px !Important;"><?php echo get_theme_mod('hero_title_setting'); ?></h1>
			      			<p class="subtitle is-5"><?php echo get_theme_mod('hero_content_setting'); ?></p>
			      			<a href="<?php echo get_theme_mod('hero_button_link_setting') ?>" class="button">
			      				<?php echo get_theme_mod('hero_button_text_setting') ?>
			      			</a>
			      		</div>
			      		<?php
			      			if (get_theme_mod("hero_image_setting")) {
			      		 ?>
			      		<div class="column is-one-third">
			      			<figure class="stack stack-randomrot">
								<img src="<?php echo get_theme_mod('hero_image_setting') ;?>" alt="img01"/>
								<img src="<?php echo get_theme_mod('hero_image_setting') ;?>" alt="img02"/>
								<img src="<?php echo get_theme_mod('hero_image_setting') ;?>" alt="img03"/>
							</figure>
			      		</div>
			      	<?php }?>
			    	</div>
			  	</div>
		  	</div>
		</section>
		<section class="section">
		    <div class="container">
		      <div class="columns is-multiline">
		      	<?php dynamic_sidebar("home_fullwidth"); ?>
		      </div>
		    </div>
		    <div class="container">
		      <div class="columns is-multiline">
		      	<?php dynamic_sidebar("home_halfwidth"); ?>
		      </div>
		    </div>
		</section>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
