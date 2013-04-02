<?php 

$host = $_ENV["DBHOST"]; 
$user = $_ENV["DBUSER"]; 
$pass = $_ENV["DBPASS"]; 
$db = $_ENV["DBNAME"]; 

$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die ("Could not connect to server\n"); 

$query = "SELECT VERSION()"; 
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n"); 
$row = pg_fetch_row($rs);

echo $row[0] . "\n";

pg_close($con); 

?>
