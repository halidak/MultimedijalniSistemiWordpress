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
<style>

.widget-area {
    background-color: #f4f4f4;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.widget {
    margin-bottom: 20px;
}

.widget_search input[type="search"] {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.widget_search button {
    background-color: #333;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.widget_search button:hover {
    background-color: #555;
}

</style>
<aside id="secondary" class="widget-area">
    <!-- Add a search form -->
    <div class="widget widget_search">
        <?php get_search_form(); ?>
    </div>
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
    
</aside><!-- #secondary -->
