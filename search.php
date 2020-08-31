<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package eivlen
 */

get_header();
?>
<div class="content-area">
	<section class="section" id="eivlen_post_header">
	    <div class="container">
	       	<?php if ( have_posts() ) : ?>
				<h2 class="has-text-centered" id="eivlen_post_header_title">
			<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'eivlen' ), '<span>' . get_search_query() . '</span>' );
			?>
				</h2>
			<?php else : ?>
				<h2 class="has-text-centered" id="eivlen_post_header_title">
					<?php _e( 'Nothing Found', 'eivlen' ); ?>
				</h2>
				<p class="has-text-centered" id="eivlen_post_header_title">Your search term <span style="text-decoration: underline;"><?php echo get_search_query(); ?></span> has 0 result</p>
			<?php endif; ?>
	    </div>
	</section>
	<section class="section">
		<div class="container">
			<div class="columns">
				<div class="column is-auto">
					<?php		
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
					?>
					<div class="columns eivlen_post_wrapper"  id="with_shadow">
						<div class="column is-one-third">
								<?php eivlen_post_thumbnail()?>		
						</div>
						<div class="column is-auto" style="background: ;">
							<?php
								the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
										?>
						<p><?php the_excerpt(); ?></p><br>
						<div class="control">
							<a href="<?php the_permalink(); ?>" class="button is-outlined read-more">Read More</a>
						 </div>
						</div>
					</div>		
					<?php
					} // end while
						the_posts_navigation();
					}else{
					?>
					<h3>Try searching for different terms</h3>
					<?php
						get_search_form();
					}
					?>
				</div>
				<?php get_sidebar(); ?>
			</div> <!--columns-->
		</div>	<!--container-->
	</section>
</div>
<?php
get_footer();
