<?php
/* Smarty version 3.1.30, created on 2017-03-19 00:52:03
  from "/Applications/AMPPS/www/github/E-commerce_final/views/customerSignUp.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58cdd6337dd441_01337479',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e0e7a48d284126abb4a9bfde39655ccabd24df5' => 
    array (
      0 => '/Applications/AMPPS/www/github/E-commerce_final/views/customerSignUp.tpl',
      1 => 1489884710,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cdd6337dd441_01337479 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Customer Registration</title>

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
                      <li class="nav-item">
                          <a class="nav-link" href="index.php?cAction=3"><i class="fa fa-sign-in"></i> <span class="hidden-sm-down">Register</span></a>
                      </li>
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
                              <a class="dropdown-item" href="index.php?cAction=5">Orders</a>
                              <?php if (isset($_SESSION['userId'])) {?>
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
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <img id="core-logo-login" src="img/logo-800.png" alt="Core Logo">
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <center><h4><p><strong>Welcome to Core Store</strong></p></h4></center>
                        <div class="card">
                            <div class="card-block">
                                <p>Login</p>
                                <form action="index.php?cAction=3" method="post">
                                    <div class="md-form">
                                        <i class="fa fa-user prefix"></i>
                                        <input type="text" name="name" id="form1" class="form-control">
                                        <label for="form1">Name</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-street-view prefix"></i>
                                        <input type="text" name="street" id="form1" class="form-control">
                                        <label for="form1">Street</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-location-arrow prefix"></i>

                                        <select id="my-registration-select">
                                            <option value="-1" disabled selected>Select Zip</option>
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
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-mobile prefix"></i>
                                        <input type="text" name="phone" id="form1" class="form-control">
                                        <label for="form1">Phone Number</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-user-secret prefix"></i>
                                        <input type="text" name="username" id="form2" class="form-control">
                                        <label for="form2">Username</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-lock prefix"></i>
                                        <input type="password" name="password" id="form2" class="form-control">
                                        <label for="form2">Password</label>
                                    </div>
                                    <input type="text" name="submitted" hidden>
                                    <button class="btn amber darken-2">Register</button>
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

                            		<?php if (($_smarty_tpl->tpl_vars['zip']->value) == "-1") {?>
                            			<?php echo "Please select a zip";?>

                            		<?php } elseif (($_smarty_tpl->tpl_vars['name']->value) == '' || ($_smarty_tpl->tpl_vars['street']->value) == '' || ($_smarty_tpl->tpl_vars['phone']->value) == '' || ($_smarty_tpl->tpl_vars['username']->value) == '' || ($_smarty_tpl->tpl_vars['password']->value) == '') {?>
                                      <?php echo "Please enter all information";?>

                                    <?php } else { ?>
                                        <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['customer']->value->addCustomer($_smarty_tpl->tpl_vars['name']->value,$_smarty_tpl->tpl_vars['street']->value,$_smarty_tpl->tpl_vars['zip']->value,$_smarty_tpl->tpl_vars['phone']->value,$_smarty_tpl->tpl_vars['username']->value,$_smarty_tpl->tpl_vars['password']->value));
?>
                                        <?php echo "Success";?>

                                        <?php echo "<script>window.location = 'index.php?cAction=5'</script>";?>

                                    <?php }?>
                                <?php }?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>

                </div>




        </div>
        <!--/.Main layout-->

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
