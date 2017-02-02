<html>
<!--CHANGELOG
    Changed column names to reflect changes made in database - 2/1/2017
	Added agreed upon user interface - 2/2/2017
	Formatted code - 2/2/2017
-->
<!--
  @author David Okyere
  @desc - This page adds items to the current list of items.
-->

 <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Items</title>
  <link rel="stylesheet" href="Css/foundation.min.css">
  <link rel="stylesheet" href="Css/style.css">
 </head>
 
 <body>	
  <div class="top-bar" id="example-animated-menu" data-animate="hinge-in-from-top spin-out">
   <div class="top-bar-left">
    <ul class="dropdown menu" id="top-navi" data-dropdown-menu>
     <li class="menu-text">Site Title</li>
       <li>
        <a href="#">Men</a>
         <ul class="menu vertical">
          <li><a href="#">Jerseys</a></li>
          <li><a href="#">Boots</a></li>
          <li><a href="#">Accessories</a></li>
         </ul>
        </li>
       <li><a href="#">Women</a></li>
       <li><a href="#">Children</a></li>
      </ul>
    </div>
   </div>
  <form action="" method="GET"> 
   <div> Part ID <input type="text" name="pid"/><br></div>
   <div> Part Name <input type="text" name="iname"/><br></div>
   <div> Quantity on Hand  <input type="text" name="qoh"/><br></div>
   <div> Price <input type="text" name="price"/><br></div>
   <div> Olevel <input type="text" name="olevel"/><br></div>
   <input type="submit" value="Add">
  </form>
 </body>
</html>	

<?php
include_once "items.php";
//Create an object of patient class
$item=new items();

if(isset($_REQUEST['pid']))
 {
  $pid=$_REQUEST['pid'];
  $pname=$_REQUEST['iname'];
  $qoh=$_REQUEST['qoh'];
  $price=$_REQUEST['price'];
  $relevel=$_REQUEST['olevel'];
 }
else{
	return;
}

//calls the function addPatient
$result=$part->addItem($pid,$pname,$qoh,$price,$relevel);

?>