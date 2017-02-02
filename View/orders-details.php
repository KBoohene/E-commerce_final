<html>
<!--CHANGELOG
    @author Youssouf Da-Silva
	Created Class - 1/25/2017
	Added filter number to separate employees from customer -1/26/2017
	Added basic user interface - 2/1/2017
	Formatted code with proper indenting -2/1/2017
-->
	<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>View Order Details</title>
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

			<h1>Current Order</h1>
	    <p>Go to <a href="orders-creation.php">order creation</a></p>

			<div class='row'>
				<div class='large-10 columns'>
	    <table>
				<thead>
					<tr>
			      <th>#</th>
			      <th>Consumer</th>
			    </tr>
				</thead>

	    <?php
          include_once("../Model/setting.php");
	      $mysqli = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

	      if($mysqli->connect_errno){
	        echo "Error connecting";
	        exit();
	      }

	      $res = $mysqli->query("SELECT ono, cno from orders where ono = ".$_REQUEST['oid']);

	      if($res == false){
	        exit();
	      } else {
	        //fetch
	        $row = $res->fetch_assoc();

	        while($row){
	          //echo ("<script>alert('SELECT cname from customers where cno ={$row['cno']}');</script>");
	          $resC = $mysqli->query("SELECT cname from customers where cno =".$row['cno']);

	          if($resC == false){
	            exit();
	          } else {
	            //fetch
	            $rowC = $resC->fetch_assoc();
	          }


	          echo "<tr>";
	          // echo "<option value=' {$row['eno']}'>{$row['ename']}</option>";
	          echo "<td>{$row['ono']}</td>";
	          echo "<td>{$rowC['cname']}</td>";
	          echo "</tr>";
	          // ?cmd=1&cid='+cid+'&eid=+eid;
	          $row = $res->fetch_assoc();
	        }
	      }
	    ?>
	  </table>
	</div>
</div>

	  <!-- <input type='number' name='qty' value=''>
	  <button type='button' name='addPart'>Add</button> -->

	    <p>
	    Click <a href="orders-items.php?oid=<?php echo $_REQUEST['oid']; ?>">here</a> to add more items to this order
	    </p>


        <hr>

				<h1>List of Items added</h1>

				<div class='row'>
					<div class='large-10 columns'>
				<table>
					<thead>
						<tr>
							<th>Item Name</th>
							<th>Quantity</th>
						</tr>
					</thead>

					<?php
                      include_once ("../Model/setting.php");
						$mysqli = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

						if($mysqli->connect_errno){
							echo "Error connecting";
							exit();
						}

						$res = $mysqli->query("SELECT * from odetails where ono = ".$_REQUEST['oid']);

						if($res == false){
							echo ("<script>alert('Empty Request');</script>");
							exit();
						} else {
							//fetch
							$row = $res->fetch_assoc();

							while($row){
								//echo ("<script>alert('SELECT cname from customers where cno ={$row['cno']}');</script>");
								$resP = $mysqli->query("SELECT iname from items where ino =".$row['ino']);


								if($resP == false){
									exit();
								} else {
									//fetch
									$rowP = $resP->fetch_assoc();
								}

								echo "<tr>";
								// echo "<option value=' {$row['eno']}'>{$row['ename']}</option>";

								echo "<td>{$rowP['iname']}</td>";
								echo "<td>{$row['qty']}</td>";
								echo "</tr>";
								// ?cmd=1&cid='+cid+'&eid=+eid;
								$row = $res->fetch_assoc();
							}
						}
					?>
					</table>
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

        function createOrder(){
          var cid = document.getElementById("consumerId").value.trim();

          if (cid == -1){
            alert('Please make all required selections!');
          } else {
            // window.location.href="index.php?uid=1";
            window.location.href="../Conttask3-orders-ajax.php?cmd=1&cid="+cid;

          }
        }
    </script>

  </body>
</html>
