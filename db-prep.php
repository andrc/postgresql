<?php 

$host = $_ENV["DBHOST"];
$user = $_ENV["DBUSER"];
$pass = $_ENV["DBPASS"];
$db = $_ENV["DBNAME"]; 


$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die ("Could not connect to server\n"); 

$query = "DROP TABLE IF EXISTS cars"; 
pg_query($con, $query) or die("Cannot execute query: $query\n"); 

$query = "CREATE TABLE cars(id INTEGER PRIMARY KEY, mame VARCHAR(25), price INT)";  
pg_query($con, $query) or die("Cannot execute query: $query\n"); 

$query = "INSERT INTO cars VALUES(1,'Audi',52642)"; 
pg_query($con, $query) or die("Cannot execute query: $query\n"); 

$query = "INSERT INTO cars VALUES(2,'Mercedes',57127)"; 
pg_query($con, $query) or die("Cannot execute query: $query\n"); 

$query = "INSERT INTO cars VALUES(3,'Skoda',9000)"; 
pg_query($con, $query) or die("Cannot execute query: $query\n"); 

$query = "INSERT INTO cars VALUES(4,'Volvo',29000)"; 
pg_query($con, $query) or die("Cannot execute query: $query\n"); 

$query = "INSERT INTO cars VALUES(5,'Bentley',350000)"; 
pg_query($con, $query) or die("Cannot execute query: $query\n"); 

$query = "INSERT INTO cars VALUES(6,'Citroen',21000)"; 
pg_query($con, $query) or die("Cannot execute query: $query\n"); 

$query = "INSERT INTO cars VALUES(7,'Hummer',41400)"; 
pg_query($con, $query) or die("Cannot execute query: $query\n"); 

$query = "INSERT INTO cars VALUES(8,'Volkswagen',21606)"; 
pg_query($con, $query) or die("Cannot execute query: $query\n"); 

pg_close($con); 

?>
