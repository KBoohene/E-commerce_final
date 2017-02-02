<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Order Part</title>
  </head>
  <body>
    <h1>Current Order</h1>
    <p>Go to <a href="task3-orders.php">order creation</a></p>
    <p>See more <a href="task3-order-details.php?oid=<?php echo $_REQUEST['oid']; ?>">details</a> about this order</p>

    <table border=1>
    <tr>
      <th>#</th>
      <th>Consumer</th>
      <th>Employee</th>
    </tr>
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
          $resE = $mysqli->query("SELECT ename from employees where eno =".$row['eno']);

          if($resC == false){
            exit();
          } else {
            //fetch
            $rowC = $resC->fetch_assoc();
          }

          if($resE == false){
              exit();
            } else {
              //fetch
              $rowE = $resE->fetch_assoc();
            }

          echo "<tr>";
          // echo "<option value=' {$row['eno']}'>{$row['ename']}</option>";
          echo "<td>{$row['ono']}</td>";
          echo "<td>{$rowC['cname']}</td>";
          echo "<td>{$rowE['ename']}</td>";
          echo "</tr>";
          // ?cmd=1&cid='+cid+'&eid=+eid;
          $row = $res->fetch_assoc();
        }
      }
    ?>
  </table>

  <br>
  <br>
  <hr>

    <h1>Search and Add Order Parts</h1>
    <!-- <form>
      <input type="text" id="searchInput" value="">
      <input onclick="search" type="button" value="Search">
      <input type="button" value="Show All">
    </form> -->

    <form  method="post" action="task3-add-order-part.php?oid=<?php echo $_REQUEST['oid'].'&'; ?>go"  id="searchform">
      <input  type="text" name="pname">
      <input  type="submit" name="submit" value="Search">
    </form>

    <?php
    if(isset($_POST['submit'])){
      echo '<a href="task3-add-order-part.php?oid='.$_REQUEST['oid'].'"><button type="button">Show All</button></a><br>';
    }
     ?>


<br>

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
          // echo "<script type='text/javascript'>alert('Part Name: {$pname}');</script>";

      	  // //connect  to the database
      	  // $db=mysql_connect  ("localhost", "youssouf",  "") or die ('I cannot connect to the database  because: ' . mysql_error());
      	  // //-select  the database to use
      	  // $mydb=mysql_select_db("coredb");
      	  // //-query  the database table
      	  // $sql="SELECT  * FROM parts WHERE pname LIKE '%" . $pname .  "%'";
      	  // //-run  the query against the mysql query function
      	  // $result=mysql_query($sql);
          //
      	  // //-create  while loop and loop through result set
      	  // while($row=mysql_fetch_array($result)){

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
           type='button'>Add</button></td>";
          echo "</tr>";
      	  //echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$FirstName . " " . $LastName .  "</a></li>\n";
      	  //echo "</ul>";
          $row = $res->fetch_assoc();
      	  }
          echo "</table>";
    	  // }
    	  // else{
    	  //    echo  "<p>Please enter a search query</p>";
    	  // }
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


      // //connect  to the database
      // $db=mysql_connect  ("localhost", "youssouf",  "") or die ('I cannot connect to the database  because: ' . mysql_error());
      // //-select  the database to use
      // $mydb=mysql_select_db("coredb");
      // //-query  the database table
      // $sql="SELECT * FROM parts";
      // //-run  the query against the mysql query function
      // $result=mysql_query($sql);

      //-create  while loop and loop through result set
      // while($row=mysql_fetch_array($result)){
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
      echo "<td><input type='number' id='qtyId{$PartNo}'>
      <button onclick='addPart({$PartNo},{$ono},{$olvl},{$Qty})'
       type='button'>Add</button></td>";
      echo "</tr>";
      //echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$FirstName . " " . $LastName .  "</a></li>\n";
      //echo "</ul>";
      $row = $res->fetch_assoc();
      }
      echo "</table>";
    }
	?>

  <script type="text/javascript">
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
