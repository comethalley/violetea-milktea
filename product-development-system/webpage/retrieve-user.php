<?php

	session_start();
	if($_SESSION['username']){
		echo "Welcome" . $_SESSION["username"];
	}else{
		header("location: ../index.php");
	}


	include_once '../webpage/includes/db-connection.php';
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from tbl_feedback where id='$id'");
	$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Archive Users</title>
	<style>
		body {
			background-color: rgb(165, 93, 224);
		}
		form {
			max-width: 500px;
			margin: 0 auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
		}
		label {
			display: block;
			margin-bottom: 10px;
			font-weight: bold;
			color: #333;
		}
		input[type="text"], textarea {
			display: block;
			box-sizing: border-box;
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: 1px solid #ccc;
			margin-bottom: 20px;
		}
		input[type="submit"] {
			background-color: #6641b5;
			color: #fff;
			padding: 10px 20px;
			border-radius: 5px;
			border: none;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #5a3999;
		}
		h2{
			color: white;	
		}
	</style>
</head>
<body>
	<h2>Are you sure you want to retrieve this suggestion?</h2>
	<form method="POST" action="../webpage/includes/retrieve-function-user.php?id=<?php echo $id; ?>">
		<label>Username:</label>
		<input type="text" value="<?php echo $row['username']; ?>" name="username" readonly>
        
        <label>Subject:</label>
        <input type="text" value="<?php echo $row['subject']; ?>" name="subject" readonly>
        
        <label>Body:</label>
        <textarea name="body" readonly><?php echo $row['body']; ?></textarea>
		
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
