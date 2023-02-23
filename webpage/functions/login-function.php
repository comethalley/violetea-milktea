<?php

$mysqli = new mysqli("localhost","root","","users");
	if ($mysqli === false) {
		die("ERROR: COULD NOT CONNECT." .$mysqli-> connect_error);
	}
	
	$username = $_POST['user'];
	$password = $_POST['pass'];
	
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = $mysqli->real_escape_string($_POST['user']);
	$password = $mysqli->real_escape_string($_POST['pass']);
	
	mysqli_connect("localhost", "root", "");
	$mysqli->select_db("users");
	
	$result = $mysqli->query("SELECT * from admin where username = '$username' and password = '$password'");
	$row = mysqli_fetch_array($result);
		if ($row ['username'] == $username && $row['password'] == $password) {
			$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: cartindex.php');	
			
		} else {
			echo "Failed to login";
		}
		
		
?>
