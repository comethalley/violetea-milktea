<?php

include_once '../webpage/includes/db-connection.php';
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM tbl_concept INNER JOIN tbl_ingredient ON tbl_concept.ingredientID = tbl_ingredient.id WHERE tbl_concept.id = '$id'");
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>

<head>
  <title>PDIS | Survey</title>
  <link rel="stylesheet" type="text/css" href="css/survey-form.css">
  <meta charset="UTF-8">
  <script src="https://kit.fontawesome.com/a1366662c0.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

 
<button class=print-btn onclick="window.print()"><i class="fa-solid fa-print" style="color: #9765c0;"></i> Print</button>
  <form method="POST" action="submit_response.php">

    <div class="header">
  <h1>SURVEY</h1>
  <div class="cont-perso"><h2>PERSONAL INFORMATION</h2></div>
    </div>
    <div class="parent-cont">
    <div class="cont-information-1">
    
    <label>Name:</label> 
    <input type="text" name="name"> 

    <label>Civil Status</label>
    <input type="text" name="name"> 
    <div class="gender">
    <label>Gender</label> 
    <p>Male</p><input type="radio" id="css" name="fav_language" value="CSS">
    <p>Female</p><input type="radio" id="css" name="fav_language" value="CSS">
    </div>
    
    </div>
    <div class="cont-information-2">
    <label>Address:</label>
    <input type="text" name="name">
    <label>Age:</label>
    <input type="text" name="name">
    </div>
    </div>
  <div class="instruction">
    <h2>INSTRUCTION</h2>

  </div>
  <div class="ins-desc">
  <p>
  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Asperiores quisquam 
  laboriosam amet qui iusto eligendi. Quos saepe quibusdam incidunt porre.
</p>
  </div>
<div class="product-details">
  <div class="product-box">
<label>Product Concept ID:</label>
    <input type="text" readonly value="<?php echo $id ?>" name="conceptID">
    <label>Product Concept Name:</label><br>
    <input type="text"  readonly value="<?php echo $row['name']; ?>" name="">
  </div>
    <label>Product Concept Image</label>
    <img src="../../admin/productimages/uploads/<?php echo $row['image']; ?>" alt="image.jpg" width="140px" height="140px">
    <img src="../../admin/productimages/uploads/<?php echo $row['image2']; ?>" alt="image.jpg" width="140px" height="140px">
    <img src="../../admin/productimages/uploads/<?php echo $row['image3']; ?>" alt="image.jpg" width="140px" height="140px">
    <div class="container">
</div>
   <div class="header-question">
<div class="question"><h2>QUESTIONS</h2></div>
<div class="rating"><h2>RATING SCALE</h2></div>
   </div>
      <?php
      include_once '../webpage/includes/db-connection.php';

      $query = "SELECT * FROM tbl_question WHERE archive='false'";
      $query_run = mysqli_query($conn, $query);
      ?>
      <?php
      if ($query_run) {
        foreach ($query_run as $row) {
      ?>
      
      <div class="container-question">
      
          <input type="hidden" name="question_id" value="<?php echo $row['id']; ?>">
          <div class="question-card">
           
          <p><?php echo $row['id']; ?>.&nbsp;<?php echo $row['question']; ?></p>
          </div>
          <div>
           
          <fieldset>
            
            <label><input type="radio" name="<?php echo $row['id']; ?>" value="1"> 1</label>
            <label><input type="radio" name="<?php echo $row['id']; ?>" value="2"> 2</label>
            <label><input type="radio" name="<?php echo $row['id']; ?>" value="3"> 3</label>
            <label><input type="radio" name="<?php echo $row['id']; ?>" value="4"> 4</label>
            <label><input type="radio" name="<?php echo $row['id']; ?>" value="5"> 5</label>
          </fieldset>
          </div>
      </div>
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