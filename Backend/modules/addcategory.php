<?php 
	if(isset($_POST['addNew']))
	{
		$name = $_POST['name'];
		$title = $_POST['title'];
		$status = $_POST['status'];
		// echo $name . "<br/>" . $title . "<br/>" . $status;
		// var_dump($_FILES);die;
		$path = "uploads/";
		$images = "";
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
		$sql = "INSERT INTO category (name,images,title,status) VALUES('$name','$images','$title',$status)";
		// echo $sql; die;
		$result=mysqli_query($conn,$sql) or die("Failed: ".mysqli_error($conn));
		header("Location:index.php?module=listcategory");
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
				<label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name Category">
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Image</label>
				<div class="col-sm-10">
					<input type="file" id="image" name="image">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Title</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
				</div>
			</div>
			<div class="form-group">
				<label>Status</label>
				<label class="radio-inline">
					<input name="status" value="1" checked="" type="radio">Visible
				</label>
				<label class="radio-inline">
					<input name="status" value="0" type="radio">Invisible
				</label>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name="addNew" class="btn btn-primary">Add Category</button>
				</div>
			</div>
		</form>
	</div>
</div>