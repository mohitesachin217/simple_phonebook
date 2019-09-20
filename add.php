<?php 

require "db.php";
require "functions.php";

openConnection();

if(isset($_POST) && !empty($_POST)){
	$name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
	$mobile = filter_var($_POST['mobile'],FILTER_SANITIZE_NUMBER_INT);
	$id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);

	if($id==''||$id==0){
		$result = saveNumber($name,$mobile);	
	}else{
		$result = updateNumber($name,$mobile,$id);		
	}
	
	if($result){
		echo "Number saved successful!";
	}else{
		echo "Failed to save the number!";
	}
}

if(isset($_GET['id']) && !empty($_GET)){
	$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
	$contact = getContact($id);
	extract($contact);
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
			<input type="text" name="name"  value="<?= @$name?$name:''; ?>"/>
		
	</div>
	<div class="form-control-wrapper">
		<label>
			Mobile:
		</label>	
			<input type="text" name="mobile" value="<?= @$mobile?$mobile:'';?>" />
		
	</div>
	<div class="form-control-wrapper">
		<input type="hidden" name="id" value="<?= @$id?$id:'';?>" />
		<button type="submit" name="submit">SUBMIT</button>
		<button type="reset" name="reset">RESET</button>
		<br/>
		<a href="index.php">Click to view contacts</a>
		<br/>
		<a href="index.php">Click to view contacts with pagination</a>
	</div>
</form>
</div>
</center>

<?php closeConnection(); ?>