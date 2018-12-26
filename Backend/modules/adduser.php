<?php 
	if(isset($_POST['addNew']))
	{
		$name = $_POST['name'];
		$password = md5($_POST['password']);
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$permission = $_POST['status'];
		$birthday = $_POST['birthday'];
		$gender = $_POST['gender'];
		$time = date('Y-m-d');
		// echo date($time,strtotime($birthday));die;
		// $status = $_POST['status'];
		$sql = "INSERT INTO user (username,password,fullname,email,phone,address,birthday,gender,permission) VALUES('$name','$password','$fullname','$email','$phone','$address','$birthday',$gender,$permission)";
		// echo $sql; die;
		$result=mysqli_query($conn,$sql) or die("Failed: ".mysqli_error($conn));
		header("Location:index.php?module=listuser");
	}
 ?>

<div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title">Thêm user</div>

		<div class="panel-options">
			<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
			<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
		</div>
	</div>
	<div class="panel-body">
		<form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">UserName</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter UserName">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="password" name="password" placeholder="Enter Password">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Full Name">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter Full Name">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Phone</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Full Name">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Address</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Birthday</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="birthday" name="birthday" placeholder="Enter Birthday">
				</div>
			</div>
			<div class="form-group">
				<label>Gender</label>
				<label class="radio-inline">
					<input name="gender" value="1" checked="" type="radio">Male
				</label>
				<label class="radio-inline">
					<input name="gender" value="0" type="radio">Female
				</label>
			</div>
			<div class="form-group">
				<label>Status</label>
				<label class="radio-inline">
					<input name="status" value="1" checked="" type="radio">Super Admin
				</label>
				<label class="radio-inline">
					<input name="status" value="0" type="radio">Admin
				</label>
				<label class="radio-inline">
					<input name="status" value="2" type="radio">User
				</label>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name="addNew" class="btn btn-primary">Add User</button>
				</div>
			</div>
		</form>
	</div>
</div>