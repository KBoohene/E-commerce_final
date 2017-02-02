<!--CHANGELOG
    Changed column names to reflect changes made in database - 2/1/2017
	Added agreed upon user interface - 2/2/2017
	Formatted code - 2/2/2017
-->
<!--
  @author David Okyere
  @desc - This page allows for changes to be made to a specific item's details.
-->

<?php
  include_once("items.php");
  $item = new items();
  $pid="";
  $pname="";
  $qtyonhand="";
  $price="";
  $olevel="";
  if(isset($_REQUEST['pno']))
   {
	$pid=$_REQUEST['pno'];
	$r=$item->getItemsForEdit($pid);
	if (!$r)
	 {
	  echo "Unsuccessful";
      return;			  
	 }
	 while ($res=$item->fetch())
	  {
	   $pid=$res['ino'];
	   $pname=$res['iname'];
	   $qtyonhand=$res['qoh'];
	   $price=$res['price'];
	   $olevel=$res['olevel'];
	   }
	}
?>


<html>
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
 
 <center>
  <form action="" method="GET" onsubmit='validate()'>
   <input type="hidden" name="pid" value="<?php echo $pid ?>">
   <div>Part Name: <input type="text" name="iname" value="<?php echo $pname ?>"/></div>
   <div>Quantity on Hand: <input type="text" name="qoh" value="<?php echo $qtyonhand ?>"/></div>
   <div>Price: <input type="text" name="price" value="<?php echo $price ?>"/></div>
   <div>Re-order Level: <input type="text" name="olevel" value="<?php echo $olevel ?>"/></div>
   <input type="submit" name="up" value="Edit">
  </form>
			
<?php		
 if(isset($_REQUEST['up']))
 {
  $part = new items();
  $pid=$_REQUEST['pid'];
  $pname =$_REQUEST['iname'];
  $qtyonhand =$_REQUEST['qoh'];
  $price=$_REQUEST['price'];
  $relevel=$_REQUEST['olevel'];
		
 $re=$part->editItem($pid,$pname,$qtyonhand,$price,$relevel);
 if(!$re)
  {
   echo "error updating";
  }
  else
  {
   echo "successfully updated";
   header ("Location:dashboard.php");
  }
 }
?>

<div class="footer">
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
	