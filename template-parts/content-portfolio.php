<?php
	$portfolio_ids = carbon_get_theme_option('crb_portfolio_gallery');
	$thumb_url = kama_thumb_src('w=300 &h=300');
?>

<a class="portfolio-item waves-effect" href="<?php the_permalink(); ?>">
	<img class="portfolio-item-img" src="<?php echo $thumb_url; ?>" alt=""/>
<!--	<span class="btn btn-white btn-rounded">--><?php //the_title(); ?><!--</span>-->
    <span class="portfolio-item__title"><?php the_title(); ?></span>
</a>
