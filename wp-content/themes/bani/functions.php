<?php

/**
 * Bani functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bani
 */
/**
 * ------------------------------------------------------------------------------------
 * SET UP THEME DEFAULTS & REGISTER SUPPORTED FUNCTIONS
 * ------------------------------------------------------------------------------------
 */

require_once( get_template_directory().'/custom_functions/upload-file.php' );

if ( !function_exists( 'bani_setup' ) ) {
    function bani_setup()
    {
        load_theme_textdomain( 'bani', get_template_directory() . '/languages' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'bani' ),
        ) );
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ) );
        add_theme_support( 'custom-background', apply_filters( 'bani_custom_background_args', array(
            'default-color' => 'F3F3F1',
            'default-image' => '',
        ) ) );
        add_theme_support( 'customize-selective-refresh-widgets' );
    }

}
add_action( 'after_setup_theme', 'bani_setup' );
/**
* ------------------------------------------------------------------------------------
* SET CONTENT WIDTH
* ------------------------------------------------------------------------------------
*/
function bani_content_width()
{
    $GLOBALS['content_width'] = apply_filters( 'bani_content_width', 640 );
}

add_action( 'after_setup_theme', 'bani_content_width', 0 );
/**
* ------------------------------------------------------------------------------------
* REGISTER WIDGET AREA
* ------------------------------------------------------------------------------------
*/
function bani_widgets_init()
{
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'bani' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'bani' ),
        'before_widget' => '<section id="%1$s" class="widget bani-widget card %2$s"><div class="card-block">',
        'after_widget'  => '</div></section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Social Footer', 'bani' ),
        'id'            => 'sidebar-footer',
        'before_widget' => '<div id="%1$s" class="instagram-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="instagram-title">',
        'after_title'   => '</h4>',
        'description'   => esc_html__( 'Add the "Instagram" widget here. You need to install "WP Instagram Widget" plugin first. TIP: For best result, set number of photos to 10.', 'bani' ),
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'First Footer Widget Area', 'bani' ),
        'id'            => 'first-footer-widget-area',
        'description'   => esc_html__( 'Add widgets here.', 'bani' ),
        'before_widget' => '<section id="%1$s" class="widget bani-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Second Footer Widget Area', 'bani' ),
        'id'            => 'second-footer-widget-area',
        'description'   => esc_html__( 'Add widgets here.', 'bani' ),
        'before_widget' => '<section id="%1$s" class="widget bani-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Third Footer Widget Area', 'bani' ),
        'id'            => 'third-footer-widget-area',
        'description'   => esc_html__( 'Add widgets here.', 'bani' ),
        'before_widget' => '<section id="%1$s" class="widget bani-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}

add_action( 'widgets_init', 'bani_widgets_init' );
/**
* ------------------------------------------------------------------------------------
* ENQUEUE STYLES & SCRIPTS
* ------------------------------------------------------------------------------------
*/
function bani_scripts()
{
    wp_enqueue_style( 'bani-google-fonts', '//fonts.googleapis.com/css?family=Bitter:400,400i|Source+Sans+Pro' );
    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.css' );
    wp_enqueue_style(
        'bootstrap',
        get_stylesheet_directory_uri() . '/css/bootstrap.css',
        array(),
        'v4.0.0-beta',
        'all'
    );
    wp_enqueue_style(
        'font-awesome',
        get_stylesheet_directory_uri() . '/css/font-awesome.css',
        array(),
        '4.7.0',
        'all'
    );
    wp_enqueue_style(
        'bxslider',
        get_template_directory_uri() . '/css/jquery.bxslider.css',
        array(),
        '4.2.12',
        'all'
    );
    wp_enqueue_style( 'bani-style', get_stylesheet_uri() );
    wp_enqueue_script(
        'typed',
        get_template_directory_uri() . '/js/typed.js',
        array( 'jquery' ),
        '',
        true
    );
    wp_enqueue_script(
        'swiper-js',
        get_template_directory_uri() . '/js/swiper.jquery.js',
        array( 'jquery' ),
        '',
        true
    );
    wp_enqueue_script(
        'bani-navigation',
        get_template_directory_uri() . '/js/navigation.js',
        array(),
        '20151215',
        true
    );
    wp_enqueue_script(
        'bani-skip-link-focus-fix',
        get_template_directory_uri() . '/js/skip-link-focus-fix.js',
        array(),
        '20151215',
        true
    );
    wp_enqueue_script(
        'bxslider',
        get_template_directory_uri() . '/js/jquery.bxslider.js',
        array( 'jquery' ),
        '4.2.12',
        true
    );
    wp_enqueue_script(
        'bani-main',
        get_template_directory_uri() . '/js/bani-main.js',
        array( 'jquery' ),
        '',
        true
    );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    if ( is_home() && !get_theme_mod( 'bani_hide_cover_section' ) ) {
        wp_enqueue_script(
            'bani-home',
            get_template_directory_uri() . '/js/bani-home.js',
            array( 'jquery' ),
            '',
            true
        );
    }
}

