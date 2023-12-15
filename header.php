<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mms
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            // Podešavanje slajdera
            $('#slider').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                adaptiveHeight: true
            });

            // Prikazivanje/skrivanje hamburger menija
            $('#mobile-menu-toggle').on('click', function() {
                $('#mobile-menu-items').slideToggle();
            });
        });
    </script>
    <?php wp_head(); ?>
</head>
<style>
    .site-header {
        width: 100%;
    }

    .logo {
        width: 150px;
        height: auto;
        padding: 10px;
    }

    .logo-link {
        margin: 0 auto;
    }

    .site-header-logo {
        background-color: #8A70C2;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .your-menu-class {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        background-color: #6A5090;
        justify-content: center;
    }

    .your-menu-class li {
        margin: 0 20px;
        position: relative;
    }

    .your-menu-class a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        font-size: 16px;
        padding: 10px;
        display: block;
    }

    .your-menu-class a:visited {
        color: #fff;
    }

    .your-menu-class li.current-menu-item a,
    .your-menu-class li.current_page_item a {
        color: black;
        font-weight: 1000;
    }

    .your-menu-class ul {
        list-style: none;
        margin: 0;
        padding: 0;
        position: absolute;
        top: 100%;
        left: 0;
        display: none;
        background-color: #6A5090;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .your-menu-class ul li {
        width: 150px;
    }

    .your-menu-class li:hover > ul {
        display: block;
    }
	.mobile-menu{
		display: none;
	}

    /* Stilovi za mobilne ekrane */
    @media (max-width: 768px) {
        .site-header-logo {
            flex-direction: column;
            align-items: center;
        }

        .your-menu-class {
            flex-direction: column;
            align-items: center;
			display: none;
        }

        .your-menu-class li {
            margin: 10px 0;
            text-align: center;
        }
		.menu-items ul {
			list-style: none;
			padding: 0;
			margin: 0;
		}

		.menu-items li {
			list-style: none;
			padding: 0;
			margin: 0;
		}

        /* Stilovi za hamburger meni */
        .mobile-menu {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #6A5090;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .menu-toggle {
            cursor: pointer;
            padding: 10px;
            background-color: #8A70C2;
            border: none;
            border-radius: 4px;
        }

        .bar {
            display: block;
            width: 30px;
            height: 3px;
            background-color: #fff;
            margin: 6px 0;
        }

        .menu-items {
            display: none;
            width: 100%;
            text-align: center;
        }

        .menu-items a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            display: block;
            padding: 10px;
        }

		.site-header{
			margin-top: 46px;
		}

		.logo{
			padding-top: 30px;
    		padding-left: 38px;
		}
    }
</style>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'multimedijalnisistemi'); ?></a>
        <header class="site-header">
            <div class="site-header-logo">
                <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
                    <img src="<?php echo $image[0]; ?>" alt="Logo" class="logo">
                </a>
                <p class="site-description"><?php bloginfo('description'); ?></p>
            </div>
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-2',
                    'menu_class' => 'your-menu-class', // Dodaj custom klasu za stilizovanje menija
                ));
            ?>
            <!-- Hamburger meni za mobilne ekrane -->
            <div class="mobile-menu">
                <div class="menu-toggle" id="mobile-menu-toggle">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <div class="menu-items" id="mobile-menu-items">
                    <?php
                        // Dodajte ovde stavke menija
                        wp_nav_menu(array(
                            'theme_location' => 'menu-2',
                            'container' => '',
                            'items_wrap' => '%3$s', // Bez <ul> i <li> tagova
                        ));
                    ?>
                </div>
            </div>
        </header><!-- .site-header -->
    </div>
</body>
</html>
