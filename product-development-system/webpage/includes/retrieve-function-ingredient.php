<?php
	include_once 'db-connection.php';
	$id=$_POST['ingredient_id'];

        $sql = "UPDATE tbl_ingredient SET archive = 'false' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        header("Location: ../retrieve.php?retrieve=success");

?>