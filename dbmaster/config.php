<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gigdb');
 
 Attempt to connect to MySQL database */
$conx = mysqli_connect('localhost', 'root', '', 'gigdb', '3306');
 
// Check connection
if($conx === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>