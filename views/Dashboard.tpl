<html>
  <head>
    <title>
      Customer Orders
    </title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.1/js/mdb.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.1/js/mdb.min.js"></script>

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    {if isset($smarty.session.userId)}
      {assign var="customerId" value=$smarty.session.userId}

    {else}
      {assign var="customerId" value=10}
      {"Session not started"}
    {/if}
    {if ($smarty.session.acctype==3)}
       <a href="employeeDisplay.php?eAction=3">Employees</a>
      {else}
    {/if}

  <a href="employeeDisplay.php?eAction=6">Customers</a>
  <a href="employeeDisplay.php?eAction=2">Orders</a>
  <a href="employeeDisplay.php?eAction=13">Items</a>

  {**Number of orders placed per day over the week (Bar graph)**}
  {assign var="Mon" value=$report->getDate("monday this week")}
  {assign var="Tues" value=$report->getDate("tuesday this week")}
  {assign var="Wed" value=$report->getDate("wednesday this week")}
  {assign var="Thur" value=$report->getDate("thursday this week")}
  {assign var="Fri" value=$report->getDate("friday this week")}
  {assign var="Sat" value=$report->getDate("saturday this week")}
  {assign var="Sun" value=$report->getDate("sunday this week")}

  {assign var="MonVal" value=$report->numItemsGivenDay($Mon)}
  {assign var="val1" value=$report->fetchDB($MonVal)}

  {assign var="TuesVal" value=$report->numItemsGivenDay($Tues)}
  {assign var="val2" value=$report->fetchDB($TuesVal)}

  {assign var="WedVal" value=$report->numItemsGivenDay($Wed)}
  {assign var="val3" value=$report->fetchDB($WedVal)}

  {assign var="ThurVal" value=$report->numItemsGivenDay($Thur)}
  {assign var="val4" value=$report->fetchDB($ThurVal)}

  {assign var="FriVal" value=$report->numItemsGivenDay($Fri)}
  {assign var="val5" value=$report->fetchDB($FriVal)}

  {assign var="SatVal" value=$report->numItemsGivenDay($Sat)}
  {assign var="val6" value=$report->fetchDB($SatVal)}

  {assign var="SunVal" value=$report->numItemsGivenDay($Sun)}
  {assign var="val7" value=$report->fetchDB($SunVal)}

  <div class="col-md-6">

    <canvas id="myChart2"></canvas>

  </div>

  <script>

    $(function () {


        var data = {
            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,0.8)",
                    highlightFill: "rgba(220,220,220,0.75)",
                    highlightStroke: "rgba(220,220,220,1)",
                    data: [{$val1.0.Orders_Per_Day}, {$val2.0.Orders_Per_Day},{$val3.0.Orders_Per_Day},
                    {$val4.0.Orders_Per_Day}, {$val5.0.Orders_Per_Day}, {$val6.0.Orders_Per_Day}, {$val7.0.Orders_Per_Day}]
                }
            ]
        };

        var option = {
        responsive: true,
        };


        var ctx = document.getElementById("myChart2").getContext('2d');
        var myBarChart = new Chart(ctx).Bar(data, option);

    });

  </script>



  {**Number of orders shipped versus orders not shipped**}

  {assign var="ans1" value=$report->getOrderShipped(1)}
  {assign var="shipped" value=$report->fetchDB($ans1)}
  {assign var="ans2" value=$report->getOrderShipped(2)}
  {assign var="notShipped" value=$report->fetchDB($ans2)}
<div class="col-md-6">

    <canvas id="myChart1"></canvas>

  </div>
<script>

    $(function () {

    var data = [
        {
            value: {$shipped.0.Num_shipped},
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "Items shipped"
        },
        {
            value: {$notShipped.0.Not_shipped},
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Not Shipped"
        }
    ]
        var option = {
        responsive: true,
        };


        var ctx = document.getElementById("myChart1").getContext('2d');
        var myDoughnutChart = new Chart(ctx).Doughnut(data,option);

    });

  </script>

  {**Top ten customers**}

  </body>
</html>
