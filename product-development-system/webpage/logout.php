<?php
include_once '../webpage/includes/db-connection.php';
session_start(); // Start the session
$_SESSION['username']=="";
date_default_timezone_set('Asia/Kolkata');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($conn,"UPDATE employeelog  SET logout = '$ldate' WHERE username = '".$_SESSION['username']."' ORDER BY id DESC LIMIT 1");
unset($_SESSION['username']);
header("location: ../index.php")
?>

