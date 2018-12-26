<?php 
// echo "<pre>";
// print_r($_SESSION['cart']);
	if(isset($_GET['key'])&&isset($_GET['action'])){
		$key  = $_GET['key'];
		unset($_SESSION['cart'][$key]);
	}
 ?>
<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<?php 
					$total = 0;
						if(isset($_SESSION['cart'])){
							foreach($_SESSION['cart'] as $key => $value) {
							
					 ?>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img" onclick="del(<?php echo $key ?>)">
							<img src="<?php echo $value['image'] ?>" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?php echo $value['nameProduct'] ?>
							</a>
							<span>
								<?php 
									$sql = "SELECT * FROM size";
									$query = mysqli_query($conn,$sql);
									while($rowSize = mysqli_fetch_assoc($query)){
										if($rowSize['id']==$value['size'])
											echo $rowSize['name'].",";
									}
								 ?>
							</span>
							<span>
								<?php 
									$sqlColor = "SELECT * FROM color";
									$queryColor = mysqli_query($conn,$sqlColor);
									while($rowColor=mysqli_fetch_assoc($queryColor)){
										if($rowColor['id']==$value['color'])
											echo $rowColor['name'];
									}
								 ?>
							</span>
							<span class="header-cart-item-info">
								<?php echo $value['sl'] . " x " . $value['price'] ?> 
								<?php 
									$total += (int)$value['sl']*(int)$value['price'];
								 ?>
							</span>
						</div>
					</li>
					<?php } } ?>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: <?php echo number_format($total,0,",",",") ?>
					</div>

					<div class="header-cart-buttons flex-w w-full">

						<a href="index.php?view=viewcart" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>
						<?php if(isset($_SESSION['isLogin'])){ ?>
						<a href="index.php?view=checkout" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					<?php }else{ ?> 
                          <a href="index.php?view=login" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function del(key){
			var check = confirm("Bạn có chắc chắn xóa sản phẩm này không?");
			if(check)
			{
				$.get("index.php?view=cart&key="+key+"&action=del",function(){
					location.reload();
				});
			}
		}
	</script>