<?php 


require "db.php";
require "functions.php";


$con  = openConnection();

$numbers = listNumbers($con);

echo "<pre>";
print_r($numbers);

?>
<style>
	td{
		text-align:center;
	}
</style>

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
						<a href="">Edit</a>
						<a href="">Delete</a>
					</td>
				</tr>	
				<?php
			} ?>
			
		</tbody>
	</table>
</center>