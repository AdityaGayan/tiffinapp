<?php 

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'tiffinapp';

$conn = new mysqli($dbhost,$dbuser,$dbpass,$db);

//check connections
if($conn->connect_error) {
	die("Connection failed: ".$conn->connect_error);
}

?>