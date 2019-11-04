<?php
/*
 * Template Name: Contacts
 */
?>

<?php get_header(); ?>

<?php get_template_part('template-parts/services'); ?>

<div class="section">
	<div class="container">
		<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>

