<section class="section content-area">
	<div class="container">
		<div class="columns">
			<div class="column is-auto ">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php
						if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
					?>
					<div class="columns eivlen_post_wrapper" id="with_shadow">
						<div class="column is-auto">
							<?php
								the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
							?>
							<p>
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
							</p><br>
							<div class="control">
								<a href="<?php the_permalink(); ?>" class="button is-outlined read-more">Read More</a>
							</div>
						</div>
						<div class="column is-one-third">
								<?php eivlen_post_thumbnail()?>
							
						</div>
					</div>		
					<?php
						endwhile;
						the_posts_navigation();
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
					?>	
				</article>
			</div>
				<?php 
					if (get_theme_mod("eivlen_blog_layout")=="with_sidebar") {
						get_sidebar();
					}else{
					}
				 ?>
		</div>
	</div>
</section>
