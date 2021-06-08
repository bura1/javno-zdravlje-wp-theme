<?php

get_header();
?>

	<div id="primary" class="content-area page-area">
		<main id="main" class="site-main">
			<div class="page-content">
				<?php

				while ( have_posts() ) :
					the_post(); ?>

					<article id="post-<?php the_ID(); ?>" class="single-az">
						<a href="<?php echo esc_url(home_url()); ?>/zdravlje_az/" class="back_az_link">< Nazad</a>
						<header class="entry-header az-header-single">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header>

						<?php // jz_post_thumbnail(); ?>

						<div class="entry-content az-entry-content">
							<?php
							the_content();

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jz' ),
								'after'  => '</div>',
							) );
							?>
						</div>

						<br>
						<div class="po-box">
							<h3 class="po-h3">Povezane objave:</h3>

							<?php
							/* Objave koje pripadaju trenutnim oznakama */
							$tag_ids = array();
							foreach( get_the_tags($post->ID) as $tag ) {
							    $tag_ids[] = $tag->term_id;
							}						
						
							$query = new WP_Query(array(
							    'posts_per_page' => -1,
							    'no_found_rows'  => true,
							    'tag__in'            => $tag_ids
							));

							if ( $query->have_posts() ) {
							    while ( $query->have_posts() ) { 
							    	$query->the_post();
							        the_title( '<h2 class="po-title">- <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							    }
							    wp_reset_postdata();
							}
							?>
						</div>

					</article>

				<?php
				endwhile;
				?>
			</div>

		</main>
	</div>

<?php
get_footer();
