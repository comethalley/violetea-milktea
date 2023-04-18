<?php
	include_once 'db-connection.php';
	$id = mysqli_real_escape_String($conn, $_POST["edit_id"]);
    $question = mysqli_real_escape_String($conn, $_POST["question"]);
    

        $sql = "UPDATE tbl_question SET question = '$question' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        header("Location: ../survey.php?submit=success");
?>