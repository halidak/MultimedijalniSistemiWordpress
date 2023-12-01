<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mms
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/custom-styles.css'; ?>">

<aside id="secondary" class="widget-area2">
    <!-- Add a search form -->
    <div class="widget widget_search">
        <?php get_search_form(); ?>
    </div>
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
    
</aside><!-- #secondary -->
