<?php
	$__default_path = $_SERVER['DOCUMENT_ROOT'].'/lp_demo/img/';
	function load_file( $file, $path ) {
		$absimgpath = $path.basename($file['name']);
		if( !move_uploaded_file($file['tmp_name'], $absimgpath) ) {
			throw "Can't upload file ".$absimgpath;
		}
		return $absimgpath;
	}
?>