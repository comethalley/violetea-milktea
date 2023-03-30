<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDIS | Ingredients</title>
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
<body >
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
                        <i class="fa-solid fa-chart-simple" style="color: #b8b8b8;"></i> <a class="" href="product-concept.php">Analysis Report</a>
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
                                      <label>Product Ingredients</label>
                                    </div>
                                </div>
            <div class="container">
          

            <div class="card">
                  
                                  
                                
                <div class="card-body">

                    <?php
                include_once '../webpage/includes/db-connection.php';

                $query = "SELECT * FROM tbl_ingredient WHERE archive = 'false'";
                $query_run = mysqli_query($conn, $query);
            ?>
                    <table id="datatableid" class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Ingredient</th>
								<th scope="col">Research ID</th>
                                <th scope="col"> Edit </th>
                                <th scope="col"> Archive </th>
								<th scope="col"> Next Step </th>
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
                                <button type="button" class="btn btn-success editbtn editbtn"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i> Edit</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger archivebtn archive"><i class="fa-solid fa-box-archive" style="color: #ffffff;"></i> Archive </button>
                            </td>
								<td><button type="button" data-id='<?php echo $row['id']; ?>' class="btn btn-success nextbtn archive">Next Step </button>
                                    <!--<a href="product-concept-upload.php?id=<?php echo $row['id']; ?>">Proceed to Step 3</a>--></td>
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

            </div>
        </div>
     
         
 
    </main>

	

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

                <form action="S2_update.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="edit_id" id="edit_id">

                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Enter Product Name">
                        </div>

                        <div class="form-group">
                            <label> Description </label>
                            <input type="text" name="description" id="description" class="form-control"
                                placeholder="Enter Introduction">
                        </div>

                        <div class="form-group">
                            <label> Ingredient </label>
                            <input type="text" name="ingredient" id="ingredient" class="form-control"
                                placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group">
                            <label> Research ID </label>
                            <input type="text" name="researchID" id="researchID" class="form-control"
                                placeholder="Enter Phone Number" readonly>
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

	<!--Archive Ingredient-->
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

                <form action="S2_delete.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="archive_id" id="archive_id">
						<h4> Do you want to archive this data?</h4>
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="archive_name" id="archive_name" class="form-control"
                                placeholder="Enter Product Name">
                        </div>

                        <div class="form-group">
                            <label> Description </label>
                            <input type="text" name="archive_description" id="archive_description" class="form-control"
                                placeholder="Enter Introduction">
                        </div>

                        <div class="form-group">
                            <label> Ingredient </label>
                            <input type="text" name="archive_ingredient" id="archive_ingredient" class="form-control"
                                placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group">
                            <label> Research ID </label>
                            <input type="text" name="archive_researchID" id="archive_researchID" class="form-control"
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

    <!-- NEXT STEP POP UP FORM -->
    <div class="modal fade" id="nextmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Proceed to Step 3 </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                        </div>
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

    <!--Edit function-->
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
                $('#name').val(data[1]);
                $('#description').val(data[2]);
                $('#ingredient').val(data[3]);
                $('#researchID').val(data[4]);
            });
        });
    </script>

    <!--Archive function-->
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
				$('#archive_name').val(data[1]);
                $('#archive_description').val(data[2]);
                $('#archive_ingredient').val(data[3]);
                $('#archive_researchID').val(data[4]);
            });
        });
    </script>

    <!--next step modal function-->
    <script type='text/javascript'>
        $(document).ready(function(){
            $('body').on("click", ".nextbtn", function(event){
                    var userid = $(this).data('id');
                    $.ajax(
                        {
                            url: 'product-concept-upload.php',
                            type: 'post',
                            data: {userid: userid},
                            success: function(response){
                                $('.modal-body').html(response);
                                $('#nextmodal').modal('show');
                            }
                        }
                    )
                });
            });
    </script>
</body>
</html>