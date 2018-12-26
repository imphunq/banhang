<?php 
	$servername = "localhost";
	$username = "root";
	$password ="";
	$dbname = "banhang";
	$conn = mysqli_connect($servername,$username,$password,$dbname) or die('Failed connection');
	mysqli_set_charset($conn,"utf8");
 ?>