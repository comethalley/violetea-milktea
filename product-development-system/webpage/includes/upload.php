<?php
include_once 'db-connection.php';

    if(isset($_POST['submit'])){
        $ingredientID = mysqli_real_escape_String($conn, $_POST["ingredientID"]);

        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name']; //get the name of the file
        $fileTmpName = $_FILES['file']['tmp_name']; //temp location
        $fileSize = $_FILES['file']['size']; //size of img
        $fileError = $_FILES['file']['error']; // error handling
        $fileType = $_FILES['file']['type']; //filetype

        $fileExt = explode('.', $fileName); //get file extension
        $fileActualExt = strtolower(end($fileExt));

        //for img 2
        $packaging = $_FILES['packaging'];
        $packagingName = $_FILES['packaging']['name']; //get the name of the file
        $packagingTmpName = $_FILES['packaging']['tmp_name']; //temp location
        $packagingSize = $_FILES['packaging']['size']; //size of img
        $packagingError = $_FILES['packaging']['error']; // error handling
        $packagingType = $_FILES['packaging']['type']; //filetype

        $packagingExt = explode('.', $packagingName); //get file extension
        $packagingActualExt = strtolower(end($packagingExt));

        //for img 3
        $file3 = $_FILES['file3'];
        $file3Name = $_FILES['file3']['name']; //get the name of the file
        $file3TmpName = $_FILES['file3']['tmp_name']; //temp location
        $file3Size = $_FILES['file3']['size']; //size of img
        $file3Error = $_FILES['file3']['error']; // error handling
        $file3Type = $_FILES['file3']['type']; //filetype

        $file3Ext = explode('.', $file3Name); //get file extension
        $file3ActualExt = strtolower(end($file3Ext));

        $allowed = array('jpg','jpeg','png'); //allow type of img

        // check if the extension is correct
        if(in_array($fileActualExt, $allowed) && in_array($packagingActualExt, $allowed) && in_array($file3ActualExt, $allowed)){
            //check if there is no error in uploading
            if($packagingError === 0 && $fileError === 0 && $file3Error === 0){
                //check the file size

                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $packagingNameNew = uniqid('', true).".".$packagingActualExt;
                    $file3NameNew = uniqid('', true).".".$file3ActualExt;

                    $fileDestination = '../../../admin/productimages/uploads/'.$fileNameNew;
                    $packagingDestination = '../../../admin/productimages/uploads/'.$packagingNameNew;
                    $file3Destination = '../../../admin/productimages/uploads/'.$file3NameNew;

                    $sql = "INSERT INTO tbl_concept(id, image, image2,image3, archive, ingredientID) VALUES ('','$fileNameNew','$packagingNameNew','$file3NameNew', 'false','$ingredientID')";
                    mysqli_query($conn, $sql);

                    move_uploaded_file($fileTmpName, $fileDestination); //move the file
                    move_uploaded_file($packagingTmpName, $packagingDestination); //move the file
                    move_uploaded_file($file3TmpName, $file3Destination); //move the file

                    header("Location: ../product-concept.php?uploadsuccess");

            } else {
                echo "There was an error uploading your file!";
            }

        } else {
            echo "You cannot upload files of this type!";
        }
    }
?>