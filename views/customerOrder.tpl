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
                         {if isset($smarty.session.acctype)}
												 		{if ($smarty.session.acctype!=1)}
															<li class="nav-item">
															<a class="nav-link" href="index.php?cAction=3"><i class="fa fa-sign-in"></i> <span class="hidden-sm-down">Register</span></a>
														</li>
														{/if}
												  {else}
														<li class="nav-item">
															<a class="nav-link" href="index.php?cAction=3"><i class="fa fa-sign-in"></i> <span class="hidden-sm-down">Register</span></a>
														</li>
												 {/if}

                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													 <i class="fa fa-user"></i>
														 {if isset($smarty.session.acctype)}
																 {if ($smarty.session.acctype == 1)}
																	 {assign var="session" value=$userInfo->getSession()}
																	 {$session['fullname']}
																	 {else}
																	 		{"Guest"}
																 {/if}
																{else}
																	{"Guest"}
														 {/if}
														 </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                {if !isset($smarty.session.userId)}
                                    {'<a class="dropdown-item" href="index.php?cAction=4">Login</a>'}
                                {/if}

                                {if isset($smarty.session.userId)}
																	{if ($smarty.session.acctype==1)}
																			{'<a class="dropdown-item" href="index.php?cAction=5">Orders</a>'}
																			{'<a class="dropdown-item" href="index.php?cAction=7">Logout</a>'}
																		{else}
																			{'<a class="dropdown-item" href="index.php?cAction=4">Login</a>'}
																	{/if}
                                {/if}
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

          {if isset($smarty.session.userId)}
            {assign var="customerId" value=$smarty.session.userId}
          {else}
            {assign var="customerId" value=10}
            {"Session not started"}
          {/if}

          {assign var="result" value=$order->getCustomerOrders($customerId)}
          {assign var="data" value=$order->fetchDB($result)}

                    {if ($data!=null)}
                    <table class="table">
							<thead>
								<tr>
									<th>Order #</th>
									<th>Customer Number</th>
									<th>Recieved </th>
									<th>Shipped date</th>
									<th>Created At</th>
								</tr>
							</thead>
                            <tbody>
										{foreach from=$data item=value}
											<tr data-toggle="collapse" data-target="#{$value.ono}" class="accordion-toggle table-active">
												{if $value.ono}
													<td>{$value.ono}</td>
												{/if}
												{if $value.cno}
													<td>{$value.cno}</td>
												{/if}
												{if $value.received}
													<td>{$value.received}</td>
													{else}
													<td>{"Null"}</td>
												{/if}
												{if $value.shipped}
													<td>{$value.shipped}</td>
													{else}
													<td>{"Null"}</td>
												{/if}
												{if $value.created_at}
													<td>{$value.created_at}</td>
												{/if}
											</tr>
                                            <div class="hiddenRow">
                                                {assign var="checked_out" value="Yes"}
                                                {assign var="result2" value=$order->getODV2($value.ono, $customerId, $checked_out)}
                                                {assign var="data2" value=$order->fetchDB($result2)}

                                                <!-- <thead>
                                                  <tr>
                                                    <th>Item #</th>
                                                    <th>Item Name</th>
                                                    <th>Item Price</th>
                                                    <th>Quantity</th>
                                                  </tr>
                                                </thead>
                                                    {foreach from=$data2 item=value2}
                                                    <tr>
                                                        <td>{$value2.ino}</td>
                                                        <td>{$value2.iname}</td>
                                                        <td>{$value2.price}</td>
                                                        <td>{$value2.qty}</td>
                                                    </tr>
                                                    {/foreach} -->

                                                <tr>
                                                    <!-- odetails.ono, odetails.ino, odetails.qty, items.iname, items.price -->

                                                    <!-- <td colspan="7">
                                                        <div class="accordian-body collapse" id="{$value.ono}">
                                                            <strong>Item #     |  Item Name     |     Item Price     |     Quantity </strong>
                                                            <br>
                                                            {$value2.ino} {$value2.iname} {$value2.price} {$value2.qty}
                                                         </div>
                                                    </td> -->
                                                    <td colspan="7">
                                                        <div class="accordian-body collapse" id="{$value.ono}">
                                                            <div class="row col-md-9">
                                                                <table class="table">
                                                                    <thead class="thead-default">
                                                                        <th>Item #</th>
                                                                        <th>Item Name</th>
                                                                        <th>Item Price</th>
                                                                        <th>Quantity</th>
                                                                    </thead>
                                                                    {foreach from=$data2 item=value2}
                                                                        <tr>
                                                                            <td>{$value2.ino}</td>
                                                                            <td>{$value2.iname}</td>
                                                                            <td>{$value2.price}</td>
                                                                            <td>{$value2.qty}</td>
                                                                        </tr>
                                                                    {/foreach}
                                                                </table>
                                                            </div>
                                                            <div class="row col-md-3"></div>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </div>


										{/foreach}
                                </tbody>
						</table>
						{else}
							{"No Orders"}
					{/if}

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
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>


</body>

</html>
