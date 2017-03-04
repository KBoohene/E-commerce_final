<?php
require_once('csv.class.php');
include_once("adb.php");
class reports extends adb{
  /**
    * @author Kwabena Boohene
    * Constructor for employee class
  **/
  function reports(){
  }


  function countCustomers(){

    $strQuery="Select count(cno) as Num_Customers from customers ";
    $array=$this->query($strQuery);
    $count = $array->fetch_assoc();
    return $count;
  }

  function numItemsPerDay($date,$month,$year){
    if($day==1){
      //YYYY-MM-DD
      $strQuery="SELECT SUM(num_items) AS Orders_Per_Day FROM checkout_log WHERE
    DATE(`created_at`) =".$year.$month.$day;
    }
    else
    {
      $strQuery="";
    }
  return $this->query($strQuery);
  }


  function numItemsPerWeek($date,$month,$year){
     if($day==1){
      //YYYY-MM-DD
      $strQuery="SELECT SUM(num_items) AS Orders_Per_Day FROM checkout_log WHERE
    WEEKOFYEAR(`created_at`) = WEEKOFYEAR('$year.$month.$day')";
    }
    else
    {
      $strQuery="";
    }
    return $this->query($strQuery);
  }


  function numItemsPerMonth($date,$month,$year){
     if($day==1){
      //YYYY-MM-DD
      $strQuery="SELECT SUM(num_items) AS Orders_Per_Day FROM checkout_log WHERE
    MONTH(`created_at`) = MONTH('$year.$month.$day')";
    }
    else
    {
      $strQuery="";
    }
     return $this->query($strQuery);
  }


  function numVisits($filter=""){
    if($filter=="Customer"){
      $strQuery="Select count(PersonID) as Num_Customer_Visits from login_log WHERE
    DATE(`LogInTime`) = CURDATE() AND account_type='1'";
    }
    else if ($filter=="Employee"){
      $strQuery="Select count(PersonID) as Num_Customer_Visits from login_log WHERE
    DATE(`LogInTime`) = CURDATE() AND account_type='2'";
    }
    else{
       $strQuery="Select count(PersonID) as Num_Customer_Visits from login_log WHERE
    DATE(`LogInTime`) = CURDATE() AND account_type='3'";
    }

    return $this->query($strQuery);
  }


  function csvExportCData(){
    $csv = new CSV(array('Customer Information'));

    $customerData =$this->searchCustomer();
    $customerData= $this->fetchDB($customerData);
    $length =sizeof($customerData);
    $count = 0;

    $csv->addRow(array('Cnumber', 'Cname', 'Street', 'Zip Code','Phone Number'));
    while($count<$length){
      $csv->addRow(array($customerData[$count]['cno'], $customerData[$count]['cname'],
                            $customerData[$count]['street'], $customerData[$count]['zip'],
                           $customerData[$count]['phone']));
      $count++;
    }

    $filename = 'customer_data';
    $csv->export($filename);
  }
}


?>
