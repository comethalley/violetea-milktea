<?php
    session_start();
    if($_SESSION['username']){
		echo "Welcome" . $_SESSION["username"];
	}else{
		header("location: ../index.php");
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDIS | Suggestions</title>
	<link rel="stylesheet" type="text/css" href="css/product-concept.css">
</head>
<body>
	<!--Navbar-->
<div class="topnav" id="myTopnav">
	<a href = "logout.php">Logout</a>
    <a href="retrieve.php">Archives</a>
	<a href="analysis-report.php">Analysis Report</a>
	<a href="product-concept.php">Concept Product</a>
	<a href="S2_index.php">Ingredients</a>
	<a href="suggestion.php">Suggestion</a>
</div>
    <!--Suggestions table-->
    <h1>Suggestions</h1>
	<div>
		<table border="1">
			<thead>
				<th>ID</th>
				<th>Username</th>
                <th>Subject</th>
                <th>Body</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					include_once '../webpage/includes/db-connection.php';
					$query=mysqli_query($conn,"select * from `tbl_feedback` where archive ='true'");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
                            <td><?php echo $row['id']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['body']; ?></td>
							<td>
                                <a href="#" onClick="MyWindow=window.open('retrieve-user.php?id=<?php echo $row['id']; ?>','MyWindow','location=0,width=600,height=300,left=400,top=60'); return false;">Retrieve</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
    <br><br>

    <!--Research table-->
    <h1>Research</h1>
    <div>
		<table border="1">
			<thead>
				<th>ID</th>
				<th>Title</th>
                <th>Introduction</th>
				<th>Trends</th>
                <th>Conclusion</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					include_once '../webpage/includes/db-connection.php';
					$query=mysqli_query($conn,"select * from `tbl_research` where archive ='true'");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
                            <td><?php echo $row['id']; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['introduction']; ?></td>
							<td><?php echo $row['trends']; ?></td>
                            <td><?php echo $row['conclusion']; ?></td>
							<td>
								<a href="#" onClick="MyWindow=window.open('retrieve-research.php?id=<?php echo $row['id']; ?>','MyWindow','location=0,width=600,height=300,left=400,top=60'); return false;">Retrieve</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
    <br>

    <!--Ingredient Table-->
    <h1>Ingredient</h1>
    <div>
		<table border="1">
			<thead>
				<th>ID</th>
				<th>Product Name</th>
                <th>Description</th>
				<th>Ingredient</th>
                <th>Research ID</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					include_once '../webpage/includes/db-connection.php';
					$query=mysqli_query($conn,"SELECT * FROM tbl_ingredient WHERE archive = 'true'");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
                            <td><?php echo $row['id']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['description']; ?></td>
							<td><?php echo $row['ingredient']; ?></td>
                            <td><?php echo $row['researchID']; ?></td>
							<td>
								<a href="#" onClick="MyWindow=window.open('retrieve-ingredient.php?id=<?php echo $row['id']; ?>','MyWindow','location=0,width=600,height=300,left=400,top=60'); return false;">Retrieve</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
    <br>

    <!--Concept Product-->
    <h1>Product Concept</h1>
    <div>
		<table border="1">
			<thead>
                <th>ID</th>
				<th>Product Name</th>
				<th>Image</th>
                <!--<th>Packaging</th>-->
				<th>IngredientID</th>
				<th>Actions</th>
			</thead>
			<tbody>
				<?php
					include_once '../webpage/includes/db-connection.php';
					$query=mysqli_query($conn,"SELECT * FROM tbl_ingredient INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID WHERE tbl_concept.archive='true'");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
                            <td><?php echo $row['id']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><img src="../webpage/uploads/<?php echo $row['image']; ?>" alt="image.jpg" width="100px" height="100px"></td>
							<!--<td><img src="../webpage/uploads/<?php echo $row['packaging']; ?>" alt="packaging.jpg" width="100px" height="100px"></td>-->
							<td><?php echo $row['ingredientID']; ?></td>
							<td>
								<a href="#" onClick="MyWindow=window.open('retrieve-product-concept.php?id=<?php echo $row['id']; ?>','MyWindow','location=0,width=600,height=300,left=400,top=60'); return false;">Retrieve</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
    <br><br>

    <!--Analysis Report-->
    <h1>Survey Report</h1>
	<div>
		<table border="1">
			<thead>
				<th>ID</th>
				<th>Username</th>
                <th>Timestamp</th>
				<th>Product Name</th>
                <th>Concept ID</th>
				<th></th>
			</thead>
			<tbody>
				<?php
					include_once '../webpage/includes/db-connection.php';
					$query=mysqli_query($conn,"SELECT * FROM tbl_ingredient 
					INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID
					INNER JOIN tbl_survey ON tbl_concept.id = tbl_survey.conceptID WHERE tbl_survey.archive='true'");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
                            <td><?php echo $row['id']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['timestamp']; ?></td>
							<td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['conceptID']; ?></td>
							<td>
							<a href="retrieve-report.php?id=<?php echo $row['id'];?>">Retrieve</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
    <br><br>

</body>
</html>