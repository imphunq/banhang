<?php 
	$username="";
	$pw="";
	$pass="";
	$check = false;
	if(isset($_POST['login']))
	{
		$username = $_POST['userName'];
		$pw = md5($_POST['password']);
		$pass = $_POST['password'];
		if($username==""||$pw=="")
		{
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo '<div class="alert alert-danger">Vui lòng điền đủ username và password. Please check again</div>';
		}

		if(isset($_POST['remember'])){
			setcookie('userName',$username);
			setcookie('password',$pass);
		}

		$sql = "SELECT * FROM user WHERE username = '$username' AND password='$pw'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($query);
		if($row){
			$_SESSION['isLogin'] = $row;
			header("location:index.php");
		}
	}

	if(isset($_COOKIE['userName'])&&isset($_COOKIE['password']))
	{
		$username = $_COOKIE['userName'];
		$pass = $_COOKIE['password'];
		$check = true;
	}
 ?>
<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					 <a href="">Login with Facebook</a>
					<form method="post" action="">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Login
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input value="<?php echo $username ?>" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="userName" id="userName" placeholder="User Name">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input value="<?php echo $pass ?>" class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" id="password" placeholder="Your Password">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>

						<div>
							<input <?php echo ($check)?"checked":"" ?> type="checkbox" name="remember" id="remember" value="1" /> 
							<label for="remember">Remember me !</label>
						</div>

						<input type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="login" value="Login" />
					</form>
					<a href="index.php?view=register">Create New Account</a>
					<a href="index.php?view=fogetpass">Forgot Password</a>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Coza Store Center 8th floor, 379 Hudson St, New York, NY 10018 US
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Lets Talk
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								+1 800 1236879
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Sale Support
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								contact@example.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	