<br><br><br>
<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Product</th>
								<th class="column-2">name</th>
								<th class="column-3">Price</th>
							
							</tr>
							<?php 
							if(isset($_SESSION['wishlist'])){
								foreach ($_SESSION['wishlist'] as $key => $value) {
									?>
									<tr class="table_row">
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="<?php echo $value['image'] ?>" alt="IMG">
											</div>
										</td>
										<td class="column-2"><?php echo $value['nameProduct'] ?></td>
										<td class="column-3"><?php echo $value['price'] ?></td>
									</tr>
								<?php } } ?>

							</table>
						</div>
					</div>
				</div>