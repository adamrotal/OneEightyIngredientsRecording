<?php
	echo "Hai :)\n";
	session_start();
	$tipetransaksi = $_GET["tipe-transaksi"];
	$idbahan = $_GET["id-barang"];
	$jumlahbarang = $_GET["jumlah-barang"];
	$tanggalexpired = $_GET["tanggal-expired"];
	$username = $_SESSION['USERNAME'];

	if (isset($idbahan)) {
		$connection_string = "host=localhost dbname=dbsi user=postgres password=pass";
		$conn = pg_connect($connection_string);
		if (!$conn) {
		  	echo "An error occurred.\n";
		} else {
			echo "Connection succes.\n";	
		}

		if ($tipetransaksi == 1) {
			$tipetransaksi = "Inisiasi";
		} else if ($tipetransaksi == 2) {
			$tipetransaksi = "Pengurangan";
		} else if ($tipetransaksi == 3) {
			$tipetransaksi = "Penambahan";
		}

		// $tanggalexpired = $tanggalexpired->format('Y-m-d');
		echo $tanggalexpired;

		$tanggalexpired = DateTime::createFromFormat('d/m/Y', $tanggalexpired);	

		$tanggalexpiredString = $tanggalexpired->format('Y-m-d');
		echo $tanggalexpiredString;

		$querystring = "INSERT INTO transaction(tanggal_transaksi, tipe_transaksi, jumlah_perubahan, username, id_bahan, tanggal_expired)
			VALUES 
			(NOW(), '$tipetransaksi', $jumlahbarang, '$username', $idbahan, '$tanggalexpiredString')";
		echo $querystring;

		$result = pg_query($conn, $querystring);	
		header("location: update-bahan-handler.php?idbahan=$idbahan");
	} else {
		// header("location: data-transaksi.php");

	}

?>