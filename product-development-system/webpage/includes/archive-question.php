<?php
	include_once 'db-connection.php';
	$id = mysqli_real_escape_String($conn, $_POST["archive_id"]);
    

        $sql = "UPDATE tbl_question SET archive = 'true' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        header("Location: ../survey.php?submit=success");
?>