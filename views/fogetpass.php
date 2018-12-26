<br><br><br>

<?php 
	// if(isset($_SESSION['isLogin']))
	// {
	// 	$id = $_SESSION['isLogin'][0];
	// }
	if(isset($_POST) && !empty($_POST))
	{
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$sql  = "SELECT * FROM `user` WHERE username = '$username'";
		// die($sql);
		$result = mysqli_query($conn,$sql);
		$count = mysqli_num_rows($result);
		if($count==1)
		{
			echo "<div class='alert alert-success'>Email will be sent to your email</div>";
		}else{
			echo "<div class='alert alert-danger'>Username does not exist in database</div>";
		}

		$row=mysqli_fetch_assoc($result);
		$id = $row['id'];
		$password=rand(999,99999);
		// echo $password;die;
		$password_hash = md5($password);
		$to = $row['email'];
		$subject = "Your Recovered Password";

		$message = "Please use this password to login ". $password;
		// $headers = "From: quangphunguyen232@gmail.com";
		mailSend($to,$subject,$message);
		echo "<div class='alert alert-success'>Your Password has been sent to your email</div>";
		$sqlUpdate = "UPDATE user SET password = '$password_hash' WHERE id=$id";
		// echo $sqlUpdate;die;
		mysqli_query($conn,$sqlUpdate);
		header("Location:index.php?view=login");
		
	}
 ?>
<form method="post">
	<h2>Forgot Password</h2>
	<div class="form-group">
		<label for="user_signin">Username</label>
		<input type="text" class="form-control" id="username" name="username">
	</div>
	<a href="index.php?view=login">Trở về Login</a>
	<button class="btn btn-primary" id="submit_change_pass">
		<span class="glyphicon glyphicon-ok">Forgot Password</span>
	</button>
</form>