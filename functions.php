<?php
/**
 * MultimedijalniSistemi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mms
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
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

// Dodajte ovo u functions.php teme
function enqueue_jquery() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');


add_filter( 'wp_footer', function ( ) {  ?>
	<script>
	document.querySelectorAll(".wp-slider")?.forEach( slider => {
		var src = [];
		var alt = [];
		var img = slider.querySelectorAll("img");
		img.forEach( e => { src.push(e.src);   if (e.alt) { alt.push(e.alt); } else { alt.push("image"); } })
		let i = 0;
		let image = "";
		let myDot = "";
		src.forEach ( e => { image = image + `<div class="wpcookie-slide" > <img decoding="async" loading="lazy" src="${src[i]}" alt="${alt[i]}" > </div>`; i++ })
		i = 0;
		src.forEach ( e => { myDot = myDot + `<span class="wp-dot"></span>`; i++ })
		let dotDisply = "none";
		if (slider.classList.contains("dot")) dotDisply = "block";    
		const main = `<div class="wp-slider">${image}<span class="wpcookie-controls wpcookie-left-arrow"  > <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="35" height="35" color="#fff" style="enable-background:new 0 0 50 50" viewBox="0 0 512 512"><path d="M352 115.4 331.3 96 160 256l171.3 160 20.7-19.3L201.5 256z"/></svg> </span> <span class="wpcookie-controls wpcookie-right-arrow" > <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="35" height="35" color="#fff" style="enable-background:new 0 0 50 50" viewBox="0 0 512 512"><path d="M180.7 96 352 256 180.7 416 160 396.7 310.5 256 160 115.4z"/></svg> </span> <div class="dots-con" style="display: ${dotDisply}"> ${myDot}</div></div> `       
		slider.insertAdjacentHTML("afterend",main  );
		slider.remove();
	})
	
	document.querySelectorAll(".wp-slider")?.forEach( slider => { 
	var slides = slider.querySelectorAll(".wpcookie-slide");
	var dots = slider.querySelectorAll(".wp-dot");
	var index = 0;
	slider.addEventListener("click", e => {if(e.target.classList.contains("wpcookie-left-arrow")) { prevSlide(-1)} } )
	slider.addEventListener("click", e => {if(e.target.classList.contains("wpcookie-right-arrow")) { nextSlide(1)} } )
	function prevSlide(n){
	  index+=n;
	  console.log("prevSlide is called");
	  changeSlide();
	}
	function nextSlide(n){
	  index+=n;
	  changeSlide();
	}
	changeSlide();
	function changeSlide(){   
	  if(index>slides.length-1)
		index=0;  
	  if(index<0)
		index=slides.length-1;  
		for(let i=0;i<slides.length;i++){
		  slides[i].style.display = "none";
		  dots[i].classList.remove("wpcookie-slider-active");      
		}
		slides[index].style.display = "block";
		dots[index].classList.add("wpcookie-slider-active");
	}
	 } )
	
	</script>
	
	<style>
	wp-slider * {
	padding = 0;
	margin = 0;
	}
	.wp-slider{
	  margin:0 auto;
	  position:relative;
	  overflow:hidden;
	}
	.wpcookie-slide{
	  max-height: 100%;
	  width:100%;
	  display:none;
	  animation-name:fade;
	  animation-duration:1s;
	}
	.wpcookie-slide img{
	 width:100%; 
	}
	@keyframes fade{
	  from{opacity:0.5;}
	  to{opacity:1;}
	}
	.wpcookie-controls{
	  position:absolute;
	  top:50%;
	  font-size:1.5em;
	  padding:15px 10px;
	  border-radius:5px;
	  background:white;
	  cursor: pointer;
	  transition: 0.3s all ease;
	  opacity: 15%;
	  transform: translateY(-50%);
	}
	.wpcookie-controls:hover{
	  opacity: 60%;
	}
	.wpcookie-left-arrow{
	  left:0px;
	   border-radius: 0px 5px 5px 0px;   
	}
	.wpcookie-right-arrow{
	  right:0px;
	 border-radius: 5px 0px 0px 5px;
	 
	}
	.wp-slider svg {
		pointer-events: none;
	}
	.dots-con{
	  text-align:center;
	}
	.wp-dot{
	  display:inline-block;
	  background:#c4c4c4;
	  padding:8px;
	  border-radius:50%;
	  margin:10px 5px;
	}
	.wpcookie-slider-active{
	  background:#818181;
	}
	@media (max-width:576px){
	  .wp-slider{width:100%;
	  }  
	  .wpcookie-controls{
		font-size:1em;
		position: absolute;
		display: flex;
		align-items: center;
	  }  
	  .dots-con{
		display:none;
	  }
	}
	</style>
	<?php });
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function multimedijalnisistemi_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on MultimedijalniSistemi, use a find and replace
		* to change 'multimedijalnisistemi' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'multimedijalnisistemi', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-2' => esc_html__( 'Primary', 'multimedijalnisistemi' ),
			'footer_menu' => esc_html__( 'Footer', 'multimedijalnisistemi' ),
		)
	);

	
	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'multimedijalnisistemi_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	add_image_size('custom-size', 450, 300, false);

	//add_image_size('custom', 650, 400, true);


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'multimedijalnisistemi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function multimedijalnisistemi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'multimedijalnisistemi_content_width', 640 );
}
add_action( 'after_setup_theme', 'multimedijalnisistemi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function multimedijalnisistemi_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'multimedijalnisistemi' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'multimedijalnisistemi' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( ' Sidebar 2', 'multimedijalnisistemi' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'multimedijalnisistemi' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( ' Sidebar 3', 'multimedijalnisistemi' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'multimedijalnisistemi' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( 
		array(
			'name'			=> 'Footer Sidebar 1',
			'id'			=> 'sidebar-footer1',
			'description'	=> 'Drag and drop your widgets here',
			'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
			'after_widget'	=> '</div>',
			'before_title'	=> '<h4 class="widget-title">',
			'after_title'	=> '</h4>',
		) 
	);
	register_sidebar( 
		array(
		'name'			=> 'Footer Sidebar 2',
		'id'			=> 'sidebar-footer2',
		'description'	=> 'Drag and drop your widgets here',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
		) 
	);
	register_sidebar( 
		array(
		'name'			=> 'Footer Sidebar 3',
		'id'			=> 'sidebar-footer3',
		'description'	=> 'Drag and drop your widgets here',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
		)
	);	
}
add_action( 'widgets_init', 'multimedijalnisistemi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

 function cd_custom_post_gallery() {
    register_post_type('gallery',
        array(
            'labels' => array(
                'name' => __('Gallery'),
                'singular_name' => __('Gallery'),
                'all_items' => __('All Images'),
            ),
            'taxonomies' => array(
                'category',
            ),
            'public' => true,
            'has_archive' => false,
            'exclude_from_search' => true,
            'rewrite' => array('slug' => 'gallery-item'),
            'supports' => array('title', 'thumbnail'),
            'menu_position' => 9,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => false,
            'publicly_queryable' => false,
            'query_var' => false,
            'register_meta_box_cb' => 'cd_add_gallery_metabox', // Callback function to add metabox
        )
    );
}
add_action('init', 'cd_custom_post_gallery');

// Callback function to add metabox for gallery images
function cd_add_gallery_metabox() {
    add_meta_box(
        'cd_gallery_metabox',
        __('Gallery Images'),
        'cd_gallery_metabox_callback',
        'gallery',
        'normal',
        'high'
    );
}

// Callback function for the gallery metabox
function cd_gallery_metabox_callback($post) {
    // Use nonce for verification
    wp_nonce_field(basename(__FILE__), 'cd_gallery_nonce');

    // Retrieve existing gallery images
    $gallery_images = get_post_meta($post->ID, '_cd_gallery_images', true);

    ?>
    <label for="cd_gallery_images"><?php _e('Gallery Images'); ?></label>
    <input type="button" id="cd_gallery_images_button" class="button" value="<?php _e('Select Images'); ?>">
    <ul id="cd_gallery_images_list">
        <?php
        if (!empty($gallery_images)) {
            foreach ($gallery_images as $image_id) {
                echo '<li>' . wp_get_attachment_image($image_id, 'thumbnail') . '</li>';
            }
        }
        ?>
    </ul>
    <input type="hidden" id="cd_gallery_images" name="cd_gallery_images" value="<?php echo esc_attr(json_encode($gallery_images)); ?>">
    <script>
        jQuery(document).ready(function ($) {
            // Media uploader script
            var mediaUploader;

            // Trigger the media uploader
            $('#cd_gallery_images_button').on('click', function (e) {
                e.preventDefault();
                // If the media uploader exists, open it
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                // Create the media uploader
                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Images',
                    button: {
                        text: 'Choose Images'
                    },
                    multiple: true
                });
                // When an image is selected, run a callback
                mediaUploader.on('select', function () {
                    var attachments = mediaUploader.state().get('selection').toJSON();
                    var imageIds = [];
                    $.each(attachments, function (index, attachment) {
                        imageIds.push(attachment.id);
                    });
                    $('#cd_gallery_images').val(JSON.stringify(imageIds));
                    $('#cd_gallery_images_list').html('');
                    $.each(attachments, function (index, attachment) {
                        $('#cd_gallery_images_list').append('<li>' + attachment.sizes.thumbnail.url + '</li>');
                    });
                });
                // Open the media uploader
                mediaUploader.open();
            });
        });
    </script>
    <?php
}

// Save gallery images when the post is saved
function cd_save_gallery_images($post_id) {
    // Verify nonce
    if (!isset($_POST['cd_gallery_nonce']) || !wp_verify_nonce($_POST['cd_gallery_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // Check if this is an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // Check the user's permissions.
    if ('gallery' === $_POST['post_type'] && !current_user_can('edit_page', $post_id)) {
        return $post_id;
    }

    // Save the gallery images
    if (isset($_POST['cd_gallery_images'])) {
        $gallery_images = json_decode(stripslashes($_POST['cd_gallery_images']));
        update_post_meta($post_id, '_cd_gallery_images', $gallery_images);
    }
}

add_action('save_post', 'cd_save_gallery_images');


function multimedijalnisistemi_scripts() {
	wp_enqueue_style( 'multimedijalnisistemi-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'multimedijalnisistemi-style', 'rtl', 'replace' );

	wp_enqueue_script( 'multimedijalnisistemi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'multimedijalnisistemi_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function custom_theme_styles() {
    wp_enqueue_style('custom-styles', get_stylesheet_directory_uri() . '/custom-styles.css');
}
add_action('wp_enqueue_scripts', 'custom_theme_styles');

function create_posttype() {
	register_post_type( 'wpll_travelPost',
	  array(
		'labels' => array(
		  'name' => __( 'TravelPosts' ),
		  'singular_name' => __( 'TravelPost' )
		),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'travelPosts'),
		'taxonomies' => array('category', 'post_tag', 'feature_image'),
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'gallery'),
	  )
	);
  }
  add_action( 'init', 'create_posttype' );

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

