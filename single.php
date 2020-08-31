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
   			<div class="entry-meta has-text-centered" style="margin-bottom: 20px;">
	   			<?php
					eivlen_posted_on();
					eivlen_posted_by();
				?>
			</div>
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
					?>
					<div class="eivlen_post_navigation">
						<?php
							the_post_navigation( array(
		            			'prev_text' =>'<i class="fas fa-angle-left"></i><span title="%title">'. __( 'Prev Post','eivlen' ).'</span>' ,
		            			'next_text' => '<span title="%title">'.__( 'Next Post' ,'eivlen') . '<i class="fas fa-angle-right"></i></span>',
		        			) );
							// If comments are open or we have at least one comment, load up the comment template.
							
						endwhile; // End of the loop.?>
					</div>
						<?php
						if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>
					
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
</div>
<?php
get_footer();
