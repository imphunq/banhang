<?php 
	session_start();
	if ($_SESSION['islogin'][9]!=1) {
		header("Location:index.php?module=listuser");
	}
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sql = "DELETE FROM user WHERE id=".$id;
		$select  = "SELECT * FROM user WHERE id=".$id;
		$result = mysqli_query($conn,$select);
		$row=mysqli_fetch_array($result);
		if($row[9]==1){
			header("Location:index.php?module=listuser");
		}
		else if($_SESSION['islogin'][9]==0){
			header("Location:index.php?module=listuser");
		}
		else{
		mysqli_query($conn,$sql);
		header("Location:index.php?module=listuser");
	}
	}
 ?>