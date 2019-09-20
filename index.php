<link rel="stylesheet" href="style.css"/>
<?php 
	require "db.php";
	require "functions.php";

	$con = openConnection();
	$contacts = listNumbers($con);
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
			<?php foreach($contacts as $contact){
				?>
				<tr>
					<td><?= $contact['id'];?></td>
					<td><?= $contact['name'];?></td>
					<td><?= $contact['mobile'];?></td>
					<td><?= $contact['status'];?></td>
					<td>
						<a href="add.php?id=<?=$contact['id'];?>">Edit</a>
						<a href="delete.php?id=<?=$contact['id'];?>">Delete</a>
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