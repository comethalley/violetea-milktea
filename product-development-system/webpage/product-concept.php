<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Concept | PDIS</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<body>
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
      <li class="nav-item active">
        <a class="nav-link" href="ingredient.php">Ingredients<span class="sr-only">(current)</span></a>
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
					$query=mysqli_query($conn,"SELECT * FROM tbl_ingredient INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID WHERE tbl_concept.archive='false'");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
                            <td><?php echo $row['id']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><img src="../webpage/uploads/<?php echo $row['image']; ?>" alt="image.jpg" width="100px" height="100px"></td>
							<!--<td><img src="../webpage/uploads/<?php echo $row['packaging']; ?>" alt="packaging.jpg" width="100px" height="100px"></td>-->
							<td><?php echo $row['ingredientID']; ?></td>
							<td>
								<a href="#" onClick="MyWindow=window.open('edit-product-concept.php?id=<?php echo $row['id']; ?>','MyWindow','location=0,width=600,height=300,left=400,top=60'); return false;">Edit</a>
								<a href="#" onClick="MyWindow=window.open('archive-product-concept.php?id=<?php echo $row['id']; ?>','MyWindow','location=0,width=600,height=300,left=400,top=60'); return false;">Archive</a>
								<a href="#" onClick="window.open('survey-form.php?id=<?php echo $row['id'];?>', '_blank')">Survey Form</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>

	<div class="container">
            <div class="card">
                <h2>Product Concept</h2>
            </div>

            <div class="card">
                <div class="card-body">

                    <?php
                include_once '../webpage/includes/db-connection.php';

                $query = "SELECT * FROM tbl_ingredient INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID WHERE tbl_concept.archive='false'";
                $query_run = mysqli_query($conn, $query);
            ?>
                    <table id="datatableid" class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">IngredientID</th>
                                <th scope="col"> Edit </th>
                                <th scope="col"> Archive </th>
								<th scope="col"> Survey Form </th>
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
							<td><img src="../webpage/uploads/<?php echo $row['image']; ?>" alt="image.jpg" width="100px" height="100px"></td>
							<td><?php echo $row['ingredientID']; ?></td>
                            <td>
                                <button type="button" data-id='<?php echo $row['id']; ?>' class="btn btn-success editbtn"> EDIT </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger archivebtn"> ARCHIVE </button>
                            </td>
								<td><a href="product-concept-upload.php?id=<?php echo $row['id']; ?>">Proceed to Step 3</a></td>
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

    <!-- EDIT POP UP FORM -->
	 <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Product Concept Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
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

    <script type='text/javascript'>
        $(document).ready(function(){
            $('.editbtn').click(function(){
                    var userid = $(this).data('id');
                    $.ajax(
                        {
                            url: 'ajax.php',
                            type: 'post',
                            data: {userid: userid},
                            success: function(response){
                                $('.modal-body').html(response);
                                $('#editmodal').modal('show');
                            }
                        }
                    )
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
				$('#archive_name').val(data[1]);
                $('#archive_description').val(data[2]);
                $('#archive_ingredient').val(data[3]);
                $('#archive_researchID').val(data[4]);
            });
        });
    </script>

</body>
</html>