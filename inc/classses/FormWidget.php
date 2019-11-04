<?php

if( ! defined('ABSPATH') ) exit;

// Класс виджета
class FormWidget extends WP_Widget {
	function __construct() {
		// Запускаем родительский класс
		parent::__construct(
			'', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: my_widget
			'Contact address widget',
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
		$args['before_widget'] = '<div class="col-md-3"><div class="get-touch">';
		$args['after_widget'] = '</div></div>';

		$title = apply_filters( 'widget_title', $instance['title'] );
		$text = $instance['text'];

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}


		$phone = carbon_get_theme_option('crb_phone');
		$phone_clear = str_replace(['(',')','-','+', ' '], '', $phone);
		$email = carbon_get_theme_option('crb_email');
		$address = carbon_get_theme_option('crb_address');
		$html = '';

		$html .= '<div class="detail">';


		$html .= '<div class="get-touch">
			<span class="text">'.$text.'</span>
			<ul>
				<li><i class="fas fa-map-marker-alt"></i> <span>'.$address.'</span>
				</li>
				<li><i class="fas fa-phone"></i></i>
					<a href="tel:'.$phone_clear.'"><span>'
						.$phone.
					'</span></a>
				</li>
				<li>
					<i class="fas fa-envelope-open-text"></i>
					<a href="mailto:'.$email.'">
						<span>'.$email.'</span>
					</a>
				</li>
			</ul>
		</div>';

		$html .= '</div>';

		echo $html;

		echo $args['after_widget'];
	}

	// Сохранение настроек виджета (очистка)
	function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? ( $new_instance['title'] ) : '';
		$instance['text'] = ( !empty( $new_instance['text'] ) ) ? ( $new_instance['text'] ) : '';

		return $instance;
	}

	// html форма настроек виджета в Админ-панели
	function form( $instance ) {
		$title = @ $instance['title'] ?: 'Default title';
		$text = @ $instance['text'] ? : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'text:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>">
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
	register_widget( 'FormWidget' );
}
