<?php
//
//if( ! defined('ABSPATH') ) exit;
//
//
//use Carbon_Fields\Container;
//use Carbon_Fields\Field;
//
//add_action( 'carbon_fields_register_fields', 'crb_attach_page_about' );
//function crb_attach_page_about() {
//	Container::make( 'post_meta', __( 'About options', 'bs_sonaris' ) )
//	->where( 'post_type', '=', 'page' )
//	->add_fields(array(
//		Field::make( 'text', 'crb_slider_image_url', __( 'Slider image url', 'bs_sonaris' ) ),
//		Field::make( 'rich_text', 'crb_slider_image_caption'.carbon_lang(), __( 'Slider image caption', 'bs_sonaris' ) ),
//	));
//}
//
