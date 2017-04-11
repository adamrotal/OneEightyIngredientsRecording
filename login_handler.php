<?php
	$username = $_POST["username"];
	$password = $_POST["password"];

	if (isset($username) && isset($password)) {
		$connection_string = "host=localhost dbname=dbsi user=postgres password=pass";
		$conn = pg_connect($connection_string);
		if (!$conn) {
		  	echo "An error occurred.\n";
		} else {
			echo "succes";	
		}

		$result = pg_query($conn, "SELECT * FROM users WHERE username = '$username' and password = '$password'");	
		$rows = pg_num_rows($result);

		if ($rows == 1) {
			session_start();
			$_SESSION['USERNAME'] = $username;	

			header("location: data-bahan.php");
		} else {
			header("location: login.php?stat=fail");
		}


	} else {
		header("location: login.php?stat=incpt");

	}
?>