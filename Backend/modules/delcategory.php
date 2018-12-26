<?php 
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "DELETE FROM category WHERE id=".$id;
		mysqli_query($conn,$sql);
		header("Location: index.php?module=listcategory");
	}
 ?>