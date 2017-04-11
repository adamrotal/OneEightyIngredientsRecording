<?php
	echo "Hai :)\n";
	$id = $_GET["id"];
	$idbahan = $_GET["idbahan"];

	if (isset($id)) {
		$connection_string = "host=localhost dbname=dbsi user=postgres password=pass";
		$conn = pg_connect($connection_string);
		if (!$conn) {
		  	echo "An error occurred.\n";
		} else {
			echo "Connection succes.\n";	
		}
		
		$querystring = "DELETE FROM transaction WHERE transaction_id = $id";
		$result = pg_query($conn, $querystring);	
		echo $querystring."\n";
		

		header("location: update-bahan-handler.php?idbahan=$idbahan");


	} else {
		header("location: data-transaksi.php");

	}

?>