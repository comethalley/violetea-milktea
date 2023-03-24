<?php
	include_once 'db-connection.php';
	$id = $_POST['archive_id'];

        $sql = "UPDATE tbl_research SET archive = 'true' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        header("Location: ../suggestion.php?archive=success");

?>