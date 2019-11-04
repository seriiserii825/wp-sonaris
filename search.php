<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package bs_sonaris
 */

get_header();
?>

<?php get_template_part( 'template-parts/services' ); ?>

    <div class="container">
        <div class="search-content">
            <p><?php echo carbon_get_theme_option( 'crb_search_not_found_text' . get_lang() ); ?> <a
                        href="<?php echo home_url(); ?>"><?php echo carbon_get_theme_option( 'crb_search_not_found_word' . get_lang() ); ?></a>
            </p>
        </div>
    </div>

<?php
get_footer();
