<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$servername = "localhost:8111";
$username = "root";
$password = "";
$database = "rms";
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect($servername , $username, $password, $database);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>