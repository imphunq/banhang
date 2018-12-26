<?php 
	$sql = "SELECT * FROM slide";
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
					<th>Title</th>
					<th>Images</th>
					<th>Status</th>
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
					<td><?php echo $row['tieude'] ?></td>
					<td><?php echo $row['images'] ?></td>
					<td><?php echo $row['status'] ?></td>
					<td>
						<a href="index.php?module=editslide&id=<?php echo $row['id'] ?>"><i class="glyphicon glyphicon-pencil"></i></a>
						<a onclick="return confirm('Do you want to delete it')" href="index.php?module=delslide&id=<?php echo $row['id'] ?>" ><i class="glyphicon glyphicon-trash"></i></a>
					</td>
				</tr>
				<?php } } ?>
			</tbody>
		</table>
	</div>
</div>