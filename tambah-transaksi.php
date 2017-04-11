<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>One Eighty Ingredients Recording</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" sizes="96x96" href="img/logo.png">

		<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
	  <script>
		  $(function() {
		    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
		  });
	  </script>


  	<link href="css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="css/main.css" />
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<img src="img/logo.png" alt="">
					<h1 id="logo"><a href="#">One Eighty Ingredient Recording</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="data-transaksi.php">Transaksi</a></li>
							<li><a href="data-bahan.php">Data Bahan</a></li>
							<li><a href="index.php?st=out" class="button special">Log Out</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Tambah Transaksi</h2>
						</header>

						<!-- Form -->
							<section>
								<form method="get" action="tambah-transaksi-handler.php">
									<div class="row uniform 50%">
										<div class="12u$">
											<div class="select-wrapper">
												<label>Transaction Type
													<select name="tipe-transaksi" id="tipe-transaksi">
														<option value="">Tipe Transaksi</option>
														<option value="1">Inisiasi</option>
														<option value="2">Pengurangan</option>
														<option value="3">Penambahan</option>
													</select>
												</label>
											</div>
										</div>

										<?php
											$connection_string = "host=localhost dbname=dbsi user=postgres password=pass";
											$conn = pg_connect($connection_string);
											$result = pg_query($conn, "SELECT * FROM bahan ORDER BY id_bahan");	
										?>										
										<div class="12u$">
											<div class="select-wrapper">
												<label>Ingredient ID
													<select name="id-barang" id="id-barang">
														<option value="">ID Bahan</option>
													<?php 
														while ($row = pg_fetch_row($result)) {
													?>
														<option value=<?php echo $row[0]?>><?php echo $row[0]." - ".$row[1]?></option>
													<?php 
														}
													?>
													</select>
												</label>
											</div>
										</div>

										<div class="12u$">
											<label>Number of Ingredients
												<input type="number" name="jumlah-barang" min="0" value="" placeholder="" />
											</label>
										</div>
										<div class="12u$">
											<div class="form-group">
												<label>Expired Date
													<input type="text" name ="tanggal-expired" class="form-control" placeholder="" id="datepicker" />
												</label>
											</div>
										</div>
										<div class="12u$">
											<ul class="actions">
												<li><input type="submit" value="Submit" class="special" /></li>
												<li><input type="reset" value="Cancel" onclick="location.href='data-transaksi.html';"/></li>
											</ul>
										</div>
									</div>
								</form>
							</section>


					</div>
				</div>

			<!-- Footer -->
				<footer id="footer">
					<ul class="copyright">
						<li>&copy; All rights reserved.</li><li>2017</li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<script src="js/table.js"></script>

	</body>
</html>
