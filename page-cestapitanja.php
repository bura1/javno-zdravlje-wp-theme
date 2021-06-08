<?php
// For passing $_SESSION['virtual_xml'] from search-questions.php to livesearch.php
session_start(); 
?>

<?php
/* Template Name: Česta pitanja */

get_header();
?>

	<div id="primary" class="content-area page-area">
		<main id="main" class="site-main">
			<div class="page-content">
				<?php
				while ( have_posts() ) :
					the_post(); ?>

					<article id="post-<?php the_ID(); ?>" class="single-cp">
						<header class="entry-header cp-header">
							<?php the_title( '<h1 class="page-title entry-title">', '</h1>' ); ?>
						</header>

						<div class="entry-content">
							<?php // include 'inc/search-pitanja-odgovori/search-questions.php'; ?>

							<!-- Accordion -->
							<?php 
							$n=1;
							echo '<div id="accordion">';
								$fields = get_field('pitanja_odgovori');
								foreach ($fields as $field) {
									echo '<div class="card">';
										echo '<div class="card-header">';
											echo '<span class="card-header-number">'.$n.'.)</span>';
											echo '<a class="card-link" data-toggle="collapse" href="#collapse'.$n.'">';
												echo $field['pitanje'];
											echo '</a>';
										echo '</div>';	
										echo '<div id="collapse'.$n.'" class="collapse" data-parent="#accordion">';
											echo '<div class="card-body">';
												echo $field['odgovor'];
											echo '</div>';
										echo '</div>';
									echo '</div>';	
									$n++;	
								}
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
