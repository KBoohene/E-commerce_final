<html>
<!--CHANGELOG
	Created Class, basic replication of customers class - 1/26/2017
	Added basic interface to existent code - 1/31/2017
-->

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="Css/foundation.min.css">
    <link rel="stylesheet" href="Css/style.css">

  </head>

  <body>
     <div class="top-bar" id="example-animated-menu" data-animate="hinge-in-from-top spin-out">
        <div class="top-bar-left">
          <ul class="dropdown menu" id="top-navi" data-dropdown-menu>
            <li class="menu-text">Site Title</li>
            <li>
              <a href="#">One</a>
              <ul class="menu vertical">
                <li><a href="#">One</a></li>
                <li><a href="#">Two</a></li>
                <li><a href="#">Three</a></li>
              </ul>
            </li>
            <li><a href="#">Two</a></li>
            <li><a href="#">Three</a></li>
          </ul>
        </div>
      </div>

      <div id="divContent">
          <form action="" method="GET">
              <input type="text" name="txtSearch">
              <input type="submit" value="search" >
          </form>
      </div>


<?php

include_once("persons.php");

$person = new persons();

if(isset($_REQUEST['txtSearch']))
{
	if($_REQUEST['txtSearch']!=""){
		$name=$_REQUEST['txtSearch'];
		$row = $person->searchPerson(2,$name);
	}
	else if($_REQUEST['txtSearch']=="")
	{
			$row=$person->searchPerson(2);
	}

}
else{
	$row = $person->getPerson(2,"");
}

	echo"<table border=1>
				<tr>
					<td>Enumber</td>
					<td>Ename</td>
					<td>Zip Code</td>
					<td>Hire date</td>
				</tr>";

	while($row=$person->fetch())
  {

	   echo"<tr>
					 <td>{$row['eno']}</td>
					 <td>{$row['ename']}</td>
					 <td>{$row['zip']}</td>
					 <td>{$row['hdate']}</td>
			    </tr>";
  }
 echo"</table>";

?>
        <div class="footer">
        <div class="row">
          <div class="large-4 columns">
            <h5>Vivamus Hendrerit Arcu Sed Erat Molestie</h5>
            <p>Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit.</p>
          </div>
          <div class="large-3 large-offset-2 columns">
            <ul class="menu vertical">
              <li><a href="#">One</a></li>
              <li><a href="#">Two</a></li>
              <li><a href="#">Three</a></li>
              <li><a href="#">Four</a></li>
            </ul>
          </div>
          <div class="large-3 columns">
            <ul class="menu vertical">
              <li><a href="#">One</a></li>
              <li><a href="#">Two</a></li>
              <li><a href="#">Three</a></li>
              <li><a href="#">Four</a></li>
            </ul>
          </div>
        </div>
      </div>

      <script src="JS/jquery.js"></script>
      <script src="JS/foundation.js"></script>
      <script>
          $(document).foundation();
      </script>
	</body>
</html>
