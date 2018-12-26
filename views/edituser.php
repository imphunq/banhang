<br><br><br>
<?php 
	if(isset($_SESSION['isLogin'])){
		$id = $_SESSION['isLogin'][0];
		$sql = "SELECT * FROM user WHERE id=$id";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($result);
		if(isset($_POST['addNew'])){
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$add = $_POST['address'];
			$sqlUpdate = "UPDATE `user` SET email='$email',phone='$phone',address='$add' WHERE id=$id";
			// die($sqlUpdate);
			$queryUpdate = mysqli_query($conn,$sqlUpdate);
			header("Location:index.php?view=edituser");
			echo "<div class='alert alert-success'>Cập nhật thành công</div>";
		}
	}
 ?>
<div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title text-danger">PROFILE</div>

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
					<input type="text" disabled="disabled" value="<?php echo $row[1] ?>" class="form-control" id="name" name="name" placeholder="Enter UserName">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
				<div class="col-sm-10">
					<input type="text" disabled="disabled" value="<?php echo $row[3] ?>" class="form-control" id="fullname" name="fullname" placeholder="Enter Full Name">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input type="email" value="<?php echo $row[4] ?>" class="form-control" id="email" name="email" placeholder="Enter Full Name">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Phone</label>
				<div class="col-sm-10">
					<input type="text" value="<?php echo $row[5] ?>" class="form-control" id="phone" name="phone">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Address</label>
				<div class="col-sm-10">
					<input type="text" value="<?php echo $row[6] ?>" class="form-control" id="address" name="address" placeholder="Enter Address">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Birthday</label>
				<div class="col-sm-10">
					<input type="text" disabled="disabled" value="<?php echo $row[8] ?>" class="form-control" id="birthday" name="birthday" placeholder="Enter Birthday">
				</div>
			</div>
			<div class="form-group">
				<label>Gender: <?php if($row[7]==1) echo "Male"; else echo "Female" ?></label>
				
					
				
			
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="submit" name="addNew" class="btn btn-primary" value="Update">
					<a href="index.php?view=changepass" name="changePass" class="btn btn-primary">Change Password</a>
				</div>
			</div>
		</form>
	</div>
</div>