<?php

include_once('../adb.php');
class customer extends adb{
  function customer(){

  }

  function addCustomer($cname, $street, $zip, $phone, $username, $password){
    $strQuery = "INSERT INTO customers (cno, cname, street, zip, phone, Username, Password, created_at) VALUES (NULL, '$cname', '$street', '$zip', '$phone', '$username', '$password', CURRENT_TIMESTAMP);";
    return $this->query($strQuery);
  }

  function loginCustomer($username, $password){
    $strQuery = "SELECT Password FROM customers WHERE Username LIKE '$username'";
    return $this->query($strQuery);
  }

  function editCustomer($customerId, $cname, $street, $zip, $phone, $username, $password){
    $strQuery = "UPDATE customers SET cname = '$cname', street = '$street', phone = '$phone', Username = '$username', `Password` = '$password' WHERE cno = $customerId";
    return $this->query($strQuery);
  }

  function getCustomerData($customerId){
    $strQuery = "SELECT * FROM customers WHERE cno = $customerId";
    return $this->query($strQuery);
  }

  function getNumberOfCustomers(){
    $strQuery = "SELECT COUNT(*) FROM customers";
    return $this->query($strQuery);
  }

  function searchCustomers($cname){
    $strQuery = "SELECT * FROM customers WHERE cname LIKE '$cname'";
    return $this->query($strQuery);
  }

  function enableCustomer($customerId){
     $strQuery = "UPDATE customers SET status = 'enabled' WHERE cno = $customerId";
     return $this->query($strQuery);
  }

  function disableCustomer($customerId){
    $strQuery = "UPDATE customers SET status = 'disabled' WHERE cno = $customerId";
    return $this->query($strQuery);
  }

}

?>
