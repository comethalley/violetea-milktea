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
  <img src="../../admin/productimages/uploads/<?php echo $row['image']; ?>" alt="image.jpg" width="100px" height="100px">
  <img src="../../admin/productimages/uploads/<?php echo $row['image2']; ?>" alt="image.jpg" width="100px" height="100px">
  <img src="../../admin/productimages/uploads/<?php echo $row['image3']; ?>" alt="image.jpg" width="100px" height="100px">
  <div class="container">

                            <?php
                            include_once '../webpage/includes/db-connection.php';

                            $query = "SELECT * FROM tbl_question WHERE archive='false'";
                            $query_run = mysqli_query($conn, $query);
                            ?>
                                    <?php
                                    if ($query_run) {
                                        foreach ($query_run as $row) {
                                    ?>
                                                <input type="hidden" name="question_id" value="<?php echo $row['id']; ?>">
                                                <p><?php echo $row['id']; ?>.&nbsp;<?php echo $row['question']; ?></p>
                                                  <fieldset>
                                                    <label><input type="radio" name="<?php echo $row['id']; ?>" value="1"> 1</label>
                                                    <label><input type="radio" name="<?php echo $row['id']; ?>" value="2"> 2</label>
                                                    <label><input type="radio" name="<?php echo $row['id']; ?>" value="3"> 3</label>
                                                    <label><input type="radio" name="<?php echo $row['id']; ?>" value="4"> 4</label>
                                                    <label><input type="radio" name="<?php echo $row['id']; ?>" value="5"> 5</label>
                                                  </fieldset>
                                    <?php
                                        }
                                    } else {
                                        echo "No Record Found";
                                    }
                                    ?>
  <input type="submit" name="submit" value="Submit">
   </div>
</form>
</body>
</html>







