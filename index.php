
<?php 
	require "db.php";
	require "functions.php";


	$con = openConnection();
	$numbers = listNumbers($con);
?>
<style>
	.tr, tr {
    	border-bottom: 1px solid #ddd;
	}
	table{
		border:1px solid black;
	}
	table tr td{
		border-right:30px solid #fff;
		border-left:30px solid #fff
	}
	tr:nth-child(even){
		background:#ccc;
		color:#669;
	}
	tr:nth-child(odd){
		background:#f7f7f7;
	}
	table thead tr th{
	    font-weight: 400;
	    font-size: 14px;
	    border-bottom: 2px solid #6678b1;
	    border-right: 30px solid #fff;
	    border-left: 30px solid #fff;
	    color: #039;
	    padding: 8px 2px;
	}
	td{
		text-align:center;
	}
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