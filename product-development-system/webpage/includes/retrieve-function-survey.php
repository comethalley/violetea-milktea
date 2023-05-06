<?php
	include_once 'db-connection.php';
        $username=$_POST['username'];
        $civilStatus=$_POST['civilStatus'];
        $gender=$_POST['gender'];
        $address=$_POST['address'];
        $age=$_POST['age'];
        $timeStamp = $_POST['timestamp'];


        $sql = "UPDATE tbl_surveys SET archive = 'false' WHERE username = '$username' 
        AND civilStatus = '$civilStatus' AND gender = '$gender' AND address = '$address' 
        AND age = '$age' AND timestamp = '$timeStamp'";
        mysqli_query($conn, $sql);
        header("Location: ../retrieve-report.php?submit=success");
?>