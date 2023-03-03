<?php
	// connect to database
	require "../settings.php";

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	 	echo "failed";
	}

	$imer = date("Y-m-d");
	// $imer = date('Y-m-d',strtotime($imer));
	echo $imer . "<br>";
	$user = $_GET['user'];
	$ther = $_GET['thermokrasia'];
	$ugr = $_GET['ugrasia'];
	$bar = $_GET['baros'];
	

	print_r($_REQUEST);
	$sql = "INSERT INTO data (user,imerominia, thermokrasia, ugrasia, baros)
			VALUES ('" . $user . "', '" . $imer . "', " . $ther . ", " . $ugr . ", " . $bar . ")
			";
	echo $sql;
	$result = mysqli_query($conn, $sql);

	mysqli_close($conn);
?>