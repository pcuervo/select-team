<?php

	$q1 = $q2 = $q3 = $q4 = $q5 = $q6 = $q7 = $q8 = $q9 = $q10 = $q11 = $q12 = $q13 = $q14 = $q15 = '';

	$q1 	= ( isset($_POST['q1']) ) ? $_POST['q1'] : ''; //What's your name?
	$q2 	= ( isset($_POST['q2']) ) ? $_POST['q2'] : ''; //Gender
	$q3 	= ( isset($_POST['q3']) ) ? $_POST['q3'] : ''; //When were you born?
	$q4 	= ( isset($_POST['q4']) ) ? $_POST['q4'] : ''; //When are you graduating?
	$q5 	= ( isset($_POST['q5']) ) ? $_POST['q5'] : ''; //What year are you studying?
	$q6 	= ( isset($_POST['q6']) ) ? $_POST['q6'] : ''; //What's your email address?
	$q7 	= ( isset($_POST['q7']) ) ? $_POST['q7'] : ''; //What sport do you practice?
	$q8 	= ( isset($_POST['q8']) ) ? $_POST['q8'] : ''; //What's your average score?
	$q9 	= ( isset($_POST['q9']) ) ? $_POST['q9'] : ''; //What's your position?
	$q10 	= ( isset($_POST['q10']) ) ? $_POST['q10'] : ''; //What's your height?
	$q11 	= ( isset($_POST['q11']) ) ? $_POST['q11'] : ''; //Are you left or right handed?
	$q12 	= ( isset($_POST['q12']) ) ? $_POST['q12'] : ''; //What's your FMT ranking?
	$q13 	= ( isset($_POST['q13']) ) ? $_POST['q13'] : ''; //Have you ever played an ATP tournament?
	$q14 	= ( isset($_POST['q13']) ) ? $_POST['q14'] : ''; //What's your position?
	$q15 	= ( isset($_POST['q15']) ) ? $_POST['q15'] : ''; //What's your height?

	$mail_to = 'raul@pcuervo.com, alejandro@pcuervo.com';
	$subject = 'Select team prospect '.$q1;

	if ( $q1 !== '' ){
		$body_message = "What's your name?: ".$q1."\n";
	}
	if ( $q2 !== '' ){
		$body_message .= "When were you born?: ".$q2."\n";
	}
	if ( $q3 !== '' ){
		$body_message .= "When are you graduating?: ".$q3."\n";
	}
	if ( $q4 !== '' ){
		$body_message .= "What year are you studying?: ".$q4."\n";
	}
	if ( $q5 !== '' ){
		$body_message .= "What's your email address?: ".$q5."\n";
	}
	if ( $q6 !== '' ){
		$body_message .= "What sport do you practice?: ".$q6."\n";
	}
	if ( $q7 !== '' ){
		$body_message .= "What's your average score?: ".$q7."\n";
	}
	if ( $q8 !== '' ){
		$body_message .= "What's your position?: ".$q8."\n";
	}
	if ( $q9 !== '' ){
		$body_message .= "What's your height?: ".$q9."\n";
	}
	if ( $q10 !== '' ){
		$body_message .= "Are you left or right handed?: ".$q10."\n";
	}
	if ( $q11 !== '' ){
		$body_message .= "What's your FMT ranking?: ".$q11."\n";
	}
	if ( $q12 !== '' ){
		$body_message .= "Have you ever played an ATP tournament?: ".$q12."\n";
	}
	if ( $q13 !== '' ){
		$body_message .= "What's your position?: ".$q13."\n";
	}
	if ( $q14 !== '' ){
		$body_message .= "What's your height?: ".$q14."\n";
	}
	$body_message .= "";

	$headers = 'From: '.$q1."\r\n";
	$headers .= 'Reply-To: '.$q1."\r\n";

	$mail_status = mail($mail_to, $subject, $body_message, $headers);
?>