<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Javno_zdravlje_18
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!--<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Overpass" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">-->
	<link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- Font awesome -->
	<!--<script defer src="https://use.fontawesome.com/releases/v5.6.3/js/all.js" integrity="sha384-EIHISlAOj4zgYieurP0SdoiBYfGJKkgWedPHH4jCzpCXLmzVsw1ouK59MuUtP4a1" crossorigin="anonymous"></script>-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'jz' ); ?></a>
    
    <div class="row vi-row">
        <?php dynamic_sidebar('sidebar-home'); ?>
    </div>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<!--<div class="left-logo">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$jz_description = get_bloginfo( 'description', 'display' );
				if ( $jz_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $jz_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div>-->

			<!--<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'jz' ); ?></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>

				<div class="right-logo">
					<a href="https://www.hzjz.hr/"><img src="<?php echo get_template_directory_uri(); ?>/images/hzjz-logo.png"></a>
				</div>
			</nav>-->

			<nav class="navbar navbar-expand-xl navbar-light bg-faded">

				<?php the_custom_logo(); ?>

				<div class="right-logo-collapse">
					<a href="https://www.hzjz.hr/"><img src="<?php echo get_template_directory_uri(); ?>/images/hzjz-logo.png"></a>
				</div>

				<?php if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$jz_description = get_bloginfo( 'description', 'display' );
				if ( $jz_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $jz_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>

			   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
			     <span class="navbar-toggler-icon"></span>
			   </button>
			   <?php
			   wp_nav_menu([
			     'menu'            => 'top',
			     'theme_location'  => 'menu-1',
			     'container'       => 'div',
			     'container_id'    => 'bs4navbar',
			     'container_class' => 'collapse navbar-collapse',
			     'menu_id'         => 'primary-menu',
			     'menu_class'      => 'navbar-nav mr-auto',
			     'depth'           => 2,
			     'fallback_cb'     => 'bs4navwalker::fallback',
			     'walker'          => new bs4navwalker()
			   ]);
			   ?>

			</nav>

		</div>

	</header>

	<div id="content" class="site-content">
