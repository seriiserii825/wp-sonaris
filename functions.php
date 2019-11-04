<?php

if( ! defined('ABSPATH') ) exit;

require_once __DIR__.'/inc/carbon-fields/cb.php';
require_once __DIR__.'/inc/carbon-fields/cb-post-type.php';
require_once __DIR__.'/inc/carbon-fields/cb-term-meta.php';
require_once __DIR__.'/inc/carbon-fields/cb-post-print.php';
require_once __DIR__.'/inc/func.php';
require_once __DIR__.'/inc/acf-category.php';
require_once __DIR__.'/inc/enqueue-style.php';
require_once __DIR__.'/inc/bs-taxonomy.php';
require_once __DIR__.'/inc/post-type.php';
require_once __DIR__.'/inc/sidebar.php';
require_once __DIR__.'/inc/classses/ServicesWidget.php';
	require_once __DIR__.'/inc/classses/AddressWidget.php';

add_filter( 'widget_text', 'do_shortcode' );

if ( ! function_exists( 'bs_sonaris_setup' ) ) :
	function bs_sonaris_setup() {
		load_theme_textdomain( 'bs_sonaris', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-header' => esc_html__( 'Header menu', 'bs_sonaris' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'bs_sonaris_custom_background_args', array(
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
add_action( 'after_setup_theme', 'bs_sonaris_setup' );

function bs_sonaris_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bs_sonaris_content_width', 640 );
}
add_action( 'after_setup_theme', 'bs_sonaris_content_width', 0 );
