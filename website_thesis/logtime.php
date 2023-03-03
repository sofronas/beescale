<?php
	session_start();
	$inactive = 1800; //seconds
	if(!isset($_SESSION["log"]) || $_SESSION["log"] !== true)
    {
      header("Location: ../index.php");
      die();
    }
	if(isset($_SESSION['timeout']) ) {
		$session_life = time() - $_SESSION['timeout'];
		if($session_life > $inactive)
	    { 
	    	// echo "1";
	        session_destroy(); 
	        echo "1";
	        // header("Location: Logout.php");
	    }
	}
	$_SESSION['timeout'] = time();
?>