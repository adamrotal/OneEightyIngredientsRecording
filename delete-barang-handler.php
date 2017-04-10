<?php
	echo "Hai :)\n";
	$id = $_GET["id"];

	if (isset($id)) {
		$connection_string = "host=localhost dbname=dbsi user=postgres password=pass";
		$conn = pg_connect($connection_string);
		if (!$conn) {
		  	echo "An error occurred.\n";
		} else {
			echo "Connection succes.\n";	
		}
		
		$querystring = "DELETE FROM bahan WHERE id_bahan = $id";
		$result = pg_query($conn, $querystring);	
		echo $querystring."\n";
		
		header("location: data-barang.php");


	} else {
		header("location: data-barang.php");

	}

?>