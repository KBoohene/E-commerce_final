<?php
/* Smarty version 3.1.30, created on 2017-04-11 17:04:53
  from "C:\xampp\htdocs\E-commerce_final\views\addItem.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ecf095dc86a5_92588995',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    '19ba005c61d1b1d55825e15e2e4356b011f4b32b' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\addItem.tpl',
      1 => 1491922695,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58ecf095dc86a5_92588995 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Item</title>
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
            <?php if (isset($_POST['submit'])) {?>
              <?php $_smarty_tpl->_assignInScope('iname', $_POST['iname']);
?>
              <?php $_smarty_tpl->_assignInScope('qoh', $_POST['qoh']);
?>
              <?php $_smarty_tpl->_assignInScope('price', $_POST['price']);
?>
              <?php $_smarty_tpl->_assignInScope('olvl', $_POST['olevel']);
?>
              <?php $_smarty_tpl->_assignInScope('catno', $_POST['catno']);
?>

              <?php if (($_smarty_tpl->tpl_vars['catno']->value) == "-1") {?>
                <?php echo "Please select a zip";?>

                <?php } elseif (($_smarty_tpl->tpl_vars['olvl']->value) == '' || ($_smarty_tpl->tpl_vars['iname']->value) == '' || ($_smarty_tpl->tpl_vars['qoh']->value) == '' || ($_smarty_tpl->tpl_vars['price']->value) == '') {?>
                  <?php echo "Please enter all information";?>

                <?php } else { ?>
                  <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['item']->value->addItem($_smarty_tpl->tpl_vars['iname']->value,$_smarty_tpl->tpl_vars['qoh']->value,$_smarty_tpl->tpl_vars['price']->value,$_smarty_tpl->tpl_vars['olvl']->value,$_smarty_tpl->tpl_vars['catno']->value));
?>
                  <?php echo "<script>window.location = 'index.php?cAction=1'</script>";?>

              <?php }?>
            <?php }?>

            <form action="employeeDisplay.php?eAction=12" method="POST">
              <input type="file">
              <div>Item Name <input type="text" name="iname"><br></div>
                <?php $_smarty_tpl->_assignInScope('categoryId', $_smarty_tpl->tpl_vars['item']->value->getCategory());
?>
                <?php $_smarty_tpl->_assignInScope('categoryVar', $_smarty_tpl->tpl_vars['item']->value->fetchDB($_smarty_tpl->tpl_vars['categoryId']->value));
?>

              <div>Category
                <select name="catno">
                  <option value="-1">Select category</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoryVar']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                      <option value=<?php echo $_smarty_tpl->tpl_vars['category']->value['catno'];?>
><?php echo $_smarty_tpl->tpl_vars['category']->value['catname'];?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </select>
                <br>
              </div>
              <div> Quantity On Hand <input type="number" min="0" name="qoh" ><br></div>
              <div> Price <input type="text" name="price" ><br></div>
              <div> order level <input type="number" min="0" name="olevel"><br></div>
              <div class="row col-md-5"></div>
              <div class="row col-md-4">
                <input type="submit" class="form-control amber darken-3 white-text" name="submit" value="Add">
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
