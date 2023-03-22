<?php
		session_start();
		if($_SESSION['username']){
			echo "Welcome" . $_SESSION["username"];
		}else{
			header("location: ../index.php");
		}

	include_once '../webpage/includes/db-connection.php';
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from tbl_concept where id='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Archive Product</title>
<link rel="stylesheet" type="text/css" href="css/archive.css">
</head>
<body>
	<h2>Archive</h2>
	<form method="POST" action="../webpage/includes/archive-product.php?id=<?php echo $id; ?>">
    <label>Ingredient ID:</label><br>
        <input type="text" value="<?php echo $row['ingredientID']; ?>" name="ingredientID"><br>
        <img src="../webpage/uploads/<?php echo $row['image']; ?>" alt="image.jpg" width="100px" height="100px"><br><br>

		<button type="submit" name="submit">Archive</button>
	</form>
</body>
</html>