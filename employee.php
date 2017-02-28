<?php
/*@author Kwabena Boohene
 *@desc - This class contains functions that allow the modification of user information
 *
*/
//CHANGELOG
//Created Class, and functions associated - 1/25/2017
//Edited searchPerson method to include filter and added getPerson function - 1/26/2017
//Added the required comments to the functions - 2/1/2017
//Modified person class to only run employee function
//Added function to run fetch data

require_once('smarty-3.1.30/libs/Smarty.class.php');
include_once("adb.php");
class employee extends adb{

  /**
    * @author Kwabena Boohene
    * Constructor for employee class
  **/
  function employee(){
  }
  /**
    * @author Kwabena Boohene
    * Adds an employee
  **/
  function addEmployee(){

  }
  /**
    * @author Kwabena Boohene
    * Searchs for a specific person in the database given customer type
    * @param int $type - type of person, customer or employee
    * @param string $text - text to search for
    * @return boolean - true or false
  **/
  function searchEmployee($text=false){
    if(($text!=false)){
      $filter= " where ENAME like '%$text%' or ENO like '%$text%' or ZIP like '%$text%'";
    }
    else{
      $filter="";
    }
    return $this->getEmployee($filter);
  }
  /**
    * @author Kwabena Boohene
    * Gets the data of a specific individual in a database,
    * based on a given filter
    * @param int $type - type of person, customer or employee
    * @param string $filter -filters the kind of user info to retrieve
    * @return boolean - true or false
  **/
  function getEmployee($filter=""){
    $strQuery="Select * from employees";
    $strQuery = $strQuery.$filter;
    return $this->query($strQuery);

  }


  function countEmployees(){
    $strQuery="Select count(eno) as Num_Employees from employees ";
    $array=$this->query($strQuery);
    $count = $array->fetch_assoc();

    return $count;
  }

}

$employee = new employee();
$smarty= new Smarty();
$smarty->template_dir='views';
$smarty->compile_dir='tmp';
$smarty->assign('employee',$employee);

$smarty->display('employees.tpl');

?>
