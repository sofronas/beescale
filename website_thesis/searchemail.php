<?php
	require 'settings.php';

	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if(!$conn){
		die("Connection failed: " . mysqli_connect_error());
	 	echo "failed";
	}

    $email = $_GET['email'];
    if($email == NULL){
    	echo "empty_email";
    	mysqli_close($conn);
    	die();	
    }
    $sql = "SELECT COUNT(*) AS num_rows FROM users
            WHERE email = '" . $email . "'";

    $result = mysqli_query($conn, $sql);
 	$check = mysqli_num_rows($result);

   	if($check > 0){
   		while($data = mysqli_fetch_assoc($result)){
			if($data["num_rows"]){
				$sql1 = "SELECT * FROM users WHERE email = '" . $email . "'";
				$result1 = mysqli_query($conn, $sql1);
				$check1 = mysqli_num_rows($result1);
				if($check1 > 0)
				{
					while($d = mysqli_fetch_assoc($result1)){
						$subject = 'Υπενθύμιση Κωδικού πρόσβασης στο site: Sofron Honey';

						$headers = "From: sofronas.konstantinos@gmail.com" . "\r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
						$message = 'Ο κωδικός σας είναι: <strong>';
						$message .= "".$d['password']."</strong>";
						mail($email, $subject, $message, $headers);
					}
				}
				echo $data["num_rows"];
			} else {
				echo $data["num_rows"];
			}
		}
	}
    

    mysqli_free_result($result);
    mysqli_close($conn);

?>