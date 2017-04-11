<?php
/* Smarty version 3.1.30, created on 2017-04-11 15:09:14
  from "C:\xampp\htdocs\E-commerce_final\views\Dashboard.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ecd57ac42726_20755019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9814d62fb592f0ae2084a6e3c5b720cb2e114c2d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\Dashboard.tpl',
      1 => 1491559442,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ecd57ac42726_20755019 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
  <head>
    <title>
      Dashboard
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
    <header>

        <!--Navbar-->
        <nav class="navbar navbar-toggleable-md navbar-dark">
            <div class="container">
                <?php if (isset($_SESSION['acctype'])) {?>
                <a class="navbar-brand" href="employeeDisplay.php?eAction=2">
                  <strong>Employee Core Store</strong>
                </a>
                  <?php } else { ?>
                    <a class="navbar-brand" href="#">
                      <strong>Employee Core Store</strong>
                    </a>
                <?php }?>

                <ul class="nav navbar-nav mr-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Customer</a>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu4">
                           <a class="dropdown-item" href="employeeDisplay.php?eAction=7">Add Customer</a>
                           <a class="dropdown-item" href="employeeDisplay.php?eAction=6">View Customers</a>
                       </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="employeeDisplay.php?eAction=14">Orders</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Items</a>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2">
                           <a class="dropdown-item" href="employeeDisplay.php?eAction=12">Add Item</a>
                           <a class="dropdown-item" href="employeeDisplay.php?eAction=13">View Item</a>
                       </div>
                  </li>
                  <?php if (isset($_SESSION['acctype'])) {?>
										<?php if (($_SESSION['acctype'] == 3)) {?>
										<li class="nav-item dropdown">
											<a class="nav-link dropdown-toggle" id="dropdownMenu5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Employees</a>
											<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu5">
												<a class="dropdown-item" href="employeeDisplay.php?eAction=5">Add Employee</a>
												<a class="dropdown-item" href="employeeDisplay.php?eAction=3">View Employees</a>
											</div>
										</li>
										<?php } else { ?>
									<?php }?>
								<?php }?>
                </ul>

                <form class="form-inline waves-effect waves-light">
                  <input class="form-control" type="text" placeholder="Search">
                </form>

                <ul class="nav navbar-nav nav-flex-icons ml-auto">
                  <li class="nav-item dropdown">
									<?php if (isset($_SESSION['username'])) {?>
											<a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $_SESSION['fullname'];?>
</a>
												<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
													<a class="dropdown-item" onclick="logout()">Logout</a>
													<a class="dropdown-item" href="#">Profile</a>
												</div>
										<?php } else { ?>
											<a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Account</a>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
												<a class="dropdown-item" href="#">Login</a>
											</div>
									<?php }?>
                  </li>
               </ul>


            </div>
        </nav>
	    <!--/.Navbar-->
			
				<?php echo '<script'; ?>
>
						function logoutComplete(xhr, status){

              console.log(xhr);

              var obj=$.parseJSON(xhr.responseText);
							if(obj.result==0){
								console.log(obj.message);
								window.location='employeeDisplay.php?eAction=1';
							}else{
								console.log("Employee not logged out");
								}
						}

						function logout(){

              var theUrl="ajax.php?cmd=4";
               $.ajax(theUrl,
                	{async:true,
                		 complete:logoutComplete}
                );

						}
				<?php echo '</script'; ?>
>
			
    </header>
		<?php if (isset($_SESSION)) {?>
			<?php if (isset($_SESSION['userId'])) {?>
				<?php $_smarty_tpl->_assignInScope('customerId', $_SESSION['userId']);
?>

			<?php } else { ?>
				<?php echo "Session not started";?>

			<?php }?>
		<?php }?>


    
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

<div class="row">
    <div class="col-md-9 offset-md-2" style="margin-top:50px">
		<h2 align="center">Items ordered per day</h2>
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
		
		
    <div class="col-md-6" style="margin-top:100px">
			<h2 align="center">Shipped Vs Not Shipped</h2>
      <canvas id="myChart1"></canvas>
    </div>
    <?php echo '<script'; ?>
>

      $(function () {

      var data = [
          {
            value: <?php echo $_smarty_tpl->tpl_vars['shipped']->value[0]['Not_shipped'];?>
,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "Items shipped"
          },
          {
            value: <?php echo $_smarty_tpl->tpl_vars['notShipped']->value[0]['Num_shipped'];?>
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

    
    <?php $_smarty_tpl->_assignInScope('answer', $_smarty_tpl->tpl_vars['report']->value->top10Customers());
?>
    <?php $_smarty_tpl->_assignInScope('topList', $_smarty_tpl->tpl_vars['report']->value->fetchDB($_smarty_tpl->tpl_vars['answer']->value));
?>
    <div class="col-md-6" style="margin-top:100px">
      <h2 align="center">Top Ten Customers</h2>
      <table class="table table-striped">
        <thead>
          <tr>
            <td>Customer Name</td>
            <td>Number Of Orders</td>
          </tr>
        </thead>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['topList']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
          <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['cname'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['NumberOfOrders'];?>
</td>
          </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

      </table>
    </div>
  </body>
</html>
<?php }
}
