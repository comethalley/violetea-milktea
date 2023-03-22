<?php
session_start(); // Start the session
unset($_SESSION['username']);
header("location: ../index.php")
?>

