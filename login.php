<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="96x96" href="img/logo.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>One Eighty Ingredients Recording</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row-fluid user-row">
                            <img src="img/logo.png" class="logo-180 img-responsive" alt="logo-180"/>
                        </div>
                        <h4>One Eighty Ingredients Recording</h4>
                        <?php
                        	session_start();
	                    	if (isset($_GET["stat"]) && ($_GET["stat"] == "incpt")) { ?>
	                        	<h5 style="color:red">Please insert username and password in the textfield</h5>
	                    	<?php } ?>
                        <?php
	                    	if (isset($_GET["stat"]) && ($_GET["stat"] == "fail")) { ?>
	                        	<h5 style="color:red">Login failed.</h5>
	                    	<?php } ?>	                    	
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form" class="form-signin" action="login_handler.php" method="POST">
                                <label class="panel-login">
                                    <div class="login_result"></div>
                                </label>
                                <input class="form-control" placeholder="Username" id="username" name="username" type="text">
                                <input class="form-control" placeholder="Password" id="password" name="password" type="password">
                                <br>
                                <input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>