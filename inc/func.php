<?php

function clear_phone($phone){
	return str_replace(['(',')','-','+', ' '], '', $phone);
}

function vardump($var) {
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}

function carbon_lang() {
	$suffix = '';
	if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
		return $suffix;
	}
	$suffix = '_' . ICL_LANGUAGE_CODE;
	return $suffix;
}

function trim_content($content, $count){
	$trimmed_content = wp_trim_words( $content, $count, '<a href="'. get_permalink() .'"></a>' );
	return $trimmed_content;
}

function get_lang(){
	$suffix = '';

	if(get_locale() == 'en_US'){
		$suffix = '_en';
	}
	if(get_locale() == 'ru_RU'){
		$suffix = '_ru';
	}
	if(get_locale() == 'ro_RO'){
		$suffix = '_ro';
	}

	return $suffix;
}

function my_revisions_to_keep( $revisions ) {
	return 2;
}
add_filter( 'wp_revisions_to_keep', 'my_revisions_to_keep' );

function modify_main_query( $query )
{
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if ( is_post_type_archive( 'portfolio' ) ) {
        // Display 10 posts for a custom post type called 'portfolio'
        $query->set( 'posts_per_page', 10 );
        return;
    }
}
add_action( 'pre_get_posts', 'modify_main_query' );

/* Функция вывода постов по месяцу.
 ----------
 * Параметры:
 * $show_comment_count(0) - показывать ли колличество комментариев. 1 - показывать.
 * $before ('<h4>') - HTML тег до заголовка (названия месяца).
 * $after ('</h4>') - HTML тег после заголовка.
 * $year (0) - огриничить вывод годом. Если указать 2009, будут выведены записи за 2009 год по месяцам
 * $post_type ('post') - тип поста. Если нужно вывести нестандартный тип постов (отличный от post)
 * $limit(100) - ограничение количества выводиммых постов для каждого месяца. При большой базе, создается сильная нагрузка. Укажите 0 если нужно снять ограничение
 ----------
 Пример вызова: <php echo get_blix_archive(1, '<h4>', '</h4>'); ?>
*/
function get_blix_archive( $show_comment_count=0, $before='<h4>', $after='</h4>', $year=0, $post_type='post', $limit=100 ){

	global $month, $wpdb;
	$result = '';

	$AND_year = $year ? $wpdb->prepare(" AND YEAR(post_date) = %s", $year) : '';
	$LIMIT    = $limit ? $wpdb->prepare(" LIMIT %d", $limit) : '';

	$arcresults = $wpdb->get_results("SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, count(ID) as posts FROM " . $wpdb->posts . " WHERE post_type='$post_type' $AND_year AND post_status='publish' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC");

	if( $arcresults ){
		foreach( $arcresults as $arcresult ){
			$url  = get_month_link( $arcresult->year, $arcresult->month );
			$text = sprintf('%s %d', $month[zeroise($arcresult->month,2)], $arcresult->year);
			$result .= get_archives_link($url, $text, '', $before, $after);

			$thismonth = zeroise( $arcresult->month, 2 );
			$thisyear = $arcresult->year;

			$arcresults2 = $wpdb->get_results("SELECT ID, post_date, post_title, comment_status, guid, comment_count FROM " . $wpdb->posts . " WHERE post_date LIKE '$thisyear-$thismonth-%' AND post_status='publish' AND post_type='$post_type' AND post_password='' ORDER BY post_date DESC $LIMIT");

			if( $arcresults2 ){
				$result .= "<ul class=\"postspermonth\">\n";
				foreach( $arcresults2 as $arcresult2 ){
					if( $arcresult2->post_date != '0000-00-00 00:00:00' ){
						$url       =  get_permalink($arcresult2->ID); //$arcresult2->guid;
						$arc_title = $arcresult2->post_title;

						if( $arc_title ) $text = strip_tags($arc_title);
						else $text = $arcresult2->ID;

						$result .= "<li>". get_archives_link($url, $text, '');
						if( $show_comment_count ){
							$cc = $arcresult2->comment_count;
							if( $arcresult2->comment_status == "open" OR $comments_count > 0) $result .= " ($cc)";
						}
						$result .= "</li>\n";
					}
				}
				$result .= "</ul>\n";
			}
		}
	}

	return $result;
}
