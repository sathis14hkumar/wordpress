<?php

/**
* ------------------------------------------------------------------------------------
* bani-customizer-single-post.php
*
* For adding customizer settings - Single Blog Page settings
* ------------------------------------------------------------------------------------
*/


/**
* ADD NEW SECTION
*/
$wp_customize->add_section( 'bani_single_blog_section' , array(
	'title'      => esc_html__( 'Single Blog Page Settings', 'bani' ),
	'priority'   => 24,
) );






/**
* Full Width single Blog Page
*/
$wp_customize->add_setting(
	'bani_full_width_post',
	array(
        'default' => false,
		'sanitize_callback' => 'bani_sanitize_checkbox'
	)
);
// Add control
$wp_customize->add_control(
    'bani_full_width_post',
    array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Full Width Post', 'bani' ),
        'section' => 'bani_single_blog_section',
        'description' => 'Check this to remove sidebar from Single Blog Page.'
    )
);



/**
* SIDEBAR ON LEFT
*/
$wp_customize->add_setting(
	'bani_left_sidebar_post',
	array(
        'default' => false,
		'sanitize_callback' => 'bani_sanitize_checkbox'
	)
);
// Add control
$wp_customize->add_control(
    'bani_left_sidebar_post',
    array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Sidebar on Left', 'bani' ),
        'section' => 'bani_single_blog_section',
        'description' => 'Check this to show sidebar on left on single blog page.'
    )
);

