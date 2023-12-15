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
        max-width: 1100px; /* Set a maximum width for the content */
        width: 70%; /* Adjust the width as needed */
        float: left; /* Float the primary content to the left */
        margin-right: 5%; /* Add some margin between primary and sidebar */
    }

    #secondary {
        width: 25%; /* Adjust the width as needed */
        float: right; /* Float the secondary content (sidebar) to the right */
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

    .post-thumbnail img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}


    .flex-container {
        display: flex;
        justify-content: space-between;
    }

    @media (max-width: 768px)  {
       #secondary{
        display: none;
       }


    }
</style>

<div class="flex-container">
    <main id="primary" class="site-main">
        <?php
        while (have_posts()) :
            the_post();

            if (!is_single()) {
                // Check if it's not a single post page
                // Display the post thumbnail at a specific size
                the_post_thumbnail('your-image-size'); // Change 'your-image-size' to your desired image size
            }

            get_template_part('template-parts/content', get_post_type());
            ?>
            <div class="navigation-container">
                <?php
                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'multimedijalnisistemi') . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'multimedijalnisistemi') . '</span> <span class="nav-title">%title</span>',
                    )
                );
                ?>
            </div>
            <?php
            echo '<div class="comments">';
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            echo '</div>';
        endwhile; // End of the loop.
        ?>

        <br>
        <br>
        <br>
    </main><!-- #main -->

    <?php get_sidebar(); ?>

</div>

<br>
<br>

<?php
get_footer();
?>
