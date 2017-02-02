<?php
//CHANGELOG
//Creted Class and functions -> 01/26/2017
include_once("adb.php");
/**
*OrderInfo class
*/
class task3OrderInfo extends adb{

	//Constructor for class
	function task3OrderInfo(){
	}

	/**
	*Adds a new person
	*@param bigint customerId customer id
	*@param bigint employeeId employee id
	*/

    /*This function takes in the entered parameters and enters them in the database*/
	function addOrder($customerId){
  		 $strQuery="insert into orders set cno='$customerId'";
  		// $strQuery="INSERT INTO `orders` (`ono`, `cno`, `eno`, `received`, `shipped`)
      //  VALUES (NULL, '$customerId', '$employeeId', NULL, NULL);";
			 echo "<script>alert('Query:".$strQuery."');</script>";
  		return $this->query($strQuery);

	}

}
?>
