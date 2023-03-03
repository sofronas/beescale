<!-- 
  Name: Ptixiaki Ergasia
  Owner:  Sofronas Konstantinos Sotirios
  AM: 2022201600167
  Email: dit16167@uop.gr
-->

<?php
	if (empty($_GET)) {
	    header("Location: error.php");
		die();
	} else{
		$to = "sofronas.konstantinos@gmail.com";
	    $from = $_GET['email'];
	    $name = $_GET['name'];
	    $subject = "Sofron Honey | Form submission";
	    $message = $name . " wrote the following:" . "\n\n" . $_GET['message'];

	    $headers = "From:" . $from;
	    mail($to,$subject,$message,$headers);
	    header("Location: thankyou.php");
		die();
	}
?>