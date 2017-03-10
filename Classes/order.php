<?php

include_once('../adb.php');
class order extends adb{
  function order(){

  }

  function addToCart($itemId,$orderNo,$quantity){
    $strQuery="INSERT INTO odetails(ono, ino, qty) VALUES ('$orderNo','$itemId','$quantity')";
    return $this->query($strQuery);
  }

  function removeFromCart($itemId){
    $strQuery="DELETE FROM odetails WHERE ino='$itemId'";
    return $this->query($strQuery);
  }

  function getCustomerOrders($customerId){
    $strQuery="SELECT ono, cno, received, shipped, created_at FROM orders where cno='$customerId'";
    return $this->query($strQuery);
  }

  function getOrderDetails($orderId){
    $strQuery="SELECT ono, ino, qty FROM odetails WHERE ono='$orderId'";
    return $this->query($strQuery);
  }

  function emptyCart($orderId){
    $strQuery="DELETE FROM odetails WHERE ono='$orderId'";
    return $this->query($strQuery);
  }

  function checkout(){

  }

  function getDates($orderId,$customerId){
    $strQuery="SELECT shipped, received, created_at FROM orders where ono='$orderId' AND cno='$customerId'";
    return $this->query($strQuery);
  }

  function getNumOrdersPerWeek(){

  }

  function updateDates($orderId, $shippingDate, $deliveryDate){
    $strQuery="UPDATE orders SET shipped='$shippingDate', received='$deliverDate' WHERE ono ='$orderId'";
    return $this->query($strQuery);
  }
}

?>
