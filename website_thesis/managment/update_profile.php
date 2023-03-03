<?php
	require '../settings.php';
	session_start();

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	 	echo "failed";
	}
	if ($_SERVER['REQUEST_METHOD'] == 'GET') 
	{
		$username = $_GET['username'];
		$name = $_GET['name'];
		$surname = $_GET['surname'];
		$phone = $_GET['phone'];
		$email = $_GET['email'];
		$id = $_SESSION['id'];
		$checker = true;

		// 0 if strings are the same
		$username_changes = strcmp($username,$_SESSION['username']);
		$phone_changes = strcmp($phone,$_SESSION['phone']);
		$email_changes = strcmp($email,$_SESSION['email']);

		if($username_changes != 0){
			// check if username is already in db
			$sql_username = "SELECT COUNT(username) AS c FROM users WHERE username = '" . $username . "'";
			$result = mysqli_query($conn, $sql_username);
		 	$check = mysqli_num_rows($result);

		   	if($check > 0){
		   		while($data = mysqli_fetch_assoc($result)){
		   			if($data["c"] == 1){
		   				//user exist with this username
		   				echo "username";
		   				$checker = false;
		   				break;
		   			}
		   		}
		   	}
		}

		
		if($phone_changes != 0){
		   	// check if phone is already in db
			$sql_phone = "SELECT COUNT(phone) AS c FROM users WHERE phone = '" . $phone . "'";
			$result = mysqli_query($conn, $sql_phone);
		 	$check = mysqli_num_rows($result);

		   	if($check > 0){
		   		while($data = mysqli_fetch_assoc($result)){
		   			if($data["c"] == 1){
		   				//user exist with this phone
		   				echo "phone";
		   				$checker = false;
		   				break;
		   			}
		   		}
		   	}
		}


		if($email_changes != 0){
		   	// check if email is already in db
			$sql_email = "SELECT COUNT(email) AS c FROM users WHERE email = '" . $email . "'";
			$result = mysqli_query($conn, $sql_email);
		 	$check = mysqli_num_rows($result);

		   	if($check > 0){
		   		while($data = mysqli_fetch_assoc($result)){
		   			if($data["c"] == 1){
		   				//user exist with this email
		   				echo "email";
		   				$checker = false;
		   				break;
		   			}
		   		}
		   	}
		}

	   	if($checker == true){
	   		// no problem
			$sql = 'UPDATE users 
			SET name = "'.$_GET['name']. 
			'", surname = "' . $_GET['surname'] .
			'",phone = "' . $_GET['phone'] .
			'",email = "' . $_GET['email'] .
			'",username = "' . $_GET['username'] .
			'"WHERE id = ' . $_SESSION['id'];
			// echo $sql .'<br>';
			$result = mysqli_query($conn, $sql);
			if($result == true){
				$_SESSION['username'] = $_GET['username'];
				$_SESSION['name'] = $_GET['name'];
				$_SESSION['surname'] = $_GET['surname'];
				$_SESSION['phone'] = $_GET['phone'];
				$_SESSION['email'] = $_GET['email'];
				$_SESSION["user"] = $_GET['username'];
				echo "Changes have been done";	
			} elseif($result == false){
				echo "Cound not make the changes";
			}
		}
	}

    mysqli_close($conn);
?>