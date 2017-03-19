<!DOCTYPE html>
<html>
  <head>
    <title>Add Customer</title>
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
                  <a class="nav-link" href="employeeDisplay.php?eAction=14">Orders</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Items</a>
                  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="employeeDisplay.php?eAction=12">Add Item</a>
                    <a class="dropdown-item" href="employeeDisplay.php?eAction=13">View Items</a>
                  </div>
                </li>
								{if isset($smarty.session.acctype)}
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
	<form action="employeeDisplay.php?eAction=7" method="post">
      <label>Name</label>
      <input type="text" name="name">
          <br>
      <label>Street</label>
      <input type="text" name="street">
          <br>
      <label>Zip</label>
      <select name="zip">
          <option value="-1">Select Zip</option>
          {assign var="zipResult" value=$customer->getZips()}
          {assign var="zipData" value=$customer->fetchDB($zipResult)}
          {foreach from=$zipData item=zip}
              <option value="{$zip.zip}">{$zip.city}</option>
          {/foreach}
      </select>
          <br>
      <label>Phone Number</label>
      <input type="text" name="phone">
          <br>
      <label>Username</label>
      <input type="text" name="username">
          <br>
      <label>Password</label>
      <input type="password" name="password">
          <br>
          <br>
      <label>Status</label>
      <input type="text" name="status">
          <br>
      <input type="text" name="submitted" hidden>
      <input type="submit" value="Submit">
	</form>

	{if isset($smarty.post.submitted)}
      {assign var="name" value=$smarty.post.name}
      {assign var="street" value=$smarty.post.street}
      {assign var="zip" value=$smarty.post.zip}
      {assign var="phone" value=$smarty.post.phone}
      {assign var="username" value=$smarty.post.username}
      {assign var="password" value=$smarty.post.password}
      {assign var="status" value=$smarty.post.status}
      {if ($zip)=="-1"}
        {"Please select a zip"}
        {elseif ($name)=="" or ($street)=="" or ($phone)=="" or ($username)=="" or ($password)==""}
          {"Please enter all information"}
        {else}
          {assign var="result" value=$customer->addCustomer($name, $street, $zip, $phone, $username, $password, $status)}
		  {"Success"}
          {"<script>window.location = 'employeeDisplay.php?eAction=6'</script>"}
      {/if}
    {/if}
  </body>
</html>
