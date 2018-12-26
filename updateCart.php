<?php 
	ob_start();
	session_start();
	include 'connection.php';
	if(isset($_SESSION['cart']))
	{
		if(isset($_GET['key'])&&isset($_GET['sl']))
		{
			$key = $_GET['key'];
			if(array_key_exists($key, $_SESSION['cart']))
			{
				if($_GET['sl']>0){
					$_SESSION['cart'][$key] = array(
					'id'=>$id,
					'color'=>$_SESSION['cart'][$key]['color'],
					'size'=>$_SESSION['cart'][$key]['size'],
					'sl'=>(int)$_GET['sl'],
					'nameProduct'=>$_SESSION['cart'][$key]['nameProduct'],
					'price'=>$_SESSION['cart'][$key]['price'],
					'image'=>$_SESSION['cart'][$key]['image']
					);
				}else{
					unset($_SESSION['cart'][$key]);
				}
			}
		}
	}
 ?>