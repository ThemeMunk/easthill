<?php
/**
 * Easthill functions and definitions.
 * 
 * Do not go gentle into that good night,
 * Old age should burn and rave at close of day;
 * Rage, rage against the dying of the light.
 * 
 * Though wise men at their end know dark is right,
 * Because their words had forked no lightning they
 * Do not go gentle into that good night.
 *  
 * Dylan Thomas, 1914 - 1953
 *  
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 * 
 * @package    Easthill
 * @subpackage Functions
 * @author     ThemeMunk <support@thememunk.com>
 * @copyright  Copyright (c) 2015 - 2016, ThemeMunk
 * @link       http://thememunk.com/theme/easthill
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html 
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

if ( ! function_exists( 'easthill_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function easthill_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on easthill, use a find and replace
	 * to change 'easthill' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'easthill' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// add custmo logo support	
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 350,
		'flex-width' => true,
		'flex-height' => true,		
		'header-text' => array( 'site-title', 'site-description' ),		
	) );		

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
		 // Custom Image Size
	set_post_thumbnail_size( 150, 150, true );
	add_image_size( 'easthill-slider', 1170, 550, true );	
	add_image_size( 'easthill-featured', 750, 500, true );		
	add_image_size( 'easthill-vertical-long', 360, 350, true );				


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'easthill' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'easthill_custom_background_args', array(
		'default-color' => 'f1f1f1',
		'default-image' => '',
	) ) );

}
endif;
add_action( 'after_setup_theme', 'easthill_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function easthill_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'easthill_content_width', 770 );
}
add_action( 'after_setup_theme', 'easthill_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function easthill_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Main', 'easthill' ),
		'id'            => 'sidebar-main',
		'description'   => esc_html__( 'Use this widget area to display widgets sidebar of homepage, post and pages.', 'easthill' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'easthill' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Use this widget area to display widgets in the first column of the footer.', 'easthill' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'easthill' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Use this widget area to display widgets in the second column of the footer.', 'easthill' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'easthill' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Use this widget area to display widgets in the third column of the footer.', 'easthill' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'easthill_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function easthill_scripts() {

	$easthill_theme = wp_get_theme();
    $easthill_version = $easthill_theme['Version'];

	// css includes
	wp_enqueue_style( 'jquery-meanmenu', get_template_directory_uri() . '/css/meanmenu.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'jquery-flexslider', get_template_directory_uri() . '/css/flexslider.css' );
	wp_enqueue_style( 'easthill-style', get_stylesheet_uri() );
	wp_enqueue_style( 'easthill-responsive', get_template_directory_uri() . '/css/responsive.css' );
		
	//js includes
	wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), $easthill_version, true );
	wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.js', array('jquery'), $easthill_version, true );
	wp_enqueue_script( 'easthill-custom', get_template_directory_uri() . '/js/easthill.js', array('jquery'), $easthill_version, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'easthill_scripts' );

/**
 * Register custom fonts.
 */
function easthill_fonts_url() {

	$fonts_url = '';
	
	/* Translators: If there are characters in your language that are not
	* supported by Roboto Slab, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$roboto_slab = _x( 'on', 'Roboto Slab: on or off', 'easthill' );
	 
	/* Translators: If there are characters in your language that are not
	* supported by Roboto, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$roboto = _x( 'on', 'Roboto: on or off', 'easthill' );
	 
	if ( 'off' !== $roboto_slab || 'off' !== $roboto ) {
	$font_families = array();	
	 
	if ( 'off' !== $roboto_slab ) {
	$font_families[] = 'Roboto Slab:400,700';
	}
	 
	if ( 'off' !== $roboto ) {
	$font_families[] = 'Roboto:300,400,500,700,900';
	}
	 
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	 
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	 
	return esc_url_raw( $fonts_url );
}

function easthill_google_fonts() {
	wp_enqueue_style( 'easthill-fonts', easthill_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'easthill_google_fonts' );


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
if ( ! function_exists( 'easthill_excerpt_more' ) && ! is_admin() ) :

function easthill_excerpt_more() {
	return ' &hellip; ';
}
add_filter( 'excerpt_more', 'easthill_excerpt_more' );

endif;

/* Change Excerpt length */
if ( ! function_exists( 'easthill_excerpt_length' ) && ! is_admin() ) :

function easthill_excerpt_length( $length ) {
return 30;
}
add_filter( 'excerpt_length', 'easthill_excerpt_length', 999 );

endif;

function easthill_admin_scripts() {

	wp_enqueue_style( 'easthill-admin-style',get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );   
    wp_enqueue_script( 'easthill-admin-js', get_template_directory_uri().'/inc/js/admin.js', array( 'jquery' ), '', true );    	
	
}
add_action( 'customize_controls_enqueue_scripts', 'easthill_admin_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Extra Functions
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Theme Info in Customizer
 */
require get_template_directory() . '/inc/info.php';