<?php 
	session_start();
	include 'connection.php';
	if(isset($_GET['id'])&&isset($_GET['wish']))
	{
		$id = $_GET['id'];
		$sql = "SELECT * FROM product WHERE id=".$id;
		$result = mysqli_query($conn,$sql) or die($sql);
		$row = mysqli_fetch_row($result);

		if(!empty($_SESSION['wishlist'])){
			$_SESSION['wishlist'][] = array(
				'id' => $id,
				'nameProduct'=>$row[1],
				'image'=>$row[2],
				'sl'=>1,
				'price'=>$row[4]
			);
		}else{
			$_SESSION['wishlist'][] = array(
				'id' => $id,
				'nameProduct'=>$row[1],
				'image'=>$row[2],
				'sl'=>1,
				'price'=>$row[4]
			);
		}
		// echo "<pre>";
		// die($_SESSION['wishlist']);
		$num = 0;
		foreach ($_SESSION['wishlist'] as $key => $value) {
			$num += $value['sl'];
		}
		echo $num;
	}
 ?>