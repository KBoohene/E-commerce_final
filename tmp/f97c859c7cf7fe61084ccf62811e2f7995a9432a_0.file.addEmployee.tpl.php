<?php
/* Smarty version 3.1.30, created on 2017-03-27 21:42:59
  from "C:\xampp\htdocs\E-commerce_final\views\addEmployee.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d96b43c0cd67_08474201',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    'f97c859c7cf7fe61084ccf62811e2f7995a9432a' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\addEmployee.tpl',
      1 => 1490029633,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58d96b43c0cd67_08474201 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<!--CHANGELOG
    Changed column names to reflect changes made in database - 2/1/2017
	Added agreed upon user interface - 2/2/2017
	Formatted code - 2/2/2017
-->
<!--
  @author David Okyere
  @desc - This page adds items to the current list of items.
-->
  <head>
    <title>Add Employee</title>
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
                  <a class="nav-link" href="employeeDisplay.php?eAction=14">Orders</a>
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
    <?php if (isset($_POST['ename'])) {?>
      <?php $_smarty_tpl->_assignInScope('ename', $_POST['ename']);
?>
      <?php $_smarty_tpl->_assignInScope('zip', $_POST['zip']);
?>
      <?php $_smarty_tpl->_assignInScope('hdate', $_POST['hdate']);
?>
      <?php $_smarty_tpl->_assignInScope('pword', $_POST['pword']);
?>
      <?php $_smarty_tpl->_assignInScope('acctype', $_POST['acctype']);
?>
      <?php $_smarty_tpl->_assignInScope('usrname', $_POST['usrname']);
?>
      <?php if (($_smarty_tpl->tpl_vars['zip']->value) == "-1") {?>
        <?php echo "Please select a zip";?>

        <?php } elseif (($_smarty_tpl->tpl_vars['ename']->value) == '' || ($_smarty_tpl->tpl_vars['pword']->value) == '' || ($_smarty_tpl->tpl_vars['acctype']->value) == '' || ($_smarty_tpl->tpl_vars['usrname']->value) == '') {?>
          <?php echo "Please enter all information";?>

        <?php } else { ?>
          <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['employee']->value->addEmployee($_smarty_tpl->tpl_vars['ename']->value,$_smarty_tpl->tpl_vars['zip']->value,$_smarty_tpl->tpl_vars['hdate']->value,$_smarty_tpl->tpl_vars['pword']->value,$_smarty_tpl->tpl_vars['acctype']->value,$_smarty_tpl->tpl_vars['usrname']->value));
?>
          <?php echo "<script>window.location = 'employeeDisplay.php?eAction=3'</script>";?>

      <?php }?>
   <?php }?>

    <form action="employeeDisplay.php?eAction=5" method="POST">
      <div> Employee Name <input type="text" name="ename"/><br></div>
      <div> Zip
        <select name="zip">
          <option value="-1">Select Zip</option>
          <?php $_smarty_tpl->_assignInScope('zipResult', $_smarty_tpl->tpl_vars['employee']->value->getZips());
?>
          <?php $_smarty_tpl->_assignInScope('zipData', $_smarty_tpl->tpl_vars['employee']->value->fetchDB($_smarty_tpl->tpl_vars['zipResult']->value));
?>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zipData']->value, 'zip');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['zip']->value) {
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['zip']->value['zip'];?>
"><?php echo $_smarty_tpl->tpl_vars['zip']->value['city'];?>
</option>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </select>
        <br>
      </div>
      <div> Hire Date <input type="date" name="hdate"/><br></div>
      <div> Password <input type="text" name="pword"/><br></div>
      <div> Account Type <input type="number" name="acctype" min="2" max="3"/><br></div>
      <div> Username <input type="text" name="usrname"/><br></div>
      <input type="submit" value="Add">
    </form>
  </body>
</html>
<?php }
}
