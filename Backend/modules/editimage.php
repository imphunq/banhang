<?php 
		$path = "uploads/";
		$images = "";
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sqlI = "SELECT * FROM images WHERE id=".$id;
		$resultI = mysqli_query($conn,$sqlI);
		$row = mysqli_fetch_row($resultI);
		$images = $row[1];
	}
	if(isset($_POST['addNew']))
	{
		$status = $_POST['status'];
		$pro = $_POST['pro_id'];
		// echo $name . "<br/>" . $title . "<br/>" . $status;
		// var_dump($_FILES);die;
		if(isset($_FILES['image']))
		{
			if(isset($_FILES["image"]["name"])){
				// echo $_FILES['image']['name'];die;
				$expensions = array('image/jpeg','image/jpg','image/png');
				$file_type = $_FILES['image']['type'];
				if(in_array($file_type,$expensions)==true){
					if($_FILES['image']['error']){
						echo "Failed file";
					}else{
						$file = $_FILES['image']['tmp_name'];
						move_uploaded_file($file,"../".$path.$_FILES['image']['name']);
						$images .= $path.$_FILES['image']['name'];
					}
				}else{
					echo 'File không đúng định dạng';
				}
			}else{
				echo "Không có tên ảnh";
			}

		}else{
			echo 'Chưa chọn file';
		}

		$_POST['image'] = $images;
		// echo $images;die;
		$sql = "UPDATE images SET image='$images',product_id=$pro,status=$status WHERE id=".$id;
		// echo $sql; die;
		$result=mysqli_query($conn,$sql) or die("Failed: ".mysqli_error($conn));
		header("Location:index.php?module=listimage");
	}
 ?>

<div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title">Thêm danh mục</div>

		<div class="panel-options">
			<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
			<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
		</div>
	</div>
	<div class="panel-body">
		<form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Image</label>
				<div class="col-sm-10">
					<img src="../<?php echo $row[1] ?>" width="100px">
					<input type="file" id="image" name="image">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Danh mục</label>
				<div class="col-sm-10">
					<select id="pro_id" name="pro_id" class="form-control">
						<option value="">----Chọn product----</option>
						<?php 
							$catSelect = "SELECT * FROM product";
							$queryCat = mysqli_query($conn,$catSelect);
							while($rowCat = mysqli_fetch_assoc($queryCat)){
						 ?>
						<option <?php if($row[2]== $rowCat['id']) echo "selected" ?> value="<?php echo $rowCat['id'] ?>"><?php echo $rowCat['name'] ?></option>
						<?php } ?>
					</select>
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
					<button type="submit" name="addNew" class="btn btn-primary">Add Image</button>
				</div>
			</div>
		</form>
	</div>
</div>