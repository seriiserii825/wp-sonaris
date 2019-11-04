<?php

if( ! defined('ABSPATH') ) exit;

// Класс виджета
class ServicesWidget extends WP_Widget {
	function __construct() {
		// Запускаем родительский класс
		parent::__construct(
			'', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: my_widget
			'Services Widget',
			array('description' => 'Widget for contact address')
		);

		// стили скрипты виджета, только если он активен
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action('wp_enqueue_scripts', array( $this, 'add_my_widget_scripts' ));
			add_action('wp_head', array( $this, 'add_my_widget_style' ) );
		}
	}

	// Вывод виджета
	function widget($args, $instance ) {
		$args['before_widget'] = '<div class="col md-3 sm-6"><div class="footer-services">';
		$args['after_widget'] = '</div></div>';

        $title = carbon_get_theme_option('crb_widgets_services_title'.get_lang());

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}


		$id = 19;

		$categories = get_categories([
			'taxonomy'     => 'category',
			'type'         => 'post',
			'child_of'     => 0,
			'parent'       => $id,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 0,
			'hierarchical' => 1,
			'exclude'      => '',
			'include'      => '',
			'number'       => 0,
			'pad_counts'   => false,
		]);

		$html = '<nav class="nav topbar-nav"><ul class="list services-list">';

		foreach($categories as $category) {
			$html .= '<li class="list-item"><a class="list-item-link" href="'.get_category_link($category->term_id).'">'.$category->name.'</a></li>';
		}

		$html .= '</ul></nav>';

		echo $html;

		echo $args['after_widget'];
	}

	// Сохранение настроек виджета (очистка)
	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? ( $new_instance['title'] ) : '';
		return $instance;
	}

	// html форма настроек виджета в Админ-панели
	function form( $instance ) {
		$title = @ $instance['title'] ?: 'Default title';
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	// скрипт виджета
	function add_my_widget_scripts() {
		// фильтр чтобы можно было отключить скрипты
		if( ! apply_filters( 'show_my_widget_script', true, $this->id_base ) )
			return;
	}

	// стили виджета
	function add_my_widget_style() {
	}
}

// Регистрация класса виджета
add_action( 'widgets_init', 'register_contact_widget' );
function register_contact_widget() {
	register_widget( 'ServicesWidget' );
}
