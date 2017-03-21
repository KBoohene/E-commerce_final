<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Home</title>

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
                        <input class="form-control" type="text" placeholder="Search">
                    </form>
                </div>
                <div>
                    <ul class="nav navbar-nav nav-flex-icons ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?cAction=6"><i class="fa fa-shopping-cart"></i> <span class="hidden-sm-down">Cart</span></a>
                        </li>
												 {if isset($smarty.session.acctype)}
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
            <div class="row">

                    <!--First row-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="divider-new">
                                <h2 class="h2-responsive">What's new?</h2>
                            </div>



                            <!--Carousel Wrapper-->
                            <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                                <!--Indicators-->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                                </ol>
                                <!--/.Indicators-->
                                <!--Slides-->
                                <div class="carousel-inner" role="listbox">
                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <img src="img/landing/Untitled-1.png" alt="First slide">
                                        <div class="carousel-caption">
                                            <h4>New collection</h4>
                                            <br>
                                        </div>
                                    </div>
                                    <!--/First slide-->
                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <img src="img/landing/Untitled-2.png" alt="Second slide">
                                        <div class="carousel-caption">
                                            <h4>Get discount!</h4>
                                            <br>
                                        </div>
                                    </div>
                                    <!--/Second slide-->
                                    <!--Third slide-->
                                    <div class="carousel-item">
                                        <img src="img/landing/Untitled-3.png" alt="Third slide">
                                        <div class="carousel-caption">
                                            <h4>Only now for 10$</h4>
                                            <br>
                                        </div>
                                    </div>
                                    <!--/Third slide-->
                                </div>
                                <!--/.Slides-->
                                <!--Controls-->
                                <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <!--/.Controls-->
                            </div>
                            <!--/.Carousel Wrapper-->
                        </div>
                    </div>
                    <!--/.First row-->
                    <br>
                    <hr class="extra-margins">

                    <div class="divider-new">
                        <h2 class="h2-responsive">Recent Items</h2>
                    </div>

                    <div>

                    {assign var="user" value=$userInfo->getSession()}
                    {assign var="itemsResult" value=$item->getRecentItems()}
                    {assign var="itemsData" value=$item->fetchDB($itemsResult)}
                    {foreach from=$itemsData item=item}
                        {if $item@iteration % 4 == 0}
                        <!--Second row-->
                        <div class="row">
                    {/if}
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
                                <h4 class="card-title" id="my-home-cards">{$item.iname}</h4>
                                <!--Text-->
                                <strong><p class="card-text">$ {$item.price}</p></strong>

                                <!-- <a href="#" class="btn amber btn-core-primary"><i class="fa fa-money" aria-hidden="true"></i></a> -->
                                <!-- <a href="#" class="btn red darken-2 btn-core-primary"><i class="fa fa-expand" aria-hidden="true"></i></a> -->
                            <br>
                                <a onclick="addToCart({$user['userId']},{$item.ino},1)"><i class="fa fa-cart-plus core-primary" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-expand core-secondary" aria-hidden="true"></i></a>
                            </div>
                            <!--/.Card content-->
                        </div>
                        <!--/.Card-->
                    </div>
                    <!--/.Columnn-->
                    {if $item@iteration % 4 == 0}
                        </div>
                        <!--/.Second row-->
                    {/if}
                    {/foreach}

											{literal}
                        <script type="text/javascript">
                            function addToCartComplete(xhr, status){
                                //alert("ADDED to Cart");
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
                                alert(theUrl);
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
                        </script>
										{/literal}


                    </div>

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

        <hr>

        <!--Call to action-->
        <div class="call-to-action">
            <h4>Material Design for Bootstrap</h4>
            <ul>
                <li>
                    <h5>Get our UI KIT for free</h5></li>
                <li><a target="_blank" href="http://mdbootstrap.com/getting-started/" class="btn btn-info">Sign up!</a></li>
                <li><a target="_blank" href="http://mdbootstrap.com/material-design-for-bootstrap/" class="btn btn-primary">Learn more</a></li>
            </ul>
        </div>
        <!--/.Call to action-->

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
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>


</body>

</html>


<!-- <html>
  <head>
    <title>Home Page</title>
  </head>
  <body>

    <a href="index.php?cAction=4">Login</a>
    <a href="index.php?cAction=3">Sign Up</a>

    <div>
      <form action="index.php?cAction=1" method="POST">
      <div>
        <input class="search-bar" id="search" type="text" name="searchName">
      </div>
      <div>
        <button type="submit" class="button">Search</button>
      </div>
      </form>
    </div>

  </body>
</html> -->
