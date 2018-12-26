<!--  -->

 <?php 
	include 'connection.php';
	$data='';
	$proId ='';
	$idget = $_GET['lastid'];
	$cat_id = $_GET['catid'];
	if($cat_id){
	$sql = "SELECT * FROM product WHERE id>$idget AND cat_id=$cat_id LIMIT 8";
	}
	else{
		$sql = "SELECT * FROM product WHERE id>$idget LIMIT 8";
	}
	$query = mysqli_query($conn,$sql) or die($sql);
	if(mysqli_num_rows($query)){
		while($row=mysqli_fetch_array($query)){
 ?>
<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
	<!-- Block2 -->
	<div class="block2">
		<div class="block2-pic hov-img0">
			<img src="<?php echo $row['image'] ?>" alt="IMG-PRODUCT">

			<a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
				Quick View
			</a>
		</div>

		<div class="block2-txt flex-w flex-t p-t-14">
			<div class="block2-txt-child1 flex-col-l ">
				<a href="index.php?view=product_detail&id=<?php echo $row['id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
					<?php echo $row['name'] ?>
				</a>
				<?php $proId = $row['id'] ?>
				<span class="stext-105 cl3">
					<?php echo $row['price'] ?>
				</span>
			</div>

			<div class="block2-txt-child2 flex-r p-t-3">
				<a id="<?php echo $row['id'] ?>" href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
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
<?php } ?>