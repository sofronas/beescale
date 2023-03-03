<?php
	require 'settings.php';

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	 	echo "failed";
	}

	$username = $_POST['username'];
	$phone = $_POST['phone'];
    $email = $_POST['email'];

    $final = 0;

    $sql = "SELECT * FROM users
            WHERE email = '" . $email . "'";

    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);

	$final = $final + $check;

	$sql = "SELECT * FROM users
            WHERE phone = '" . $phone . "'";

    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);

    $final = $final + $check;


   	$sql = "SELECT * FROM users
            WHERE username = '" . $username . "'";

    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);

    // print_r($check);
    $final = $final + $check;
   //  if($check > 0){
   // 		while($data = mysqli_fetch_assoc($result)){
			// if($data["u"] == 1){
   // 				echo "username_exists";
   // 			}
   // 		}
   // 		// mysqli_close($conn);
   // 		// die();
   // 	}
   	echo $final;
   	mysqli_close($conn);
?>