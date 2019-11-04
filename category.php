<?php get_header(); ?>

<?php $category = get_queried_object(); ?>
<?php $category_id = get_queried_object()->term_id; ?>

<?php get_template_part('template-parts/services'); ?>


<?php if (is_category([49, 37, 29, 45, 59, 35])): ?>
	<?php require_once __DIR__ . '/template-parts/category_level_2.php'; ?>
<?php else: ?>
    <section class="section section-single">
        <div class="print">
            <div class="print__item">
                <div class="container">
                    <div class="print__content">
                        <div class="print__text">
                            <h2><?php echo get_the_category_by_ID($category_id); ?></h2>
                            <p><?php echo apply_filters('the_content', carbon_get_term_meta($category_id, 'crb_category_text' . get_lang())); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
			<?php $portfolio_post = new WP_Query([
				'cat' => $category_id,
				'posts_per_page' => -1
			]); ?>

            <div class="relative-portfolio-gallery" id="relative-portfolio-gallery">
	            <?php if ($portfolio_post->have_posts()): ?>
		            <?php while ($portfolio_post->have_posts()): ?>
			            <?php $portfolio_post->the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="relative-portfolio-gallery__item">
                            <div class="relative-portfolio-gallery__text">
                                <h4 class="relative-portfolio-gallery__title"><?php the_title(); ?></h4>
                            </div>
				            <?php echo kama_thumb_img('w=200 &h=200'); ?>
                        </a>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
            </div>

<!--            <div class="relative-portfolio-gallery" id="relative-portfolio-gallery">-->
<!--		        --><?php //if ($portfolio_gallery->have_posts()): ?>
<!--			        --><?php //while ($portfolio_gallery->have_posts()): ?>
<!--				        --><?php //$portfolio_gallery->the_post(); ?>
<!--                        <a href="--><?php //the_permalink(); ?><!--" class="relative-portfolio-gallery__item">-->
<!--                            <div class="relative-portfolio-gallery__text">-->
<!--                                <h4 class="relative-portfolio-gallery__title">--><?php //the_title(); ?><!--</h4>-->
<!--                            </div>-->
<!--					        --><?php //echo kama_thumb_img('w=200 &h=200'); ?>
<!--                        </a>-->
<!--			        --><?php //endwhile; ?>
<!--			        --><?php //wp_reset_postdata(); ?>
<!--		        --><?php //endif; ?>
<!--            </div>-->
        </div>
    </section>
<?php endif; ?>


<?php get_footer(); ?>
