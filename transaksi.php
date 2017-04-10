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
	    $( "#datepicker1" ).datepicker();
		  $( "#datepicker2" ).datepicker();
		  $( "#datepicker3" ).datepicker();
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
							<li><a href="transaksi.php">Transaksi</a></li>
							<li><a href="data-barang.php">Data Barang</a></li>
							<li><a href="login.php" class="button special">Log Out</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Transaksi</h2>
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

													<?php
																$connection_string = "host=localhost dbname=dbsi user=postgres password=pass";
																$conn = pg_connect($connection_string);
																$result = pg_query($conn, "SELECT * FROM transaction");	
													?>



													<?php 

													while ($row = pg_fetch_row($result)) {

													?>

													<tbody>
														<tr>
															<td><?php echo $row[0]; ?></td>
															<td><?php echo $row[1]; ?></td>
															<td><?php echo $row[2]; ?></td>
															<td><?php echo $row[5]; ?></td>
															<td><?php echo $row[3]; ?></td>
															<td><?php echo $row[6]; ?></td>
															<td><?php echo $row[4]; ?></td>
															<td><?php echo $row[7]; ?></td>
								             		<td>
																<button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" title="edit"><span class="glyphicon glyphicon-pencil"></span></button>
																<button onclick='javascript:confirmationDelete($(this)); return false;' 
																href='delete-transaksi-handler.php?id=<?php echo $row[0];?>'
																class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" title="delete"><span class="glyphicon glyphicon-trash"></span></button>
															</td>
														</tr>
													<?php 

													}

													?>													
													</tbody>
												</table>

							</section>


					</div>
				</div>

				<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      		<div class="modal-dialog">
    				<div class="modal-content">
          		<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        				<h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      				</div>
          		<div class="modal-body">
          			<div class="form-group">
									<label>Date
	                    <input type='text' class="form-control" placeholder="25/04/2011" id="datepicker1" />
									</label>
								</div>
        				<div class="form-group">
									<label>Type
										<input class="form-control " type="text" placeholder="Food">
									</label>
        				</div>
								<div class="form-group">
									<label>Ingredient ID
										<input class="form-control " type="text" placeholder="1234567890">
									</label>
        				</div>
								<div class="form-group">
									<label>Number of Changes
										<input class="form-control " type="text" placeholder="0">
									</label>
        				</div>
								<div class="form-group">
									<label>Expired Date
										<input class="form-control " type="text" placeholder="25/04/2014" id="datepicker2">
									</label>
        				</div>
								<div class="form-group">
									<label>User
										<input class="form-control " type="text" placeholder="James">
									</label>
        				</div>
								<div class="form-group">
									<label>Changes Date
										<input class="form-control " type="text" placeholder="25/04/2012" id="datepicker3">
									</label>
        				</div>
							</div>
          		<div class="modal-footer ">
        				<button type="button" class="btn btn-warning btn-lg" style="width: 100%;" data-dismiss="modal" data-toggle="modal" data-target="#edit-success"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      				</div>
        		</div>
    			<!-- /.modal-content -->
  				</div>
      	<!-- /.modal-dialog -->
    		</div>

				<div class="modal fade" id="edit-success" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      		<div class="modal-dialog">
    				<div class="modal-content">
	          	<div class="modal-body">
			         <center><h4>Edit Success!</h4></center>
	      			</div>
		          <div class="modal-footer ">
		        		<button type="button" class="btn btn-danger btn-lg" style="width: 100%;" data-dismiss="modal"><span class="glyphicon glyphicon-ok-sign"></span> OK</button>
		      		</div>
        		</div>
    				<!-- /.modal-content -->
  				</div>
      	<!-- /.modal-dialog -->
    		</div>

				<div class="modal fade" id="delete-success" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      		<div class="modal-dialog">
    				<div class="modal-content">
	          	<div class="modal-body">
			         <center><h4>Delete Success!</h4></center>
	      			</div>
		          <div class="modal-footer ">
		        		<button type="button" class="btn btn-danger btn-lg" style="width: 100%;" data-dismiss="modal"><span class="glyphicon glyphicon-ok-sign"></span> OK</button>
		      		</div>
        		</div>
    				<!-- /.modal-content -->
  				</div>
      	<!-- /.modal-dialog -->
    		</div>

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
		<script type="text/javascript">
			function confirmationDelete(anchor)
			{
			   var conf = confirm('Are you sure want to delete this record?');
			   if(conf)
			      window.location=anchor.attr("href");
			}
		</script>

	</body>
</html>
