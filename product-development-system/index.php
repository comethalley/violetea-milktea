<?php
session_start();


$con = mysqli_connect('localhost', 'root', '', 'onlineshopping') or die('unable to connect');
?>




<html>

<head>
  <title>PDIS | Login</title>
  <link rel="stylesheet" type="text/css" href="webpage/css/login.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>

<body>
  <section class="vh-100" style="background-color: #ebaffc;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;  ">
            <div class="row g-0">
              <div class="left-img col-md-6 col-lg-5 d-none d-md-block">
                <img src="./webpage/img/milktea.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form id="login-form" method="POST">

                    <div class="logo-img flex align-items-center  ">

                      <img src="./webpage/img/violet.png" />
                    </div>
                    <div class="employee-sign">
                      <h5 class="  mb-3 pb-3">Employee Sign in</h5>
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example17">Employee username</label>
                      <input type="text" name="username" required class="form-control form-control-lg" />

                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example27">Password</label>
                      <input type="password" name="password" class="form-control form-control-lg" />

                    </div>

                    <div class="button pt-1 mb-4">
                      <button class="btn btn-lg btn-block" type="submit" name="Login">
                        Sign in
                      </button>
                    </div>


                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
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
      echo '<script type="text/javascript">';
      echo 'Swal.fire({
          icon: "success",
          title: "Identity Confirmed!",  
          text: "You have successfully logged in.", 
          confirmButtonText: "OK",
          customClass: {
              confirmButton: "my-confirm-button-class"
          },
          focusCancel: true
      
      }).then(function() {
          window.location.href = "webpage/suggestion.php";
      });';


      echo '</script>';
    } else {
      echo '<script type = "text/javascript">';
      echo 'Swal.fire({
        icon: "error",
        title: "Login Failed", 
    text: "Invalid username or password. Please try again.",
        
        confirmButtonText: "Try Again",
        customClass: {
          confirmButton: "my-confirm-button-class"
      },
    }).then(function() {
         
    });';
      echo '</script>';
    }
  }

  ?>

</body>

</html>