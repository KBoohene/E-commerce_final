<!--
  @author Youssouf da Silva, David Okyere & Kwabena Boohene
  @desc customer class containing related functions
-->

<?php

include_once('adb.php');
/**
* @desc Constructor
**/
class customer extends adb{
  function customer(){

  }

/**
* @desc Adds customer details
* @param {$cname} Customer name
* @param {$street} Street address of customer
* @param {$zip} Zip address of customer
* @param {$phone} Phone number of customer
* @param {$username} Customer username
* @param {$password} Customer password
* @param {$status} Status of customer
* @return : True if successful, False if not
**/
  function addCustomer($cname, $street, $zip, $phone, $username, $password){
    $strQuery = "INSERT INTO customers (cno, cname, street, zip, phone, Username, Password, status, created_at) VALUES (NULL, '$cname', '$street', '$zip', '$phone', '$username', '$password', 'enabled', CURRENT_TIMESTAMP)";
    return $this->query($strQuery);
  }

/**
* @desc Allows registered customer to log into their account and previous sessions
* @param {$cname} Customer name
* @param {$password} Customer password
* @return : Array if successful, False if not
**/
  function loginCustomer($username, $password){
    $strQuery = "SELECT * FROM customers WHERE Username LIKE '$username'";
    return $this->query($strQuery);
  }

/**
* @desc Allows for editing customer details
* @param {$customerId} ID number of customer
* @param {$cname} Customer name
* @param {$street} Street address of customer
* @param {$zip} Zip address of customer
* @param {$phone} Phone number of customer
* @param {$username} Customer username
* @param {$password} Customer password
* @param {$status} Status of customer
* @return : True if successful, False if not
**/
  function editCustomer($customerId, $cname, $street, $zip, $phone, $username, $password, $status){
    $strQuery = "UPDATE customers SET cname = '$cname', street = '$street', zip = '$zip', phone = '$phone', Username = '$username', Password = '$password', status = '$status' WHERE cno = '$customerId'";
    return $this->query($strQuery);
  }

/**
* @desc Gets specified customer's data
* @param {$customerId} ID number of customer
* @return : Array if successful, False if not
**/
  function getCustomerData($customerId){
    $strQuery = "SELECT * FROM customers WHERE cno = '$customerId'";
    return $this->query($strQuery);
  }

/**
* @desc Counts number of customers
* @return : Number if successful, False if not
**/
  function getNumberOfCustomers(){
    $strQuery = "SELECT COUNT(*) FROM customers";
    return $this->query($strQuery);
  }

/**
* @desc Searches for a customer based on specified requirements
* @param {$cname} Customer name
* @return : Array if successful, False if not
**/
  function searchCustomers($cname){
    $strQuery = "SELECT * FROM customers WHERE cname LIKE '%$cname%'";
    return $this->query($strQuery);
  }

/**
* @desc Change customer status to 'enabled'
* @param {$customerId} ID number of customer
* @return : True if successful, False if not
**/
  function enableCustomer($customerId){
     $strQuery = "UPDATE customers SET status = 'enabled' WHERE cno = $customerId";
     return $this->query($strQuery);
  }

/**
* @desc Change customer status to 'disabled'
* @param {$customerId} ID number of customer
* @return : True if successful, False if not
**/
  function disableCustomer($customerId){
    $strQuery = "UPDATE customers SET status = 'disabled' WHERE cno = $customerId";
    return $this->query($strQuery);
  }

/**
* @desc Gets customer assigned zip codes
* @return : Array if successful, False if not
**/
  function getZips(){
    $strQuery = "SELECT * FROM `zipcodes`";
    return $this->query($strQuery);
  }

/**
* @desc Gets all customers
* @return : Array if successful, False if not
**/
  function getCustomers()
  {
    $strQuery = "SELECT * FROM customers";
    return $this->query($strQuery);
  }

}

?>
