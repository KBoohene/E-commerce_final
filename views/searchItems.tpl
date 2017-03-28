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

            <div class="row">

              <div class="row">
               <form action="index.php?cAction=1" method="POST">
                 {assign var="search" value="Search"}
                 <div class="col-md-11">
                   <input class="form-control" id="search" type="text" name="searchName" placeholder="Search" value=
                    {if isset($smarty.request.searchName)}
                      {assign var="trimmed" value = $smarty.request.searchName|trim}
                      {if ($trimmed)==""}
                        {assign var="search" value="'"|cat:$search|cat:"'"}
                      {else}
                        {assign var="value" value="'"|cat:$smarty.request.searchName|cat:"'"}
                        {$value}
                      {/if}
                    {else}
                      {$search|strip}
                    {/if}
                   >
                 </div>
                 <div class="col-md-1">
                   <input type="submit" value="Search" class="form-control">
                 </div>
              </form>
              </div>

             {if isset($smarty.request.searchName)}
               {assign var="trimmed" value = $smarty.request.searchName|trim}
               {if ($trimmed)!=""}
                 {assign var="txt" value=$smarty.request.searchName}
                 {assign var="result" value=$item->searchItems($txt)}
                 {assign var="data" value=$item->fetchDB($result)}
               {elseif ($trimmed)==""}
                 {assign var="result" value=$item->getItems()}
                 {assign var="data" value=$item->fetchDB($result)}
                 {"<h2>Showing all items</h2>"}
               {/if}
             {else}
               {assign var="result" value=$item->getItems()}
               {assign var="data" value=$item->fetchDB($result)}
             {/if}

              {assign var="user" value=$userInfo->getSession()}


{if $data|@count == 0}
  {"<h2>No Result</h2>"}
{/if}
                        {foreach from=$data item=item}

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
                                    <img src="img/products/{$item.iname}.png" class="img-fluid" alt="">
                                    <a >
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
                                    <a href="index.php?cAction=2&pno={$item.ino}"><i class="fa fa-expand core-secondary" aria-hidden="true"></i></a>
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
                            </script>
                        {/literal}


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
   <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

   <!-- Bootstrap tooltips -->
   <script type="text/javascript" src="js/tether.min.js"></script>

   <!-- Bootstrap core JavaScript -->
   <script type="text/javascript" src="js/bootstrap.min.js"></script>

   <!-- MDB core JavaScript -->
   <script type="text/javascript" src="js/mdb.min.js"></script>


 </body>

 </html>
