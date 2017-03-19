<html>

<!--CHANGELOG
    Changed column names to reflect changes made in database - 12/3/2017
	Formatted code - 12/3/2017
-->
<!--
  @author David Okyere
  @desc - This page displays items based on user search input.
-->

<head>
<title> Search Employee </title>
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

                <a class="navbar-brand" href="employeeDisplay.php?eAction=2">
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
 <div>
  <form action="employeeDisplay.php?eAction=3" method="POST">
   <input class="search-bar" id="search" type="text" name="searchName">
  </div>
  <div>
   <button type="submit" class="button">Search</button>
  </div>
 </form>
 
 {if isset($smarty.request.searchName)}
    {if ($smarty.request.searchName)!=""}
      {assign var="txt" value=$smarty.request.searchName}
      {assign var="result" value=$employee->searchEmployees($txt)}
      {assign var="data" value=$employee->fetchDB($result)}
    {elseif ($smarty.request.searchName)==""}
      {assign var="result" value=$employee->getEmployees()}
      {assign var="data" value=$employee->fetchDB($result)}
 {/if}
 {else}
    {assign var="result" value=$employee->getEmployees()}
    {assign var="data" value=$employee->fetchDB($result)}
 {/if}	  
	 	  
 <div>
  <table>
    <thead>
      <tr>
       <td>Employee ID</td>
       <td>Employee Name</td>
       <td>Zip</td>
       <td>Hire Date</td>
	   <td>Password</td>
	   <td>Time Created</td>
	   <td>Account Type</td>
       <td>Username</td>
      </tr>
  </thead>
	
 {foreach from=$data item=value}
  <tr>
   {if $value.eno}
      <td>{$value.eno}</td>
   {/if}
   {if $value.ename}
      <td>{$value.ename}</td>
   {/if}
   {if $value.zip}
      <td>{$value.zip}</td>
   {/if}
   {if $value.hdate}
      <td>{$value.hdate}</td>
   {/if}
   {if $value.Password}
      <td>{$value.Password}</td>
   {/if}
   {if $value.created_at}
      <td>{$value.created_at}</td>
   {/if}
   {if $value.account_type}
      <td>{$value.account_type}</td>
   {/if}
   {if $value.Username}
      <td>{$value.Username}</td>
   {/if}
   <td><a href="employeeDisplay.php?eAction=4&searchName={$value.eno}">Edit Employee</a>
   </tr>
   {/foreach}
  </table>
 </div>
</body>
</html>
