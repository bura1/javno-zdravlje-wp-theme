<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Javno_zdravlje_18
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php echo 'Stranica nije pronađena'; ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p>Stranica koju tražite je možda uklonjena ili joj je promijenjeno ime.</p>
					<a href="<?php echo esc_url(home_url()); ?>" class="back-to-home">Povratak na početnu stranicu</a>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
