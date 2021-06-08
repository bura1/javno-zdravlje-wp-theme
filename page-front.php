<?php
/* Template Name: Naslovnica */

get_header();
?>

<style>
.eo-event-future a {
	color: red;
}
</style>


	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php $img = get_field('slika'); ?>
			<div class="frontpage-img" id="fpimg" style="background-image: url(<?php echo $img['url']; ?>);">

				<div class="fp-content">
					<!--<div class="fp-right">-->
						<div class="fp-teme" id="fp-teme">
							<?php $post_objects = get_field('teme');
								if ($post_objects) {
									foreach ($post_objects as $post_object) { ?>
										<div class="single-link"><a href="<?php echo get_permalink($post_object->ID); ?>"><h1><?php echo get_the_title($post_object->ID); ?></h1></a></div><br>
									<?php }
								} ?>
						</div>
					<!--</div>-->
				</div>

			</div>

			<?php
		endwhile;
		?>

		</main>

		<div class="second-screen" id="second-screen">
			<h1>Najnovije</h1>
			
			<?php
			$args = array(
				'numberposts' => 3,
				'offset' => 0,
				'category' => 0,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'include' => '',
				'exclude' => '',
				'meta_key' => '',
				'meta_value' =>'',
				'post_type' => 'post',
				'post_status' => 'draft, publish, future, pending, private',
				'suppress_filters' => true
			);
			$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
			//var_dump($recent_posts);

			echo '<div class="recent-posts">';
				foreach ($recent_posts as $post) {
					$backimg = get_the_post_thumbnail_url( $post['ID'], 'large' );
					/*echo '<div class="recent-post" style="background-image: url('. $backimg .')">';
						echo '<div class="rp-layer">';
							echo '<div class="iner-layer">';
								echo '<h4>'.$post['post_title'].'</h4>';
								echo '<p>'.wp_trim_words( $post['post_content'], 30, '...' ).'</p>';
								echo '<a href="'.get_permalink($post['ID']).'">Više</a>';
							echo '</div>';
						echo '</div>';
					echo '</div>';*/
					echo '<div class="recent-post">';
						echo '<a href="'.get_permalink($post['ID']).'"><div class="rp-image-box" style="background-image: url('. $backimg .')"></div></a>';
						echo '<div class="rp-text-box">';
							echo '<a href="'.get_permalink($post['ID']).'"><h3>'.$post['post_title'].'</h3></a>';
							echo '<p class="rp-tekst">'.wp_trim_words( $post['post_content'], 30, '...' ).'</p>';
							echo '<p><a href="'.get_permalink($post['ID']).'">Više »</a></p>';
						echo '</div>';
					echo '</div>';
				}
			echo '<a class="button-vise-objava"href="https://javno-zdravlje.hr/?post_type=post">SVE OBJAVE</a>';
			echo '</div>';
			wp_reset_postdata();
			?>	

		</div>

		<div class="third-screen" id="third-screen">
			<div class="content">
				<div class="third-left">
					<?php 
					$video_id = get_field('video_id');
					$image_url = get_field('image_url'); 

					echo '<div class="yt-div">';
						echo '<img id="yt-img" src="'.$image_url.'" data-video="https://www.youtube.com/embed/'.$video_id.'?autoplay=1">';
					echo '</div>';

					//echo '<iframe width="511" height="287" src="https://www.youtube.com/embed/'.$video_id.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
					?>
				</div>

				<div class="third-right">
			        <?php dynamic_sidebar('sidebar-cal'); ?>
				</div>
			</div>
		</div>

	</div>

<?php
get_sidebar();
get_footer();
