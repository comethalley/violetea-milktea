<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDIS | Archives</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<body style="background-color: whitesmoke;">
	<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="suggestion.php">Violetea</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="suggestion.php">Suggestion </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ingredient.php">Ingredients</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="product-concept.php">Concept Products</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="analysis-report.php">Analysis Report</a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="retrieve.php">Archives<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<?php
    if($_SESSION['username']){
		echo "Welcome " . $_SESSION["username"];
	}else{
		header("location: ../index.php");
	}
?>
    <!--Suggestions table-->
	<div class="container">
            <div class="card">
                <h2> Suggestions </h2>
            </div>

            <div class="card">
                <div class="card-body">

                    <?php
                include_once '../webpage/includes/db-connection.php';

                $query = "select * from `tbl_feedback` where archive ='true'";
                $query_run = mysqli_query($conn, $query);
            ?>
                    <table id="datatableid" class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Subject </th>
                                <th scope="col">Body</th>
                                <th scope="col"> RETRIEVE </th>
                            </tr>
                        </thead>
						<tbody>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                            <tr>
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['username']; ?> </td>
                                <td> <?php echo $row['subject']; ?> </td>
                                <td> <?php echo $row['body']; ?> </td>
                                <td>
                                    <button type="button" class="btn btn-success retrievebtn"> RETRIEVE </button>
                                </td>
                            </tr>
                        <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
			            </tbody>
                    </table>
                </div>
            </div>
    </div><br><br>

    <!--Research table-->
	<div class="container">
            <div class="card">
                <h2> Research Paper </h2>
            </div>
            <div class="card">
                <div class="card-body">

                    <?php
                include_once '../webpage/includes/db-connection.php';

                $query = "select * from `tbl_research` where archive ='true'";
                $query_run = mysqli_query($conn, $query);
            ?>
                    <table id="researchtableid" class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Introduction </th>
                                <th scope="col">Trends</th>
                                <th scope="col"> Conclusion </th>
                                <th scope="col"> RETRIEVE </th>
                            </tr>
                        </thead>
						<tbody>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                            <tr>
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['title']; ?> </td>
                                <td> <?php echo $row['introduction']; ?> </td>
                                <td> <?php echo $row['trends']; ?> </td>
                                <td> <?php echo $row['conclusion']; ?> </td>
                                <td>
                                    <button type="button" class="btn btn-danger retrievebtn2"> RETRIEVE</button>
                                </td>
                            </tr>
                        <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
						</tbody>
                    </table>
                </div>
            </div>

    </div>

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
    <div class="container">
            <div class="card">
                <h2>Ingredient</h2>
            </div>

            <div class="card">
                <div class="card-body">

                    <?php
                include_once '../webpage/includes/db-connection.php';

                $query = "SELECT * FROM tbl_ingredient WHERE archive = 'true'";
                $query_run = mysqli_query($conn, $query);
            ?>
                    <table id="datatableid" class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Ingredient</th>
								<th scope="col">Research ID</th>
                                <th scope="col"> Archive </th>
                            </tr>
                        </thead>
						<tbody>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                            <tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['description']; ?></td>
							<td><?php echo $row['ingredient']; ?></td>
                            <td><?php echo $row['researchID']; ?></td>
                            <td>
                                <button type="button" class="btn btn-success retrievebtn3"> RETRIEVE </button>
                            </td>
                            </tr>
                        <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
			            </tbody>
                    </table>
                </div>
            </div>
    </div>

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

	<!-- RETRIEVE USER POP UP FORM -->
    <div class="modal fade" id="retrievemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Archive Suggestion Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../webpage/includes/retrieve-function-user.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="user_id" id="user_id">
						<h4> Do you want to retrieve this data?</h4>
                        <div class="form-group">
                            <label> Username </label>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="Username">
                        </div>

                        <div class="form-group">
                            <label> Subject </label>
                            <input type="text" name="subject" id="subject" class="form-control"
                                placeholder="Subject">
                        </div>

                        <div class="form-group">
                            <label> Body </label>
                            <input type="text" name="subject" id="body" class="form-control"
                                placeholder="Body">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">YES</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- RETRIEVE RESEARCH POP UP FORM -->
    <div class="modal fade" id="retrievemodal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Retrieve Research Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../webpage/includes/retrieve-function-research.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="archive_id" id="archive_id">
						<h4> Do you want to retrieve this data?</h4>
                        <div class="form-group">
                            <label> Title </label>
                            <input type="text" name="archive_title" id="archive_title" class="form-control"
                                placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label> Introduction </label>
                            <input type="text" name="archive_introduction" id="archive_introduction" class="form-control"
                                placeholder="Enter Introduction">
                        </div>

                        <div class="form-group">
							<label>Trends</label>
								<select id="trends" name="archive_trends" id="archive_trend">
  								<option value="social_media">Social Media</option>
  								<option value="online_forum">Online Forum</option>
  								<option value="customer_survey">Customer Survey</option>
							</select>
                        </div>

                        <div class="form-group">
                            <label> Conclusion </label>
                            <input type="text" name="archive_conclusion" id="archive_conclusion" class="form-control"
                                placeholder="Enter Phone Number">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">YES</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!--RETRIEVE INGREDIENT FORM-->
	<div class="modal fade" id="retrievemodal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Archive Suggestion Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../webpage/includes/retrieve-function-ingredient.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="ingredient_id" id="ingredient_id">
						<h4> Do you want to archive this data?</h4>
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="ingredient_name" id="ingredient_name" class="form-control"
                                placeholder="Enter Product Name">
                        </div>

                        <div class="form-group">
                            <label> Description </label>
                            <input type="text" name="ingredient_description" id="ingredient_description" class="form-control"
                                placeholder="Enter Introduction">
                        </div>

                        <div class="form-group">
                            <label> Ingredient </label>
                            <input type="text" name="ingredient_ingredient" id="ingredient_ingredient" class="form-control"
                                placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group">
                            <label> Research ID </label>
                            <input type="text" name="ingredient_researchID" id="ingredient_researchID" class="form-control"
                                placeholder="Enter Phone Number" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">YES</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

	<script>
        $(document).ready(function () {

            $('.viewbtn').on('click', function () {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to suggestion.php
                    type: "GET",
                    url: "suggestion.php",
                    dataType: "html", //expect html to be returned                
                    success: function (response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script>


    <script>
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });

        });
    </script>

	<script>
        $(document).ready(function () {

            $('#researchtableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });

        });
    </script>

    <!--Retrieve researchs-->
	<script>
        $(document).ready(function () {

            $('body').on("click", ".retrievebtn2", function(event) {

                $('#retrievemodal2').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#archive_id').val(data[0]);
                $('#archive_title').val(data[1]);
                $('#archive_introduction').val(data[2]);
                $('#archive_trend').val(data[3]);
                $('#archive_conclusion').val(data[4]);
            });
        });
    </script>

    <!--Retrieve user suggestions-->
	<script>
        $(document).ready(function () {

            $('body').on("click", ".retrievebtn", function(event) {

                $('#retrievemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#user_id').val(data[0]);
                $('#username').val(data[1]);
                $('#subject').val(data[2]);
                $('#body').val(data[3]);
            });
        });
    </script>

    <!--Retrieve ingredient function-->
	<script>
        $(document).ready(function () {

            $('.retrievebtn3').on('click', function () {

                $('#retrievemodal3').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#ingredient_id').val(data[0]);
				$('#ingredient_name').val(data[1]);
                $('#ingredient_description').val(data[2]);
                $('#ingredient_ingredient').val(data[3]);
                $('#ingredient_researchID').val(data[4]);
            });
        });
    </script>

</body>
</html>