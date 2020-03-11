<?php
/**
 * Quotes on Dev Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package QOD_Starter_Theme
 */

if ( ! function_exists( 'qod_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function qod_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form' ) );

}
endif; // qod_setup
add_action( 'after_setup_theme', 'qod_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function qod_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'qod_content_width', 640 );
}
add_action( 'after_setup_theme', 'qod_content_width', 0 );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function qod_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'qod_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function qod_scripts() {
	wp_enqueue_style( 'qod-style', get_stylesheet_uri() );

	wp_enqueue_script( 'qod-starter-navigation', get_template_directory_uri() . '/build/js/navigation.min.js', array(), '20151215', true );
	wp_enqueue_script( 'qod-starter-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'qod_scripts' );

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom template tags for this theme.
 */
 require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom metaboxes generated using the CMB2 library.
 */
require get_template_directory() . '/inc/metaboxes.php';

 /**
 * Custom WP API modifications.
 */
require get_template_directory() . '/inc/api.php';

//New Function
function red_scripts() {
	$script_url = get_template_directory_uri() . '/js/api.js';
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'red_comments', $script_url, array( 'jquery' ), false, true );
   wp_localize_script( 'red_comments', 'red_vars', array(
	   'rest_url' => esc_url_raw( rest_url() ),
	   'wpapi_nonce' => wp_create_nonce( 'wp_rest' ),
	   'ajax_url' => admin_url( 'admin-ajax.php' ),
	   'comment_nonce' => wp_create_nonce( 'red_comment_status' ),
	   'post_id' => get_the_ID(),
	   'nonce' => wp_create_nonce( 'wp_rest' ),
      'success' => 'Thanks, your submission was received!',
      'failure' => 'Your submission could not be processed.'
   ) );
 }
 add_action( 'wp_enqueue_scripts', 'red_scripts' );

 function tag_page_filters($query) {
	if (is_tag()) : 
    $query->set('order', 'ASC');
    $query->set('orderby', 'title');
    $query->set('posts_per_page', '5');
    endif; 
}
add_action('pre_get_posts', 'tag_page_filters');

function red_comment_ajax() {
	check_ajax_referer( 'red_comment_status', 'security' );
	if ( ! current_user_can( 'edit_posts' ) ) {
	   exit;
	}
	$id = $_POST['the_post_id'];
	if ( isset( $id ) && is_numeric( $id ) ) {
	   $the_post = array(
		  'ID' => $id,
		  'comment_status' => 'closed'
	   );
	   wp_update_post( $the_post );
	}
	exit;
 }
 add_action( 'wp_ajax_red_comment_ajax', 'red_comment_ajax' );

 // add_action( 'wp_ajax_nopriv_red_comment_ajax', 'red_comment_ajax' );


