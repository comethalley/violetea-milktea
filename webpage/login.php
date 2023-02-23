<html>
<head>
<title>JCMPSHS | Login</title>
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="center">
    <br>
	  <center><a href=""><img src="img/jcmpshs-logo2.png" id="logo" height="100" width="100"></a></center>
      <h1>Login</h1>
      <form action="../webpage/functions/login-function.php" method="POST">
        <div class="txt_field">
          <input type="text" name = "user" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name = "pass" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Don't have an account? <a href="sign-up.php">Sign up</a>
        </div>
      </form>
    </div>

</body>
</html>