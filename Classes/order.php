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
  function addToCart($orderNo,$itemId,$quantity,$amt){
    $strQuery="INSERT INTO odetails(ono, ino, qty, amt) VALUES ('$orderNo','$itemId','$quantity','$amt')";
    return $this->query($strQuery);
  }

/**
* @desc Removes items from an individual's cart
* @param {$itemId} ID number of item
* @param {$orderNo} Cart ID number
* @return : True if successful, False if not
**/
  function removeFromCart($orderNo, $itemId){
    $strQuery="DELETE FROM odetails WHERE ono='$orderNo'AND ino='$itemId'";
    return $this->query($strQuery);
  }

/**
* @desc Returns a customers order info based on the person's ID
* @param {$customerId} ID number of customer
* @retun : Array if successful, False if not
**/
  function getCustomerOrders($customerId){
    $strQuery="SELECT ono, cno, received, shipped, created_at, amt FROM orders where cno='$customerId' and checked_out='Yes'";
    return $this->query($strQuery);
  }

/**
* @desc Returns the details of items in a cart
* @param {$orderId} Cart ID number
* @return : Array if successful, False if not
**/
  function getOrderDetails($orderId){
    $strQuery="SELECT ono, ino, qty, amt FROM odetails WHERE ono='$orderId'";
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
  function checkout($orderId,$amt){
    $strQuery="UPDATE `orders` SET `checked_out` = 'Yes', amt='$amt' WHERE `orders`.`ono` = '$orderId'";
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

  /**
  * This function updates item information in a cart
  * @param {$ono} ID number of the order
  * @param {$ino} ID number of the item
  * @param {$qty} Quantity of the item
  * @param {$amt} Amount of the item
  * @return : True if successful, False if not
  **/
	function updateCart($ono,$ino,$qty,$amt){
		$strQuery="UPDATE odetails SET qty ='$qty', amt='$amt' WHERE ono='$ono' AND ino ='$ino'";
		return $this->query($strQuery);
	}

  /**
  * This function checks out the cart of a customer
  * @param {$cno} ID number of the customer
  * @return : Array if successful, False if not
  **/
	function getCheckout($cno){
		$strQuery= "SELECT odetails.ono, odetails.ino, odetails.qty, items.iname, items.price FROM odetails, orders, items WHERE odetails.ono = orders.ono AND orders.cno ='$cno' AND orders.checked_out= 'No' AND odetails.ino = items.ino";
		return $this->query($strQuery);
	}

  /**
  * This function gets the details of an order
  * @param {$ono} ID number of the order
  * @param {$cno} ID number of the customer
  * @param {$checked_out} Status of the order
  * @return : Array if successful, False if not
  **/
	function getODV2($ono, $cno, $checked_out){
		$strQuery= "SELECT odetails.ono, odetails.ino, odetails.qty, odetails.amt, items.iname, items.price FROM odetails, orders, items WHERE odetails.ono = orders.ono AND orders.cno ='$cno' AND orders.ono ='$ono' AND orders.checked_out= '$checked_out' AND odetails.ino = items.ino";
		return $this->query($strQuery);
	}

  /**
  * This function gets all orders
  * @return : Array if successful, False if not
  **/
	function getOrders(){
		$strQuery="SELECT * FROM orders";
		return $this->query($strQuery);
	}

  /**
  * This function gets the quantity of item in an order
  * @param {$ono} ID number of the order
  * @param {$ino} ID number of the item
  * @return : Array if successful, False if not
  **/
	function checkQty($ono,$ino){
		$strQuery="SELECT qty FROM odetails WHERE ono='$ono' AND ino='$ino'";
		return $this->query($strQuery);
	}

  /**
  * This function gets the data of a particular item
  * @param {$itemId} ID number of the item
  * @return : Array if successful, False if not
  **/
	function getOrderData($itemId){
		$strQuery="SELECT * FROM orders WHERE ono = '$itemId'";
		return $this->query($strQuery);
	}

  /**
  * This function changes the details of an order
  * @param {$ono} ID number of the order
  * @param {$cno} ID number of the customer
  * @param {$checked_out} Status of the order
  * @param {$received} Date of order delivery
  * @param {$shipped} Date of order shipment
  * @return : True if successful, False if not
  **/
	function editOrder($ono,$cno,$checked_out,$received,$shipped){
		$strQuery="UPDATE orders SET shipped='$shipped', received='$received', checked_out='$checked_out', cno='$cno' WHERE ono ='$ono'";
		return $this->query($strQuery);
	}

  /**
  * This function searches for orders
  * @param {$shipped} Date of order shipment
  * @return : Array if successful, False if not
  **/
	function searchOrders($shipped){
		$strQuery = "SELECT * FROM orders WHERE shipped LIKE '%$shipped%' OR received LIKE'%$shipped%'";
		return $this->query($strQuery);
	}

  /**
  * This function adds a log of every checked out cart
  * @param {$ono} ID number of the order
  * @param {$cno} ID number of the customer
  * @param {$numItems} Number of Items
  * @return : True if successful, False if not
  **/
	function insertLog($ono, $cno,$numItems){
		$strQuery="INSERT INTO checkout_log (order_no, person_id, num_items) VALUES ('$ono','$cno','$numItems')";
		return $this->query($strQuery);
	}


}
?>
