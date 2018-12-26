<?php 
	$sql = "SELECT * FROM product";
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
					<th>Name</th>
					<th>Images</th>
					<th>Cat_id</th>
					<th>Price</th>
					<th>Sale_of</th>
					<th>Description</th>
					<th>Status</th>
					<th>dateCreate</th>
					<th>Tùy chọn</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if(mysqli_num_rows($result)>0)
					{
						$i=0;
						while($row = mysqli_fetch_array($result)){
							$i++;
				 ?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['image'] ?></td>
					<td><?php echo $row['cat_id'] ?></td>
					<td><?php echo $row['price'] ?></td>
					<td><?php echo $row['sale_of'] ?></td>
					<td><?php echo $row['description'] ?></td>
					<td><?php echo $row['status'] ?></td>
					<td><?php echo $row['dateCreate'] ?></td>
					<td>
						<a href="index.php?module=editproduct&id=<?php echo $row['id'] ?>"><i class="glyphicon glyphicon-pencil"></i></a>
						<a onclick="return confirm('Do you want to delete it')" href="index.php?module=delproduct&id=<?php echo $row['id'] ?>" ><i class="glyphicon glyphicon-trash"></i></a>
					</td>
				</tr>
				<?php } } ?>
			</tbody>
		</table>
	</div>
</div>