<?php
	//check command
	if(!isset($_REQUEST['cmd'])){
		echo "cmd is not provided";
		exit();
	}
	/*get command*/
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
			addToCart();		//if cmd=1 the call delete
			break;
		case 2:
			saveUpdate();
			break;
		case 3:
			checkout();
			break;
		default:
			echo "wrong cmd";	//change to json message
			break;
	}

	function addToCart(){
		if(!isset($_REQUEST['cId']) || !isset($_REQUEST['iId']) || !isset($_REQUEST['qty'])){
			echo "Either the customer id, the item id and/or the qty is not given";	//change to json message
			exit();
		}

		$customerId = $_REQUEST['cId'];
		$itemId = $_REQUEST['iId'];
		$qty = $_REQUEST['qty'];

		include("Classes/order.php");
		$obj = new order();
		//Check if there's a cart available
		$checkResult = $obj->checkOrder($customerId);

		if ($checkResult->num_rows != 0){
			$checkData = $checkResult->fetch_assoc();

			$orderNo = $checkData["ono"];

			$qtyResult = $obj->checkQty($orderNo,$itemId);
			$qtyData = $qtyResult->fetch_assoc();
			$qty = $qtyData['qty'];

			if($qty>0){
				$qty++;
				$obj->updateCart($orderNo,$itemId,$qty);

			}else{
				//Add to the cart
				if($obj->addToCart($orderNo, $itemId, $qty)){
					// echo "Item Added to Cart";
					echo '{"result":0,"message":"Item Added to Cart"}';
				}else{
					// echo "Item was not added to Cart.";
					echo '{"result":1,"message":"Item was not added to Cart"}';
				}
			}


		} else {
			// Creating a cart
			if($obj->createOrder($customerId)){

				$checkResult = $obj->checkOrder($customerId);
				$checkData = $checkResult->fetch_assoc();
				$orderNo = $checkData["ono"];

				//Add to the cart
				if($obj->addToCart($orderNo, $itemId, $qty)){
					// echo "Item Added to Cart";
					echo '{"result":0,"message":"Item Added to Cart"}';
				}else{
					// echo "Item was not added to Cart.";
					echo '{"result":1,"message":"Item was not added to Cart"}';
				}
			} else {
				//order was not created
				echo '{"result":1,"message":"Order was not created"}';
			}
		}
	}

function saveUpdate(){
	include("Classes/order.php");
	$obj = new order();

	$ono = $_REQUEST['ono'];
	$ino = $_REQUEST['ino'];
	$qty = $_REQUEST['qty'];

	$obj->updateCart($ono,$ino,$qty);

	echo '{"result":0,"message":"Cart updated"}';
}

function checkout(){
	include("Classes/order.php");
	$obj = new order();
	$ono = $_REQUEST['ono'];

	$obj->checkout($ono);
	echo '{"result":0,"message":"Order checked out"}';
}

?>
