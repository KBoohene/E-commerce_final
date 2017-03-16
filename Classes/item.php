<?php

include_once('adb.php');
class item extends adb{
  function item(){

  }

  function getRecentItems(){
    $strQuery = "SELECT * FROM items LIMIT 8";
    return $this->query($strQuery);
  }

  function searchItems($iname){
    $strQuery = "SELECT * FROM items WHERE iname LIKE '%$iname%'";
    return $this->query($strQuery);
  }

  function orderBy($type){
    //ASC || DESC
    $strQuery = "SELECT * FROM items ORDER BY ino $type";
    return $this->query($strQuery);
  }

  function getItemDetails($itemId){
    $strQuery = "SELECT * FROM items WHERE ino = '$itemId'";
    return $this->query($strQuery);
  }

  function addItem($iname, $qoh, $price, $olvl, $catno){
    $strQuery = "INSERT INTO items (iname, qoh, price, olevel, catno) VALUES ('$iname', '$qoh', '$price', '$olvl', '$catno')";
    return $this->query($strQuery);
  }

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
