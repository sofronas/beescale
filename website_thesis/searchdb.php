<?php
	require 'settings.php';
	session_start();

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	 	echo "failed";
	}
	
	$username = $_POST['username'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	
	$sql = "SELECT * FROM users
		WHERE username = '".$username;

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo "exist_username";
		mysqli_close($conn);
		die();
	}

	$sql = "SELECT * FROM users
		WHERE phone = '".$phone;

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo "exist_phone";
		mysqli_close($conn);
		die();
	}

	$sql = "SELECT * FROM users
		WHERE email = '".$email;

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo "exist_email";
		mysqli_close($conn);
		die();
	}

?>