<?php
	
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	
	add_filter( 'acf/location/rule_types', 'acf_location_rules_types', 999 );
	function acf_location_rules_types( $choices ) {
		$key = __('Forms', 'acf');
		
		if ( ! isset( $choices[ $key ] ) ) {
			$choices[ $key ] = [];
		}
		
		$choices[ $key ]['category_id'] = __( 'Category' );
		
		return $choices;
	}
	
	add_filter( 'acf/location/rule_values/category_id', 'acf_location_rules_values_category' );
	function acf_location_rules_values_category( $choices ) {
		$terms = get_terms( 'category', [ 'hide_empty' => false ] );
		
		if ( $terms && is_array( $terms ) ) {
			foreach ( $terms as $term ) {
				$choices[ $term->term_id ] = $term->name;
			}
		}
		
		return $choices;
	}
	
	
	add_filter( 'acf/location/rule_match/category_id', 'acf_location_rules_match_category', 10, 3 );
	function acf_location_rules_match_category( $match, $rule, $options ) {
		$screen = get_current_screen();
		
		if ( $screen->base !== 'term' || $screen->id !== 'edit-category' ) {
			return $match;
		}
		
		$term_id       = $_GET['tag_ID'];
		$selected_term = $rule['value'];
		
		if ( $rule['operator'] == '==' ) {
			$match = ( $selected_term == $term_id );
		} elseif ( $rule['operator'] == '!=' ) {
			$match = ( $selected_term != $term_id );
		}
		
		return $match;
	}
