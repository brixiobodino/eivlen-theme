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
<section class="section medium" style="background: url(header2.jpg);background-size:cover;position: relative;height: 400px;">
    <div style="position: absolute; background: linear-gradient(rgba(0,0,0,0),#000);;width: 100%;left:0;bottom:0;padding-bottom: 10px;padding-top:100px">
      <div class="container">
         <h3  class="title is-3" style="color:#fff;margin-bottom: 10px;">The Big Tomato Burger</h3>
      </div>
      <div class="container">
        <p style="color:#fff;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting</p>
      </div>
      <div class="container" style="margin-top: 10px;">
        <h6 class="title is-6" style="color:#fff;font-family: poppins;">Read More</h6>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container" style="margin-bottom:20px;">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
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
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
</section>

<?php
get_sidebar();
get_footer();
