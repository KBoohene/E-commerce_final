<?php
/* Smarty version 3.1.30, created on 2017-04-12 18:34:07
  from "C:\xampp\htdocs\E-commerce_final\views\addCustomer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ee56ff23ab55_46521278',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    'afda11cc7c4c520cf1de253ee5d9f56a46f131d2' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\addCustomer.tpl',
      1 => 1491923903,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58ee56ff23ab55_46521278 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Customer</title>
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
    <main>
      <div class="container">

      <div class="col-md-3"></div>
      <div class="col-md-6">
        <form action="employeeDisplay.php?eAction=7" method="post">
            <label>Name</label>
            <input type="text" name="name">
                <br>
            <label>Street</label>
            <input type="text" name="street">
                <br>
            <label>Zip</label>
            <select name="zip">
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
            <label>Phone Number</label>
            <input type="text" name="phone">
                <br>
            <label>Username</label>
            <input type="text" name="username">
                <br>
            <label>Password</label>
            <input type="password" name="password">
                <br>
                <br>
            <label>Status</label>
            <input type="text" name="status">
                <br>
            <input type="text" name="submitted" hidden>
            <div class="row col-md-5"></div>
            <div class="row col-md-4">
              <input type="submit" class="form-control amber darken-3 white-text" value="Submit">
            </div>
            <div class="row col-md-3"></div>
      	</form>

      	<?php if (isset($_POST['submitted'])) {?>
            <?php $_smarty_tpl->_assignInScope('name', $_POST['name']);
?>
            <?php $_smarty_tpl->_assignInScope('street', $_POST['street']);
?>
            <?php $_smarty_tpl->_assignInScope('zip', $_POST['zip']);
?>
            <?php $_smarty_tpl->_assignInScope('phone', $_POST['phone']);
?>
            <?php $_smarty_tpl->_assignInScope('username', $_POST['username']);
?>
            <?php $_smarty_tpl->_assignInScope('password', $_POST['password']);
?>
            <?php $_smarty_tpl->_assignInScope('status', $_POST['status']);
?>
            <?php if (($_smarty_tpl->tpl_vars['zip']->value) == "-1") {?>
              <?php echo "Please select a zip";?>

              <?php } elseif (($_smarty_tpl->tpl_vars['name']->value) == '' || ($_smarty_tpl->tpl_vars['street']->value) == '' || ($_smarty_tpl->tpl_vars['phone']->value) == '' || ($_smarty_tpl->tpl_vars['username']->value) == '' || ($_smarty_tpl->tpl_vars['password']->value) == '') {?>
                <?php echo "Please enter all information";?>

              <?php } else { ?>
                <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['customer']->value->addCustomer($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl->tpl_vars['street']->value,$_smarty_tpl->tpl_vars['zip']->value,$_smarty_tpl->tpl_vars['phone']->value,$_smarty_tpl->tpl_vars['username']->value,$_smarty_tpl->tpl_vars['password']->value,$_smarty_tpl->tpl_vars['status']->value));
?>
      		  <?php echo "Success";?>

                <?php echo "<script>window.location = 'employeeDisplay.php?eAction=6'</script>";?>

            <?php }?>
          <?php }?>
      </div>
      <div class="col-md-3"></div>

      </div>
    </main>

    <!--Footer-->
      <footer class="page-footer center-on-small-only">

          <!--Copyright-->
          <div class="footer-copyright">
              <div class="container-fluid">
                  © 2015 Copyright: <a href="http://www.MDBootstrap.com"> MDBootstrap.com </a>

              </div>
          </div>
          <!--/.Copyright-->

      </footer>
      <!--/.Footer-->
  </body>
</html>
<?php }
}
