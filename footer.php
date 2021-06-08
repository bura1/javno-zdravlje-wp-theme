<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Javno_zdravlje_18
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<ul class="footer-icons">
				<li class="face"><a href="http://www.facebook.com/sharer.php?u=http://www.hzjz.hr"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/facebook-white.png" alt="facebook"></a></li>
				<li class="twit"><a href="https://twitter.com/share?url=http://www.hzjz.hr"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/twitter-white.png" alt="twitter"></a></li>
				<li class="yt"><a href="https://www.youtube.com/channel/UCY-G8Vw1GIbkZc0FPASVuJw"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/youtube-white.png" alt="youtube"></a></li>
			</ul>

			<div style="margin-bottom:5px;"><a style="color:#8E99A9;" href="https://javno-zdravlje.hr/kontakt/">Kontakt</a> | <a style="color:#8E99A9;" href="https://javno-zdravlje.hr/pravne-napomene-i-upozorenja/">Pravne napomene</a></div>

			<p style="font-size:14px;"><?php echo date('Y'); ?> | © Hrvatski zavod za javno zdravstvo</p>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
  cookieChoices.showCookieBar({
    linkHref: '<?php echo home_url(); ?>/pravne-napomene/',
    language: '<?php _e( 'hr', 'bs3-hzjz' ); ?>'
  });
</script>

</body>
</html>
