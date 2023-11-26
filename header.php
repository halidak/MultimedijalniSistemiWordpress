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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<style>
	.site-header {
		width: 100%;
	}
	.logo{
		width: 150px;
		height: auto;
		padding: 10px;
	}
	.logo-link{
		margin: 0 auto;
	}
	.site-header-logo{
		background-color: #8583BD;
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
	background-color: #8583BD;
	justify-content: center;
}

/* Style each menu item */
.your-menu-class li {
    margin: 0 40px;
    position: relative;
}

/* Style the links in the menu */
.your-menu-class a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    font-size: 16px;
    padding: 10px;
    display: block;
}

	.your-menu-class a:visited{
		color: #fff; 
	}

	/* Style sub-menus */
	.your-menu-class ul {
		list-style: none;
		margin: 0;
		padding: 0;
		position: absolute;
		top: 100%;
		left: 0;
		display: none;
		background-color: #ef43297e;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
	}

	/* Style sub-menu items */
	.your-menu-class ul li {
		width: 150px; /* Adjust the width as needed */
	}

	/* Show sub-menus on hover */
	.your-menu-class li:hover > ul {
		display: block;
	}
</style>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'multimedijalnisistemi' ); ?></a>

	<header class="site-header">
	<div class="site-header-logo">
	<?php
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link">
			<img src="<?php echo $image[0]; ?>" alt="Logo" class="logo">
		</a>
		<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div>
		<?php
			wp_nav_menu(array(
				'theme_location' => 'menu-1',
				'menu_class'     => 'your-menu-class', // Add a custom class to style the menu
			));
		?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
  </header><!-- .site-header -->
 