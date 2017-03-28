<?php
/* Smarty version 3.1.30, created on 2017-03-27 23:35:51
  from "/Applications/AMPPS/www/github/E-commerce_final/views/searchItems.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d9a1d75baf83_63701916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3397d0ee261e32ef5d0221931febef0851e80aa5' => 
    array (
      0 => '/Applications/AMPPS/www/github/E-commerce_final/views/searchItems.tpl',
      1 => 1490657747,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58d9a1d75baf83_63701916 (Smarty_Internal_Template $_smarty_tpl) {
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

    <main>

        <!--Main layout-->
        <div class="container">

            <div class="row">

              <div class="row">
               <form action="index.php?cAction=1" method="POST">
                 <?php $_smarty_tpl->_assignInScope('search', "Search");
?>
                 <div class="col-md-11">
                   <input class="form-control" id="search" type="text" name="searchName" placeholder="Search" value=
                    <?php if (isset($_REQUEST['searchName'])) {?>
                      <?php $_smarty_tpl->_assignInScope('trimmed', trim($_REQUEST['searchName']));
?>
                      <?php if (($_smarty_tpl->tpl_vars['trimmed']->value) == '') {?>
                        <?php $_smarty_tpl->_assignInScope('search', (("'").($_smarty_tpl->tpl_vars['search']->value)).("'"));
?>
                      <?php } else { ?>
                        <?php $_smarty_tpl->_assignInScope('value', (("'").($_REQUEST['searchName'])).("'"));
?>
                        <?php echo $_smarty_tpl->tpl_vars['value']->value;?>

                      <?php }?>
                    <?php } else { ?>
                      <?php echo preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['search']->value);?>

                    <?php }?>
                   >
                 </div>
                 <div class="col-md-1">
                   <input type="submit" value="Search" class="form-control">
                 </div>
               </div>

              </form>

             <?php if (isset($_REQUEST['searchName'])) {?>
               <?php $_smarty_tpl->_assignInScope('trimmed', trim($_REQUEST['searchName']));
?>
               <?php if (($_smarty_tpl->tpl_vars['trimmed']->value) != '') {?>
                 <?php $_smarty_tpl->_assignInScope('txt', $_REQUEST['searchName']);
?>
                 <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['item']->value->searchItems($_smarty_tpl->tpl_vars['txt']->value));
?>
                 <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['item']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
               <?php } elseif (($_smarty_tpl->tpl_vars['trimmed']->value) == '') {?>
                 <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['item']->value->getItems());
?>
                 <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['item']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
                 <?php echo "<h2>Showing all items</h2>";?>

               <?php }?>
             <?php } else { ?>
               <?php $_smarty_tpl->_assignInScope('result', $_smarty_tpl->tpl_vars['item']->value->getItems());
?>
               <?php $_smarty_tpl->_assignInScope('data', $_smarty_tpl->tpl_vars['item']->value->fetchDB($_smarty_tpl->tpl_vars['result']->value));
?>
             <?php }?>

              <?php $_smarty_tpl->_assignInScope('user', $_smarty_tpl->tpl_vars['userInfo']->value->getSession());
?>


<?php if (count($_smarty_tpl->tpl_vars['data']->value) == 0) {?>
  <?php echo "<h2>No Result</h2>";?>

<?php }?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'item');
$_smarty_tpl->tpl_vars['item']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->iteration++;
$__foreach_item_0_saved = $_smarty_tpl->tpl_vars['item'];
?>


                            <?php if ($_smarty_tpl->tpl_vars['item']->iteration%4 == 0) {?>
                            <!--Second row-->
                            <div class="row">
                        <?php }?>
                        <!--Columnn-->
                        <div class="col-lg-3">
                            <!--Card-->
                            <div class="card">
                                <!--Card image-->
                                <div class="view overlay hm-white-slight">
                                    <img src="http://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20(32).jpg" class="img-fluid" alt="">
                                    <a href="#">
                                        <div class="mask"></div>
                                    </a>
                                </div>
                                <!--/.Card image-->

                                <!--Card content-->
                                <div class="card-block">
                                    <!--Title-->
                                    <h4 class="card-title" id="my-home-cards"><?php echo $_smarty_tpl->tpl_vars['item']->value['iname'];?>
</h4>
                                    <!--Text-->
                                    <strong><p class="card-text">$ <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</p></strong>

                                    <!-- <a href="#" class="btn amber btn-core-primary"><i class="fa fa-money" aria-hidden="true"></i></a> -->
                                    <!-- <a href="#" class="btn red darken-2 btn-core-primary"><i class="fa fa-expand" aria-hidden="true"></i></a> -->
                                <br>
                                    <a onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['user']->value['userId'];?>
,<?php echo $_smarty_tpl->tpl_vars['item']->value['ino'];?>
,1)"><i class="fa fa-cart-plus core-primary" aria-hidden="true"></i></a>
                                    <a href="index.php?cAction=2&pno=<?php echo $_smarty_tpl->tpl_vars['item']->value['ino'];?>
"><i class="fa fa-expand core-secondary" aria-hidden="true"></i></a>
                                </div>
                                <!--/.Card content-->
                            </div>
                            <!--/.Card-->
                        </div>
                        <!--/.Columnn-->
                        <?php if ($_smarty_tpl->tpl_vars['item']->iteration%4 == 0) {?>
                            </div>
                            <!--/.Second row-->
                        <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>



                            <?php echo '<script'; ?>
 type="text/javascript">
                                function addToCartComplete(xhr, status){
                                    alert("Item Added to Cart");
                                    console.log(xhr);

                                    var obj=$.parseJSON(xhr.responseText);
                            if(obj.result==0){
                              console.log(obj.message);
                            }else{

                              console.log("added to cart");

                            }


                                }

                                function addToCart(customerId, itemId, qty){
                                    //alert("Adding item "+itemId+" to cart by user " + customerId);
                                    var theUrl="ajax.php?cmd=1&cId="+customerId+"&iId="+itemId+"&qty="+qty;
                                    //alert(theUrl);
                            $.ajax(theUrl,
                                {async:true,
                                 complete:addToCartComplete}
                              );
                                }

                                function saveNameComplete(xhr,status){
                            divStatus.innerHTML=xhr.responseText;
                          }

                          function saveName(id){
                            currentObject.innerHTML=$("#txtName").val();
                            var username=currentObject.innerHTML;
                            var theUrl="usersajax.php?cmd=5&uc="+id+"&name="+username;
                            $.ajax(theUrl,
                                {async:true,
                                 complete:saveNameComplete}
                              );
                          }
                            <?php echo '</script'; ?>
>



            </div>

<br>

        </div>
        <!--/.Main layout-->

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
