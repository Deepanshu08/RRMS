<?php 
$server = "localhost:8111";
$user = "root";
$pass = "";
$database = "website";
$conn = mysqli_connect($server, $user, $pass, $database);
if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
?>