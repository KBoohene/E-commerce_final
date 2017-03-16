<?php
/**
 * @author Kwabena Boohene
 * This class contains all methods related to handling
 * of orders and shipping
 * @date
**/
include_once('adb.php');
class order extends adb{
  function order(){

  }

  /**
    * This function adds items to an individual's cart
    * @param {$itemId} ID number of item
    * @param {$orderNo} Cart identtification number
    * @param {$quanity} Number of items to be added
    * @retun : True if successful, False if not
  **/
  function addToCart($itemId,$orderNo,$quantity){
    $strQuery="INSERT INTO odetails(ono, ino, qty) VALUES ('$orderNo','$itemId','$quantity')";
    return $this->query($strQuery);
  }

  /**
    * This function removes items from an individual's cart
    * @param {$itemId} ID number of item
    * @retun : True if successful, False if not
  **/
  function removeFromCart($itemId){
    $strQuery="DELETE FROM odetails WHERE ino='$itemId'";
    return $this->query($strQuery);
  }

  /**
    * This function returns a customers order info based
    * on the person's ID
    * @param {$customerId} ID number of customer
    * @retun : Array if successful, False if not
  **/
  function getCustomerOrders($customerId){
    $strQuery="SELECT ono, cno, received, shipped, created_at FROM orders where cno='$customerId'";
    return $this->query($strQuery);
  }

  /**
    * This function returns the details of items in a cart
    * @param {$orderId} Cart ID number
    * @retun : Array if successful, False if not
  **/
  function getOrderDetails($orderId){
    $strQuery="SELECT ono, ino, qty FROM odetails WHERE ono='$orderId'";
    return $this->query($strQuery);
  }

  /**
    * This function removes all items in a cart
    * @param {$orderId} ID number of cart
    * @retun : True if successful, False if not
  **/
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

  function checkOrder(){

  }

  function createOrder(){

  }

  /**
    * This function updates shipping information of an order
    * @param {$orderId} ID number of the order
    * @param {$shippingDate} Date of order shipment
    * @param {$deliveryDate} Date of order delivery
    * @retun : True if successful, False if not
  **/
  function updateDates($orderId, $shippingDate, $deliveryDate){
    $strQuery="UPDATE orders SET shipped='$shippingDate', received='$deliverDate' WHERE ono ='$orderId'";
    return $this->query($strQuery);
  }
}

?>
