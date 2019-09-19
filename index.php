<link rel="stylesheet" href="style.css"/>
<?php 
	require "db.php";
	require "functions.php";


	$con = openConnection();
	$numbers = listNumbers($con);
?>
<style>
	
</style>

<a href="add.php">Add</a>
<center>

	<table width="100%" >
		<thead>
			<th>Id</th>
			<th>Name</th>
			<th>Mobile</th>
			<th>Active</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php foreach($numbers as $number){
				?>
				<tr>
					<td><?= $number['id'];?></td>
					<td><?= $number['name'];?></td>
					<td><?= $number['mobile'];?></td>
					<td><?= $number['status'];?></td>
					<td>
						<a href="edit.php">Edit</a>
						<a href="delete.php">Delete</a>
					</td>
				</tr>	
				<?php
			} ?>
			
		</tbody>
	</table>
</center>

<?php 

	closeConnection($con);
?>