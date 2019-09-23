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
	 * Get total records in the database
	 * @param  string $con [description]
	 * @return int - number of total rows
	 */
	
	function getCountRows($con = ''){
		$query = "SELECT * FROM `phonebook`";
		$resource = mysqli_query($con,$query);
		return $resource->num_rows;
	}

	function getLimitCountRows($con = '', $pg = 1, $limit = LIMIT){
		$pg--;
		$start = $pg * 10;	
		// $start = $start;
		$query = "SELECT * FROM `phonebook` LIMIT $start,$limit ";
		$resource = mysqli_query($con,$query);
		return $resource->num_rows;
	}


	/**
	 * get contacts from datbase
	 * @param  string $con [description]
	 * @return associate array of all records
	 */
	function listLimitNumbers($con = '', $pg = 1, $limit = LIMIT){
	 
	 	$pg--;
		$start = $pg * 10;	
		// $start = $start;
		$query = "SELECT * FROM `phonebook` LIMIT $start,$limit ";
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

	/**
	 * Get contact information 
	 * @param  string $id contact id
	 * @return Associtate array of the contact of that id
	 */
	function getContact($id = ''){
		global $con;

		$query = "SELECT * FROM phonebook WHERE id = '$id'";
		$resource = mysqli_query($con,$query);
		return $resource->fetch_assoc();
	}


	/**
	 * Update contact number
	 * @param  string $name   name of the contact
	 * @param  string $mobile mobile number of the contact
	 * @param  string $id     Id of the contact number in database
	 * @return return resource boolean true if update is successful or else false if opration is unsuccessful  
	 */
	function updateNumber($name="",$mobile='',$id = ''){
		global $con;
		$query = "UPDATE phonebook SET name='$name', mobile = '$mobile' WHERE id = '$id'";
		return $resource = mysqli_query($con,$query);
	}


	function deleteContact($id = ''){
		global $con;
		$query = "DELETE FROM phonebook WHERE id = '$id'";
		return $resource = mysqli_query($con,$query);
	}
?>