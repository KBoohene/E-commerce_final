<html>
<!--CHANGELOG
	Created Class - 1/25/2017
	Added filter number to separate employees from customer -1/26/2017
-->
	<head>
		<title>Display Customer</title>
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
		$row = $person->searchPerson(1,$name);

	}
	else if($_REQUEST['txtSearch']=="")
	{
		$row=$person->searchPerson(1);
	}

}
else{
		$row = $person->getPerson(1,"");
}

	echo"<table border=1>
				<tr>
					<td>Cnumber</td>
					<td>Cname</td>
					<td>Street</td>
					<td>Zip Code</td>
					<td>Phone Number</td>
				</tr>";

	while($row=$person->fetch())
  {

	   echo"<tr>
					 <td>{$row['cno']}</td>
					 <td>{$row['cname']}</td>
					 <td>{$row['street']}</td>
					 <td>{$row['zip']}</td>
					 <td>{$row['phone']}</td>
			    </tr>";
  }
 echo"</table>";

?>


	</body>
</html>
