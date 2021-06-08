<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Javno_zdravlje_18
 */

if ( ! is_active_sidebar( 'sidebar-post' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-post' ); ?>
</aside><!-- #secondary -->
