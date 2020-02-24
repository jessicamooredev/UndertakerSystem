<?php
$hostname = "localhost";
$username = "JessicaG";
$password = "groupU";

$dbname = "Undertakers";

$con = mysqli_connect($hostname,$username,$password,$dbname);

if(!$con)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>