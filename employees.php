<html>
<!--CHANGELOG
	Created Class, basic replication of customers class - 1/26/2017
-->
	<head>
		<title>Display Employee</title>
	</head>

	<body>

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


	</body>
</html>
