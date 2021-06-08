<?php
/* Template Name: Zdravlje A-Ž */

get_header();
?>

	<div id="primary" class="content-area page-area">
		<main id="main" class="site-main">
			<div class="page-content">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile;
				?>
			</div>
		</main>
	</div>

<?php
get_sidebar();
get_footer();
