<?php

session_start();
if($_SESSION['username']){
    echo "Welcome" . $_SESSION["username"];
}else{
    header("location: ../index.php");
}

	include_once '../webpage/includes/db-connection.php';
	$id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/product-concept-upload.css">
</head>
<body>
<h2>Product Concept</h2>
	<form method="POST" action="../webpage/includes/upload.php" enctype="multipart/form-data">
        <label>Ingredient ID:</label><br>
        <input type="text" value="<?php echo $id?>" name="ingredientID"><br>

        <label for="file">Product Concept Image</label><br>
        <input type="file" name="file"><br>

        <!--<label for="file">Product Concept Packaging</label><br>-->
        <!--<input type="file" name="packaging"><br>-->

		<button type="submit" name="submit">Upload</button>
	</form>	
</body>
</html>