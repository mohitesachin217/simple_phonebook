<?php 

require "db.php";
require "functions.php";

openConnection();

if(isset($_POST) && !empty($_POST)){
	$name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
	$mobile = filter_var($_POST['mobile'],FILTER_SANITIZE_NUMBER_INT);
	$result = saveNumber($name,$mobile);
	if($result){
		echo "Number saved successful!";
	}else{
		echo "Failed to save the number!";
	}
}


?>

<link rel="stylesheet" href="style.css"/>



<center>
<div class="container">
<form action="<?= $_SERVER['PHP_SELF']?>" method="post">

	<div class="form-control-wrapper">
		<label>
			Name:
		</label>
			<input type="text" name="name" />
		
	</div>
	<div class="form-control-wrapper">
		<label>
			Mobile:
		</label>	
			<input type="text" name="mobile" />
		
	</div>
	<div class="form-control-wrapper">
		<button type="submit" name="submit">SUBMIT</button>
		<button type="reset" name="reset">RESET</button>
		<a href="index.php">Click to view numbers</a>
	</div>
</form>
</div>
</center>

<?php closeConnection(); ?>