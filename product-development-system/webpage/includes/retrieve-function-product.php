<?php
	include_once 'db-connection.php';
	$id=$_GET['id'];

        $sql = "UPDATE tbl_concept SET archive = 'false' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        header("Location: ../retrieve-product-concept.php?submit=success");

?>