<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eivlen
 */

?>
<section class="section eivlen_full_first content-area">
	<div class="container">
		<div class="columns is-multiline">
			<?php
				if ( have_posts() ) :
			/* Start the Loop */
					while ( have_posts() ) :
						the_post();
			?>
			<div class="column is-one-third justify">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="card">
						<div class="card-image">
					    	<figure class="image is-2by2">
								<?php eivlen_post_thumbnail()?>
							</figure>
							<?php
								if ( 'post' === get_post_type() ) :
							?>
									<div class="entry-meta">
										<div class="posted_on_div">
											<p class="subtitle is-6"><?php eivlen_posted_on(); ?></p>
										</div>
									</div><!-- .entry-meta -->
							<?php endif; ?>							
				  		</div>
				  		<div class="card-content">
					    	<div class="media">
					      		<div class="media-content">
									<header class="entry-header">
										<?php
											the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
										?>
									</header><!-- .entry-header -->
								</div>
							</div>
							<div class="entry-content content">
								<?php
								the_excerpt( sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'eivlen' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								) );

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eivlen' ),
									'after'  => '</div>',
								) );
								?>
							</div><!-- .entry-content -->
							<div class="control">
								<a href="<?php the_permalink(); ?>" class="button is-outlined read-more">Read More</a>
							 </div>
						</div><!--card -->
					</div><!--card -->
				</article><!-- #post-<?php the_ID(); ?> -->
			</div> <!--is one third-->
			
			<?php
		endwhile;
			?>
			
		</div><!--is one multiline-->
		<?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div>
</section>
