<?php
	include_once 'db-connection.php';
	$id=$_POST['user_id'];

        $sql = "UPDATE tbl_survey SET archive = 'false' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        header("Location: ../retrieve-report.php?submit=success");
?>