<?php
/**
 * This is just an example of how a file could be processed from the
 * upload script. It should be tailored to your own requirements.
 */

// Only accept files with these extensions
$whitelist = array('jpg', 'jpeg', 'png', 'gif');
$name      = null;
$error     = 'No file uploaded.';

if (isset($_FILES)) {
	//print_r($_FILES);
	if (isset($_FILES['images'])) {
		$tmp_name = $_FILES['images']['tmp_name'];
		$name     = basename($_FILES['images']['name']);
		$error    = $_FILES['images']['error'];
		
		if ($error === UPLOAD_ERR_OK) {
			$extension = pathinfo($name, PATHINFO_EXTENSION);

			if (!in_array($extension, $whitelist)) {
				$error = 'Invalid file type uploaded.';
			} else {
				move_uploaded_file($tmp_name, "uploads/".$name);
			}
		}
	}
}


