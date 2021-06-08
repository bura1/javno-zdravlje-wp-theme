<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Javno_zdravlje_18
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php echo 'Rezultati pretraživanja za: <span style="font-weight:600;">' . get_search_query() . '</span>'; ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'jz' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p class="no-results-p"><?php echo "Žao nam je, ali ništa ne odgovara vašim pojmovima za pretraživanje. Pokušajte ponovno s nekim drugim ključnim riječima."; ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p class="no-results-p"><?php echo "Čini se da ne možemo pronaći ono što tražite. Možda pretraživanje može pomoći."; ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
