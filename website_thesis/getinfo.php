<?php
	require 'settings.php';
	session_start();

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	 	echo "failed";
	}
	
	$user = $_GET['username'];
	$pass = $_GET['password'];

	if(!isset($user) && !isset($pass))
	{
		// echo $user;
		// echo "<br>";
		// echo $pass;
		$_SESSION['log'] = true;
		$_SESSION['user'] = $user;
	}
	else {
		$_SESSION['log'] = false;
	}
	
	$sql = "SELECT * FROM users
		WHERE username = '".$user."'
		AND password = '".$pass."'";
	echo $sql;
	$result = mysqli_query($conn, $sql);
	$name = "";
	$surname = "";
	$phone = "";
	$id = "";
	$email = "";
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_row($result)) {
			// $row1  = username
			// $row2  = password
			// $row4  = gui choice
			$user_username = $row[1];
			$name = $row[5];
			$surname = $row[6];
			$email = $row[7];
			$phone = $row[3];
			$id = $row[0];
		}
		$_SESSION['id'] = $id;
		$_SESSION['username'] = $user_username;
		$_SESSION['log'] = true;
		$_SESSION['user'] = $user;
		$_SESSION['name'] = $name;
		$_SESSION['surname'] = $surname;
		$_SESSION['phone'] = $phone;
		$_SESSION['email'] = $email;
		$_SESSION['timeout'] = time();
		header("Location: index.php");
	} else {
	  	echo '<script language="javascript">';
		echo 'alert(Wrong data)';  //not showing an alert box.
		echo '</script>';
		header("Location: index.php");
		exit;
	}

	mysqli_close($conn);
?>