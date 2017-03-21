<?php
/* Smarty version 3.1.30, created on 2017-03-21 16:45:22
  from "C:\xampp\htdocs\E-commerce_final\views\checkout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d14a929b6428_51071043',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    'b229a670da3957a3b4dc4fc3c2bf02c41183b260' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\checkout.tpl',
      1 => 1490111075,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58d14a929b6428_51071043 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Customer Login</title>

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
                  <form class="form-inline waves-effect waves-light">
                      <input class="form-control" type="text" placeholder="Search">
                  </form>
              </div>
              <div>
                   <ul class="nav navbar-nav nav-flex-icons ml-auto">
                      <li class="nav-item">
                          <a class="nav-link" href="index.php?cAction=6"><i class="fa fa-shopping-cart"></i> <span class="hidden-sm-down">Cart</span></a>
                      </li>

                      <?php if (isset($_SESSION['acctype'])) {?>
                       <?php } else { ?>
                         <li class="nav-item">
                           <a class="nav-link" href="index.php?cAction=3"><i class="fa fa-sign-in"></i> <span class="hidden-sm-down">Register</span></a>
                         </li>
                      <?php }?>

                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-user"></i>
                                <?php if (isset($_SESSION['userId'])) {?>
                                    <?php $_smarty_tpl->_assignInScope('session', $_smarty_tpl->tpl_vars['userInfo']->value->getSession());
?>
                                    <?php echo $_smarty_tpl->tpl_vars['session']->value['fullname'];?>

                                <?php } else { ?>
                                    <?php echo "Guest";?>

                                <?php }?>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                              <?php if (!isset($_SESSION['userId'])) {?>
                                  <?php echo '<a class="dropdown-item" href="index.php?cAction=4">Login</a>';?>

                              <?php }?>
                              <?php if (isset($_SESSION['userId'])) {?>
                                  <?php echo '<a class="dropdown-item" href="index.php?cAction=5">Orders</a>';?>

                                  <?php echo '<a class="dropdown-item" href="index.php?cAction=7">Logout</a>';?>

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
					<?php if (isset($_SESSION['userId'])) {?>
            <?php $_smarty_tpl->_assignInScope('customerId', $_SESSION['userId']);
?>
          <?php } else { ?>
            <?php echo "Session not started";?>

          <?php }?>

          <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['order']->value->getCheckout($_smarty_tpl->tpl_vars['customerId']->value));
?>
          <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['order']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>


				<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
								 <td>Product Name</td>
								 <td>Quantity</td>
								 <td>Price</td>
								 <td>Amount</td>
								</tr>
						</thead>

					 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
						<tr>
						 <?php if ($_smarty_tpl->tpl_vars['value']->value['iname']) {?>
								<td><?php echo $_smarty_tpl->tpl_vars['value']->value['iname'];?>
</td>
						 <?php }?>
						 <?php if ($_smarty_tpl->tpl_vars['value']->value['qty']) {?>
								<td>
										<span id="qty">
											<?php echo $_smarty_tpl->tpl_vars['value']->value['qty'];?>

										</span>
									<div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-sm btn-primary btn-rounded" onclick="decreaseQty()" >
                            <input type="radio" name="options" id="option1" />&mdash;
                        </label>
                        <label class="btn btn-sm btn-primary btn-rounded" id="plus" onclick="increaseQty()">
                            <input type="radio" name="options" id="option2" />+
                        </label>
                    </div>
								</td>
						 <?php }?>
						 <?php if ($_smarty_tpl->tpl_vars['value']->value['price']) {?>
								<td id="price"><?php echo $_smarty_tpl->tpl_vars['value']->value['price'];?>
</td>
						 <?php }?>
								<td>
								<?php $_smarty_tpl->_assignInScope('amt', $_smarty_tpl->tpl_vars['value']->value['price']*$_smarty_tpl->tpl_vars['value']->value['qty']);
?>
									<span id="amt">
										<?php echo $_smarty_tpl->tpl_vars['amt']->value;?>

									</span>
								</td>
						 </tr>
						 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</table>
					 </div>
        </div>
        <!--/.Main layout-->

					<?php echo '<script'; ?>
>
						var val, val2, val3, amount, quantity, price ;

						function increaseQty(){
							val = document.getElementById("qty");
							val2 = document.getElementById("price");
							val3 = document.getElementById("amt");

							amount =parseFloat(val3.innerHTML);
							quantity = parseFloat(val.innerHTML);

							price = parseFloat(val2.innerHTML);

							quantity++;
							amount = price*quantity;

							$("#qty").html(quantity);
							$("#amt").html(amount);
						}

						function decreaseQty(){
							val = document.getElementById("qty");
							val2 = document.getElementById("price");
							val3 = document.getElementById("amt");

							amount =parseFloat(val3.innerHTML);
							quantity = parseFloat(val.innerHTML);

							price = parseFloat(val2.innerHTML);

							quantity--;
							amount = price*quantity;

							$("#qty").html(quantity);
							$("#amt").html(amount);
						}
					<?php echo '</script'; ?>
>


    </main>

    <!--Footer-->
    <footer class="page-footer center-on-small-only">

        <!--Footer Links-->
        <div class="container-fluid">
            <div class="row">

                <!--First column-->
                <div class="col-md-3 offset-lg-1 hidden-lg-down">
                    <h5 class="title">ABOUT MATERIAL DESIGN</h5>
                    <p>Material Design (codenamed Quantum Paper) is a design language developed by Google. </p>

                    <p>Material Design for Bootstrap (MDB) is a powerful Material Design UI KIT for most popular HTML, CSS, and JS framework - Bootstrap.</p>
                </div>
                <!--/.First column-->

                <hr class="hidden-md-up">

                <!--Second column-->
                <div class="col-lg-2 col-md-4 offset-lg-1">
                    <h5 class="title">First column</h5>
                    <ul>
                        <li><a href="#!">Link 1</a></li>
                        <li><a href="#!">Link 2</a></li>
                        <li><a href="#!">Link 3</a></li>
                        <li><a href="#!">Link 4</a></li>
                    </ul>
                </div>
                <!--/.Second column-->

                <hr class="hidden-md-up">

                <!--Third column-->
                <div class="col-lg-2 col-md-4">
                    <h5 class="title">Second column</h5>
                    <ul>
                        <li><a href="#!">Link 1</a></li>
                        <li><a href="#!">Link 2</a></li>
                        <li><a href="#!">Link 3</a></li>
                        <li><a href="#!">Link 4</a></li>
                    </ul>
                </div>
                <!--/.Third column-->

                <hr class="hidden-md-up">

                <!--Fourth column-->
                <div class="col-lg-2 col-md-4">
                    <h5 class="title">Third column</h5>
                    <ul>
                        <li><a href="#!">Link 1</a></li>
                        <li><a href="#!">Link 2</a></li>
                        <li><a href="#!">Link 3</a></li>
                        <li><a href="#!">Link 4</a></li>
                    </ul>
                </div>
                <!--/.Fourth column-->

            </div>
        </div>
        <!--/.Footer Links-->

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
