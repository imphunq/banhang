<?php 
	$sql = "SELECT * FROM user";
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
					<th>UserName</th>
					<th>Password</th>
					<th>FullName</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Gender</th>
					<th>Birthday</th>
					<th>Permission</th>
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
					<td><?php echo $row['username'] ?></td>
					<td><?php echo $row['password'] ?></td>
					<td><?php echo $row['fullname'] ?></td>
					<td><?php echo $row['email'] ?></td>
					<td><?php echo $row['phone'] ?></td>
					<td><?php echo $row['address'] ?></td>
					<td><?php if($row['gender']==1) echo "Male"; else echo "Female"; ?></td>
					<td><?php echo $row['birthday'] ?></td>
					<td><?php if($row['permission']==1) echo "Super Admin"; else if($row['permission']==0) echo "Admin"; else echo "User"; ?></td>
					<td><?php echo $row['dateCreate'] ?></td>
					<td>
						<a href="index.php?module=edituser&id=<?php echo $row['id'] ?>"><i class="glyphicon glyphicon-pencil"></i></a>
						<a onclick="return confirm('Do you want to delete it')" href="index.php?module=deluser&id=<?php echo $row['id'] ?>" ><i class="glyphicon glyphicon-trash"></i></a>
					</td>
				</tr>
				<?php } } ?>
			</tbody>
		</table>
	</div>
</div>
