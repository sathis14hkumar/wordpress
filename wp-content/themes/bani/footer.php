
				</div><!-- #content -->
			</div><!-- /.container -->
		</div><!-- /.st-content-area -->

		<div class="st-footer-area">
			<?php 

if ( is_active_sidebar( 'sidebar-footer' ) ) {
    ?>
			<div id="footer-instagram">
				<?php 
    dynamic_sidebar( 'sidebar-footer' );
    ?>
			</div>
			<?php 
}

?>
			<div class="container">

				<footer id="colophon" class="site-footer  align-items-center" role="contentinfo">

                    <?php 

if ( bani_fs()->is_not_paying() ) {
    ?>

                        <div class="upper-footer my-md-3">  <!-- upper footer -->

								<aside class="bani-footer row" role="complementary">
                                    <?php 
    
    if ( is_active_sidebar( 'first-footer-widget-area' ) ) {
        ?>
										<div class="col-md-4  widget-area">
							                <?php 
        dynamic_sidebar( 'first-footer-widget-area' );
        ?>
							            </div><!-- .first .widget-area -->
						            <?php 
    }
    
    ?>

						            <?php 
    
    if ( is_active_sidebar( 'second-footer-widget-area' ) ) {
        ?>
							            <div class="col-md-4 widget-area">
							                <?php 
        dynamic_sidebar( 'second-footer-widget-area' );
        ?>
							            </div><!-- .second .widget-area -->
							        <?php 
    }
    
    ?>

						            <?php 
    
    if ( is_active_sidebar( 'third-footer-widget-area' ) ) {
        ?>
							            <div class="col-md-4 right widget-area">
							                <?php 
        dynamic_sidebar( 'third-footer-widget-area' );
        ?>
							            </div><!-- .third .widget-area -->
							        <?php 
    }
    
    ?>


								</aside><!-- #bani-footer -->

		                </div> <!-- upper footer for Free -->

	                <?php 
}

?>

	                <?php 
?>
 <!-- End Upper For  Paid -->


				    <div class="row align-items-center"> <!--  Starting site-footer -->
						<div class="col-md-4 site-info self-align-first">
							<h6 class="mb-0"><?php 
echo  wp_kses_post( get_theme_mod( 'bani_footer_text_left', __( '(c) Copyright 2017 - All Rights Reserved', 'bani' ) ) ) ;
?>
</h6>
						</div><!-- .site-info -->
						<div class="col-md-4 text-center site-info">
							<?php 

if ( !get_theme_mod( 'bani_hide_social_icons_footer' ) ) {
    ?>
							<div class="social-links-footer">
								<ul class="d-flex justify-content-center">
									<?php 
    bani_get_social_icons();
    ?>
								</ul>
							</div>
							<!-- /.social-links-footer -->
							<?php 
}

?>
						</div><!-- .site-info -->

						<?php 
?>

						<?php 
if ( bani_fs()->is_not_paying() ) {
    ?>
							<div class="col-md-4 site-info self-align-last text-right">
								<h6 class="mb-0"><a href="https://themes.salttechno.com/">WordPress Blog Themes</a> by SALT TECHNO</h6>
							</div><!-- .site-info -->
						<?php 
}
?>

					</div> <!--  Ending site-footer -->
				</footer><!-- #colophon -->
			</div>
			<!-- /.container -->

			<?php 
if ( !get_theme_mod( 'bani_hide_to_top' ) ) {
    ?>
				<div class="scroll-to-top">
					<i class="fa fa-arrow-up"></i>
				</div><!-- /.scroll-to-top -->
			<?php 
}
?>
		</div>
		<!-- /.st-footer-area -->
	</div><!-- #page -->

	<?php 
wp_footer();
?>

</body>
</html>
