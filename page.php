<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package eivlen
 */

get_header();
?>
<div class="content-area">
	<?php 
		while ( have_posts() ) :
		the_post();
	?>
	<section class="section" id="eivlen_post_header">
		<div class="container single_post_title">
   			<?php the_title( '<h2 class="entry-title has-text-centered" id="eivlen_post_header_title">', '</h2>' ) ?>
      	</div>
  	</section>
	<?php endwhile ?>
	<section class="section single-post-container">
		<div class="container">
			<div class="columns">
				<div class="column is-two-thirds">
					<?php
						while ( have_posts() ) :
							the_post();
								get_template_part( 'template-parts/content', get_post_type() );
							// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
						endwhile; // End of the loop.
					?>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
</div>
<?php
get_footer();
