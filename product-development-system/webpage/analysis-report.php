<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDIS | Report</title>
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
	  <li class="nav-item active">
        <a class="nav-link" href="analysis-report.php">Analysis Report<span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Archives
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<a class="dropdown-item" href="retrieve-user.php">Suggestions</a>
          	<a class="dropdown-item" href="retrieve-research.php">Research</a>
          	<a class="dropdown-item" href="retrieve-ingredient.php">Ingredient</a>
          	<a class="dropdown-item" href="retrieve-product-concept.php">Product Concept</a>
          	<a class="dropdown-item" href="retrieve-report.php">Survey Report</a>
          	<div class="dropdown-divider"></div>
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
		echo "Welcome" . $_SESSION["username"];
	}else{
		header("location: ../index.php");
	}
?>

<!--<h1>Survey Report</h1>
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
					INNER JOIN tbl_survey ON tbl_concept.id = tbl_survey.conceptID WHERE tbl_survey.archive='false'");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
                            <td><?php echo $row['id']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['timestamp']; ?></td>
							<td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['conceptID']; ?></td>
							<td>
							<a href="archive-report.php?id=<?php echo $row['id'];?>">Archive</a>
                            <a href="analysis-report-chart.php?conceptID=<?php echo $row['conceptID'];?>">See Report</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>-->
    <br><br>
	<div class="container">
            <div class="card">
                <h2>Survey Report</h2>
            </div>

            <div class="card">
                <div class="card-body">

                    <?php
                include_once '../webpage/includes/db-connection.php';

                $query = "SELECT * FROM tbl_ingredient 
                INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID
                INNER JOIN tbl_survey ON tbl_concept.id = tbl_survey.conceptID WHERE tbl_survey.archive='false'";
                $query_run = mysqli_query($conn, $query);
            ?>
                    <table id="datatableid" class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Timestamp </th>
                                <th scope="col">Product Name</th>
								<th scope="col">Concept ID</th>
                                <th scope="col"> Archive </th>
								<th scope="col"> Report </th>
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
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['timestamp']; ?></td>
							<td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['conceptID']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-danger archivebtn"> ARCHIVE </button>
                                </td>
								<td><!--<a href="analysis-report-chart.php?conceptID=<?php echo $row['conceptID'];?>">See Report</a>-->
                                <button type="button" data-id='<?php echo $row['conceptID']; ?>' class="btn btn-success editbtn"> See Report </button>
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

    <!-- Survey Report Modal -->
	 <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Survey Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>


	<!--Archive Survey-->
	<div class="modal fade" id="archivemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Archive Survey Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="../webpage/includes/archive-survey-function.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="user_id" id="user_id">
						<h4> Do you want to archive this data?</h4>
                        <div class="form-group">
                            <label> Username </label>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="Username">
                        </div>

                        <div class="form-group">
                            <label> Timestamp </label>
                            <input type="text" name="timestamp" id="timestamp" class="form-control"
                                placeholder="Subject">
                        </div>

                        <div class="form-group">
                            <label> ConceptID </label>
                            <input type="text" name="conceptID" id="conceptID" class="form-control"
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

            $('body').on("click", ".archivebtn", function(event) {

                $('#archivemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#user_id').val(data[0]);
				$('#username').val(data[1]);
                $('#timestamp').val(data[2]);
                $('#conceptID').val(data[3]);
            });
        });
    </script>

    <script type='text/javascript'>
        $(document).ready(function(){
            $('body').on("click", ".editbtn", function(event){
                    var conceptID = $(this).data('id');
                    $.ajax(
                        {
                            url: 'analysis-report-chart.php',
                            type: 'post',
                            data: {conceptID: conceptID},
                            success: function(response){
                                $('.modal-body').html(response);
                                $('#editmodal').modal('show');
                            }
                        }
                    )
                });
            });
    </script>
</body>
</html>