<!--CHANGELOG
    Changed column names to reflect changes made in database - 2/1/2017
	Added agreed upon user interface - 2/2/2017
	Formatted code - 2/2/2017
-->
<!--
  @author David Okyere
  @desc - This page places the details of the selected item into the
          text boxes to allow for editing.
-->

<?php
	include_once("../Model/items.php");
	$item = new items();
	if(!isset($_REQUEST['iname'])){
		exit();		//if no data, exit
	}
	if(isset($_REQUEST['iname'])){
	//print_r($_REQUEST);
	$pid =$_REQUEST['pid'];
	$pname=$_REQUEST['iname'];
	$qtyonhand=$_REQUEST['qtyonhand'];
	$price=$_REQUEST['price'];
	$relevel=$_REQUEST['relevel'];


	$result=$item->editItem($pid,$pname,$qtyonhand,$price,$relevel);
}
	header("Location:../View/dashboard.php");
	exit();

?>
