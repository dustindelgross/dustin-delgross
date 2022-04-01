<?php
/* 
 * Dustin Delgross functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Dustin_Delgross
 * 
 * 
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.4.0' );
}

if ( ! function_exists( 'dustin_delgross_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dustin_delgross_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Dustin Delgross, use a find and replace
		 * to change 'dustin-delgross' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dustin-delgross', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'dustin-delgross' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script'
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'dustin_delgross_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'dustin_delgross_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dustin_delgross_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dustin_delgross_content_width', 640 );
}
add_action( 'after_setup_theme', 'dustin_delgross_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dustin_delgross_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dustin-delgross' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dustin-delgross' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dustin_delgross_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dustin_delgross_scripts() {
	
	wp_enqueue_style( '4d-accessibility', get_stylesheet_directory_uri().'/assets/css/accessibility.css', array(), _S_VERSION );
	wp_enqueue_style( '4d-base', get_stylesheet_directory_uri().'/assets/css/base.css', array(), _S_VERSION );
	wp_enqueue_style( '4d-forms', get_stylesheet_directory_uri().'/assets/css/forms.css', array(), _S_VERSION );
	wp_enqueue_style( '4d-gallery', get_stylesheet_directory_uri().'/assets/css/gallery.css', array(), _S_VERSION );
	wp_enqueue_style( '4d-layouts', get_stylesheet_directory_uri().'/assets/css/layouts.css', array(), _S_VERSION );
	wp_enqueue_style( '4d-layouts', get_stylesheet_directory_uri().'/assets/css/modules.css', array(), _S_VERSION );
	wp_enqueue_style( '4d-nav', get_stylesheet_directory_uri().'/assets/css/nav.css', array(), _S_VERSION );
	wp_enqueue_style( '4d-resets', get_stylesheet_directory_uri().'/assets/css/resets.css', array(), _S_VERSION );
	wp_enqueue_style( '4d-text-animations', get_stylesheet_directory_uri().'/assets/css/text-animations.css', array(), _S_VERSION );
	wp_enqueue_style( '4d-type', get_stylesheet_directory_uri().'/assets/css/type.css', array(), _S_VERSION );

	
	wp_enqueue_script( 'dustin-delgross-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'dustin-delgross-text-rotate', get_template_directory_uri() . '/assets/js/text rotation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'dustin-delgross-carousel', get_template_directory_uri() . '/assets/js/carousel.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'dustin-delgross-cursor', get_template_directory_uri() . '/assets/js/cursor.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dustin_delgross_scripts' );

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
