<?php
/* Smarty version 3.1.30, created on 2017-04-13 13:55:24
  from "C:\xampp\htdocs\E-commerce_final\views\editOrder.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ef672c59a254_81029902',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    'a49798a837ef49b717346f36c2292b86a1963ddb' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\editOrder.tpl',
      1 => 1492084502,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58ef672c59a254_81029902 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit order</title>
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
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">

                    		<?php if (isset($_REQUEST['searchName'])) {?>
                          <?php if (($_REQUEST['searchName']) != '') {?>
                            <?php $_smarty_tpl->_assignInScope('txt', $_REQUEST['searchName']);
?>
                            <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['order']->value->getOrderData($_smarty_tpl->tpl_vars['txt']->value));
?>
                            <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['order']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
                          <?php }?>
                        <?php }?>

                        <?php if (isset($_POST['ono'])) {?>
                          <?php $_smarty_tpl->_assignInScope('ono', $_POST['ono']);
?>
                          <?php $_smarty_tpl->_assignInScope('cno', $_POST['cno']);
?>
                          <?php $_smarty_tpl->_assignInScope('checked_out', $_POST['checked_out']);
?>
                          <?php $_smarty_tpl->_assignInScope('received', $_POST['received']);
?>
                          <?php $_smarty_tpl->_assignInScope('shipped', $_POST['shipped']);
?>

                          <?php if (($_smarty_tpl->tpl_vars['cno']->value) == '' || ($_smarty_tpl->tpl_vars['checked_out']->value) == '') {?>
                            <?php echo "Please enter all information";?>

                            <?php } else { ?>
                              <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['order']->value->editOrder($_smarty_tpl->tpl_vars['ono']->value,$_smarty_tpl->tpl_vars['cno']->value,$_smarty_tpl->tpl_vars['checked_out']->value,$_smarty_tpl->tpl_vars['received']->value,$_smarty_tpl->tpl_vars['shipped']->value));
?>
                              <?php echo "<script>window.location = 'employeeDisplay.php?eAction=14'</script>";?>

                          <?php }?>
                        <?php }?>

                        <form action="employeeDisplay.php?eAction=15" method="POST">
                          <input type="text" name="ono" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['ono'];?>
" hidden>
                          <div> Customer ID <input type="number" name="cno" value='<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['cno'];?>
'><br></div>
                          <div> Checked Out <select name="checked_out">
                    			<option value="-1">Select Checked Out Status</option>
                    			<?php if ($_smarty_tpl->tpl_vars['data']->value[0]['checked_out'] == 'Yes') {?>
                    				<option value="Yes" selected> Yes </option>
                    				<option value="No"> No </option>
                    				<?php } else { ?>
                    				<option value="Yes"> Yes </option>
                    				<option value="No" selected> No </option>
                    			<?php }?>

                           </select>
                           <br></div>
                          <div> Received <input type="date" name="received" value='<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['received'];?>
'><br></div>
                          <div> Shipped <input type="date" name="shipped" value='<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['shipped'];?>
'><br></div><br>
                          <div class="row col-md-5"></div>
                          <div class="row col-md-4">
                            <input type="submit" class="form-control amber darken-3 white-text" value="Edit">
                          </div>
                          <div class="row col-md-3"></div>

                        </form>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
    </main>

  </body>
</html>
<?php }
}
