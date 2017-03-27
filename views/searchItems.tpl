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

 <div>
  <form action="index.php?cAction=1" method="POST">
   <input class="search-bar" id="search" type="text" name="searchName">
  </div>
  <div>
   <button type="submit" class="button">Search</button>
  </div>
 </form>

{if isset($smarty.request.searchName)}
  {if ($smarty.request.searchName)!=""}
    {assign var="txt" value=$smarty.request.searchName}
    {assign var="result" value=$item->searchItems($txt)}
    {assign var="data" value=$item->fetchDB($result)}
  {elseif ($smarty.request.searchName)==""}
    {assign var="result" value=$item->getItems()}
    {assign var="data" value=$item->fetchDB($result)}
  {/if}
{else}
  {assign var="result" value=$item->getItems()}
  {assign var="data" value=$item->fetchDB($result)}
{/if}

<h2>Results for <ins>{$smarty.request.searchName}</ins></h2>

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

 {foreach from=$data item=value}
  <tr>
   {if $value.ino}
      <td>{$value.ino}</td>
   {/if}
   {if $value.iname}
      <td>{$value.iname}</td>
   {/if}
   {if $value.qoh}
      <td>{$value.qoh}</td>
   {/if}
   {if $value.price}
      <td>{$value.price}</td>
   {/if}
   {if $value.olevel}
      <td>{$value.olevel}</td>
   {/if}
   </tr>
   {/foreach}
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
   <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

   <!-- Bootstrap tooltips -->
   <script type="text/javascript" src="js/tether.min.js"></script>

   <!-- Bootstrap core JavaScript -->
   <script type="text/javascript" src="js/bootstrap.min.js"></script>

   <!-- MDB core JavaScript -->
   <script type="text/javascript" src="js/mdb.min.js"></script>


 </body>

 </html>
