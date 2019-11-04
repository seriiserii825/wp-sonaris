<div class="section section-portfolio">
	<h2 class="section-portfolio-title"><?php echo __('Portfolio', 'bs_sonaris') ?></h2>
	<div class="portfolio">
		<?php
			$portfolio_posts = new WP_Query([
				'post_type' => 'portfolio',
				'posts_per_page' => 10
			]);

		?>

		<?php if ( $portfolio_posts->have_posts() ) :?>
		<?php while ( $portfolio_posts->have_posts() ) :?>
			<?php $portfolio_posts->the_post(); ?>
			<?php
				$thumb_url = kama_thumb_src('w=300 &h=300');
			?>

			<a class="portfolio-item waves-effect" href="<?php the_permalink(); ?>">
				<img class="portfolio-item-img" src="<?php echo $thumb_url; ?>" alt=""/>
				<span class="btn btn-white btn-rounded"><?php echo __('More', 'bs_sonaris'); ?></span>
			</a>
		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	</div>
	<a class="btn btn-primary btn-lg btn-rounded waves-effect" href="<?php echo get_post_type_archive_link('portfolio'); ?>"><?php echo __('More works', 'bs_sonaris') ?></a>

</div>
