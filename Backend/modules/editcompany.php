<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sqlC = "SELECT * FROM thongtincongty WHERE id=".$id;
		$resultC = mysqli_query($conn,$sqlC);
		$row=mysqli_fetch_row($resultC);
	}
	if(isset($_POST['addNew']))
	{
		$name = $_POST['name'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$hotline = $_POST['hotline'];
		$status = $_POST['status'];
		$sql = "UPDATE thongtincongty SET tencongty = '$name',address='$address',phone='$phone',email='$email',hotline='$hotline',status=$status WHERE id=".$id;
		// echo $sql; die;
		$result=mysqli_query($conn,$sql) or die("Failed: ".mysqli_error($conn));
		header("Location:index.php?module=listcompany");
	}
 ?>

<div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title">Thêm company</div>

		<div class="panel-options">
			<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
			<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
		</div>
	</div>
	<div class="panel-body">
		<form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Tên công ty</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" value="<?php echo $row[1] ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Address</label>
				<div class="col-sm-10">
					<input type="text" value="<?php echo $row[2] ?>" class="form-control" id="address" name="address" >
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
				<div class="col-sm-10">
					<input type="text" value="<?php echo $row[3] ?>" class="form-control" id="phone" name="phone" >
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input type="text" value="<?php echo $row[4] ?>" class="form-control" id="email" name="email" >
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Hotline</label>
				<div class="col-sm-10">
					<input type="text" value="<?php echo $row[5] ?>" class="form-control" id="hotline" name="hotline" >
				</div>
			</div>
			<div class="form-group">
				<label>Status</label>
				<label class="radio-inline">
					<input name="status" value="1" <?php if($row[6]==1) echo "checked" ?> checked="" type="radio">Visible
				</label>
				<label class="radio-inline">
					<input name="status" value="0" <?php if($row[6]==0) echo "checked" ?> type="radio">Invisible
				</label>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name="addNew" class="btn btn-primary">Edit Company</button>
				</div>
			</div>
		</form>
	</div>
</div>