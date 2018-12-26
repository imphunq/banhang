
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
					<th>User_id</th>
					<th>username</th>
					<th>fullname</th>
					<th>dateCreate</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Status</th>
					<th>Tùy chọn</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$sql = "SELECT * FROM `order` ORDER BY dateCreate DESC";
					$result = mysqli_query($conn,$sql) or die($sql);
						$i=0;
						while($row = mysqli_fetch_assoc($result)){
							$i++;
				 ?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $row['user_id'] ?></td>
					<td><?php echo $row['username'] ?></td>
					<td><?php echo $row['fullname'] ?></td>
					<td><?php echo $row['dateCreate'] ?></td>
					<td><?php echo $row['address'] ?></td>
					<td><?php echo $row['phone'] ?></td>
					<td><?php echo $row['email'] ?></td>
					<td><?php echo $row['status'] ?></td>
					<td>
						<a href="index.php?module=checkorder&id=<?php echo $row['id'] ?>"><i class="glyphicon glyphicon-ok"></i></a>
						<a href="index.php?module=okorder&id=<?php echo $row['id'] ?>" ><i class="glyphicon glyphicon-thumbs-up"></i></a>
					</td>
				</tr>
				<?php }  ?>
			</tbody>
		</table>
	</div>
</div>