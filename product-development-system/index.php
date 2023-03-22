<?php
   session_start();


$con = mysqli_connect('localhost', 'root', '', 'onlineshopping') or die ('unable to connect');
?>




<html>
<head>
<title>PDIS | Login</title>
<link rel="stylesheet" type="text/css" href="webpage/css/login.css">
</head>
<body>
	<div class="center">
    <br>
	  <center><a href=""><img src="webpage/img/violet.png" id="logo" height="100" width="100"></a></center>
      <h1>Login</h1>


      <form action="index.php" method="POST">
        <div class="txt_field">
          <input type="text" name = "username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name = "password" required>
          <span></span>
          <label>Password</label>
        </div>
        <!--<div class="pass">Forgot Password?</div>-->
        <input type="submit" value="Login" name="Login">
        <div class="signup_link">
          Don't have an account? <a href="webpage/sign-up.php">Sign up</a>
        </div>
      </form>
    </div>



  <?php
      if (isset($_POST['Login'])){
      $username = $_POST['username'];
      $password = $_POST['password'];

      $select = mysqli_query($con," SELECT * FROM tbl_employee WHERE username = '$username' AND password = '$password' ");
      $row = mysqli_fetch_array($select);

      if(is_array($row)) {
        $_SESSION["username"] = $row['username'];
        $_SESSION["password"] = $row['password'];
      } else{
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Username or Password!");';
        echo 'window.location.href = "index.php" ';
        echo '</script>';
      }
      }
      if(isset($_SESSION["username"])){
        header("Location:webpage/suggestion.php");
      }
  ?>

</body>
</html>


