<html>
 <!--CHANGELOG
    Changed column names to reflect changes made in database - 2/1/2017
	Added agreed upon user interface - 2/2/2017
	Formatted code - 2/2/2017
-->
<!--
  @author David Okyere
  @desc - This pageshows the list of items and provides a link to edit or add a new item.
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
      <a href="#">Lab1</a>
       <ul class="menu vertical">
        <li><a href="View/customers.php">Customers</a></li>
        <li><a href="View/employees.php">Employees</a></li>
        <li><a href="View/orders-creation.php">Orders</a></li>
       </ul>
      </li>
      <li>
        <a href="dashboard.php">Items</a>
          <ul class="menu vertical">
          <li><a href="View/addItem.php">Add Item</a></li>
          <li><a href="View/itemsSearch.php">Search Item</a></li>
        </ul>
        </li>
   </ul>
  </div>
 </div>
<div>
 <center>
  <a href="View/addItem.php">Add New</a>
</div>

<?php
include_once("Model/items.php");
$obj=new items();
$result="";

 $r=$obj->getItems();
 if (!$r)
 {
  echo "Error occurred when retrieving information";
 }

 echo "<div class='row'>
        <div class='large-10 columns'>
          <table>
            <thead>
		      <tr>
                <td>Item Name</td>
                <td>Quantity on Hand</td>
                <td>Price</td>
                <td>Reorder Level</td>
				<td>Options</td>
              </tr>
            </thead>";

  while ($row=$obj->fetch())
  {
   echo "<tr>
         <td>{$row['iname']}</td>
		 <td>{$row['qoh']}</td>
		 <td>{$row['price']}</td>
		 <td>{$row['olevel']}</td>
		 <td><a href='View/editItem.php?pno={$row['ino']}'>Edit</a>
		 </tr>";
   }
 echo "</table>
       </div>
       </div>";

?>

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

    <script src="JS/jquery.js"></script>
    <script src="JS/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>
</html>
