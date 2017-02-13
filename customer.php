<?php
require_once('smarty-3.1.30/libs/Smarty.class.php');
include_once("adb.php");
class customer extends adb{
  /**
    * @author Kwabena Boohene
    * Constructor for employee class
  **/
  function customer(){
  }
  /**
    * @author Kwabena Boohene
    * Adds an employee
  **/
  function addcustomer(){

  }
  /**
    * @author Kwabena Boohene
    * Searchs for a specific person in the database given customer type
    * @param int $type - type of person, customer or employee
    * @param string $text - text to search for
    * @return boolean - true or false
  **/
  function searchCustomer($text=false){
    if(($text!=false)){
      $filter= " where ENAME like '%$text%' or ENO like '%$text%' or ZIP like '%$text%'";
    }
    else{
      $filter="";
    }
    return $this->getCustomer($filter);
  }
  /**
    * @author Kwabena Boohene
    * Gets the data of a specific individual in a database,
    * based on a given filter
    * @param int $type - type of person, customer or employee
    * @param string $filter -filters the kind of user info to retrieve
    * @return boolean - true or false
  **/
  function getCustomer($filter){
    $strQuery="Select * from customers";
    $strQuery = $strQuery.$filter;
    return $this->query($strQuery);

  }

  function fetch_CData($dataInput=false){
      $arrayData = array();

    if($dataInput!=false){
    $result=$this->searchCustomer($dataInput);
    $count=0;
    $length =$result->field_count;

      while($count<$length){
        $arrayData[$count]=$result->fetch_assoc();
        $count++;
      }

    }
    else{

      $result=$this->searchCustomer();
      $count=0;
      $length =$result->field_count;

      while($count<$length){
        $arrayData[$count]=$result->fetch_assoc();
        $count++;
      }

    }

    return $arrayData;
  }

}

$customer = new customer();
$smarty= new Smarty();
$smarty->template_dir='views';
$smarty->compile_dir='tmp';
$smarty->assign('customer',$customer);

$smarty->display('customers.tpl');

?>
