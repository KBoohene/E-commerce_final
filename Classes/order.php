<?php
/**
*  @author Youssouf da Silva, David Okyere & Kwabena Boohene
*  @desc order class containing related functions
*/

include_once('adb.php');
class order extends adb{
/**
* @desc Constructor
**/
  function order(){

  }


/**
* @desc Adds items to an individual's cart
* @param {$customerId} ID number of customer
* @param {$itemId} ID number of item
* @param {$quanity} Number of items to be added
* @return : True if successful, False if not
**/
  function addToCart($orderNo,$itemId,$quantity){

    // $result = $this->checkOrder($customerId);
    // $resultData = $result->fetch_assoc();
    // if ($resultData == false){
    //   //echo "<script>alert('No cart available. Creating one!')</script>";
    //   //create order
    // } else {
    //   //echo "<script>alert('Data: ".print_r($resultData)."')</script>";
    // }

    $strQuery="INSERT INTO odetails(ono, ino, qty) VALUES ('$orderNo','$itemId','$quantity')";
    return $this->query($strQuery);
  }

/**
* @desc Removes items from an individual's cart
* @param {$itemId} ID number of item
* @param {$orderNo} Cart ID number
* @return : True if successful, False if not
**/
  function removeFromCart($orderNo, $itemId){
    $strQuery="DELETE FROM odetails WHERE ono='$orderNo' AND ino='$itemId'";
    return $this->query($strQuery);
  }

/**
* @desc Returns a customers order info based on the person's ID
* @param {$customerId} ID number of customer
* @retun : Array if successful, False if not
**/
  function getCustomerOrders($customerId){
    $strQuery="SELECT ono, cno, received, shipped, created_at FROM orders where cno='$customerId'";
    return $this->query($strQuery);
  }

/**
* @desc Returns the details of items in a cart
* @param {$orderId} Cart ID number
* @return : Array if successful, False if not
**/
  function getOrderDetails($orderId){
    $strQuery="SELECT ono, ino, qty FROM odetails WHERE ono='$orderId'";
    return $this->query($strQuery);
  }

/**
* @desc Removes all items in a cart
* @param {$orderId} ID number of cart
* @return : True if successful, False if not
**/
  function emptyCart($orderId){
    $strQuery="DELETE FROM odetails WHERE ono='$orderId'";
    return $this->query($strQuery);
  }

/**
* @desc Checks out customer order
* @param {$orderId} ID number of cart
* @return : True if successful, False if not
**/
  function checkout($orderId){
    $strQuery="UPDATE `orders` SET `checked_out` = 'Yes' WHERE `orders`.`ono` = '$orderid'";
	  return $this->query($strQuery);
  }

/**
* @desc Gets dates of order
* @param {$orderId} ID number of cart
* @param {$customerId} ID number of customer
* @return : Array if successful, False if not
**/
  function getDates($orderId,$customerId){
    $strQuery="SELECT shipped, received, created_at FROM orders where ono='$orderId' AND cno='$customerId'";
    return $this->query($strQuery);
  }

/**
* @desc Gets weekly number of orders
* @param {$orderId} ID number of cart
* @return : True if successful, False if not
**/
  function getNumOrdersPerWeek(){

  }

/**
* @desc Checks order status
* @param {$customerId} ID number of customer
* @return : Array if successful, False if not
**/
  function checkOrder($customerId){
    $strQuery="SELECT * FROM orders WHERE cno = '$customerId' AND checked_out='No'";
    return $this->query($strQuery);
  }

/**
* @desc Creates new order
* @param {$customerId} ID number of customer
* @return : True if successful, False if not
**/
  function createOrder($customerId){
    $strQuery="INSERT INTO orders (cno, checked_out) VALUES ('$customerId','No')";
    return $this->query($strQuery);
  }

/**
* This function updates shipping information of an order
* @param {$orderId} ID number of the order
* @param {$shippingDate} Date of order shipment
* @param {$deliveryDate} Date of order delivery
* @return : True if successful, False if not
**/
  function updateDates($orderId, $shippingDate, $deliveryDate){
    $strQuery="UPDATE orders SET shipped='$shippingDate', received='$deliverDate' WHERE ono ='$orderId'";
    return $this->query($strQuery);
  }

	function updateCart($ono,$ino,$qty){
		$strQuery="UPDATE odetails SET qty ='$qty' WHERE ono='$ono' AND ino ='$ino'";
		return $this->query($strQuery);
	}

	function getOrders(){
		$strQuery="SELECT * FROM orders";
		return $this->query($strQuery);
	}

	function checkQty($ono,$ino){
		$strQuery="SELECT qty FROM odetails WHERE ono='$ono' AND ino='$ino'";
		return $this->query($strQuery);
	}

	function getOrderData($itemId){
		$strQuery="SELECT * FROM orders WHERE ono = '$itemId'";
		return $this->query($strQuery);
	}

	function editOrder($ono,$cno,$checked_out,$received,$shipped){
		$strQuery="UPDATE orders SET shipped='$shipped', received='$received', checked_out='$checked_out', cno='$cno' WHERE ono ='$ono'";
		return $this->query($strQuery);
	}

	function searchOrders($shipped){
		$strQuery = "SELECT * FROM orders WHERE shipped LIKE '%$shipped%' OR received LIKE'%$shipped%'";
		return $this->query($strQuery);
	}
}
?>
