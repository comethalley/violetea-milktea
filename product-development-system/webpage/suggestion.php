<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDIS | Suggestions</title>
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
      <li class="nav-item active">
        <a class="nav-link" href="suggestion.php">Suggestion <span class="sr-only">(current)</span></a>
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
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Archives
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="retrieve.php">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
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
<br><br>
    <!--Suggestions table
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
					$query=mysqli_query($conn,"select * from `tbl_feedback` where archive ='false'");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
                            <td><?php echo $row['id']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['body']; ?></td>
							<td>
                                <a href="#" onClick="MyWindow=window.open('archive-user.php?id=<?php echo $row['id']; ?>','MyWindow','location=0,width=600,height=300,left=400,top=60'); return false;">Archive</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
    <br><br>-->

	<div class="container">
            <div class="card">
                <h2> Suggestions </h2>
            </div>

            <div class="card">
                <div class="card-body">

                    <?php
                include_once '../webpage/includes/db-connection.php';

                $query = "SELECT * FROM tbl_feedback WHERE archive ='false'";
                $query_run = mysqli_query($conn, $query);
            ?>
                    <table id="datatableid" class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Subject </th>
                                <th scope="col">Body</th>
                                <th scope="col"> ARCHIVE </th>
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
                                    <button type="button" class="btn btn-danger userbtn"> ARCHIVE </button>
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

    <!--Research table
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
					$query=mysqli_query($conn,"select * from `tbl_research` where archive ='false'");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
                            <td><?php echo $row['id']; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['introduction']; ?></td>
							<td><?php echo $row['trends']; ?></td>
                            <td><?php echo $row['conclusion']; ?></td>
							<td>
								<a href="#" onClick="MyWindow=window.open('edit.php?id=<?php echo $row['id']; ?>','MyWindow','location=0,width=600,height=300,left=400,top=60'); return false;">Edit</a>
								<a href="#" onClick="MyWindow=window.open('archive.php?id=<?php echo $row['id']; ?>','MyWindow','location=0,width=600,height=300,left=400,top=60'); return false;">Archive</a>
								<a href="S2_create.php?id=<?php echo $row['id'];?>">Proceed to Step 2</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
    <br>-->

	<div class="container">
            <div class="card">
                <h2> Research Paper </h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                        Add Research
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <?php
                include_once '../webpage/includes/db-connection.php';

                $query = "SELECT * FROM tbl_research WHERE archive ='false'";
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
                                <th scope="col"> EDIT </th>
                                <th scope="col"> ARCHIVE </th>
								<th scope="col"> NEXT STEP </th>
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
                                    <button type="button" class="btn btn-success editbtn"> EDIT </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger archivebtn"> ARCHIVE </button>
                                </td>
								<td><a href="S2_create.php?id=<?php echo $row['id'];?>">Proceed to Step 2</a></td>
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

	<!--Form for adding title
    <div>
		<form method="POST" action="../webpage/includes/add.php">
			<label>Title:</label><input type="text" name="title">
			<label>Introduction:</label><input type="text" name="introduction">
			<label>Trends</label>
			<select id="trends" name="trends">
  				<option value="social_media">Social Media</option>
  				<option value="online_forum">Online Forum</option>
  				<option value="customer_survey">Customer Survey</option>
			</select>
            <label>Conclusion:</label><input type="text" name="conclusion">
			<input type="submit" name="add">
		</form>
    </div>-->

	<!--ADD Modal -->
	<div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Research Paper</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../webpage/includes/add.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Title: </label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label> Introduction </label>
                            <input type="text" name="introduction" class="form-control" placeholder="Enter Introduction">
                        </div>

                        <div class="form-group">
							<label>Trends</label>
								<select id="trends" name="trends">
  								<option value="social_media">Social Media</option>
  								<option value="online_forum">Online Forum</option>
  								<option value="customer_survey">Customer Survey</option>
							</select>
                        </div>

                        <div class="form-group">
                            <label> Conclusion </label>
                            <input type="text" name="conclusion" class="form-control" placeholder="Enter Conclusion">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

	 <!-- VIEW RESEARCH POP UP FORM-->
	 <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> View Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="view_id" id="view_id">

                        <div class="form-group">
                            <label> Title </label>
                            <input type="text" name="title" id="view_title" class="form-control"
                                placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label> Introduction </label>
                            <input type="text" name="introduction" id="view_introduction" class="form-control"
                                placeholder="Enter Introduction">
                        </div>

                        <div class="form-group">
							<label>Trends</label>
								<select id="trends" name="trends" id="view_trend">
  								<option value="social_media">Social Media</option>
  								<option value="online_forum">Online Forum</option>
  								<option value="customer_survey">Customer Survey</option>
							</select>
                        </div>

                        <div class="form-group">
                            <label> Conclusion </label>
                            <input type="text" name="conclusion" id="view_conclusion" class="form-control"
                                placeholder="Enter Phone Number">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

	 <!-- EDIT POP UP FORM -->
	 <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Research Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="update.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="edit_id" id="edit_id">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label> Introduction </label>
                            <input type="text" name="introduction" id="introduction" class="form-control"
                                placeholder="Enter Introduction">
                        </div>

                        <div class="form-group">
							<label>Trends</label>
								<select id="trends" name="trends" id="trend">
  								<option value="social_media">Social Media</option>
  								<option value="online_forum">Online Forum</option>
  								<option value="customer_survey">Customer Survey</option>
							</select>
                        </div>

                        <div class="form-group">
                            <label> Conclusion </label>
                            <input type="text" name="conclusion" id="conclusion" class="form-control"
                                placeholder="Enter Phone Number">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

	<!-- ARCHIVE USER POP UP FORM -->
    <div class="modal fade" id="archivemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Archive Suggestion Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../webpage/includes/archive-user-function.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="user_id" id="user_id">
						<h4> Do you want to archive this data?</h4>
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

	<!-- ARCHIVE RESEARCH POP UP FORM -->
    <div class="modal fade" id="archivemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Archive Research Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../webpage/includes/archive-function.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="archive_id" id="archive_id">
						<h4> Do you want to archive this data?</h4>
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

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#edit_id').val(data[0]);
                $('#title').val(data[1]);
                $('#introduction').val(data[2]);
                $('#trend').val(data[3]);
                $('#conclusion').val(data[4]);
            });
        });
    </script>

	<script>
        $(document).ready(function () {

            $('.archivebtn').on('click', function () {

                $('#archivemodal').modal('show');

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

	<script>
        $(document).ready(function () {

            $('.userbtn').on('click', function () {

                $('#archivemodal').modal('show');

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

</body>
</html>