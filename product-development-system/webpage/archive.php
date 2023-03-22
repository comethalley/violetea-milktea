<?php
		session_start();
		if($_SESSION['username']){
			echo "Welcome" . $_SESSION["username"];
		}else{
			header("location: ../index.php");
		}

	include_once '../webpage/includes/db-connection.php';
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from tbl_research where id='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Archive Research</title>
<link rel="stylesheet" type="text/css" href="css/archive.css">
</head>
<body>
	<h2>Archive</h2>
	<form method="POST" action="../webpage/includes/archive-function.php?id=<?php echo $id; ?>">
		<label>Title:</label><input type="text" value="<?php echo $row['title']; ?>" name="title" readonly>
        <label>Introduction:</label><input type="text" value="<?php echo $row['introduction']; ?>" name="introduction" readonly>
        <label>Conclusion:</label><input type="text" value="<?php echo $row['conclusion']; ?>" name="conclusion" readonly>
		<input type="submit" name="submit">
	</form>
</body>
</html>