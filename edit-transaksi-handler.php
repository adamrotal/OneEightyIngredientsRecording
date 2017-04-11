<?php
	echo "Hai :)\n";
	session_start();
	$transactionid = $_GET["transactionid"];
	$tipetransaksi = $_GET["tipetransaksi"];
	$idbahan = $_GET["idbahan"];
	$jumlahperubahan = $_GET["jumlahperubahan"];
	$tanggalexpired = $_GET["tanggal-expired"];
	$username = $_SESSION['USERNAME'];

	echo $tipetransaksi . " " . $idbahan . " " . $jumlahperubahan . " " . $tanggalexpired . " " . $username . " ";

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

		$querystring = "UPDATE transaction
			SET
			tanggal_transaksi = NOW(), 
			tipe_transaksi = '$tipetransaksi',
			jumlah_perubahan = $jumlahperubahan, 
			username = '$username', 
			id_bahan = $idbahan, 
			tanggal_expired = '$tanggalexpiredString'
			WHERE 
			transaction_id = $transactionid;";

		echo $querystring;

		$result = pg_query($conn, $querystring);	
		
		header("location: update-bahan-handler.php?idbahan=$idbahan");
	} else {
		header("location: data-transaksi.php");

	}

?>