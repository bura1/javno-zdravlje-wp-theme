<?php
/* Template Name: Živi zdravo */

get_header();
?>

	<div id="primary" class="content-area page-area">
		<main id="main" class="site-main">
			<div class="page-content">
				<?php
				while ( have_posts() ) :
					the_post(); ?>

					<article id="post-<?php the_ID(); ?>" class="single-zz">
						<header class="entry-header zz-header">
							<?php the_title( '<h1 class="page-title entry-title">', '</h1>' ); ?>
						</header>

						<div class="entry-content">
							<?php
							the_content();

							if(have_rows('kategorije')) {
								while(have_rows('kategorije')) {
									the_row();
									$kategorije[] = get_sub_field('kategorija');
								}
							}

							echo '<div class="zivizdravo-box">';
							$num = 1;
							foreach($kategorije as $kategorija) {
								if($num <= 6) {
									echo '<a class="zz-a" href="/category/'.$kategorija->slug.'">'.$kategorija->name.'</a>';
								} else {
									echo '<a class="zivizdravo-display" href="/category/'.$kategorija->slug.'">'.$kategorija->name.'</a>';
								}
								$num++;
							}
							echo '<buton id="zz-button" onclick="zivizdravoDisplay()">VIŠE</button>';
							echo '</div>';

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
get_sidebar();
get_footer();
