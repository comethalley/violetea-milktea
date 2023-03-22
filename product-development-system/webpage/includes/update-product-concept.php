<?php
include_once 'db-connection.php';

    if(isset($_POST['submit'])){

        $id=$_GET['id'];
        
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name']; //get the name of the file
        $fileTmpName = $_FILES['file']['tmp_name']; //temp location
        $fileSize = $_FILES['file']['size']; //size of img
        $fileError = $_FILES['file']['error']; // error handling
        $fileType = $_FILES['file']['type']; //filetype

        $fileExt = explode('.', $fileName); //get file extension
        $fileActualExt = strtolower(end($fileExt));

        //for packaging
        /**$packaging = $_FILES['packaging'];
        $packagingName = $_FILES['packaging']['name']; //get the name of the file
        $packagingTmpName = $_FILES['packaging']['tmp_name']; //temp location
        $packagingSize = $_FILES['packaging']['size']; //size of img
        $packagingError = $_FILES['packaging']['error']; // error handling
        $packagingType = $_FILES['packaging']['type']; //filetype

        $packagingExt = explode('.', $packagingName); //get file extension
        $packagingActualExt = strtolower(end($packagingExt));**/

        $allowed = array('jpg','jpeg','png'); //allow type of img

        // check if the extension is correct
        if(in_array($fileActualExt, $allowed) /**&& in_array($packagingActualExt, $allowed)**/){
            //check if there is no error in uploading
            if(/**$packagingError === 0 &&**/ $fileError === 0){
                //check the file size

                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    //$packagingNameNew = uniqid('', true).".".$packagingActualExt;

                    $fileDestination = '../uploads/'.$fileNameNew;
                    //$packagingDestination = '../uploads/'.$packagingNameNew;

                    $sql = "UPDATE tbl_concept SET image = '$fileNameNew' WHERE id = '$id'";
                    mysqli_query($conn, $sql);

                    move_uploaded_file($fileTmpName, $fileDestination); //move the file
                    //move_uploaded_file($packagingTmpName, $packagingDestination); //move the file

                    header("Location: ../product-concept.php?uploadsuccess");

            } else {
                echo "There was an error uploading your file!";
            }

        } else {
            echo "You cannot upload files of this type!";
        }
    }
?>