<div class="wrap bani-wrap">
    <h1><?php 
esc_html_e( 'Bani - A Perfect Blog Theme', 'bani' );
?>
</h1>


  <?php 
?>

    <?php 

if ( bani_fs()->is_not_paying() ) {
    ?>

          <div class="welcome-panel"> <!-- First Free Pannel -->
              <div class="welcome-panel-content">
                  <h2><?php 
    esc_html_e( 'Thank you for using our theme!', 'bani' );
    ?>
  </h2>
                  <p class="about-description">
                      <?php 
    echo  wp_kses( 'Bani is crafted with elegant & graceful design especially for blog websites like yours. You can customize most of the theme settings using WordPress native customizer with live preview.', 'bani' ) ;
    ?>
                  </p>

                  <div class="" style="text-align: center; margin: 15px;">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/32uV8aocDRk?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                  </div>

                  <div class="welcome-panel-column-container">
                      <div class="welcome-panel-column">
                          <h3><?php 
    esc_html_e( 'Get Started', 'bani' );
    ?>
</h3>
                          <a class="button button-primary button-hero load-customize hide-if-no-customize" href="https://themes.salttechno.com/docs/bani-wordpress-blog-theme/" target="_blank"><?php 
    esc_html_e( 'Read Docs', 'bani' );
    ?>
</a>
                          <a class="button  button-hero load-customize hide-if-no-customize" href="<?php 
    echo  esc_url( self_admin_url() ) ;
    ?>
customize.php" target="_blank"><?php 
    esc_html_e( 'Customize Your Site', 'bani' );
    ?>
</a>
                          <p class="hide-if-no-customize"><?php 
    echo  wp_kses( 'or, <a href="https://themes.salttechno.com/downloads/banipro-premium-wordpress-theme/" target="_blank">update to pro version!</a>', 'bani' ) ;
    ?>
</p>
                      </div>
                      <!-- /.welcome-panel-column -->

                      <div class="welcome-panel-column">
                          <h3><?php 
    esc_html_e( 'Next Steps', 'bani' );
    ?>
</h3>
                          <ul>
                              <li>
                                  <a href="https://themes.salttechno.com/subscribe-to-our-newsletter/" target="_blank" class="welcome-icon"><span class="dashicons dashicons-dashboard bani-about-next-icon"></span> <?php 
    esc_html_e( 'Get optimization tips', 'bani' );
    ?>
</a>
                              </li>
                              <li>
                                  <a href="<?php 
    echo  esc_url( self_admin_url() ) ;
    ?>
customize.php" class="welcome-icon"><span class="dashicons dashicons-media-document bani-about-next-icon"></span> <?php 
    esc_html_e( 'Customize your site', 'bani' );
    ?>
</a>
                              </li>
                              <li>
                                  <a href="http://banipro.themesease.com" target="_blank" class="welcome-icon"><span class="dashicons dashicons-lightbulb bani-about-next-icon"></span> <?php 
    esc_html_e( 'Check pro version demo', 'bani' );
    ?>
</a>
                              </li>
                          </ul>
                      </div>
                      <!-- /.welcome-panel-column -->

                      <div class="welcome-panel-column welcome-panel-last">
                          <h3><?php 
    esc_html_e( 'More Actions', 'bani' );
    ?>
</h3>
                          <ul>
                              <li>
                                  <a href="https://themes.salttechno.com/docs/bani-wordpress-blog-theme/how-to-select-posts-in-featured-section/" target="_blank" class="welcome-icon"><span class="dashicons dashicons-editor-help bani-about-next-icon"></span> <?php 
    esc_html_e( 'How to set featured posts?', 'bani' );
    ?>
</a>
                              </li>
                              <li>
                                  <a href="https://themes.salttechno.com/docs/bani-wordpress-blog-theme/how-to-create-a-contact-form/" target="_blank" class="welcome-icon"><span class="dashicons dashicons-email-alt bani-about-next-icon"></span> <?php 
    esc_html_e( 'How to create a contact form?', 'bani' );
    ?>
</a>
                              </li>
                              <li>
                                  <a href="https://themes.salttechno.com/wordpress-themes/" target="_blank" class="welcome-icon"><span class="dashicons dashicons-art bani-about-next-icon"></span> <?php 
    esc_html_e( 'More themes by SaltTechno', 'bani' );
    ?>
</a>
                              </li>
                          </ul>
                      </div>
                      <!-- /.welcome-panel-column welcome-panel-last -->
                  </div>
                  <!-- /.welcome-panel-column-container -->
              </div>
              <!-- /.welcome-panel-content -->
          </div>
          <!-- /.welcome-panel -->



        <div class="welcome-panel">
            <div class="welcome-panel-content">
                <h2><?php 
    esc_html_e( 'Your blog is good. Let\'s make it better!', 'bani' );
    ?>
  </h2>
                <p class="about-description">
                    <?php 
    echo  wp_kses( 'We have created a premium version of this theme with more features. You can check demo <a href="http://banipro.themesease.com/" target="_blank">here.</a>', 'bani' ) ;
    ?>
                </p>

                <div class="welcome-panel-column-container">
                    <div class="welcome-panel-column" >
                        <img src="https://bani.themesease.com/wp-content/uploads/2017/10/banipro-screenshot-1-compressor.jpg" alt="" style="max-width:90%;margin:15px;border-radius:4px;">
                    </div>
                    <!-- /.welcome-panel-column -->

                    <div class="welcome-panel-column">
                        <h3><?php 
    esc_html_e( 'Features:', 'bani' );
    ?>
</h3>
                        <ul style="padding-left:20px;">
                            <li style="list-style-type: disc;">
                                <strong><?php 
    esc_html_e( '5 Post Formats', 'bani' );
    ?>
</strong>
                            </li>
                            <li style="list-style-type: disc;">
                                <strong><?php 
    esc_html_e( 'Mulitple Navbars', 'bani' );
    ?>
</strong>
                            </li style="list-style-type: disc;">
                            <li style="list-style-type: disc;">
                                <strong><?php 
    esc_html_e( 'Edit Right Footer Text', 'bani' );
    ?>
</strong>
                            </li>
                            <li style="list-style-type: disc;">
                                <strong><?php 
    esc_html_e( 'Custom Widgets', 'bani' );
    ?>
</strong>
                            </li>
                            <li style="list-style-type: disc;">
                                <strong><?php 
    esc_html_e( 'Premium Support', 'bani' );
    ?>
</strong>
                            </li>
                        </ul>
                    </div>
                    <!-- /.welcome-panel-column -->

                    <div class="welcome-panel-column welcome-panel-last">
                        <h3><?php 
    esc_html_e( 'Custom Widgets:', 'bani' );
    ?>
</h3>
                        <ul style="padding-left:20px;">
                            <li style="list-style-type: disc;">
                                <strong><?php 
    esc_html_e( 'About Me/Us', 'bani' );
    ?>
</strong>
                            </li>
                            <li style="list-style-type: disc;">
                                <strong><?php 
    esc_html_e( 'Latest Posts with Thumbnails', 'bani' );
    ?>
</strong>
                            </li>
                            <li style="list-style-type: disc;">
                                <strong><?php 
    esc_html_e( 'Promotional Link Boxes', 'bani' );
    ?>
</strong>
                            </li>
                        </ul>
                        <a class="button button-primary button-hero load-customize hide-if-no-customize" href="http://banipro.themesease.com/" target="_blank"><?php 
    esc_html_e( 'View Demo', 'bani' );
    ?>
</a>
                        <p class="hide-if-no-customize"></p>
                    </div>
                    <!-- /.welcome-panel-column welcome-panel-last -->
                </div>
                <!-- /.welcome-panel-column-container -->
            </div>
            <!-- /.welcome-panel-content -->
        </div>
         <!-- /.welcome-panel Second Pannel -->

        <div class="welcome-panel table-panel">
            <div class="welcome-panel-content panel-text-center">
                <div class="table-title">
                        <h2>WHY UPGRADE TO PRO?  </h2>
                        <p class="about-description"> Upgrade to Bani Pro for these awesome features! </p>
                </div>
                <div class="welcome-panel-column-container-table">
                    <div class="welcome-panel-column-table">


                         <div class="feature-table">

                            <table>
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>Bani Free</th>
                                  <th>Bani Pro</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Custom Post Formats</td>
                                  <td>❌</td>
                                  <td><b class="check">✔</b></td>

                                </tr>
                                <tr>
                                  <td>Multiple Navigation Menu Bars</td>

                                  <td>❌</td>
                                  <td><b class="check">✔</b></td>
                                </tr>
                                <tr>
                                  <td>More Customization Options</td>

                                  <td>❌</td>
                                  <td><b class="check">✔</b></td>

                                </tr>
                                <tr>
                                  <td>Custom Widgets</td>
                                  <td>❌</td>
                                  <td><b class="check">✔</b></td>

                                </tr>
                                <tr>
                                  <td>Edit Footer Right Content</td>
                                  <td>❌</td>
                                  <td><b class="check">✔</b></td>
                                </tr>
                                <tr>
                                  <td>Color Customization</td>
                                  <td>❌</td>
                                  <td><b class="check">✔</b></td>
                                </tr>
                                <tr>
                                  <td>Social Links</td>
                                  <td>❌</td>
                                  <td><b class="check">✔</b></td>
                                </tr>
                                <tr>
                                  <td>Premium Support</td>
                                  <td>❌</td>
                                  <td><b class="check">✔</b></td>
                                </tr>

                              </tbody>
                            </table>

                            <a class="button button-primary button-hero load-customize hide-if-no-customize" href="http://banipro.themesease.com/" target="_blank"><?php 
    esc_html_e( 'View Demo', 'bani' );
    ?>
</a>

                         </div>
                    </div>
                    <!-- /.welcome-panel-column -->

                </div>
                <!-- /.welcome-panel-column-container -->
            </div>
            <!-- /.welcome-panel-content -->
        </div>  <!-- /.welcome-panel table -->

      <?php 
}

?>




    <div class="bani-text-center">
        <a href="https://themes.salttechno.com" target="_blank" class="bani-d-iblock"><img src="<?php 
echo  get_template_directory_uri() ;
?>
/images/brought-by-salt.png" alt="Salt Technologies India" width="200"></a>
    </div>
    <!-- /.bani-text-center -->
</div>
<!-- /.wrap -->
