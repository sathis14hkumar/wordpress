<?php

get_header();
$bani_hide_page_title = false;

if ( class_exists( 'TitanFramework' ) ) {
    $titan = TitanFramework::getInstance( 'bani' );
    $bani_hide_page_title = $titan->getOption( 'bani_hide_page_title' );
}

?>

<?php 

if ( !$bani_hide_page_title ) {
    ?>
	<div class="bani-cover-wrapper <?php 
    
    if ( !has_post_thumbnail() ) {
        ?>
 short-cover <?php 
    } else {
        ?>
 page-cover <?php 
    }
    
    ?>
">
		<div class="bani-cover-bg" <?php 
    
    if ( has_post_thumbnail() ) {
        ?>
 style="background-image: url(<?php 
        echo  esc_url( the_post_thumbnail_url() ) ;
        ?>
); -webkit-filter: brightness(35%); filter: brightness(35%);" <?php 
    }
    
    ?>
></div><!-- /.bani-cover -->
		<div class="bani-cover-content row align-items-center justify-content-center">
			<div class="col-md-6 bani-content-height">
				<?php 
    the_title( '<h1 class="entry-title">', '</h1>' );
    ?>
			</div><!-- /.col -->
		</div><!-- /.bani-cover-content -->
	</div>
	<div class="w-100"></div>
<?php 
} else {
    ?>
	<div class="bani-title-spacing"></div>
<?php 
}

?>

<style type="text/css">
    .btn-tag {
        margin-left: 2px;
        margin-right: 2px;
    }
</style>

<div class="st-primary-wrapper col-lg-12">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

            <?php

            global $wpdb;
            $results = $wpdb->get_results("SELECT * FROM custom_images ORDER BY id ASC LIMIT 0,10");
            foreach ($results as $key => $value) {
                echo '<div class="card bani-card">';
                    echo '<div class="card-block">';
                        echo '<div class="row">';
                            echo '<div class="col-sm-4">';
                                echo ' <img src="'.$value->image_path.'" class="img-thumbnail" alt="Cinque Terre" style="width: 400px;"> ';
                            echo '</div>';

                            echo '<div class="col-sm-4">';
                                echo '<ul>
                                        <li>'.$value->id.'</li>
                                        <li>'.$value->image_name.'</li>
                                        <li>'.$value->width.' x '.$value->height.'</li>
                                    </ul>';
                            echo '</div>';

                            echo '<div class="col-sm-4">';
                                echo '<div class="form-group" id="'.$value->id.'">
                                        <input type="text" name="tag" class="tag">
                                    </div>';
                                echo '<button id="'.$value->id.'" class="btn btn-success btn-sm add-tag">Add Tag</button>';
                                echo '<hr>';
                                echo '<div class="row">';
                                    echo '<div class="col-sm-12" id="tag-'.$value->id.'">';
                                        if ( $value->tag_ids ) {
                                            $tag_ids = explode(",", $value->tag_ids);
                                            foreach ($tag_ids as $key => $tag_id) {
                                                $tag = $wpdb->get_var("SELECT tag FROM custom_image_tags WHERE id='".$tag_id."'");
                                                echo '<button class="btn btn-primary btn-sm btn-tag" data-id="'.$value->id.'" id="'.$tag_id.'">'.$tag.'</button>';
                                            }
                                        }
                                            
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                echo '<br>';
            }

            ?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .st-primary-wrapper -->

<?php 
get_footer();
?>


<script type="text/javascript">
    jQuery(document).ready(function() {        
        var offset = 10;
        jQuery(window).scroll(function() {
            if(jQuery(window).scrollTop() + jQuery(window).height() == jQuery(document).height()) {
                jQuery.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        action: 'get_images',
                        offset: offset,
                    },
                    success: function(response) {
                        var len = response.length ;
                        if (len > 0) {
                            var element = response;
                            jQuery('main.site-main').append(jQuery(element));
                            offset++;
                        }
                        
                    }
                });
            }
        });

        jQuery('body').on('click', '.add-tag', function() {
            var image_id = jQuery(this).attr('id');
            var tag = jQuery('div#'+image_id+' input[name=tag]').val();
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    action: 'add_tag',
                    image_id: image_id,
                    tag : tag,
                },
                success: function(response) {
                    if ( response.message == 'success' ) {
                        jQuery('div#tag-'+image_id).append(response.element);
                    }
                }
            });
        });

        jQuery('body').on('click', '.btn-tag', function() {
            var image_id = jQuery(this).attr('data-id');
            var tag_id = jQuery(this).attr('id');
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    action: 'remove_tag',
                    image_id: image_id,
                    tag_id: tag_id,
                },
                success: function(response) {
                    if (response == 'success') {
                        jQuery('div#tag-'+image_id+' button#'+tag_id).remove();
                    }
                }
            });
        });

    });
</script>