<?php get_header(); ?>

<div class="owl-carousel fullscreen">
	<?php
	$slider_posts = new WP_Query([
		'post_type' => 'slider',
		'posts_per_page' => -1
	]);
	?>

	<?php if ($slider_posts->have_posts()): ?>
		<?php while ($slider_posts->have_posts()): ?>
			<?php $slider_posts->the_post(); ?>
			<?php $image_url = kama_thumb_src('w=1600 &h=400'); ?>
            <div class="owl-carosel__item">
                <div class="owl-carosel__link">
                    <img src="<?php echo $image_url; ?>" alt="">
                    <div class="owl-carousel__caption">
                        <div class="container">
                            <span><?php the_title() ?></span>
                        </div>
                    </div>
                </div>
            </div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

</div>

<?php get_template_part('template-parts/services'); ?>

<!-- Content -->
<div class="section section-intro">
    <div class="container">
        <div class="row">
            <div class="col md-6">
                <a class="waves-effect" href="">
					<?php
					$logo_big_id = carbon_get_theme_option('crb_logo_big');
					$img_url = wp_get_attachment_url($logo_big_id, 'full');
					?>
                    <img class="section-intro-img" src="<?php echo $img_url; ?>" alt=""/>
                </a>
            </div>
            <div class="col md-6">
				<?php
				$id = 20;

				$about_content = new WP_Query([
					'post_type' => 'page',
					'page_id' => $id
				]);
				?>

				<?php if ($about_content->have_posts()) : ?>
					<?php $about_content->the_post(); ?>
                    <h2 class="section-intro-title"><?php the_title(); ?></h2>
                    <p class="section-intro-text">
						<?php
						echo carbon_get_theme_option('crb_short_text' . get_lang());
						?>
                    </p>
                    <a class="btn btn-success btn-lg btn-rounded waves-effect"
                       href="<?php the_permalink(); ?>"><?php echo __('Read more', 'bs_sonaris') ?></a>
				<?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="section section-skills">
    <div class="container">
        <div class="section-skills-list">
            <div class="row">
				<?php
				$skills_collections = carbon_get_theme_option('crb_rating' . carbon_lang());
				?>

				<?php foreach ($skills_collections as $item): ?>
                    <div class="col xs-6 sm-3">
                        <div class="skill">
                            <svg class="skill-icon">
                                <use xlink:href="#<?php echo $item['crb_rating_icon']; ?>"></use>
                            </svg>
                            <span class="skill-number"><?php echo $item['crb_rating_count']; ?></span>
                            <span class="skill-text"><?php echo $item['crb_rating_text' . get_lang()]; ?></span>
                        </div>

                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<div class="portfolio-section">
    <h2 class="section__title">Portfolio</h2>
	<?php
	$portfolio_section = new WP_Query([
		'cat' => 19,
		'posts_per_page' => 10
	]);
	?>
    <div class="container">
        <div class="portfolio-section__content">
			<?php if ($portfolio_section->have_posts()): ?>
				<?php while ($portfolio_section->have_posts()): ?>
					<?php $portfolio_section->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="portfolio-section__item">
						<?php echo kama_thumb_img('w=240 &h=200'); ?>
                        <div class="portfolio-section__text">
                            <h4 class="portfolio-section__title"><?php the_title(); ?></h4>
                        </div>
                    </a>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
