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
      <title>Create Orders</title>
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

      <h1>Order Creation</h1>

      <div class="row">
          <div class="large-3 columns">
            <label>Select Consumer
              <select  type="select" id="consumerId">
                <option value="-1">No Selection</option>

                <?php
                  include_once("adb.php");
                  $adb=new adb();

                  if(!$adb->connect()){
                    // if you can't find a connection then exit
                    echo "Error connecting";
                    exit();
                  }

                  $res = $adb->query("SELECT cno, cname from customers");

                  if($res == false){
                    exit();
                  } else {
                    //fetch
                    $row = $adb->fetch();
                    while($row){
                      echo "<option value='{$row['cno']}'>{$row['cname']}</option>";
                      $row = $adb->fetch();
                    }
                  }
                  $resrow = $adb->fetch();
                ?>
              </select>
            </label>
              <button type="button" class="button" onclick="createOrder()">Create Order</button>

            <!-- <a href="#" class="button" onclick="createOrder()">Create Order</a> -->
          </div>
        </div>

        <hr>

        <h1> List of available orders</h1>

        <div class='row'>
          <div class='large-10 columns'>
        <table >
          <thead>
            <tr>
              <th>#</th>
              <th>Consumer</th>
              <th>Actions</th>
            </tr>
          </thead>

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
              echo "<td>
                <a href='orders-details.php?oid={$row['ono']}'>Details</a> |
                 <a href='task3-add-order-part.php?oid={$row['ono']}'>Add Part</a></td>";
              echo "</tr>";
              // ?cmd=1&cid='+cid+'&eid=+eid;
              $row = $res->fetch_assoc();
            }
          }
          $resrow = $res->fetch_assoc();

        ?>
        </table>
      </div>
    </div>

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

        function createOrder(){
          var cid = document.getElementById("consumerId").value.trim();

          if (cid == -1){
            alert('Please make all required selections!');
          } else {
            // window.location.href="index.php?uid=1";
            window.location.href="task3-orders-ajax.php?cmd=1&cid="+cid;

          }
        }
    </script>

  </body>
</html>
