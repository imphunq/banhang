<?php 
// echo "<pre>";
// print_r($_SESSION['cart']);
	if(isset($_GET['key'])&&isset($_GET['action'])){
		$key  = $_GET['key'];
		unset($_SESSION['cart'][$key]);
	}
 ?>
<form class="bg0 p-t-75 p-b-85">
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
									$total = 0;
									if(isset($_SESSION['cart'])){
										foreach ($_SESSION['cart'] as $key => $value) {
											# code...
										
								 ?>
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1" onclick="delcart(<?php echo $key ?>)">
											<img src="<?php echo $value['image'] ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $value['nameProduct'] ?></td>
									<td class="column-3"><?php echo $value['price'] ?></td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" value="<?php echo $key ?>">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product_<?php echo $key ?>" id="num-product_<?php echo $key ?>" value="<?php echo $value['sl'] ?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" value="<?php echo $key ?>">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5">
									<?php
										 echo (int)$value['sl']*(int)$value['price'] ;
										 $total +=(int)$value['sl']*(int)$value['price'];
									?>
										 </td>
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
					<?php 
						if(isset($_SESSION['isLogin'])&&isset($_SESSION['cart'])){
					 ?>
						<a href="index.php?view=checkout" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</a>
					<?php }else{ ?>
						<a href="index.php?view=login" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</a>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script>
		function delcart(key)
		{
			var check = confirm("Bạn có chắc chắn xóa sản phẩm này không?");
			if(check)
			{
				$.get("index.php?view=viewcart&key="+key+"&action=del",function(){
					// alert("duoc roi");
					location.reload();
				});
				// alert(key);
			}
		}
	</script>