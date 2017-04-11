<html>
  <head>
    <title>View Orders</title>
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
                {if isset($smarty.session.acctype)}
                <a class="navbar-brand" href="employeeDisplay.php?eAction=2">
                  <strong>Employee Core Store</strong>
                </a>
                  {else}
                    <a class="navbar-brand" href="#">
                      <strong>Employee Core Store</strong>
                    </a>
                {/if}

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
                           <a class="dropdown-item" href="employeeDisplay.php?eAction=13">View Item</a>
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
									{if isset($smarty.session.username)}
											<a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {$smarty.session.fullname}</a>
												<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
													<a class="dropdown-item" onclick="logout()">Logout</a>
													<a class="dropdown-item" href="#">Profile</a>
												</div>
										{else}
											<a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Account</a>
											<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
												<a class="dropdown-item" href="#">Login</a>
											</div>
									{/if}
                  </li>
               </ul>


            </div>
        </nav>
	    <!--/.Navbar-->
			{literal}
				<script>
						function logoutComplete(xhr, status){

              console.log(xhr);

              var obj=$.parseJSON(xhr.responseText);
							if(obj.result==0){
								console.log(obj.message);
								window.location='employeeDisplay.php?eAction=1';
							}else{
								console.log("Employee not logged out");
								}
						}

						function logout(){

              var theUrl="ajax.php?cmd=4";
               $.ajax(theUrl,
                	{async:true,
                		 complete:logoutComplete}
                );

						}
				</script>
			{/literal}
    </header>
    <main>
      <div class="container">


		<div>
    <form action="employeeDisplay.php?eAction=14" method="POST">
      <div class="row col-md-10">
        <label>Date:</label>
          <input id="search" type="date" name="searchOrder">
      </div>
      <div class="row col-md-2">
        <button type="submit" class="form-control amber darken-3 white-text">Search</button>
      </div>


    </form>
		</div>

    {if isset($smarty.request.searchOrder)}
      {if ($smarty.request.searchOrder)!=""}
        {assign var="txt" value=$smarty.request.searchOrder}
        {assign var="result" value=$order->searchOrders($txt)}
        {assign var="data" value=$order->fetchDB($result)}
      {elseif ($smarty.request.searchName)==""}
        {assign var="result" value=$order->getOrders()}
        {assign var="data" value=$order->fetchDB($result)}
      {/if}
    {else}
      {assign var="result" value=$order->getOrders()}
      {assign var="data" value=$order->fetchDB($result)}
    {/if}

		<div>
			<table class="table table-striped">
				<thead>
					<tr>
						<td>Order ID</td>
						<td>Customer ID</td>
						<td>Checked Out</td>
						<td>Received</td>
						<td>Shipped</td>
						<td>Created At</td>
					</tr>
				</thead>

				{foreach from=$data item=value}
					<tr>
						{if $value.ono}
							<td>{$value.ono}</td>
						{/if}
						{if $value.cno}
							<td>{$value.cno}</td>
						{/if}
						{if $value.checked_out}
							<td>{$value.checked_out}</td>
						{/if}

							<td>{$value.received}</td>

							<td>{$value.shipped}</td>

						{if $value.created_at}
							<td>{$value.created_at}</td>
						{/if}
						<td><a href="employeeDisplay.php?eAction=15&searchName={$value.ono}">Edit Order</a>
					</tr>
				{/foreach}
			</table>
 		</div>
  </div>
</main>
	</body>
</html>
