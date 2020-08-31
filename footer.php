<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eivlen
 */

?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer footer">
		<div class="container">
      <div class="columns is-multiline">
        <div class="column">
          <div class="content">
            <?php dynamic_sidebar('footer_left'); ?>
         </div>
        </div>
        <div class="column">
          <div class="content">
             <?php dynamic_sidebar('footer_center'); ?>
          </div>
        </div>
        <div class="column ">
          <div class="content">
            <?php dynamic_sidebar('footer_right'); ?>
          </div>
        </div>
      </div>  
    </div>
    <div class="container copyright-div">
  		<div class="site-info">
        <p> 
  				<?php echo get_theme_mod('copyright_text_setting')?>
        </p>
  		</div><!-- .site-info -->
    </div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
