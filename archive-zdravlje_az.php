<?php
get_header();
?>

	<div id="primary" class="content-area archive-area">
		<main id="main" class="site-main">
			<div class="archive-content">

				<?php 
				$args = array(
					'post_type'=>'zdravlje_az',
					'posts_per_page' => -1
				);
				$loop = new WP_Query( $args );

				if ( have_posts() ) : ?>

					<header class="page-header az-header">
						<h1 class="page-title">Zdravlje A - Ž</h1>
					</header>

					<?php

					while ( $loop->have_posts() ) {
						$loop->the_post(); 

						$titles[] = array('title'=>get_the_title(), 'url'=>get_permalink());

						//echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
					}

				endif;

				sort($titles);

				foreach ($titles as $title) {
					$t[] = substr($title['title'],0,1);
				}

				$t = array_unique($t);
				sort($t);

				/* Abeceda */
				echo '<div class="abeceda">';
				$abcd = array("A","B","C","Č","Ć","D","DŽ","Đ","E","F","G","H","I","J","K","L","LJ","M","N","NJ","O","P","R","S","Š","T","U","V","Z","Ž");
				foreach ($abcd as $a) {
					/*if ( in_array($a, $t) ) {
						echo '<a class="siva" href="#'.$a.'">'.$a.'</a>';
					} else {
						echo '<a class="siva-light" href="#'.$a.'">'.$a.'</a>';
					}*/
					if ( in_array($a, $t) ) {
						/*echo $a.'-<strong>DA</strong> / ';*/
						echo '<a class="siva" href="#'.$a.'">'.$a.'</a>';
					} else {
						echo '<p class="siva_light">'.$a.'</p>';
					}
				}
				echo '</div>';				
				
				echo '<div class="az-pojmovi">';
					foreach ($t as $value) {
						echo '<div class="az-pojam">';
							echo '<p class="slovo-pojma" id="'.$value.'">'.$value.'</p>';
							foreach ($titles as $title) {
								if (substr($title['title'],0,1) === $value) {
									echo '<div class="col-sm-4 pojam-box"><a class="pojmovi-link" href="'.$title["url"].'">'.$title['title'].'</a></div>';
								}
							}
						echo '</div>';
					}
				echo '</div>';
				?>
			</div>
		</main>
	</div>

<?php
get_sidebar();
get_footer();