add_action( 'wp_enqueue_scripts', 'bani_scripts', 99 );
// Enqueue admin area script
function bani_admin_scripts()
{
}

add_action( 'admin_enqueue_scripts', 'bani_admin_scripts' );
/**
* ------------------------------------------------------------------------------------
* REQUIRE FILES
* ------------------------------------------------------------------------------------
*/
// Custom header
require get_template_directory() . '/inc/custom-header.php';
// Customizer
require get_template_directory() . '/functions/bani-customizer-settings.php';
require get_template_directory() . '/functions/bani-customizer-style.php';
// Custom comments
require get_template_directory() . '/inc/custom-comments.php';
// Custom navigation for this theme.
require get_template_directory() . '/inc/custom-navigation.php';
// Template tags
require get_template_directory() . '/inc/template-tags.php';
// Template functions
require get_template_directory() . '/inc/template-functions.php';
// Customizer additions.
require get_template_directory() . '/inc/customizer.php';
// Load Jetpack compatibility file.
require get_template_directory() . '/inc/jetpack.php';
// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/framework/tgm-plugins-registration.php';
// Add page title metabox
require get_template_directory() . '/functions/metabox-page-title.php';
//Adding Custom CSS Styles to TinyMCE
add_editor_style( 'editor-style.css' );
/**
* ------------------------------------------------------------------------------------
* FUNCTIONS
* ------------------------------------------------------------------------------------
*/
// Get Social Links with icon
function bani_get_social_icons()
{
    ?>
	<?php 
    
    if ( get_theme_mod( 'bani_facebook' ) ) {
        ?>
<li class="social-item"><a href="<?php 
        echo  esc_html( get_theme_mod( 'bani_facebook' ) ) ;
        ?>
" target="_blank" class="nav-link"><i class="fa fa-facebook"></i></a></li><?php 
    }
    
    ?>
	<?php 
    
    if ( get_theme_mod( 'bani_twitter' ) ) {
        ?>
<li class="social-item"><a href="<?php 
        echo  esc_html( get_theme_mod( 'bani_twitter' ) ) ;
        ?>
" target="_blank" class="nav-link"><i class="fa fa-twitter"></i></a></li><?php 
    }
    
    ?>
	<?php 
    
    if ( get_theme_mod( 'bani_instagram' ) ) {
        ?>
<li class="social-item"><a href="<?php 
        echo  esc_html( get_theme_mod( 'bani_instagram' ) ) ;
        ?>
" target="_blank" class="nav-link"><i class="fa fa-instagram"></i></a></li><?php 
    }
    
    ?>
	<?php 
    
    if ( get_theme_mod( 'bani_pinterest' ) ) {
        ?>
<li class="social-item"><a href="<?php 
        echo  esc_html( get_theme_mod( 'bani_pinterest' ) ) ;
        ?>
" target="_blank" class="nav-link"><i class="fa fa-pinterest"></i></a></li><?php 
    }
    
    ?>
	<?php 
    
    if ( get_theme_mod( 'bani_bloglovin' ) ) {
        ?>
<li class="social-item"><a href="<?php 
        echo  esc_html( get_theme_mod( 'bani_bloglovin' ) ) ;
        ?>
" target="_blank" class="nav-link"><i class="fa fa-heart"></i></a></li><?php 
    }
    
    ?>
	<?php 
    
    if ( get_theme_mod( 'bani_google' ) ) {
        ?>
<li class="social-item"><a href="<?php 
        echo  esc_html( get_theme_mod( 'bani_google' ) ) ;
        ?>
" target="_blank" class="nav-link"><i class="fa fa-google-plus"></i></a></li><?php 
    }
    
    ?>
	<?php 
    
    if ( get_theme_mod( 'bani_tumblr' ) ) {
        ?>
<li class="social-item"><a href="<?php 
        echo  esc_html( get_theme_mod( 'bani_tumblr' ) ) ;
        ?>
" target="_blank" class="nav-link"><i class="fa fa-tumblr"></i></a></li><?php 
    }
    
    ?>
	<?php 
    
    if ( get_theme_mod( 'bani_youtube' ) ) {
        ?>
<li class="social-item"><a href="<?php 
        echo  esc_html( get_theme_mod( 'bani_youtube' ) ) ;
        ?>
" target="_blank" class="nav-link"><i class="fa fa-youtube-play"></i></a></li><?php 
    }
    
    ?>
	<?php 
    
    if ( get_theme_mod( 'bani_dribbble' ) ) {
        ?>
<li class="social-item"><a href="<?php 
        echo  esc_html( get_theme_mod( 'bani_dribbble' ) ) ;
        ?>
" target="_blank" class="nav-link"><i class="fa fa-dribbble"></i></a></li><?php 
    }
    
    ?>
	<?php 
    
    if ( get_theme_mod( 'bani_soundcloud' ) ) {
        ?>
<li class="social-item"><a href="<?php 
        echo  esc_html( get_theme_mod( 'bani_soundcloud' ) ) ;
        ?>
" target="_blank" class="nav-link"><i class="fa fa-soundcloud"></i></a></li><?php 
    }
    
    ?>
	<?php 
    
    if ( get_theme_mod( 'bani_vimeo' ) ) {
        ?>
<li class="social-item"><a href="<?php 
        echo  esc_html( get_theme_mod( 'bani_vimeo' ) ) ;
        ?>
" target="_blank" class="nav-link"><i class="fa fa-vimeo-square"></i></a></li><?php 
    }
    
    ?>
	<?php 
    
    if ( get_theme_mod( 'bani_linkedin' ) ) {
        ?>
<li class="social-item"><a href="<?php 
        echo  esc_html( get_theme_mod( 'bani_linkedin' ) ) ;
        ?>
" target="_blank" class="nav-link"><i class="fa fa-linkedin"></i></a></li><?php 
    }
    
    ?>
	<?php 
    
    if ( get_theme_mod( 'bani_snapchat' ) ) {
        ?>
<li class="social-item"><a href="<?php 
        echo  esc_html( get_theme_mod( 'bani_snapchat' ) ) ;
        ?>
" target="_blank" class="nav-link"><i class="fa fa-snapchat-ghost"></i></a></li><?php 
    }
    
    ?>
	<?php 
    
    if ( get_theme_mod( 'bani_rss' ) ) {
        ?>
<li class="social-item"><a href="<?php 
        echo  esc_url( get_theme_mod( 'bani_rss' ) ) ;
        ?>
" target="_blank" class="nav-link"><i class="fa fa-rss"></i></a></li><?php 
    }

}

function bani_excerpt_more( $more )
{
    return '[&hellip;]';
}

add_filter( 'excerpt_more', 'bani_excerpt_more' );
/**
* ------------------------------------------------------------------------------------
* ADD FREEMIUS TO THE THEME
* ------------------------------------------------------------------------------------
*/
// Create a helper function for easy SDK access.
function bani_fs()
{
    global  $bani_fs ;
    
    if ( !isset( $bani_fs ) ) {
        // Include Freemius SDK.
        require_once dirname( __FILE__ ) . '/freemius/start.php';
        $bani_fs = fs_dynamic_init( array(
            'id'             => '1397',
            'slug'           => 'bani',
            'type'           => 'theme',
            'public_key'     => 'pk_92cb61fc3dc8c4c9af7b1fd340d96',
            'is_premium'     => false,
            'has_addons'     => false,
            'has_paid_plans' => true,
            'menu'           => array(
            'slug'   => 'about-bani',
            'parent' => array(
            'slug' => 'themes.php',
        ),
        ),
            'is_live'        => true,
        ) );
    }
    
    return $bani_fs;
}

// Init Freemius.
bani_fs();
// Signal that SDK was initiated.
do_action( 'bani_fs_loaded' );