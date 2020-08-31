<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package eivlen
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="section" id="eivlen_post_header">
				<div class="container">
				<header class="page-header">
					<h1 class="page-title title is-5 has-text-centered" id="eivlen_post_header_title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'eivlen' ); ?></h1>
				</header><!-- .page-header -->
			</div>
			</section>
			<div class="page-content">
			<section class="section error-404 not-found " style="padding-top: 0px;">
				<div class="container">
				<div class="columns">
					<div class="column is-auto">
						<div class="page-content">
					<p class="subtitle is-5"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'eivlen' ); ?></p>

					<?php
					get_search_form();
					?>
					<br/><br/>
					<?php
					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories" style="margin-top:50px;">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'eivlen' ); ?></h2>
						<ul>
							<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
							?>
						</ul>
					</div><!-- .widget -->

			

				</div><!-- .page-content -->
					</div>
					
						<?php get_sidebar(); ?>
					
				</div>
</div>
			</section>
		</div>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
