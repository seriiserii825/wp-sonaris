<?php
/**
 * Template Name: Portfolio
 */
get_header();
?>

<?php get_template_part('template-parts/services'); ?>

    <section class="section">
        <div class="container">

            <header class="page-header">
                <h1 class="header-title"><?php echo __('Portfolio', 'bs_sonaris'); ?></h1>
            </header><!-- .page-header -->
			<?php $portfolio_posts = new WP_Query([
				'cat' => 19,
				'empty' => 'true',
				'posts_per_page' => -1
			]); ?>

            <div class="section section-portfolio">
                <div class="portfolio">
                    <?php $flag = [];
                    if ( $portfolio_posts->have_posts() ) :
	                    $n = 0;
	                    while ( $portfolio_posts->have_posts() ) : $portfolio_posts->the_post();
		                    $year = get_the_date( 'm' );

		                    if ( ! in_array( $year, $flag ) ) {
			                    $flag[] = $year;

			                    # закрытие portfolio-block
			                    # если выводится первый блок - закрывать предыдущий  не надо
			                    # если не первый то - закрываем
			                    if ( $n !== 0 ) {
				                    echo '</div>';
			                    }?>

			                    <?php if (get_lang() == '_ro'): ?>
                                    <h2 class="portfolio__title"><?php echo strtoupper(get_the_date('F, Y')[0]) . substr(get_the_date('F, Y'), 1); ?></h2>
			                    <?php else: ?>
                                    <h2 class="portfolio__title"><?php echo get_the_date('F, Y'); ?></h2>
			                    <?php endif; ?>

			                   <?php # открыть portfolio-block
			                    echo '<div class="portfolio-block">';
		                    }?>

		                    <?php
		                    $portfolio_ids = carbon_get_theme_option('crb_portfolio_gallery');
		                    $thumb_url = kama_thumb_src('w=300 &h=300');
		                    ?>

                            <a class="portfolio-item waves-effect" href="<?php the_permalink(); ?>">
                                <img class="portfolio-item-img" src="<?php echo $thumb_url; ?>" alt=""/>
                                <!--	<span class="btn btn-white btn-rounded">-->
			                    <?php //the_title(); ?><!--</span>-->
                                <span class="portfolio-item__title"><?php the_title(); ?></span>
                            </a>

		                    <?php $n ++;
	                    endwhile;
	                    # закрыть последний portfolio-block
	                    echo '</div>';
                    else :
                    endif; ?>

                </div>
            </div>
    </section>
<?php
get_footer();
