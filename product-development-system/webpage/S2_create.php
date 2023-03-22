<?php 
session_start();
if($_SESSION['username']){
    echo "Welcome" . $_SESSION["username"];
}else{
    header("location: ../index.php");
}

include_once '../webpage/includes/db-connection.php';
include("includes/S2_header.php"); 

$id = null; // define a default value for $id

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // handle error when id is not set
}

$status = isset($_GET['status']) ? $_GET['status'] : null;

?>
    <div class="container">
        <a href="suggestion.php" class="btn btn-light mb-3"><< Go Back</a>
        <?php if ($status == "created") : ?>
        <div class="alert alert-success" role="alert">
            <strong>Created</strong>
        </div>
        <?php endif ?>
        <?php if ($status == "fail_create") : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Fail Create</strong>
        </div>
        <?php endif ?>
        <!-- Create Form -->
        <div class="card border-dark">
            <div class="card-header bg-dark text-white">
                <strong><i class="fa fa-plus"></i> Add New Product</strong>
            </div>
            <div class="card-body">
                <form action="S2_add.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">Research ID:</label>
                            <input type="text" class="form-control" id="name" name="researchID" value="<?php echo $id?>" required readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="image" class="col-form-label">Description</label>
                            <input type="text" class="form-control" name="description" id="image" placeholder="Description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-form-label">Ingredients</label>
                        <textarea name="ingredient" id="" rows="5" class="form-control" placeholder="Ingredients"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button>
                </form>
            </div>
        </div>
        <!-- End create form -->
        <br>
    </div><!-- /.container -->
<?php include("includes/S2_footer.php") ?>
