<?php
/* Smarty version 3.1.30, created on 2017-04-11 16:15:24
  from "C:\xampp\htdocs\E-commerce_final\views\customerOrder.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ece4fc96b928_10729840',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a35823e72abf5c22f6f015d48353ba4d78ab96ca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\customerOrder.tpl',
      1 => 1491559443,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ece4fc96b928_10729840 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Customer Orders</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <header>

        <!--Navbar-->
        <nav class="navbar navbar-toggleable-md navbar-dark">
          <div class="container">
              <a class="navbar-brand" href="index.php">
                <strong>Core Store</strong>
              </a>
              <div id="navbarNav1">
                <form action="index.php?cAction=1" method="POST" class="form-inline waves-effect waves-light">
                              <input class="form-control" id="search" type="text" placeholder="Search" name="searchName">
                          </form>
              </div>
              <div>
                  <ul class="nav navbar-nav nav-flex-icons ml-auto">
                      <li class="nav-item">
                          <a class="nav-link" href="index.php?cAction=6"><i class="fa fa-shopping-cart"></i> <span class="hidden-sm-down">Cart</span></a>
                      </li>
                         <?php if (isset($_SESSION['acctype'])) {?>
												 		<?php if (($_SESSION['acctype'] != 1)) {?>
															<li class="nav-item">
															<a class="nav-link" href="index.php?cAction=3"><i class="fa fa-sign-in"></i> <span class="hidden-sm-down">Register</span></a>
														</li>
														<?php }?>
												  <?php } else { ?>
														<li class="nav-item">
															<a class="nav-link" href="index.php?cAction=3"><i class="fa fa-sign-in"></i> <span class="hidden-sm-down">Register</span></a>
														</li>
												 <?php }?>

                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													 <i class="fa fa-user"></i>
														 <?php if (isset($_SESSION['acctype'])) {?>
																 <?php if (($_SESSION['acctype'] == 1)) {?>
																	 <?php $_smarty_tpl->_assignInScope('session', $_smarty_tpl->tpl_vars['userInfo']->value->getSession());
?>
																	 <?php echo $_smarty_tpl->tpl_vars['session']->value['fullname'];?>

																	 <?php } else { ?>
																	 		<?php echo "Guest";?>

																 <?php }?>
																<?php } else { ?>
																	<?php echo "Guest";?>

														 <?php }?>
														 </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                <?php if (!isset($_SESSION['userId'])) {?>
                                    <?php echo '<a class="dropdown-item" href="index.php?cAction=4">Login</a>';?>

                                <?php }?>

                                <?php if (isset($_SESSION['userId'])) {?>
																	<?php if (($_SESSION['acctype'] == 1)) {?>
																			<?php echo '<a class="dropdown-item" href="index.php?cAction=5">Orders</a>';?>

																			<?php echo '<a class="dropdown-item" href="index.php?cAction=7">Logout</a>';?>

																		<?php } else { ?>
																			<?php echo '<a class="dropdown-item" href="index.php?cAction=4">Login</a>';?>

																	<?php }?>
                                <?php }?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
          </nav>
      <!--/.Navbar-->
    </header>
    <main>

        <!--Main layout-->
        <div class="container">

            <h1 class="display-3">Customer Orders</h1>

          <?php if (isset($_SESSION['userId'])) {?>
            <?php $_smarty_tpl->_assignInScope('customerId', $_SESSION['userId']);
?>
          <?php } else { ?>
            <?php $_smarty_tpl->_assignInScope('customerId', 10);
?>
            <?php echo "Session not started";?>

          <?php }?>

          <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['order']->value->getCustomerOrders($_smarty_tpl->tpl_vars['customerId']->value));
?>
          <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['order']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>

                    <?php if (($_smarty_tpl->tpl_vars['data']->value != null)) {?>
                    <table class="table">
							<thead>
								<tr>
									<th>Order #</th>
									<th>Customer Number</th>
									<th>Recieved </th>
									<th>Shipped date</th>
									<th>Created At</th>
									<th>Total Amount</th>
								</tr>
							</thead>
                            <tbody>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
											<tr data-toggle="collapse" data-target="#<?php echo $_smarty_tpl->tpl_vars['value']->value['ono'];?>
" class="accordion-toggle table-active">
												<?php if ($_smarty_tpl->tpl_vars['value']->value['ono']) {?>
													<td><?php echo $_smarty_tpl->tpl_vars['value']->value['ono'];?>
</td>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['value']->value['cno']) {?>
													<td><?php echo $_smarty_tpl->tpl_vars['value']->value['cno'];?>
</td>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['value']->value['received']) {?>
													<td><?php echo $_smarty_tpl->tpl_vars['value']->value['received'];?>
</td>
													<?php } else { ?>
													<td><?php echo "Null";?>
</td>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['value']->value['shipped']) {?>
													<td><?php echo $_smarty_tpl->tpl_vars['value']->value['shipped'];?>
</td>
													<?php } else { ?>
													<td><?php echo "Null";?>
</td>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['value']->value['created_at']) {?>
													<td><?php echo $_smarty_tpl->tpl_vars['value']->value['created_at'];?>
</td>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['value']->value['amt']) {?>
													<td><?php echo $_smarty_tpl->tpl_vars['value']->value['amt'];?>
</td>
												<?php }?>
											</tr>
                                            <div class="hiddenRow">
                                                <?php $_smarty_tpl->_assignInScope('checked_out', "Yes");
?>
                                                <?php $_smarty_tpl->_assignInScope('result2', $_smarty_tpl->tpl_vars['order']->value->getODV2($_smarty_tpl->tpl_vars['value']->value['ono'],$_smarty_tpl->tpl_vars['customerId']->value,$_smarty_tpl->tpl_vars['checked_out']->value));
?>
                                                <?php $_smarty_tpl->_assignInScope('data2', $_smarty_tpl->tpl_vars['order']->value->fetchDB($_smarty_tpl->tpl_vars['result2']->value));
?>


                                                <tr>
                                                    <!-- odetails.ono, odetails.ino, odetails.qty, items.iname, items.price -->

                                                    <!-- <td colspan="7">
                                                        <div class="accordian-body collapse" id="<?php echo $_smarty_tpl->tpl_vars['value']->value['ono'];?>
">
                                                            <strong>Item #     |  Item Name     |     Item Price     |     Quantity </strong>
                                                            <br>
                                                            <?php echo $_smarty_tpl->tpl_vars['value2']->value['ino'];?>
 <?php echo $_smarty_tpl->tpl_vars['value2']->value['iname'];?>
 <?php echo $_smarty_tpl->tpl_vars['value2']->value['price'];?>
 <?php echo $_smarty_tpl->tpl_vars['value2']->value['qty'];?>

                                                         </div>
                                                    </td> -->
                                                    <td colspan="7">
                                                        <div class="accordian-body collapse" id="<?php echo $_smarty_tpl->tpl_vars['value']->value['ono'];?>
">
                                                            <div class="row col-md-9">
                                                                <table class="table">
                                                                    <thead class="thead-default">
                                                                        <th>Item #</th>
                                                                        <th>Item Name</th>
                                                                        <th>Item Price</th>
                                                                        <th>Quantity</th>
																																				<th>Amount</th>
                                                                    </thead>
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data2']->value, 'value2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value2']->value) {
?>
                                                                        <tr>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['value2']->value['ino'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['value2']->value['iname'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['value2']->value['price'];?>
</td>
                                                                            <td><?php echo $_smarty_tpl->tpl_vars['value2']->value['qty'];?>
</td>
																																						<td><?php echo $_smarty_tpl->tpl_vars['value2']->value['amt'];?>
</td>
                                                                        </tr>
                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                                                </table>
                                                            </div>
                                                            <div class="row col-md-3"></div>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </div>


										<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                </tbody>
						</table>
						<?php } else { ?>
							<?php echo "No Orders";?>

					<?php }?>

        </div>
        <!--/.Main layout-->

    </main>

    <!--Footer-->
    <footer class="page-footer center-on-small-only">

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2015 Copyright: <a href="http://index.php?cAction=9"> CoreStore.com </a>

            </div>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->


    <!-- SCRIPTS -->

    <!-- JQuery -->
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-2.2.3.min.js"><?php echo '</script'; ?>
>

    <!-- Bootstrap tooltips -->
    <?php echo '<script'; ?>
 type="text/javascript" src="js/tether.min.js"><?php echo '</script'; ?>
>

    <!-- Bootstrap core JavaScript -->
    <?php echo '<script'; ?>
 type="text/javascript" src="js/bootstrap.min.js"><?php echo '</script'; ?>
>

    <!-- MDB core JavaScript -->
    <?php echo '<script'; ?>
 type="text/javascript" src="js/mdb.min.js"><?php echo '</script'; ?>
>


</body>

</html>
<?php }
}
