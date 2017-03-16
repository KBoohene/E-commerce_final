<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Customer Registration</title>

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
                  <form class="form-inline waves-effect waves-light">
                      <input class="form-control" type="text" placeholder="Search">
                  </form>
              </div>
              <div>
                  <ul class="nav navbar-nav nav-flex-icons ml-auto">
                      <li class="nav-item">
                          <a class="nav-link" href="index.php?cAction=6"><i class="fa fa-shopping-cart"></i> <span class="hidden-sm-down">Cart</span></a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="index.php?cAction=3"><i class="fa fa-sign-in"></i> <span class="hidden-sm-down">Register</span></a>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Account</a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                              <a class="dropdown-item" href="index.php?cAction=4">Login</a>
                              <a class="dropdown-item" href="index.php?cAction=5">Orders</a>
                              <a class="dropdown-item" href="#">Logout</a>
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
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <img id="core-logo-login" src="img/logo-800.png" alt="Core Logo">
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <center><h4><p><strong>Welcome to Core Store</strong></p></h4></center>
                        <div class="card">
                            <div class="card-block">
                                <p>Login</p>
                                <form action="index.php?cAction=3" method="post">
                                    <div class="md-form">
                                        <i class="fa fa-user prefix"></i>
                                        <input type="text" name="name" id="form1" class="form-control">
                                        <label for="form1">Name</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-street-view prefix"></i>
                                        <input type="text" name="street" id="form1" class="form-control">
                                        <label for="form1">Street</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-location-arrow prefix"></i>

                                        <select id="my-registration-select">
                                            <option value="-1" disabled selected>Select Zip</option>
                                			{assign var="zipResult" value=$customer->getZips()}
                                			{assign var="zipData" value=$customer->fetchDB($zipResult)}
                                			{foreach from=$zipData item=zip}
                                				<option value="{$zip.zip}">{$zip.city}</option>
                                			{/foreach}
                                        </select>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-mobile prefix"></i>
                                        <input type="text" name="phone" id="form1" class="form-control">
                                        <label for="form1">Phone Number</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-user-secret prefix"></i>
                                        <input type="text" name="username" id="form2" class="form-control">
                                        <label for="form2">Username</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-lock prefix"></i>
                                        <input type="password" name="password" id="form2" class="form-control">
                                        <label for="form2">Password</label>
                                    </div>
                                    <input type="text" name="submitted" hidden>
                                    <button class="btn amber darken-2">Register</button>
                                </form>

                                {if isset($smarty.post.submitted)}
                            		{assign var="name" value=$smarty.post.name}
                            		{assign var="street" value=$smarty.post.street}
                            		{assign var="zip" value=$smarty.post.zip}
                            		{assign var="phone" value=$smarty.post.phone}
                            		{assign var="username" value=$smarty.post.username}
                            		{assign var="password" value=$smarty.post.password}

                            		{if ($zip)=="-1"}
                            			{"Please select a zip"}
                            		{elseif ($name)=="" or ($street)=="" or ($phone)=="" or ($username)=="" or ($password)==""}
                                      {"Please enter all information"}
                                    {else}
                                        {assign var="result" value=$customer->addCustomer($name, $street, $zip, $phone, $username, $password)}
                                        {"Success"}
                                        {"<script>window.location = 'index.php?cAction=5'</script>"}
                                    {/if}
                                {/if}

                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>

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

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2015 Copyright: <a href="http://index.php?cAction=9"> CoreStore.com </a>

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
