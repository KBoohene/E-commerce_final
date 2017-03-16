<!--
  @author Youssouf da Silva, David Okyere & Kwabena Boohene
  @desc employee class containing related functions
-->

<?php
include_once("adb.php");

/**
* @desc Constructor
**/
class employee extends adb
 {
    function employee()
    {}

/**
* @desc Allows registered employee to log into their account and previous sessions
* @param string $username
* @param string $password
**/
	function loginEmployee($username,$password)
	{
	 $strQuery="select * from employees where Username ='$username' && Password ='$password'";
      return $this->query($strQuery);
	}


/**
* @desc Allows for the deletion of a particular employee entry
* @param int $id
**/
    function fireEmployee($eid)
    {
	 $strQuery="delete * from employees where eno ='$eid'";
	 return $this->query($strQuery);
    }

/**
* @desc Counts number of customers
**/
    function getNumberOfEmployees()
    {
	 $strQuery="select COUNT(*) AS NumberOfEmployees from employees";
     return $this->query($strQuery);
    }

/**
* @desc Gets a specified employee type
* @param int $id
**/
    function getEmployeeType($eid)
    {
	 $strQuery="select account_type from employees where eno ='$eid'";
      return $this->query($strQuery);
    }

/**
* @desc Gets all employees
**/
    function getEmployees()
    {
     $strQuery="select * from employees";
	 return $this->query($strQuery);
    }

/**
* @desc Searches for an employee based on specified requirements
* @param string $name
**/
    function searchEmployees($name)
    {
	 $strQuery="select * from employees where ename like '%$name%'";
	 return $this->query($strQuery);
    }

/**
* @desc Gets specified employee's data
* @param int $id
**/
    function getEmployeeData($eid)
	{
	 $strQuery="select * from employees where eno ='$eid'";
	 return $this->query($strQuery);
	}

 /**
 * @desc Allows for editing employee details
 * @param int $id
 * @param string $name
 * @param string $zip
 * @param date $hiredate
 * @param string $password
 * @param string $account_type
 * @param string $username
 **/
    function editEmployee($eid,$name,$zip,$hdate,$password,$account_type,$username)
    {
	 $strQuery= "UPDATE employees SET
				 ename='$name',
				 zip='$zip',
				 hdate='$hdate',
				 Password='$password',
				 account_type='$account_type',
				 Username='$username'
				 where eno='$eid'";

	 return $this->query($strQuery);
    }

/**
 * @desc Adds employee details
 * @param string $name
 * @param string $zip
 * @param date $hiredate
 * @param string $password
 * @param number $account_type
 * @param string $username
 **/
	function addEmployee($name,$zip,$hdate,$password,$account_type,$username)
	{
	 $strQuery="insert into employees (ename, zip, hdate, Password, account_type, Username)
	            values
			   ('$name', '$zip', '$hdate', '$password', '$account_type', '$username')";
     $result=$this->query($strQuery);
	 return $result;
	}

 /**
 * @desc Gets all customers
 **/
	function getZips()
	{
    $strQuery = "select * from `zipcodes`";
    return $this->query($strQuery);
    }
 }
	?>
