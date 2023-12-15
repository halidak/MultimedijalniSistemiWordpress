<?php
/**
 * Plugin Name:       Slider plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Halida
 * description:       This is a custom plugin that adds a slider
 */

 function theme_customize_register($wp_customize) {
    $wp_customize->add_section('slider_section', array(
        'title' => 'Slider',
        'priority' => 30,
    ));

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting('slider_image_'.$i, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slider_image_'.$i, array(
            'label' => 'Image '.$i,
            'section' => 'slider_section',
            'settings' => 'slider_image_'.$i,
        )));

        $wp_customize->add_setting('slider_text_'.$i, array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('slider_text_'.$i, array(
            'label' => 'Text '.$i,
            'section' => 'slider_section',
            'type' => 'text',
        ));
    }
}
add_action('customize_register', 'theme_customize_register');
?>