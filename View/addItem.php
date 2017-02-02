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
  <link rel="stylesheet" href="../Css/foundation.min.css">
  <link rel="stylesheet" href="../Css/style.css">
 </head>

 <body>
   <div class="top-bar" id="example-animated-menu" data-animate="hinge-in-from-top spin-out">
  <div class="top-bar-left">
   <ul class="dropdown menu" id="top-navi" data-dropdown-menu>
    <li class="menu-text">Site Title</li>
     <li>
      <a href="#">Lab1</a>
       <ul class="menu vertical">
        <li><a href="customers.php">Customers</a></li>
        <li><a href="employees.php">Employees</a></li>
        <li><a href="orders-creation.php">Orders</a></li>
       </ul>
      </li>
      <li>
        <a href="../dashboard.php">Items</a>
          <ul class="menu vertical">
          <li><a href="addItem.php">Add Item</a></li>
          <li><a href="itemsSearch.php">Search Item</a></li>
        </ul>
        </li>
   </ul>
  </div>
 </div>

   <div class="row">
      <div class="medium-4 medium-centered columns">
        <form action="" method="GET">
         <div> Item ID <input type="text" name="pid"/><br></div>
         <div> Item Name <input type="text" name="iname"/><br></div>
         <div> Quantity on Hand  <input type="text" name="qoh"/><br></div>
         <div> Price <input type="text" name="price"/><br></div>
         <div> Olevel <input type="text" name="olevel"/><br></div>
         <input type="submit" value="Add">
        </form>
      </div>
    </div>

  <div class="footer1">
      <div class="row">
        <div class="large-4 columns">
          <h5>Vivamus Hendrerit Arcu Sed Erat Molestie</h5>
          <p>Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit.</p>
        </div>
        <div class="large-3 large-offset-2 columns">
          <ul class="menu vertical">
            <li><a href="#">One</a></li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
            <li><a href="#">Four</a></li>
          </ul>
        </div>
        <div class="large-3 columns">
          <ul class="menu vertical">
            <li><a href="#">One</a></li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
            <li><a href="#">Four</a></li>
          </ul>
        </div>
      </div>
    </div>

    <script src="../JS/jquery.js"></script>
    <script src="../JS/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
 </body>
</html>

<?php
include_once("../Model/items.php");
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

//calls the function addItem
$result=$part->addItem($pid,$pname,$qoh,$price,$relevel);

?>

