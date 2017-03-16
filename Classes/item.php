<!--
  @author Youssouf da Silva, David Okyere & Kwabena Boohene
  @desc item class containing related functions
-->
  
<?php

include_once('adb.php');
class item extends adb{
	
/**
* @desc Constructor
**/
  function item(){

  }

/**
 * @desc Gets items that have been recently accessed
 **/
  function getRecentItems(){
    $strQuery = "SELECT * FROM items LIMIT 10";
    return $this->query($strQuery);
  }

/**
* @desc Searches for an item based on specified requirements
* @param string $name
**/
  function searchItems($iname){
    $strQuery = "SELECT * FROM items WHERE iname LIKE '%$iname%'";
    return $this->query($strQuery);
  }

/**
* @desc Presents items in an order specified by their respective types
* @param int $type
**/
  function orderBy($type){
    //ASC || DESC
    $strQuery = "SELECT * FROM items ORDER BY ino $type";
    return $this->query($strQuery);
  }

 /**
* @desc Gets specified item's data
* @param int $id
**/
  function getItemDetails($itemId){
    $strQuery = "SELECT * FROM items WHERE ino = '$itemId''";
    return $this->query($strQuery);
  }

/**
* @desc Adds item details
 * @param string $name 
 * @param number $quantity on hand
 * @param string $price
 * @param number $reorder level
 * @param number $category name
 **/
  function addItem($iname, $qoh, $price, $olvl, $catno){
    $strQuery = "INSERT INTO items (iname, qoh, price, olevel, catno) VALUES ('$iname', '$qoh', '$price', '$olvl', '$catno')";
    return $this->query($strQuery);
  }

/**
* @desc Allows for editing employee details
* @param int $id
* @param string $name 
 * @param string $zip 
 * @param date $hiredate
 * @param string $password
 * @param string $account_type 
 * @param string $username
 **/
  function editItem($itemId, $iname, $qoh, $price, $olvl, $catno){
    $strQuery = "UPDATE items SET iname='$iname', qoh='$qoh', price='$price', olevel='$olvl', catno='$catno' where ino='$itemId'";
    return $this->query($strQuery);
  }

  function deleteItem($id){
    $strQuery = "";
    return $this->query($strQuery);
  }
  
  function getItems()
  {
   $strQuery = "SELECT * FROM items";
   return $this->query($strQuery); 
  }

  function getCategory(){
    $strQuery="SELECT * FROM categories";
    return $this->query($strQuery);
  }
}

?>
