<!--CHANGELOG
    Changed function names to reflect changes made in database - 2/1/2017
	Added agreed upon user interface - 2/2/2017
	Formatted code - 2/2/2017
-->
<!--
  @author David Okyere
  @desc - This page contains functions for editing, adding and searching for items
  -->


<?php 
include_once("adb.php");
class items extends adb
 {
   function items()
    {}
	
   function getItems()
	{
     $strQuery="select * from items";
	 return $this->query($strQuery);
	}
	
	function getItemsForEdit($pid)
	{
	 $strQuery="select * from items where ino = $pid";
	 return $this->query($strQuery);
	}
	
    function searchItems($name)
    {
	 $strQuery="select * from items where iname like '%$name%'";
	 return $this->query($strQuery);
    }
   
    function editItem($pid,$name,$qtyonhand,$price,$relevel)
    {
	 $strQuery= "update items set
				 iname='$name',
				 qoh='$qtyonhand',
				 price='$price',
				 olevel=$relevel
				 where ino=$pid ";
	 return $this->query($strQuery);
    }
	
	function addPatient($pid,$name,$qtyonhand,$price,$relevel)
	{
	 $strQuery="insert into items set 
	            ino='$pid',
				iname='$name',
				qoh='$qtyonhand',
				price='$price',
				olevel='$relevel'";
     $result=$this->query($strQuery);
	 return $result;
	}
 }
	?>