<html>
<!--CHANGELOG
	Created Class - 1/25/2017
	Added filter number to separate employees from customer -1/26/2017
	Added basic user interface - 2/1/2017
	Formatted code with proper indenting -2/1/2017
-->
	<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Add Items to Order</title>
      <link rel="stylesheet" href="Css/foundation.min.css">
      <link rel="stylesheet" href="Css/style.css">

  </head>


  <body>
    <div class="top-bar" id="example-animated-menu" data-animate="hinge-in-from-top spin-out">
        <div class="top-bar-left">
          <ul class="dropdown menu" id="top-navi" data-dropdown-menu>
            <li class="menu-text">Site Title</li>
            <li>
              <a href="#">One</a>
              <ul class="menu vertical">
                <li><a href="#">One</a></li>
                <li><a href="#">Two</a></li>
                <li><a href="#">Three</a></li>
              </ul>
            </li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
          </ul>
        </div>
      </div>

			<h1>Current Order</h1>
	    <p>Go to <a href="orders-creation.php">order creation</a></p>
			<p>See more <a href="orders-details.php?oid=<?php echo $_REQUEST['oid']; ?>">details</a> about this order</p>

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
	      $mysqli = new mysqli('localhost','youssouf','','coredb');

	      if($mysqli->connect_errno){
	        echo "Error connecting";
	        exit();
	      }

	      $res = $mysqli->query("SELECT ono, cno, eno from orders where ono = ".$_REQUEST['oid']);

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

	<hr>

	<h1>Search and Add Order Items</h1>

	<form action="orders-items.php?oid=<?php echo $_REQUEST['oid'].'&'; ?>go"  id="searchform" method="POST">
		<div class="row">
			<div class="large-12 columns">
				<div class="row collapse">
					<div class="small-10 columns">
						<!-- <input class="search-bar" id="pname" type="text" name="txtSearch"> -->
						<input  type="text" name="pname">
					</div>
					<div class="small-2 columns">
						<!-- <button type="submit" name="submit" value="Search" class="button">Search</button> -->
						<input  type="submit" name="submit" value="Search" class="button">
					</div>
				</div>
			</div>
			<?php
			if(isset($_POST['submit'])){
				echo '<p>Showing results for "'.$_POST['pname'].'"</p>';
				echo '<a href="orders-items.php?oid='.$_REQUEST['oid'].'"><button type="button" class="button">Show All</button></a><br>';
			}
			 ?>
		</div>
	</form>




<br>

<div class='row'>
	<div class='large-10 columns'>
	<table border=1>
		<tr>
			<th>Part #</th>
			<th>Part Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Action</th>
		</tr>
	<?php
	//code below from http://www.webreference.com/programming/php/search/2.html
	if(isset($_POST['submit'])){
		if(isset($_GET['go'])){
			// if(preg_match("/^[  a-zA-Z]+/", $_POST['pname'])){
				$pname=$_POST['pname'];

				//connect  to the database
				$mysqli = new mysqli('localhost','youssouf','','coredb');
				if($mysqli->connect_errno){
					echo "Error connecting";
					exit();
				}

				//-query the database table and query against the mysql query function
				$res = $mysqli->query("SELECT * FROM parts WHERE pname LIKE '%" . $pname .  "%'");

				$row = $res->fetch_assoc();
				while($row){
								$PartNo = $row['pno'];
								$PartName=$row['pname'];
								$Price=$row['price'];
								$Qty=$row['qoh'];

								$ono = $_REQUEST['oid'];
								$olvl = $row['olevel'];
				//-display the result of the array
				echo "<tr>";
				echo "<td>{$PartNo}</td>";
				echo "<td>{$PartName}</td>";
				echo "<td>{$Price}</td>";
				echo "<td>{$Qty}</td>";
				echo "<td> <input type='number' id='qtyId{$PartNo}'>
				<button onclick='addPart({$PartNo},{$ono},{$olvl},{$Qty})'
				 type='button' class='button'>Add</button></td>";
				echo "</tr>";
				//echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$FirstName . " " . $LastName .  "</a></li>\n";
				//echo "</ul>";
				$row = $res->fetch_assoc();
				}
				echo "</table>";
				echo "</div>
				</div>";

		}
	} else {
		// show all data

		//connect  to the database
		$mysqli = new mysqli('localhost','youssouf','','coredb');
		if($mysqli->connect_errno){
			echo "Error connecting";
			exit();
		}

		//-query the database table and query against the mysql query function
		$res = $mysqli->query("SELECT * FROM parts");

		$row = $res->fetch_assoc();
		while($row){
						$PartNo = $row['pno'];
						$PartName=$row['pname'];
						$Price=$row['price'];
						$Qty=$row['qoh'];

						$ono = $_REQUEST['oid'];
						$olvl = $row['olevel'];
		//-display the result of the array
		echo "<tr>";
		echo "	<td>{$PartNo}</td>";
		echo "	<td>{$PartName}</td>";
		echo "	<td>{$Price}</td>";
		echo "	<td>{$Qty}</td>";
		echo "	<td>
							<input type='number' id='qtyId{$PartNo}'>
									<button onclick='addPart({$PartNo},{$ono},{$olvl},{$Qty})'type='button' class='button'>
		 									Add
		 							</button>
		 				</td>";
		echo "</tr>";
		//echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$FirstName . " " . $LastName .  "</a></li>\n";
		//echo "</ul>";
		$row = $res->fetch_assoc();
		}
		echo "</table>";
		echo "</div>
		</div>";
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

				function addPart(pno, ono, olevel, qoh){
		      var id = "qtyId" + pno;

		      var qty = document.getElementById(id).value.trim();

		      if (qty == ''){
		        alert('You\'ve got to select how many products you wanna order bro!');
		      } else {
		        var totalOrders = olevel + qty;
		        if (totalOrders > qoh){
		          alert('Please You\'ve ordered too much products');
		        } else {
		          window.location.href="task3-orders-ajax.php?cmd=2&ono="+ono+"&pno="+pno+"&qty="+qty;
		        }
		      }
		    }
    </script>

  </body>
</html>
