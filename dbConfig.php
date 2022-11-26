<?php 
$serverName="localhost";
$user="root";
$dbName="Gaming";
$password="";

$con=mysqli_connect($serverName,$user,$password,$dbName);

if (!$con) 
{
	die("Connection failed: ".mysqli_connect_error());
}

?>s