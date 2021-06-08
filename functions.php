<?php
/**
 * Javno_zdravlje_18 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Javno_zdravlje_18
 */

if ( ! function_exists( 'jz_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function jz_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Javno_zdravlje_18, use a find and replace
		 * to change 'jz' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'jz', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'jz' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'jz_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'jz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jz_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'jz_content_width', 640 );
}
add_action( 'after_setup_theme', 'jz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jz' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'jz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
      	'name' => __('Home Sidebar', 'jz'),
     	'id' => 'sidebar-home',
     	'description' => __('Textbox on homepage', 'jz'),
      	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      	'after_widget' => '</aside>',
      	'before_title' => '<h2>',
      	'after_title' => '</h2>'
    ) );
    register_sidebar( array(
    	'name' => __('Calendar Sidebar', 'jz'),
    	'id' => 'sidebar-cal',
    	'description' => __('Textbox on homepage', 'jz'),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h4>',
    	'after_title' => '</h4>'
    ) );
    register_sidebar( array(
    	'name' => __('Post Sidebar', 'jz'),
    	'id' => 'sidebar-post',
    	'description' => __('Post sidebar', 'jz'),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h4>',
    	'after_title' => '</h4>'
    ) );
}
add_action( 'widgets_init', 'jz_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jz_scripts() {
	wp_enqueue_style( 'jz-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'jz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20151215', true );

	wp_enqueue_script( 'cookiechoices', get_template_directory_uri() . '/js/cookiechoices.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jz_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Include custom navwalker
require_once get_template_directory() . '/inc/bs4navwalker.php';

// HZJZ logo u izborniku
function my_wp_nav_menu_items( $items, $args ) {
	$menu = wp_get_nav_menu_object($args->menu);
	if( $args->theme_location == 'menu-1' ) {
		$logo = get_field('image', $menu);
		$html_logo = '<li class="menu-item-logo"><a href="https://www.hzjz.hr/"><img src="'.get_template_directory_uri().'/images/hzjz-logo.png" alt="HZJZ Logo" /></a></li>';
		$items = $items . $html_logo;
	}
	return $items;
}
add_filter('wp_nav_menu_items', 'my_wp_nav_menu_items', 10, 2);

// Custom excerpt
function custom_excerpt($length) {
	$string = wp_trim_excerpt($length);
	return $string;
}
add_filter('excerpt_length', 'custom_excerpt');


// Register Custom Post Type
function zdravlje_az() {

	$labels = array(
		'name'                  => 'Pojmovi',
		'singular_name'         => 'Pojam',
		'menu_name'             => 'Zdravlje A-Ž',
		'name_admin_bar'        => 'Post Type',
		'archives'              => 'Item Archives',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Items',
		'add_new_item'          => 'Add New Item',
		'add_new'               => 'Add New',
		'new_item'              => 'New Item',
		'edit_item'             => 'Edit Item',
		'update_item'           => 'Update Item',
		'view_item'             => 'View Item',
		'view_items'            => 'View Items',
		'search_items'          => 'Search Item',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Pojam',
		'description'           => 'Zdravlje A-Ž pojmovi',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields' ),
		'taxonomies'            => array( /*'category',*/ 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'zdravlje_az', $args );

}
add_action( 'init', 'zdravlje_az', 0 );



/* Front page image - onload - onresize JS */
function frontpage_onload_onresize()
{
    if( is_front_page() ) { ?>

    	<script type="text/javascript">
			function myHeight() {
			  var header = window.getComputedStyle(document.getElementById("masthead"), null);
			  header = parseInt(header.getPropertyValue("height"));
			    var h = window.innerHeight - header;
			    var n;
			    if (h < 500) {
			      n = 500;
			    } else if (h > 880) {
			      n = 880;
			    } else {
			      n = h;
			    }
			    document.getElementById('fpimg').style.height = n+'px';
			    document.getElementById("fp-teme").style.display = "flow-root";
			    document.getElementById("second-screen").style.display = "flow-root";
			    document.getElementById("third-screen").style.display = "flow-root";
			    document.getElementById("colophon").style.display = "flow-root";
			}
			window.onload = myHeight;
			window.onresize = myHeight;      
    	</script>

    <?php }           
};
add_action( 'wp_footer', 'frontpage_onload_onresize' );