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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

<body>
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

                <div class="accordion " id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Suggestions
                                </button>
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Research
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="container">


                                    <div class="card">
                                        <div class="card-body">

                                            <?php
                                            include_once '../webpage/includes/db-connection.php';

                                            $query = "SELECT * FROM tbl_feedback WHERE archive ='false'";
                                            $query_run = mysqli_query($conn, $query);
                                            ?>
                                            <table id="datatableid" class="table table-striped table-responsive">
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
                                                    if ($query_run) {
                                                        foreach ($query_run as $row) {
                                                    ?>
                                                            <tr>
                                                                <td> <?php echo $row['id']; ?> </td>
                                                                <td> <?php echo $row['username']; ?> </td>
                                                                <td> <?php echo $row['subject']; ?> </td>
                                                                <td> <?php echo $row['body']; ?> </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger userbtn archive"><i class="fa-solid fa-box-archive" style="color: #ffffff;"></i> Archive</button>
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


                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                                            <i class="fa-solid fa-plus" style="color: #ffffff;"></i> Add Research
                                        </button>
                                    </div>
                                </div>
                                <div class="container">



                                    <div class="card">
                                        <div class="card-body">

                                            <?php
                                            include_once '../webpage/includes/db-connection.php';

                                            $query = "SELECT * FROM tbl_research WHERE archive ='false'";
                                            $query_run = mysqli_query($conn, $query);
                                            ?>
                                            <table id="researchtableid" class="table table-striped table-responsive">
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
                                                    if ($query_run) {
                                                        foreach ($query_run as $row) {
                                                    ?>
                                                            <tr>
                                                                <td> <?php echo $row['id']; ?> </td>
                                                                <td> <?php echo $row['title']; ?> </td>
                                                                <td> <?php echo $row['introduction']; ?> </td>
                                                                <td> <?php echo $row['trends']; ?> </td>
                                                                <td> <?php echo $row['conclusion']; ?> </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-success editbtn"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i> Edit </button>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger archivebtn archive"><i class="fa-solid fa-box-archive" style="color: #ffffff;"></i> Archive </button>
                                                                </td>
                                                                <td><button type="button" data-id='<?php echo $row['id']; ?>' class="btn btn-success nextbtn archive">Next Step </button>
                                                                    <!--<a href="S2_create.php?id=<?php echo $row['id']; ?>">Proceed to Step 2</a>-->
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

                    <form id="addForm" method="POST">

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
        <!-- <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="text" name="title" id="view_title" class="form-control" placeholder="Enter Title">
                            </div>

                            <div class="form-group">
                                <label> Introduction </label>
                                <input type="text" name="introduction" id="view_introduction" class="form-control" placeholder="Enter Introduction">
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
                                <input type="text" name="conclusion" id="view_conclusion" class="form-control" placeholder="Enter Phone Number">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>

                </div>
            </div>
        </div> -->

        <!-- EDIT POP UP FORM -->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Edit Research Data </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="updateForm" method="POST">


                        <div class="modal-body">

                            <input type="hidden" name="edit_id" id="edit_id">

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                            </div>

                            <div class="form-group">
                                <label> Introduction </label>
                                <input type="text" name="introduction" id="introduction" class="form-control" placeholder="Enter Introduction">
                            </div>

                            <div class="form-group">
                                <label>Trends</label>
                                <select id="myDropdown" name="trends">
                                    <option value="" id="option" selected></option>
                                    <option value="Social Media">Social Media</option>
                                    <option value="Online Forum">Online Forum</option>
                                    <option value="Customer Survey">Customer Survey</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label> Conclusion </label>
                                <input type="text" name="conclusion" id="conclusion" class="form-control" placeholder="Enter Phone Number">
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
        <div class="modal fade" id="archiveusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Archive Suggestion Data </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="mySuggestion" method="POST">

                        <div class="modal-body">

                            <input type="hidden" name="user_id" id="user_id">
                            <h4> Do you want to archive this data?</h4>
                            <div class="form-group">
                                <label> Username </label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" disabled>
                            </div>

                            <div class="form-group">
                                <label> Subject </label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" disabled>
                            </div>

                            <div class="form-group">
                                <label> Body </label>
                                <input type="text" name="subject" id="body" class="form-control" placeholder="Body" disabled>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                            <button type="submit" name="updatedata" class="btn btn-primary ">YES</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- ARCHIVE RESEARCH POP UP FORM -->
        <div class="modal fade" id="archivemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Archive Research Data </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="myResearch" method="POST">

                        <div class="modal-body">

                            <input type="hidden" name="archive_id" id="archive_id">
                            <h4> Do you want to archive this data?</h4>
                            <div class="form-group">
                                <label> Title </label>
                                <input type="text" name="archive_title" id="archive_title" class="form-control" placeholder="Enter Title" disabled>
                            </div>

                            <div class="form-group">
                                <label> Introduction </label>
                                <input type="text" name="archive_introduction" id="archive_introduction" class="form-control" placeholder="Enter Introduction" disabled>
                            </div>

                            <div class="form-group">
                                <label>Trends</label>
                                <select id="trends" name="archive_trends" id="archive_trend" disabled="disabled">
                                    <option value="" id="options" selected></option>
                                    <option value="Social Media">Social Media</option>
                                    <option value="Online Forum">Online Forum</option>
                                    <option value="Customer Survey">Customer Survey</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label> Conclusion </label>
                                <input type="text" name="archive_conclusion" id="archive_conclusion" class="form-control" placeholder="Enter Phone Number" disabled>
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
                        <h5 class="modal-title" id="exampleModalLabel"> Proceed to Step 2 </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                        </div>
                </div>
            </div>
        </div>
    </main>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <!-- Resarch Archive -->
    <script>
        $(document).ready(function() {
            $('#myResearch').submit(function(event) {
                event.preventDefault(); // Prevent the form from submitting normally
                var form = $(this);
                var url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: "../webpage/includes/archive-function.php ",
                    data: form.serialize(), // Serialize the form data
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Archived',
                            didClose: function() {
                                // Refresh the page
                                location.reload();
                            }
                        });
                        console.log(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle any errors that occur during the AJAX request
                        console.log("Error: ");
                    }
                });
            });
        });
    </script>
    <!-- Suggestion Archive -->
    <script>
        $(document).ready(function() {
            $('#mySuggestion').submit(function(event) {
                event.preventDefault(); // Prevent the form from submitting normally
                var form = $(this);
                var url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: "../webpage/includes/archive-user-function.php",
                    data: form.serialize(), // Serialize the form data
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Archived',
                            didClose: function() {
                                // Refresh the page
                                location.reload();
                            }
                        });
                        console.log(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle any errors that occur during the AJAX request
                        console.log("Error: ");
                    }
                });
            });
        });
    </script>
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

            var table = $('#researchtableid').DataTable({
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

    <!--Edit research-->
    <script>
        $(document).ready(function() {

            $('body').on("click", ".editbtn", function(event) {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#edit_id').val(data[0]);
                $('#title').val(data[1]);
                $('#introduction').val(data[2]);
                $('#option').val(data[3]);
                $('#option').text((data[3]));
                $('#conclusion').val(data[4]);                
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#addForm').on('submit', function(e) {
                e.preventDefault();
                var formData = $('#addForm').serialize();
                var requiredFields = ['title', 'introduction', 'trends', 'conclusion']; // List of required field names
                var emptyFields = [];
                requiredFields.forEach(function(field) {
                    if ($('[name="' + field + '"]').val() === '') {
                        emptyFields.push(field);
                    }
                });
                if (emptyFields.length > 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'The following fields are required: ' + emptyFields.join(', ')
                    });
                    return;
                }
                $.ajax({
                    type: 'POST',
                    url: './includes/add.php',
                    data: formData,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Research Add Successfully',
                            didClose: function() {
                                // Refresh the page
                                location.reload();
                            }
                        });
                        $('#modal').modal('hide');
                        // Add code here to update the table with the new data
                    }
                });
            });


        });
    </script>
    <script>
        $(document).ready(function() {
            $('#updateForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: './update.php',
                    data: $('#updateForm').serialize(),
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Research Updated Successfully',
                            didClose: function() {
                                // Refresh the page
                                location.reload();
                            }
                        });

                        $('#editmodal').modal('hide');

                        // Add code here to update the table with the new data

                    }
                });

            });
        });
    </script>
    <!--Archive researchs-->
    <script>
        $(document).ready(function() {

            $('body').on("click", ".archivebtn", function(event) {

                $('#archivemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#archive_id').val(data[0]);
                $('#archive_title').val(data[1]);
                $('#archive_introduction').val(data[2]);
                $('#archive_trend').val(data[3]);
                $('#options').text((data[3]));
                $('#archive_conclusion').val(data[4]);
            });
        });
    </script>

    <!--Archive user suggestions-->
    <script>
        $(document).ready(function() {

            $('body').on("click", ".userbtn", function(event) {

                $('#archiveusermodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
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

    <!--next step modal function-->
    <script type='text/javascript'>
        $(document).ready(function(){
            $('body').on("click", ".nextbtn", function(event){
                    var userid = $(this).data('id');
                    $.ajax(
                        {
                            url: 'S2_create.php',
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