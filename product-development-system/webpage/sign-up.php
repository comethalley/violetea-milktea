<html>
<head>
<title>PDIS | Sign-up</title>
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<div class="center">
  <br>
	  <center><a href=""><img src="img/violet.png" height="100" width="100"></a></center>
      <h1>Sign up</h1>
      <form action="includes/login-function.php" method="POST">
	        <div class="txt_field">
            <input type="text" name ="firstname" required>
            <span></span>
            <label>Firstname</label>
          </div>
          
        <div class="txt_field">
          <input type="text" name ="lastname" required>
          <span></span>
          <label>Lastname</label>
        </div>  
        
        <div class="txt_field">
          <input type="text" name ="username" required>
          <span></span>
          <label>Username</label>
        </div>

        <div class="txt_field">
          <input type="password" name ="password" required>
          <span></span>
          <label>Password</label>
        </div>

        <input type="submit" value="Sign up">
        <div class="signup_link">
          Have an account? <a href="../index.php">Log in</a>
        </div>
      </form>
    </div>
</body>
</html>