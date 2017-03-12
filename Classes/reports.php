<?php
/**
 * @author Kwabena Boohene
 * This class contains all methods related to report generation
 * @date
**/

require_once('csv.class.php');
include_once('../adb.php');
class reports extends adb{
  /**
    * @param: none
    * @return: none
    * Constructor for reports class
  **/
  function reports(){
  }

  /**
    * This function returns the number of customers
    * in the database
    * @param : None
    * @retun : Number of customers
  **/
  function countCustomers(){

    $strQuery="Select count(cno) as Num_Customers from customers ";
    $array=$this->query($strQuery);
    $count = $this->fetchDB($array);
    return $count;
  }

  /**
    * This function returns the number of items that have
    * been ordered on a specific day the current day
    * @param {$day} day of the week
    * @param {$month} the month
    * @param {$year} the year
    * @retun : Number of items ordered
  **/
  function numItemsGivenDay($day=false,$month=false,$year=false){
    if(!$day==false){
      //YYYY-MM-DD
      $strQuery="SELECT SUM(num_items) AS Orders_Per_Day FROM checkout_log WHERE
    DATE(`created_at`) =".$year.'-'.$month.'-'.$day;
    }
    else
    {
      $strQuery="SELECT SUM(num_items) AS Orders_Per_Day FROM checkout_log WHERE
        DATE(`created_at`) =CURDATE()";
    }
  return $this->query($strQuery);
  }

  /**
    * This function returns the number of items that have
    * been ordered in a specific week or in a current week
    * @param {$day} day of the week
    * @param {$month} the month
    * @param {$year} the year
    * @retun : Number of items ordered
  **/
  function numItemsGivenWeek($day=false,$month=false,$year=false){
     if(!$day==false){
      //YYYY-MM-DD
      $strQuery="SELECT SUM(num_items) AS Orders_Per_Day FROM checkout_log WHERE
    WEEKOFYEAR(`created_at`) = WEEKOFYEAR('$year.'-'.$month.'-'.$day')";
    }
    else
    {
      $strQuery="SELECT SUM(num_items) AS Orders_Per_Day FROM checkout_log WHERE
    WEEKOFYEAR(`created_at`) = WEEKOFYEAR(CURDATE())";
    }
    return $this->query($strQuery);
  }

  /**
    * This function returns the number of items that have
    * been ordered on a specific month or current month
    * @param {$day} day of the week
    * @param {$month} the month
    * @param {$year} the year
    * @retun : Number of items ordered
  **/
  function numItemsGivenMonth($day=false,$month=false,$year=false){
     if(!$day==false){
      //YYYY-MM-DD
      $strQuery="SELECT SUM(num_items) AS Orders_Per_Day FROM checkout_log WHERE
    MONTH(`created_at`) = MONTH('$year.'-'.$month.'-'.$day')";
    }
    else
    {
      $strQuery="SELECT SUM(num_items) AS Orders_Per_Day FROM checkout_log WHERE
    MONTH(`created_at`) = MONTH(CURDATE())";
    }
     return $this->query($strQuery);
  }

  /**
    * This function returns the number of users that have
    * logged into the website given their account type
    * @retun : Number of logged in users
  **/
  function numVisits($filter=""){
    if($filter=="Customer"){
      $strQuery="Select count(PersonID) as Num_Customer_Visits from login_log WHERE
    DATE(`LogInTime`) = CURDATE() AND account_type='1'";
    }
    else if ($filter=="Employee"){
      $strQuery="Select count(PersonID) as Num_Employee_Visits from login_log WHERE
    DATE(`LogInTime`) = CURDATE() AND account_type='2'";
    }
    return $this->query($strQuery);
  }

  /**
    * This function returns the number of individuals that have
    * visited the website on a specific day or current day
    * @param {$day} day of the week
    * @param {$month} the month
    * @param {$year} the year
    * @retun : Number of site visitors
  **/
  function countVisitors($day=false,$month=false,$year=false){
    if(!$day==false){
      $strQuery="SELECT count(DISTINCT IP_address) AS Num_IP_addresses FROM visitors_log WHERE
    DATE(`created_at`) ='$year'.'-'.'$month'.'-'.'$day'";
    }
    else
    {
      $strQuery="SELECT count(DISTINCT IP_address) AS Num_IP_addresses FROM visitors_log WHERE
    DATE(`created_at`) =CURDATE()";
    }
    return $this->query($strQuery);
  }

  /**
    * This function adds an IP address to the visitors_log
    * table
    * @param {$address} visitor's IP address
    * @retun : TRUE or false
  **/
  function insertIP($address){
    $strQuery="INSERT INTO visitors_log (IP_address) VALUES ('$address')";
    return $this->query($strQuery);
  }

  /**
    * This function exports data to a csv format based on
    * a filter criteria
    * @param {$filter} Determines what data to export
  **/
  function csvExportData($filter=""){
    if($filter==1){
      $csv = new CSV(array('Customer Information'));

      $strQuery ="SELECT * from customer";
      $customerData =$this->query($strQuery);
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
    else if($filter==2){}
    else if($filter==3){}
    else if($filter==4){}
    else if($filter==5){}
  }
}


?>
