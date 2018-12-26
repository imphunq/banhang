<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sql = "DELETE FROM slide WHERE id=".$id;
		mysqli_query($conn,$sql);
		header("Location:index.php?module=listslide");
	}
 ?>