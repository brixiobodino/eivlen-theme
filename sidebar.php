<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eivlen
 */

if ( ! is_active_sidebar( 'eivlen_theme_sidebar' ) ) {
	return;
}
?>
<div class="column is-one-third eivlen-sidebar">
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'eivlen_theme_sidebar' ); ?>
</aside><!-- #secondary -->
</div>
