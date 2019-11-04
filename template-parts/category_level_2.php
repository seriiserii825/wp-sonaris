<section class="section">
    <h2 class="category-title"><?php echo single_cat_title(); ?></h2>
	<div class="print">
		<?php $category_id = get_queried_object()->term_id; ?>

		<?php $categories = get_categories([
			'taxonomy' => 'category',
			'type' => 'post',
			'child_of' => 0,
			'parent' => $category_id,
			'orderby' => 'name',
			'order' => 'ASC',
			'hide_empty' => 0,
			'hierarchical' => 1,
			'exclude' => '',
			'include' => '',
			'number' => 0,
			'pad_counts' => false,
		]); ?>

		<?php $i = 1; ?>
		<?php foreach ($categories as $item): ?>
			<?php $term_id = $item->term_id; ?>
			<?php $category_link = get_category_link($term_id); ?>
			<div class="print__item <?php if ($i % 2 === 0) {
				echo 'dark reverse';
			} ?>">
				<div class="container">
					<div class="print__content">
						<div class="print__image">
							<?php $image_id = carbon_get_term_meta($term_id, 'crb_category_image'); ?>
							<?php echo kama_thumb_img('w=350 &h=250', $image_id); ?>
						</div>
						<div class="print__text">
							<h2><?php echo $item->cat_name; ?></h2>
							<div class="print__inner-text"><?php echo apply_filters( 'the_content', carbon_get_term_meta($term_id, 'crb_category_text'.get_lang() ) ); ?></div>
							<a href="<?php echo $category_link; ?>" class="btn btn-danger btn-rounded waves-effect">
								<span><?php echo __('Read more', 'bs_sonaris') ?></span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php $i++; endforeach; ?>

		<!--		--><?php //if ( have_posts() ): ?>
		<!--			--><?php //$i = 1;
		//			while ( have_posts() ): ?>
		<!--				--><?php //the_post(); ?>
		<!--                <div class="print__item --><?php //if ( $i % 2 === 0 ) {
		//					echo 'dark reverse';
		//				} ?><!--">-->
		<!--                    <div class="container">-->
		<!--                        <div class="print__content">-->
		<!--                            <div class="print__image">-->
		<!--								--><?php //echo kama_thumb_img( 'w=350 &h=250' ); ?>
		<!--                            </div>-->
		<!--                            <div class="print__text">-->
		<!--                                <h2>--><?php //the_title(); ?><!--</h2>-->
		<!--		                        --><?php //the_content(); ?>
		<!--                                <a href="-->
		<?php //the_permalink(); ?><!--" class="btn btn-danger btn-rounded waves-effect">-->
		<!--                                    <span>--><?php //echo __('Read more', 'bs_sonaris') ?><!--</span>-->
		<!--                                </a>-->
		<!--                            </div>-->
		<!--                        </div>-->
		<!--                    </div>-->
		<!--                </div>-->

		<!--				--><?php //$i ++; endwhile; ?>
		<!--                <div class="container">-->
		<!--                    --><?php //the_posts_pagination([
		//                        'show_all'     => true, // показаны все страницы участвующие в пагинации
		//                        'end_size'     => 1,     // количество страниц на концах
		//                        'mid_size'     => 1,     // количество страниц вокруг текущей
		//                        'prev_next'    => false,  // выводить ли боковые ссылки "предыдущая/следующая страница".
		//                        'prev_text'    => __('« Previous'),
		//                        'next_text'    => __('Next »'),
		//                        'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
		//                        'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
		//                        'screen_reader_text' => __( '' ),
		//                    ]); ?>
		<!--                </div>-->
		<!--		--><?php //else: ?>
		<!--		--><?php //endif; ?>

	</div>
</section>
