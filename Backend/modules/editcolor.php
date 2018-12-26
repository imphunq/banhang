<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sqlColor = "SELECT * FROM color WHERE id=".$id;
		$resultColor = mysqli_query($conn,$sqlColor);
		$row = mysqli_fetch_row($resultColor);
	}
	if(isset($_POST['addNew']))
	{
		$name = $_POST['name'];
		$status = $_POST['status'];
		$code = $_POST['code'];
		$sql = "UPDATE color SET name = '$name',status = $status,code=$code";
		// echo $sql; die;
		$result=mysqli_query($conn,$sql) or die("Failed: ".mysqli_error($conn));
		header("Location:index.php?module=listcolor");
	}
 ?>

<div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title">Thêm size</div>

		<div class="panel-options">
			<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
			<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
		</div>
	</div>
	<div class="panel-body">
		<form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Tên màu</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" value="<?php echo $row[1] ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Mã màu</label>
				<div class="col-sm-10"> 
					<input type="color" value="<?php echo $row[2] ?>" class="form-control" id="code" name="code" >
				</div>
			</div>
			<div class="form-group">
				<label>Status</label>
				<label class="radio-inline">
					<input name="status" value="1" <?php if($row[3]==1) echo "checked" ?> checked="" type="radio">Visible
				</label>
				<label class="radio-inline">
					<input name="status" value="0" <?php if($row[3]==0) echo "checked" ?> type="radio">Invisible
				</label>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name="addNew" class="btn btn-primary">Add Color</button>
				</div>
			</div>
		</form>
	</div>
</div>