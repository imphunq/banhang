<?php 
ob_start();
session_start();
include 'connection.php';
if(isset($_GET['id'])&&isset($_GET['color'])&&isset($_GET['size'])&&isset($_GET['sl']))
{
	$wasFound=false;
	$id = $_GET['id'];
	$color = $_GET['color'];
	$size = $_GET['size'];
	$sql = "SELECT * FROM product WHERE id=".$id;
	$query = mysqli_query($conn,$sql);
	$data = mysqli_fetch_row($query);
		if(!empty($_SESSION['cart']))
		{
			// $cart = $_SESSION['cart'];
			foreach ($_SESSION['cart'] as $key => $value) {
				# code...
			if(array_key_exists($key, $_SESSION['cart'])&&$value['color']==$_GET['color']&&$value['size']==$_GET['size']){
				$_SESSION['cart'][$key] = array(
				'id'=>$id,
				'color'=>$_GET['color'],
				'size'=>$_GET['size'],
				'sl'=>(int)$value['sl']+$_GET['sl'],
				'nameProduct'=>$data[1],
				'price'=>$data[4],
				'image'=>$data[2]
				);
				$wasFound = true;
				break;
				// echo "Ton tai";
			}}if($wasFound==false){
				$_SESSION['cart'][] =  array(
				'id'=>$id,
				'color'=>$_GET['color'],
				'size'=>$_GET['size'],
				'sl'=>(int)$_GET['sl'],
				'nameProduct'=>$data[1],
				'price'=>$data[4],
				'image'=>$data[2]
			);
				// echo "Deo ton tai";
			}
		}else{
			// add cart lan thu nhat
			$_SESSION['cart'][] = array(
				'id'=>$id,
				'color'=>$_GET['color'],
				'size'=>$_GET['size'],
				'sl'=>(int)$_GET['sl'],
				'nameProduct'=>$data[1],
				'price'=>$data[4],
				'image'=>$data[2]
			);
		}
		



	// $_SESSION['cart'] = $cart;
	// print_r($_SESSION['cart']);die;
	$num=0;
	foreach ($_SESSION['cart'] as $key => $value) {
		$num += (int)$value['sl'];
	}
	echo $num;
}
?>