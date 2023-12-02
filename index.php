<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mms
 */

get_header();
?>
<style>
     .flex-container {
        display: flex;
        justify-content: space-between;
    }

    #primary {
        width: 70%; /* Adjust the width as needed */
    }

    #secondary {
        width: 25%; /* Adjust the width as needed */
    }
    .page-header img {
        width: 100%;
        height: auto;
        
    }

    .article-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
		padding:  0 40px
    }
	.naslov{
		text-align: center;
	}
	.entry-header{
		text-align: center;
		max-width: 450px;
	}
	.entry-title{
		color: #ef4229;}
	article{
        background-color: #fff;
        margin: 10px 0;
        padding: 10px;
        border-radius: 5px;
		box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);
	}
    .post-thumbnail{
        padding: 10px 0 10px 10px;
    }
   

    @media (max-width: 768px) {
        .flex-container {
            flex-direction: column;
        }

        #primary,
        #secondary {
            width: 100%;
        }
    }
</style><style>
    /* Your existing styles */

    .flex-container {
        display: flex;
        justify-content: space-between;
    }

    #primary {
        width: 70%;
        margin-right: 20px; /* Add a margin between primary content and sidebar */
    }

    #secondary {
        width: 25%;
    }

    .page-header img {
        width: 100%;
        height: auto;
    }

    .article-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 0 20px; /* Adjust the padding */
    }

    .naslov {
        text-align: center;
        margin-bottom: 20px; /* Add margin below the title */
    }

    .entry-header {
        text-align: center;
        max-width: 100%; /* Allow the title to take full width */
    }

    .entry-title {
        color: #333; /* Adjust the title color */
        margin-top: 10px; /* Add margin above the title */
    }

    article {
        background-color: #f9f9f9; /* Adjust the background color */
        margin: 10px; /* Adjust the margin */
        /* padding: 15px; Adjust the padding */
        /* border-radius: 8px; */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Adjust the box shadow */
        transition: background-color 0.3s ease; /* Add a smooth transition */
    }

    .post-thumbnail {
        padding: 0;
        margin-bottom: 10px; /* Add margin below the thumbnail */
    }

    article:hover {
        background-color: #fff; /* Change background color on hover */
    }

    @media (max-width: 768px) {
        .flex-container {
            flex-direction: column;
        }

        #primary,
        #secondary {
            width: 100%;
            margin-right: 0; /* Remove margin on smaller screens */
        }
    }
</style>

<header class="page-header">
    <?php
    $header_image_url = get_header_image();
    if ($header_image_url) {
        echo '<img src="' . esc_url($header_image_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
    }
    ?>
</header>
<style>
    /* Your existing styles */

    #slider-container {
        width: 100%; /* Adjust the width as needed */
        overflow: hidden; /* Ensure the container hides overflow for the slider */
        height: 650px;
    }

    #slider {
        display: flex; /* Use flex to arrange slider items in a row */
        transition: transform 0.5s ease-in-out; /* Add smooth transition effect */
    }

    .slider-item {
        flex: 0 0 100%; /* Set each item to take 100% width */
    }

    .slick-prev,
    .slick-next {
        position: absolute;
        top: 30%;
        transform: translateY(-50%);
        z-index: 1; /* Ensure the buttons appear above the images */
        color: #fff; /* Adjust the color of the buttons */
        font-size: 24px; /* Adjust the font size of the buttons */
        background-color: rgba(0, 0, 0, 0.5); /* Add a semi-transparent background */
        border: none;
        cursor: pointer;
        padding: 10px;
    }

    .slick-prev {
        left: 10px;
    }

    .slick-next {
        right: 10px;
    }

    .slick-dots {
    display: none !important;
}

    #slider img {
    max-width: 100%; /* Set the maximum width to 100% of the container */
    height: auto; /* Allow the height to adjust proportionally */
}

    /* Rest of your styles */
</style>

<header class="page-header">
    <?php
    $header_image_url = get_header_image();
    if ($header_image_url) {
        echo '<img src="' . esc_url($header_image_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
    }
    ?>
</header>

<div id="slider-container">
    <div id="slider">
        <?php
        for ($i = 1; $i <= 4; $i++) {
            $image_url = get_theme_mod('slider_image_' . $i, ''); // Get image URL from theme customization
            $text = get_theme_mod('slider_text_' . $i, ''); // Get text from theme customization

            // Display image and text
            if (!empty($image_url)) {
                echo '<div class="slider-item">';
                echo '<img src="' . esc_url($image_url) . '" alt="Slider Image ' . $i . '">';
              
                echo '</div>';
            }
        }
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
   $(document).ready(function () {
    // Initialize the Slick slider
    $('#slider-container').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        appendArrows: $('#slider-container'), // Specify where to append the navigation arrows
        appendDots: $('#slider-container'), // Specify where to append the pagination dots
    });

    // Remove a specific dot (for example, the fourth dot)
    $('#slider-container .slick-dots li:eq(3)').remove();
});
</script>

<div class="naslov">
    <h1>Pronadji svoje sledece putovanje!</h1>
</div>
<div class="flex-container">
    <main id="primary" class="site-main">

        <?php
        if (have_posts()) :

            if (is_home() && !is_front_page()) :
                ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>

                <?php
            endif;

            /* Start the Loop */
            echo '<div class="article-container">';
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php
                    if (has_post_thumbnail()) {
                        ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                <?php the_post_thumbnail('custom-size'); ?>
                            </a>
                        </div>
                        <?php
                    }
                    ?>

                    <header class="entry-header">
                        <?php the_title('<h2 class="entry-title" <a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
                    </header><!-- .entry-header -->

                </article><!-- #post-<?php the_ID(); ?> -->
            <?php
            endwhile;
            echo '</div>';

            the_posts_navigation();

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>

    </main><!-- #primary -->

    <?php
    get_sidebar(); // This is where you call get_sidebar()
    ?>


</div><!-- .flex-container -->

<?php
get_footer();
?>