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
    <title>Edit Research</title>
    <style>
        body {
    background-color: rgb(165, 93, 224);
    font-family: Arial, sans-serif;
}

h2 {
    color: white;
}

form {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    width: 60%;
    margin: 50px auto;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
}

label {
    display: block;
    margin-bottom: 10px;
    color: rgb(165, 93, 224);
}

input[type="text"] {
    padding: 10px;
    border: none;
    border-radius: 5px;
    margin-bottom: 20px;
    width: 100%;
    box-sizing: border-box;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

input[type="text"]:hover {
    background-color: rgba(165, 93, 224, 0.1);
}

input[type="text"]:focus {
    background-color: rgba(165, 93, 224, 0.2);
    outline: none;
}

input[type="submit"] {
    background-color: rgb(165, 93, 224);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: rgba(165, 93, 224, 0.8);
}

a {
    display: block;
    text-align: right;
    color: white;
    margin-top: 20px;
    text-decoration: none;
    font-size: 16px;
}
select {
  width: 200px;
  height: 30px;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 5px;
  font-size: 16px;
  background-color: #fff;
  transition: all 1.5s ease-in-out;
}

/* Apply hover styles to select element */
select:hover {
  cursor: pointer;
  border-color: #aaa;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  transition: all 1.5s ease-in-out;
}

/* Apply styles to selected option */
select option:checked {
  background-color: #0066cc;
  color: #fff;
  transition: all 1.5s ease-in-out;
}

/* Apply hover styles to option elements */
select option:hover {
  background-color: #f2f2f2;
  transition: all 1.5s ease-in-out;
}

    </style>
</head>
<body>
    <h2>Edit product</h2>

    <form method="POST" action="../webpage/includes/update-product-concept.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
        <label>Ingredient ID:</label><br>
        <input type="text" value="<?php echo $row['ingredientID']; ?>" name="ingredientID"><br>
        <img src="../webpage/uploads/<?php echo $row['image']; ?>" alt="image.jpg" width="100px" height="100px">
        <label for="file">Product Concept Image</label><br>
        <input type="file" name="file"><br>

		<button type="submit" name="submit">Upload</button>
	</form>	
</body>
</html>
