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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./css/suggestion.css">
    <script src="https://kit.fontawesome.com/a1366662c0.js" crossorigin="anonymous"></script>
</head>

<body>


    <?php
    if ($_SESSION['username']) {
        $username = $_SESSION['username'];
    } else {
        header("location: ../index.php");
    }
    ?>
    <div class="navbar navbar-expand-lg navbar-light    ">
        <a class="navbar-brand" href="#"><h5>Product Development </h5></a>
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
                            <a href="#" class="dropdown-item logout-btn" type="button">Logout</a>
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
                            <i class="fa-solid fa-chart-simple" style="color: #b8b8b8;"></i> <a class="" href="survey.php">Survey</a>
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
                                    <div class="box-card card-body">
                                        <a href="retrieve-question.php">Rejected Question</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="line"></div>
                    </ul>
                </nav>
            </div>
            <div class="cont-right">
            <div class="card card-header">

<h6>Survey Report Archived</h6>

</div>

                    <!--Survey Report-->
                    <div class="container">


                        <div class="card card-body-cont">
                            <div class="card-body ">

                            <?php
include_once '../webpage/includes/db-connection.php';

$query = "SELECT DISTINCT tbl_ingredient.name, tbl_surveys.username, tbl_surveys.civilStatus, tbl_surveys.gender, 
tbl_surveys.address, tbl_surveys.age,tbl_surveys.timestamp, tbl_surveys.conceptID FROM tbl_ingredient 
INNER JOIN tbl_concept ON tbl_ingredient.id = tbl_concept.ingredientID INNER JOIN tbl_surveys 
ON tbl_concept.id = tbl_surveys.conceptID WHERE tbl_surveys.archive = 'true'";
$query_run = mysqli_query($conn, $query);

// add a counter variable to keep track of the row number
$counter = 1;
?>
<table id="surveyid" class="table table-striped table-responsive">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Civil Status</th>
            <th scope="col">Gender</th>
            <th scope="col">Address</th>
            <th scope="col">Age</th>
            <th scope="col">Date</th>
            <th scope="col">Product Name</th>
            <th scope="col">Concept ID</th>
            <th scope="col">Retrieve</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($query_run) {
            foreach ($query_run as $row) {
        ?>
                <tr>
                    <td><?php echo $counter; ?></td> <!-- add the counter variable here -->
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['civilStatus']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['timestamp']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['conceptID']; ?></td>
                    <td>
                    <button type="button" class="btn btn-function btn-success archivebtn"><i class="fa-solid fa-rotate-left" style="color: #ffffff;"></i> RETRIEVE </button>
                    </td>
                </tr>
        <?php
                // increment the counter variable for the next row
                $counter++;
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

                    <!--Retrieve Survey-->
                    <div class="modal fade" id="archivemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Retrieve Survey Data </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form id="retsurvey" method="POST">

                                <div class="modal-body">

<input type="hidden" name="user_id" id="user_id">
<h4> Do you want to archive this data?</h4>
<div class="form-group">
                            <label> Name </label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" readonly>
                        </div>

                        <div class="form-group">
                            <label> Civil Status </label>
                            <input type="text" name="civilStatus" id="civilStatus" class="form-control" placeholder="Civil Status" readonly>
                        </div>

                        <div class="form-group">
                            <label> Gender </label>
                            <input type="text" name="gender" id="gender" class="form-control" placeholder="Gender" readonly>
                        </div>

                        <div class="form-group">
                            <label> Address </label>
                            <textarea type="text" name="address" id="address" class="form-control" placeholder="Address" rows="5" readonly></textarea>
                        </div>

                        <div class="form-group">
                            <label> Age </label>
                            <input type="text" name="age" id="age" class="form-control" placeholder="Age" readonly>
                        </div>

                        <div class="form-group">
                            <label> Timestamp </label>
                            <input type="text" name="timestamp" id="timestamp" class="form-control" placeholder="Timestamp" readonly>
                        </div>

                        <div class="form-group">
                            <label> Product Name </label>
                            <input type="text" name="conceptID" id="conceptID" class="form-control" placeholder="Product Name" readonly>
                        </div>
</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        <button type="submit" name="updatedata" class="btn btn-primary"><i class="fa fa-check-circle"></i> Yes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>




              


    </main>

    <div class="footer-cont">
        <footer>
            © 2023 Violetea. All rights reserved. Developed by CHO<span style="color: #e69cfb;">BO</span>.
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="./js/logoutajax.js"></script>
    <script src="./js/retrievesurvey.js"></script>

</body>

</html>