<?php
/* Smarty version 3.1.30, created on 2017-03-28 04:14:39
  from "/Applications/AMPPS/www/github/E-commerce_final/views/searchOrder.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d9e32f70fd11_90845902',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28c367ba6ebfb02067161ece74e2c32b3ef68502' => 
    array (
      0 => '/Applications/AMPPS/www/github/E-commerce_final/views/searchOrder.tpl',
      1 => 1490674476,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58d9e32f70fd11_90845902 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
  <head>
    <title>View Orders</title>
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
              <a class="navbar-brand" href="employeeDisplay.php?eAction=2">
                <strong>Employee Core Store</strong>
              </a>
              <ul class="nav navbar-nav mr-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Customer</a>
                  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu4">
                    <a class="dropdown-item" href="employeeDisplay.php?eAction=7">Add Customer</a>
                    <a class="dropdown-item" href="employeeDisplay.php?eAction=6">View Customers</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link active" href="employeeDisplay.php?eAction=14">Orders</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Items</a>
                  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="employeeDisplay.php?eAction=12">Add Item</a>
                    <a class="dropdown-item" href="employeeDisplay.php?eAction=13">View Items</a>
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
													<a class="dropdown-item" href="#">Logout</a>
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
    </header>
    <main>
      <div class="container">


		<div>
    <form action="employeeDisplay.php?eAction=14" method="POST">
      <div class="row col-md-10">
        <label>Date:</label>
          <input id="search" type="date" name="searchOrder">
      </div>
      <div class="row col-md-2">
        <button type="submit" class="form-control amber darken-3 white-text">Search</button>
      </div>


    </form>
		</div>

    <?php if (isset($_REQUEST['searchOrder'])) {?>
      <?php if (($_REQUEST['searchOrder']) != '') {?>
        <?php $_smarty_tpl->_assignInScope('txt', $_REQUEST['searchOrder']);
?>
        <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['order']->value->searchOrders($_smarty_tpl->tpl_vars['txt']->value));
?>
        <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['order']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
      <?php } elseif (($_REQUEST['searchName']) == '') {?>
        <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['order']->value->getOrders());
?>
        <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['order']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
      <?php }?>
    <?php } else { ?>
      <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['order']->value->getOrders());
?>
      <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['order']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
    <?php }?>

		<div>
			<table class="table table-striped">
				<thead>
					<tr>
						<td>Order ID</td>
						<td>Customer ID</td>
						<td>Checked Out</td>
						<td>Received</td>
						<td>Shipped</td>
						<td>Created At</td>
					</tr>
				</thead>

				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
					<tr>
						<?php if ($_smarty_tpl->tpl_vars['value']->value['ono']) {?>
							<td><?php echo $_smarty_tpl->tpl_vars['value']->value['ono'];?>
</td>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['value']->value['cno']) {?>
							<td><?php echo $_smarty_tpl->tpl_vars['value']->value['cno'];?>
</td>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['value']->value['checked_out']) {?>
							<td><?php echo $_smarty_tpl->tpl_vars['value']->value['checked_out'];?>
</td>
						<?php }?>

							<td><?php echo $_smarty_tpl->tpl_vars['value']->value['received'];?>
</td>

							<td><?php echo $_smarty_tpl->tpl_vars['value']->value['shipped'];?>
</td>

						<?php if ($_smarty_tpl->tpl_vars['value']->value['created_at']) {?>
							<td><?php echo $_smarty_tpl->tpl_vars['value']->value['created_at'];?>
</td>
						<?php }?>
						<td><a href="employeeDisplay.php?eAction=15&searchName=<?php echo $_smarty_tpl->tpl_vars['value']->value['ono'];?>
">Edit Order</a>
					</tr>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

			</table>
 		</div>
  </div>
</main>
	</body>
</html>
<?php }
}
