<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Customer Login</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

</head>

<body id="core-wrapper">

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
                                {if isset($smarty.session.userId)}
                                    {assign var="session" value=$userInfo->getSession()}
                                    {$session['fullname']}
                                {else}
                                    {"Guest"}
                                {/if}
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                              {if !isset($smarty.session.userId)}
                                  {'<a class="dropdown-item" href="index.php?cAction=4">Login</a>'}
                              {/if}
                              {if isset($smarty.session.userId)}
                                  {'<a class="dropdown-item" href="index.php?cAction=5">Orders</a>'}
                                  {'<a class="dropdown-item" href="index.php?cAction=7">Logout</a>'}
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
					{if isset($smarty.session.userId)}
            {assign var="customerId" value=$smarty.session.userId}
          {else}
            {"Session not started"}
          {/if}

          {assign var="result" value=$order->getCheckout($customerId)}
          {assign var="data" value=$order->fetchDB($result)}

			{if ($data!=null)}
			{assign var="count" value=0}

				<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
								 <td>Product Name</td>
								 <td>Quantity</td>
								 <td>Price</td>
								 <td>Amount</td>
								</tr>
						</thead>


					 {foreach from=$data item=value}
						<tr>
							<td hidden>
								{if $value.ino}
									<span id="ino{$count}">
										{$value.ino}
									</span>
								{/if}
							</td>
							<td hidden>
								{if $value.ono}
									<span id="ono">
										{$value.ono}
									</span>
								{/if}
							</td>
						 {if $value.iname}
								<td>{$value.iname}</td>
						 {/if}
						 {if $value.qty}
								<td>
										<span id="qty{$count}">
											{if $value.qty<10}
													{0}{$value.qty}
												{else}
													{$value.qty}
											{/if}
										</span>
									<div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-sm btn-primary btn-rounded" onclick="decreaseQty({$count})" >
                            <input type="radio" name="options" id="option1" />&mdash;
                        </label>
                        <label class="btn btn-sm btn-primary btn-rounded" id="plus" onclick="increaseQty({$count})">
                            <input type="radio" name="options" id="option2" />+
                        </label>
                    </div>
								</td>
						 {/if}
						 {if $value.price}
								<td id="price{$count}">{$value.price}</td>
						 {/if}
								<td>
								{assign var="amt" value= $value.price*$value.qty}
									<span id="amt{$count}">
										{$amt}
									</span>
								</td>
						 </tr>
						 {assign var="count" value=$count+1}
						 {/foreach}
						</table>
					 </div>
        </div>

				<button type="button" class="btn btn-primary" onclick="saveChanges()" id="Save">Save</button>
				<button type="button" class="btn btn-primary" onclick="checkout()" id="Checkout">Checkout</button>
					{literal}
					<script>
						var val, val2, val3, amount, quantity, price ;
						var counter; {/literal}{$count}{literal}


						function increaseQty(count){
							val = document.getElementById("qty"+count);
							val2 = document.getElementById("price"+count);
							val3 = document.getElementById("amt"+count);


							amount =parseFloat(val3.innerHTML);
							quantity = parseFloat(val.innerHTML);

							price = parseFloat(val2.innerHTML);

							quantity++;
							amount = price*quantity;

							if(quantity<10)
							{
							  $("#qty"+count).html("0"+quantity);
							}
							else{
								$("#qty"+count).html(quantity);
							}

							$("#amt"+count).html(amount);
						}

						function decreaseQty(count){
							val = document.getElementById("qty"+count);
							val2 = document.getElementById("price"+count);
							val3 = document.getElementById("amt"+count);

							amount =parseFloat(val3.innerHTML);
							quantity = parseFloat(val.innerHTML);

							price = parseFloat(val2.innerHTML);

							quantity--;
							amount = price*quantity;

							if(quantity<10)
							{
							  $("#qty"+count).html("0"+quantity);
							}
							else{
								$("#qty"+count).html(quantity);
							}

							$("#amt"+count).html(amount);
						}

						function saveComplete(xhr,status){
              console.log(xhr);

              var obj=$.parseJSON(xhr.responseText);
							if(obj.result==0){
								console.log(obj.message);
							}else{
								console.log("Cart not updated");
								}
							document.getElementById("Save").style.visibility ="hidden";
						}

						function saveChanges(){
							counter={/literal}{$count}{literal};

							for(var i=0;i<counter;i++){

								val = document.getElementById("qty"+i);
								val2 = document.getElementById("ino"+i);
								val3 = document.getElementById("ono"+i);

								val = parseFloat(val.innerHTML);
								val2 = parseFloat(val2.innerHTML);
								val3 = parseFloat(val3.innerHTML);

								var theUrl="ajax.php?cmd=2&ono="+val3+"&ino="+val2+"&qty="+val;
               $.ajax(theUrl,
                	{async:true,
                		 complete:saveComplete}
                );
							}
						}


						function checkoutComplete(xhr, status){

              console.log(xhr);

              var obj=$.parseJSON(xhr.responseText);
							if(obj.result==0){
								console.log(obj.message);
								window.location='index.php?cAction=5';
							}else{
								console.log("order not checked out");
								}
						}

						function checkout(){
						val = document.getElementById("ono");
						val = parseFloat(val.innerHTML);

              var theUrl="ajax.php?cmd=3&ono="+val;
               $.ajax(theUrl,
                	{async:true,
                		 complete:checkoutComplete}
                );

						}

					</script>
					{/literal}

				{else}
						<h1>{"Cart Empty"}</h1>
					{/if}
				</div>
        <!--/.Main layout-->
    </main>

    <!--Footer-->
      <footer id="" class="page-footer center-on-small-only">

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
