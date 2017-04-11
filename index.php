<?php
	$st = $_GET['st'];
	session_start();

	if (isset($st)) {
		if ($st == "out") {
			session_destroy();
			session_start();	
		}
	} 
	header("location: login.php");
?>