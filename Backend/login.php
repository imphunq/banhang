<?php 
	include '../connection.php';
	session_start();
	if(isset($_POST['login']))
	{
		$name = $_POST['name'];
		$pw = md5($_POST['password']);
		// echo $pw;die;

		if($name=="" || $pw=="")
		{
			echo "Please Enter Your Password And Email";
		}else{
			$sql = "SELECT * FROM user WHERE username='$name' AND password='$pw' AND (permission=1 OR permission=0)";
			// die($sql);
			$result = mysqli_query($conn,$sql) or die($sql);
			// die($result);
			$row = mysqli_num_rows($result);
			$data = mysqli_fetch_array($result);

			// echo $row;die;
			if($row)
			{
				$_SESSION['user'] = $_POST['name'];
				$_SESSION['pass'] = $_POST['password'];
				$_SESSION['islogin'] = $data;
				header("Location:index.php");
			}else{
				echo "<div class='alert alert-danger'>Wrong User, Wrong password</div>";
			}
		}

		// $_SESSION['user'] = $_POST['email'];
		// $_SESSION['pass'] = $_POST['password'];
		// print_r($_SESSION);die;
	}
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
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.html">Bootstrap Admin Theme</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Sign In</h6>
			               <!--  <div class="social">
	                            <a class="face_login" href="#">
	                                <span class="face_icon">
	                                    <img src="images/facebook.png" alt="fb">
	                                </span>
	                                <span class="text">Sign in with Facebook</span>
	                            </a>
	                            <div class="division">
	                                <hr class="left">
	                                <span>or</span>
	                                <hr class="right">
	                            </div>
	                        </div> -->
	                        <form method="post">
			                <input class="form-control" name="name" type="text" placeholder="user address">
			                <input class="form-control" name="password" type="password" placeholder="Password">
			                <div class="action">
			                    <input class="form-control" type="submit" value="Login" name="login">
			                </div>       
			                </form>         
			            </div>
			        </div>

			        <!-- <div class="already">
			            <p>Don't have an account yet?</p>
			            <a href="signup.html">Sign Up</a>
			        </div> -->
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
  </body>
</html>