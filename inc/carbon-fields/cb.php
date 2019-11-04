<?php

if (!defined('ABSPATH')) exit;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
	$basic_options_container = Container::make('theme_options', __('Carbon Fields', 'bs_sonaris'))
		->add_tab(__('Images', 'bs_sonaris'), array(
			Field::make('image', 'crb_logo_en', __('Logo En', 'bs_sonaris'))
				->set_help_text(__('Set dimensions 240x40', 'bs_sonaris'))
				->set_width(30),
			Field::make('image', 'crb_logo_ro', __('Logo Ro', 'bs_sonaris'))
				->set_help_text(__('Dimensiuni 240x40', 'bs_sonaris'))
				->set_width(30),
			Field::make('image', 'crb_logo_ru', __('Logo Ru', 'bs_sonaris'))
				->set_help_text(__('Размер 240x40', 'bs_sonaris'))
				->set_width(30),

			Field::make('separator', 'crb_separator', __('Separator')),
			Field::make('image', 'crb_logo_big', __('Logo big', 'bs_sonaris'))
				->set_help_text(__('Set dimensions 720x720', 'bs_sonaris')),
		))
		->add_tab(__('Contacts', 'bs_sonaris'), array(
			Field::make('text', 'crb_phone_chishinau', 'crb_phone_chishinau')
				->set_width(50),
			Field::make('text', 'crb_phone_balti', 'crb_phone_balti')
				->set_width(50),

			Field::make('text', 'crb_email', __('Email', 'bs_sonaris')),
			Field::make('text', 'crb_facebook', __('Facebook', 'bs_sonaris'))
				->set_help_text(__('start with https://', 'bs_soaris')),
			Field::make('text', 'crb_twitter', __('Twitter', 'bs_sonaris'))
				->set_help_text(__('start with https://', 'bs_soaris')),
			Field::make('text', 'crb_google', __('Google', 'bs_sonaris'))
				->set_help_text(__('start with https://', 'bs_soaris')),
			Field::make('text', 'crb_youtube', __('Youtube', 'bs_sonaris'))
				->set_help_text(__('start with https://', 'bs_sonaris')),
		));

	// Add second options page under 'Basic Options'
	Container::make('theme_options', 'Blocks')
		->set_page_parent($basic_options_container) // reference to a top level container
		->add_tab(__('Rating block', 'bs_sonaris'), array(
			Field::make('complex', 'crb_rating', __('Rating'))
				->add_fields(array(
					Field::make('text', 'crb_rating_icon', __('Rating icon', 'bs_sonaris')),
					Field::make('text', 'crb_rating_count', __('Rating count', 'bs_sonaris')),
					Field::make('text', 'crb_rating_text_en', __('Rating text En', 'bs_sonaris')),
					Field::make('text', 'crb_rating_text_ro', __('Rating text Ro', 'bs_sonaris')),
					Field::make('text', 'crb_rating_text_ru', __('Rating text Ru', 'bs_sonaris')),
				))
				->set_layout('tabbed-horizontal')
		))
		->add_tab(__('Widgets title', 'bs_sonaris'), array(
			Field::make('text', 'crb_widgets_services_title_ru', __('Widget title Ru', 'bs_sonaris')),
			Field::make('text', 'crb_widgets_services_title_ro', __('Widget title Ro', 'bs_sonaris')),
			Field::make('text', 'crb_widgets_services_title_en', __('Widget title En', 'bs_sonaris')),
		))
		->add_tab(__('Widgets address', 'bs_sonaris'), array(
			Field::make('text', 'crb_widgets_address_en', __('Widget address En', 'bs_sonaris')),
			Field::make('text', 'crb_widgets_address_ru', __('Widget address Ru', 'bs_sonaris')),
			Field::make('text', 'crb_widgets_address_ro', __('Widget address Ro', 'bs_sonaris')),

		))
		->add_tab(__('Callback form', 'bs_sonaris'), array(
			Field::make('text', 'crb_callbackform_title_en', __('Callback form title En', 'bs_sonaris')),
			Field::make('text', 'crb_callbackform_subtitle_en', __('Callback form subtitle En', 'bs_sonaris')),

			Field::make('text', 'crb_callbackform_title_ro', __('Callback form title Ro', 'bs_sonaris')),
			Field::make('text', 'crb_callbackform_subtitle_ro', __('Callback form subtitle Ro', 'bs_sonaris')),

			Field::make('text', 'crb_callbackform_title_ru', __('Callback form title Ru', 'bs_sonaris')),
			Field::make('text', 'crb_callbackform_subtitle_ru', __('Callback form subtitle Ru', 'bs_sonaris')),
		))
		->add_tab(__('About text on main', 'bs_sonaris'), array(
			Field::make('textarea', 'crb_short_text_ru', __('About short text Ru', 'bs_sonaris')),
			Field::make('textarea', 'crb_short_text_ro', __('About short text Ro', 'bs_sonaris')),
			Field::make('textarea', 'crb_short_text_en', __('About short text En', 'bs_sonaris')),
		))
		->add_tab(__('Copyright', 'bs_sonaris'), array(
			Field::make('text', 'crb_copyright_en', __('Copyright En', 'bs_sonaris')),
			Field::make('text', 'crb_copyright_ro', __('Copyright Ro', 'bs_sonaris')),
			Field::make('text', 'crb_copyright_ru', __('Copyright Ru', 'bs_sonaris')),
		))
		->add_tab(__('Clients block', 'bs_sonaris'), array(
			Field::make('complex', 'crb_clients', __('Clients'))
				->add_fields(array(
					Field::make('text', 'crb_clients_text', __('Client name', 'bs_sonaris')),
				))
				->set_layout('tabbed-horizontal')
		))
		->add_tab('Header form', array(
			Field::make('text', 'crb_form_header_title_ro', 'crb_form_header_title_ro')
				->set_width(30),
			Field::make('text', 'crb_form_header_title_ru', 'crb_form_header_title_ru')
				->set_width(30),
			Field::make('text', 'crb_form_header_title_en', 'crb_form_header_title_en')
				->set_width(30),

			Field::make('textarea', 'crb_form_header_text_ro', 'crb_form_header_text_ro')
				->set_width(30),
			Field::make('textarea', 'crb_form_header_text_ru', 'crb_form_header_text_ru')
				->set_width(30),
			Field::make('textarea', 'crb_form_header_text_en', 'crb_form_header_text_en')
				->set_width(30),
		))
		->add_tab('Single portfolio form', array(
			Field::make('text', 'crb_single_portfolio_form_title_ro', 'crb_single_portfolio_form_title_ro')
				->set_width(30),
			Field::make('text', 'crb_single_portfolio_form_title_ru', 'crb_single_portfolio_form_title_ru')
				->set_width(30),
			Field::make('text', 'crb_single_portfolio_form_title_en', 'crb_single_portfolio_form_title_en')
				->set_width(30),

			Field::make('textarea', 'crb_single_portfolio_form_text_ro', 'crb_single_portfolio_form_text_ro')
				->set_width(30),
			Field::make('textarea', 'crb_single_portfolio_form_text_ru', 'crb_single_portfolio_form_text_ru')
				->set_width(30),
			Field::make('textarea', 'crb_single_portfolio_form_text_en', 'crb_single_portfolio_form_text_en')
				->set_width(30),
		));

	// Add second options page under 'Basic Options'
	Container::make('theme_options', 'Translates')
		->set_page_parent($basic_options_container) // reference to a top level container
		->add_tab('Titles', array(
			Field::make('text', 'crb_chishinau_ro', 'crb_chishinau_ro')
				->set_width(30),
			Field::make('text', 'crb_chishinau_ru', 'crb_chishinau_ru')
				->set_width(30),
			Field::make('text', 'crb_chishinau_en', 'crb_chishinau_en')
				->set_width(30),

			Field::make('text', 'crb_balti_ro', 'crb_balti_ro')
				->set_width(30),
			Field::make('text', 'crb_balti_ru', 'crb_balti_ru')
				->set_width(30),
			Field::make('text', 'crb_balti_en', 'crb_balti_en')
				->set_width(30),

			Field::make('text', 'crb_portfolio_single_gallery_title_ro', 'crb_portfolio_single_gallery_title_ro')
				->set_width(30),
			Field::make('text', 'crb_portfolio_single_gallery_title_ru', 'crb_portfolio_single_gallery_title_ru')
				->set_width(30),
			Field::make('text', 'crb_portfolio_single_gallery_title_en', 'crb_portfolio_single_gallery_title_en')
				->set_width(30),
		))
		->add_tab('Search', array(
			Field::make('text', 'crb_search_not_found_text_ro', 'crb_search_not_found_text_ro')
			     ->set_width(30),
			Field::make('text', 'crb_search_not_found_text_ru', 'crb_search_not_found_text_ru')
			     ->set_width(30),
			Field::make('text', 'crb_search_not_found_text_en', 'crb_search_not_found_text_en')
			     ->set_width(30),

			Field::make('text', 'crb_search_not_found_word_ro', 'crb_search_not_found_word_ro')
			     ->set_width(30),
			Field::make('text', 'crb_search_not_found_word_ru', 'crb_search_not_found_word_ru')
			     ->set_width(30),
			Field::make('text', 'crb_search_not_found_word_en', 'crb_search_not_found_word_en')
			     ->set_width(30),
		))
		->add_tab('Buttons', array(
			Field::make('text', 'crb_request_a_call_ro', 'crb_request_a_call_ro')
				->set_width(30),
			Field::make('text', 'crb_request_a_call_ru', 'crb_request_a_call_ru')
				->set_width(30),
			Field::make('text', 'crb_request_a_call_en', 'crb_request_a_call_en')
				->set_width(30),

			Field::make('text', 'crb_order_online_ro', 'crb_order_online_ro')
				->set_width(30),
			Field::make('text', 'crb_order_online_ru', 'crb_order_online_ru')
				->set_width(30),
			Field::make('text', 'crb_order_online_en', 'crb_order_online_en')
				->set_width(30),
		));

}

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
	require_once(__DIR__ . '/../../vendor/autoload.php');
	\Carbon_Fields\Carbon_Fields::boot();
}
