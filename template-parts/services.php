<?php $category = get_queried_object(); ?>
<?php $category_id = get_queried_object()->term_id; ?>

<?php
$cat_parrent_id = '';

if(is_category([49, 37, 29, 45, 59, 35])){
	$cat_parrent_id = get_category($category_id)->term_id;
}elseif(is_category()){
	$cat_parrent_id = get_category($category_id)->parent;
}elseif(is_single()){
	$post_id = get_the_ID();
	$cat_parrent_id = get_the_terms($post_id, 'category')[0]->parent;
}
?>

<div class="section section-services">
	<div class="services-navbar">
		<div class="container">
			<nav class="nav services-nav">
				<ul class="list">
                    <?php
                        $categories = get_categories([
	                        'taxonomy'     => 'category',
	                        'type'         => 'post',
	                        'child_of'     => 0,
	                        'parent'       => 19,
	                        'orderby'      => 'name',
	                        'order'        => 'ASC',
	                        'hide_empty'   => 0,
	                        'hierarchical' => 1,
	                        'exclude'      => '',
	                        'include'      => '',
	                        'number'       => 0,
	                        'pad_counts'   => false,
                        ]);
                    ?>
                    
					<?php $i = 1; foreach($categories as $category): ?>
						<?php
							$svg_icon =  carbon_get_term_meta($category->term_id, 'crb_print_categories_image');
							$active_menu_item = '';

//							vardump($category->term_id);
//                            vardump($cat_parrent_id);

                            if($category->term_id === $cat_parrent_id){
							    $active_menu_item = 'active';
                            }
						?>
						<li class="list-item <?php echo $active_menu_item; ?>">
							<a class="list-item-link waves-effect" href="<?php echo get_category_link($category->term_id) ?>" data-color="<?php echo $i; ?>">
								<svg class="services-icon">
									<use xlink:href="#<?php echo $svg_icon; ?>_icon"></use>
								</svg>
								<span class="services-title"><?php echo $category->name; ?></span>
							</a>
						</li>
					<?php $i++; endforeach; ?>
				</ul>
			</nav>
		</div>
	</div>
</div>
