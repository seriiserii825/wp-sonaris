<?php

if( ! defined('ABSPATH') ) exit;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_post_type' );
function crb_attach_post_type() {
//	Container::make( 'post_meta', __( 'Slider' ) )
//    ->where( 'post_type', '=', 'slider' )
//	->add_fields(array(
//		Field::make( 'text', 'crb_slider_image_title_ro', __( 'Slider image title ro', 'bs_sonaris' ) )
//		->set_width(30),
//		Field::make( 'text', 'crb_slider_image_title_ru', __( 'Slider image title ru', 'bs_sonaris' ) )
//			->set_width(30),
//		Field::make( 'text', 'crb_slider_image_title_en', __( 'Slider image title en', 'bs_sonaris' ) )
//			->set_width(30),
//
//		Field::make('image', 'crb_slider_image', 'slider image')
//			->set_help_text(__('Set dimensions 1600x400', 'bs_sonaris'))
//	));

	Container::make( 'post_meta', __( 'Portfolio gallery' ) )
    ->where( 'post_type', '=', 'portfolio' )
	->add_fields(array(
		Field::make( 'media_gallery', 'crb_portfolio_gallery', __( 'Media Gallery' ) )
	));
}

