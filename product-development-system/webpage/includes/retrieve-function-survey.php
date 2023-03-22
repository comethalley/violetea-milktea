<?php
	include_once 'db-connection.php';
	$id=$_GET['id'];

        $sql = "UPDATE tbl_survey SET archive = 'false' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        //echo "<script>window.close();</script>";
        header("Location: ../retrieve.php?submit=success");
?>