<!-- <script type="text/javascript">
	function getProDuct(id)
	{
		alert(id);
	}	
</script> -->
<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button value='0' onclick="getProDuct(0)" class=" test stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>
					<?php 
						$sql = "SELECT * FROM category";
						$query = mysqli_query($conn,$sql);
						if(mysqli_num_rows($query)){
						while($row=mysqli_fetch_assoc($query)){
					 ?>
					<button value='<?php echo $row['id'] ?>' onclick="getProDuct(<?php echo $row['id'] ?>)" class="test stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
						<?php echo $row['name'] ?>
					</button>
				<?php } } ?>

				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button onclick="search()" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input id="search-product" class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<?php include 'filter.php' ?>
			
			<div class="row" id="listProByCat" style="overflow: hidden;clear: both">
                 

				<?php 
					$sqlPro="SELECT * FROM product LIMIT 8";
					$proId ='';
					$queryPro = mysqli_query($conn,$sqlPro);
					while($rowPro=mysqli_fetch_assoc($queryPro)){
				 ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?php echo $rowPro['image'] ?>" alt="IMG-PRODUCT">

							<a href="index.php?view=product_detail&id=<?php echo $rowPro['id'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="index.php?view=product_detail&id=<?php echo $rowPro['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $rowPro['name'] ?>
								</a>
								<?php $proId=$rowPro['id'] ?>
								<span class="stext-105 cl3">
									<?php echo number_format($rowPro['price'],0,",",",") ?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a id="<?php echo $rowPro['id'] ?>" href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			<div id="remove_button" class="flex-c-m flex-w w-full p-t-45">
				<button onclick="loadmore()" id="btn_more" name="btn_more" data-proid='<?php echo $proId ?>' value="<?php echo $proId ?>" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</button>
			</div>

			</div>

			<!-- Load more -->
			<!-- -->
		</div>
	</section>