<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Javno_zdravlje_18
 */

get_header();
?>

	<div id="primary" class="content-area, allposts-area">
		<main id="main" class="site-main">
			<div class="allposts-content">

				<?php
				if ( have_posts() ) : ?>
				
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="allposts-title">', ' svih objava</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header>

					<?php
					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) :
						the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php 
						$post_id = get_the_ID();
						if( !empty(get_the_post_thumbnail()) ) { ?>
							<div class="post-thumb col-md-3">
								<?php jz_post_thumbnail(); ?>
							</div>
						<?php } else {?>
							<div class="post-thumb col-md-3">
								<?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">'; ?>
								<img src="<?php echo get_template_directory_uri(); ?>/images/jz-default-thumb.png">
								<?php echo '</a>'; ?>
							</div>
						<?php } ?>

						<div class="col-md-9 post-right">

							<header class="entry-header" id="article-header">
								<div class="post-header">
									<?php
									the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );

									if ( 'post' === get_post_type() ) :
										?>
										<div class="entry-meta">
											<?php
											/* jz_posted_on(); */
											/* jz_posted_by(); */
											if (get_the_date() == get_the_modified_time('j. F Y.'))	{
												echo '<h5 class="posttime">Objavljeno: ' . get_the_date() . '</h5>';
											} else {
												echo '<h5 class="posttime">Objavljeno: ' . get_the_date() . ' / Ažurirano: ' . get_the_modified_time('j. F Y.') . ' </h5>';
											}
											?>
										</div>
									<?php endif; ?>
								</div>
							</header>

							<div class="post-content">

								<div class="entry-content">
									<?php
									echo wp_trim_words(wp_strip_all_tags(get_the_excerpt(),true),20,'') . ' ... <a href="'.esc_url(get_permalink()).'">više</a>';

									wp_link_pages( array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jz' ),
										'after'  => '</div>',
									) );
									?>
								</div>

							</div>

						</div>

					</article> 				
				<?php
				endwhile;

				the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
