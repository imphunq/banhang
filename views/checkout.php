<br><br><br>

<?php 
if(isset($_SESSION['cart'])){
	if(isset($_POST['thanhtoan'])){
		$username = $_POST['name'];
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$add = $_POST['address'];
		$user_id = ($_SESSION['isLogin']) ? $_SESSION['isLogin'][0] : "0";
		$sqlInsertOrder = "INSERT INTO `order` (user_id,username,fullname,address,phone,email,status) VALUES('$user_id','$username','$fullname','$add','$phone','$email',1)";
			mysqli_query($conn,$sqlInsertOrder);
		// echo $sqlInsertOrder;die;
		$last_id = mysqli_insert_id($conn);
		$i=0;
		$info = '<table border="1" width="800"><tr><th>STT</th><th>Tên sản phẩm</th><th>Images</th><th>Color</th><th>Size</th><th>Price</th><th>Quantity</th><th>Tổng tiền</th></tr>';
		// $info .= '<th>STT</th>';
		// $info .= '<th>Tên sản phẩm</th>';
		// $info .= '<th>Images</th>';
		// $info .= '<th>Color</th>';
		// $info .= '<th>Size</th>';
		// $info =  '<th>Price</th>';
		// $info .= '<th>Quantity</th>';
		// $info .= '<th>Tổng tiền</th></tr>';
			foreach ($_SESSION['cart'] as $key => $value) {
				$sqlInsertDetail = "INSERT INTO order_detail (order_id,product_id,price,sl) VALUES ('".$last_id."','".$value['id']."','".$value['price']."','".$value['sl']."')";
				mysqli_query($conn,$sqlInsertDetail);
				$i++;
				$info .= '<tr>';
				$info .= '<td>'.$i.'</td>';
				$info .= '<td>'.$value["nameProduct"].'</td>';
				$info .= '<td>'.$value["image"].'</td>';
				$info .= '<td>'.$value["color"].'</td>';
				$info .= '<td>'.$value["size"].'</td>';
				$info .= '<td>'.$value["price"].'</td>';
				$info .= '<td>'.$value["sl"].'</td>';
				$info .= '<td>'.(int)$value['price']*(int)$value['sl'].'</td>';
				$info .= '</tr>';
				// echo "<pre>";
				// print_r($sqlInsertDetail);
			}
			$info .= '</table>';
			// echo $info;die;
			$subject ="Thông tin đặt hàng";
			$email = $_SESSION['isLogin'][4];
			mailSend($email,$subject,$info);
			header("Location:index.php");
		unset($_SESSION['cart']);
	}
?>

<form method="POST" class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Product</th>
								<th class="column-2"></th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
							</tr>
							<?php 
							$total=0;
							if(isset($_SESSION['cart'])){
								foreach ($_SESSION['cart'] as $key => $value) {
									?>
									<tr class="table_row">
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="<?php echo $value['image'] ?>" alt="IMG">
											</div>
										</td>
										<td class="column-2"><?php echo $value['nameProduct'] ?></td>
										<td class="column-3"><?php echo $value['price'] ?></td>
										<td class="column-4">
											<?php echo $value['sl'] ?>
										</td>
										<td class="column-5"><?php echo (int)$value['price']*(int)$value['sl'];
										$total +=  (int)$value['price']*(int)$value['sl'];
										?></td>
									</tr>
								<?php } } ?>

							</table>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php echo $total ?>
								</span>
							</div>
						</div>



						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php echo $total ?>
								</span>
							</div>
						</div>
						<h5>Thông tin thanh toán</h5><br>
                     
						<div class="form-group">
							<!-- <label for="inputEmail3">UserName</label> -->
							<input type="text" value="<?php echo (isset($_SESSION['isLogin']))?$_SESSION['isLogin'][1]:"" ?>" class="form-control" id="name" name="name" placeholder="Enter UserName">
						</div>
						<div class="form-group">
							<!-- <label for="inputEmail3">FullName</label> -->
							<input type="text" value="<?php echo (isset($_SESSION['isLogin']))?$_SESSION['isLogin'][3]:"" ?>" class="form-control" id="fullname" name="fullname" placeholder="Enter FullName">
						</div>
						<div class="form-group">
							<!-- <label for="inputEmail3">Email</label> -->
							<input type="email" value="<?php echo (isset($_SESSION['isLogin']))?$_SESSION['isLogin'][4]:"" ?>" class="form-control" id="email" name="email" placeholder="Enter Email">
							
						</div>
						<div class="form-group">
							<!-- <label for="inputEmail3">Phone</label> -->
							<input type="text" value="<?php echo (isset($_SESSION['isLogin']))?$_SESSION['isLogin'][5]:"" ?>" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
							
						</div>
						<div class="form-group">
							<!-- <label for="inputEmail3">Address</label> -->
							<input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
							
						</div>

						<button name="thanhtoan" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" >
							Proceed to Checkout
						</button>

					</div>
				</div>
			</div>
		</div>
	</form>
<?php }else{
	header("Location:index.php");
} ?>