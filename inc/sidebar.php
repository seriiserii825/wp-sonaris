<?php

if( ! defined('ABSPATH') ) exit;

function bs_sonaris_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Language', 'bs_sonaris' ),
		'id'            => 'sidebar-language',
		'description'   => esc_html__( 'Add language wiget here', 'bs_sonaris' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'bs_sonaris' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Add footer wiget here', 'bs_sonaris' ),
		'before_widget' => '<div class="col md-3 sm-6"><div class="footer-contacts">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Map', 'bs_sonaris' ),
		'id'            => 'sidebar-map',
		'description'   => esc_html__( 'Add map wiget here', 'bs_sonaris' ),
		'before_widget' => '<div class="col md-6 sm-6"><div class="footer-contacts">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'bs_sonaris_widgets_init' );
