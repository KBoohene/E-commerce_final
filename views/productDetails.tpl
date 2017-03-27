<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Product Details</title>

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

                <!--Sidebar-->
                <div class="col-lg-4">

                    <div class="widget-wrapper">


                        {assign var="itemsResult" value=$item->getRecentItems()}
                        {assign var="itemsData" value=$item->fetchDB($itemsResult)}


                        <h4>Recent Items</h4>
                        <br>
                        <div class="list-group">
                            {foreach from=$itemsData item=item}
                            <a href="index.php?cAction=2&pno={$item.ino}" class="list-group-item
                                {if isset($smarty.request.pno)}
                                    {if ($smarty.request.pno)==$item.ino}
                                        {'active'}
                                    {/if}
                                {/if}
                            ">{$item.iname}</a>
                            {/foreach}
                        </div>
                    </div>

                </div>
                <!--/.Sidebar-->

                <!--Main column-->
                <div class="col-lg-8">

                    <!--First row-->
                    <div class="row">
                        <div class="col-md-12">

                            {if isset($smarty.request.pno)}
                              {if ($smarty.request.pno)!=""}
                                {assign var="txt" value=$smarty.request.pno}
                                {assign var="result" value=$item->getItemDetails($txt)}
                                {assign var="data" value=$item->fetchDB($result)}

                                 {foreach from=$data item=value}
                                   {assign var="product" value=$value}
                                 {/foreach}
                              {elseif ($smarty.request.searchName)==""}
                                {**assign var="result" value=$item->getItems()**}
                                {**assign var="data" value=$item->fetchDB($result)**}
                              {/if}
                            {else}
                              {**assign var="result" value=$item->getItems()**}
                              {**assign var="data" value=$item->fetchDB($result)**}
                            {/if}

                            <!--Product-->
                            <div class="product-wrapper">

                                <!--Featured image-->
                                <div class="view overlay hm-white-light z-depth-1-half">
                                    <img src="http://mdbootstrap.com/img/Photos/Slides/img%20(109).jpg" class="img-fluid " alt="">
                                    <div class="mask">
                                    </div>
                                    <!-- <h3 class="price"><span class="badge red darken-2">20 $</span></h3> -->
                                </div>
                                <!--/.Featured image-->

                                <br>
                                {**$product|print_r**}
                                <!--Product data-->
                                <h2 class="h2-responsive">{$product.iname}</h2>
                                <a onclick="addToCart({$user['userId']},{$product.ino},1)"><i class="fa fa-cart-plus core-primary core-big-icon" aria-hidden="true"></i></a>
                                <span class="core-price-detail"><strong>$ {$product.price}</strong></span>
                                <br>

                                <hr>
                                <p>{$product.idesc}</p>


                                <hr>


                                {literal}
                                <script type="text/javascript">
                                    function addToCartComplete(xhr, status){
                                        alert("Item Added to Cart");
                                        console.log(xhr);

                                        var obj=$.parseJSON(xhr.responseText);
                                        if(obj.result==0){
                                            console.log(obj.message);
                                        } else{
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
                                </script>
                                {/literal}


                            </div>
                            <!--Product-->

                        </div>
                    </div>
                    <!--/.First row-->

                </div>
                <!--/.Main column-->

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
                <li><a target="_blank" href="http://mdbootstrap.com/getting-started/" rel="nofollow" class="btn btn-primary">Sign up!</a></li>
                <li><a target="_blank" href="http://mdbootstrap.com/material-design-for-bootstrap/" rel="nofollow" class="btn btn-default">Learn more</a></li>
            </ul>
        </div>
        <!--/.Call to action-->

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2015 Copyright: <a href="http://www.MDBootstrap.com" rel="nofollow"> MDBootstrap.com </a>

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
