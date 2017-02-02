<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Order Details</title>
  </head>
  <body>
    <h1>Current Order</h1>
    <p>Go to <a href="task3-orders.php">order creation</a></p>


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

  <!-- <input type='number' name='qty' value=''>
  <button type='button' name='addPart'>Add</button> -->

    <p>
    Click <a href="task3-add-order-part.php?oid=<?php echo $_REQUEST['oid']; ?>">here</a> to add more parts to this order
    </p>

    <br>
    <br>
    <hr>

    <h1>List of Parts added</h1>

    <table border=1>
      <tr>

        <th>Part Name</th>
        <th>Quantity</th>
      </tr>

      <?php
        $mysqli = new mysqli('localhost','youssouf','','coredb');

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
            $resP = $mysqli->query("SELECT pname from parts where pno =".$row['pno']);


            if($resP == false){
              exit();
            } else {
              //fetch
              $rowP = $resP->fetch_assoc();
            }

            echo "<tr>";
            // echo "<option value=' {$row['eno']}'>{$row['ename']}</option>";

            echo "<td>{$rowP['pname']}</td>";
            echo "<td>{$row['qty']}</td>";
            echo "</tr>";
            // ?cmd=1&cid='+cid+'&eid=+eid;
            $row = $res->fetch_assoc();
          }
        }
      ?>
      </table>






      <!-- <tr>
        <td>iPhone</td>
        <td>2</td>
      </tr>
      <tr>
        <td>iPhone Case</td>
        <td>2</td>
      </tr>
    </table> -->

  </body>
</html>
