<?php
$server = "remotemysql.com";
$username = "JR39swmYmf";
$password = "o6qvPE6QYx";
$db = "JR39swmYmf";

$conn = mysqli_connect($server, $username, $password, $db);
// connect to database
// $conn =  mysqli_connect('sql6.freesqldatabase.com', 'sql6489805', 'sql6489805', 'Jeam4GJRNa');

// check connection
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}

else{
	// echo 'Succesfully connect to Database';
}
?>

