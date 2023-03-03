<?php
	require 'settings.php';

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	 	echo "failed";
	}

    $username = $_GET['username'];
    $password = $_GET['password'];
    if($username == NULL){
    	echo "empty_username";
    	mysqli_close($conn);
    	die();	
    }
    if($username == NULL){
    	echo "empty_password";
    	mysqli_close($conn);
    	die();	
    }
    $sql = "SELECT * FROM users
            WHERE username = '" . $username . "' AND password='" . $password ."'";

    $result = mysqli_query($conn, $sql);
 	$check = mysqli_num_rows($result);

   	if($check > 0){
   		while($data = mysqli_fetch_assoc($result)){
			echo "1";
		}
	} else {
		echo "3";
	}
    
    mysqli_close($conn);
?>