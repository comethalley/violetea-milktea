<?php
	include_once 'db-connection.php';
	session_start();
 
    $firstname = mysqli_real_escape_String($conn, $_POST["firstname"]);
    $lastname = mysqli_real_escape_String($conn, $_POST["lastname"]);
    $username = mysqli_real_escape_String($conn, $_POST["username"]);
    $password = mysqli_real_escape_String($conn, $_POST["password"]);

    //check the form if empty
    if(empty($firstname)|| empty($lastname) || empty($username) || empty($password)){
        header("Location: ../sign-up.php?submit=empty");
    }
    
    else{
        $sql = "INSERT INTO tbl_employee(id, firstname, lastname, username, password) VALUES ('','$firstname','$lastname','$username','$password')";
        mysqli_query($conn, $sql);
		$_SESSION["username"] = $username;
        header("Location: ../suggestion.php?submit=success");
    }
?>