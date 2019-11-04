<?php

if( ! defined('ABSPATH') ) exit;


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_post_single_print' );
function crb_attach_post_single_print() {
	Container::make( 'post_meta', __( 'Single gallery' ) )
	->where( 'post_term', '=', 'pechat' )
	->add_fields(array(
		Field::make( 'media_gallery', 'crb_media_gallery_for_single', __( 'Media Gallery for single' ) )
			->set_duplicates_allowed( false )
	));
}
