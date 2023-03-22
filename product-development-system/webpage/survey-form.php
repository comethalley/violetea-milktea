<?php

	include_once '../webpage/includes/db-connection.php';
	$id=$_GET['id'];
	$query=mysqli_query($conn,"SELECT * FROM tbl_concept INNER JOIN tbl_ingredient ON tbl_concept.ingredientID = tbl_ingredient.id WHERE tbl_concept.id = '$id'");
	$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>PDIS | Survey</title>
  <link rel="stylesheet" type="text/css" href="css/survey-form.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>



<form method="POST" action="submit_response.php">

  <label>Please enter your name:</label><br>
  <input type="text" name="name"><br>
  <label>Product Concept ID:</label><br>
  <input type="text" value="<?php echo $id?>" name="conceptID"><br><br>
  <label>Product Concept Name:</label><br>
  <input type="text" value="<?php echo $row['name']; ?>" name=""><br><br>
  <p>Product Concept Image</p>
  <img src="../webpage/uploads/<?php echo $row['image']; ?>" alt="image.jpg" width="100px" height="100px">

  <br><br>

  <fieldset>
  <p>How satisfied are you with our product?</p>
  <label><input type="radio" name="response1" value="1"> 1</label>
  <label><input type="radio" name="response1" value="2"> 2</label>
  <label><input type="radio" name="response1" value="3"> 3</label>
  <label><input type="radio" name="response1" value="4"> 4</label>
  <label><input type="radio" name="response1" value="5"> 5</label>
  </fieldset>

  <fieldset>
  <p>How satisfied are you with our product?</p>
  <label><input type="radio" name="response2" value="1"> 1</label>
  <label><input type="radio" name="response2" value="2"> 2</label>
  <label><input type="radio" name="response2" value="3"> 3</label>
  <label><input type="radio" name="response2" value="4"> 4</label>
  <label><input type="radio" name="response2" value="5"> 5</label>
  </fieldset>

  <fieldset>
  <p>How satisfied are you with our product?</p>
  <label><input type="radio" name="response3" value="1"> 1</label>
  <label><input type="radio" name="response3" value="2"> 2</label>
  <label><input type="radio" name="response3" value="3"> 3</label>
  <label><input type="radio" name="response3" value="4"> 4</label>
  <label><input type="radio" name="response3" value="5"> 5</label>
  </fieldset>

  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>







