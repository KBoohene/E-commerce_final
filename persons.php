<?php
//CHANGELOG
//Created Class, and functions associated - 1/25/2017
// Edited searchPerson method to include filter and added getPerson function - 1/26/2017
//
include_once("adb.php");
class persons extends adb{
  function persons(){
  }

  function addCustomer(){

  }

  function addEmployee(){

  }

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
