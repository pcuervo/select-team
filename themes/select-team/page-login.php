<?php
	$username = $_POST['j-email'];
	$password = $_POST['j-password'];

	if ( site_login_post($username, $password) ){
		header("Location: ".site_url()."/dashboard");
		die();
	}
	elseif (site_login_post($username, $password)==-1) {
		header("Location: ".site_url()."?login=paused");
		die();	
	}
	else{
		header("Location: ".site_url());
		die();
	}
?>