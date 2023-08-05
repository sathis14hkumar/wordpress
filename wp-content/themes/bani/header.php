<!doctype html>
<html <?php 
language_attributes();
?>
>
<head>
	<meta charset="<?php 
bloginfo( 'charset' );
?>
">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php 
wp_head();
?>
</head>

<body <?php 
body_class();
?>
>

    <?php 
if ( !get_theme_mod( 'bani_hide_loader' ) ) {
    ?>
		<div class="loading-screen d-flex align-items-center">
			<div class="spinner">
			  <div class="rect1"></div>
			  <div class="rect2"></div>
			  <div class="rect3"></div>
			  <div class="rect4"></div>
			  <div class="rect5"></div>
			</div>
		</div>
    <?php 
}
?>
    <!-- Loader End -->
	<div id="page" class="site">
                    <!-- Top nav bar start -->
    <?php 
?>
 <!-- End premium -->
		           <!-- Top nav bar end -->

			<a class="skip-link screen-reader-text" href="#content"><?php 
esc_html_e( 'Skip to content', 'bani' );
?>
</a>

			<div class="st-header-area ">
				<div class="container">
					<header id="masthead" class="site-header row align-items-center" role="banner">

							<div class="site-branding col-sm-4">

								<?php 

if ( !get_theme_mod( 'bani_logo' ) ) {
    ?>

									<?php 
    
    if ( is_front_page() ) {
        ?>
										<h1 class="site-title"><a href="<?php 
        echo  esc_url( home_url( '/' ) ) ;
        ?>
" rel="home"><?php 
        bloginfo( 'name' );
        ?>
</a></h1>
									<?php 
    } else {
        ?>
										<h2 class="site-title"><a href="<?php 
        echo  esc_url( home_url( '/' ) ) ;
        ?>
" rel="home"><?php 
        bloginfo( 'name' );
        ?>
</a></h2>
									<?php 
    }
    
    ?>

								<?php 
} else {
    ?>

									<?php 
    
    if ( is_front_page() ) {
        ?>
										<h1 class="site-title"><a href="<?php 
        echo  esc_url( home_url( '/' ) ) ;
        ?>
" rel="home"><img src="<?php 
        echo  esc_url( get_theme_mod( 'bani_logo' ) ) ;
        ?>
" alt="<?php 
        bloginfo( 'name' );
        ?>
" class="bani-logo-img" height="<?php 
        if ( get_theme_mod( 'bani_logo_height' ) ) {
            echo  get_theme_mod( 'bani_logo_height' ) ;
        }
        ?>
" /></a></h1>
									<?php 
    } else {
        ?>
										<h2 class="site-title"><a href="<?php 
        echo  esc_url( home_url( '/' ) ) ;
        ?>
" rel="home"><img src="<?php 
        echo  esc_url( get_theme_mod( 'bani_logo' ) ) ;
        ?>
" alt="<?php 
        bloginfo( 'name' );
        ?>
" class="bani-logo-img" height="<?php 
        if ( get_theme_mod( 'bani_logo_height' ) ) {
            echo  get_theme_mod( 'bani_logo_height' ) ;
        }
        ?>
" /></a></h2>
									<?php 
    }
    
    ?>

								<?php 
}

?>

								<?php 

if ( get_theme_mod( 'bani_display_tagline' ) ) {
    $description = get_bloginfo( 'description', 'display' );
    
    if ( $description || is_customize_preview() ) {
        ?>
										<p class="site-description"><?php 
        echo  $description ;
        ?>
</p>
									<?php 
    }

}

?>
							</div><!-- .site-branding -->

							<nav id="site-navigation" class="main-navigation ml-auto col text-right" role="navigation">
								<button class="menu-toggle btn btn-primary btn-sm" aria-controls="primary-menu" aria-expanded="false" ><i class="fa fa-bars"></i></button>
								<?php 
wp_nav_menu( array(
    'theme_location' => 'menu-1',
    'menu_id'        => 'primary-menu',
    'menu_class'     => 'row bani-main-menu',
) );
?>
							</nav><!-- #site-navigation -->

					</header><!-- #masthead -->
				</div><!-- /.container -->
			</div><!-- /.st-header-area -->

				<?php 

if ( get_header_image() ) {
    ?>
					<style media="screen">
						.st-header-area {
							background-image: url('<?php 
    header_image();
    ?>
');
							background-repeat: no-repeat  !important;
							background-position: 50% 50%;
							-webkit-background-size: cover;
							-moz-background-size:    cover;
							-o-background-size:      cover;
							background-size:         cover;
						}
					</style>
	            <?php 
}

?>

			<div class="st-content-area">
				<div class="container">
					<div id="content" class="site-content row">
