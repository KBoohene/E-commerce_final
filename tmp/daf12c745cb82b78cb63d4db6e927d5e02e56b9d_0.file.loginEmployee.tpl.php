<?php
/* Smarty version 3.1.30, created on 2017-03-27 21:32:22
  from "C:\xampp\htdocs\E-commerce_final\views\loginEmployee.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d968c6585630_33590508',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    'daf12c745cb82b78cb63d4db6e927d5e02e56b9d' =>
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\loginEmployee.tpl',
      1 => 1490029639,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_58d968c6585630_33590508 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Employee Login</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

</head>
  <?php if (isset($_POST['submitted'])) {?>
    <?php $_smarty_tpl->_assignInScope('username', $_POST['username']);
?>
    <?php $_smarty_tpl->_assignInScope('password', $_POST['password']);
?>

    <?php if (($_smarty_tpl->tpl_vars['username']->value) == '' || ($_smarty_tpl->tpl_vars['password']->value) == '') {?>
    <?php echo "Please enter all information";?>

    <?php } else { ?>
    <?php $_smarty_tpl->_assignInScope('loginResult', $_smarty_tpl->tpl_vars['employee']->value->loginEmployee($_smarty_tpl->tpl_vars['username']->value,$_smarty_tpl->tpl_vars['password']->value));
?>

        <?php $_smarty_tpl->_assignInScope('loginData', $_smarty_tpl->tpl_vars['employee']->value->fetchDB($_smarty_tpl->tpl_vars['loginResult']->value));
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['loginData']->value, 'login');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['login']->value) {
?>
            <?php if (($_smarty_tpl->tpl_vars['login']->value['Password']) == $_smarty_tpl->tpl_vars['password']->value) {?>
              <?php echo $_smarty_tpl->tpl_vars['userInfo']->value->setSession($_smarty_tpl->tpl_vars['login']->value['eno'],$_smarty_tpl->tpl_vars['login']->value['Username'],$_smarty_tpl->tpl_vars['login']->value['ename'],$_smarty_tpl->tpl_vars['login']->value['account_type']);?>

              <?php echo $_smarty_tpl->tpl_vars['userInfo']->value->addToLog($_smarty_tpl->tpl_vars['login']->value['eno'],$_smarty_tpl->tpl_vars['login']->value['account_type']);?>

              <?php echo "<script>window.location = 'employeeDisplay.php?eAction=2'</script>";?>

            <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


    <?php }?>
  <?php }?>
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

                <form class="form-inline waves-effect waves-light">
                  <input class="form-control" type="text" placeholder="Search">
                </form>

                <ul class="nav navbar-nav nav-flex-icons ml-auto">
                   <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Guest</a>
                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                           <a class="dropdown-item" href="#">Login</a>
                       </div>
                   </li>

               </ul>


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
                                <form action="employeeDisplay.php?eAction=1" method="post">
                                    <div class="md-form">
                                        <i class="fa fa-user prefix"></i>
                                        <input type="text" name="username" id="form1" class="form-control">
                                        <label for="form1">Username</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-lock prefix"></i>
                                        <input type="password" name="password" id="form2" class="form-control">
                                        <label for="form2">Password</label>
                                    </div>
                                    <input type="text" name="submitted" hidden>
                                    <button class="btn btn-default amber darken-2">Login</button>
                                </form>
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
