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

<div class="st-primary-wrapper col-lg-12">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="card bani-card">
                <div class="card-block">

                    <form id="image_upload" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="files[]" id="fileToUpload" multiple="">
                        <input type="submit" value="Upload Image" name="upload">
                    </form>

                </div>
                
            </div>
			

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .st-primary-wrapper -->

<?php 
get_footer();
?>


<script type="text/javascript">
    jQuery(document).ready(function($) {
        jQuery('#image_upload').on('submit', function() {
            var formData = new FormData();
            var file = jQuery(document).find('input#fileToUpload');
            jQuery.each(file[0].files, function(index, value) {
                formData.append("files["+index+"]", value);
            });
            formData.append('action', 'upload_images'); 
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                dataType: 'JSON',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response == 'Upload Succesfull') {
                        alert('Upload Succesfull');
                        window.location.href = '<?php echo site_url().'/upload'; ?>';
                    }
                }
            });
            return false;
        });
    });
</script>