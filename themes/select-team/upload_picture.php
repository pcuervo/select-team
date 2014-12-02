<?php 
	use foundationphp\UploadFile;
	require 'src/foundationphp/UploadFile.php';
	
	session_start();
	unset($_SESSION['upload_message']);
	unset($_SESSION['name']);
	unset($_SESSION['st_user_id']);

	$site_url = $_POST['site_url'];
	$st_user_id = $_POST['st_user_id'];
	$isUploaded = false;

	$max = 400 * 1024;
	$result = array();

	$destination = __DIR__ . '/profile_pictures/';

	try {
		$upload = new UploadFile($destination);
		//$upload->allowAllTypes();
		$upload->setMaxSize($max);
		$upload->upload();
		$result = $upload->getMessages();
		$name = $upload->getName();
		$isUploaded = true;
		$_SESSION['name'] = $name;
		$_SESSION['upload_message'] = $result;
	} catch (Exception $e) {
		$result[] = $e->getMessage();
	}

	if($isUploaded) {
		$_SESSION['profile_pic'] = $name;
		$_SESSION['st_user_id'] = $st_user_id;
		header("Location: ".$site_url.'/dashboard?err=0');
	}

	header("Location: ".$site_url.'/dashboard?err=1');

?>