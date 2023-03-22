<?php
	include_once 'db-connection.php';
	$id=$_POST['user_id'];

        $sql = "UPDATE tbl_survey SET archive = 'true' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        //echo "<script>window.close();</script>";
        header("Location: ../analysis-report.php?submit=success");
?>