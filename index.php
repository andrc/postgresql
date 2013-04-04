<?php
include '../dbconfig.php';

echo "postgresql demo <p>";
echo  "You have reached server:" . $_SERVER['SERVER_ADDR'];
echo "<p>-----------<br>";
echo "Let's connect to db master and show version:<br>";

$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die ("Could not connect to master server\n"); 

//show db server version
$query = "SELECT VERSION()"; 
$rs = pg_query($con, $query) or die("Cannot execute query: $query\n"); 
$row1 = pg_fetch_row($rs);

echo $row1[0] . "\n";

echo "<p>-----------<br>";
echo "Let's retrieve some data from the db master and print it out:<br>";

// execute query
$sql = "SELECT * FROM Cars";
$result = pg_query($con, $sql);
 if (!$result) {
     die("Error in SQL query: " . pg_last_error());
 }       

 // iterate over result set
 // print each row
 while ($row2 = pg_fetch_array($result)) {
     echo "Car Id: " . $row2[0] . "<br />";
     echo "Car name: " . $row2[1] . "<p />";
 }  

pg_close($con); 



echo "-----------<br>";
echo "Let's connect to db slave and show version:<br>";

$con2 = pg_connect("host=$slavehost dbname=$db user=$user password=$pass")
    or die ("Could not connect to slave server\n"); 
    

//show db server version
$query2 = "SELECT VERSION()"; 
$rs2 = pg_query($con2, $query2) or die("Cannot execute query: $query\n"); 
$row3 = pg_fetch_row($rs2);

echo $row3[0] . "\n";

echo "<p>-----------<br>";
echo "Let's retrieve some data from the db slave and print it out:<br>";

// execute query
$sql2 = "SELECT * FROM Cars";
$result2 = pg_query($con2, $sql2);
 if (!$result2) {
     die("Error in SQL query: " . pg_last_error());
 }       

 // iterate over result set
 // print each row
while ($row4 = pg_fetch_array($result2)) {
     echo "Car Id: " . $row4[0] . "<br />";
     echo "Car name: " . $row4[1] . "<p />";
 }  

pg_close($con2); 

?>
