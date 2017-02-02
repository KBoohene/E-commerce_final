<?php
/**CHANGELOG
    @author Youssouf Da-Silva
**/


	//check command
	if(!isset($_REQUEST['cmd'])){
		echo "cmd is not provided";
		exit();
	}
	/*get command*/
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
			addOrder();		//if cmd=1 the call addorder
			break;
		case 2:
			addPart();
			break;			//
		default:
			echo '{"result":0,"message":"Command not found"}';
			break;
	}
	//the function addOrder() is called
	function addOrder(){
		//otherwise set  all the values entered into variables
		$customerid=$_REQUEST['cid'];



		//the code below is to test if the firstname has been entered
		// test code echo "the firstname is".$firstname;

		//echo "<script type='text/javascript'>alert('Adding the order. Cus:".$customerid." & Emp:".$employeeid."');</script>";

		include_once("../Model/task3-order-info.php");
		$obj=new task3OrderInfo();

    $r = $obj->addOrder($customerid);

		if($r==false){
			// echo '{"result":0,"message":"Order not added"}';
			echo "<script type='text/javascript'>alert('Order NOT added');</script>";
      echo "<script type='text/javascript'>window.location.href='../View/orders-creation.php';</script>";
		}else{
			// echo '{"result":1,"message":"Order added"}';
      echo "<script type='text/javascript'>alert('Order added');</script>";
      echo "<script type='text/javascript'>window.location.href='../View/orders-creation.php';</script>";

		}
	}

	function addPart(){

		$OrderNo = $_REQUEST['ono'];
		$PartNo  = $_REQUEST['ino'];
		$OrderQty= $_REQUEST['qty'];

		include_once("../Model/adb.php");

		$obj = new adb();

		if ($obj->connect()){
			$queryStr = "INSERT INTO `coredb`.`odetails` (`ono`, `ino`, `qty`) VALUES ('{$OrderNo}', '{$PartNo}', '{$OrderQty}');";
			$result = $obj->query($queryStr);
				echo "<script type='text/javascript'>alert('{$queryStr}');</script>";
			if($result){
				echo "<script type='text/javascript'>alert('Part Added');</script>";
				echo "<script type='text/javascript'>window.location.href='../View/orders-items.php?oid={$OrderNo}';</script>";
			} else {
				echo "<script type='text/javascript'>alert('Part NOT Added');</script>";
				echo "<script type='text/javascript'>window.location.href='../View/orders-items.php?oid={$OrderNo}';</script>";
			}
		}

		//INSERT INTO `coredb`.`odetails` (`ono`, `pno`, `qty`) VALUES ('1', '1', '2'), ('2', '2', '4');
		//echo "<script type='text/javascript'>alert('You\'re trying to order >{$OrderQty}< piece(s) of part #{$PartNo} for Order #{$OrderNo}');</script>";
		//echo "<script type='text/javascript'>window.location.href='task3-add-order-part.php?oid={$OrderNo}';</script>";
	}

	?>
