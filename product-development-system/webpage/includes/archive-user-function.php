<?php
	include_once 'db-connection.php';
	$id=$_POST['user_id'];

        $sql = "UPDATE tbl_feedback SET archive = 'true' WHERE id = '$id'";
        mysqli_query($conn, $sql);
        echo '<script> alert("Data Updated"); </script>';
        header("Location:../suggestion.php?archive=success");
        //header("Location: suggestion.php?submit=success");
?>