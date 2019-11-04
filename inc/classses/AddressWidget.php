<?php

if( ! defined('ABSPATH') ) exit;

// Класс виджета
class AddressWidget extends WP_Widget {
	function __construct() {
		// Запускаем родительский класс
		parent::__construct(
			'', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: my_widget
			'Address Widget',
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

		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		
		$address = carbon_get_theme_option('crb_widgets_address'.get_lang());
		
		$html = '<nav class="nav">
            <ul class="list contacts-list">
                <li class="list-item"><i class="fa fa-map-signs"></i><span>'.$address.'</span></li>
                <li class="list-item"><a class="list-item-link" href="tel:+37379798757"><i class="fa fa-phone"></i><span>+373 79 798 757</span></a></li>
                <li class="list-item"><a class="list-item-link" href="tel:+37322292404"><i class="fa fa-print"></i><span>+373 22 292 404</span></a></li>
                <li class="list-item"><a class="list-item-link" href="mailto:office@sonaris.md"><i class="fa fa-envelope"></i><span>office@sonaris.md</span></a></li>
            </ul>
            </nav>

            <nav class="nav">
            <ul class="list social-list">
                <li class="list-item"><a class="list-item-link facebook" href="https://www.facebook.com/Sonaris" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                <li class="list-item"><a class="list-item-link youtube" href="https://www.youtube.com/channel/UCSSy6lgPE5nKTYsZcEa_aPg" target="_blank"><i class="fa fa-youtube-square"></i></a></li>
                <li class="list-item"><a class="list-item-link twitter" href="https://twitter.com/SonarisMoldova" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
            </ul>
            </nav>';

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
add_action( 'widgets_init', 'register_address_widget' );
function register_address_widget() {
	register_widget( 'AddressWidget' );
}
