<?php
/* Smarty version 3.1.30, created on 2017-03-17 18:44:11
  from "C:\xampp\htdocs\E-commerce_final\views\Dashboard.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cc206b9f80e1_10700004',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    '9814d62fb592f0ae2084a6e3c5b720cb2e114c2d' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\Dashboard.tpl',
      1 => 1489772646,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58cc206b9f80e1_10700004 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
  <head>
    <title>
      Customer Orders
    </title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"><?php echo '</script'; ?>
>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <?php echo '<script'; ?>
 type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>

    <!-- MDB core JavaScript -->
    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.1/js/mdb.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.1/js/mdb.min.js"><?php echo '</script'; ?>
>

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <?php if (isset($_SESSION['userId'])) {?>
      <?php $_smarty_tpl->_assignInScope('customerId', $_SESSION['userId']);
?>

    <?php } else { ?>
      <?php $_smarty_tpl->_assignInScope('customerId', 10);
?>
      <?php echo "Session not started";?>

    <?php }?>
    <?php if (($_SESSION['acctype'] == 3)) {?>
       <a href="employeeDisplay.php?eAction=3">Employees</a>
      <?php } else { ?>
    <?php }?>

  <a href="employeeDisplay.php?eAction=6">Customers</a>
  <a href="employeeDisplay.php?eAction=2">Orders</a>
  <a href="employeeDisplay.php?eAction=13">Items</a>


  <?php $_smarty_tpl->_assignInScope('Mon', $_smarty_tpl->tpl_vars['report']->value->getDate("monday this week"));
?>
  <?php $_smarty_tpl->_assignInScope('Tues', $_smarty_tpl->tpl_vars['report']->value->getDate("tuesday this week"));
?>
  <?php $_smarty_tpl->_assignInScope('Wed', $_smarty_tpl->tpl_vars['report']->value->getDate("wednesday this week"));
?>
  <?php $_smarty_tpl->_assignInScope('Thur', $_smarty_tpl->tpl_vars['report']->value->getDate("thursday this week"));
?>
  <?php $_smarty_tpl->_assignInScope('Fri', $_smarty_tpl->tpl_vars['report']->value->getDate("friday this week"));
?>
  <?php $_smarty_tpl->_assignInScope('Sat', $_smarty_tpl->tpl_vars['report']->value->getDate("saturday this week"));
?>
  <?php $_smarty_tpl->_assignInScope('Sun', $_smarty_tpl->tpl_vars['report']->value->getDate("sunday this week"));
?>

  <?php $_smarty_tpl->_assignInScope('MonVal', $_smarty_tpl->tpl_vars['report']->value->numItemsGivenDay($_smarty_tpl->tpl_vars['Mon']->value));
?>
  <?php $_smarty_tpl->_assignInScope('val1', $_smarty_tpl->tpl_vars['report']->value->fetchDB($_smarty_tpl->tpl_vars['MonVal']->value));
?>

  <?php $_smarty_tpl->_assignInScope('TuesVal', $_smarty_tpl->tpl_vars['report']->value->numItemsGivenDay($_smarty_tpl->tpl_vars['Tues']->value));
?>
  <?php $_smarty_tpl->_assignInScope('val2', $_smarty_tpl->tpl_vars['report']->value->fetchDB($_smarty_tpl->tpl_vars['TuesVal']->value));
?>

  <?php $_smarty_tpl->_assignInScope('WedVal', $_smarty_tpl->tpl_vars['report']->value->numItemsGivenDay($_smarty_tpl->tpl_vars['Wed']->value));
?>
  <?php $_smarty_tpl->_assignInScope('val3', $_smarty_tpl->tpl_vars['report']->value->fetchDB($_smarty_tpl->tpl_vars['WedVal']->value));
?>

  <?php $_smarty_tpl->_assignInScope('ThurVal', $_smarty_tpl->tpl_vars['report']->value->numItemsGivenDay($_smarty_tpl->tpl_vars['Thur']->value));
?>
  <?php $_smarty_tpl->_assignInScope('val4', $_smarty_tpl->tpl_vars['report']->value->fetchDB($_smarty_tpl->tpl_vars['ThurVal']->value));
?>

  <?php $_smarty_tpl->_assignInScope('FriVal', $_smarty_tpl->tpl_vars['report']->value->numItemsGivenDay($_smarty_tpl->tpl_vars['Fri']->value));
?>
  <?php $_smarty_tpl->_assignInScope('val5', $_smarty_tpl->tpl_vars['report']->value->fetchDB($_smarty_tpl->tpl_vars['FriVal']->value));
?>

  <?php $_smarty_tpl->_assignInScope('SatVal', $_smarty_tpl->tpl_vars['report']->value->numItemsGivenDay($_smarty_tpl->tpl_vars['Sat']->value));
?>
  <?php $_smarty_tpl->_assignInScope('val6', $_smarty_tpl->tpl_vars['report']->value->fetchDB($_smarty_tpl->tpl_vars['SatVal']->value));
?>

  <?php $_smarty_tpl->_assignInScope('SunVal', $_smarty_tpl->tpl_vars['report']->value->numItemsGivenDay($_smarty_tpl->tpl_vars['Sun']->value));
?>
  <?php $_smarty_tpl->_assignInScope('val7', $_smarty_tpl->tpl_vars['report']->value->fetchDB($_smarty_tpl->tpl_vars['SunVal']->value));
?>

  <div class="col-md-6">

    <canvas id="myChart2"></canvas>

  </div>

  <?php echo '<script'; ?>
>

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
                    data: [<?php echo $_smarty_tpl->tpl_vars['val1']->value[0]['Orders_Per_Day'];?>
, <?php echo $_smarty_tpl->tpl_vars['val2']->value[0]['Orders_Per_Day'];?>
,<?php echo $_smarty_tpl->tpl_vars['val3']->value[0]['Orders_Per_Day'];?>
,
                    <?php echo $_smarty_tpl->tpl_vars['val4']->value[0]['Orders_Per_Day'];?>
, <?php echo $_smarty_tpl->tpl_vars['val5']->value[0]['Orders_Per_Day'];?>
, <?php echo $_smarty_tpl->tpl_vars['val6']->value[0]['Orders_Per_Day'];?>
, <?php echo $_smarty_tpl->tpl_vars['val7']->value[0]['Orders_Per_Day'];?>
]
                }
            ]
        };

        var option = {
        responsive: true,
        };


        var ctx = document.getElementById("myChart2").getContext('2d');
        var myBarChart = new Chart(ctx).Bar(data, option);

    });

  <?php echo '</script'; ?>
>





  <?php $_smarty_tpl->_assignInScope('ans1', $_smarty_tpl->tpl_vars['report']->value->getOrderShipped(1));
?>
  <?php $_smarty_tpl->_assignInScope('shipped', $_smarty_tpl->tpl_vars['report']->value->fetchDB($_smarty_tpl->tpl_vars['ans1']->value));
?>
  <?php $_smarty_tpl->_assignInScope('ans2', $_smarty_tpl->tpl_vars['report']->value->getOrderShipped(2));
?>
  <?php $_smarty_tpl->_assignInScope('notShipped', $_smarty_tpl->tpl_vars['report']->value->fetchDB($_smarty_tpl->tpl_vars['ans2']->value));
?>
<div class="col-md-6">

    <canvas id="myChart1"></canvas>

  </div>
<?php echo '<script'; ?>
>

    $(function () {

    var data = [
        {
            value: <?php echo $_smarty_tpl->tpl_vars['shipped']->value[0]['Num_shipped'];?>
,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "Items shipped"
        },
        {
            value: <?php echo $_smarty_tpl->tpl_vars['notShipped']->value[0]['Not_shipped'];?>
,
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

  <?php echo '</script'; ?>
>



  </body>
</html>
<?php }
}
