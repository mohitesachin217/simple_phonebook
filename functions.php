<?php 
/**
* functions file
*
*
*
*
*
*/

	$con = '';

	function openConnection(){
		global $host;
		global $userName;
		global $password;
		global $db;
		global $con;

		$con = @mysqli_connect($host,$userName,$password,$db) or die('Mysql Connection Error');
		return $con;
	}

	/**
	 * close database connection 
	 * @param  string $con connection resource
	 * @return void
	 */
	function closeConnection($con = ''){
		global $con;
		$con->close();
		echo "Connection Closed";
	}

	/**
	 * get contacts from datbase
	 * @param  string $con [description]
	 * @return associate array of all records
	 */
	function listNumbers($con = ''){
		$query = "SELECT * FROM `phonebook`";
		$resource = mysqli_query($con,$query);
		return $resource->fetch_all(MYSQLI_ASSOC);
	}

	/**
	 * Save contact to the database
	 * @param  string $name   Name of the contact
	 * @param  string $mobile mobile number of the contact
	 * @return boolean true or false based on the operation
	 * 	
	 */
	function saveNumber($name = '',$mobile = ''){
		global $con;
		$query = "INSERT INTO phonebook (name,mobile) VALUES('$name',$mobile)";
		$resource = mysqli_query($con,$query);
		return $resource;
	}

?>