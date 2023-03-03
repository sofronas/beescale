<?php
	require 'settings.php';

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	 	echo "failed";
	}

	$username = $_POST['username'];
    $password = $_POST['password'];
	$phone = $_POST['phone'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    if(isset($username) && isset($phone) && isset($email) && isset($name) && isset($surname)){
        $sql =  "INSERT INTO `users`(`username`, `password`, `phone`, `gui`, `name`, `surname`, `email`) VALUES ('".$username ."','". $password ."','". $phone ."','0','". $name ."','". $surname ."','". $email ."')";

        // echo $sql . "\n";
        $result = mysqli_query($conn, $sql);
    } else {
        mysqli_close($conn);
        die();
    }
   	mysqli_close($conn);
?>