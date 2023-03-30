
<?php
	include_once './db-connection.php';
 
    $name = mysqli_real_escape_String($conn, $_POST["name"]);
    $image = mysqli_real_escape_String($conn, $_POST["image"]);
    $image2 = mysqli_real_escape_String($conn, $_POST["image2"]);
    $image3 = mysqli_real_escape_String($conn, $_POST["image3"]);

    //check the form if empty
    if(empty($name) || empty($image) || empty($image2) || empty($image3)) {
      
    } else {
        $sql = "INSERT INTO tbl_request(id, name, image, image2, image3, isAccepted) VALUES ('', '$name', '$image', '$image2', '$image3', 'false')";
        mysqli_query($conn, $sql);
        header("Location: ../analysis-report.php?archive=success");
      
    }
    
?>