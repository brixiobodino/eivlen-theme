<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eivlen
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="column is-half justify ">
		<div class="card">
			<div class="card-image">
				<figure class="image is-2by2">
					<?php eivlen_post_thumbnail(); ?>
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
							<?php the_title( sprintf( '<h2 class="entry-title title is-4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						</header><!-- .entry-header -->
					</div>
				</div>
				<div class="content">
					<?php the_excerpt(); ?>
				</div>
				<div class="control">
					<a href="<?php the_permalink(); ?>" class="button is-outlined read-more">Read More</a>
				</div>
				<footer class="entry-footer">
					<?php eivlen_entry_footer(); ?>
				</footer><!-- .entry-footer -->
 			</div> <!-- card content -->
		</div>	<!-- card -->
	</div>	<!-- end of column is-half justify -->	
</article>