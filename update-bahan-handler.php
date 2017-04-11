<?php
	echo "Hai :)<br><br><br>";

	$connection_string = "host=localhost dbname=dbsi user=postgres password=pass";
	$conn = pg_connect($connection_string);
	if (!$conn) {
	  	echo "An error occurred.<br><br>";
	} else {
		echo "Connection succes.<br><br>";	
	}
	
	$idbahan = $_GET["idbahan"];


	// jumlah bahan
	$conn = pg_connect($connection_string);
	$querystring = "SELECT * FROM transaction WHERE id_bahan = $idbahan ORDER BY transaction_id DESC";
	$result = pg_query($conn, $querystring);	

	$jumlahbahan = 0;

	while ($row = pg_fetch_row($result)) {
		echo $row[0]. " " 
		. $row[1] . " " 
		. $row[2] . " " 
		. $row[3] . " " 
		. $row[4] . " " 
		. $row[5] . " " 
		. $row[6] . " " 
		. $row[7]."<br>";

		if ($row[2] == "Penambahan") {
			$jumlahbahan = $jumlahbahan + $row[3];
		}

		if ($row[2] == "Pengurangan") {
			$jumlahbahan = $jumlahbahan - $row[3];
		}


		if ($row[2] == "Inisiasi") {
			$jumlahbahan = $jumlahbahan + $row[3];
			break;
		}
	}

	echo $jumlahbahan;
	echo "<br>";

	// tanggal expired
	$querystring = "SELECT max(tanggal_expired) FROM transaction WHERE id_bahan = $idbahan";
	$result = pg_query($conn, $querystring);	
	while ($row = pg_fetch_row($result)) {
		$tpe = $row[0];
		echo $tpe;
	}

	$queryUpdate = "UPDATE bahan SET jumlah_bahan = $jumlahbahan, tanggal_pertama_expired = '$tpe' WHERE id_bahan = $idbahan";
	$result = pg_query($conn, $queryUpdate);		
	echo $queryUpdate;
 
	header("location: data-transaksi.php");
?>