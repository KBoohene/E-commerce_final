<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Task 3 - Orders</title>
  </head>
  <body>

  <h1>Order Creation</h1>

  <select type="select" id="consumerId">
    <option value = "-1">-- Select Consumer --</option>
  <?php
    $mysqli = new mysqli('localhost','youssouf','','coredb');

    if($mysqli->connect_errno){
      echo "Error connecting";
      exit();
    }

    $res = $mysqli->query("SELECT cno, cname from customers");

    if($res == false){
      exit();
    } else {
      //fetch
      $row = $res->fetch_assoc();
      while($row){
        echo "<option value=' {$row['cno']}'>{$row['cname']}</option>";
        $row = $res->fetch_assoc();
      }
    }
    $resrow = $res->fetch_assoc();
  ?>
</select>

<select type="select" id="employeeId">
  <option value = "-1">-- Select Employee --</option>
<?php
  $mysqli = new mysqli('localhost','youssouf','','coredb');

  if($mysqli->connect_errno){
    echo "Error connecting";
    exit();
  }

  $res = $mysqli->query("SELECT eno, ename from employees");

  if($res == false){
    exit();
  } else {
    //fetch
    $row = $res->fetch_assoc();
    while($row){
      echo "<option value=' {$row['eno']}'>{$row['ename']}</option>";
      $row = $res->fetch_assoc();
    }
  }
  $resrow = $res->fetch_assoc();
?>
</select>

  <button onclick="createOrder()">Create Order</button>

  <br>
  <br>
  <hr>

  <h1>List of available orders</h1>

  <table border=1>
  <tr>
    <th>#</th>
    <th>Consumer</th>
    <th>Employee</th>
    <th>Actions</th>
  </tr>
  <?php
    $mysqli = new mysqli('localhost','youssouf','','coredb');

    if($mysqli->connect_errno){
      echo "Error connecting";
      exit();
    }

    $res = $mysqli->query("SELECT ono, cno, eno from orders");

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
        echo "<td>
          <a href='task3-order-details.php?oid={$row['ono']}'>Details</a> |
           <a href='task3-add-order-part.php?oid={$row['ono']}'>Add Part</a></td>";
        echo "</tr>";
        // ?cmd=1&cid='+cid+'&eid=+eid;
        $row = $res->fetch_assoc();
      }
    }
    $resrow = $res->fetch_assoc();

  ?>
</table>

<script type="text/javascript">
/*
  var currentObject=null;


  // callback function for add person method

  function addOrderComplete(xhr,status){
    if(status!="success"){
      alert("error sending request");
      return;
    }

    var obj=$.parseJSON(xhr.responseText);
    if(obj.result==0){
      alert(obj.message);
    }else{

      alert("Order added");

    }

    currentObject=null;
  }


  //makes a AJAX call to server to create an order

  function createOrder(){
    var cid = document.getElementById("consumerId").value.trim();
    var eid = document.getElementById("employeeId").value.trim();

    if (cid == -1 || eid == -1){
      alert('Please make all required selections!');
    } else {
      var theUrl="task3-orders-ajax.php?cmd=1&cid="+cid+"&eid="+eid;

      // test code
      alert(theUrl);
      $.ajax(theUrl,
        {
          async:true,
          complete:addOrderComplete
        }
        );
    }
  }
*/
function createOrder(){
  var cid = document.getElementById("consumerId").value.trim();
  var eid = document.getElementById("employeeId").value.trim();

  if (cid == -1 || eid == -1){
    alert('Please make all required selections!');
  } else {
    // window.location.href="index.php?uid=1";
    window.location.href="task3-orders-ajax.php?cmd=1&cid="+cid+"&eid="+eid;

    <?php
    /*
    $customerid = echo "<script type='text/javascript'>document.getElementById('consumerId').value.trim();</script>";
    $employeeid = echo "<script type='text/javascript'>document.getElementById('employeeId').value.trim();</script>";

    include_once("task3-order-info.php");
    $obj=new task3OrderInfo();

    $r = $obj->addOrder($customerid,$employeeid);
    if($r==false){
			// echo '{"result":0,"message":"Order not added"}';
      echo "<script type='text/javascript'>alert('Order not added');</script>";
		}else{
      // echo '{"result":1,"message":"Order added"}';
      echo "<script type='text/javascript'>alert('Order added');</script>";
		}
    */
     ?>

  }
}

</script>
  </body>
</html>
