<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sqlUser = "SELECT * FROM user WHERE id=".$id;
		$resultUser = mysqli_query($conn,$sqlUser);
		$row = mysqli_fetch_row($resultUser);
		// echo $row[9];
		// echo "<pre>";print_r($row);die;
	}
	if(isset($_POST['addNew']))
	{
		$name = $_POST['name'];
		$password = md5($_POST['password']);
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$status = $_POST['status'];
		$birthday = $_POST['birthday'];
		$gender = $_POST['gender'];
		// $status = $_POST['status'];
		$sql = "UPDATE user SET username='$name',password='$password',fullname='$fullname',email='$email',phone='$phone',address='$address',birthday='$birthday',gender=$gender,permission=$status WHERE id=".$id;
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
					<input type="text" class="form-control" id="name" name="name" value="<?php echo $row[1] ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="password" name="password" value="<?php echo $row[2] ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $row[3] ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" value="<?php echo $row[4] ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Phone</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row[5] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Address</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="address" name="address" value="<?php echo $row[6] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Birthday</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="birthday" name="birthday"value="<?php echo $row[8] ?>">
				</div>
			</div>
			<div class="form-group">
				<label>Gender</label>
				<label class="radio-inline">
					<input name="gender" value="1" <?php if($row[7]==1) echo "checked" ?>  type="radio">Male
				</label>
				<label class="radio-inline">
					<input name="gender" value="0" <?php if($row[7]==0) echo "checked" ?> type="radio">Female
				</label>
			</div>
			<div class="form-group">
				<label>Permission</label>
				<label class="radio-inline">
					<input name="status" value="1" <?php if($row[9]==1) echo "checked" ?> type="radio">Super Admin
				</label>
				<label class="radio-inline">
					<input name="status" value="0" <?php if($row[9]==0) echo "checked" ?> type="radio">Admin
				</label>
				<label class="radio-inline">
					<input name="status" value="2" <?php if($row[9]==2) echo "checked" ?> type="radio">User
				</label>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name="addNew" class="btn btn-primary">Edit User</button>
				</div>
			</div>
		</form>
	</div>
</div>