<?php
$portfolio_gallery = new WP_Query([
	'post_type' => 'portfolio',
	'posts_per_page' => -1,
	'model' => $term[0]->slug,
	'post__not_in' => [$post->ID]
]);
?>

<?php if($portfolio_gallery->have_posts()): ?>

<div class="section section-portfolio">
    <h2 class="section-portfolio-title"><?php echo carbon_get_theme_option('crb_portfolio_single_gallery_title'.get_lang()); ?></h2>


    <div class="relative-portfolio-gallery" id="relative-portfolio-gallery">

        	<?php while($portfolio_gallery->have_posts()): ?>
        		<?php $portfolio_gallery->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="relative-portfolio-gallery__item">
                    <div class="relative-portfolio-gallery__text">
                        <h4 class="relative-portfolio-gallery__title"><?php the_title(); ?></h4>
                    </div>
	                <?php echo kama_thumb_img( 'w=200 &h=200' ); ?>
                </a>
        	<?php endwhile; ?>
        	<?php wp_reset_postdata(); ?>
    </div>
</div>
<?php endif; ?>
