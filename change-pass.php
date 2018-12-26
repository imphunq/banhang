<?php 
	include 'connection.php';
	session_start();
	ob_start();

	if(!isset($_SESSION['isLogin']))
	{
		header("Location:index.php");
	}
	// nhan du lieu
	$id=$_SESSION['isLogin'][0];
	$oldPass = md5($_POST['old_pass']);
	$newPass = $_POST['new_pass'];
	$reNewPass = $_POST['re_new_pass'];

	if($oldPass != $_SESSION['isLogin'][2])
	{
		echo "<div class='alert alert-danger'>Mật khẩu cũ không chính xác</div>";
	}else if($newPass!=$reNewPass){
		echo "<div class='alert alert-danger'>Mật khẩu mới không khớp</div>";
	}else{
		$newPass = md5($newPass);
		$sql_change ="UPDATE user SET password='$newPass' WHERE id=$id";
		mysqli_query($conn,$sql_change);

		mysqli_close($conn);
		echo " <script>
			alert('Đổi mật khẩu thành công');
			location.reload();
		</script> ";

	}
 ?>