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
* @param string $name 
* @param string $street
* @param string $zip
* @param string $phone
* @param string $username
* @param string $password
* @param string $status 
**/
  function addCustomer($cname, $street, $zip, $phone, $username, $password, $status){
    $strQuery = "INSERT INTO customers (cno, cname, street, zip, phone, Username, Password, status, created_at) VALUES (NULL, '$cname', '$street', '$zip', '$phone', '$username', '$password', 'enabled', CURRENT_TIMESTAMP);";
    return $this->query($strQuery);
  }

/**
* @desc Allows registered customer to log into their account and previous sessions
* @param string $username
* @param string $password
**/
  function loginCustomer($username, $password){
    $strQuery = "SELECT * FROM customers WHERE Username LIKE '$username'";
    return $this->query($strQuery);
  }

/**
* @desc Allows for editing customer details
* @param int $id
* @param string $name 
* @param string $street 
* @param string $zip
* @param string $phone
* @param string $username 
* @param string $password
* @param string $status 
**/
  function editCustomer($customerId, $cname, $street, $zip, $phone, $username, $password, $status){
    $strQuery = "UPDATE customers SET cname = '$cname', street = '$street', zip = '$zip', phone = '$phone', Username = '$username', Password = '$password', status = '$status' WHERE cno = '$customerId'";
    return $this->query($strQuery);
  }

/**
* @desc Gets specified customer's data
* @param int $id
**/
  function getCustomerData($customerId){
    $strQuery = "SELECT * FROM customers WHERE cno = '$customerId'";
    return $this->query($strQuery);
  }

/**
* @desc Counts number of customers
**/
  function getNumberOfCustomers(){
    $strQuery = "SELECT COUNT(*) FROM customers";
    return $this->query($strQuery);
  }

/**
* @desc Searches for a customer based on specified requirements
* @param string $name
**/
  function searchCustomers($cname){
    $strQuery = "SELECT * FROM customers WHERE cname LIKE '%$cname%'";
    return $this->query($strQuery);
  }

/**
* @desc Change customer status to 'enabled'
* @param int id
**/
  function enableCustomer($customerId){
     $strQuery = "UPDATE customers SET status = 'enabled' WHERE cno = $customerId";
     return $this->query($strQuery);
  }

/**
* @desc Change customer status to 'disabled'
* @param int id
**/
  function disableCustomer($customerId){
    $strQuery = "UPDATE customers SET status = 'disabled' WHERE cno = $customerId";
    return $this->query($strQuery);
  }

/**
* @desc Gets customer assigned zip codes
**/
  function getZips(){
    $strQuery = "SELECT * FROM `zipcodes`";
    return $this->query($strQuery);
  }

/**
* @desc Gets all customers
**/
  function getCustomers()
  {
    $strQuery = "SELECT * FROM customers";
    return $this->query($strQuery);
  }

}

?>
