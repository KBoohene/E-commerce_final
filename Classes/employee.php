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
* @param {$username} Employee username
* @param {$password} Employee password
* @return : Array if successful, False if not
**/
	function loginEmployee($username,$password)
	{
	 $strQuery="select * from employees where Username ='$username' && Password ='$password'";
      return $this->query($strQuery);
	}


/**
* @desc Allows for the deletion of a particular employee entry
* @param {$eid} ID number of employee
* @return : True if successful, False if not
**/
    function fireEmployee($eid)
    {
	 $strQuery="delete * from employees where eno ='$eid'";
	 return $this->query($strQuery);
    }

/**
* @desc Counts number of customers
* @return : Number if successful, False if not
**/
    function getNumberOfEmployees()
    {
	 $strQuery="select COUNT(*) AS NumberOfEmployees from employees";
     return $this->query($strQuery);
    }

/**
* @desc Gets a specified employee type
* @param {$eid} ID number of employee
* @return : Array if successful, False if not
**/
    function getEmployeeType($eid)
    {
	 $strQuery="select account_type from employees where eno ='$eid'";
      return $this->query($strQuery);
    }

/**
* @desc Gets all employees
* @return : Array if successful, False if not
**/
    function getEmployees()
    {
     $strQuery="select * from employees";
	 return $this->query($strQuery);
    }

/**
* @desc Searches for an employee based on specified requirements
* @param {$name} Employee name
* @return : Array if successful, False if not
**/
    function searchEmployees($name)
    {
	 $strQuery="select * from employees where ename like '%$name%'";
	 return $this->query($strQuery);
    }

/**
* @desc Gets specified employee's data
* @param {$eid} ID number of employee
* @return : Array if successful, False if not
**/
    function getEmployeeData($eid)
	{
	 $strQuery="select * from employees where eno ='$eid'";
	 return $this->query($strQuery);
	}

 /**
 * @desc Allows for editing employee details
 * @param {$eid} ID number of employee
 * @param {$name} Employee name
 * @param {$zip} Zip address of employee
 * @param {$hdate} Hire date of employee
 * @param {$password} Employee password
 * @param {$account_type} Account type of employee
 * @param {$username} Employee username
 * @return : True if successful, False if not
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
* @param {$name} Employee name
 * @param {$zip} Zip address of employee
 * @param {$hdate} Hire date of employee
 * @param {$password} Employee password
 * @param {$account_type} Account type of employee
 * @param {$username} Employee username
 * @return : True if successful, False if not
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
 * @return : Array if successful, False if not
 **/
	function getZips()
	{
    $strQuery = "select * from `zipcodes`";
    return $this->query($strQuery);
    }
 }
	?>
