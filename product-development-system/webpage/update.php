<?php
	include_once '../webpage/includes/db-connection.php';
	$id = $_POST['edit_id'];
 
    $title = mysqli_real_escape_String($conn, $_POST["title"]);
    $introduction = mysqli_real_escape_String($conn, $_POST["introduction"]);
    $market = mysqli_real_escape_String($conn, $_POST["market"]);
    $user = mysqli_real_escape_String($conn, $_POST["user"]);
    $conclusion = mysqli_real_escape_String($conn, $_POST["conclusion"]);
    
    //check the form if empty
    if(empty($title)|| empty($introduction) ||empty($market)||empty($user) || empty($conclusion)){
        header("Location: suggestion.php?submit=empty");
    }
    
    else{
        $sql = "UPDATE tbl_research SET title='$title', introduction='$introduction',  market='$market',user='$user', conclusion='$conclusion' WHERE id='$id'";
        mysqli_query($conn, $sql);
        echo '<script> alert("Data Updated"); </script>';
        header("Location:suggestion.php?upda
        te=success");
        //header("Location: suggestion.php?submit=success");
    }
?>