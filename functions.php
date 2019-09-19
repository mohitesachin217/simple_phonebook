<?php 
/**
* functions file
*
*
*
*
*
*/


	function openConnection(){
		global $host;
		global $userName;
		global $password;
		global $db;

		$con = @mysqli_connect($host,$userName,$password,$db) or die('Mysql Connection Error');
		return $con;
	}

	function closeConnection($con = ''){
		$con->close();
	}

	
	function listNumbers($con = ''){
		$query = "SELECT * FROM `phonebook`";
		$resource = mysqli_query($con,$query);
		return $resource->fetch_all(MYSQLI_ASSOC);
	}

?>