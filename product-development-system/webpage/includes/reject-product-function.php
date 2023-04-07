<?php
	include_once 'db-connection.php';
	$id=$_GET['id'];

        $sql = "UPDATE tbl_concept SET isRejected = 'true' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        header("Location: ../analysis-report.php?submit=success");

?>