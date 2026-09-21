<?php
/**
 * New Touch theme bootstrap.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'NEWTOUCH_VERSION', '1.0.5' );
define( 'NEWTOUCH_DIR', get_template_directory() );
define( 'NEWTOUCH_URI', get_template_directory_uri() );

/**
 * Theme setup.
 */
function newtouch_setup() {
	load_theme_textdomain( 'newtouch', NEWTOUCH_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'newtouch' ),
		'footer'  => __( 'Footer Navigation', 'newtouch' ),
	) );
}
add_action( 'after_setup_theme', 'newtouch_setup' );

/**
 * Styles & scripts.
 */
function newtouch_assets() {
	wp_enqueue_style(
		'newtouch-fonts',
		'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300..900&family=Space+Grotesk:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500;600&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'newtouch-style', NEWTOUCH_URI . '/assets/css/style.css', array(), NEWTOUCH_VERSION );

	// Accent colour and other brand tokens are editable via Site Settings (ACF options page),
	// so they're piped in as CSS custom properties rather than hard-coded.
	$accent = function_exists( 'get_field' ) ? get_field( 'accent_color', 'option' ) : '';
	if ( $accent ) {
		$custom_css = sprintf( ':root{--nt-accent:%s;}', esc_html( $accent ) );
		wp_add_inline_style( 'newtouch-style', $custom_css );
	}

	wp_enqueue_script( 'newtouch-main', NEWTOUCH_URI . '/assets/js/main.js', array(), NEWTOUCH_VERSION, true );

	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'newtouch_assets' );

/**
 * Direct, un-hookable header/footer loaders.
 *
 * Core's get_header()/get_footer() fire a 'get_header'/'get_footer' action
 * before including the theme file — page builders (Elementor Theme Builder
 * among them) hook that action to substitute their own markup, and on this
 * install that hook was silently swallowing our header.php entirely, even
 * after the offending Elementor template was removed. Requiring the file
 * directly skips that action, so nothing can intercept it.
 */
function newtouch_get_header() {
	require NEWTOUCH_DIR . '/header.php';
}
function newtouch_get_footer() {
	require NEWTOUCH_DIR . '/footer.php';
}

/**
 * Theme includes.
 */
require NEWTOUCH_DIR . '/inc/template-tags.php';
require NEWTOUCH_DIR . '/inc/acf-fields.php';

/**
 * ACF options page — houses global/footer/brand settings that aren't
 * specific to any one page (address, phone, footer copy, accent colour...).
 */
function newtouch_acf_options_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( array(
			'page_title' => __( 'Site Settings', 'newtouch' ),
			'menu_title' => __( 'Site Settings', 'newtouch' ),
			'menu_slug'  => 'newtouch-site-settings',
			'capability' => 'manage_options',
			'icon_url'   => 'dashicons-admin-generic',
			'position'   => 61,
		) );
	}
}
add_action( 'acf/init', 'newtouch_acf_options_page' );

/**
 * Nudge admins to install/activate ACF — every editable section on this
 * theme's templates depends on it.
 */
function newtouch_acf_notice() {
	if ( ! current_user_can( 'activate_plugins' ) ) {
		return;
	}
	if ( function_exists( 'get_field' ) ) {
		return;
	}
	echo '<div class="notice notice-warning"><p>';
	esc_html_e( 'New Touch theme: please install and activate Advanced Custom Fields (or ACF PRO, required for the Site Settings options page) to edit homepage content and images.', 'newtouch' );
	echo '</p></div>';
}
add_action( 'admin_notices', 'newtouch_acf_notice' );

/**
 * Sensible fallbacks so the homepage still reads correctly before an
 * editor has touched any ACF field.
 */
function newtouch_content_width() {
	$GLOBALS['content_width'] = 1240;
}
add_action( 'after_setup_theme', 'newtouch_content_width' );
