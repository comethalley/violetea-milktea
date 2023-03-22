
<?php
	include_once 'db-connection.php';
	$id=$_GET['id'];
 
    $title = mysqli_real_escape_String($conn, $_POST["title"]);
    $introduction = mysqli_real_escape_String($conn, $_POST["introduction"]);
    $trends = mysqli_real_escape_String($conn, $_POST["trends"]);
    $conclusion = mysqli_real_escape_String($conn, $_POST["conclusion"]);
    
    //check the form if empty

    if(empty($title) || empty($introduction) || empty($trends) || empty($conclusion)){
    header("Location: ../suggestion.php?submit=empty");
    }
    //if not empty insert to archive then delete the data
    else{
        $sql = "INSERT INTO tbl_ingredient(id, name, ingredient, image, researchID) VALUES ('','','','','$id')";
        mysqli_query($conn, $sql);
        echo "<script>window.close();</script>";
        header("Location: ../login.php?submit=success");
    }
?>