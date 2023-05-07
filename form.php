<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>PDIS | Form</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap');

        *{
            overflow: hidden;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }
      body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.6;
      }
      nav {
        background-color: #b359f7;
        color: #fff;
        padding: 10px 20px;
        width: 100%;
      }
      h1 {
        font-size: 28px;
        margin-top: 30px;
      }
      label {
        display: block;
        margin-bottom: 10px;
      }
      input[type="text"], textarea {
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 16px;
        margin-bottom: 20px;
        width: 100%;
      }
      textarea {
        height: 200px;
      }
      button[type="submit"] {
        background-color: #660099;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
      }
      button[type="submit"]:hover {
        background-color: #4d007a;
      }
      .container {
        max-width: 600px;
        margin: 0 auto;
      }
select {
    background-color: #fff;
    color: #333;
    font-size: 16px;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
}

.my-option {
    /* Add styles for your options with class "my-option" */
}
.back {
        background-color: #ffff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
      }
   


    </style>
</head>
<body>
<nav>
      <h2>Customer Feedback Form</h2>
    </nav>
    <div class="container">
      <h1>We'd Love to Hear From You!</h1>
      <p>Please use the form below to share your feedback or comments with us.</p>
      <form action="includes/form-function.php" method="POST">
        
    <input type="text" name="user" placeholder="Username" value="<?php echo $_SESSION['username']; ?>"required readonly><br>
    <label>Subject</label>
    <select name="subject" class="span8 tip" onChange="getSubcat(this.value);"  required>
<option value="">Select Category</option> 
<?php $query=mysqli_query($con,"select * from category");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['categoryName'];?>" class="my-option"><?php echo $row['categoryName'];?></option>

<?php } ?>
</select> 
<label>Suggestion Box</label>
    <textarea name="body" placeholder="Body" required></textarea><br>
    <button type="submit" name="submit">Submit</button>
    <button class="back"><a href="index.php">Back</a></button>
     
    </form>
    </div>

</body>
</html>