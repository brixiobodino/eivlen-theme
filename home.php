<?php
get_header();

?>
<section class="section" id="eivlen_post_header">
  <div class="container">
    <h2 class="has-text-centered" id="eivlen_post_header_title"><?php single_post_title(); ?></h2>
  </div>
</section>
    <?php 
      if (get_theme_mod("eivlen_blog_layout")=="with_sidebar") {
        if (get_theme_mod("eivlen_blog_display")=="grid") {
            get_template_part('template-parts/bloggrid','sidebar');
        }
      }
      if (get_theme_mod("eivlen_blog_layout")=="fullwidth") {
        if (get_theme_mod("eivlen_blog_display")=="grid") {
            get_template_part('template-parts/blogfullwidth','grid');
        }
      }
      if (get_theme_mod("eivlen_blog_layout")=="fullwidth") {
        if (get_theme_mod("eivlen_blog_display")=="full_grid_below") {
            get_template_part('template-parts/blogfullfirst','grid');
        }
      }
      if (get_theme_mod("eivlen_blog_layout")=="with_sidebar") {
        if (get_theme_mod("eivlen_blog_display")=="full_grid_below") {
            get_template_part('template-parts/blogfullfirst','sidebar');
        }
      }
      if (get_theme_mod("eivlen_blog_display")=="left-aligned") {
          get_template_part('template-parts/blogimage','left');
      }
      if (get_theme_mod("eivlen_blog_display")=="right-aligned") {
          get_template_part('template-parts/blogimage','right');
      }

     ?>

<?php
get_footer();

?>