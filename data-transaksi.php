<!DOCTYPE HTML>
<html>
	<head>
		<title>One Eighty Ingredients Recording</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/png" sizes="96x96" href="img/logo.png">

		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->

		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!-- <link href="css/bootstrap-datepicker.min.css" rel="stylesheet"> -->

		<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
	  <script>
	  $( function() {
	    $( "#datepicker1" ).datepicker({ dateFormat: 'dd/mm/yy' });
		  $( "#datepicker2" ).datepicker({ dateFormat: 'dd/mm/yy' });
		  $( "#datepicker3" ).datepicker({ dateFormat: 'dd/mm/yy' });
	  } );
	  </script>

		<link href="css/dataTables.bootstrap.min.css" rel="stylesheet">
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

			<?php
						$connection_string = "host=localhost dbname=dbsi user=postgres password=pass";
						$conn = pg_connect($connection_string);
						$result = pg_query($conn, "SELECT * FROM transaction ORDER BY transaction_id DESC");	
			?>
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Data Transaksi</h2>
						</header>

						<!-- Table -->
							<section class="tabel-transaksi">

									<table id="datatable" class="table table-bordered" cellspacing="0" width="100%">
								    				<thead>
														<tr>
															<th>ID</th>
															<th>Date</th>
															<th>Type</th>
															<th>Ingredient ID</th>
															<th>N of Changes</th>
															<th>Expired Date</th>
								              <th>User</th>
															<th>Changes Date</th>
															<th>Actions</th>
														</tr>
													</thead>

													<tfoot>
														<tr>
															<th>ID</th>
															<th>Date</th>
															<th>Type</th>
															<th>Ingredients ID</th>
															<th>N of Changes</th>
															<th>Expired Date</th>
								              <th>User</th>
															<th>Changes Date</th>
															<th>Actions</th>
														</tr>
													</tfoot>

													<tbody>


													<?php 

													while ($row = pg_fetch_row($result)) {

													?>

														<tr class = <?php echo $row[0]."tr" ?> >
															<td><?php echo $row[0]; ?></td>
															<td><?php echo $row[1]; ?></td>
															<td><?php echo $row[2]; ?></td>
															<td><?php echo $row[5]; ?></td>
															<td><?php echo $row[3]; ?></td>
															<td><?php echo $row[6]; ?></td>
															<td><?php echo $row[4]; ?></td>
															<td><?php echo $row[7]; ?></td>
								             				<td>
																<button 
																onclick='javascript:changeID(<?php echo $row[0];?>);'
																id= <?php echo $row[0] ?> class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" title="edit"><span class="glyphicon glyphicon-pencil"></span></button>

																<button onclick='javascript:confirmationDelete($(this)); return false;' 
																href='delete-transaksi-handler.php?id=<?php echo $row[0];?>&idbahan=<?php echo $row[5];?>'
																class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" title="delete"><span class="glyphicon glyphicon-trash"></span></button>
															</td>
															<!-- <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td> -->
														</tr>
													<?php 

													}

													?>	
													</tbody>
												</table>

							</section>
						<div class="row">
							<div class="6u 12u$(xsmall)">
								<ul class="actions">
									<li><a href="tambah-transaksi.php" class="button special">Tambah Transaksi</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<form method="GET" action="edit-transaksi-handler.php">
				<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      				<div class="modal-dialog">
    					<div class="modal-content">
          					<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        						<h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      						</div>
		          		<div class="modal-body">
							<input id="transactionid" class="form-control " type="hidden" value="XX" name="transactionid">
		    				<div class="form-group">
								<label>Type
									<select name="tipetransaksi" id="tipe-transaksi">
										<option value="">Tipe Transaksi</option>
										<option value="1">Inisiasi</option>
										<option value="2">Pengurangan</option>
										<option value="3">Penambahan</option>
									</select>
								</label>
		    				</div>	
							<?php
								$connection_string = "host=localhost dbname=dbsi user=postgres password=pass";
								$conn = pg_connect($connection_string);
								$result = pg_query($conn, "SELECT * FROM bahan ORDER BY id_bahan");	
							?>			
							<div class="form-group">
								<label>Ingredient ID
									<select name="idbahan" id="id-barang">
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
							<div class="form-group">
								<label>Number of Changes
									<input id="jumlahperubahan" class="form-control " type="text" name="jumlahperubahan">
								</label>
		    				</div>
							<div class="form-group">
								<label>Expired Date
									<input type="text" name ="tanggal-expired" class="form-control" placeholder="" id="datepicker1" />
								</label>
		    				</div>
							<div class="form-group">
								<input type="submit" value="Submit" class="special" />
		    				</div>
						</div>
        			</div>
  				</div>
    		</div>

    		</form>


			<!-- Footer -->
				<footer id="footer">

					<ul class="copyright">
						<li>&copy; All rights reserved.</li><li>2017</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
		<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>

		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


	  <!-- <script language="JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js" type="text/javascript"></script> -->

		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<script src="js/table.js"></script>
<!-- 		<script type="text/javascript">
	        $(document).ready(function() {
							var date_input = $('input[name="date"]');
							var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
							date_input.datepicker({
								format: 'dd/mm/yyyy',
								container : container,
								todayHighlight : true,
								autoclose : true,
							})
							// $('#datetimepicker1').datetimepicker();
	        })
	  </script>
 -->

 		<script type="text/javascript">

 			function confirmationDelete(anchor)
			{
			   var conf = confirm('Are you sure want to delete this record?');
			   if(conf)
			      window.location=anchor.attr("href");
			}

			function changeID(id) {
				document.getElementById("transactionid").value = id;
			}
			function changeType(type) {
				document.getElementById("tipetransaksi").value = type;
			}

		</script>
	</body>
</html>
