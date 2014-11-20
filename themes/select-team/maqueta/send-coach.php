<?php

	$q1 = $q2 = $q3 = $q4 = $q5 = $q6 = $q7 = $q8 = $q9 = $q10 = '';

	$q1 	= ( isset($_POST['q1']) ) ? $_POST['q1'] : ''; //What's your name?
	$q2 	= ( isset($_POST['q2']) ) ? $_POST['q2'] : ''; //What's your email address?
	$q3 	= ( isset($_POST['q3']) ) ? $_POST['q3'] : ''; //Which sport are you interested in?
	$q4 	= ( isset($_POST['q4']) ) ? $_POST['q4'] : ''; //What's the average score you are looking for?
	$q5 	= ( isset($_POST['q5']) ) ? $_POST['q5'] : ''; //What position does the player have to play?
	$q7 	= ( isset($_POST['q6']) ) ? $_POST['q6'] : ''; //Do you prefer a left or right handed player?
	$q8 	= ( isset($_POST['q7']) ) ? $_POST['q7'] : ''; //What FMT ranking are you looking for? (for mexican players only)
	$q9 	= ( isset($_POST['q8']) ) ? $_POST['q8'] : ''; //What position does the player have to play?

	$mail_to = 'raul@pcuervo.com, alejandro@pcuervo.com';
	$subject = 'Select team coach '.$q1;

	if ( $q1 !== '' ){
		$body_message = "What's your name?: ".$q1."\n";
	}
	if ( $q2 !== '' ){
		$body_message .= "What's your email address?: ".$q2."\n";
	}
	if ( $q3 !== '' ){
		$body_message .= "Which sport are you interested in?: ".$q3."\n";
	}
	if ( $q4 !== '' ){
		$body_message .= "What's the average score you are looking for?: ".$q4."\n";
	}
	if ( $q5 !== '' ){
		$body_message .= "What position does the player have to play?: ".$q5."\n";
	}
	if ( $q6 !== '' ){
		$body_message .= "Are you left or right handed?: ".$q6."\n";
	}
	if ( $q7 !== '' ){
		$body_message .= "Do you prefer a left or right handed player?: ".$q7."\n";
	}
	if ( $q8 !== '' ){
		$body_message .= "What FMT ranking are you looking for?: ".$q8."\n";
	}
	if ( $q9 !== '' ){
		$body_message .= "What position does the player have to play?: ".$q9."\n";
	}
	$body_message .= "";

	$headers = 'From: '.$q1."\r\n";
	$headers .= 'Reply-To: '.$q1."\r\n";

	$mail_status = mail($mail_to, $subject, $body_message, $headers);
?>