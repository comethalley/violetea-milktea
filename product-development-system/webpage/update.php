<?php
	include_once '../webpage/includes/db-connection.php';
	$id = $_POST['edit_id'];
 
    $title = mysqli_real_escape_String($conn, $_POST["title"]);
    $introduction = mysqli_real_escape_String($conn, $_POST["introduction"]);
    $trends = mysqli_real_escape_String($conn, $_POST["trends"]);
    $conclusion = mysqli_real_escape_String($conn, $_POST["conclusion"]);
    
    //check the form if empty
    if(empty($title)|| empty($introduction) ||empty($trends) || empty($conclusion)){
        header("Location: suggestion.php?submit=empty");
    }
    
    else{
        $sql = "UPDATE tbl_research SET title='$title', introduction='$introduction',  trends='$trends', conclusion='$conclusion' WHERE id='$id'";
        mysqli_query($conn, $sql);
        echo '<script> alert("Data Updated"); </script>';
        header("Location:suggestion.php?update=success");
        //header("Location: suggestion.php?submit=success");
    }
?>