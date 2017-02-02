<?php
?
  /**
   *@desc:This class installs a mysql database on a running server
   *@Source: http://stackoverflow.com/questions/26506820/run-sql-script-via-php
  **/
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password ="";
# MySQL with PDO_MYSQL
$db = new PDO("mysql:host=$mysql_host", $mysql_user, $mysql_password);

$db->query("CREATE DATABASE `coredb`;");
$query = file_get_contents("coredb.sql");

$stmt = $db->prepare($query);

if ($stmt->execute())
     echo "Success";
else
     echo "Fail";

?>
