<!-- 
    Name: Ptixiaki Ergasia
	Owner:  Sofronas Konstantinos Sotirios
	AM: 2022201600167
	Email: dit16167@uop.gr
-->
<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	header("location: index.php");
	exit;
?>