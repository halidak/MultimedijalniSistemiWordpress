<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mms
 */

get_header();
?>
<style>
    body {
    text-align: center;
}

#primary {
    display: inline-block;
    text-align: left;
    max-width: 1200px; /* Set a maximum width for the content */
    width: 100%;
    margin: 0 auto; /* Center the content */
}

article {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.entry-title {
    color: #333;
    font-size: 2em;
    margin-bottom: 10px;
    text-align: center;
}

.entry-meta {
    margin-bottom: 15px;
    text-align: center;
}

.entry-content {
    line-height: 1.6;
}

.post-thumbnail {
    margin-bottom: 15px;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.post-thumbnail img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.comments {
    border: 1px solid #ddd;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    margin-top: 20px;
}

.post-navigation {
    margin-top: 20px;
}

.nav-subtitle,
.nav-title {
    display: block;
    font-size: 1.2em;
    margin-bottom: 5px;
}
</style>


<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();

        // Display the post thumbnail at a specific size
        

        get_template_part('template-parts/content', get_post_type());

        the_post_navigation(
            array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'multimedijalnisistemi') . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'multimedijalnisistemi') . '</span> <span class="nav-title">%title</span>',
            )
        );
        echo '<div class="comments">';
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
        echo '</div>';
    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>
