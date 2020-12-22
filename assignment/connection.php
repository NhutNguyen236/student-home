<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "home";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno())//$conn->connect_error) 
{
	echo "Connection failed: " . mysqli_connect_error();//$conn->connect_error;
}
?>