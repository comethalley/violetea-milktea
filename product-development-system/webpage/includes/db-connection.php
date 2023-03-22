<?php

$dbServer = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "onlineshopping";

$conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL".mysqli_connect_error();
}
?>