<?php


if ( isset($_POST['upload']) ) {
	echo '<pre>';
	print_r($_FILES);
	echo '</pre>';
	$message = '';
	$upload = 1;
	foreach ($_FILES['files']['name'] as $key => $value) {
		if ( $_FILES['files']['type'][$key] != 'image/png' && $_FILES['files']['type'][$key] != 'image/jpg' && $_FILES['files']['type'][$key] != 'image/jpeg' ) {
			$upload = 0;
		}
	}

	if ($upload) {
		foreach ($_FILES['files']['name'] as $key => $value) {
			$target_dir = get_template_directory().'/uploads/';
			$target_file = $target_dir.$_FILES['files']['name'][$key];
			if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $target_file)) {
				$message = 'Upload Succesfull';
			} else {
				$message = 'Sorry, there was an error uploading your file.';
			}
			
		}
		
	}
	echo $message;
}




?>