<?php
session_start();

if(!isset($_SESSION['user']))
{
	header("Location: Login.php");
}
else 
{
	header("Location: Checkout.php");
}

?>