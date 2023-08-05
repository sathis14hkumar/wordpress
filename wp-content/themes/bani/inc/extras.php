<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package social
 */


/**
* Add help button on admin navbar
*/
function bani_add_help_button() {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

	global $wp_admin_bar;

	$args = array(
		'id'     => 'bani-help',
		'parent' => 'top-secondary',
		'title'  => __( 'Theme Help', 'bani' ),
		'href'   => admin_url( 'themes.php?page=about-bani&help=true' ),
		'meta'   => array(
			'class'    => 'bani-help-bar',
		),
	);
	$wp_admin_bar->add_menu( $args );

}
add_action( 'wp_before_admin_bar_render', 'bani_add_help_button' );


/**
* Add admin styles
*/
function bani_admin_style() {
	wp_enqueue_style( 'bani-admin', get_template_directory_uri() . '/css/bani-admin.css' );
}
add_action( 'admin_init' , 'bani_admin_style' );



/**
* Add welcome page
*/
function bani_add_welcome_page() {
    $_name = __( 'About Bani' , 'bani' );

    $theme_page = add_theme_page(
        $_name,
        $_name,
        'edit_theme_options',
        'about-bani',
        'bani_welcome_page'
    );
}
add_action( 'admin_menu', 'bani_add_welcome_page' );


function bani_welcome_page() {
	include_once( 'views/about.php' );
}
