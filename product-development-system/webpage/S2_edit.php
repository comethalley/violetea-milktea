<?php 
session_start();
if($_SESSION['username']){
    echo "Welcome" . $_SESSION["username"];
}else{
    header("location: ../index.php");
}

require("includes/S2_db.php");
$id = $_GET['id'] ? intval($_GET['id']) : 0;

try {
    $sql = "SELECT * FROM tbl_ingredient WHERE id = :id LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();    
} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}

if (!$stmt->rowCount()) {
    header("Location: S2_index.php");
    exit();
}
$name = $stmt->fetch();
?>

<?php include("includes/S2_header.php") ?>
    <div class="container">
    <a href="S2_index.php" class="btn btn-light mb-3"><< Go Back</a>
        <?php if (isset($_GET['status']) && $_GET['status'] == "updated") : ?>
        <div class="alert alert-success" role="alert">
            <strong>Updated</strong>
        </div>
        <?php endif ?>
        <?php if (isset($_GET['status']) && $_GET['status'] == "fail_update") : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Fail Update</strong>
        </div>
        <?php endif ?>
        <!-- Create Form -->
        <div class="card border-dark">
            <div class="card-header bg-dark text-white">
                <strong><i class="fa fa-edit"></i> Edit Product</strong>
            </div>
            <div class="card-body">
                <form action="S2_update.php?id=<?= $name['id'] ?>" method="post">
                    <input type="hidden" name="id" value="<?= $name['id'] ?>">
                    <div class="form-row">
                        <!-- <div class="form-group col-md-6">
                            <label for="barcode" class="col-form-label">Barcode</label>
                            <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Barcode" required value="<?= $name['barcode'] ?>">
                        </div> -->
                        <div class="form-group col-md-6">
                            <label for="name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required value="<?= $name['name'] ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- <div class="form-group col-md-4">
                            <label for="price" class="col-form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Price" required value="<?= $name['price'] ?>" >
                        </div> -->
                        <!-- <div class="form-group col-md-4">
                            <label for="qty" class="col-form-label">Qty</label>
                            <input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" required value="<?= $name['qty'] ?>">
                        </div> -->
                        <div class="form-group col-md-4">
                            <label for="image" class="col-form-label">Description</label>
                            <input type="text" class="form-control" name="description" id="image" placeholder="Image URL" value="<?= $name['description'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note" class="col-form-label">Ingredients</label>
                        <textarea name="ingredient" id="" rows="5" class="form-control" placeholder="Ingredients"><?= $name['ingredient'] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button>
                </form>
            </div>
        </div>
        <!-- End create form -->
        <br>
    </div><!-- /.container -->
<?php include("includes/S2_footer.php") ?>