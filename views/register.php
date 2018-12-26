
<br><br><br>
<?php 

	if(isset($_POST['addNew']))
	{
		$username = $_POST['username'];
		$pw = md5($_POST['password']);
		$repw = md5($_POST['repassword']);
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$add = $_POST['address'];
		$gender = $_POST['gender'];
		$birth = $_POST['birthDate'];
		$sqlUser = "SELECT * FROM user";
		$result = mysqli_query($conn,$sqlUser);
		$check=true;
		while($row = mysqli_fetch_assoc($result))
		{
			if($row['username']==$username)
			{
				echo '<div class="alert alert-danger">User name đã được sử dụng</div>';
				$check=false;
			}
			if($row['email']==$email)
			{
				echo '<div class="alert alert-danger">Email đã được sử dụng</div>';
				$check=false;
			}
		}
		if(strcasecmp($pw, $repw)!=0)
		{
			echo '<div class="alert alert-danger">Mật khẩu không khớp</div>';
			$check=false;
		}
		if($username==""||$pw==""||$fullname==""||$email==""||$phone==""||$add=="")
		{
			echo '<div class="alert alert-danger">Vui lòng điền đầy đủ thông tin</div>';
			$check=false;
		}
		if($check==true){
			$sql = "INSERT INTO user (username,password,fullname,email,phone,address,gender,birthday,permission) VALUES ('$username','$pw','$fullname','$email','$phone','$add',$gender,'$birth',2)";
			$query = mysqli_query($conn,$sql);
			// echo $sql;die;
			// header("location:index.php?view=register");
		}
	}
 ?>
<div class="container">
	<form class="form-horizontal" role="form" method="post">
		<h2>Registration Form</h2>
		
		<div class="form-group">
			<label for="password" class="col-sm-3 control-label">Username</label>
			<div class="col-sm-9">
				<input type="text" id="username" name="username" placeholder="Username" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="password" class="col-sm-3 control-label">Password</label>
			<div class="col-sm-9">
				<input type="password" id="password" name="password" placeholder="Password" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="password" class="col-sm-3 control-label">RePassword</label>
			<div class="col-sm-9">
				<input type="password" id="repassword" name="repassword" placeholder="Password" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="firstName" class="col-sm-3 control-label">Full Name</label>
			<div class="col-sm-9">
				<input type="text" id="fullname" name="fullname" placeholder="Full Name" class="form-control" autofocus>
				<span class="help-block">Last Name, First Name, eg.: Smith, Harry</span>
			</div>
		</div>

		<div class="form-group">
			<label for="email" class="col-sm-3 control-label">Email</label>
			<div class="col-sm-9">
				<input type="email" id="email" name="email" placeholder="Email" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="phone" class="col-sm-3 control-label">Phone</label>
			<div class="col-sm-9">
				<input type="text" id="phone" name="phone" placeholder="Phone" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="address" class="col-sm-3 control-label">Address</label>
			<div class="col-sm-9">
				<input type="text" id="address" name="address" placeholder="Adress" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">Gender</label>
			<div class="col-sm-6">
				<div class="row">
					<div class="col-sm-4">
						<label class="radio-inline">
							<input type="radio" checked name="gender" id="femaleRadio" value="0">Female
						</label>
					</div>
					<div class="col-sm-4">
						<label class="radio-inline">
							<input type="radio" name="gender" id="maleRadio" value="1">Male
						</label>
					</div>
				</div>
			</div>
		</div> <!-- /.form-group -->

		<div class="form-group">
			<label for="birthDate" class="col-sm-3 control-label">Date of Birth</label>
			<div class="col-sm-9">
				<input type="date" id="birthDate" name="birthDate" class="form-control">
				<span class="help-block">Eg(1-1-1999)</span>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-9 col-sm-offset-3">
				<button type="submit" name="addNew" class="btn btn-primary btn-block">Register</button>
			</div>
		</div>
	</form> <!-- /form
</div> <!-- ./container -->
		<style type="text/css">


			*[role="form"] {
				max-width: 530px;
				padding: 15px;
				margin: 0 auto;
				background-color: #fff;
				border-radius: 0.3em;
			}

			*[role="form"] h2 {
				margin-left: 5em;
				margin-bottom: 1em;
			}
		</style>