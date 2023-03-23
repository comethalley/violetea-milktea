<?php
	include_once 'db-connection.php';
	$id=$_GET['id'];

        $sql = "UPDATE tbl_concept SET archive = 'true' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        header("Location: ../product-concept.php?submit=success");

?>