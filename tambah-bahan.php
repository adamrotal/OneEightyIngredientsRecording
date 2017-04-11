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

		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->

		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
		<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

		<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">

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
							<h2>Tambah Bahan</h2>
						</header>

						<!-- Form -->
							<section>
								<form method="get" action="tambah-bahan-handler.php">
									<div class="row uniform 50%">
										<div class="6u 12u$(xsmall)">
											<label>Ingredient Name
												<input type="text" name="namabahan" id="namabahan" value="" placeholder="" />
											</label>
										</div>
										<div class="6u$ 12u$(xsmall)">
											<label>Unit
												<input type="text" name="satuan" id="satuan" value="" placeholder="" />
											</label>
										</div>
										
										<div class="12u$">
											<ul class="actions">
												<li><input type="submit" value="Submit" class="special" /></li>
												<li><input type="reset" value="Cancel" onclick="location.href='data-bahan.php';"/></li>
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
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.scrolly.min.js"></script>
			<script src="js/jquery.dropotron.min.js"></script>
			<script src="js/jquery.scrollex.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="js/main.js"></script>

	</body>
</html>
