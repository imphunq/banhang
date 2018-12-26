<?php 
	$sql = "SELECT * FROM order_detail";
	$result = mysqli_query($conn,$sql);
 ?>
<div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title">Basic Table</div>

		<div class="panel-options">
			<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
			<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
		</div>
	</div>
	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Order_id</th>
					<th>Product_id</th>
					<th>Price</th>
					<th>sl</th>
					<th>dateCreate</th>
					<th>Tùy chọn</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if(mysqli_num_rows($result)>0)
					{
						$i=0;
						while($row = mysqli_fetch_assoc($result)){
							$i++;
				 ?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $row['order_id'] ?></td>
					<td><?php echo $row['product_id'] ?></td>
					<td><?php echo $row['price'] ?></td>
					<td><?php echo $row['sl'] ?></td>
					<td><?php echo $row['dateCreate'] ?></td>
					<td>
						<a href="index.php?module=editorderdetail&id=<?php echo $row['id'] ?>"><i class="glyphicon glyphicon-pencil"></i></a>
						<a onclick="return confirm('Do you want to delete it')" href="index.php?module=delorderdetail&id=<?php echo $row['id'] ?>" ><i class="glyphicon glyphicon-trash"></i></a>
					</td>
				</tr>
				<?php } } ?>
			</tbody>
		</table>
	</div>
</div>