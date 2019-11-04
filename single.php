<?php get_header(); ?>

<?php get_template_part('template-parts/services'); ?>

<?php if (have_posts()) : ?>
	<?php the_post(); ?>

	<?php
	$category = get_the_category();
	$cat_id = $category[0]->term_id;
	$cat_name = $category[0]->cat_name;
	$cat_parrent_id = $category[0]->parent;
	$cat_parrent_link = get_category_link($cat_parrent_id);
	$cat_parrent_name = get_category($cat_parrent_id)->name;
	?>

    <div class="breadcrumbs">
        <div class="container">
            <nav class="nav breadcrumbs-nav">
                <ul class="list">
                    <div class="list-item">
                        <a class="list-item-link"
                           href="<?php echo $cat_parrent_link; ?>"><?php echo $cat_parrent_name; ?></a>
                    </div>
                    <div class="list-item">
                        <a href="<?php echo get_category_link($cat_id); ?>"><?php echo $cat_name; ?></a>
                    </div>
                    <div class="list-item"><span class="list-item-current"><?php the_title(); ?></span></div>
                </ul>
            </nav>
        </div>
    </div>
    <article class="potfolio-article">
        <div class="container">
            <header class="potfolio-article-header">
                <h1 class="header-title"><?php the_title(); ?></h1>
                <div class="header-meta">
                    <span class="header-meta-published">
                        <?php echo __('Publish', 'bs_sonaris') ?>: <span><?php echo get_the_date('d F Y'); ?></span>
                    </span>
                </div>
            </header>
            <main class="potfolio-article-content">
                <div class="row">
                    <div class="col md-4">

						<?php
						$thumb_url = kama_thumb_src('w=380 &h=380');
						?>
                        <div class="potfolio-article-image"><img src="<?php echo $thumb_url; ?>" alt=""/></div>
                    </div>
                    <div class="col md-8 offset-sm-1">
                        <div class="potfolio-article-text">
                            <div class="potfolio-article-text-content">
								<?php the_content(); ?>
                            </div>

                            <div class="gallery" id="js-gallery">
								<?php $images = carbon_get_the_post_meta('crb_media_gallery_for_single'); ?>

								<?php foreach ($images as $image): ?>
                                    <div class="gallery__item">
                                        <a href="<?php echo kama_thumb_src('w=550 &h=550', $image); ?>">
											<?php echo kama_thumb_img('w=150 &h=150', $image); ?>
                                        </a>
                                    </div>
								<?php endforeach; ?>
                            </div>

                            <button id="js-show-single-portfolio-popup"
                                    class="btn btn-lg btn-danger btn-rounded waves-effect"><?php echo carbon_get_theme_option('crb_order_online' . get_lang()); ?></button>
                            </p>

                            <div class="popup-small" id="js-single-portfolio-form">
                                <div class="form-header__close">
                                    <img src="<?php echo get_template_directory_uri() . '/assets/img/close.svg'; ?>"
                                         alt="">
                                </div>
                                <h3 class="popup-small-header"><?php echo carbon_get_theme_option('crb_single_portfolio_form_title' . get_lang()); ?></h3>
                                <p><?php echo carbon_get_theme_option('crb_single_portfolio_form_text' . get_lang()); ?></p>
								<?php if (get_lang() == '_ro'): ?>
									<?php echo do_shortcode('[contact-form-7 id="348" title="Single portfolio rom"]'); ?>
								<?php elseif (get_lang() == '_ru'): ?>
									<?php echo do_shortcode('[contact-form-7 id="349" title="Single portfolio form rus"]'); ?>
								<?php else: ?>
									<?php echo do_shortcode('[contact-form-7 id="347" title="Single portfolio form eng"]'); ?>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </article>

    <div class="container">
		<?php foreach ($category as $category_item): ?>
			<?php $portfolio_gallery = new WP_Query([
				'cat' => $category_item->term_id,
				'posts_per_page' => 6,
				'post__not_in' => [get_the_ID()]
			]);
			?>
			<?php if ($portfolio_gallery->have_posts()): ?>
                <div class="section section-portfolio">
                    <h2 class="section-portfolio-title"><?php echo carbon_get_theme_option('crb_portfolio_single_gallery_title' . get_lang()); ?></h2>

                    <div class="relative-portfolio-gallery" id="relative-portfolio-gallery">
						<?php while ($portfolio_gallery->have_posts()): ?>
							<?php $portfolio_gallery->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="relative-portfolio-gallery__item">
                                <div class="relative-portfolio-gallery__text">
                                    <h4 class="relative-portfolio-gallery__title"><?php the_title(); ?></h4>
                                </div>
								<?php echo kama_thumb_img('w=200 &h=200'); ?>
                            </a>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
                    </div>
                </div>
			<?php endif; ?>

		<?php endforeach; ?>
    </div>

<?php endif; ?>



<?php get_footer(); ?>
