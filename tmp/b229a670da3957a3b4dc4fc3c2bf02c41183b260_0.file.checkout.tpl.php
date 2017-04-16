<?php
/* Smarty version 3.1.30, created on 2017-04-13 15:36:30
  from "C:\xampp\htdocs\E-commerce_final\views\checkout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ef7ede11c167_75787266',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b229a670da3957a3b4dc4fc3c2bf02c41183b260' => 
    array (
      0 => 'C:\\xampp\\htdocs\\E-commerce_final\\views\\checkout.tpl',
      1 => 1492086816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ef7ede11c167_75787266 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Checkout</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

</head>

<body id="core-wrapper">

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

			<?php if (($_smarty_tpl->tpl_vars['data']->value != null)) {?>
            <h1><?php echo "Cart Content";?>
</h1>
			<?php $_smarty_tpl->_assignInScope('count', 0);
?>

				<div class="table-responsive">
						<table class="table" id="checkTable">
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
						<tr id="row<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
							<td hidden>
								<?php if ($_smarty_tpl->tpl_vars['value']->value['ino']) {?>
									<span id="ino<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
										<?php echo $_smarty_tpl->tpl_vars['value']->value['ino'];?>

									</span>
								<?php }?>
							</td>
							<td hidden>
								<?php if ($_smarty_tpl->tpl_vars['value']->value['ono']) {?>
									<span id="ono">
										<?php echo $_smarty_tpl->tpl_vars['value']->value['ono'];?>

									</span>
								<?php }?>
							</td>
						 <?php if ($_smarty_tpl->tpl_vars['value']->value['iname']) {?>
								<td><?php echo $_smarty_tpl->tpl_vars['value']->value['iname'];?>
</td>
						 <?php }?>
						 <?php if ($_smarty_tpl->tpl_vars['value']->value['qty']) {?>
								<td>
										<span id="qty<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
											<?php if ($_smarty_tpl->tpl_vars['value']->value['qty'] < 10) {?>
													<?php echo 0;
echo $_smarty_tpl->tpl_vars['value']->value['qty'];?>

												<?php } else { ?>
													<?php echo $_smarty_tpl->tpl_vars['value']->value['qty'];?>

											<?php }?>
										</span>
									<div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-sm btn-primary btn-rounded" onclick="decreaseQty(<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
)" >
                            <input type="radio" name="options" id="option1" />&mdash;
                        </label>
                        <label class="btn btn-sm btn-primary btn-rounded" id="plus" onclick="increaseQty(<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
)">
                            <input type="radio" name="options" id="option2" />+
                        </label>
                    </div>
								</td>
						 <?php }?>
						 <?php if ($_smarty_tpl->tpl_vars['value']->value['price']) {?>
								<td id="price<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['price'];?>
</td>
						 <?php }?>
								<td>
								<?php $_smarty_tpl->_assignInScope('amt', $_smarty_tpl->tpl_vars['value']->value['price']*$_smarty_tpl->tpl_vars['value']->value['qty']);
?>
									<span id="amt<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
										<?php echo $_smarty_tpl->tpl_vars['amt']->value;?>

									</span>
								</td>

								<td>
									<div class="btn-group" data-toggle="buttons">
									  <label class="btn btn-sm btn-primary btn-rounded" id="Del" onclick="removeItem(<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
)">
                      <input type="radio" name="options" id="Del"/>X
                    </label>
									</div>
								</td>

						 </tr>
						 <?php $_smarty_tpl->_assignInScope('count', $_smarty_tpl->tpl_vars['count']->value+1);
?>
						 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

						</table>
					 </div>
        </div>

				<div class="row">
					<div class="col-md-6">
					</div>
					<div class="col-md-6">
						<button type="button" class="btn btn-primary" onclick="saveChanges()" id="Save" style="visibility:hidden">Save</button>
						<button type="button" class="btn btn-primary" onclick="checkout(<?php echo $_SESSION['userId'];?>
)" id="Checkout">Checkout</button>
					</div>

					<div id="Total" style="visibility:hidden; margin-left:50px;">
						Total Amount:
						<span id="tAmt"></span>
					</div>

				</div>

					
					<?php echo '<script'; ?>
>
						var val, val2, val3, amount, quantity, price ;
						var counter; <?php echo $_smarty_tpl->tpl_vars['count']->value;?>



						function increaseQty(count){
							val = document.getElementById("qty"+count);
							val2 = document.getElementById("price"+count);
							val3 = document.getElementById("amt"+count);


							amount =parseFloat(val3.innerHTML);
							quantity = parseFloat(val.innerHTML);

							price = parseFloat(val2.innerHTML);

							quantity++;
							amount = price*quantity;

							if(quantity<10)
							{
							  $("#qty"+count).html("0"+quantity);
							}
							else{
								$("#qty"+count).html(quantity);
							}

							$("#amt"+count).html(amount);
                            document.getElementById("Save").style.visibility ="visible";
						}

						function decreaseQty(count){
							val = document.getElementById("qty"+count);
							val2 = document.getElementById("price"+count);
							val3 = document.getElementById("amt"+count);

							amount =parseFloat(val3.innerHTML);
							quantity = parseFloat(val.innerHTML);

							price = parseFloat(val2.innerHTML);

							quantity--;
							amount = price*quantity;

							if(quantity<10)
							{
							  $("#qty"+count).html("0"+quantity);
							}
							else{
								$("#qty"+count).html(quantity);
							}

							$("#amt"+count).html(amount);
                            document.getElementById("Save").style.visibility ="visible";
						}

						function saveComplete(xhr,status){
              console.log(xhr);

              var obj=$.parseJSON(xhr.responseText);
							if(obj.result==0){
								console.log(obj.message);
							}else{
								console.log("Cart not updated");
								}

								var value= sumAmounts();
								$("#tAmt").html(value);
							document.getElementById("Total").style.visibility ="visible";
							document.getElementById("Save").style.visibility ="hidden";
						}

						function sumAmounts(){
							amount=0;
								for(var i=0;i<counter;i++){
									val = document.getElementById("amt"+i);
									val = parseFloat(val.innerHTML);
									amount=amount+val;
								}

							return amount;
						}

						function sumQty(){
							quantity=0;
								for(var i=0;i<counter;i++){
									val = document.getElementById("qty"+i);
									val = parseFloat(val.innerHTML);
									quantity=quantity+val;
								}

							return quantity;
						}


						function saveChanges(){
							counter=<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
;
							 var totalvalue = 0;
							for(var i=0;i<counter;i++){

								val = document.getElementById("qty"+i);
								val2 = document.getElementById("ino"+i);
								val3 = document.getElementById("ono");
								amount = document.getElementById("amt"+i);

								val = parseFloat(val.innerHTML);
								val2 = parseFloat(val2.innerHTML);
								val3 = parseFloat(val3.innerHTML);
								amount = parseFloat(amount.innerHTML);
								totalvalue=totalvalue+amount;
								var theUrl="ajax.php?cmd=2&ono="+val3+"&ino="+val2+"&qty="+val+"&amt="+amount;
               $.ajax(theUrl,
                	{async:true,
                		 complete:saveComplete}
                );
							}
							return totalvalue;
						}


						function checkoutComplete(xhr, status){

              console.log(xhr);

              var obj=$.parseJSON(xhr.responseText);
							if(obj.result==0){
								console.log(obj.message);
								window.location='index.php?cAction=5';
							}else{
								console.log("order not checked out");
								}
						}

						function checkout(cno){
						amount =saveChanges();
						val = document.getElementById("ono");
						val = parseFloat(val.innerHTML);
						var orderNo=val;

						var qty = sumQty();

						/*amount = document.getElementById("tAmt");
						amount = parseFloat(amount.innerHTML);*/
						console.log("amount"+amount);
              var theUrl="ajax.php?cmd=3&ono="+orderNo+"&amt="+amount+"&cno="+cno+"&qty="+qty;
               $.ajax(theUrl,
                	{async:true,
                		 complete:checkoutComplete}
                );
						}

						function removeComplete(xhr, status){
							console.log(xhr);

              var obj=$.parseJSON(xhr.responseText);
							if(obj.result==0){
								$("#row"+obj.rowNum).remove();
							}else{
								console.log("order not checked out");
								}
						}

						function removeItem(counter){
						val2 = document.getElementById("ino"+counter);
						val3 = document.getElementById("ono");

						val2 = parseFloat(val2.innerHTML);
						val3 = parseFloat(val3.innerHTML);

						var theUrl="ajax.php?cmd=5&ono="+val3+"&ino="+val2+"&row="+counter;
               $.ajax(theUrl,
                	{async:true,
                		 complete:removeComplete}
                );

						}

					<?php echo '</script'; ?>
>
					

				<?php } else { ?>
						<h1><?php echo "Cart Empty";?>
</h1>
					<?php }?>
				</div>
        <!--/.Main layout-->
    </main>

    <!--Footer-->
      <footer id="" class="page-footer center-on-small-only">

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
