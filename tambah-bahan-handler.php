<?php
	echo "Hai :)\n";

	$connection_string = "host=localhost dbname=dbsi user=postgres password=pass";
	$conn = pg_connect($connection_string);
	if (!$conn) {
	  	echo "An error occurred.\n";
	} else {
		echo "Connection succes.\n";	
	}
	
	$namabahan = $_GET["namabahan"];
	$satuan = $_GET["satuan"];

	$querystring = "INSERT INTO bahan(nama_bahan, satuan, jumlah_bahan, tanggal_pertama_expired) 
					VALUES ('$namabahan', '$satuan', 0, NULL)";

	$result = pg_query($conn, $querystring);	
	echo $querystring."\n";
	header("location: data-bahan.php");
?>