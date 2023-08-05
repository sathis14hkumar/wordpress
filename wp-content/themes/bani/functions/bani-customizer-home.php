<?php

/**
* ------------------------------------------------------------------------------------
* bani-customizer-home.php
*
* For adding customizer settings - Homepage settings
* ------------------------------------------------------------------------------------
*/
/**
* Add Blog Home Panel
*/
$wp_customize->add_panel( 'blog_home_panel', array(
    'priority'       => 22,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Blog Homepage Settings', 'bani' ),
    'description'    => __( 'Settings for your blog\'s home page', 'bani' ),
) );
/**
* ADD NEW SECTION
*/
$wp_customize->add_section( 'bani_home_section', array(
    'title'       => esc_html__( 'Layout Settings', 'bani' ),
    'panel'       => 'blog_home_panel',
    'description' => esc_attr__( 'Customize your blog\'s home page layout here. You must have selected "Your Latest Posts" at "Static Front Page" settings.', 'bani' ),
) );
/**
* Home page layout
*/
$wp_customize->add_setting( 'bani_home_layout', array(
    'default'           => 'grid',
    'sanitize_callback' => 'wp_kses_post',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bani_home_layout', array(
    'label'    => esc_html__( 'Homepage Layout', 'bani' ),
    'section'  => 'bani_home_section',
    'settings' => 'bani_home_layout',
    'type'     => 'radio',
    'choices'  => array(
    'masonry' => esc_html__( 'Masonry Layout', 'bani' ),
    'full'    => esc_html__( 'Full Post Layout', 'bani' ),
    'grid'    => esc_html__( 'Grid Post Layout', 'bani' ),
),
) ) );
/**
* DISPLAY DEFAULT IMAGE
*/
$wp_customize->add_setting( 'bani_default_image_home', array(
    'default'           => false,
    'sanitize_callback' => 'bani_sanitize_checkbox',
) );
// Add control
$wp_customize->add_control( 'bani_default_image_home', array(
    'type'        => 'checkbox',
    'label'       => esc_html__( 'Display Default Thumbnail Image', 'bani' ),
    'section'     => 'bani_home_section',
    'description' => 'Check this to show default image if post thumbnail is not set.',
) );
/**
* REMOVE SIDEBAR
*/
$wp_customize->add_setting( 'bani_no_hover', array(
    'default'           => false,
    'sanitize_callback' => 'bani_sanitize_checkbox',
) );
// Add control
$wp_customize->add_control( 'bani_no_hover', array(
    'type'        => 'checkbox',
    'label'       => esc_html__( 'Disable Hover Effect', 'bani' ),
    'section'     => 'bani_home_section',
    'description' => 'Check this to remove hover effect on post entry from Homepage.',
) );
/**
* REMOVE SIDEBAR
*/
$wp_customize->add_setting( 'bani_full_width_home', array(
    'default'           => false,
    'sanitize_callback' => 'bani_sanitize_checkbox',
) );
// Add control
$wp_customize->add_control( 'bani_full_width_home', array(
    'type'        => 'checkbox',
    'label'       => esc_html__( 'Remove Sidebar', 'bani' ),
    'section'     => 'bani_home_section',
    'description' => 'Check this to remove sidebar from Homepage.',
) );
/**
* SIDEBAR ON LEFT
*/
$wp_customize->add_setting( 'bani_left_sidebar_home', array(
    'default'           => false,
    'sanitize_callback' => 'bani_sanitize_checkbox',
) );
// Add control
$wp_customize->add_control( 'bani_left_sidebar_home', array(
    'type'        => 'checkbox',
    'label'       => esc_html__( 'Sidebar on Left', 'bani' ),
    'section'     => 'bani_home_section',
    'description' => 'Check this to show sidebar on left on home page. Uncheck "Remove Sidebar" above.',
) );