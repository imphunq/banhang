<?php 
	// echo "<pre>";print_r($_SESSION['cart']);
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sql = "SELECT * FROM product WHERE id=".$id;
		$query = mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($query)){
 ?>
<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
									<div class="wrap-pic-w pos-relative">
										<img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
									<div class="wrap-pic-w pos-relative">
										<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>

								<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
									<div class="wrap-pic-w pos-relative">
										<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $row['name'] ?>
						</h4>

						<span class="mtext-106 cl2">
							<?php echo number_format($row['price'],0,",",",") ?>
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?php echo $row['description'] ?>
						</p>
						
						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Size
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select required="required" class="js-select2" id="size_id" name="time">
											<option>Choose an option</option>
											<?php 
												$sqlSize = "SELECT * FROM size";
												$querySize = mysqli_query($conn,$sqlSize);
												while($rowSize=mysqli_fetch_assoc($querySize)){
											 ?>
											<option value="<?php echo $rowSize['id'] ?>"><?php echo $rowSize['name'] ?></option>
										<?php } ?>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select required="required" class="js-select2" id="color_id" name="time">
											<option>Choose an option</option>
											<?php 
												$sqlColor = "SELECT * FROM color";
												$queryColor = mysqli_query($conn,$sqlColor);
												while($rowColor=mysqli_fetch_assoc($queryColor)){
											 ?>
											<option value="<?php echo $rowColor['id'] ?>"><?php echo $rowColor['name'] ?></option>
										<?php } ?>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">										
										<input class="" type="number" id="num-product" name="num-product" value="1">									
									</div>

									<button value="<?php echo $row['id'] ?>" onsubmit="setTimeout(function(){window.location.reload();},10)" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										Add to cart
									</button>
								</div>
							</div>	
						</div>

					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						
						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->

										<?php 
											$sqlComment = "SELECT c.product_id, c.content,c.dateCreate,c.user_id,c.rating,p.id,p.name,u.id,u.fullname FROM comment c INNER JOIN product p ON c.product_id=p.id INNER JOIN user u ON u.id=c.user_id WHERE c.product_id=$id ORDER BY c.dateCreate DESC LIMIT 15";
											$queryComment = mysqli_query($conn,$sqlComment) or die($sqlComment);
											$dem = mysqli_num_rows($queryComment);
											if(mysqli_num_rows($queryComment)>0){
												while($rowComm=mysqli_fetch_assoc($queryComment)){
										 ?>
										<div id="test" class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src="images/avatar-01.jpg" alt="AVATAR">
											</div>

											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														<?php echo $rowComm['fullname'] ?>
													</span>

													<span class="fs-18 cl11">
														<?php 
															for($i=0;$i<$rowComm['rating'];$i++){
														 ?>
														<i class="zmdi zmdi-star"></i>
													<?php } ?>
														<!-- <i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star-half"></i> -->
													</span>
												</div>

												<p class="stext-102 cl6">
													<?php echo $rowComm['content'] ?>
												</p>
											</div>
										</div>
									<?php } }?>
										
										<!-- Add review -->
										<form method="post" class="w-full">
											<h5 class="mtext-108 cl2 p-b-7">
												Add a review
											</h5>
											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i name="rating" value="1" onclick="getStar(1)" class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i name="rating" value="2" onclick="getStar(2)"  class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i name="rating" value="3" onclick="getStar(3)" class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i name="rating" value="4" onclick="getStar(4)" class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i name="rating" value="5" onclick="getStar(5)" class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="a">
												</span>
											</div>

											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your review</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
												</div>

												<!-- <div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Name</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
												</div> -->
											</div>
										<?php 
											if(isset($_SESSION['isLogin'])){
										 ?>
											<button onclick="testAdd()" type="button" id="addComment" name="addComment" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
												Submit
											</button>
										<?php 
											}else{
										 ?>
										<button type="button" onclick="khongcho()" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
												Submit
										</button>
										<?php } ?>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script>
		function getUrlParameter(sParam) {
			var sPageURL = decodeURIComponent(window.location.search.substring(1)),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;

			for (i = 0; i < sURLVariables.length; i++) {
				sParameterName = sURLVariables[i].split('=');

				if (sParameterName[0] === sParam) {
					return sParameterName[1] === undefined ? true : sParameterName[1];
				}
			}
		}
	var id = getUrlParameter('id');
	function khongcho()
	{
		alert('Bạn phải đăng nhập để bình luận');
		return false;
	}
	var rate;
	function getStar(star)
	{
		rate=star;
	}
     function testAdd()
		{
			var so = <?php echo $dem ?>;
			var star = rate;
			var comment = document.getElementById('review').value;
			var key = id;
			$.ajax({
				url: 'xuly_cmt.php',
				type:'post',
				data: "mess="+comment+"&id="+key+"&star="+star,
				// async: true,
				success:function(kq){
					if(so==0){
						$('#test').prepend(kq);
						location.reload();
						// $('#test:eq(-1)').before(kq);
					}else{
					$('#test:eq(0)').before(kq);
				}
					$('form').trigger("reset");

				}
			});
			// document.getElementById('review').reset();
				/* Act on the event */
			return false;
		}
	

</script>

<script type="text/javascript">
	// var k;
	// $(document).ready(function() {
	// 	$('.item-rating').on('click', function(event) {
	// 		// event.preventDefault();
	// 		/* Act on the event */
	// 		var k = $(this).attr('value');
	// 		// alert(k);
	// 	});
		
	// });
	// var k = document.getElementsByClassName('item-rating');
	// console.log(k);
	// document.getElementsByClassName('item-rating').addEventListener('click',function(){
	// 	alert('hii');
	// });
	
</script>
<?php }} ?>
