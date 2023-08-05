<?php

add_action( 'wp_ajax_upload_images', 'upload_images' );
add_action( 'wp_ajax_nopriv_upload_images', 'upload_images' );
function upload_images() {
	global $wpdb;

	$message = '';
	$upload = 1;
	foreach ($_FILES['files']['name'] as $key => $value) {
		if ( $_FILES['files']['type'][$key] != 'image/png' && $_FILES['files']['type'][$key] != 'image/jpg' && $_FILES['files']['type'][$key] != 'image/jpeg' ) {
			$upload = 0;
		}
	}

	if ($upload) {
		foreach ($_FILES['files']['name'] as $key => $value) {
			list($width, $height, $type, $attr) = getimagesize($_FILES['files']['tmp_name'][$key]);
			$target_dir = get_template_directory().'/uploads/';
			$target_file = $target_dir . strtotime("+1 seconds") . '-' . $_FILES['files']['name'][$key];
			if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $target_file)) {
				$data = array(
					'image_name' => $_FILES['files']['name'][$key],
					'image_path' => get_template_directory_uri().'/uploads/'.strtotime("+1 seconds") . '-' . $_FILES['files']['name'][$key],
					'width' => $width,
					'height' => $height,
					'filesize' => $_FILES['files']['size'][$key],
				);
				$wpdb->insert('custom_images', $data);
				$message = 'Upload Succesfull';
			} else {
				$message = 'Sorry, there was an error uploading your file.';
			}
		}
		
	}
	echo json_encode($message);

	die();
}


add_action( 'wp_ajax_get_images', 'get_images');
add_action( 'wp_ajax_nopriv_get_images', 'get_images');
function get_images() {
	global $wpdb;
	$offset = $_POST['offset'];
	$return = '';
	$results = $wpdb->get_results("SELECT * FROM custom_images ORDER BY id ASC LIMIT ".$offset.",1");
	foreach ($results as $key => $value) {
        $return = '<div class="card bani-card">';
        $return .=		'<div class="card-block">';
        $return .=			'<div class="row">';
        $return .=				'<div class="col-sm-4">';
        $return .=					'<img src="'.$value->image_path.'" class="img-thumbnail" alt="Cinque Terre" style="width: 400px;">';
        $return .=				'</div>';

        $return .=				'<div class="col-sm-4">';
        $return .=					'<ul>';
        $return .=						'<li>'.$value->id.'</li>';
        $return .=              		'<li>'.$value->image_name.'</li>';
        $return .=						'<li>'.$value->width.' x '.$value->height.'</li>';
        $return .=					'</ul>';
        $return .=				'</div>';

        $return .=				'<div class="col-sm-4">';
        $return .=					'<div class="form-group" id="'.$value->id.'">';
        $return .=						'<input type="text" name="tag" class="tag">';
        $return .=					'</div>';
        $return .=                  '<button id="'.$value->id.'" class="btn btn-success btn-sm add-tag">Add Tag</button>';
        $return .=					'<hr>';
        $return .=					'<div class="row">';
        $return .=						'<div class="col-sm-12" id="tag-'.$value->id.'">';
		                                if ( $value->tag_ids ) {
		                                    $tag_ids = explode(",", $value->tag_ids);
		                                    foreach ($tag_ids as $key => $tag_id) {
		                                        $tag = $wpdb->get_var("SELECT tag FROM custom_image_tags WHERE id='".$tag_id."'");
		                                        $return .= '<button class="btn btn-primary btn-sm btn-tag" data-id="'.$value->id.'" id="'.$tag_id.'">'.$tag.'</button>';
		                                    }
		                                }
                                    
    $return .= 							'</div>';
    $return .= 	                	'</div>';
    $return .= 	            	'</div>';
    $return .= 				'</div>';
    $return .= 			'</div>';
	$return .= 		'</div>';
    $return .= 	'<br>';
    }

	echo json_encode($return);
	die();
}

add_action( 'wp_ajax_add_tag', 'add_tag');
add_action( 'wp_ajax_nopriv_add_tag', 'add_tag');
function add_tag() {
	global $wpdb;
	$return = '';
	$image_id = $_POST['image_id'];
	$tag_id  = $wpdb->get_var("SELECT id FROM custom_image_tags WHERE tag='".$_POST['tag']."'");
	if ( $tag_id  == '' ) {
		$data_insert = array(
			'tag' => $_POST['tag'],
		);
		$wpdb->insert('custom_image_tags', $data_insert);
		$tag_id = $wpdb->insert_id;
	}

	$tag_ids = $wpdb->get_var("SELECT tag_ids FROM custom_images WHERE id='".$image_id."'");
	if ( $tag_ids != '' ) {
		$tag_ids = explode(",", trim($tag_ids));
		array_push($tag_ids, $tag_id);
		$tag_ids = implode(",", $tag_ids);
	} else {
		$tag_ids = $tag_id;
	}

	$data_update = array(
		'tag_ids' => $tag_ids,
	);
	$where = array(
		'id' => $image_id,
	);
	$res = $wpdb->update('custom_images', $data_update, $where);

	if ($res) {
		$return['message'] = 'success';
		$return['element'] = '<button class="btn btn-primary btn-sm btn-tag" data-id="'.$image_id.'" id="'.$tag_id.'">'.$_POST['tag'].'</button>';
	} else {
		$return['message'] = 'failed';
	}

	echo json_encode($return);

	die();
}



add_action( 'wp_ajax_remove_tag', 'remove_tag');
add_action( 'wp_ajax_nopriv_remove_tag', 'remove_tag');
function remove_tag() {
	global $wpdb;
	$image_id = $_POST['image_id'];
	$tag_id = $_POST['tag_id'];
	$tag_ids = $wpdb->get_var("SELECT tag_ids FROM custom_images WHERE id='".$image_id."'");
	$tag_ids = explode(",", $tag_ids);
	foreach ($tag_ids as $key => $value) {
		if ( $tag_id == $value ) {
			unset($tag_ids[$key]);
		}
	}

	if (count($tag_ids) > 0) {
		$tag_ids = implode(",", $tag_ids);
	} else {
		$tag_ids = '';
	}

	$data_update = array(
		'tag_ids' => $tag_ids,
	);
	$where = array(
		'id' => $image_id,
	);



	$message = 'failed';
	$res = $wpdb->update('custom_images', $data_update, $where);
	if ($res) {
		$message = 'success';
	}

	echo json_encode($message);

	die();
}

?>