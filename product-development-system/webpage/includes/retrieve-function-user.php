<?php
	include_once 'db-connection.php';
	$id=$_POST['user_id'];

        $sql = "UPDATE tbl_feedback SET archive = 'false' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        header("Location: ../retrieve-user.php?retrieve=success");
?>