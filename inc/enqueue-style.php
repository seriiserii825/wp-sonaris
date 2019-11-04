<?php

if( ! defined('ABSPATH') ) exit;

/**
 * Enqueue scripts and styles.
 */
function bs_sonaris_scripts() {
	wp_enqueue_style( 'bs_sonaris-style', get_stylesheet_uri() );

	wp_enqueue_style('bs-font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_enqueue_style('bs-font-google', 'https://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,600,700&amp;display=swap&amp;subset=cyrillic');

	wp_enqueue_style('bs-style', get_template_directory_uri().'/assets/my.css');


	wp_enqueue_script('bs-main.min.js', get_template_directory_uri().'/assets/js/main.min.js', ['jquery'], null, true);
	wp_enqueue_script('bs-app.js', get_template_directory_uri().'/assets/js/app.js', ['jquery'], null, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bs_sonaris_scripts' );
