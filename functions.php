<?php
/**
 * garua functions and definitions
 *
 * @package garua
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

$garuafw_debug = true;
if ( ! isset( $content_width ) ) {
	$content_width = 1100; /* pixels */
}

if ( ! function_exists( 'garua_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function garua_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on garua, use a find and replace
	 * to change 'garua' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'garua', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'garua' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'garua_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // garua_setup
add_action( 'after_setup_theme', 'garua_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function garua_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'garua' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'garua_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function garua_scripts() {
	wp_enqueue_style( 'garua-style', get_stylesheet_uri() );
	wp_enqueue_style( 'stylo',  get_template_directory_uri() . '/css/style2.css' );

	if(is_page( 'Home' )) {
	//wp_enqueue_style( 'owl-style',  get_template_directory_uri() . '/bower_components/OwlCarousel/owl-carousel/owl.carousel.css' );
	//wp_enqueue_style( 'owl-theme-style',  get_template_directory_uri() . '/bower_components/OwlCarousel/owl-carousel/owl.theme.css' );
	wp_enqueue_style( 'owl-style',  get_template_directory_uri() . '/bower_components/OwlCarousel2/assets/owl.carousel.css' );
	wp_enqueue_style( 'owl-style',  get_template_directory_uri() . '/bower_components/OwlCarousel2/assets/owl.theme.default.css' );
	//wp_enqueue_style( 'owl-style_them',  get_template_directory_uri() . '/bower_components/OwlCarousel2/src/css/owl.theme.default.css' );
	}
	wp_deregister_script( 'jquery' );
	$jquery_cdn = '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js';
	wp_enqueue_script( 'jquery', $jquery_cdn, array(), '20100226', true );

	wp_enqueue_script( 'garua-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'garua-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if(is_page( 'Home' )) {
	wp_enqueue_script( 'owl-script', get_template_directory_uri() . '/bower_components/OwlCarousel2/owl.carousel.js', array(), '20130455', true );
	//wp_enqueue_script( 'owl-script-navi', get_template_directory_uri() . '/bower_components/OwlCarousel2/src/js/owl.navigation.js', array(), '20130455', true );
	}

	wp_enqueue_script( 'garua-match-height', get_template_directory_uri() . '/js/matchHeight.js', array(), '20140001', true );
	
	wp_enqueue_script( 'garua-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20140001', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'garua_scripts' );
/**
 * Read More tag Customize
 */

add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
return '<a class="more-link" href="' . get_permalink() . '">'.__( 'Read More', 'garua' ).'</a>';
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load Garua Specific Functions
 */
require get_template_directory() . '/inc/garua.php';

/**
 * Add Post Thumbnails - Featured Images
 */

add_theme_support( 'post-thumbnails' );

//add_image_size('post-header-image', 960, 300, true);



