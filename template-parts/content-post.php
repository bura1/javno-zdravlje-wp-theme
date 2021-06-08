<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Javno_zdravlje_18
 */

?>

<article class="single-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-content">
		<div class="post-left col-lg-8">

			<header class="entry-header" id="article-header">
				<div class="post-header">
					<?php
						the_title( '<h1>', '</h1>' );

					/*if (get_the_date() == get_the_modified_time('j. F Y.'))	{
						$modified = '<h5 style="font-size:13px;"><span style="font-size:13px;color:#696969;">Objavljeno: </span>' . get_the_date() . '</h5>';
					} else {
						$modified = '<h5 style="font-size:13px;"><span style="font-size:13px;color:#696969;">Objavljeno: </span>' . get_the_date() . '<span style="font-size:13px;color:#696969;">  /  Ažurirano: </span>' . get_the_modified_time('j. F Y.') . ' </h5>';
					}*/

					if (get_the_date() == get_the_modified_time('j. F Y.'))	{
						$modified = '<h5 class="posttime">Objavljeno: ' . get_the_date() . '</h5>';
					} else {
						$modified = '<h5 class="posttime">Objavljeno: ' . get_the_date() . ' / Ažurirano: ' . get_the_modified_time('j. F Y.') . ' </h5>';
					}

					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php
							/* jz_posted_on(); */
							/* jz_posted_by(); */
							echo $modified;
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</div>
			</header>

			<?php 
			$post_id = get_the_ID();
			if( !empty(get_the_post_thumbnail()) ) { ?>
				<div class="post-thumb">
					<?php jz_post_thumbnail(); ?>
				</div>
			<?php } ?>

			<div class="entry-content">
				<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'jz' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jz' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php jz_entry_footer(); ?>
			</footer><!-- .entry-footer -->

			<?php // the_post_navigation(); ?>
		</div>

		<div class="post-right col-lg-4">
			<div id="bar-fixed">
				<div class="post-sidebar">

					<?php /* if( !empty(get_the_post_thumbnail()) ) { ?>
						<div class="post-thumb">
							<?php jz_post_thumbnail(); ?>
						</div>
					<?php } */ ?>	
						
					<?php dynamic_sidebar('sidebar-post'); ?>
				</div>
			</div>
		</div>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
