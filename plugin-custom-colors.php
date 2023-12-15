<?php
/**
 * Plugin Name:      Custom colors plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Halida
 * description:       This is a custom plugin that adds a custom colors
 */

 function theme_customize($wp_customize) {
    // Add a section for colors
    $wp_customize->add_section('theme_colors', array(
        'title' => __('Theme Colors', 'your-theme-slug'),
        'priority' => 30,
    ));

    // Add a setting for background color
    // $wp_customize->add_setting('background_color', array(
    //     'default' => '#ffffff',
    //     'sanitize_callback' => 'sanitize_hex_color',
    // ));

    // Add a control for background color
    // $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color', array(
    //     'label' => __('Background Color', 'your-theme-slug'),
    //     'section' => 'theme_colors',
    // )));

	
	$wp_customize->add_setting('bcg_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add a control for sidebar color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bcg_color', array(
        'label' => __('Background color', 'your-theme-slug'),
        'section' => 'theme_colors',
    )));

    // Add a setting for text color
    $wp_customize->add_setting('text_color', array(
        'default' => '#ef4229',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add a control for text color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'label' => __('Main Theme Color', 'your-theme-slug'),
        'section' => 'theme_colors',
    )));

	// Add a setting for text color
    $wp_customize->add_setting('gradient_color_first', array(
        'default' => '#990000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add a control for text color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gradient_color_first', array(
        'label' => __('Menu item color', 'your-theme-slug'),
        'section' => 'theme_colors',
    )));

	// Add a setting for text color
    // $wp_customize->add_setting('gradient_color_second', array(
    //     'default' => '#ff6600',
    //     'sanitize_callback' => 'sanitize_hex_color',
    // ));

    // // Add a control for text color
    // $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'gradient_color_second', array(
    //     'label' => __('Second Gradient Color', 'your-theme-slug'),
    //     'section' => 'theme_colors',
    // )));

	$wp_customize->add_setting('side_bar_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add a control for sidebar color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'side_bar_color', array(
        'label' => __('Sidebar Color', 'your-theme-slug'),
        'section' => 'theme_colors',
    )));

	$wp_customize->add_setting('bcg_color', array(
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add a control for sidebar color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bcg_color', array(
        'label' => __('Bcg color', 'your-theme-slug'),
        'section' => 'theme_colors',
    )));

	$wp_customize->add_setting('h_color', array(
        'default' => '#0a0a0a',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add a control for sidebar color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h_color', array(
        'label' => __('h colors', 'your-theme-slug'),
        'section' => 'theme_colors',
    )));
}
add_action('customize_register', 'theme_customize');
function theme_custom() {
    // $background_color = get_theme_mod('background_color', '#ffffff');
	$color = get_theme_mod('text_color', '#8A70C2');
	$gradient_color_first = get_theme_mod('gradient_color_first', '#6A5090');
	// $gradient_color_second = get_theme_mod('gradient_color_second', '#ffffff');
	$side_bar_color = get_theme_mod('side_bar_color', '#efefef');
	$bcg_color = get_theme_mod('bcg_color', '#ffffff');
	$h = get_theme_mod('h_color', '#0a0a0a');
    ?>
    <style>
        body {
            background-color: <?php echo esc_attr($bcg_color); ?> !important;
        }
		.flex-container{
			background-color: <?php echo esc_attr($bcg_color); ?> !important;
		}
		.site-header-logo{
        	background-color: <?php echo esc_attr($color); ?> !important;
		}
		.comments{
			border: 1px solid <?php echo esc_attr($color); ?> !important;
		}
		/* a {
			color: <?php echo esc_attr($h); ?> !important;
		} */
		h1{
			color: <?php echo esc_attr($h); ?> !important;
		}
		h2{
			color: <?php echo esc_attr($h); ?> !important;
		}
		p{
			color: <?php echo esc_attr($h); ?> !important;
		}
		.your-menu-class {
			background-color: <?php echo esc_attr($gradient_color_first); ?> !important;
		}
		.your-menu-class ul {
			background-color: <?php echo esc_attr($gradient_color_first); ?> !important;
		}
		.entry-title{
			color: <?php echo esc_attr($color); ?> !important;
		}
		.site-footer{
			background-color: <?php echo esc_attr($color); ?> !important;
		}
		.bottom-bar{
			background-color: <?php echo esc_attr($gradient_color_first); ?> !important;
		}

		.widget-area2{
			background-color: <?php echo esc_attr($side_bar_color); ?> !important;
		}
		
    </style>
    <?php
}

add_action('wp_head', 'theme_custom');

?>