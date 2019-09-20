<?php 
/**
 *
 *DELECT PHP FILE TO DELETE THE CONTACT
 *
 *
 *
 * 
 */

require "db.php";
require "functions.php";

$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

openConnection();

$result = deleteContact($id);



if($result){
	echo "Contact Deleted successful!";
}else{
	echo "Failed to delete Contact";
}
closeConnection();
?>
<a href="index.php">Click to view contact list</a>
<a href="index_pg.php">Click to view contact list with pagination</a>