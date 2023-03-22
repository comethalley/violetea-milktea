<?php
	include_once 'db-connection.php';
 
    $title = mysqli_real_escape_String($conn, $_POST["title"]);
    $introduction = mysqli_real_escape_String($conn, $_POST["introduction"]);
    $trends = mysqli_real_escape_String($conn, $_POST["trends"]);
    $conclusion = mysqli_real_escape_String($conn, $_POST["conclusion"]);

    //check the form if empty
    if(empty($title)|| empty($introduction) || empty($trends) || empty($conclusion)){
        header("Location: ../suggestion.php?submit=empty");
    }
    
    else{
        $sql = "INSERT INTO tbl_research(id, title, introduction, trends, conclusion, archive) VALUES ('','$title','$introduction','$trends','$conclusion','false')";
        mysqli_query($conn, $sql);
        header("Location: ../suggestion.php?submit=success");
    }
?>