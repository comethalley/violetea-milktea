<?php
session_start();


$con = mysqli_connect('localhost', 'root', '', 'onlineshopping') or die('unable to connect');
?>




<html>

<head>
  <title>PDIS | Login</title>
  <link rel="stylesheet" type="text/css" href="webpage/css/login.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="center">
    <br>
    <center><a href=""><img src="webpage/img/violet.png" id="logo" height="100" width="100"></a></center>
    <h1>Login</h1>


    <form id="login-form" method="POST">
      <div class="txt_field">
        <input type="text" name="username" required>
        <span></span>
        <label>Username</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password" required>
        <span></span>
        <label>Password</label>
      </div>
      <!--<div class="pass">Forgot Password?</div>-->
      <input type="submit" value="Login" name="Login">
      <div class="signup_link">
      </div>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script>
    function login() {
      // Prevent default form submission behavior
      event.preventDefault();

      // Serialize form data
      var formData = $("#login-form").serialize();

      // Send AJAX request
      $.ajax({
        type: "POST",
        url: "index.php",
        data: formData,
        success: function(response) {
          if (response == "success") {
            alert("Login Successful!"); // Display success message
            window.location.href = "webpage/suggestion.php"; // Redirect to suggestion page
          } else {
            alert("Invalid Username or Password!"); // Display error message
          }
        }
      });
    }
  </script>

  <?php
  if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $select = mysqli_query($con, " SELECT * FROM tbl_employee WHERE username = '$username' AND password = '$password' ");
    $row = mysqli_fetch_array($select);

    if (is_array($row)) {
      $_SESSION["username"] = $row['username'];
      $_SESSION["password"] = $row['password'];
      echo '<script type = "text/javascript">';
      echo 'Swal.fire({
          icon: "success",
          title: "Identity Confirmed",
          
          confirmButtonText: "OK"
      }).then(function() {
          window.location.href = "webpage/suggestion.php";
      });';


      echo '</script>';
    } else {
      echo '<script type = "text/javascript">';
      echo 'Swal.fire({
        icon: "error",
        title: "Wrong Username or Password",
        
        confirmButtonText: "Try Again"
    }).then(function() {
         
    });';
      echo '</script>';
    }
  }

  ?>

</body>

</html>