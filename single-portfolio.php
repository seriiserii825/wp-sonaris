<?php get_header(); ?>

<?php get_template_part('template-parts/services'); ?>

<div class="breadcrumbs">
    <div class="container">
        <nav class="nav breadcrumbs-nav">
            <ul class="list">
                <div class="list-item">
                    <a class="list-item-link"
                       href="<?php echo home_url(); ?>"><?php echo __('Main Page', 'bs_sonaris') ?></a>
                </div>
				<?php
				$post_type = get_post_type();
				?>
                <div class="list-item"><a
                            href="<?php echo get_post_type_archive_link('portfolio'); ?>"><?php echo $post_type; ?></a>
                </div>
                <div class="list-item"><span class="list-item-current"><?php single_post_title(); ?></span></div>
            </ul>
        </nav>
    </div>
</div>
<?php if (have_posts()) : ?>
	<?php the_post(); ?>
    <article class="potfolio-article">
        <div class="container">
            <header class="potfolio-article-header">
                <h1 class="header-title"><?php single_post_title(); ?></h1>
                <div class="header-meta"><span
                            class="header-meta-published"><?php echo __('Publish', 'bs_sonaris') ?>: <span><?php echo get_the_date('d F Y'); ?></span></span><span
                            class="header-meta-category"><?php echo __('in', 'bs_sonaris') ?> <a
                                href="<?php echo get_post_type_archive_link('portfolio'); ?>"><?php echo $post_type; ?></a></span>
                </div>
            </header>
            <main class="potfolio-article-content">
                <div class="row">
                    <div class="col md-4">

						<?php
						$thumb_url = kama_thumb_src('w=375 &h=375');
						?>
                        <div class="potfolio-article-image"><img src="<?php echo $thumb_url; ?>" alt=""/></div>
                    </div>
                    <div class="col md-8 offset-sm-1">
                        <div class="potfolio-article-text">
                            <div class="potfolio-article-text-content">
								<?php the_content(); ?>
                            </div>

                            <div class="gallery" id="js-gallery">
								<?php $images = carbon_get_post_meta(get_the_ID(), 'crb_portfolio_gallery'); ?>

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
		<?php require_once __DIR__ . '/template-parts/content-portolio-block.php'; ?>
    </div>

<?php endif; ?>



<?php get_footer(); ?>
