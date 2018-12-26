<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sql = "UPDATE `order` SET status=2 WHERE id=$id";
		mysqli_query($conn,$sql);
		header("Location:index.php?module=listorder");
	}
 ?>