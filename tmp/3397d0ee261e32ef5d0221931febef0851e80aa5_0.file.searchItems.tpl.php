<?php
/* Smarty version 3.1.30, created on 2017-03-27 21:30:49
  from "/Applications/AMPPS/www/github/E-commerce_final/views/searchItems.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d98489815be6_07512136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3397d0ee261e32ef5d0221931febef0851e80aa5' => 
    array (
      0 => '/Applications/AMPPS/www/github/E-commerce_final/views/searchItems.tpl',
      1 => 1490650246,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58d98489815be6_07512136 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<!--CHANGELOG
    Changed column names to reflect changes made in database - 12/3/2017
	Formatted code - 12/3/2017
-->
<!--
  @author David Okyere
  @desc - This page displays items based on user search input.
-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Search Items</title>

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

 <div>
  <form action="index.php?cAction=1" method="POST">
   <input class="search-bar" id="search" type="text" name="searchName">
  </div>
  <div>
   <button type="submit" class="button">Search</button>
  </div>
 </form>

<?php if (isset($_REQUEST['searchName'])) {?>
  <?php if (($_REQUEST['searchName']) != '') {?>
    <?php $_smarty_tpl->_assignInScope('txt', $_REQUEST['searchName']);
?>
    <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['item']->value->searchItems($_smarty_tpl->tpl_vars['txt']->value));
?>
    <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['item']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
  <?php } elseif (($_REQUEST['searchName']) == '') {?>
    <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['item']->value->getItems());
?>
    <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['item']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
  <?php }
} else { ?>
  <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['item']->value->getItems());
?>
  <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['item']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
}?>

<h2>Results for <ins><?php echo $_REQUEST['searchName'];?>
</ins></h2>

 <div>
  <table>
    <thead>
      <tr>
       <td>Product ID</td>
       <td>Product Name</td>
       <td>Quantity on Hand</td>
       <td>Price</td>
       <td>Reorder Level</td>
      </tr>
  </thead>

 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
  <tr>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['ino']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['ino'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['iname']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['iname'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['qoh']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['qoh'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['price']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['price'];?>
</td>
   <?php }?>
   <?php if ($_smarty_tpl->tpl_vars['value']->value['olevel']) {?>
      <td><?php echo $_smarty_tpl->tpl_vars['value']->value['olevel'];?>
</td>
   <?php }?>
   </tr>
   <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

  </table>
 </div>
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
