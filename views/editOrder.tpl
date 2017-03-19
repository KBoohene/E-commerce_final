<!DOCTYPE html>
<html>
  <head>
    <title>Edit order</title>
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

		{if isset($smarty.request.searchName)}
      {if ($smarty.request.searchName)!=""}
        {assign var="txt" value=$smarty.request.searchName}
        {assign var="result" value=$order->getOrderData($txt)}
        {assign var="data" value=$order->fetchDB($result)}
      {/if}
    {/if}

    {if isset($smarty.post.ono)}
      {assign var="ono" value=$smarty.post.ono}
      {assign var="cno" value=$smarty.post.cno}
      {assign var="checked_out" value=$smarty.post.checked_out}
      {assign var="received" value=$smarty.post.received}
      {assign var="shipped" value=$smarty.post.shipped}
   
      {if ($cno)=="" or ($checked_out)=="" or ($received)=="" or ($received)==""}
        {"Please enter all information"}
        {else}
          {assign var="result" value=$order->editOrder($ono,$cno,$checked_out,$received,$shipped)}
          {"<script>window.location = 'employeeDisplay.php?eAction=14'</script>"}
      {/if}
    {/if}

    <form action="employeeDisplay.php?eAction=15" method="POST">
      <input type="text" name="ono" value="{$data.0.ono}" hidden>
      <div> Customer ID <input type="number" name="cno" value='{$data.0.cno}'><br></div>
      <div> Checked Out <select name="checked_out">
			<option value="-1">Select Checked Out Status</option>
			{if $data.0.checked_out=='Yes'}
				<option value="Yes" selected> Yes </option>
				<option value="No"> No </option>
				{else}
				<option value="Yes"> Yes </option>
				<option value="No" selected> No </option>
			{/if}

       </select>
       <br></div>
      <div> Received <input type="date" name="received" value='{$data.0.received}'><br></div>
      <div> Shipped <input type="date" name="shipped" value='{$data.0.shipped}'><br></div>
      <input type="submit" value="Edit">
    </form>
  </body>
</html>
