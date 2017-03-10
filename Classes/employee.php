<!--CHANGELOG
    Changed function names to reflect changes made in database - 9/3/2017
	Formatted code - 10/3/2017
-->
<!--
  @author David Okyere
  @desc - This page contains functions for editing, adding, deleting and searching for employees
  -->


<?php 
include_once("adb.php");
class employee extends adb
 {
    function employee()
    {}
	
	function loginEmployee($username,$password)
	{
	 $strQuery="select * from employees where Username = $username & Password = $password";	
	}
	
    function fireEmployee($eid)
    {
	 $strQuery="delete * from employees where eno = $eid"; 
	 return $this->($strQuery)
    } 

    function getNumberOfEmployees()
    {
	 $strQuery="select COUNT(*) AS NumberOfEmployees from employees";
     return $this->($strQuery)	 
    }
	
    function getEmployeeType($eid)
    {
	 $strQuery="select account_type from employees where eno = $eid";
    }
	
    function getEmployees()
    {
     $strQuery="select * from employees";
	 return $this->query($strQuery);
    }
	
    function searchEmployees($name)
    {
	 $strQuery="select * from employees where ename like '%$name%'";
	 return $this->query($strQuery);
    }
   
    function getEmployeeData($eid)
	{
	 $strQuery="select * from employees where eno = $eid";
	 return $this->query($strQuery);
	}
	 
    function editEmployee($eid,$name,$zip,$hdate,$password,$account_type,$username)
    {
	 $strQuery= "update employees set
				 ename='$name',
				 zip='$zip',
				 hdate='$hdate',
				 Password='$password',
				 account_type=$account_type',
				 Username='$username'
				 where eno=$eid ";
	 return $this->query($strQuery);
    }
	
	function addEmployee($eid,$name,$zip,$hdate,$password,$account_type,$username)
	{
	 $strQuery="insert into employees set 
	            eno='$eid',
				ename='$name',
				zip='$zip',
				hdate='$hdate'
				Password='$password',
				account_type=$account_type',
				Username='$username'";,
     $result=$this->query($strQuery);
	 return $result;
	}
 }
	?>