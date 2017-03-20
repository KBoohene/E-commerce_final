
<?php
/**
*  @author Youssouf da Silva, David Okyere & Kwabena Boohene
*  @desc item class containing related functions
*/

include_once('adb.php');
class item extends adb{

/**
* @desc Constructor
**/
  function item(){

  }

/**
* @desc Gets items that have been recently accessed
* @return : Array if successful, False if not
**/
  function getRecentItems(){
    $strQuery = "SELECT * FROM items ORDER BY ino DESC LIMIT 8";
    return $this->query($strQuery);
  }

/**
* @desc Searches for an item based on specified requirements
* @param {$iname} Name of item
* @return : Array if successful, False if not
**/
  function searchItems($iname){
    $strQuery = "SELECT * FROM items WHERE iname LIKE '%$iname%'";
    return $this->query($strQuery);
  }

/**
* @desc Presents items in an order specified by their respective types
* @param {$type} Item type number
* @return : Array if successful, False if not
**/
  function orderBy($type){
    //ASC || DESC
    $strQuery = "SELECT * FROM items ORDER BY ino $type";
    return $this->query($strQuery);
  }

/**
* @desc Gets specified item's data
* @param {$itemId} ID number of item
* @return : Array if successful, False if not
**/
  function getItemDetails($itemId){
    $strQuery = "SELECT * FROM items WHERE ino = '$itemId'";
    return $this->query($strQuery);
  }

/**
* @desc Adds item details
* @param {$iname} Item name
* @param {$qoh} Quantity on hand of item
* @param {$price} Item price
* @param {$olvl} Item reorder level
* @param {$catno} Category number of item
* @return : True if successful, False if not
**/
  function addItem($iname, $qoh, $price, $olvl, $catno){
    $strQuery = "INSERT INTO items (iname, qoh, price, olevel, catno) VALUES ('$iname', '$qoh', '$price', '$olvl', '$catno')";
    return $this->query($strQuery);
  }

/**
* @desc Allows for editing item details
* @param {$itemId} ID number of item
* @param {$iname} Item name
* @param {$qoh} Quantity on hand of item
* @param {$price} Item price
* @param {$olvl} Item reorder level
* @param {$catno} Category number of item
* @return : True if successful, False if not
**/
  function editItem($itemId, $iname, $qoh, $price, $olvl, $catno){
    $strQuery = "UPDATE items SET iname='$iname', qoh='$qoh', price='$price', olevel='$olvl', catno='$catno' where ino='$itemId'";
    return $this->query($strQuery);
  }

/**
* @desc Allows for the deletion of a particular item entry
* @param {$itemId} ID number of item
* @return : True if successful, False if not
**/
  function deleteItem($itemId){
    $strQuery = "DELETE FROM items WHERE ino='$itemId'";
    return $this->query($strQuery);
  }

/**
* @desc Gets all items
* @return : Array if successful, False if not
**/
  function getItems()
  {
   $strQuery = "SELECT * FROM items";
   return $this->query($strQuery);
  }

/**
* @desc Gets all categories
* @return : Array if successful, False if not
**/
  function getCategory(){
    $strQuery="SELECT * FROM categories";
    return $this->query($strQuery);
  }
}

?>
