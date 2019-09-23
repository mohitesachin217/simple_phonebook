<link rel="stylesheet" href="style.css"/>
<?php 
	require "db.php";
	require "functions.php";

	$con = openConnection();

	// Get page number
	@$pg = filter_var($_GET['pg'],FILTER_SANITIZE_NUMBER_INT);


	// 
	$pg = $pg?$pg:1;
	$prev = $pg - 1;
	$next = $pg + 1;

	//  Get Contacts 
	$contacts = listLimitNumbers($con,$pg);

	// Get total rows
	$totalRows  = getCountRows($con);

	// Get number of rows filtered
	$rows  = getLimitCountRows($con);

	// Get total pages
	$pages = ceil($totalRows  / LIMIT);

?>
<style>
	
</style>

<a href="add.php">Add</a>
<a href="index_pg.php">Listing without</a>
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
			<?php 
			if($contacts){
				foreach($contacts as $contact){
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
				} 
			}else{
				echo "No records to display";
			}?>
		</tbody>
	</table>
		<center>
			<div class="pagination-wrapper">
				Showing Page <?= $pg?> out of <?= $pages?>  
			</div>
		</center>
		<center>
			<div class="pagination-wrapper">
				<a href="index_pg.php?pg=<?= $prev>=0?$prev:1;?>">Prev</a>
				<a href="index_pg.php?pg=<?= $pg;?>">Current</a>
				<a href="index_pg.php?pg=<?= $next<=$pages?$next:$pages;?>">Next</a>
			</div>
		</center>
</center>

<?php 

	closeConnection($con);
?>