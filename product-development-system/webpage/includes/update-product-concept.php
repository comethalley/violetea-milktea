<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/suggestion.css">
</head>
<body>
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

        //for img2
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

                    $fileDestination = '../uploads/'.$fileNameNew;
                    $packagingDestination = '../uploads/'.$packagingNameNew;
                    $file3Destination = '../uploads/'.$file3NameNew;

                    $sql = "UPDATE tbl_concept SET image = '$fileNameNew', image2 = '$packagingNameNew', image3 = '$file3NameNew' WHERE id = '$id'";
                    mysqli_query($conn, $sql);

                    move_uploaded_file($fileTmpName, $fileDestination); //move the file
                    move_uploaded_file($packagingTmpName, $packagingDestination); //move the file
                    move_uploaded_file($file3TmpName, $file3Destination); //move the file

                    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                    <script>
                      Swal.fire({
                        icon: 'success',
                        title: 'Successfully Updated!',
                       
                       
                      }).then(function() {
                        window.location.href = '../product-concept.php'; // redirect to the page after success message
                      });
                    </script>";
            
              } else {
                  echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                  <script>
                    Swal.fire({
                      icon: 'success',
                      title: 'There was an error uploading your file',
                      
                  }).then(function() {
                      window.location.href = '../product-concept.php'; // redirect to the page after success message
                    });
                  </script>";
              }
            } else {
              echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
                  <script>
                    Swal.fire({
                      icon: 'success',
                      title: 'You cannot upload files of this type!',
                       
                      
                  }).then(() => {
                      window.location.href = '../product-concept.php';
                    });
                  </script>";
            }
      }  
?>
</body>
</html>
