<?php
session_start(); 
include 'connection.php';
	// if(isset($_POST['mess'])&&isset($_POST['id'])){
	$cmt = $_POST['mess'];
	$id = $_POST['id'];
	$sao = $_POST['star'];
	if($cmt==""||$sao=="")
	{
		echo "<script>alert('Bạn phải điền bình luận và đánh giá trước khi submit')</script>";
		return false;
	}
// }
	if(isset($_SESSION['isLogin'])){
		$user_id = $_SESSION['isLogin'][0];
		$name = $_SESSION['isLogin'][3];
	}
	$sql = "INSERT INTO comment (product_id,content,status,user_id,rating) VALUES('$id','$cmt',1,$user_id,$sao)";
	// die($sql);
	$query = mysqli_query($conn,$sql);
	echo "<div id='test' class='flex-w flex-t p-b-68'>
		<div class='wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6'>
			<img src='images/avatar-01.jpg' alt='AVATAR'>
		</div>

		<div class='size-207'>
			<div class='flex-w flex-sb-m p-b-17'>
				<span class='mtext-107 cl2 p-r-20'>
					$name
				</span>";

	echo			"<span class='fs-18 cl11'>";
				for($i=0;$i<$sao;$i++){
					echo "<i class='zmdi zmdi-star'></i>";
				}

	echo			"</span>";
	echo		"</div>

			<p class='stext-102 cl6'>
				$cmt
			</p>
		</div>
	</div>";
 ?>