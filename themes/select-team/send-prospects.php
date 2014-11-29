<?php

	$q1 = $q2 = $q3 = $q4 = $q5 = $q6 = $q7 = $q8 = $q9 = $q10 = $q11 = $q12 = '';

	$q1 	= ( isset($_GET['q1']) ) ? $_GET['q1'] : ''; //What's your name?
	$q2 	= ( isset($_GET['q2']) ) ? $_GET['q2'] : ''; //When were you born?
	$q3 	= ( isset($_GET['q3']) ) ? $_GET['q3'] : ''; //When are you graduating?
	$q4 	= ( isset($_GET['q4']) ) ? $_GET['q4'] : ''; //What year are you studying?
	$q5 	= ( isset($_GET['q5']) ) ? $_GET['q5'] : ''; //What's your email address?
	$q6 	= ( isset($_GET['q6']) ) ? $_GET['q6'] : ''; //What sport do you practice?
	$q7 	= ( isset($_GET['q7']) ) ? $_GET['q7'] : ''; //What's your average score?
	$q8 	= ( isset($_GET['q8']) ) ? $_GET['q8'] : ''; //What's your position?
	$q9 	= ( isset($_GET['q9']) ) ? $_GET['q9'] : ''; //What's your height?
	$q10 	= ( isset($_GET['q10']) ) ? $_GET['q10'] : ''; //Are you left or right handed?
	$q11 	= ( isset($_GET['q11']) ) ? $_GET['q11'] : ''; //What's your FMT ranking?
	$q12 	= ( isset($_GET['q12']) ) ? $_GET['q12'] : ''; //Have you ever played an ATP tournament?
	$q13 	= ( isset($_GET['q13']) ) ? $_GET['q13'] : ''; //What's your position?
	$q14 	= ( isset($_GET['q14']) ) ? $_GET['q14'] : ''; //What's your height?


	//echo "send-prospects.php";
	//$q1 = $q2 = $q3 = $q4 = $q5 = $q6 = $q7 = $q8 = $q9 = $q10 = $q11 = $q12 = '';

	//$q1 	= ( isset($_POST['q1']) ) ? $_POST['q1'] : ''; //What's your name?
	//$q2 	= ( isset($_POST['q2']) ) ? $_POST['q2'] : ''; //When were you born?
	//$q3 	= ( isset($_POST['q3']) ) ? $_POST['q3'] : ''; //When are you graduating?
	//$q4 	= ( isset($_POST['q4']) ) ? $_POST['q4'] : ''; //What year are you studying?
	//$q5 	= ( isset($_POST['q5']) ) ? $_POST['q5'] : ''; //What's your email address?
	//$q6 	= ( isset($_POST['q6']) ) ? $_POST['q6'] : ''; //What sport do you practice?
	//$q7 	= ( isset($_POST['q7']) ) ? $_POST['q7'] : ''; //What's your average score?
	//$q8 	= ( isset($_POST['q8']) ) ? $_POST['q8'] : ''; //What's your position?
	//$q9 	= ( isset($_POST['q9']) ) ? $_POST['q9'] : ''; //What's your height?
	//$q10 	= ( isset($_POST['q10']) ) ? $_POST['q10'] : ''; //Are you left or right handed?
	//$q11 	= ( isset($_POST['q11']) ) ? $_POST['q11'] : ''; //What's your FMT ranking?
	//$q12 	= ( isset($_POST['q12']) ) ? $_POST['q12'] : ''; //Have you ever played an ATP tournament?
	//$q13 	= ( isset($_POST['q13']) ) ? $_POST['q13'] : ''; //What's your position?
	//$q14 	= ( isset($_POST['q14']) ) ? $_POST['q14'] : ''; //What's your height?
	if(sizeof($_POST)=='0'){
		//echo "Post vacio";
	}
	else{

		$conn = mysql_connect('localhost', 'root', 'root');
        $db   = mysql_select_db('select_team');
        //$name = $_POST['name'];
        //$age  = $_POST['age'];
        
        if(mysql_query("INSERT INTO  `select_team`.`wp_users` (
			`ID` ,
			`user_login` ,
			`user_pass` ,
			`user_nicename` ,
			`user_email` ,
			`user_url` ,
			`user_registered` ,
			`user_activation_key` ,
			`user_status` ,
			`display_name`
			)
			VALUES (
			NULL ,  'ejemplo',  'hola',  'nombre_apellido',  'algo@algo.com',  '',  '0000-00-00 00:00:00',  '',  '0',  'Ejemplo'
			);

			"))
        	echo "Successfully Inserted";
        else
    	    echo "Insertion Failed";
	}



?>


