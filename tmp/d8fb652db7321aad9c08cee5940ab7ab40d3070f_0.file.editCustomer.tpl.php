<?php
/* Smarty version 3.1.30, created on 2017-03-19 18:22:25
  from "C:\xampp\htdocs\E-commerce_final\views\editCustomer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cebe5190a970_90997577',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    'd8fb652db7321aad9c08cee5940ab7ab40d3070f' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\editCustomer.tpl',
      1 => 1489944037,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58cebe5190a970_90997577 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit customer</title>
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
                  <a class="nav-link" href="employeeDisplay.php?eAction=#">Orders</a>
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
                    <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Account</a>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="#">Login</a>
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Logout</a>
                     </div>
                 </li>
              </ul>
            </div>
        </nav>
	    <!--/.Navbar-->
    </header>

    <?php if (isset($_REQUEST['searchName'])) {?>
      <?php if (($_REQUEST['searchName']) != '') {?>
        <?php $_smarty_tpl->_assignInScope('txt', $_REQUEST['searchName']);
?>
        <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['customer']->value->getCustomerData($_smarty_tpl->tpl_vars['txt']->value));
?>
        <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['customer']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
      <?php }?>
    <?php }?>

    <?php if (isset($_POST['cno'])) {?>
      <?php $_smarty_tpl->_assignInScope('cid', $_POST['cno']);
?>
      <?php $_smarty_tpl->_assignInScope('cname', $_POST['cname']);
?>
      <?php $_smarty_tpl->_assignInScope('street', $_POST['street']);
?>
      <?php $_smarty_tpl->_assignInScope('zip', $_POST['zip']);
?>
      <?php $_smarty_tpl->_assignInScope('phone', $_POST['phone']);
?>
      <?php $_smarty_tpl->_assignInScope('Username', $_POST['Username']);
?>
      <?php $_smarty_tpl->_assignInScope('Password', $_POST['Password']);
?>
      <?php $_smarty_tpl->_assignInScope('status', $_POST['status']);
?>
      <?php if (($_smarty_tpl->tpl_vars['zip']->value) == "-1") {?>
        <?php echo "Please select a zip";?>

        <?php } elseif (($_smarty_tpl->tpl_vars['cname']->value) == '' || ($_smarty_tpl->tpl_vars['Password']->value) == '' || ($_smarty_tpl->tpl_vars['status']->value) == '' || ($_smarty_tpl->tpl_vars['Username']->value) == '') {?>
          <?php echo "Please enter all information";?>

        <?php } else { ?>
          <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['customer']->value->editCustomer($_smarty_tpl->tpl_vars['cid']->value,$_smarty_tpl->tpl_vars['cname']->value,$_smarty_tpl->tpl_vars['street']->value,$_smarty_tpl->tpl_vars['zip']->value,$_smarty_tpl->tpl_vars['phone']->value,$_smarty_tpl->tpl_vars['Username']->value,$_smarty_tpl->tpl_vars['Password']->value,$_smarty_tpl->tpl_vars['status']->value));
?>
          <?php echo "<script>window.location = 'employeeDisplay.php?eAction=6'</script>";?>

      <?php }?>
    <?php }?>

	<form action="employeeDisplay.php?eAction=8" method="POST">
      <input type="text" name="cno" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['cno'];?>
 hidden>
      <div> Customer Name <input type="text" name="cname" value='<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['cname'];?>
'><br></div>
      <div> Street <input type="text" name="street" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['street'];?>
><br></div>
      <div> Zip <select name="zip">
	  <option value="-1">Select Zip</option>
	    <?php $_smarty_tpl->_assignInScope('zipResult', $_smarty_tpl->tpl_vars['customer']->value->getZips());
?>
	    <?php $_smarty_tpl->_assignInScope('zipData', $_smarty_tpl->tpl_vars['customer']->value->fetchDB($_smarty_tpl->tpl_vars['zipResult']->value));
?>
	    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zipData']->value, 'zip');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['zip']->value) {
?>
          <?php if ($_smarty_tpl->tpl_vars['data']->value[0]['zip'] == $_smarty_tpl->tpl_vars['zip']->value['zip']) {?>
	        <option value="<?php echo $_smarty_tpl->tpl_vars['zip']->value['zip'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['zip']->value['city'];?>
</option>
          <?php } else { ?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['zip']->value['zip'];?>
"><?php echo $_smarty_tpl->tpl_vars['zip']->value['city'];?>
</option>
          <?php }?>
	    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	  </select>
      <br></div>
      <div> Phone <input type="text" name="phone" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['phone'];?>
><br></div>
      <div> Username <input type="text" name="Username" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['Username'];?>
><br></div>
      <div> Password <input type="text" name="Password" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['Password'];?>
><br></div>
      <div> Status <input type="text" name="status" value=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['status'];?>
><br></div>
      <input type="submit" value="Edit">
    </form>
  </body>
</html>
<?php }
}
