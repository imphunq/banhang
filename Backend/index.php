
<?php 
session_start();
if(!isset($_SESSION['islogin']))
{
  header("Location:login.php");
}
date_default_timezone_get('Asia/Ho_Chi_Minh');
ob_start();
	include '../connection.php';
  // print_r($_SESSION['islogin']);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="assets/css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<?php 
  		include 'modules/header.php';
  	 ?>
	
    <div class="page-content">
    	<div class="row">
		  <?php 
		  		include 'modules/nav.php';
		   ?>
		  <div class="col-md-10">
		  	<div class="row">
		  		<div class="col-md-12">
		  			<?php 
		  				if(isset($_GET['module']))
		  				{
		  					$module = $_GET['module'];
		  					include("modules/".$module.".php");
		  				}
		  			 ?>
		  		</div>
		  	</div>
		  </div>
		</div>
    </div>

    <?php 
    	include("modules/footer.php");
     ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
  </body>
</html>