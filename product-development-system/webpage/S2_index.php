<?php 
session_start();
if($_SESSION['username']){
    echo "Welcome" . $_SESSION["username"];
}else{
    header("location: ../index.php");
}

// Include database connection
require("includes/S2_db.php");

try {
    // Create sql statment
    $sql = "SELECT * FROM tbl_ingredient WHERE archive = 'false'";
    $result = $conn->query($sql);

} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}

?>
<?php include("includes/S2_header.php") ?>
    <div class="container">
        <?php if (isset($_GET['status']) && $_GET['status'] == "deleted") : ?>
        <div class="alert alert-success" role="alert">
            <strong>Deleted</strong>
        </div>
        <?php endif ?>
        <?php if (isset($_GET['status']) && $_GET['status'] == "fail_delete") : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Fail Delete</strong>
        </div>
        <?php endif ?>
        <!--Navbar-->
        <div class="topnav" id="myTopnav">
	        <a href = "logout.php">Logout</a>
            <a href="retrieve.php">Archives</a>
	        <a href="analysis-report.php">Analysis Report</a>
	        <a href="product-concept.php">Concept Product</a>
	        <a href="S2_index.php">Ingredients</a>
	        <a href="suggestion.php">Suggestion</a>
        </div>	
        <!-- Table Product -->
        <div class="card border-dark">
            <div class="card-header bg-dark text-white">
            <strong><i class=""></i> Products</strong>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-title float-left">Product List</h5>
                    <!--<a href="S2_create.php" class="btn btn-success float-right mb-3"><i class="fa fa-plus"></i> Add New</a>-->
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Ingredient</th>
                        <th>Research ID</th>
                        <!-- <th>Price</th> -->
                        <!-- <th>Qty</th> -->
                        <th style="width: 20%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($result->rowCount() > 0) : ?>
                    <?php foreach ($result as $name) : ?>
                    <tr>
                        <td><?= $name['id'] ?></td>
                        <td><?= $name['name'] ?></td>
                        <td><?= $name['description'] ?></td>
                        <td><?= $name['ingredient'] ?></td>
                        <td><?= $name['researchID'] ?></td>
                        <!-- <td>$<?= number_format($name['price'], 2) ?></td> -->
                        <!-- <td><?= $name['qty'] ?></td> -->
                        <td>
                            <a href="S2_show.php?id=<?=$name['id']?>" class="btn btn-sm btn-light"><i class="fa fa-th-list"></i></a>
                            <a href="S2_edit.php?id=<?=$name['id']?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-<?= $name['id'] ?>"><i class="fa fa-trash"></i></a>
                            <a href="product-concept-upload.php?id=<?=$name['id']?>">Proceed to Step 3</a>
                            <?php include("includes/S2_modal.php") ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php endif ?>
                </tbody>
            </table>
        </div>
      </div>
      <!-- End Table Product -->
      <br>
    </div><!-- /.container -->
<?php include("includes/S2_footer.php") ?>