
<br><br><br>
<?php 
	if(isset($_SESSION['isLogin'])){
		$id = $_SESSION['isLogin'][0];
	$sql = "SELECT o.user_id, o.id, o.status, od.order_id, od.product_id, od.price, od.sl, od.dateCreate, p.id, p.image,p.name FROM `order` o INNER JOIN order_detail od ON o.id=od.order_id INNER JOIN product p ON od.product_id=p.id WHERE o.user_id=$id ORDER BY od.dateCreate ASC";
	$query = mysqli_query($conn,$sql) or die($sql);
	// $row = mysqli_fetch_array($query);
	// echo "<pre>";
	// print_r($row);
}
 ?>
		<!-- <div class="container"> -->
			<!-- <div class="row"> -->
				<!-- <div class="col-lg-12 col-xl-7 m-lr-auto m-b-50"> -->
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
									<th class="column-6">Ngày mua</th>
									<th class="column-7">Trạng thái</th>
								</tr>
								<?php 
									while($row=mysqli_fetch_array($query)){
								 ?>
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1" >
											<img src="<?php echo $row[9] ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $row['name'] ?></td>
									<td class="column-3"><?php echo $row[5] ?></td>
									<td class="column-4">
										<?php echo $row[6] ?>
									</td>
									<td class="column-5">
										<?php echo (int)$row[6]*(int)$row[5] ?>
									</td>
									<td class="column-6"><?php echo $row[7] ?></td>
									<td class="column-7">
										<?php 
											if($row[2]==1){
												echo "<div class='text-info'>Mới mua hàng</div>";
											}else if($row[2]==2){
												echo "<div class='text-warning'>Đang chuyển hàng</div>";
											}else if($row[2]==3){
												echo "<div class='text-success'>Đã nhận hàng</div>";
											}else{
												echo "<div class='text-danger'>Đã hủy</div>";
											}

										 ?>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>

					</div>
				<!-- </div> -->
			<!-- </div> -->
		<!-- </div> -->
