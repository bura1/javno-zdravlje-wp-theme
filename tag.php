<?php
get_header();
?>

<div id="primary" class="content-area cat-area">
	<main id="main" class="site-main">
		<div class="cat-content">

			<?php if ( have_posts() ) { ?>

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="cat-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php
				while ( have_posts() ) {
					the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<?php 
						$post_id = get_the_ID();
						if( !empty(get_the_post_thumbnail()) ) { ?>
							<div class="post-thumb col-sm-3">
								<?php jz_post_thumbnail(); ?>
							</div>
						<?php } else {?>
							<div class="post-thumb col-sm-3">
								<?php echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">'; ?>
								<img src="<?php echo get_template_directory_uri(); ?>/images/jz-default-thumb.png">
								<?php echo '</a>'; ?>
							</div>
						<?php } ?>

						<div class="col-sm-9 post-right">

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
											echo '<h5 class="posttime">Objavljeno: ' . get_the_date() . '</h5>';
											?>
										</div>
									<?php endif; ?>
								</div>
							</header>

							<div class="post-content">

								<div class="entry-content">
									<?php
									/*the_content( sprintf(
										wp_kses(
											__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'jz' ),
											array(
												'span' => array(
													'class' => array(),
												),
											)
										),
										get_the_title()
									) );*/
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

			<?php	}

				the_posts_navigation();

			} else {

				get_template_part( 'template-parts/content', 'none' );

			} ?>

		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
