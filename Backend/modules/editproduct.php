<?php 
		$path = "uploads/";
		$images = "";
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sqlSelect = "SELECT * FROM product WHERE id=".$id;
		$resultPro = mysqli_query($conn,$sqlSelect);
		$row = mysqli_fetch_row($resultPro);
		$images = $row[2];
	}
	if(isset($_POST['addNew']))
	{
		$name = $_POST['name'];
		$cat_id = $_POST['cat_id'];
		$price = $_POST['price'];
		$sale = $_POST['sale_of'];
		$description = $_POST['description'];
		$status = $_POST['status'];
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
		$sql = "UPDATE product SET name = '$name',image = '$images',cat_id='$cat_id',price = '$price',sale_of='$sale',description='$description',status=$status WHERE id=$id";
		// echo $sql; die;
		$result=mysqli_query($conn,$sql) or die("Failed: ".mysqli_error($conn));
		header("Location:index.php?module=listproduct");
	}
 ?>

<div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title">Thêm sản phẩm</div>

		<div class="panel-options">
			<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
			<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
		</div>
	</div>
	<div class="panel-body">
		<form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" value="<?php echo $row[1] ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Image</label>
				<div class="col-sm-10">
					<img src="../<?php echo $row[2] ?>" width="100px">
					<input type="file" id="image" name="image">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Danh mục</label>
				<div class="col-sm-10">
					<select id="cat_id" name="cat_id" class="form-control">
						<option value="">----Chọn danh mục----</option>
						<?php 
							$catSelect = "SELECT * FROM category";
							$queryCat = mysqli_query($conn,$catSelect);
							while($rowCat = mysqli_fetch_assoc($queryCat)){
						 ?>
						<option <?php if($rowCat['id']==$row[3]) echo "selected" ?> value="<?php echo $rowCat['id'] ?>"><?php echo $rowCat['name'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">price</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="price" name="price" value="<?php echo $row[4] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Sale</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="sale_of" name="sale_of" value="<?php echo $row[5] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Descripton</label>
				<div class="col-sm-10">
					<textarea placeholder="Description product" class="form-control" id="description" name="description"><?php echo $row[6] ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label>Status</label>
				<label class="radio-inline">
					<input name="status" value="1" <?php if($row[7]==1) echo "checked" ?> checked="" type="radio">Visible
				</label>
				<label class="radio-inline">
					<input name="status" value="0" <?php if($row[7]==0) echo "checked" ?> type="radio">Invisible
				</label>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name="addNew" class="btn btn-primary">Add Product</button>
				</div>
			</div>
		</form>
	</div>
</div>