<?php
	require 'settings.php';
	session_start();

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	 	echo "failed";
	}
	
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$phone = $_POST['phone'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	
	if(isset($user) && isset($pass) && isset($phone) && isset($name) && isset($surname) && isset($email))
	{	
		// $sql = "INSERT INTO `users` (username,password,phone,gui,name,surname,email) VALUES ('" . $user . "', '" . $pass . "', '" . $phone . ", '" . "'0','" . $name . "', '" . $surname .  "', '" . $email . ")
		// 	";
		$sql =	"INSERT INTO `users`(`username`, `password`, `phone`, `gui`, `name`, `surname`, `email`) VALUES ('".$user ."','". $pass ."','". $phone ."','0','". $name ."','". $surname ."','". $email ."')";
		// echo $sql;
		$result = mysqli_query($conn, $sql);
		if($result == true){
			echo "Success";
		} else {
			echo "Failed";
		}
	}
	else {
		// print_r($_POST);
		echo "Failed 1";
	}

	mysqli_close($conn);
?>