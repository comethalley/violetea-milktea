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
    <link rel="stylesheet" href="./css/suggestion.css">
    <script src="https://kit.fontawesome.com/a1366662c0.js" crossorigin="anonymous"></script>
</head>
<?php
if ($_SESSION['username']) {
    $username = $_SESSION['username'];
} else {
    header("location: ../index.php");
}
?>

<body style="background-color: whitesmoke;">
    <!--Navbar-->
    <div class="navbar navbar-expand-lg navbar-light    ">
        <a class="navbar-brand" href="#">Product Development </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hi, <?php echo $username; ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="logout.php" class="dropdown-item" type="button">Logout</a>

                        </div>
                    </div>

                </ul>

            </form>
        </div>
    </div>
    <main>
        <div class="container ">
            <div class="cont-left">
                <nav>
                    <ul class="">
                        <li class="">
                            <i class="fa-solid fa-clipboard" style="color: #b8b8b8;"></i> <a class="" href="suggestion.php">Suggestion <span class="sr-only">(current)</span></a>
                        </li>
                        <div class="line"></div>
                        <li class="">
                            <i class="fa-solid fa-flask" style="color: #b8b8b8;"></i> <a class="" href="ingredient.php">Ingredients</a>
                        </li>
                        <div class="line"></div>
                        <li class="">
                            <i class="fa-brands fa-product-hunt" style="color: #b8b8b8;"></i> <a class="" href="product-concept.php">Concept Products</a>
                        </li>
                        <div class="line"></div>
                        <li class="">
                            <i class="fa-solid fa-chart-simple" style="color: #b8b8b8;"></i> <a class="" href="analysis-report.php">Analysis Report</a>
                        </li>
                        <div class="line"></div>
                        <li class="">
                            <i class="fa-solid fa-box-archive" style="color: #b8b8b8;"></i> <a class="" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">
                                Archive


                            </a>
                        </li>
                        <div class="row">
                            <div class="col">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                    <div class="box-card card-body">
                                        <a href="retrieve-user.php">Suggestions</a>
                                    </div>
                                    <div class="box-card card-body">
                                        <a href="retrieve-research.php">Research</a>
                                    </div>
                                    <div class="box-card card-body">
                                        <a href="retrieve-ingredient.php">Ingredient</a>
                                    </div>
                                    <div class="box-card card-body">
                                        <a href="retrieve-product-concept.php">Product Concept</a>
                                    </div>
                                    <div class="box-card card-body">
                                        <a href="retrieve-report.php">Survey Report</a>
                                    </div>
                                    <div class="box-card card-body">
                                        <a href="rejected-product.php">Rejected Products</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <li class="nav-item dropdown">
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
      </li> -->


                        <div class="line"></div>
                    </ul>
                </nav>
            </div>
            <div class="cont-right">
                <div class="card">
                    <div class="card-body">
                        <label>Analysis Report</label>
                    </div>
                </div>
                <div class="accordion " id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Table 1
                                </button>
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Table 2
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="container">

                                    <div class="card">
                                        <div class="card-body">

                                            <?php
                                            include_once '../webpage/includes/db-connection.php';

                                            $query = "SELECT * FROM tbl_ingredient 
                INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID
                INNER JOIN tbl_survey ON tbl_concept.id = tbl_survey.conceptID WHERE tbl_survey.archive='false'";
                                            $query_run = mysqli_query($conn, $query);
                                            ?>
                                            <table id="datatableid" class="table table-striped table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"> ID</th>
                                                        <th scope="col">Username</th>
                                                        <th scope="col">Timestamp </th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Concept ID</th>
                                                        <th scope="col"> Archive </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($query_run) {
                                                        foreach ($query_run as $row) {
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $row['id']; ?></td>
                                                                <td><?php echo $row['username']; ?></td>
                                                                <td><?php echo $row['timestamp']; ?></td>
                                                                <td><?php echo $row['name']; ?></td>
                                                                <td><?php echo $row['conceptID']; ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger archivebtn archive"><i class="fa-solid fa-box-archive" style="color: #ffffff;"></i> Archive </button>
                                                                </td>
                                                                <td><!--<a href="analysis-report-chart.php?conceptID=<?php echo $row['conceptID']; ?>">See Report</a>-->
                                                                    <!--<button type="button" data-id='<?php echo $row['conceptID']; ?>' class="btn btn-success editbtn"> See Report </button>-->
                                                                </td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No Record Found";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">


                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">

                                <div class="container">

                                    <div class="card">
                                        <div class="card-body">


                                            <?php
                                            include_once '../webpage/includes/db-connection.php';

                                            $query = "SELECT * FROM tbl_ingredient INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID WHERE tbl_concept.archive='false' AND tbl_concept.isRejected='false'";
                                            $query_run = mysqli_query($conn, $query);
                                            ?>
                                            <table id="datatableid" class="table table-striped table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"> ID</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Image 1</th>
                                                        <th scope="col">Image 2</th>
                                                        <th scope="col">Image 3</th>
                                                        <th scope="col"> Report </th>
                                                        <th scope="col"> Add </th>
                                                        <th scope="col"> Reject </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($query_run) {
                                                        foreach ($query_run as $row) {
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $row['id']; ?></td>
                                                                <td><?php echo $row['name']; ?></td>
                                                                <td><img src="../../admin/productimages/uploads/<?php echo $row['image']; ?>" alt="image.jpg" width="100px" height="100px"></td>
                                                                <td><img src="../../admin/productimages/uploads/<?php echo $row['image2']; ?>" alt="image.jpg" width="100px" height="100px"></td>
                                                                <td><img src="../../admin/productimages/uploads/<?php echo $row['image3']; ?>" alt="image.jpg" width="100px" height="100px"></td>
                                                                <td><!--<a href="analysis-report-chart.php?conceptID=<?php echo $row['conceptID']; ?>">See Report</a>-->
                                                                    <button type="button" data-id='<?php echo $row['id']; ?>' class="btn btn-success editbtn"> See Report </button>
                                                                </td>
                                                                <td><!--<a href="analysis-report-chart.php?conceptID=<?php echo $row['conceptID']; ?>">See Report</a>-->
                                                                    <button type="button" data-id='<?php echo $row['id']; ?>' class="btn btn-primary addbtn"> Add to Inventory</button>
                                                                </td>
                                                                <td>
                                                                    <button type="button" data-id='<?php echo $row['id']; ?>' class="btn btn-danger rejectbtn"> Reject</button>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "No Record Found";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>


            </div>
        </div>



    </main>

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
                $query = mysqli_query($conn, "SELECT * FROM tbl_ingredient 
					INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID
					INNER JOIN tbl_survey ON tbl_concept.id = tbl_survey.conceptID WHERE tbl_survey.archive='false'");
                while ($row = mysqli_fetch_array($query)) {
                ?>
						<tr>
                            <td><?php echo $row['id']; ?></td>
							<td><?php echo $row['username']; ?></td>
							<td><?php echo $row['timestamp']; ?></td>
							<td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['conceptID']; ?></td>
							<td>
							<a href="archive-report.php?id=<?php echo $row['id']; ?>">Archive</a>
                            <a href="analysis-report-chart.php?conceptID=<?php echo $row['conceptID']; ?>">See Report</a>
							</td>
						</tr>
						<?php
                    }
                        ?>
			</tbody>
		</table>
	</div>-->



    <!-- Survey Report Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Survey Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body">
                </div>
            </div>
        </div>
    </div>


    <!--Archive Survey-->
    <div class="modal fade" id="archivemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>

                        <div class="form-group">
                            <label> Timestamp </label>
                            <input type="text" name="timestamp" id="timestamp" class="form-control" placeholder="Subject">
                        </div>

                        <div class="form-group">
                            <label> ConceptID </label>
                            <input type="text" name="conceptID" id="conceptID" class="form-control" placeholder="Body">
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

    <!-- EDIT POP UP FORM -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Product Concept Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>

    <!-- REJECT POP UP FORM -->
    <div class="modal fade" id="rejectmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Reject Product </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="reject-modal-body"></div>
            </div>
        </div>
    </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {

            $('.viewbtn').on('click', function() {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to suggestion.php
                    type: "GET",
                    url: "suggestion.php",
                    dataType: "html", //expect html to be returned                
                    success: function(response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script>


    <script>
        $(document).ready(function() {

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
        $(document).ready(function() {

            $('body').on("click", ".archivebtn", function(event) {

                $('#archivemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
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

   <!--Survey Report Modal-->
<script type='text/javascript'>
$(document).ready(function() {
    $('body').on("click", ".editbtn", function(event) {
        var id = $(this).data('id');
        $.ajax({
            url: 'analysis-report-chart.php',
            type: 'post',
            data: {
                id: id
            },
            success: function(response) {
                $('#modal-body').html(response);
                $('#editmodal').modal('show');
                
                // Delay the rendering of the charts until the modal is fully displayed
                $('#editmodal').on('shown.bs.modal', function () {
                    google.charts.load('current', {'packages':['corechart', 'bar']});
                    google.charts.setOnLoadCallback(response1Chart);
                    google.charts.setOnLoadCallback(response2Chart);
                    google.charts.setOnLoadCallback(response3Chart);
                });
            }
        })
    });

    // reload the page when the modal is closed
    $('#editmodal').on('hidden.bs.modal', function () {        
        location.reload(); // Reload the page
    });
});
</script>

    <!--Add modal-->
    <script type='text/javascript'>
        $(document).ready(function() {
            $('body').on("click", ".addbtn", function(event) {
                var id = $(this).data('id');
                $.ajax({
                    url: 'add-inventory.php',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        $('.modal-body').html(response);
                        $('#editmodal').modal('show');
                    }
                })
            });
        });
    </script>

    <!--Reject modal function-->
	<script>
        $(document).ready(function(){
            $('body').on("click", ".rejectbtn", function(event){
                    var id = $(this).data('id');
                    $.ajax(
                        {
                            url: 'reject-product.php',
                            type: 'post',
                            data: {id: id},
                            success: function(response){
                                $('#reject-modal-body').html(response);
                                $('#rejectmodal').modal('show');
                            }
                        }
                    )
                });
            });
    </script>
</body>

</html>