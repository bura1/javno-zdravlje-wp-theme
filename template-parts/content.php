<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Javno_zdravlje_18
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header" id="article-header">
		<div class="post-header col-md-12">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					/* jz_posted_on(); */
					/* jz_posted_by(); */
					echo '<p class="posttime">Objavljeno: ' . get_the_date() . '</p>';
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</div>
	</header><!-- .entry-header -->

	<div class="post-content">

		<div class="post-left col-lg-8">

			<?php if( has_post_thumbnail() ) { ?>
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

			<?php the_post_navigation(); ?>
		</div>

		<div class="post-right col-lg-4">
			<div id="bar-fixed">
				<div class="post-sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

	</div>

</article><!-- #post-<?php the_ID(); ?> -->
