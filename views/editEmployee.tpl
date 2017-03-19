<!DOCTYPE html>
<html>
<head>
	<title>Edit Employee</title>
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

  {if isset($smarty.post.eno)}
   {assign var="eid" value=$smarty.post.eno}
   {assign var="ename" value=$smarty.post.ename}
   {assign var="zip" value=$smarty.post.zip}
   {assign var="hdate" value=$smarty.post.hdate}
   {assign var="pword" value=$smarty.post.pword}
   {assign var="acctype" value=$smarty.post.acctype}
   {assign var="usrname" value=$smarty.post.usrname}
     {if ($zip)=="-1"}
      {"Please select a zip"}
     {elseif ($ename)=="" or ($pword)=="" or ($acctype)=="" or ($usrname)==""}
      {"Please enter all information"}
     {else}
      {assign var="result" value=$employee->editEmployee($eid,$ename,$zip,$hdate,$pword,$acctype,$usrname)}
      {"<script>window.location = 'employeeDisplay.php?eAction=3'</script>"}
     {/if}
   {/if}

{if isset($smarty.request.searchName)}
    {if ($smarty.request.searchName)!=""}
      {assign var="txt" value=$smarty.request.searchName}
      {assign var="result" value=$employee->getEmployeeData($txt)}
      {assign var="data" value=$employee->fetchDB($result)}
 {/if}

 {/if}

  <form action="employeeDisplay.php?eAction=4" method="POST">
    <input type="text" name="eno" value="{$data.0.eno}" hidden>
    <div> Employee Name <input type="text" name="ename" value='{$data.0.ename}'><br></div>
    <div> Zip <select name="zip">
	<option value="-1">Select Zip</option>
	 {assign var="zipResult" value=$employee->getZips()}
	 {assign var="zipData" value=$employee->fetchDB($zipResult)}
	 {foreach from=$zipData item=zip}
     {if $data.0.zip==$zip.zip}
	 <option value="{$zip.zip}" selected>{$zip.city}</option>
      {else}
        <option value="{$zip.zip}">{$zip.city}</option>
      {/if}
	 {/foreach}
	 </select>
     <br></div>
     <div> Hire Date <input type="date" name="hdate" value={$data.0.hdate}><br></div>
     <div> Password <input type="text" name="pword" value={$data.0.Password}><br></div>
     <div> Account Type <input type="number" name="acctype" value={$data.0.account_type}><br></div>
     <div> Username <input type="text" name="usrname" value={$data.0.Username}><br></div>
     <input type="submit" value="Edit">
  </form>


</body>
</html>
