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
        *{
            overflow: hidden;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
    <input type="text" name="subject" placeholder="Subject" required><br>
    <textarea name="body" placeholder="Body" required></textarea><br>
    <button type="submit" name="submit">Submit</button>
    <a href="index.php">Back</a>
    </form>
    </div>

</body>
</html>