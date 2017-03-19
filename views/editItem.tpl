<!DOCTYPE html>
<html>
<head>
	<title>Edit item</title>
<!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.1/js/mdb.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.1/js/mdb.min.js"></script>

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <header>

        <!--Navbar-->
        <nav class="navbar navbar-toggleable-md navbar-dark">
            <div class="container">

                <a class="navbar-brand" href="#">
                  <strong>Employee Core Store</strong>
                </a>

                <ul class="nav navbar-nav mr-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Customer</a>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu4">
                           <a class="dropdown-item" href="employeeDisplay.php?eAction=7">Add Customer</a>
                           <a class="dropdown-item" href="employeeDisplay.php?eAction=6">View Customers</a>
                       </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="employeeDisplay.php?eAction=#">Orders</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Items</a>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2">
                           <a class="dropdown-item" href="employeeDisplay.php?eAction=12">Add Item</a>
                           <a class="dropdown-item" href="employeeDisplay.php?eAction=13">View Items</a>
                       </div>
                  </li>
                  {if ($smarty.session.acctype==3)}
                     <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdownMenu5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Employees</a>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu5">
                           <a class="dropdown-item" href="employeeDisplay.php?eAction=5">Add Employee</a>
                           <a class="dropdown-item" href="employeeDisplay.php?eAction=3">View Employees</a>
                       </div>
                  </li>
                    {else}
                  {/if}
                </ul>

                <form class="form-inline waves-effect waves-light">
                  <input class="form-control" type="text" placeholder="Search">
                </form>

                <ul class="nav navbar-nav nav-flex-icons ml-auto">
                   <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Account</a>
                       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                           <a class="dropdown-item" href="#">Login</a>
                           <a class="dropdown-item" href="#">Profile</a>
                           <a class="dropdown-item" href="#">Logout</a>
                       </div>
                   </li>

               </ul>


            </div>
        </nav>
	    <!--/.Navbar-->

    </header>
{if isset($smarty.post.ino)}
 {assign var="itemId" value=$smarty.post.ino}
 {assign var="iname" value=$smarty.post.iname}
 {assign var="qoh" value=$smarty.post.qoh}
 {assign var="price" value=$smarty.post.price}
 {assign var="olvl" value=$smarty.post.olevel}
 {assign var="catno" value=$smarty.post.catno}

 {if ($catno)=="-1"}
  {"Please select a zip"}
 {elseif ($itemId)=="" or ($iname)=="" or ($qoh)=="" or ($price)==""}
  {"Please enter all information"}
 {else}
  {assign var="result" value=$item->editItem($itemId, $iname, $qoh, $price, $olvl, $catno)}
  {"<script>window.location ='employeeDisplay.php?eAction=13'</script>"}
 {/if}
 {/if}

 {if isset($smarty.request.searchItem)}
    {if ($smarty.request.searchItem)!=""}
      {assign var="txt" value=$smarty.request.searchItem}
      {assign var="result" value=$item->getItemDetails($txt)}
      {assign var="data" value=$item->fetchDB($result)}
 {/if}

 {/if}
 <!-- {$data|print_r} -->

	<form action="employeeDisplay.php?eAction=11" method="POST">
    <input type="text" name="ino" value="{$data.0.ino}" hidden>
   <div>Item Name <input type="text" name="iname" value="{$data.0.iname}"><br></div>
   {assign var="categoryId" value=$item->getCategory()}
   {assign var="categoryVar" value=$item->fetchDB($categoryId)}

   <div>Category <select name="catno">
	<option value="-1">Select category</option>
	 {foreach from=$categoryVar  item=category}

     {if $data.0.catno==$category.catno}
	 <option value={$category.catno} selected>{$category.catname}</option>
     {else}
        <option value={$category.catno}>{$category.catname}</option>
      {/if}

	{/foreach}
	</select>
   <br></div>
   <div> Quantity On Hand <input type="text" name="qoh" value="{$data.0.qoh}"><br></div>
   <div> Price <input type="text" name="price" value="{$data.0.price}"><br></div>
   <div> order level <input type="number" name="olevel" value="{$data.0.olevel}"><br></div>
   <input type="submit" value="Edit">
  </form>



</body>
</html>
