<?php
/*@author Kwabena Boohene
 *@desc - This class contains functions that allow the modification of user information
 *
*/
//CHANGELOG
//Created Class, and functions associated - 1/25/2017
//Edited searchPerson method to include filter and added getPerson function - 1/26/2017
//Added the required comments to the functions - 2/1/2017


include_once("adb.php");
class persons extends adb{
  /**
    * @author Kwabena Boohene
    * Constructor for person class
  **/
  function persons(){
  }
  /**
    * @author Kwabena Boohene
    * Adds a customer
  **/
  function addCustomer(){

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
  function searchPerson($type,$text=false){
    if(($type==1) && ($text!=false)){
      $filter= " where CNAME like '%$text%' or CNO like '%$text%' or STREET like '%$text%'
                or ZIP like '%$text%' or PHONE like '%$text%'";
    }
    else if(($type==2) && ($text!=false)){
      $filter= " where ENAME like '%$text%' or ENO like '%$text%' or ZIP like '%$text%'";
    }
    else{
      $filter="";
    }

    return $this->getPerson($type,$filter);
  }
  /**
    * @author Kwabena Boohene
    * Gets the data of a specific individual in a database,
    * based on a given filter
    * @param int $type - type of person, customer or employee
    * @param string $filter -filters the kind of user info to retrieve
    * @return boolean - true or false
  **/
  function getPerson($type,$filter){
    if($type==1){
      $strQuery="Select * from customers";
    }
    else if($type==2){
      $strQuery="Select * from employees";
    }

    $strQuery = $strQuery.$filter;
    return $this->query($strQuery);

  }

}
?>
