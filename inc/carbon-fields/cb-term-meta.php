<?php

if (!defined('ABSPATH')) exit;


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_term_meta');
function crb_attach_term_meta()
{
	Container::make('term_meta', __('Print image'))
		->where('term_taxonomy', '=', 'category')
//	->where( 'term_level', '=', 3 )
		->add_fields(array(
			Field::make('text', 'crb_print_categories_image', __('Print category svg icon id', 'bs_sonaris')),
			Field::make('image', 'crb_category_image', 'crb_category_image')
				->set_help_text('350x250'),

//			Field::make('image', 'crb_category_image_big', 'crb_category_image_big')
//				->set_help_text('1600x400'),

			Field::make('rich_text', 'crb_category_text_ro', 'crb_category_text_ro'),
			Field::make('rich_text', 'crb_category_text_ru', 'crb_category_text_ru'),
			Field::make('rich_text', 'crb_category_text_en', 'crb_category_text_en'),
		));
}
